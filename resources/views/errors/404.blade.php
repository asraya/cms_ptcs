<!DOCTYPE html>
<html>
    <head>
        <title>Page Not Found.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
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
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <img src="{{ asset('media/logos/ptcs.png') }}" class="max-h-20px" width="270" height="170"/>
                <div class="title">Oops.. Page Not Found.</div>
                <button onclick="goBack()">Go Back</button>
            </div>
        </div>
    </body>
</html>

<script>
function goBack() {
  window.history.back();
}
</script>