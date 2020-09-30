@extends('layouts.panel')

@section('title') Biz barada | Üýtgetmek @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.about.index') }}">Biz barada</a></li>
  <li class="breadcrumb-item active" aria-current="page">Üýtgetmek</li>
@endsection

@section('content')
  <form action="{{ route('panel.about.update', $about->id) }}" method="post" class="needs-validation form-wrapper sh-main br-8" enctype="multipart/form-data" novalidate>
    @csrf
    @method('patch')
    <div class="form-group w-50">
      <label for="file" class="w-100"><strong>Surat saýlaň <span class="text-danger small ml-2">*(1MB-dan az bolmaly)</span></strong></label>
      <input type="file" name="file" id="file" class="form-control {{ $errors->has('file') ?   'is-invalid' : '' }}">
      @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('file') }}</strong></span>
      @else
        <span class="invalid-feedback" role="alert"><strong>Hökman surat saýlamaly</strong></span>
      @endif
    </div>

    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <fieldset class="mb-3">
        <legend>{{ $properties['native'] }}</legend>
        <div class="form-group">
          <label for="desc-{{ $localeCode }}" class="w-100"><strong>{{ $properties['native'] }} beýany</strong></label>
          <textarea name="desc[{{ $localeCode }}]" id="desc-{{ $localeCode }}" class="form-control {{  $errors->has('desc.' . $localeCode) ? 'is-invalid' : '' }}"
                    required>{{ $about->getTranslation('desc', $localeCode) }}</textarea>
          <span class="invalid-feedback" role="alert"><strong>Hökman beýanyny ýazmaly</strong></span>
        </div>
      </fieldset>
    @endforeach
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