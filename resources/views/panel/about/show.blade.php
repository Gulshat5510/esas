@extends('layouts.panel')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('panel.banners.index') }}">Banners</a></li>
  <li class="breadcrumb-item active">{{ $banner->title }}</li>
@endsection

@section('top-left')
  <form action="{{ route('panel.banners.destroy', $banner->id) }}" method="post" id="destroy-{{ $banner->id }}" class="float-right">
    @method('delete')
    @csrf
    <a href="{{ route('panel.banners.edit', $banner->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Üýtgetmek"><i data-icon="edit"></i> Üýtget</a>
    <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $banner->id }}').submit(); }"
       class="btn btn-add sh-main hover-danger" title="Pozmak"><i data-icon="trash"></i> Poz</a>
  </form>
  <div class="clearfix"></div>
@endsection

@section('content')


  <div class="wrapper sh-main br-8">
    <div class="col-3">
      <div class="img-hold md-img">
        <img src="{{ $banner->getImage() }}" alt="" class="img-fluid">
      </div>
    </div>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <fieldset class="mb-3">
        <legend>{{ $properties['native'] }}</legend>
        <h6>{{ $banner->getTranslation('title', $localeCode) }}</h6>
        <hr>
        <div><strong>Description</strong></div>
        {!! $banner->getTranslation('desc', $localeCode) !!}
      </fieldset>
    @endforeach
  </div>

@endsection