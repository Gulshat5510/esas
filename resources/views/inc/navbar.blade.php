<nav class="navbar navbar-light flex-flow bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('images/logo-dark.svg') }}" alt="logo"></a>
    <ul class="navbar-nav ml-auto d-none d-sm-flex">
      <li class="nav-item {{ request()->is('*projects*') ? 'active':'' }}"><a class="nav-link" href="{{ route('projects') }}">@lang('main.projects')</a></li>
      <li class="nav-item {{ request()->is('*about*') ? 'active':'' }}"><a class="nav-link" href="{{ route('about') }}">@lang('main.about_us')</a></li>
      {{--        <li class="nav-item {{ request()->is('*contact*') ? 'active':'' }}"><a class="nav-link" href="{{ route('contact.index') }}">@lang('main.contact_us')</a></li>--}}
    </ul>
    <ul class="navbar-nav ml-auto d-flex d-sm-none">
      <li class="nav-item"><span class="nav-link" onclick="openNav()"><i data-icon="menu"></i></span></li>
    </ul>
  </div>
</nav>

