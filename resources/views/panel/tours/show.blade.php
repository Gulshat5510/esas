@extends('layouts.panel')

@section('title') Turlar | {{ $tour->getTranslation('title', 'en') }} @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.tours.index') }}">Turlar</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{ $tour->getTranslation('title', 'en') }}</li>
@endsection

@section('top-left')
  <form action="{{ route('panel.tours.destroy', $tour->id) }}" method="post" id="destroy-{{ $tour->id }}" class="float-right">
    @method('delete')
    @csrf
    <a href="{{ route('panel.program.create', $tour->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Program goşmak"><i data-icon="add"></i> Program goşmak</a>
    <a href="{{ route('panel.tours.edit', $tour->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Üýtgetmek"><i data-icon="edit"></i> Üýtget</a>
    <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $tour->id }}').submit(); }"
       class="btn btn-add sh-main hover-danger" title="Pozmak"><i data-icon="trash"></i> Poz</a>
  </form>
  <div class="clearfix"></div>
@endsection

@section('content')
  <div class="wrapper sh-main br-8">
    <div id="oldImages" class="row mb-3">
      @foreach($tour->images as $image)
        <div class="col-3">
          <div class="img-hold md-img">
            <img src="{{ $image->getImage() }}" alt="{{ $image->id }}" class="img-fluid">
          </div>
        </div>
      @endforeach
    </div>

    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <fieldset class="mb-3">
        <legend>{{ $properties['native'] }}</legend>
        <h6>{{ $tour->getTranslation('title', $localeCode) }}</h6>
        <hr>
        {{ $tour->getTranslation('description', $localeCode) }}
        <hr>
        {{ $tour->getTranslation('program', $localeCode) }}
      </fieldset>
    @endforeach
  </div>
@endsection