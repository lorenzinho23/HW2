<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Josefin+Sans:ital,wght@1,600&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">        
        <title>MHW1 - O46002218</title>
        <link href="{{ asset('../public/CSS/mhw1.css') }}" rel="stylesheet"> 
        <script src="{{ asset('../public/JS/fetch_mhw1.js')}}"defer></script>
    </head>

    <body>
        <header>   
            <nav>
                <div id="logo">
                    idealBank
                </div>
                <div id="links">
                    <b href="{{ route('mhw1') }}">Home</b>
                    <a href="{{ route('mhw2') }}">Info</a>
                    <a href="{{ route('mhw3') }}">Servizi</a>
                    <a href="#footer">Contatti</a>
                    <a class="bottone" href="{{ route('login') }}">Area personale</a>
                    <a href="{{ route('logout') }}">
                    <?php 
                    if((Session::get('username') !== null)) { echo "Logout"; }
                    else echo "Login";
                    ?>
                    </a>              
                </div>
            <div id ="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            </nav>
            <h1>
                <em>La gestione delle banche siciliane</em><br/>
                <strong>Trova la banca che fa per te</strong><br/>
                
                <a class="bottone" href="{{ route('mhw2') }}">Inizia</a>
            </h1>
        </header>
        

        <section>
            <div id="main">
                <div id="foto">
                    <img src="../public/foto/handPNG.png">
                </div>
                <div id="testo">
                    <h1>Benvenuto/a su idealBank!</h1>
                    <p>
                        Questo sito confronta le migliori banche siciliane <br/>
                        per trovare la più adatta alle tue esigenze.<br/>
                        Naviga per scoprire le informazioni di cui hai bisogno, <br/> 
                        come la localizzazione delle filiali, le offerte e i movimenti concessi.<br/> 
                        Inoltre ti offriamo la possibilità di verificare in tempo reale <br/>
                        i valori delle aziende quotate in borsa, e altri servizi come Currency Exchange 
                    </p>
                </div>
            </div>
            
            <div id = "intermezzo">
                <h1><em>Le banche più scelte</em></h1>
            </div>


            <div id="contenuti">
                
            </div>
        </section>

        <footer id="footer">
            <address>Gestione di banche e filiali</address>
            <p>Lorenzo Tomasello<br/>
            O460022018<br/> 
            Ingegneria Informatica - Canale M-Z<br/>
            Università degli Studi di Catania</p>
        </footer>
    </body>
</html>