<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/login.css">
    <title>@lang('login')</title>
</head>
<body>
<form class="login-form" action="{{ route('login') }}" method="POST">

    {{ csrf_field() }}
    <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
    </p>
    <input type="email" class="login-username" id="email" name="email" autofocus="true" required="true"
           placeholder="Email"/>
    @if ($errors->has('email'))
        <strong>{{ $errors->first('email') }}</strong>
    @endif
    <input type="password" class="login-password" name="password" id="password" required="true" placeholder="Пароль"/>
    @if ($errors->has('password'))
        <strong>{{ $errors->first('password') }}</strong>
    @endif
    <input type="submit" name="Login" value="Войти" class="login-submit"/>
</form>
<a class="login-forgot-pass">забыл пароль?</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
</body>
</html>
