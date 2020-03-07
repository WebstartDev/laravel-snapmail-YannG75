<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Snapmail</title>
</head>
<body>
<main>
    <h1 class="text-white">Snapmail</h1>
    <img class="background" width="65%" src="{{ asset('assets/images/undraw_team_chat_y27k.svg') }}" alt="">
    <div class="card" style="width: 45%;">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                           value="{{ old('name') }}" placeholder="Your Full name">
                    @error('name')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" value="{{ old('email') }}" placeholder="Destinataire E-mail">
                    @error('email')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="img">The picture to send (if there is one)</label>
                    <input type="file" name="img" class="form-control-file" id="img">

                </div>
                <div class="form-group">
                    <textarea name="message" id="message" rows="5" class="@error('message') is-invalid @enderror"
                              placeholder="Your message...">{{ old('message') }}</textarea>
                    @error('message')
                    <div class=" text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>

            </form>
        </div>
    </div>
    @if(isset($success))
        <div class="alert alert-success">{{$success}}</div>
    @endif
</main>


</body>
</html>
