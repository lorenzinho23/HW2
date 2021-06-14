<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital@0;1&display=swap" rel="stylesheet">
        <title>HW - Login - O46002218</title>
        <script src="{{ asset('../public/JS/login.js')}}"defer></script>
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
                Accedi con le tue credenziali
            </h1>
        </div>     

        <div class="container">
            <div class="login-content"> 
                <div class="form">
                    <h2><em>LOGIN</em></h2>
                    @if(Session::has('errors'))
                        {{Session::get('errors')->first()}}
                    @endif
                    <form action="{{ route('login') }}" method='POST' name='form_login'>
                    @csrf
                        <div class="inputBox" id="userBox"> 
                            <span id="tag"><strong>Username:</strong></span>
                            <input type="text" name='username' id="username" required>
                            <span class="error">Username non valido<span>
                        </div>
                        <div class="inputBox" id="passBox">
                            <span id="tag"><strong>Password:</strong></span>
                            <input type="password" name='password' required>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Accedi" id="submit">
                        </div>
                        <div class="inputBox">
                            <p>Non hai ancora un account idealBank? <a href="{{ route('register') }}">Registrati!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>