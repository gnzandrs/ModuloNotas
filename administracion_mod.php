<?php
/*************************************************************************** 
 * Panel Principal de la administracion del modulo notas.
 **************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user = $_SESSION['usuario'];
	if($_POST['boton_notas']){
		header("Location: admin_notas.php");
	}
	elseif($_POST['boton_carga']){
		header("Location: registro_apoderado.php");
	}
	
}

include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('administracion_mod');
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