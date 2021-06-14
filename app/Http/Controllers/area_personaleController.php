<?php

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class area_personaleController extends Controller {
    
    public function mostraSaldo() {

        $request = Session::get('username');
       
        $id_session = Session::get('id_session');
        
        $query2 = DB::select("SELECT CO.saldo as Saldo
                              FROM dati_login dl JOIN CONTO CO on dl.id_conto = CO.id
                              WHERE dl.id_session =" . "$id_session");
        return $query2;
    }

    public function mostraOperazioni() {
        $request = Session::get('username');

        $id_session = Session::get('id_session');

        $query = DB::select("SELECT COUNT(*) as Numero_operazioni
                             FROM (CLIENTE C JOIN dati_login dl on C.codice = dl.codice) JOIN OPERAZIONE O on O.id_conto = dl.id_conto
                             WHERE dl.id_session =" . "$id_session");
        return $query;
    }

    public function effettuaVersamento($q) {
        $id_session = Session::get('id_session');
        
        $idConto = Session::get('id_conto');

        $numero_operazione = rand(20,999);

        $query3 = DB::select("INSERT INTO VERSAMENTO (numero_operazione, id_conto, importo) VALUES ($numero_operazione, $idConto, $q)");
    }

    public function index() {
        $id_session = session('id_session');
        $user = User::find($id_session);
        if(!isset($user))
            return view('login');

        return view("area_personale")->with("user", $user);
    }



}

?>