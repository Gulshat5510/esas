@extends('layouts.panel')

@section('title') Baş sahypa teksti | Täze goşmak @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.categories.index') }}">Baş sahypa teksti</a></li>
  <li class="breadcrumb-item active" aria-current="page">Täze goşmak</li>
@endsection

@section('content')
  <form action="{{ route('panel.texts.store') }}" method="post" class="needs-validation form-wrapper sh-main br-8" novalidate>
    @csrf


    <fieldset class="mb-3">
      <legend>Tekst</legend>
      <div class="row">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <div class="col-md-6">
            <div class="form-group">
              <label for="description-{{ $localeCode }}" class="w-100"><strong>{{ $properties['native'] }} <span class="text-danger">*</span></strong></label>
              <textarea name="description[{{ $localeCode }}]" id="description-{{ $localeCode }}" class="form-control {{ $errors->has('description.' . $localeCode) ? 'is-invalid' : '' }}" required>{{ old('description.' . $localeCode) }}</textarea>
              @if ($errors->has('description.' . $localeCode))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description.' . $localeCode) }}</strong></span>
              @else
                <span class="invalid-feedback" role="alert"><strong>Hökman beýanyny ýazmaly</strong></span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </fieldset>

    <button class="btn btn-success btn-submit mt-3">Ýatda sakla</button>
  </form>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
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
