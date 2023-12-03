<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="{{asset("/assets/img/logo.png")}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>

<body>
    <div class="login-dark">
        <form action={{{route('actionregister')}}} method="post"> @csrf <h2 class="text-center">Register Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input class="form-control" type="date" name="date_of_birth" placeholder="Date of Birth"></div>
            <div class="form-group"><input class="form-control" type="text" name="phone" placeholder="Phone"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Register</button></div>
            <a class="reg-link-label">Already have an account?</a>
            <a href="{{route("login")}}" class="reg-link">Click here</a>
            <a href="{{route("login")}}" class="reg-link" style="padding-top:10px; font-size:2vh">
                < back</a>
        </form> @if (session('message')) <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div> @endif @if (session('error')) <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div> @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>