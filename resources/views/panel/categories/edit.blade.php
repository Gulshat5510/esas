@extends('layouts.panel')

@section('title') Kategoriýalar | Üýtgetmek @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.categories.index') }}">Kategoriýalar</a></li>
  <li class="breadcrumb-item active" aria-current="page">Üýtgetmek</li>
@endsection

@section('content')
  <form action="{{ route('panel.categories.update', $category->id) }}" method="post" class="needs-validation form-wrapper sh-main br-8" novalidate>
    @csrf
    @method('patch')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="w-100"><strong>Slug</strong></label>
          <span class="d-block disabled">{{ $category->slug }}</span>
        </div>
      </div>
    </div>
    <fieldset class="mb-3">
      <legend>Kategoriýa ady</legend>
      <div class="row">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <div class="col-md-6">
            <div class="form-group">
              <label for="name-{{ $localeCode }}" class="w-100"><strong>{{ $properties['native'] }} <span class="text-danger">*</span></strong></label>
              <input type="text" name="name[{{ $localeCode }}]" id="name-{{ $localeCode }}" class="form-control {{ $errors->has('name.' . $localeCode) ? 'is-invalid' : '' }}"
                     value="{{ $category->getTranslation('name', $localeCode) }}" required>
              @if ($errors->has('name.' . $localeCode))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name.' . $localeCode) }}</strong></span>
              @else
                <span class="invalid-feedback" role="alert"><strong>Hökman tekst ýazmaly</strong></span>
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
