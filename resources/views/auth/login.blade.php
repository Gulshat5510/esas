<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Giriş | Pikir Software</title>

  <link href="{{ mix('css/panel.css') }}" rel="stylesheet">
  @yield('css')
</head>

<body>
<div class="login-wrapper">
  <div class="form-wrapper">
    <div class="text-center">
      <a href="{{ route('index') }}"><img src="{{ asset('images/logo-dark.svg') }}" alt="logo" class="logo"></a>
      <h4 class="mt-4 mb-5">Hoş geldiňiz</h4>
    </div>
    <form action="{{ route('login') }}" method="post">
      @csrf
      <div class="form-group">
        <input type="text" aria-label="username" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Ulanyjy ady"
               value="{{ old('username') }}" required autofocus>
        @if ($errors->has('username'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('username') }}</strong></span>
        @endif
      </div>
      <div class="form-group">
        <input type="password" aria-label="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
               placeholder="Açar sözi" required>
        @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
        @endif
      </div>
      <div class="form-group">
        <label class="check-label">
          <span class="text">Ýatda sakla</span>
          <input type="checkbox" value="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
          <span class="check-mark"></span>
        </label>
      </div>
      <button type="submit" class="btn btn-success">Giriş</button>
    </form>
  </div>
</div>
</body>
@yield('js')
<script src="{{ mix('js/app.js') }}"></script>
</html>