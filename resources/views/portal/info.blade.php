@extends('layouts.publicPage')

@section('content')
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! asset('img/contact.jpg') !!});">
		<br><br><br><h2 class="l-text2 t-center">
			Información del Proyecto
		</h2>
	</section>
	<section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <div class="row">
            	<h2>Objetivo</h2><br>
                <div class="col-md-12 p-b-30">
                	<p>Aumentar la eficiencia y productividad de los procesos que se llevan a cabo en el Centro Integral Comunitario de Las Pintas, desde el personal hasta los becarios y aspirantes que se registran año con año, así como aumentar la difusión en la comunidad de los talleres y actividades que se llevan a cabo.</p>
                </div>
                <h2>Características</h2><br>
                <div class="col-md-12 p-b-30">
                	<p>Hasta el momento, la plataforma puede realizar lo siguiente:</p><br>
                	<h5>Módulo Administrativo del CIC</h5>
            		<p>- Registrar nuevos adminsitradores: Por administrador nos referimos a personas que laboran dentro del CIC, este tipo de usuario tiene acceso TOTAL a la plataforma, y podrá usar todas las opciones mencionadas a continuación.</p>
            		<p>- Cambiar su contraseña de usuario: Cada administrador inicialmente tiene la misma contraseña, pero pueden cambiarla desde el menú de configuraciones, esto con el fín de aumentar la seguridad de su cuenta y no permitir que los demás usuarios accedan a dicha cuenta.</p>
            		<p>- Registrar nuevos aspirantes: Los administradores pueden registrar nuevos estudiantes que aspiran a una beca, ya sea de Primaria, Secundaria, Preparatoria y Universidad.</p>
            		<p>- Cambiar contraseña de aspirantes y becarios: Para el caso de Preparatoria y Universidad, los estudiantes tendrán su propia cuenta para acceder al sistema, para acceder necesitarán de su correo y la contraseña que se les proporcionó cuando se registraron en el CIC. Si por alguna razón el estudiante olvida su contaseña, un administrador puede cambiarla para que recuperen el acceso.</p>
            		<p>- Registrar calificaciones: Solo aplica para estudiantes de Primaria y Secundaria, ya que son los únicos que llevan a cabo un examen.</p>
            		<p>- Seleccionar ganadores: Una vez registrado todos los puntajes de los examenes presentados, la plataforma escogerá automáticamente los puntajes más altos, dependiendo del número de ganadores que queramos seleccionar, por ejemplo, si introducimos el número 20 y tenemos 50 aspirantes registrados de Primaria y Secundaria, solo se elegirán a los 20 estudiantes con las calificaciones más altas.</p>
            		<p>- Ver propuestas de Proyectos: Los administradores pueden ver las propuestas de proyectos registradas por los candidatos de Preparatoria y Universidad, esto con el fin de dar una retroalimentación y aterrizar de mejor manera su idea.</p>
                    <p>- Seleccionar talleres: Una vez visualizados las propuestas de los estudiantes, los administradores podrán seleccionar cuales talleres serán aceptados y cuáles no.</p>
                    <p>- Ver participantes de cada taller.</p>
                    <p>- Ver reportes mensuales de cada Becario.</p>
            		<p>- Publicar avisos a la comunidad: El administrador puede publicar avisos en el sistema, mismos que podrán ser vistos para cualquier persona que visite la página, sin necesidad de tener una cuenta para visualizarlos, por ejemplo, cuando se aproxime una brigada, una reunion, publicación del dictamen, etc.</p>
            		<p>- Publicar avisos y fotografías en la página de facebook del CIC.</p>

            		<br><h5>Módulo de Aspirantes</h5>
            		<p>Con aspirante nos referimos a un estudiante de Preparatoria y Universidad, que es registrado para competir por una beca, éste tipo de usuarios pueden hacer lo siguiente.</p>
            		<p>- Registrar propuesta de proyecto: Una vez registrados en el CIC, los estudiantes deben acceder a la plataforma y registrar su propuesta del taller que desean impartir.</p>
            		<p>- Registrar sesiones: En cada sesión los aspirantes deben registrar todas las sesiones que se impartirán en su taller, estableciendo el nombre de la sesión, la fecha, descripción y los materiales que se necesitarán.</p>

                    <br><h5>Módulo de Becarios</h5>
                    <p>Con becario nos referimos a un estudiante de Preparatoria y Universidad, que fue registrado en el CIC y su propuesta de proyecto fue aceptada. Ellos podrán:</p>
                    <p>- Registrar participantes: Cada becario deberá registrar los datos de cada uno de sus participantes, por cada sesión impartida, así como su asistencia.</p>
                    <p>- Registrar reportes mensuales: En él, deberán dar una retroalimentación de lo aprendido en su taller, que creen que deben mejorar o cambiar,su experiencia en general.</p>

            		<br><h5>Módulo de Comunidad</h5>
            		<p>Son todas aquellas partes de la página que pueden ser vistas y usadas por cualquier persona, sin pertenecer al CIC o tener una cuenta. Ellos podrán:</p>
            		<p>- Ver avisos publicados por los administradores: De esta manera pueden enterarse de cuando se aproxima una brigada de la salud, consulta dental, fechas de registro, entrega de útiles, etc.</p>
            		<p>- Ver la ubicación del CIC en un mapa (Muchas personas aún no saben donde se ubica).</p>
            		<p>- Ver fotos de los eventos y el CIC.</p>
                </div>

                <h2>Características en desarrollo</h2><br>
                <div class="col-md-12 p-b-30">
                	<p>Las siguientes funciones están en desarrollo y/o en fases de prueba</p><br>
                	<h5>Módulo Administrativo del CIC</h5>
            		<p>- Llenar automáticamente el documento del IJAS con los datos de todos los becarios.</p>

            		<br><h5>Módulo de Comunidad</h5>
            		<p>Son todas aquellas partes de la página que pueden ser vistas y usadas por cualquier persona, sin pertenecer al CIC o tener una cuenta. Ellos podrán:</p>
            		<p>- Recibir correos y mandar correos con dudas del CIC.</p>
                </div>

                <h2>Características que podrían implementarse a futuro (En caso de que se decida darle continuidad al proyecto).</h2><br>
                <div class="col-md-12 p-b-30">
                	<p>Las siguientes funciones no están en desarrollo, pero podrían ser implementadas si se decide aumentar el tiempo de vida de desarrollo del sistema</p><br>
            		<p>- Implementar un sistema de reconocimiento de huella: Esto con el fin de que cada becario registre su hora de llegada y de salida, para evitar que impartan menos horas de las que deberían.</p>
            		<p>- Mandar mensaje a los becarios y viceversa.</p>
            		<p>- Implementar un sistema de puntos: En el se guardaria el número de participantes que tiene cada becario en su taller por mes, esto con el fin de aumentar la competitividad y motivar a los becarios a tener y conseguir mayor número de asistentes, podría darse un reconocimiento al primer lugar o un bono en su cheque (opcional). Ejemplo:</p>
            		<img src="https://s3.envato.com/files/229749810/preview/03_preview_scoreboard.jpg" style="height: 50%; width: 500px; "><br>
                </div>
            </div>
        </div>
    </section>
	
@endsection