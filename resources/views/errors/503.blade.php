<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <title>Pagina nao encontrada.</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #e3f8ff;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
                color: white;
                text-shadow: 1px 1px 1px #000000;
            }
            body {
                background-image: url("/assets/img/fundo404.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;

            }

        </style>
    </head>
    <body>

    <div align="center"class="container">
            <div  class="content">
                <div class="title">404 ERRO<br>Ops... Parece que<br> voce esta perdido.</div>
            </div><br>
        <!-- Large button group -->
        <div align="center" class="btn-group">

            <a href="{{ url('home') }}" class="btn btn-voltar404 btn-lg" ><span class="glyphicon glyphicon-arrow-left" ></span> Voltar para pagina inicial</a>

        </div>


    </body>
</html>
