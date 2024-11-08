<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<header>
    <a href="{{ route('register') }}" class="top-button">Регистрация</a>
    <a href="{{ route('login') }}" class="top-button">Авторизация</a>
</header>
<main>
    <img src="{{asset('images/home_logo.png')}}" alt="Home Logo" class="center-image">
</main>
</body>
</html>

