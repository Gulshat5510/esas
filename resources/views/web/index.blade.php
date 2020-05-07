@extends('layouts.web')

@section('content')
  <section id="home">
    <h4 class="home">@lang('main.home_paragraph')</h4>

    <div class="row">
      @foreach($projects as $project)
        <div class="col-md-6">
          <div class="project-item">
            <a href="{{ route('projects.show', $project->id) }}">
              <figure>
                <img src="{{ $project->getFirstImage() }}" alt="img of {{ $project->name }}" class="object-cover-center">
                <figcaption>
                  <div class="title">{{ $project->name }}</div>
                  <div class="desc">{{ $project->getFirstCategoryName() }}</div>
                </figcaption>
              </figure>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
