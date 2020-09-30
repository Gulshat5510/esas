@extends('layouts.panel')

@section('title') Surat saýhallamak | {{ $project->name }} | Proýektler @endsection

@section('css')
  <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
  <style>
    #sortable {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 60%;
    }

    #sortable li {
      margin: 0 3px 3px 3px;
      padding: 0.4em 0.4em 0.4em 0;
      float: unset;
      text-align: left;
      cursor: grab;
    }
  </style>
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.projects.index') }}">Proýektler</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.projects.show', $project->id) }}">{{ $project->name }}</a></li>
  <li class="breadcrumb-item active" aria-current="page">Surat saýhallamak</li>
@endsection

@section('content')
  <div class="wrapper sh-main br-8">
    <form class="form-horizontal" role="form" autocomplete="off" method="POST" action="{{ route('panel.images.order') }}">
      @csrf
      @method('patch')
      <input type="hidden" name="project_id" value="{{ $project->id }}">
      <ul id="sortable">
        @foreach($images as $image)
          <li>
            <img src="{{ $image->getImage() }}" alt="{{ $image->id }}" height="100px">
            <input type="hidden" name="ids[]" value="{{ $image->id }}">
          </li>
        @endforeach
      </ul>
      <button class="btn btn-success btn-submit mt-3">Ýatda sakla</button>
    </form>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
  <script>
      $(function () {
          let sortable = $("#sortable");

          sortable.sortable();
          sortable.disableSelection();
      });
  </script>
@endsection
