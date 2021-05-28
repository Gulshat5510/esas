@extends('layouts.panel')

@section('title') Habarlaşmak @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item active" aria-current="page">Habarlaşmak</li>
@endsection

@section('content')
  <div class="wrapper sh-main br-8 mt-5">
    @if($phone->data)
      <form action="{{ route('panel.contact.destroy', $phone->id) }}" method="post" id="destroy-{{ $phone->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.contact.edit', $phone->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $phone->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.contact.edit', $phone->id) }}?is_create=true" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    @if($phone->data)
      <p>Telefon nomeri: <a href="tel:{{ $phone->data }}" target="_blank">{{ $phone->data }}</a></p>
    @else
      <p>Telefon nomeri goşuň</p>
    @endif
  </div>

  <div class="wrapper sh-main br-8 mt-5">
    @if($email->data)
      <form action="{{ route('panel.contact.destroy', $email->id) }}" method="post" id="destroy-{{ $email->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.contact.edit', $email->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $email->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.contact.edit', $email->id) }}?is_create=true" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    @if($email->data)
      <p>Email: <a href="mailto:{{ $email->data }}" target="_blank">{{ $email->data }}</a></p>
    @else
      <p>Email adresi goşuň</p>
    @endif
  </div>

  <div class="wrapper sh-main br-8 mt-5">
    @if(array_key_exists('en', $address->getTranslations('locale_data')) && array_key_exists('tm', $address->getTranslations('locale_data')))
      <form action="{{ route('panel.contact.destroy', $address->id) }}" method="post" id="destroy-{{ $address->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.contact.edit', $address->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $address->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.contact.edit', $address->id) }}?is_create=true" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    @if(array_key_exists('en', $address->getTranslations('locale_data')) && array_key_exists('tm', $address->getTranslations('locale_data')))
      <h4>Adresi</h4>
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <fieldset class="mt-3">
          <legend>{{ $properties['native'] }}</legend>
          <p>{{ $address->getTranslation('locale_data', $localeCode) }}</p>
        </fieldset>
      @endforeach
    @else
      <p>Adresi goşuň</p>
    @endif
  </div>

  <div class="wrapper sh-main br-8 mt-5">
    @if(array_key_exists('en', $copyright->getTranslations('locale_data')) && array_key_exists('tm', $copyright->getTranslations('locale_data')))
      <form action="{{ route('panel.contact.destroy', $copyright->id) }}" method="post" id="destroy-{{ $copyright->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.contact.edit', $copyright->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $copyright->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.contact.edit', $copyright->id) }}?is_create=true" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    @if(array_key_exists('en', $copyright->getTranslations('locale_data')) && array_key_exists('tm', $copyright->getTranslations('locale_data')))
      <h4>Copyright</h4>
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <fieldset class="mt-3">
          <legend>{{ $properties['native'] }}</legend>
          <p>{{ $copyright->getTranslation('locale_data', $localeCode) }}</p>
        </fieldset>
      @endforeach
    @else
      <p>Adresi goşuň</p>
    @endif
  </div>

  <div class="wrapper sh-main br-8 mt-5">
    @if($instagram->data)
      <form action="{{ route('panel.contact.destroy', $instagram->id) }}" method="post" id="destroy-{{ $instagram->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.contact.edit', $instagram->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $instagram->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.contact.edit', $instagram->id) }}?is_create=true" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    @if($instagram->data)
      <p>Instagram: <a href="{{ $instagram->data }}" target="_blank">{{ $instagram->data }}</a></p>
    @else
      <p>Instagram adresi goşuň</p>
    @endif
  </div>

  <div class="wrapper sh-main br-8 mt-5">
    @if($behance->data)
      <form action="{{ route('panel.contact.destroy', $behance->id) }}" method="post" id="destroy-{{ $behance->id }}" class="float-right">
        @method('delete')
        @csrf
        <a href="{{ route('panel.contact.edit', $behance->id) }}" class="btn btn-add sh-main" title="Üýtgetmek"><i data-icon="edit"></i></a>
        <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $behance->id }}').submit(); }" class="btn btn-add sh-main"
           title="Pozmak"><i data-icon="trash"></i></a>
      </form>
    @else
      <a href="{{ route('panel.contact.edit', $behance->id) }}?is_create=true" class="btn btn-add sh-main float-right"><i data-icon="add"></i></a>
    @endif

    @if($behance->data)
      <p>Behance: <a href="{{ $behance->data }}" target="_blank">{{ $behance->data }}</a></p>
    @else
      <p>Behance adresi goşuň</p>
    @endif
  </div>
@endsection
