<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        #show {
            background: linear-gradient(to right, #f2f2f2, #6c63ff);
            font-family: "DejaVu Sans Mono",sans-serif;
            margin: 0;
        }

        main {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .show {
            justify-content: start;
        }

        .background {
            position: absolute;
            top: 5%;
            z-index: -3;
        }

        p div {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            background: #1d212452;
            border-radius: 15px;
            border: none;
            color: aliceblue;
            box-shadow: 1px 1px 7px black;
        }

        textarea {
            width: 100%;
            border-radius: 5px;
        }

        .btn-primary {
            width: 150px;
            background-color: #645bd6;
            border-color: #645bd6;
            border-radius: 15px;
        }

        .btn-primary:hover {
            background: #6c63ff;
            border-color: #6c63ff;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

    </style>
    <title>Snapmail new message</title>
</head>
<body id="show">
<main class="show">

    <img class="background" width="40%" src="{{ $message->embed('../public/assets/images/undraw_delivery_address_03n0.svg')  }}" alt="">
    <h3>Bonjour !</h3>
    <p style="white-space: pre-line">{{$name}} viens de vous adresser un message sur Snapmail !
        cliquez sur ce bouton pour le lire !
        <div><a href="http://127.0.0.1:8000/message/{{$code}}"><button  class="btn btn-primary">Voir le message</button></a></div>

    </p>
</main>


</body>
</html>
