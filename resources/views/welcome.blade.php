<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @include('css.style');
        </style>
</head>
<body>
<form action="{{ route('signup') }}" method="post" class="register-form">
    @csrf
    <div class="login-page">
        <div class="form">
            <input type="text" name="name" placeholder="name"/>
            <input type="password" name="password" placeholder="password"/>
            <input type="email" name="email" placeholder="email address"/>
            <input type="submit" value="create">
            <p class="message">Already registered? <a href="{{ route('login') }}">Log In</a></p>

        </div>
      </div>
</form>
</body>
</html>
