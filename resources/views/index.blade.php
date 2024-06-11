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
            font-family: 'Poppins', sans-serif;
        }
        .background {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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
            width: 90%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            padding: 40px 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            text-align: center;
        }
        form * {
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3 {
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 20px;
            font-size: 18px;
            font-weight: 600;
        }
        a {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            color: #ffffff;
            text-decoration: none;
            background-color: rgba(255, 255, 255, 0.07);
            padding: 10px 20px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }
        .container {
            position: relative;
            z-index: 2;
        }
        header h1 {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        @media (min-width: 768px) {
            .background {
                width: 430px;
                height: 520px;
            }
            form {
                height: 520px;
                width: 400px;
                padding: 50px 35px;
            }
            form h3 {
                font-size: 36px;
                font-weight: 600;
                line-height: 48px;
                margin-bottom: 40px;
            }
            label {
                font-size: 20px;
                font-weight: 600;
            }
            a {
                font-size: 18px;
            }
            header h1 {
                font-size: 42px;
                margin-bottom: 40px;
            }
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
        <h1>Bienvenido a la aplicación de eventos</h1>
    </header>
    <main>
        <form>
            <h3>Bienvenido a la aplicación de eventos</h3>
            <label for="username">¿Todavía no tienes una cuenta?</label>
            <a href="{{ secure_url(route('register')) }}" id="username">Regístrate ahora</a>
            <label for="password">¿Ya tienes una cuenta?</label>
            <a href="{{ secure_url(route('login')) }}" id="password">Inicia sesión aquí</a>
        </form>
    </main>
</div>
</body>
</html>
