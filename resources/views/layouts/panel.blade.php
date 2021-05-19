<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  {{--  <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | Admin Panel | Pikir Software </title>
  <link href="{{ mix('css/panel.css') }}" rel="stylesheet">
  @yield('css')
</head>

<body>
<div class="sidebar">
  <div class="brand pb-0"><a href="{{ route('panel.index') }}"><img src="{{ asset('images/logo-dark.svg') }}" alt="logo"></a></div>
  <div class="inner">
    <ul class="menu">
      <li><a href="{{ route('panel.index') }}" class="menu-link {{ request()->is('panel') ? 'active' : '' }}"><i data-icon="home"></i>Baş sahypa</a></li>
      <li><a href="{{ route('panel.about.index') }}" class="menu-link {{ request()->is('*about*') ? 'active' : '' }}"><i data-icon="file-text"></i>About us</a></li>
      <li><a href="{{ route('panel.categories.index') }}" class="menu-link {{ request()->is('panel/categories*') ? 'active' : ''}}"><i data-icon="layers"></i>Kategoriýalar</a></li>
      <li><a href="{{ route('panel.projects.index') }}" class="menu-link {{ request()->is('panel/projects*') ? 'active' : '' }}"><i data-icon="briefcase"></i>Proýektler</a></li>
      <li><a href="{{ route('panel.contact.index') }}" class="menu-link {{ request()->is('panel/contact*') ? 'active' : '' }}"><i data-icon="inbox"></i>Gelen hatlar</a></li>
    </ul>
  </div>
</div>

<div class="main">
  <nav class="navbar navbar-expand-sm navbar-dark bg-success">
    {{--    <form class="form-inline">--}}
    {{--      <span><i data-icon="search"></i></span><input class="form-control" type="search" placeholder="Search" aria-label="Search">--}}
    {{--    </form>--}}
    <ul class="navbar-nav ml-auto">
      {{--      <li class="nav-item dropdown">--}}
      {{--        <a class="nav-link dropdown-toggle" href="#" id="navBell" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
      {{--          <i data-icon="bell"></i>--}}
      {{--        </a>--}}
      {{--        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navBell">--}}
      {{--          <a class="dropdown-item" href="#">Action</a>--}}
      {{--          <a class="dropdown-item" href="#">Another action</a>--}}
      {{--        </div>--}}
      {{--      </li>--}}
      {{--      <li class="nav-item dropdown">--}}
      {{--        <a class="nav-link dropdown-toggle" href="#" id="navCalendar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
      {{--          <i data-icon="calendar"></i>--}}
      {{--        </a>--}}
      {{--        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navCalendar">--}}
      {{--          <a class="dropdown-item" href="#">Action</a>--}}
      {{--          <a class="dropdown-item" href="#">Another action</a>--}}
      {{--        </div>--}}
      {{--      </li>--}}
      {{--      <li class="nav-item dropdown">--}}
      {{--        <a class="nav-link dropdown-toggle" href="#" id="navMessage" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
      {{--          <i data-icon="message"></i>--}}
      {{--        </a>--}}
      {{--        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navMessage">--}}
      {{--          <a class="dropdown-item" href="#">Action</a>--}}
      {{--          <a class="dropdown-item" href="#">Another action</a>--}}
      {{--        </div>--}}
      {{--      </li>--}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle user" href="#" id="navAuth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('images/icons/user.svg') }}" alt="user">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navAuth">
          <a class="dropdown-item" href="{{ route('panel.profile.edit') }}">Profile</a>
          <a class="dropdown-item" href="{{ route('panel.password.edit') }}">Parol çalyşmak</a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Çykyş
            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">@csrf</form>
          </a>
          <a class="dropdown-item" href="{{ route('index') }}">Öň tarapa geçiş</a>
        </div>
      </li>
    </ul>
  </nav>
  <div class="content">
    <div id="messages">
      @include('inc.messages')
    </div>

    <div class="top-wrapper">
      <nav id="breadcrumb" aria-label="breadcrumb" class="sh-main">
        <ol class="breadcrumb">
          @yield('breadcrumb')
        </ol>
      </nav>

      @yield('top-left')
    </div>

    @yield('content')
  </div>
</div>

</body>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('i[data-icon="search"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>');
        $('i[data-icon="message"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="message"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>');
        $('i[data-icon="calendar"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>');
        $('i[data-icon="bell"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>');
        $('i[data-icon="eye"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>');
        $('i[data-icon="edit"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>');
        $('i[data-icon="add"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>');
        $('i[data-icon="trash"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>');
        $('i[data-icon="edit-2"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>');
        $('i[data-icon="home"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>');
        $('i[data-icon="layers"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>');
        $('i[data-icon="image"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>');
        $('i[data-icon="briefcase"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>');
        $('i[data-icon="list"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>');
        $('i[data-icon="code"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>');
        $('i[data-icon="user"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>');
        $('i[data-icon="inbox"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>');
        $('i[data-icon="file-text"]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>');

      @if($errors->any() || session('success') || session('error') || session('warning') || session('danger'))
      setTimeout(function () {
          $('#messages').fadeOut('slow');
      }, 5000);
      @endif
    });
</script>
@yield('js')
</html>