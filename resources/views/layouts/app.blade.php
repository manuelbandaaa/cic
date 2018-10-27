<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">


      <link rel="apple-touch-icon" sizes="144x144" href="{!! asset('img/apple-touch-icon.png')!!}">
      <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('img/favicon-32x32.png')!!}">
      <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('img/favicon-16x16.png') !!}">
      <link rel="manifest" href="{!! asset('img/site.webmanifest') !!}">
      <link rel="mask-icon" href="{!! asset('img/safari-pinned-tab.svg')!!}" color="#5bbad5">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Integral Comunitario</title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

    @section('css')
    @show

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Page Heading -->
            @include('layouts.heading')

            <!-- Main view  -->
            <div class="wrapper wrapper-content animated fadeInRight">
            @include('partials.mensajes')
            @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

@section('scripts')
@show

</body>
</html>
