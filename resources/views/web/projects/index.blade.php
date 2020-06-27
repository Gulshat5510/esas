@extends('layouts.web')

@section('title') @lang('main.projects') | @endsection

@section('content')
  <section id="projects">
    <div class="controls">
      <button type="button" class="control" data-mixitup-control data-filter="all">@lang('main.all')</button>
      @foreach($categories as $category)
        <button type="button" class="control" data-mixitup-control data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
      @endforeach
    </div>

    <div class="projects">
      @foreach($projects as $project)
        <div class="mix @foreach($project->categories as $category) {{ $category->slug }} @endforeach">
          <div class="project-item">
            <a href="{{ route('projects.show', $project->id) }}">
              <figure>
                <img src="{{ $project->getCoverImage() }}" alt="img of {{ $project->name }}" class="object-cover-center">
                <figcaption>
                  <div class="title">{{ $project->name }}</div>
                  <div class="desc">{{ $project->getFirstCategoryName() }}</div>
                </figcaption>
              </figure>
            </a>
          </div>
        </div>
      @endforeach
      <div class="gap"></div>
      <div class="gap"></div>
      <div class="gap"></div>
    </div>
  </section>
@endsection

@section('js')
  <script src="{{ asset('js/mixitup.min.js') }}"></script>
  <script>
      let containerEl = $('.projects');
      let mixer = mixitup(containerEl, {
          selectors: {
              control: '[data-mixitup-control]'
          }
      });
  </script>
@endsection
