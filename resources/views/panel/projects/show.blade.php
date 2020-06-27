@extends('layouts.panel')

@section('title') {{ $project->name }} | Proýektler @endsection

@section('css')
  <style>
    .categories li {
      display: inline-block;
    }

    .categories li:after {
      display: inline-block;
      padding-left: 8px;
      padding-right: 6px;
      content: "/";
    }

    .categories li:last-child:after {
      content: none;
    }

    .buttons {
      position: absolute;
      top: 7px;
      right: 22px;
    }

    .change-type-form {
      display: inline-block;
    }

    .change-type-form + .change-type-form {
      margin-left: 6px;
    }

    .change-type-form .btn-add {
      font-size: 14px;
      padding: 6px 14px
    }

    .change-type-form .btn-add svg {
      width: 14px;
      height: 14px;
      margin-right: 2px;
    }

    .change-type-form.wide .btn-add.type svg {
      transform: rotate(90deg);
      margin-right: 0;
    }
  </style>
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.projects.index') }}">Proýektler</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
@endsection

@section('top-left')
  <form action="{{ route('panel.projects.destroy', $project->id) }}" method="post" id="destroy-{{ $project->id }}" class="float-right">
    @method('delete')
    @csrf
    <a href="{{ route('panel.projects.images.order', $project->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Saýhallamak"><i data-icon="list"></i> Saýhallamak</a>
    <a href="{{ route('panel.projects.images.create', $project->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Surat goşmak"><i data-icon="image"></i> Surat goş</a>
    <a href="{{ route('panel.projects.edit', $project->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Üýtgetmek"><i data-icon="edit"></i> Üýtget</a>
    <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $project->id }}').submit(); }"
       class="btn btn-add sh-main hover-danger" title="Pozmak"><i data-icon="trash"></i> Poz</a>
  </form>
  <div class="clearfix"></div>
@endsection

@section('content')
  <div class="wrapper sh-main br-8">
    <div class="row galleries">
      <div class="col-md-6">
        <div class="img-wrapper-normal p-rel">
          <img src="{{ $project->getCoverImage() }}" alt="project-cover-{{ $project->id }}" class="object-cover-center">
        </div>
      </div>
    </div>

    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <fieldset class="mt-3">
        <legend>{{ $properties['native'] }}</legend>
        <h4>{{ $project->getTranslation('name', $localeCode) }}</h4>
        <p>{{ $project->getTranslation('description', $localeCode) }}</p>
      </fieldset>
    @endforeach

    <div class="mt-3">
      <ul class="categories">
        @foreach($project->categories as $category)
          <li>{{ $category->name }}</li>
        @endforeach
      </ul>

      <ul>
        <li><strong>Klient:</strong> {{ $project->client }}</li>
        <li><strong>Ýyly:</strong> {{ $project->year }}</li>
      </ul>
    </div>

    <div class="row galleries">
      @foreach($project->imagesOrderBy() as $image)
        <div class="col-md-{{ $image->type == 'wide' ? '12' : '6' }}">
          <div class="img-wrapper-{{ $image->type }} p-rel">
            <img src="{{ $image->getImage() }}" alt="image-{{ $image->id }}" class="object-cover-center">
            <div class="buttons">
              <form action="{{ route('panel.images.type', $image->id) }}" method="post" id="change-{{ $image->id }}" class="change-type-form {{ $image->type }}">
                @csrf
                @method('patch')
                <a href="#" class="btn btn-add sh-main hover-success type" title="Görnüşini üýtgetmek"
                   onclick="if (confirm('Surat görnüşini üýtgetýäňizmi?')) { document.getElementById('change-{{ $image->id }}').submit(); }"><i data-icon="code"></i> Üýtget</a>
              </form>
              <form action="{{ route('panel.images.destroy', $image->id) }}" method="post" id="delete-image-{{ $image->id }}" class="change-type-form">
                @csrf
                @method('delete')
                <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('delete-image-{{ $image->id }}').submit(); }"
                   class="btn btn-add sh-main hover-danger" title="Pozmak"><i data-icon="trash"></i> Poz</a>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection