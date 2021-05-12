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

@yield('navbar')

<main class="container">
  @yield('content')
</main>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="copyright"><span>&copy; Esas</span> <span class="dash">—</span> <span>@lang('main.branding_agency')</span></div>
      </div>
      <div class="col-md-6">
        <ul class="social-lists til-sm-text-right">
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Behance</a></li>
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="{{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'd-none' : '' }} lang">
              <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['script'] }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</footer>

<div class="aside d-block d-sm-none" id="menu">
  <div class="inner">
    <div class="side-nav">
      <div class="float-left">
        <a href="{{ route('index') }}"><img src="{{ asset('images/logo.svg') }}" alt="logo"></a>
      </div>
      <div class="float-right">
        <span onclick="closeNav()"><i data-icon="x"></i></span>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="side-menu">
      <ul>
        <li class="{{ request()->is('*projects*') ? 'active':'' }}"><a href="{{ route('projects') }}">@lang('main.projects')</a></li>
        <li class="{{ request()->is('*about*') ? 'active':'' }}"><a href="{{ route('about') }}">@lang('main.about_us')</a></li>
      </ul>
    </div>
    <div class="side-footer">
      <ul>
        <li><a href="tel:+99361256547">+993 61 25 65 47</a></li>
        <li><a href="mailto:gurbanmw@gmail.com">gurbanmw@gmail.com</a></li>
      </ul>
      <div class="locale">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <a class="{{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'd-none' : '' }}" hreflang="{{ $localeCode }}"
             href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['script'] }}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>

</body>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    function openNav() {
        document.getElementById("menu").style.width = "75%";
    }

    function closeNav() {
        document.getElementById("menu").style.width = "0";
    }

    $(function () {
        $('i[data-icon="menu"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>');
        $('i[data-icon="x"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>');
    });
</script>
@yield('js')
</html>