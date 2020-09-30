<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@lang('web.brand')</title>

  <style>
    body {
      font-size: 16px;
      height: calc(100vh - 60px);
      margin: 0;
    }

    .container {
      max-width: 760px;
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
      -moz-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
      -o-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
      -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
      margin: 30px auto;
    }

    .content {
      padding: 30px;
    }

    ul {
      list-style: none;
      padding-left: 0;
    }

    ul li {
      margin-bottom: 8px;
    }

    p {
      line-height: 20px;
      margin-bottom: 30px;
    }

    .footer {
      padding-bottom: 16px;
      font-size: 12px;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="content">
    <ul>
      <li><strong>Ady:</strong> {{ $name }}</li>
      <li><strong>Telefon:</strong> {{ $phone }}</li>
      <li><strong>Email:</strong> {{ $email }}</li>
      @if($link)
        <li><a href="{{ $link }}" target="_blank">Click here</a></li>
      @else
        <li><strong>file ýok</strong></li>
      @endif
    </ul>

    <p>{{ $msg }}</p>
  </div>

  <div class="footer">
    &copy; {{ date('Y') }} Gurban
  </div>
</div>
</body>
</html>
