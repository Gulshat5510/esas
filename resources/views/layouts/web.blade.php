<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') Esas &nbsp; · &nbsp; Брендинговое агентство </title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @yield('css')
</head>
<body>
@yield('flash-message')
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('index') }}">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ request()->is('*projects*') ? 'active':'' }}"><a class="nav-link" href="{{ route('projects') }}">Проекты</a></li>
        <li class="nav-item {{ request()->is('*about*') ? 'active':'' }}"><a class="nav-link" href="{{ route('about') }}">О нас</a></li>
        <li class="nav-item {{ request()->is('*contact*') ? 'active':'' }}"><a class="nav-link" href="{{ route('contact.index') }}">Контакты</a></li>
      </ul>
    </div>
  </div>
</nav>
<main class="container-fluid">
  @yield('content')
</main>
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <ul class="contact-lists">
          <li><a href="mailto:contact@gurban.com">contact@gurban.com</a></li>
          <li><a href="tel:+99361256547">+993 61 256547</a></li>
        </ul>
        <div class="copyright">esas&copy; {{ date('Y') }} — Брендинговое агентство</div>
      </div>
      <div class="col-md-6">
        <ul class="social-lists til-sm-text-right">
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Behance</a></li>
          <li><a href="#">Dribbble</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    $(function () {

    });
</script>
@yield('js')
</html>