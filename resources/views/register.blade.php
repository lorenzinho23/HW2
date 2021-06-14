<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital@0;1&display=swap" rel="stylesheet">
        <title>HW - registrazione - O46002218</title>
        <script src="{{ asset('../public/JS/registrazione.js')}}"defer></script>
        <link href="{{ asset('../public/CSS/login.css') }}" rel="stylesheet"> 
    </head>

    <body>
        <header>
            <a id="home" href="{{ route('mhw1') }}">
                <div id="logo">idealBank</div>
            </a>
        </header>
        
        <div id="intro">
            <h1>Benvenuto nel mondo idealBank! <br>
                Registrati per scoprire i nostri servizi
            </h1>
        </div>     

        <div class="container">
            <div class="info-content">
                <div class="box">
                    <img src="../public/foto/currency.svg">
                    <h1>Currency Exchange <br> e Currency Conversion</h1>
                </div>
                <div class="box">
                    <img src="../public/foto/pay.svg">
                    <h1>Confronto tra le <br> principali banche</h1>
                </div>
                <div class="box">
                    <img src="../public/foto/undraw_Investing_re_bov7.svg">
                    <h1>Dati finanziari <br> in tempo reale</h1>
                </div>
            </div>

            <div class="login-content">
                <div class="form">
                    <h2><em>REGISTRATI</em></h2>
                    <form action="{{route('register')}}" method='POST'>
                    @csrf
                        <div class="inputBox" id="userBox"> 
                            <span id="tag"><strong>Username:</strong></span>
                            <input type="text" name="username" id="username" required>
                            <span class="error">Username non valido<span>
                        </div>
                        <div class="inputBox" id="passBox">
                            <span id="tag"><strong>Password:</strong></span>
                            <input type="password" name="password" id="password" required>
                            <span class="error">Password non valida</span>
                        </div>
                        <div class="inputBox" id="codBox">
                            <span id="tag"><strong>Codice:</strong></span>
                            <input type="text" name="codice" id="codice" required>
                            <span class="error">Codice non valido</span>
                        </div>
                        <div class="inputBox" id="cittaBox">
                            <span id="tag"><strong>Città:</strong></span>
                            <input type="text" name="citta" id="citta" required>
                            <span class="error">Citta non valida</span>
                        </div>
                        <div class="inputBox" id="regBox">
                            <span id="tag"><strong>Regione:</strong></span>
                            <input type="text" name="regione" id="regione" required>
                            <span class="error">Regione non valida</span>
                        </div>
                        <div class="inputBox" id="dataBox">
                            <span id="tag"><strong>Data di nascita (AAAA-MM-GG):</strong></span>
                            <input type="text" name="data_nascita" id="data" required>
                            <span class="error">Formato data non valido</span>
                        </div>
                        <div class="requisiti_password">
                            <img src="../public/foto/mostra.png" id="mostra">
                            <span>Requisiti password</span>
                        </div>
                        <div class="hidden" id="requisiti">
                            <p>La password deve rispettare i seguenti requisiti:</p>
                            <ul>
                                <li>Lunghezza compresa tra 8 e 20</li>
                                <li>Almeno una lettera maiuscola</li>
                                <li>Almeno un numero e un simbolo</li>
                            </ul>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Registrati" id="submit">
                        </div>
                        <div class="inputBox">
                            <p>Possiedi già un account su idealBank? <a href="{{ route('login') }}">Accedi!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>