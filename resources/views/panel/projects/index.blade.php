@extends('layouts.panel')

@section('title') Proýektler @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Baş sahypa</a></li>
  <li class="breadcrumb-item active" aria-current="page">Proýektler</li>
@endsection

@section('top-left')
  <a href="{{ route('panel.projects.create') }}" class="btn btn-add sh-main float-right"><i data-icon="add"></i> Täze goşmak</a>
  @if($count_selected > 1)
  <a href="{{ route('panel.projects.order.form') }}" class="btn btn-add sh-main float-right mr-2"><i data-icon="list"></i> Tertiplemek</a>
  @endif
  <div class="clearfix"></div>
@endsection

@section('content')
  <div class="table-responsive br-8">
    @if(count($projects))
      <table class="table table table-striped sh-main br-8">
        <thead>
        <tr>
          <th style="width: 15px">#</th>
          <th>Surat</th>
          <th>Ady</th>
          <th>Gysga beýany</th>
         <th>Saýlanan</th>
          <th style="width: 120px"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
          <tr>
            <td class="vam">{{ $loop->iteration }}</td>
            <td><img src="{{ $project->getCoverImage() }}" alt="project-{{ $project->id }}" style="height: 70px;"></td>
            <td class="vam">{{ $project->name }}</td>
            <td class="vam">{{ $project->summary300() }}</td>
{{--            <td class="vam">{{ $project->clientSummary300() }}</td>--}}
           <td class="vam">
             @if ($project->is_selected)
                &#10003;
             @endif
            </td>
            <td class="vam sm-btn">
              <form action="{{ route('panel.projects.destroy', $project->id) }}" method="post" id="destroy-{{ $project->id }}">
                @method('delete')
                @csrf
                <a href="{{ route('panel.projects.show', $project->id) }}" class="btn btn-primary-inv" title="Giňişleýin"><i data-icon="eye"></i></a>
                <a href="{{ route('panel.projects.edit', $project->id) }}" class="btn btn-success-inv" title="Üýtgetmek"><i data-icon="edit"></i></a>
                <a href="#" onclick="if (confirm('Pozmak isleýäňizmi?')) { document.getElementById('destroy-{{ $project->id }}').submit(); }" class="btn btn-danger-inv"
                   title="Pozmak"><i data-icon="trash"></i></a>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="my-3 justify-content-center">{{ $projects->links() }}</div>
    @else
      <div class="wrapper sh-main">
        Entäk proýekt ýok
      </div>
    @endif
  </div>
@endsection
