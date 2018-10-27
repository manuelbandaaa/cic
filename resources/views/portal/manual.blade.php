@extends('layouts.publicPage')

@section('content')
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! asset('img/contact.jpg') !!});">
		<br><br><br><h2 class="l-text2 t-center">
			Manual de Usuario
		</h2>
	</section>
	<section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <div class="row">
            	<h2>Administradores</h2><br>
                <div class="col-md-12 p-b-30">
                	<p>Para ingresar al sistema, solo hace falta presionar el botón de "Iniciar sesión"</p>
                    <img src="{!! asset('img/screenshots/General/1.png') !!}" style="height: 100%; width: 100%;">
                </div>
                <div class="col-md-12 p-b-30">
                    <br><br><p>El sistema nos redireccionará a la ventana de login, donde deberemos ingresar el correo y contraseña proporcionados</p>
                    <img src="{!! asset('img/screenshots/General/7.png') !!}" style="height: 100%; width: 100%;">
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><p>Si los datos son correctos, se nos mostrará la ventana principal, del lado izquierdo podemos visualizar todas las opciones que tiene el administrador, las opciones con flecha son menús desplegables, que al ser presionados muestran más opciones.</p>
                    <img src="{!! asset('img/screenshots/Administrador/1.png') !!}" style="height: 100%; width: 100%;">
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><p>Para registrar un nuevo aspirante a beca presionamos el botón de Aspirantes y luego "Registrar Aspirante"</p>
                    <img src="{!! asset('img/screenshots/Administrador/2.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><p>En la siguiente ventana deberemos introducir los datos del estudiante, PARA LOS CASOS DE PREPARATORIA Y UNIVERSIDAD ES OBLIGATORIO REGISTRAR CORREO ELECTRONICO, ya que sin él no podrán acceder al sistema, para Primaria y Secundaria es opcional. Una vez registrados, podrán acceder al sistema con su correo electrónico para redactar la propuesta de su proyecto, deberán iniciar sesión con su correo y de constraseña "cic" sin minúsculas. Es importante mencionarles que deben cambiar su contraseña para mayor seguridad de su cuenta.</p>
                    <img src="{!! asset('img/screenshots/Administrador/18.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><p>Si los datos son válidos aparecerá un mensaje de confirmación</p>
                    <img src="{!! asset('img/screenshots/Administrador/3.png') !!}" style="height: 50%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><p>Podemos ver todos los aspirantes registrados clasificados por su grado (Primaria, Secundaria, Preparatoria y Universidad) con sus respectivos datos. Si damos click en su nombre podremos editar los datos del aspirante. Es importante notar que al en la columna final (Calificación Examen) aparece un espacio en blanco, allí se registrarán las calificaciones de los estudiantes.</p>
                    <img src="{!! asset('img/screenshots/Administrador/4.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><p>Solo basta con escribir el número para que éste quede guardado</p>
                    <img src="{!! asset('img/screenshots/Administrador/5.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><p>Una vez registradas las calificaciones de todos los estudiantes podemos proceder a escoger a los ganadores, para ello seleccionamos el botón de "Seleccionar ganadores". Aparecerá una nueva ventana que nos solicitará el número de ganadores, para fines demostrativos en este caso se seleccionó solamente 1</p>
                    <img src="{!! asset('img/screenshots/Administrador/6.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Se mostrará una ventana de confirmación. Si se está completamente seguro de haber registrado todas las calificaciones correctamente, presionamos OK.</p>
                    <img src="{!! asset('img/screenshots/Administrador/7.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>El sistema escogerá automáticamente los puntajes más altos dependiendo del número de ganadores introducidos, y pasarán de ser "Aspirantes" a "Becarios".</p>
                    <img src="{!! asset('img/screenshots/Administrador/8.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Los estudiantes no seleccionados seguirán en el apartado de "Aspirantes". Si se desea seleccionar más ganadores solo necesitamos repetir el proceso anterior.</p>
                    <img src="{!! asset('img/screenshots/Administrador/9.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Para el caso de Preparatoria y Universidad es totalmente diferente, ellos necesitan redactar una propuesta de proyecto y necesita ser aprobada por un Administrador, si el aspirante aún no sube su propuesta aparecera un mensaje en la última columna</p>
                    <img src="{!! asset('img/screenshots/Administrador/10.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Caso contrario, si el aspirante ya subió su propuesta aparecerá el nombre de su taller, si queremos ver la propuesta completa solo necesitamos hacer click en el nombre del Taller</p>
                    <img src="{!! asset('img/screenshots/Administrador/15.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Se mostrará toda la propuesta</p>
                    <img src="{!! asset('img/screenshots/Administrador/16.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Así como sus respectivas sesiones</p>
                    <img src="{!! asset('img/screenshots/Administrador/17.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>El sistema también permite agregar avisos, que serán visibles para todas las personas que visiten la página, para crear uno nuevo solo necesitamos presionar el botón de "Nuevo Aviso"</p>
                    <img src="{!! asset('img/screenshots/Administrador/11.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Necesitaremos ingresar el Título, la descripción del aviso y presionar aceptar</p>
                    <img src="{!! asset('img/screenshots/Administrador/12.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p>Los avisos que publiquemos aparecerán en el apartado de avisos de la página principal</p>
                    <img src="{!! asset('img/screenshots/General/4.png') !!}" style="height: 50%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><p>Por último, pero no menos importante en Administración->Usuarios tenemos el control de los Administradores que tendrán acceso al sistema, es importante no confundir este apartado con el de los estudiantes, ya que aquí solo se deben registrar personas que laboren en el CIC y supervisarán la información de los estudiantes.</p>
                    <img src="{!! asset('img/screenshots/Administrador/13.png') !!}" style="height: 100%; width: 100%;"><br>
                </div>

                <div class="col-md-12 p-b-30">
                    <br><br><br><br><br><br><p>Podemos crear nuevos usuarios y seleccionar el cargo que tendrá</p>
                    <img src="{!! asset('img/screenshots/Administrador/14.png') !!}" style="height: 50%; width: 100%;">
                </div>
            </div>
        </div>
    </section>
	
@endsection