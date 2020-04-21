@extends('layouts.panel')

@section('title') Gelen hatlar @endsection

@section('css')
  <style>
    .bold {
      font-weight: bold;
    }
  </style>
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item active" aria-current="page">Gelen hatlar</li>
@endsection

@section('content')
  <div class="table-responsive br-8">
    @if(count($mails))
      <table class="table table table-striped sh-main br-8">
        <thead>
        <tr>
          <th style="width: 15px">#</th>
          <th>Ady</th>
          <th>Telefon</th>
          <th>Email</th>
          <th>Tekst</th>
          <th>File</th>
          <th>Wagty</th>
          <th style="width: 120px"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($mails as $mail)
          <tr class="{{ $mail->read ? '' : 'bold' }}">
            <td class="vam">{{ $loop->iteration }}</td>
            <td class="vam">{{ $mail->name }}</td>
            <td class="vam">{{ $mail->phone }}</td>
            <td class="vam">{{ $mail->email }}</td>
            <td class="vam">{{ $mail->summary300() }}</td>
            <td class="vam">
              @if($mail->filename) <a href="{{ asset('uploads/contact/' . $mail->filename) }}" target="_blank">Bar</a> @else Ýok @endif
            </td>
            <td class="vam">{{ date('d.m.Y', strtotime($mail->created_at)) }} ý</td>
            <td class="vam sm-btn">
              <form action="{{ route('panel.contact.destroy', $mail->id) }}" method="post" id="destroy-{{ $mail->id }}">
                @method('delete')
                @csrf
                <a href="{{ route('panel.contact.show', $mail->id) }}" class="btn btn-primary-inv" title="Giňişleýin"><i data-icon="eye"></i></a>
                <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $mail->id }}').submit(); }" class="btn btn-danger-inv"
                   title="Pozmak"><i data-icon="trash"></i></a>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="my-3 justify-content-center">{{ $mails->links() }}</div>
    @else
      <div class="wrapper sh-main">
        Entäk gelen hat ýok
      </div>
    @endif
  </div>
@endsection
