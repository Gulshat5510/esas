@extends('layouts.panel')

@section('title') Turlar | Täze goşmak @endsection

@section('css')
  <style>
    .clone {
      padding: 1px 10px 3px;
    }

    .clone svg {
      width: 20px;
      height: 20px;
    }
  </style>
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.tours.index') }}">Turlar</a></li>
  <li class="breadcrumb-item active" aria-current="page">Täze goşmak</li>
@endsection

@section('content')
  <form action="{{ route('panel.tours.store') }}" method="post" class="needs-validation form-wrapper sh-main br-8" enctype="multipart/form-data" novalidate>
    @csrf
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <fieldset class="mb-3">
        <legend>{{ $properties['native'] }}</legend>
        <div class="form-group">
          <label for="title-{{ $localeCode }}">Temasy</label>
          <input type="text" id="title-{{ $localeCode }}" name="title[{{ $localeCode }}]" value="{{ old('title.' . $localeCode) }}"
                 class="form-control {{ $errors->has('title.' . $localeCode) ? ' is-invalid' : '' }}" required>
          @if ($errors->has('title.' . $localeCode))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('title.' . $localeCode) }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman temasyny ýazmaly</strong></span>
          @endif
        </div>
        <div class="form-group">
          <label for="description-{{ $localeCode }}">Teksti</label>
          <textarea name="description[{{ $localeCode }}]" id="description-{{ $localeCode }}" required
                    class="form-control {{ $errors->has('description.' . $localeCode) ? ' is-invalid' : '' }}">{{ old('description.' . $localeCode) }}</textarea>
          @if ($errors->has('description.' . $localeCode))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description.' . $localeCode) }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman tekstini ýazmaly</strong></span>
          @endif
        </div>
        <div class="form-group">
          <label for="program-{{ $localeCode }}">Programmasy barada gysgaça beýany</label>
          <textarea name="program[{{ $localeCode }}]" id="program-{{ $localeCode }}" class="form-control {{ $errors->has('program.' . $localeCode) ? ' is-invalid' : '' }}"
                    required>{{ old('program.' . $localeCode) }}</textarea>
          @if ($errors->has('program.' . $localeCode))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('program.' . $localeCode) }}</strong></span>
          @else
            <span class="invalid-feedback" role="alert"><strong>Hökman gysga beýanyny ýazmaly</strong></span>
          @endif
        </div>
      </fieldset>
    @endforeach
    <div class="text-right">
      <span class="btn btn-success-inv clone"><i data-icon="add"></i></span>
    </div>
    <div class="row">
      <div class="col-md-4 copy">
        <div class="form-group">
          <label for="image" class="w-100"><strong>Surat saýlaň</strong> <span class="float-right remove">remove</span><span class="clearfix"></span></label>
          <input type="file" name="images[]" id="image" multiple class="form-control {{ $errors->has('img') ? 'is-invalid' : '' }}" required>
          <span class="invalid-feedback" role="alert"><strong>Hökman surat saýlamaly</strong></span>
        </div>
      </div>
    </div>
    <button class="btn btn-success btn-submit mt-3">Ýatda sakla</button>
  </form>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.remove').click(function () {
              $(this).parents('.copy').remove();
          });

          let cloneDiv = $('.copy').clone(true);

          $('span.remove').remove();

          $('.clone').click(function () {
              $('.copy').parent().append(cloneDiv.clone(true));
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
      });
  </script>
@endsection
