@extends('layouts.panel')

@section('title') Biz barada @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item active">Biz barada</li>
@endsection

@section('top-left')
  @if($about)
    <form action="{{ route('panel.about.destroy', $about->id) }}" method="post" id="destroy-{{ $about->id }}" class="float-right">
      @method('delete')
      @csrf
      <a href="{{ route('panel.about.edit', $about->id) }}" class="btn btn-add sh-main hover-success mr-2" title="Üýtgetmek"><i data-icon="edit"></i> Üýtget</a>
      <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $about->id }}').submit(); }"
         class="btn btn-add sh-main hover-danger" title="Pozmak"><i data-icon="trash"></i> Poz</a>
    </form>
    <div class="clearfix"></div>
  @else
    <a href="{{ route('panel.about.create') }}" class="btn btn-add sh-main float-right"><i data-icon="add"></i>Täze goşmak</a>
  @endif
@endsection

@section('content')
  <div class="wrapper sh-main br-8">
    @if($about)
      <div class="img-hold mb-4">
        <img src="{{ $about->getImage() }}" alt="about">
      </div>

      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <fieldset class="mb-3">
          <legend>{{ $properties['native'] }}</legend>
          <p>{!! $about->getTranslation('desc', $localeCode) !!}</p>
        </fieldset>
      @endforeach
    @else
      Biz barada teksti ýok
    @endif
  </div>
@endsection