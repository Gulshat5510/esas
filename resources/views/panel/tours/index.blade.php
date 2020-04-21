@extends('layouts.panel')

@section('title') Turlar @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item active" aria-current="page">Turlar</li>
@endsection

@section('top-left')
  <a href="{{ route('panel.tours.create') }}" class="btn btn-add sh-main float-right"><i data-icon="add"></i> Täze goşmak</a>
  <div class="clearfix"></div>
@endsection

@section('content')
  <div class="table-responsive sh-main br-8">
    @if(count($tours))
      <table class="table table table-striped br-8">
        <thead>
        <tr>
          <th style="width: 15px">#</th>
          <th>Surat</th>
          <th style="width: 170px">Temasy</th>
          <th>Beýany</th>
          <th>Program</th>
          <th style="width: 120px"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tours as $tour)
          <tr>
            <td class="vam">{{ $loop->iteration }}</td>
            <td><img src="{{ $tour->getFirstImage() }}" alt="{{ $tour->id }}" style="height: 70px"></td>
            <td class="vam">{{ $tour->getTranslation('title', 'en') }}</td>
            <td class="vam">{{ $tour->descSummery120() }}</td>
            <td class="vam">{{ $tour->programSummery120() }}</td>
            <td class="sm-btn vam">
              <form action="{{ route('panel.tours.destroy', $tour->id) }}" method="post" id="destroy-{{ $tour->id }}">
                @method('delete')
                @csrf
                <a href="{{ route('panel.tours.show', $tour->id) }}" class="btn btn-primary-inv" title="Giňişleýin"><i data-icon="eye"></i></a>
                <a href="{{ route('panel.tours.edit', $tour->id) }}" class="btn btn-success-inv" title="Üýtgetmek"><i data-icon="edit"></i></a>
                <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $tour->id }}').submit(); }"
                   class="btn btn-danger-inv" title="Pozmak"><i data-icon="trash"></i></a>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      <div class="my-3 justify-content-center">{{ $tours->links() }}</div>
    @else
      <div class="wrapper sh-main">
        Tur ýok
      </div>
    @endif
  </div>
@endsection
