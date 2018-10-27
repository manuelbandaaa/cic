@extends('layouts.publicPage')

@section('content')
<br>
    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <br>
            @foreach($courses as $course)
                <div class="row">
                    <div class="col-md-4 p-b-30">
                        <div class="hov-img-zoom">
                            <a href="{{ action('CoursesController@public_view', $course->id) }}"><img src="{{ $course->img }}" alt="IMG-ABOUT"></a>
                        </div>
                    </div>

                    <div class="col-md-8 p-b-30">
                        <a href="{{ action('CoursesController@public_view', $course->id) }}"><h3 class="m-text26 p-t-15 p-b-16">
                            {{ $course->name }}
                        </h3></a>

                        <p class="s-text8 p-t-16" style="display: block; width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $course->description }} </p><br>

                        <p><a href="{{ action('CoursesController@public_view', $course->id) }}">Más Información</a></p>

                        {{--<div class="bo13 p-l-29 m-l-9 p-b-10">
                            <p class="p-b-11">
                                Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
                            </p>

                            <span class="s-text7">
                                - Steve Job’s
                            </span>
                        </div>--}}
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </section>
@endsection