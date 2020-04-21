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
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="w-100"><strong>Adyny ýazyň</strong></label>
          <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $category->name }}" required>
          @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman tekst ýazmaly</strong></span>
          @endif
        </div>
      </div>
    </div>

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
