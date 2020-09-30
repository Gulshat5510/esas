@extends('layouts.web')

@section('title') @lang('main.about_us') | @endsection

@section('content')
  <section id="about">
    @if($about)
      <div class="img-wrapper">
        <img src="{{ $about->getImage() }}" alt="about" class="object-cover-center">
      </div>
    @endif

    <div class="row services">
      <div class="col-lg-6">
        <h4>@lang('main.about_us')</h4>
        @if($about)
          <p class="desc">{{ $about->desc }}</p>
        @endif

        <div class="d-none d-lg-block">
          @include('inc.contacts')
        </div>
      </div>

      <div class="col-lg-6">
        <h4>@lang('main.services')</h4>
        <ul>
          <li>@lang('main.branding_strategy')</li>
          <li>@lang('main.brand_platform')</li>
          <li>@lang('main.naming')</li>
          <li>@lang('main.identification_systems')</li>
          <li>@lang('main.package_design')</li>
          <li>@lang('main.web_design')</li>
          <li>@lang('main.illustration')</li>
          <li>@lang('main.posters')</li>
          <li>@lang('main.exhibition_pavilion')</li>
          <li>@lang('main.interior')</li>
        </ul>
      </div>
      <div class="d-lg-none d-block col-12">
        @include('inc.contacts')
      </div>
    </div>
  </section>
@endsection
