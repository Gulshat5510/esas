@extends('layouts.web')

@section('title') Контакты | @endsection

@section('flash-message')
  <div id="messages">
    <div id="coming" class="alert alert-success d-none">Coming soon</div>
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
  </div>
@endsection
@section('content')
  <section id="contact">
    <div class="row">
      <div class="col-lg-6">
        <h4>Контакты</h4>
        <p class="contact-desc">Ашхабад, улица Московская, дом Айболек</p>
        <ul class="lists">
          <li><a href="mailto:contact@gurban.com">contact@gurban.com</a></li>
          <li><a href="tel:+99361256547">+(993) 61 256547</a></li>
        </ul>
      </div>

      <div class="col-lg-6 from-col">
        <h4>Обсудим ваш проект?</h4>
        <p class="contact-desc light">Заполните форму ниже и мы свяжемся с вами в ближайшее время.</p>
        <form action="{{ route('contact.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" aria-label="name" value="{{ old('name') }}" placeholder="Имя"
                       required autofocus>
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                @else
                  <span class="invalid-feedback" role="alert"><strong>Hökman adyňyzy ýazmaly</strong></span>
                @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" aria-label="phone" value="{{ old('phone') }}"
                       placeholder="Телефон" required>
                @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span>
                @else
                  <span class="invalid-feedback" role="alert"><strong>Hökman telefon nomer ýazmaly</strong></span>
                @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" aria-label="email" value="{{ old('email') }}"
                       placeholder="Почта" required>
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                @else
                  <span class="invalid-feedback" role="alert"><strong>Hökman email ýazmaly</strong></span>
                @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="custom-file">
                <button type="button" class="{{ $errors->has('file') ? 'is-invalid' : '' }}">Прикрепить файл</button>
                <input type="file" name="file" class="d-none" aria-label="file" placeholder="file">
                @if ($errors->has('file'))
                  <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('file') }}</strong></span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <textarea name="msg" class="form-control {{ $errors->has('msg') ? 'is-invalid' : '' }}" aria-label="msg" placeholder="Сообщения"
                          required>{{ old('msg') }}</textarea>
                @if ($errors->has('msg'))
                  <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('msg') }}</strong></span>
                @else
                  <span class="invalid-feedback" role="alert"><strong>Hökman tekst ýazmaly</strong></span>
                @endif
              </div>
            </div>
            <button class="btn btn-with" type="submit">Отправить <span><i data-icon="arrow"></i></span></button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script>
      $(function () {
          $('i[data-icon=arrow]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="13.947" height="9.317" viewBox="0 0 13.947 9.317"><g id="arrow" transform="translate(-1073.214 -3556.812)"><path id="Path_4" d="M924.714,2856.5H937.46" transform="translate(149 705)" fill="#fff" stroke="#969696" stroke-linecap="round" stroke-width="1"></path><path id="Path_6" d="M933.613,2856.422l3.841-3.9" transform="translate(149 709)" fill="#fff" stroke="#969696" stroke-linecap="round" stroke-width="1"></path><path id="Path_7" d="M937.454,2856.422l-3.841-3.9" transform="translate(149 705)" fill="#fff" stroke="#969696" stroke-linecap="round" stroke-width="1"></path></g></svg>');

          $('.custom-file button').click(function (e) {
              e.preventDefault();
              $(this).siblings('input').click();
          });

          $('input[type=file]').change(function () {
              if ($(this).val() !== '') {
                  $(this).siblings('button').text($(this).val());
              } else {
                  $(this).siblings('button').text('Прикрепить файл');
              }
          });

          (function () {
              'use strict';
              window.addEventListener('load', function () {
                  let forms = document.getElementsByClassName('needs-validation');
                  Array.prototype.filter.call(forms, function (form) {
                      form.addEventListener('submit', function (event) {
                          if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                          }
                          form.classList.add('was-validated');
                      }, false);
                  });
              }, false);
          })();

        @if($errors->any() || session('success') || session('error') || session('warning') || session('danger'))
        setTimeout(function () {
            $('#messages').fadeOut('slow');
        }, 5000);
        @endif
      });
  </script>
@endsection
