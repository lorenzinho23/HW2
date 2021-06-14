<?php

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller {
    public function login() {
        if(session('id_session') != null) {
            return redirect("area_personale");
        }
        else {
            return view('login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function checkLogin() {
        $dati_login = User::where('username', request('username'))->first();
        
        
        if(Hash::check(request('password'), $dati_login->password)){
            if($dati_login !== null) {
                Session::put('id_session', $dati_login->id_session);
                Session::put('username', $dati_login->username);
                Session::put('id_conto', $dati_login->id_conto);
                return redirect('area_personale');
            }
        }
        else {
            return redirect('login')->withInput()->withErrors('Credenziali non valide');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
}


?>