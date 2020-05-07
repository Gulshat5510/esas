@extends('layouts.web')

@section('title') @lang('main.about_us') | @endsection

@section('content')
  <section id="about">
    @if($about)
      <p class="desc">{{ $about->desc }}</p>

      <div class="img-wrapper">
        <img src="{{ $about->getImage() }}" alt="about" class="object-cover-center">
      </div>
    @endif

    <h4 class="heading">@lang('main.service_directions')</h4>

    <div class="row services">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-sm-6">
            <h4>@lang('main.strategy')</h4>
            <ul>
              <li>@lang('main.research_and_analytics')</li>
              <li>@lang('main.brand_platform')</li>
              <li>@lang('main.naming')</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h4>@lang('main.design')</h4>
            <ul>
              <li>@lang('main.identification_systems')</li>
              <li>@lang('main.package_design')</li>
              <li>@lang('main.web_design')</li>
              <li>@lang('main.media_design')</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-sm-6">
            <h4>@lang('main.graphics')</h4>
            <ul>
              <li>@lang('main.illustration')</li>
              <li>@lang('main.animation')</li>
              <li>@lang('main.posters')</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h4>@lang('main.environment_design')</h4>
            <ul>
              <li>@lang('main.interior')</li>
              <li>@lang('main.exhibition_pavilion')</li>
              <li>@lang('main.3d_render')</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
