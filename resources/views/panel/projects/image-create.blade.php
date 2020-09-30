@extends('layouts.panel')

@section('title') Surat goşmak | {{ $project->name }} | Proýektler @endsection

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
  <li class="breadcrumb-item"><a href="{{ route('panel.projects.show', $project->id) }}">{{ $project->name }}</a></li>
  <li class="breadcrumb-item active" aria-current="page">Surat goşmak</li>
@endsection

@section('content')
  <form action="{{ route('panel.projects.images.store', $project->id) }}" method="post" class="needs-validation form-wrapper sh-main br-8" enctype="multipart/form-data" novalidate>
    @csrf
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
  <script>
      $(document).ready(function () {
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
