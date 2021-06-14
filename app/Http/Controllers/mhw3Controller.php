<?php

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class mhw3Controller extends Controller {
    public function rapidapiSimbolo($q) {

        $json = Http::withHeaders([
            'x-rapidapi-key' => env('yahoo_key'),
            'x-rapidapi-host' => env('yahoo_host')
        ])->get("https://".env('yahoo_host')."/stock/v2/get-summary", [
            'symbol' => $q,
        ]);
        
        if ($json->failed()) { echo "errore"; abort(500); }
        
        return response()->json([
            'nome' => $json['quoteType']['shortName'],
            'settore' => $json['summaryProfile']['sector'],
            'prezzo' => $json['financialData']['currentPrice']['fmt'],
            'valuta' => $json['summaryDetail']['currency'],
            'high' => $json['summaryDetail']['regularMarketDayHigh']['fmt'],
            'low' => $json['summaryDetail']['regularMarketDayLow']['fmt'],
            'open' => $json['summaryDetail']['regularMarketOpen']['fmt'],
            'close' => $json['summaryDetail']['regularMarketPreviousClose']['fmt'],
            'volume' => $json['summaryDetail']['regularMarketVolume']['fmt']
        ]);
    }

    public function rapidapiDati($q) {

        $json = Http::withHeaders([
            'x-rapidapi-key' => env('yahoo_key'),
            'x-rapidapi-host' => env('yahoo_host')
        ])->get("https://".env('yahoo_host')."/auto-complete", [
            'q' => $q,
        ]);

        if ($json->failed()) { echo "errore"; abort(500); }

        $newJson = array();

        for ($i = 0; $i < count($json['quotes']); $i++) {
            $newJson[] = array(
                'nome' => $json['quotes'][$i]['shortname'], 
                'simbolo' => $json['quotes'][$i]['symbol'],
                'exchange' => $json['quotes'][$i]['exchange']
            );
        }
        return response()->json($newJson);      
    }

    public function twelvedataConversione ($iniziale, $finale, $quantita) {
        
        $json = Http::get(env('twelvedataEndpoint')."currency_conversion?symbol=". $iniziale . "/" . $finale . "&amount=" . $quantita . "&apikey=".env('twelvedataKey'));
        
        if ($json->failed()) { echo "errore"; abort(500); }

        return response()->json([
            'symbol' => $json['symbol'],
            'rate' => $json['rate'],
            'amount' => $json['amount']
        ]);
    }

    public function twelvedataValore ($iniziale, $finale) {

        $json = Http::get(env('twelvedataEndpoint')."exchange_rate?symbol=" . $iniziale . "/" . $finale . "&apikey=" . env('twelvedataKey'));
    
        if ($json->failed()) { echo "errore"; abort(500); }

        return response()->json([
            'symbol' => $json['symbol'],
            'rate' => $json['rate']
        ]);
    }
}


?>