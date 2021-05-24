@extends('layouts.panel')

@section('title') Habarlaşmak | {{ $is_create ? 'Täze goşmak' : 'Üýtgetmek' }} @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.about.index') }}">Habarlaşmak</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{ $is_create ? 'Täze goşmak' : 'Üýtgetmek' }} </li>
@endsection

@section('content')
  <form action="{{ route('panel.contact.update', $contact->id) }}" method="post" class="needs-validation form-wrapper sh-main br-8" enctype="multipart/form-data" novalidate>
    @csrf
    @method('patch')
    @if ($contact->slug != 'address')
        <div class="form-group w-50">
      <label for="data" class="w-100"><strong>{{ config('contact.'.$contact->slug) }}</strong></label>
      <input type="text" name="data" id="data" class="form-control {{ $errors->has('data') ?   'is-invalid' : '' }}" value="{{ $contact->data }}" required>
      @if ($errors->has('data'))
        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('data') }}</strong></span>
      @else
        <span class="invalid-feedback" role="alert"><strong>boş bolmaly däl</strong></span>
      @endif
    </div>
    @else
     @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <fieldset class="mb-3">
        <legend>{{ $properties['native'] }}</legend>
        <div class="form-group">
          <label for="address-{{ $localeCode }}" class="w-100"><strong>{{ $properties['native'] }} adres</strong></label>
          <textarea name="address[{{ $localeCode }}]" id="address-{{ $localeCode }}" class="form-control {{  $errors->has('address.' . $localeCode) ? 'is-invalid' : '' }}"
                    required>{{ $contact->getTranslation('address', $localeCode) }}</textarea>
          <span class="invalid-feedback" role="alert"><strong>Hökman adresini ýazmaly</strong></span>
        </div>
      </fieldset>
    @endforeach
    @endif
    <button class="btn btn-success btn-submit mt-3">Ýatda sakla</button>
  </form>
@endsection

@section('js')
  <script>
      $(function () {
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
      });
  </script>
@endsection