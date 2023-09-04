<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>

    <body>
        <nav>
            <div class="container-fluid">
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo center">Home</a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="/especialidades">Cadastro de Especialidades</a></li>
                        <li><a href="/medicos">Cadastro de Medicos</a></li>
                        <li><a href="/relatorio">Relatório</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('conteudo')

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <script>
            M.AutoInit();
        </script>
    </body>

</html>
