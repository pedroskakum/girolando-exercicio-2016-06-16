<!DOCTYPE html>
<html>
<head>
    <title>DASHBOARD</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
        }

        .container {
            text-align: right;
            display: table-cell;
            vertical-align: top;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        Bem Vindo {{ Session::get('nomeUsuario') }} <a href="{{ route("sair.index") }}">sair</a>
    </div>
</div>
</body>
</html>
