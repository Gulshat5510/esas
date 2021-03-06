@extends('layouts.web')

@section('navbar')
  @include('inc.navbar')
@endsection

@section('content')
  <section id="home">
    @if($text)
      <h4 class="home col-md-6 pl-0">{{ $text->description }}</h4>
    @endif

    <div class="row">
      @foreach($projects as $project)
        <div class="col-md-6">
          <div class="project-item">
            <a href="{{ route('projects.show', $project->id) }}">
              <figure>
                <img src="{{ $project->getCoverImage() }}" alt="img of {{ $project->name }}" class="object-cover-center">
                <figcaption class="d-none d-md-block">
                  <div class="inner">
                    <div class="title">{{ $project->name }}</div>
                    <div class="desc">{{ $project->getFirstCategoryName() }}</div>
                  </div>
                </figcaption>
              </figure>
              <div class="sm-caption d-block d-md-none">
                <div class="title">{{ $project->name }}</div>
                <div class="desc">{{ $project->getFirstCategoryName() }}</div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
    @if ($count_projects > 5)
      <div class="more text-right">
        <a href="{{ route('projects') }}">@lang('main.all_projects')</a>
      </div>
    @endif
  </section>
@endsection
