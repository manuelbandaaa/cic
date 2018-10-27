@extends('layouts.publicPage')
@section('content')
    <br>
    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
                <h1 class="text-center">{{ $course->name }}</h1><br>
                <h6 class="text-center">Fecha de la próxima sesión: {{ ($nextSession!=null) ? \Date::parse($nextSession)->format('l j F Y'). " de ". $course->time : "No definida" }}</h6><br>
                <p class="text-justify" style="white-space: pre-line">{{ $course->description }}</p><br><br>
                <img class="mySlides" src="{{ $course->img }}" style="width:100%"><br><br>
                <h2 class="text-center">Sesiones</h2><br><hr>
                @if(count($sessions) > 0)
                    @foreach($sessions as $session)
                        <h4> {{ $session->title }} </h4><br>
                        <h6> Fecha: {{ \Date::parse($session->date)->format('l j F Y') }} </h6><br>
                        <p class="text-justify" style="white-space: pre-line"> {{ $session->description }} </p><br>
                        <p class="text-justify"> <strong>Materiales Necesarios:<strong><h6> {{ $session->materials }} <h6></p>
                        <hr>
                    @endforeach
                @else
                    <p class="text-center"> No se ha registrado ninguna sesión aún, ¡vuelve pronto para consultarlas!</p>
                @endif
        </div>
    </section>
@endsection