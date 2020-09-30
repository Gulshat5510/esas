@extends('layouts.panel')

@section('title') Kategoriýalar @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item active" aria-current="page">Kategoriýalar</li>
@endsection

@section('top-left')
  <a href="{{ route('panel.categories.create') }}" class="btn btn-add sh-main float-right"><i data-icon="add"></i> Täze goşmak</a>
  <div class="clearfix"></div>
@endsection

@section('content')
  <div class="table-responsive br-8">
    @if(count($categories))
      <table class="table table table-striped sh-main br-8">
        <thead>
        <tr>
          <th style="width: 15px">#</th>
          <th>Slug</th>
          <th>Русский</th>
          <th>English</th>
          <th style="width: 120px"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->getTranslation('name', 'ru') }}</td>
            <td>{{ $category->getTranslation('name', 'en') }}</td>
            <td class="sm-btn">
              <form action="{{ route('panel.categories.destroy', $category->id) }}" method="post" id="destroy-{{ $category->id }}">
                @method('delete')
                @csrf
                <a href="{{ route('panel.categories.edit', $category->id) }}" class="btn btn-success-inv" title="Üýtgetmek"><i data-icon="edit"></i></a>
                <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $category->id }}').submit(); }" class="btn btn-danger-inv"
                   title="Pozmak"><i data-icon="trash"></i></a>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    @else
      <div class="wrapper sh-main">
        Kategoriýa ýok
      </div>
    @endif
  </div>
@endsection
