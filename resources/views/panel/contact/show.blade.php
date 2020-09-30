@extends('layouts.panel')

@section('title') {{ $contact->name }} @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item"><a href="{{ route('panel.contact.index') }}">Gelen hatlar</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{ $contact->name }}</li>
@endsection

@section('top-left')
  <form action="{{ route('panel.contact.destroy', $contact->id) }}" method="post" id="destroy-{{ $contact->id }}" class="float-right">
    @method('delete')
    @csrf
    <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $contact->id }}').submit(); }"
       class="btn btn-add sh-main hover-danger" title="Pozmak"><i data-icon="trash"></i> Poz</a>
  </form>
  <div class="clearfix"></div>
@endsection

@section('content')
  <div class="wrapper sh-main br-8">
    <ul class="mb-3">
      <li><strong>Ady:</strong> {{ $contact->name }}</li>
      <li><strong>Telefon:</strong> {{ $contact->phone }}</li>
      <li><strong>Email:</strong> {{ $contact->email }}</li>
      <li><strong>Wagty:</strong> {{ date('d.m.Y', strtotime($contact->created_at)) }} ý</li>
      @if($contact->filename)
        <li><a href="{{ asset('uploads/contact/' . $contact->filename) }}" target="_blank">Скачать файл</a></li>
      @else
        <li><strong>file ýok</strong></li>
      @endif
    </ul>

    <p>{{ $contact->msg }}</p>
  </div>
@endsection
