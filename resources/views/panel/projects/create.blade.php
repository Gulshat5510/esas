@extends('layouts.panel')

@section('title') Proýektler | Täze goşmak @endsection

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
  <li class="breadcrumb-item active" aria-current="page">Täze goşmak</li>
@endsection

@section('content')
  <form action="{{ route('panel.projects.store') }}" method="post" class="needs-validation form-wrapper sh-main br-8" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="client" class="w-100"><strong>Klient <span class="text-danger">*</span></strong></label>
          <input type="text" name="client" id="client" class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" value="{{ old('client') }}" required>
          @if ($errors->has('client'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('client') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman klient maglumadyny ýazmaly</strong></span>
          @endif
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="year" class="w-100"><strong>Ýyly <span class="text-danger">*</span></strong></label>
          <input type="text" name="year" id="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" value="{{ old('year') }}" required>
          @if ($errors->has('year'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('year') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman ýylyny ýazmaly</strong></span>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="file" class="w-100"><strong>Cover surat saýlaň <span class="text-danger ml-1">*</span></strong></label>
          <input type="file" name="file" id="image" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" required>
          @if ($errors->has('file'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('file') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman surat saýlamaly</strong></span>
          @endif
        </div>
      </div>
    </div>
    <fieldset class="mb-3">
      <legend>Proýekt ady</legend>
      <div class="row">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <div class="col-md-6">
            <div class="form-group">
              <label for="name-{{ $localeCode }}" class="w-100"><strong>{{ $properties['native'] }} <span class="text-danger">*</span></strong></label>
              <input type="text" name="name[{{ $localeCode }}]" id="name-{{ $localeCode }}" class="form-control {{ $errors->has('name.' . $localeCode) ? 'is-invalid' : '' }}"
                     value="{{ old('name.' . $localeCode) }}" required>
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
    <fieldset class="mb-3">
      <legend>Beýany</legend>
      <div class="row">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <div class="col-md-6">
            <div class="form-group">
              <label for="description-{{ $localeCode }}" class="w-100"><strong>{{ $properties['native'] }} <span class="text-danger">*</span></strong></label>
              <textarea name="description[{{ $localeCode }}]" id="description-{{ $localeCode }}"
                        class="form-control editor {{ $errors->has('description.' . $localeCode) ? 'is-invalid' : '' }}" required>{{ old('description.' . $localeCode) }}</textarea>
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
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="categories">Kategoriýasyny saýlaň <span class="text-danger">*</span></label>
          <select name="categories[]" id="categories" class="form-control {{ $errors->has('categories') ? ' is-invalid' : '' }}" multiple>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('categories'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('categories') }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman tekst ýazmaly</strong></span>
          @endif
        </div>
      </div>
    </div>
    <div class="text-right mb-3">
      <span class="btn btn-success-inv clone"><i data-icon="add"></i></span>
    </div>
    <div class="row">
      <div class="col-md-6 copy">
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="image" class="w-100"><strong>Surat saýlaň <span class="text-danger ml-1">*</span></strong></label>
              <input type="file" name="images[]" id="image" multiple class="form-control {{ $errors->has('images.0') ? 'is-invalid' : '' }}" required>
              @if ($errors->has('images.0'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('images.0') }}</strong></span>
              @else
                <span class="invalid-feedback" role="alert"><strong>Hökman surat saýlamaly</strong></span>
              @endif
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="types" class="w-100">Görnüşi <span class="float-right remove">remove</span><span class="clearfix"></span></label>
              <select name="types[]" id="types" class="form-control">
                <option value="wide">Wide</option>
                <option value="normal">Normal</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button class="btn btn-success btn-submit mt-3">Ýatda sakla</button>
  </form>
@endsection

@section('js')
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="{{ asset('js/ckeditor5/ckeditor.js') }}"></script>
  <script src="{{ asset('js/ckeditor5/translations/ru.js') }}"></script>
  <script>
      $(function () {
          $('#categories').select2();
          $('b[role="presentation"]').hide();

          $('.remove').click(function () {
              $(this).parents('.copy').remove();
          });

          let cloneDiv = $('.copy').clone(true);

          $('span.remove').remove();

          $('.clone').click(function () {
              $('.copy').parent().append(cloneDiv.clone(true));
          });

          let allEditors = document.querySelectorAll('.editor');
          for (let i = 0; i < allEditors.length; ++i) {
              ClassicEditor.create(allEditors[i], {
                  language: 'ru'
              });
          }

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
