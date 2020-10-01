@extends('layouts.web')

@section('content')
  <section id="home">
    @if($text)
      <h4 class="home">{{ $text->description }}</h4>
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
  </section>
@endsection
