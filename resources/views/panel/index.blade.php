@extends('layouts.panel')

@section('title') Dashboard @endsection

@section('breadcrumb')
  <li class="breadcrumb-item active" aria-current="page">Baş sahypa</li>
@endsection

@section('content')
  @if(count($arr))
    <div class="row">
      @foreach($arr as $key => $item)
        <div class="col-md-3">
          <a class="stats sh-main br-8" href="{{ $item['link'] }}">
            <span class="d-block number">{{ $item['count'] }}</span>
            <span class="d-block name">{{ $item['name'] }}</span>
          </a>
        </div>
      @endforeach
    </div>
  @endif


  <div class="wrapper sh-main br-8 mt-5">
    @if($text)
      <form action="{{ route('panel.texts.destroy', $text->id) }}" method="post" id="destroy-{{ $text->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.texts.edit', $text->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $text->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.texts.create') }}" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    <h4>Baş sahypa teksti</h4>
    <div class="clearfix"></div>
    @if($text)
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <fieldset class="mt-3">
            <legend>{{ $properties['native'] }}</legend>
            <p>{{ $text->getTranslation('description', $localeCode) }}</p>
          </fieldset>
        @endforeach
    @endif
  </div>

@endsection
