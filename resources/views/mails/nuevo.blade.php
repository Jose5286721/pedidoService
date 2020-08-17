<html>
<head>
    <title>Hola a todos</title>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Dosis', sans-serif;
        }
        .container{
            text-align:center;
            background-color:#F1F1F1;
            width:80%;
            margin-left:10%;
            padding-bottom:10px;
            padding-top:10px;
        }
        h1{
            font-family: 'Dosis', sans-serif;
        }
        img{
            height:10%;
        }

    </style> 
</head>
<div class="container">
<img src="{{ $message->embed($imagen) }}" height="50px"/>
<h1>¡ Muchas gracias por su pedido !</h1>
<h3>Dentro de unos minutos confirmamos su pedido</h3>
<p>Equipo técnico de Mini Market San Francisco</p>
</div>
</html>