<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desafio Byecar - Backend</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            body {
                background-color: #e7f1f8;
            }
            .logo {
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .form-container {
                max-width: 400px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
            }
            .form-container input[type="file"] {
                margin-bottom: 10px;
            }
            .form-container input[type="submit"] {
                width: 100%;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="logo">
                <img src="https://media.licdn.com/dms/image/C4D0BAQFGwFa7qOM8Gw/company-logo_200_200/0/1619289173031?e=1694044800&v=beta&t=xdNJgYpP5j4NcdM6GVng6HBqGMUM4xFnscsDOZuxSDc" alt="Logo" class="img-fluid">
            </div>
            <div class="form-container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="csv" class="form-control-file">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
