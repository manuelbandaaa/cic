@extends('layouts.publicPage')

@section('content')
    <br>
    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <h1 class="text-center">{{ $announcement->title }}</h1><br>
            <h6 class="text-center">Publicado el {{ \Date::parse($announcement->created_at)->format('l j F Y') }}</h6><br><br>
            <p class="text-justify" style="white-space: pre-line">{{ $announcement->text }} </p>
        </div>
    </section>
    </script>
@endsection