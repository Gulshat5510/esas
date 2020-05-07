<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') @lang('main.brand') </title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @yield('css')
</head>
<body>
@yield('flash-message')
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ request()->is('*projects*') ? 'active':'' }}"><a class="nav-link" href="{{ route('projects') }}">@lang('main.projects')</a></li>
        <li class="nav-item {{ request()->is('*about*') ? 'active':'' }}"><a class="nav-link" href="{{ route('about') }}">@lang('main.about_us')</a></li>
        <li class="nav-item {{ request()->is('*contact*') ? 'active':'' }}"><a class="nav-link" href="{{ route('contact.index') }}">@lang('main.contact_us')</a></li>
      </ul>
    </div>
  </div>
</nav>
<main class="container">
  @yield('content')
</main>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="copyright">esas&copy; {{ date('Y') }} — @lang('main.branding_agency')</div>
      </div>
      <div class="col-md-6">
        <ul class="social-lists til-sm-text-right">
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Behance</a></li>
          <li>
            <div class="btn-group dropup">
              <a class="btn btn-white dropdown-toggle text-uppercase" href="#" role="button" id="dropdownLocale" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false">{{ LaravelLocalization::getCurrentLocaleScript() }}</a>
              <div class="dropdown-menu" aria-labelledby="dropdownLocale">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a class="dropdown-item text-uppercase {{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'd-none' : '' }}" hreflang="{{$localeCode}}"
                     href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['script'] }}</a>
                @endforeach
              </div>
            </div>
          </li>
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