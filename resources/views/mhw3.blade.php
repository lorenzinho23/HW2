<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MHW3 - O46002218</title>
        <link href="{{ asset('../public/CSS/mhw3.css') }}" rel="stylesheet">
        <script src="{{ asset('../public/JS/mhw3.js')}}"defer></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Josefin+Sans:ital,wght@1,600&display=swap" rel="stylesheet"> 
    </head>

    <body>
        <header>
            <div id="logo">idealBank</div>
            <div id="links">
                <a href="{{ route('mhw1') }}">Home</a>
                <a href="{{ route('mhw2') }}">Info</a>
                <b href="{{ route('mhw3') }}">Servizi</b>
                <a href="#footer">Contatti</a>
                <a class="bottone" href="{{ route('login') }}">Area personale</a>
                <a href="{{ route('logout') }}"> <?php 
                    if((Session::get('username') !== null)) { echo "Logout"; }
                    else echo "Login";
                ?></a>   
            </div>
        </header>

        <h1 id="intestazione">I NOSTRI SERVIZI</h1>

        <div id="principale">
            <div id="scritta">    
                <h1>CURRENCY EXCHANGE</h1>
                <p>Il nostro sito ti mette a disposizione un servizio di cambio valuta:</br> 
                Puoi scegliere se verificare i valori dei tassi di cambio in tempo reale</br>
                oppure convertire una specifica cifra in qualsiasi moneta</p>
            </div> 
        </div>

        <article>
            <section id="API1">
                <h1>SCEGLI UN'OPZIONE:</h1>
                <div id="bottoni">
                    <img src="../public/foto/aggiorna.png" id ="aggiorna">
                    <input id="scelta_valori" type="submit" value="VALORE ATTUALE">
                    <input id="scelta_conversione" type="submit" value="CONVERSIONE">
                </div>
                
                <!-- BOX VALORE MONETE -->
                <form name='valori' id='valori' class="hidden">
                    <h1>VALORI IN TEMPO REALE DELLE PRINCIPALI MONETE</h1>
    
                    Da:
                    <select name="by" id="by">
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                        <option value="GBP">GBP</option>
                        <option value="JPY">JPY</option>
                        <option value="CHF">CHF</option>
                    </select>
    
                    A:
                    <select name="to" id="to">
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                        <option value="GBP">GBP</option>
                        <option value="JPY">JPY</option>
                        <option value="CHF">CHF</option>
                    </select>
                    
                    <label>&nbsp;<input class="submit" type="submit" value="CERCA"></label>
                </form>
    
                <!-- BOX CONVERSIONE MONETE -->
                <form name="conversione" id="conversione" class="hidden">
                    <h1>CONVERTI UNA QUANTITA DA UNA MONETA ALL'ALTRA</h1>
    
                    <label>Quantità:<input type="text" name='quantita' id='quantita'></label>
    
                    Da:
                    <select name="iniziale" id="iniziale">
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                        <option value="GBP">GBP</option>
                        <option value="JPY">JPY</option>
                        <option value="CHF">CHF</option>
                    </select>

                    A:
                    <select name="finale" id="finale">
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                        <option value="GBP">GBP</option>
                        <option value="JPY">JPY</option>
                        <option value="CHF">CHF</option>
                    </select>
                    
                    <label>&nbsp;<input class="submit" type="submit" value="VAI"></label>
                </form>

                <article id="lista1"></article>
            </section>
        </article>
        
        <div id="principale2">
            <div id="scritta">    
                    <h1>MERCATO AZIONARIO</br>IN TEMPO REALE</h1>
                    <p>Grazie a questo strumento puoi verificare i dati delle principali aziende<br> 
                    Puoi effettuare la ricerca dei dati tramite il simbolo dell'azienda<br>
                    Se invece non conosci il simbolo di un'azienda puoi scoprirlo <br>
                    cercando il nome completo dell'azienda e selezionando "ricerca simbolo".
                    </p>
            </div> 
        </div>
                
        <article>        
            <section id="API2">
                <form name='search_content' id='search_content'>
                    <h1>SCOPRI I DATI FINANZIARI DELLE PRINCIPALI AZIENDE IN BORSA</h1>
                        
                    <label>Simbolo (o azienda):<input type="text" name='content' id='content'></label>
    
                    <select name="tipo" id="tipo">
                            <option value="dati">Dati</option>
                            <option value="simbolo">Ricerca Simbolo</option>
                    </select>
                    
                    <label>&nbsp;<input class="submit" type="submit" value="CERCA"></label>
                    <img src="../public/foto/aggiorna.png" id ="aggiorna2">
                
                </form>
                
                <div id="pulsanti">
                    <button id="elenco">Simboli più famosi</button>
                    <button id="tastoLegenda">Legenda</button>
                </div>
                
                <article class="hidden" id="simboli">
                    <div>
                        <h1>I simboli delle principali banche (e aziende) quotate in borsa</h1>
                        <p>Scegli quello che ti interessa ed effettua la ricerca!</p>
                        <ul>
                            <li>Unicredit - Simbolo: <strong>'UCG.MI'</strong></li>
                            <li>Intesa Sanpaolo - Simbolo: <strong>'ISP.MI'</strong>
                            <li>Banco BPM - Simbolo: <strong>'BAMI.MI'</strong>
                                <li>BPER Banca - Simbolo: <strong>'BPE.MI'</li></strong>
                                <li>Banca Montepaschi di Siena - Simbolo: <strong>'BMPS.MI'</strong></li>
                                <li>Apple - Simbolo: <strong>'AAPL'</strong></li>
                                <li>Amazon - Simbolo: <strong>'AMZN'</strong></li>
                                <li>Juventus - Simbolo: <strong>'JUVE.MI'</strong></li>
                            </ul> 
                        </div>
                </article>
                
                
                <article class="hidden" id="legenda">
                    <div>
                        <h1>Come effettuare la ricerca:</h1>
                         <ul>
                            <li><strong>Dati:</strong> effettua la ricerca tramite il simbolo di un'azienda per ottenere i suoi dati finanziari</li>
                            <li><strong>Ricerca simbolo:</strong> effettua la ricerca tramite delle parole chiave per ottenere il simbolo e le informazioni di quell'azienda</li>
                        </ul>
                    </div>
                </article> 
                
                <article id="lista2">

                </article>
            </section>
        </article>

        <footer id="footer">
            <address>Gestione di banche e filiali</address>
            <p>Lorenzo Tomasello<br/>
            O460022018<br/> 
            Ingegneria Informatica - Canale M-Z<br/>
            Università degli Studi di Catania</p>
        </footer>
    </body>
</html>