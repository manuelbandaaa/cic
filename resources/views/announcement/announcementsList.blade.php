@extends('layouts.publicPage')

@section('content')
<br>
    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <div class="row">

                <div class="col-md-8 p-b-30">
                    @foreach($announcements as $announcement)
                        <h3 class="m-text26 p-t-15 p-b-16">
                            {{ $announcement->title }}
                        </h3>
                        <h6>Publicado el {{ \Date::parse($announcement->created_at)->format('l j F Y') }}</h6>
                        <p class="s-text8 p-t-16" style="display: block; width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $announcement->text }} </p><a href="{{ action('AnnouncementsController@show', $announcement->id) }}">Seguir leyendo</a>
                        <hr>
                      @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection