<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
/*scroll effect*/
.navbar-trans {
  background-color: transparent;
  border: none;
  transition: top 1s ease;
}
 
/*double row*/
.navbar-doublerow > .navbar{
    display: block; 
    padding: 0px auto;
    margin: 0px auto;
    min-height: 25px;
}
.navbar-doublerow .nav{
    padding: 0px auto;
}
.navbar-doublerow .dividline{
  margin: 5px 100px;
  padding-top: 1px;
  background-color: inherit;
}
/*top nav*/
.navbar-doublerow .navbar-top ul>li>a {
    padding: 10px auto;
    font-size: 12px;
} 
/*down nav*/
.navbar-doublerow .navbar-down .navbar-brand {
    padding: 0px auto;
    float: left;
    color: #fff;
    font-size: 32px;
}
.navbar-doublerow .navbar-down ul>li>a{
    font-size: 16px;
    color: #fff;
    transition: border-bottom .2s ease-in , transform .2s ease-in-out;
}
.navbar-doublerow .navbar-down ul>li>a:hover{
    border-bottom: 1px solid #fff;
    color: #fff;
}
.navbar-doublerow .navbar-down .dropdown{
    padding: 5px;
    color: #000;
}
.navbar-doublerow .navbar-down .dropdown ul>li>a,
.navbar-doublerow .navbar-down .dropdown ul>li>a:hover{
  color: #000;
  border-bottom: none;
}
.navbar-doublerow.navbar-trans.afterscroll {
}   
.navbar-doublerow.navbar-trans.afterscroll {
   top:-50px;
}   

.flex-container {
    display: flex;
    justify-content: space-between;
}
.flex-item {
}
/*text*/
.text-white,.text-white-hover:hover{color:#fff!important}
/*fontcolor*/
.light-grey {color:#000!important;background-color:#E6E9ED!important}
</style>
    <title>Centro Integral Comunitario</title>

</head>
<body>
    <nav class="navbar navbar-default navbar-doublerow navbar-trans navbar-fixed-top">
  <!-- top nav -->
  <nav class="navbar navbar-top hidden-xs">
    <div class="container">
      <!-- left nav top -->
      <ul class="nav navbar-nav pull-left">
        <li><a href="#"><span class="glyphicon glyphicon-thumbs-up text-white"></span></a></li>
        <li><a href="#"><span class="text-white">¿Preguntas? TEL: <b>+963000000000</b></span></a></li>
      </ul>
      <!-- right nav top -->
      <ul class="nav navbar-nav pull-right">
        <li><a href="https://github.com/alphadsy" class="text-white">Sobre Nosotros</a></li>
        <li><a href="https://github.com/alphadsy" class="text-white">Contáctanos</a></li> 
      </ul>
    </div>
    <div class="dividline light-grey"></div>
  </nav>
  <!-- down nav -->
  <nav class="navbar navbar-down">
    <div class="container">
      <div class="flex-container">  
        <div class="navbar-header flex-item">
          <div class="navbar-brand" href="/">Centro Integral Comunitario</div>
        </div>
        <ul class="nav navbar-nav flex-item hidden-xs">
          <li><a href="https://github.com/alphadsy">Talleres</a></li>
          <li><a href="https://github.com/alphadsy">Avisos</a></li>
        </ul>
        <ul class="nav navbar-nav flex-item hidden-xs pull-right">
          @if(\Auth::check())
                <li>
                    <form action="{{ url('/logout') }}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-link">
                            <i class="fa fa-sign-out"></i> Salir
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/login">
                        <i class="fa fa-sign-in"></i> Iniciar Sesión
                    </a>
                </li>
            @endif
        </ul>
        <!-- dropdown only moblie -->
          <div class="dropdown visible-xs pull-right">
            <button class="btn btn-default dropdown-toggle " type="button" id="dropdownmenu" data-toggle="dropdown">
              <span class="glyphicon glyphicon-align-justify"></span> 
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Talleres</a></li>
              <li><a href="#">Avisos</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Contáctanos</a></li>
              li><a href="#">Sobre nosotros</a></li>
            </ul>
          </div>
        </div>  
      </div>
    </nav>
  </nav> 
<!--bg img  -->
<header>
    <img src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/J70T3LHQ2O.jpg" style="width:100%">
</header>
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script type="text/javascript">
// toggle class scroll 
$(window).scroll(function() {
    if($(this).scrollTop() > 50)
    {
        $('.navbar-trans').addClass('afterscroll');
    } else
    {
        $('.navbar-trans').removeClass('afterscroll');
    }  

});
  
// demo only 
// open link in new tab without ugly target="_blank"
$("a[href^='http']").attr("target", "_blank");
    </script>
</body>
</html>