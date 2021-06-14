<?php

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\cliente;
use App\Models\conto;
use App\Models\citta;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class registerController extends Controller {
    // public $conto = rand();

    public function create()
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $conto = $this->conto;
            $newUser = DB::insert('insert into dati_login (username,password,codice,citta,id_conto) values (?,?,?,?,?)',
            [$request['username'],Hash::make($request['password']),$request['codice'],$request['citta'], $conto]);

            $user = User::where('username', $request['username'])->first();

            if ($newUser) {
                Session::put('id_session', $user->id_session);
                Session::put('username', $user->username);
                Session::put('id_conto', $user->id_conto);
                return redirect('area_personale');
            } 
            else {
                return redirect('register')->withInput();
            }
        }
        else 
            return redirect('register')->withInput();
    }

    public function countErrors($data) {
        $error = array();

        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        
        if(strlen($data['username']) < 5 ) {
            $error[] = "Username troppo corta (min 5 caratteri)";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già usato";
            }
        }
        # PASSWORD
        $pattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[_.\-()?#;:!@])[0-9A-Za-z_.\-()?#;:!@]{8,20}$/';
        if(!preg_match($pattern, $data["password"])) {
            $error[] = "La password non contiene i caratteri richiesti";
        }


        $year = rand(date("Y")+1, 2055);
        $month = rand(1, 12);
        $day = rand(1, 28);

        $randomDate = $year . "-" . $month . "-" . $day;
        $idConto = rand(100,999);
        $this->conto = $idConto;

        $query3 = conto::where('id', $data['id_conto'])->first();
        if($query3 === null) {
            DB::insert('insert into CONTO (id,saldo,data_scadenza) values (?,?,?)',
            [$idConto, 0, $randomDate]);
        }

        $query2 = citta::where('codice_citta', $data['citta'])->first();
        if($query2 === null) {
            DB::insert('insert into CITTA (regione,codice_citta,numero_clienti) values (?,?,?)',
            [$data['regione'], $data['citta'], 0]);
        }

        $eta = \Carbon\Carbon::parse($data['data_nascita'])->diff(\Carbon\Carbon::now())->format('%y');

        $query = cliente::where('codice', $data['codice'])->first();
        if($query === null) {
            DB::insert('insert into CLIENTE (codice, eta, data_di_nascita,citta, id_conto) values (?,?,?,?,?)',
            [$data['codice'], $eta, $data['data_nascita'], $data['citta'], $idConto]);
        }        

        return count($error);
    }


    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkCodice($query) {
        $exist = cliente::where('codice', $query)->exists();
        return ['exists' => $exist];
    }


    public function index() {
        return view('register');
    } 
}
?>