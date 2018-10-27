@extends('layouts.publicPage')

@section('css')
	<style>
	.map{
    width:500px;
    height: 300px;
  }
</style>
@endsection

@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! asset('img/contact.jpg') !!});">
		<br><br><br><h2 class="l-text2 t-center">
			Contacto
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<h2 class="text-center">Misión</h2>
					<p class="text-justify">Construir comunidades humanas, mejor preparadas, más sensibles a las necesidades de otros; sensibles hacia los que no han tenido las mismas oportunidades de desarrollo. El desarrollo es un derecho humano que cada persona en este planeta deberia tener la oportunidad de alcanzar, el que una vez obtenido ayude a construir la paz lo que en consecuencia construye un mundo más fuerte, lleno de entusiasmo y motivación.</p>
					<br><h2 class="text-center">Visión</h2>
					<p class="text-justify">Que las comunidades logren un desarrollo sustentable a travpés de programas y actividades interactivas que logren elevar los niveles edicativos, niveles de salud, nutrición, mayor acceso a los recursos naturales, mayor ingreso per capita y mejores niveles de bienestar físico-espiritual.</p>
				</div>
				
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<img src="{!! asset('img/map.png') !!}" class="map">
					</div><br>
					Ubicación: Calle Santa Rosa #76, Colonia Santa Rosa del Valle, CP 45690
				</div>
			</div>
		</div>
	</section>
@endsection