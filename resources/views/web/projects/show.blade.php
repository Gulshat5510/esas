@extends('layouts.web')

@section('title') {{ $project->name }} · @lang('main.projects') | @endsection

@section('content')
  <section id="show">
    <div class="row">
      <div class="col-lg-6">
        <h4>{{ $project->name }}</h4>
        <h6>@lang('main.what_have_we_done'):</h6>
        <ul class="categories">
          @foreach($project->categories as $category)
            <li>{{ $category->name }}</li>
          @endforeach
        </ul>
      </div>
      <div class="col-lg-6 from-col">
        {!! $project->description !!}
      </div>
    </div>

    <div class="galleries">
      <div class="row">
        @foreach($project->images as $image)
          <div class="col-md-{{ $image->type == 'wide' ? '12' : '6' }}">
            <div class="img-wrapper-{{ $image->type }}">
              <img src="{{ $image->getImage() }}" alt="image-{{ $image->id }}" class="object-cover-center">
            </div>
          </div>
        @endforeach
      </div>

      {{--      <ul class="owner">--}}
      {{--        <li class="mb-3">{!! $project->client !!}</li>--}}
      {{--        <li>{{ $project->year }} @lang('main.year')</li>--}}
      {{--      </ul>--}}
    </div>

    <h6 class="dark">@lang('main.other_works')</h6>

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

    <div class="more">
      <a href="{{ route('projects') }}">@lang('main.all_projects') <span><i data-icon="arrow"></i></span></a>
    </div>
  </section>
@endsection

@section('js')
  <script>
      $(function () {
          $('i[data-icon=arrow]').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="13.947" height="9.317" viewBox="0 0 13.947 9.317"><g id="arrow" transform="translate(-1073.214 -3556.812)"><path id="Path_4" d="M924.714,2856.5H937.46" transform="translate(149 705)" fill="#fff" stroke="#969696" stroke-linecap="round" stroke-width="1"></path><path id="Path_6" d="M933.613,2856.422l3.841-3.9" transform="translate(149 709)" fill="#fff" stroke="#969696" stroke-linecap="round" stroke-width="1"></path><path id="Path_7" d="M937.454,2856.422l-3.841-3.9" transform="translate(149 705)" fill="#fff" stroke="#969696" stroke-linecap="round" stroke-width="1"></path></g></svg>');
      });
  </script>
@endsection
