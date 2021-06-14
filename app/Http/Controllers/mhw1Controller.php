<?php

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class mhw1Controller extends Controller {
    public function caricamento() {
        $query = DB::select('SELECT B.nome as Nome, S.citta as Citta, B.codice_abi as Codice, B.descrizione as Descrizione, B.immagine as Foto, B.logo as Logo
        FROM SEDE S JOIN BANCA B on S.banca = B.codice_abi');
                             

        return $query;
    }

}

?>
