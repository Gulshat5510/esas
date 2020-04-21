@extends('layouts.web')

@section('title') О нас | @endsection

@section('content')
  <section id="about">
    <p class="desc">Мы — команда дизайнеров области дизайна и коммуникации, от исследования до разработки комплексных дизайн решений. Мы создаем и трансформируем бренды, улучшаем
      бизнес и стремимся помогать нашим клиентам, быть на шаг впереди.</p>

    <div class="img-wrapper">
      <img src="{{ asset('images/trash/about.png') }}" alt="about" class="object-cover-center">
    </div>
  </section>
@endsection
