<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('mhw1');
})->name("mhw1");

Route::get("/login", "loginController@login")->name("login");
Route::get("/logout", "loginController@logout")->name("logout");
Route::post("/login", "loginController@checkLogin");

Route::get('/register', "registerController@index")->name('register');
Route::post('/register', "registerController@create");
Route::get('/register/username/{query}', "registerController@checkUsername");
Route::get('/register/codice/{query}', "registerController@checkCodice");

Route::get('/area_personale', function() {
    return view('area_personale');
})->name("area_personale");

Route::get('/area_personaleSaldo', "area_personaleController@mostraSaldo");
Route::get('/area_personaleOperazioni', "area_personaleController@mostraOperazioni");
Route::get('/area_personaleVersamento/importo/{q}', "area_personaleController@effettuaVersamento")->name('effettuaVersamento');
Route::get('/area_personaleUser', "area_personaleController@index")->name('area_personaleUser');

Route::get('/mhw1Caricamento', "mhw1Controller@caricamento");

Route::get('/mhw2', function () {
    return view('mhw2');
})->name("mhw2");

Route::get('/mhw2Preferiti', "mhw2Controller@carica")->name('mhw2Preferiti');
Route::get('/mhw2Inserisci_preferiti/id/{q}', "mhw2Controller@inserisci")->name('Inserisci_preferiti');
Route::get('/mhw2Rimuovi_preferiti/id/{q}', "mhw2Controller@rimuovi")->name('Rimuovi_preferiti');

Route::get('/mhw3', function () {
    return view('mhw3');
})->name("mhw3");

Route::get('/mhw3Api/symbol/{q}', 'mhw3Controller@rapidapiSimbolo')->name('mhw3Api');
Route::get('/mhw3Api/name/{q}', 'mhw3Controller@rapidapiDati')->name('mhw3Api');
Route::get('/mhw3Api/da/{iniziale}a/{finale}quant/{quantita}', 'mhw3Controller@twelvedataConversione')->name('mhw3Api2');
Route::get('/mhw3Api/da/{iniziale}a/{finale}','mhw3Controller@twelvedataValore')->name('mhw3Api2');

