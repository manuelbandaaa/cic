<!DOCTYPE html>
<html lang="es">
<head>
  <title>CIC</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  
  <link rel="apple-touch-icon" sizes="144x144" href="{!! asset('img/apple-touch-icon.png')!!}">
  <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('img/favicon-32x32.png')!!}">
  <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('img/favicon-16x16.png') !!}">
  <link rel="manifest" href="{!! asset('img/site.webmanifest') !!}">
  <link rel="mask-icon" href="{!! asset('img/safari-pinned-tab.svg')!!}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">


<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/bootstrap/bootstrap.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/themify/themify-icons.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/Linearicons-Free-v1.0.0/icon-font.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/elegant-font/html-css/style.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/animate/animate.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/css-hamburgers/hamburgers.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/animsition/animsition.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/publicPage/util.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/publicPage/main.css') !!}">
  @section('css')
  @show
<!--===============================================================================================-->
</head>
<body class="animsition">

  <!-- Header -->
  <header class="header">
    <!-- Header desktop -->
    <div class="container-menu-header">

      <div class="wrap_header">
        <!-- Logo -->
        <a href="/" class="logo">
          <img src="{!! asset('img/logo.jpg') !!}" alt="IMG-LOGO">&nbspCentro Integral Comunitario Las Pintas
        </a>

        <!-- Menu -->
        <div class="wrap_menu">
          <nav class="menu">
            <ul class="main_menu">

              <li>
                <a href="/scholarships">Becas</a>
              </li>

              <li>
                <a href="/courses/list">Talleres</a>
              </li>

              <li>
                <a href="/announcements/list">Avisos</a>
              </li>

              <li>
                <a href="/contact">Contacto</a>
              </li>
            </ul>
          </nav>
        </div>

        <!-- Header Icon -->
        <div class="header-icons">
          <a href="/login" class="header-wrapicon1 dis-block">
            @if(\Auth::check())
              Mi Cuenta
            @else  
              Iniciar sesión &nbsp
            @endif
            <img src="{!! asset('img/icon-header-01.png') !!}" class="header-icon1" alt="ICON">
          </a>

          <span class="linedivide1"></span>

          <div class="header-wrapicon2 dis-block">
            <a href="https://www.facebook.com/ciclaspintas" class="color1 p-r-20 fa fa-facebook fa-2x" target="_blank"></a>
          </div>
        </div>

      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
      <!-- Logo moblie -->
      <a href="/" class="logo-mobile">
        <img src="{!! asset('img/logo.jpg') !!}" alt="IMG-LOGO">&nbspCIC Las Pintas
      </a>

      <!-- Button show menu -->
      <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
          <span class="linedivide2"></span>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
      <nav class="side-menu">
        <ul class="main-menu">
          <li class="item-menu-mobile">
            <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
          </li>

          <li class="item-menu-mobile">
            <a href="/login">
            @if(\Auth::check())
              Mi Cuenta
            @else  
              Iniciar sesión &nbsp
            @endif
          </a>
          </li>

          <li class="item-menu-mobile">
            <a href="/scholarships">Becas</a>
          </li>

          <li class="item-menu-mobile">
            <a href="/courses/list">Talleres</a>
          </li>

          <li class="item-menu-mobile">
            <a href="/announcements/list">Avisos</a>
          </li>

          <li class="item-menu-mobile">
            <a href="/contact">Contacto</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  @yield('content')

  <!-- Footer -->
  <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
      <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          Sigue en Contacto
        </h4>

        <div>
          <p class="s-text7 w-size27">
            ¿Tienes alguna pregunta? Puedes visitarnos en el Centro Comunitario ubicado en la Calle Santa Rosa #76
            o mandarnos un mensaje en nuestra <a href="https://www.facebook.com/ciclaspintas">página de Facebook</a></p>
          </p>
        </div>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Categorias
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="/scholarships" class="s-text7">
              Becas
            </a>
          </li>

          <li class="p-b-9">
            <a href="/courses/list" class="s-text7">
              Talleres
            </a>
          </li>

          <li class="p-b-9">
            <a href="/announcements/list" class="s-text7">
              Avisos
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Ayuda
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="/tutorials/admin.pdf" class="s-text7">
              Manual del Personal
            </a>
          </li>

          <li class="p-b-9">
            <a href="/tutorials/student.pdf" class="s-text7">
              Manual del Becario
            </a>
          </li>

          <li class="p-b-9">
            <a href="/introduction.html" class="s-text7">
              Introducción
            </a>
          </li>

          <li class="p-b-9">
            <a href="/info" class="s-text7">
              Información del Proyecto
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          ¿Encontraste algún error en el sistema o quieres sugerir una mejora?
        </h4>

        <div>
          <p class="s-text7 w-size27">
            Manda un correo a <strong>gmanu109@gmail.com</strong> con los detalles
          </p>
        </div>
      </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
      <div class="t-center s-text8 p-t-20">
        Copyright © 2018 Todos los derechos reservados.
      </div>
    </div>
  </footer>



  <!-- Back to top -->
  <div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
  </div>

  <!-- Container Selection1 -->
  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script type="text/javascript" src="{!! asset('js/plugins/jquery/jquery-3.2.1.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/plugins/animsition/animsition.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/plugins/bootstrap/bootstrap.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/plugins/publicPage/main.js') !!}"></script>

</body>
</html>
