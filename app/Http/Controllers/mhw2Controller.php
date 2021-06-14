<?php

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mhw2Controller extends Controller {
    public function carica() {

        $id_session = Session::get('id_session');

        $query = DB::select("SELECT P.id_preferito as idPreferito, B.nome as Nome, B.codice_abi as Codice, B.immagine as Foto, B.descrizione as Descrizione, B.logo as Logo
        FROM PREFERITI P JOIN BANCA B on P.id_preferito = B.codice_abi
        WHERE id_session =" . "$id_session");

        
        return $query;
    }

    public function inserisci($q) {


        $id_session = Session::get('id_session');

        $query = DB::insert("INSERT INTO PREFERITI (id_session, id_preferito) VALUES ('$id_session','$q')");
    }

    public function rimuovi($q) {


        $id_session = Session::get('id_session');

        $query = DB::delete("DELETE FROM PREFERITI WHERE id_session=" . "$id_session" . " AND id_preferito =" . "$q");
    }

}

?>