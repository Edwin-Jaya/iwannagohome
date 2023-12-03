<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="icon" type="image/x-icon" href="{{asset("/assets/img/logo.png")}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body style="overflow:hidden;"> @if(session('error')) <div class="alert alert-danger" style="margin-bottom:0;">
        <b>Oops!</b> {{session('error')}}
    </div> @endif <div class="login-dark">
        <form action="{{ route('actionlogin') }}" method="post"> @csrf <h2 class="text-center">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
            <a class="reg-link-label">Don't have an account?</a>
            <a href="{{route("register")}}" class="reg-link">Click here</a>
            <a href="{{route("index")}}" class="reg-link" style="padding-top:10px; font-size:2vh">
                < back</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>