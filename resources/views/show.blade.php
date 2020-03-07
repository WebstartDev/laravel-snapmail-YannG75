<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Message</title>
</head>
<body id="show">
<main class="show">
    <h1 class="text-white my-5">Snapmail</h1>
    <img class="background" width="60%" src="{{ asset('assets/images/undraw_happy_news_hxmt.svg') }}" alt="">
    <div class="card mt-5" style="width: 45%;">
        <div class="card-header text-center">
            Your Message
        </div>
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            @if(!empty($messages->photo_url) && !empty($messages))
            <img class="showImg" width="50%" src="{{asset('storage/images/'.$messages->photo_url)}}" alt="">
            @endif
            @if(!empty($messages))
            <p>{{$messages->message}}</p>
                @else
                <p>Ce message a déjà été visionné et a donc été détruit ;)</p>
                @endif
        </div>
        @if(!empty($messages))
        <span class="text-danger"><b>*Vous ne pouvez voir ce message qu'une seule fois !</b></span>
        @endif
    </div>
</main>
</body>
</html>
