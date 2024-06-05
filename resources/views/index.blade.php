<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registra tus eventos</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #080710;
        }
        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%,-50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child {
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }
        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }
        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }
        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3 {
            font-size: 36px;
            font-weight: 600;
            line-height: 48px;
            text-align: center;
            margin-bottom: 40px;
        }
        label {
            display: block;
            margin-top: 30px;
            font-size: 18px;
            font-weight: 600;
        }


        #username:hover,
        #password:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }


        #username:hover,
        #password:hover {
            background-color: rgba(255, 255, 255, 0.13);
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 4px 4px;
        }
        .social a .fa {
            margin-right: 4px;
        }


    </style>
</head>
<body>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<div class="container">
    <header>
        <h1 style="font-size: 42px; font-weight: 700; text-align: center; margin-bottom: 40px;">Bienvenido a la aplicación de eventos</h1>
    </header>
    <main>
        <form>
            <h3>Bienvenido a la aplicación de eventos</h3>

            <label for="username" style="font-size: 20px; font-weight: 600;">¿Todavía no tienes una cuenta?</label>
            <a href="{{ route('register') }}" id="username">Regístrate ahora</a>

            <label for="password" style="font-size: 20px; font-weight: 600;">¿Ya tienes una cuenta?</label>
            <a href="{{ route('login') }}" id="password">Inicia sesión aquí</a>
        </form>
    </main>
</div>
</body>
</html>
