@extends('layouts.publicPage')

@section('css')
  <style>
  .event{
    width:720px;
    height: 250px;
  }
</style>
@endsection

@section('content')
<!-- Slide1 -->
  <section class="slide1">
    <div class="wrap-slick1">
      <div class="slick1">
        <div class="item-slick1 item1-slick1" style="background-image: url({!! asset('img/principal.png') !!});">
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <br>
  <section class="blog bgwhite p-b-65">
    <div class="container">
      <div class="sec-title">
        <h3 class="m-text5 t-center">
          Eventos Recientes
        </h3>
      </div>
      <br>

      <div class="row">
        @foreach($events as $event)
          <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
            <div class="block1">
              <a href="{{ action('EventsController@show', $event->id) }}" class="block1-img dis-block hov-img-zoom">
                <img src="{{ $event->img }}" alt="IMG-BLOG" class="event">
              </a>

              <div class="block3-txt p-t-14">
                <h4 class="p-b-7">
                  <a href="{{ action('EventsController@show', $event->id) }}" class="m-text11">
                    {{ $event->title }}
                  </a>
                </h4>

                <span class="s-text6"></span> <span class="s-text7">Publicado el {{ \Date::parse($event->created_at)->format('l j F Y') }}</span>

                <p class="s-text8 p-t-16" style="display: block; width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                  {{ $event->description }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection