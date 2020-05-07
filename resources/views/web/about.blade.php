@extends('layouts.web')

@section('title') О нас | @endsection

@section('content')
  <section id="about">
    @if($about)
      <p class="desc">{{ $about->desc }}</p>

      <div class="img-wrapper">
        <img src="{{ $about->getImage() }}" alt="about" class="object-cover-center">
      </div>
    @endif

    <h4 class="heading">Направления услуг</h4>

    <div class="row services">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-sm-6">
            <h4>Стратегия</h4>
            <ul>
              <li>Исследования и аналитика</li>
              <li>Бренд платформа</li>
              <li>Нейминг</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h4>Дизайн</h4>
            <ul>
              <li>Системы идентификации</li>
              <li>Дизайн упаковки</li>
              <li>Веб дизайн</li>
              <li>Дизайн носителей</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-sm-6">
            <h4>Графика</h4>
            <ul>
              <li>Иллюстрации</li>
              <li>Бренд платформа</li>
              <li>Анимация</li>
              <li>Постеры</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h4>Дизайн среды</h4>
            <ul>
              <li>Интерьер</li>
              <li>Выстовычный павильены</li>
              <li>3D визуализация</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
