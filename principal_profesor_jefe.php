<?php
/*************************************************************************** 
 * Panel principal profesor jefe.
  - Permite seleccionar a que curso le desea editar las notas de las 
    asignaturas que el este dictando.
  - Agrega las funcionalidades de exportacion a PDF reservadas solo
    para los profesores jefes de un curso.
 **************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user = $_SESSION['usuario'];
	if($_POST['boton_tercero_medio']){
		header("Location: tercero_medio.php");
	}
	elseif($_POST['boton_cuarto_medio']){
		header("Location: cuarto_medio.php");
	}
	elseif($_POST['boton_ex_alumno']){
		header("Location: exportar_pdf_alumno.php");
	}
	elseif($_POST['boton_ex_curso']){
		header("Location: exportar_pdf_curso.php");
	}
}

include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('principal_profesor_jefe');
	$plantilla->setVars(array(	
							"USER"			=>  $user,
							"ASIGNATURA"    =>  $asignatura,
 							"TABLA"	        =>  $tabla));
	echo $plantilla->show();

	//Carga CSS
	$plantilla->setPath('./css/');
	$plantilla->setTemplate('predeterminado');
	echo $plantilla->show();
?>