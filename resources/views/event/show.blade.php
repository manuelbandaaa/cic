@extends('layouts.publicPage')
@section('content')
    <br>
    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
                <h1 class="text-center">{{ $event->title }}</h1><br>
                <h6 class="text-center">Publicado el {{ \Date::parse($event->created_at)->format('l j F Y') }}</h6><br>
                <img class="mySlides" src="{{ $event->img }}" style="width:100%"><br><br>
                <p class="text-justify">{{ $event->description }}</p>
                <div class="text-center">
                    @foreach($event->images as $image)
                      <br><br><img class="mySlides" src="{{ $image->url }}" style="width:100%">
                    @endforeach
                </div>
        </div>
    </section>
@endsection