<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
                font-size: 96px;
            }

            .text {
                font-size: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Template Method Pattern</div>
                <div class="text">
                    Usado para reajustar as ordens dos metodos,
                    evitando repetições de metodos utilizando uma classe abstrata
                    <br>
                    <a href="https://sourcemaking.com/design_patterns/template_method">
                        para mais informações clique aqui
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
