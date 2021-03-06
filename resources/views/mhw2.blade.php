<?php
    if(Session::get('id_session')!=0) {
        $var=true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MHW2 - O46002218</title>
        <link href="{{ asset('../public/CSS/mhw2.css') }}" rel="stylesheet">
        <script src="{{ asset('../public/JS/mhw2.js')}}"defer></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Josefin+Sans:ital,wght@1,600&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
            <div id="logo">idealBank</div>
            <div id="links">
                <a href="{{ route('mhw1') }}">Home</a>
                <b href="{{ route('mhw2') }}">Info</b>
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
            <input type="hidden" id="log" value="<?php if(isset($var) && $var==true) {
                echo $var;
            } ?>">
            <input type="hidden" id="sessione" value="<?php echo Session::get('id_session');?>">
        </header>

        <div id="principale">
            <div id="scritta">    
                <h1>Scegli la banca su misura per te!</h1>
                <p>Qui troverai una selezione delle banche principali:</br> 
                seleziona quelle che ti interessano per aggiungerle alla sezione "preferiti"</br>
                Clicca <em>"maggiori informazioni"</em> per avere ulteriori dettagli</p>
            </div>        
        </div>
        
        <article>
            <!-- ----- PREFERITI ----- -->
            <div id ="testoP" class="hidden">
                <h1>Preferiti </h1>
                <p>Per rimuovere dai preferiti clicca sulla X</p>
            </div>
            
            <!-- ----- verr?? riempita coi vari box in JS ----- -->
            <section class="hidden" id="preferiti">

            </section>
            
            <!-- ----- SCRITTA + RICERCA ----- -->
            <div id="banche">
                <h1>Tutte le banche disponibili</h1>
            </div>

            <div id="ricerca"> 
                <img src="../public/foto/cerca.ico">
                <input type="text" id="cerca" placeholder="Digita qui per cercare...." >
            </div>

            <!-- ----- BOX DEGLI ELEMENTI ----- -->
            <!-- ----- verranno caricati dinamicamente ----- -->
            <section class="elementi" id="elementi">
                
            </section>
        </article>
        <!-- ----- FOOTER ----- -->
        
        <footer id="footer">
            <address>Gestione di banche e filiali</address>
            <p>Lorenzo Tomasello<br/>
            O460022018<br/> 
            Ingegneria Informatica - Canale M-Z<br/>
            Universit?? degli Studi di Catania</p>
        </footer>
    </body>
</html>
