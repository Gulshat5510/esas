@extends('layouts.panel')

@section('title') Proýektler | Üýtgetmek @endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2-custom.css') }}">
  <style>
    .tab-pane {
      padding-top: 1rem;
    }
  </style>
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.projects.index') }}">Proýektler</a></li>
  <li class="breadcrumb-item active" aria-current="page">Üýtgetmek</li>
@endsection

@section('content')
  <form action="{{ route('panel.projects.update', $project->id) }}" method="post" class="needs-validation form-wrapper sh-main br-8" novalidate>
    @csrf
    @method('patch')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="w-100"><strong>Adyny ýazyň</strong></label>
          <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $project->name }}" required>
          @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman tekst ýazmaly</strong></span>
          @endif
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="client" class="w-100"><strong>Klient</strong></label>
          <input type="text" name="client" id="client" class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" value="{{ $project->client }}" required>
          @if ($errors->has('client'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('client') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman klient maglumadyny ýazmaly</strong></span>
          @endif
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="year" class="w-100"><strong>Ýyly</strong></label>
          <input type="text" name="year" id="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" value="{{ $project->year }}" required>
          @if ($errors->has('year'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('year') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman ýylyny ýazmaly</strong></span>
          @endif
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="description" class="w-100"><strong>Beýany</strong></label>
          <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" required>{{ $project->description }}</textarea>
          @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman beýanyny ýazmaly</strong></span>
          @endif
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="categories">Kategoriýasyny saýlaň</label>
          <select name="categories[]" id="categories" class="form-control {{ $errors->has('categories.*') ? ' is-invalid' : '' }}" multiple>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if(in_array($category->id, $arr)) selected @endif>{{ $category->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('categories.*'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('categories.' . $localeCode) }}</strong></span>
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
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script>
      $(document).ready(function () {
          $('#categories').select2();
          $('b[role="presentation"]').hide();

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
