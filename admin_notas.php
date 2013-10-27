<?php
/*************************************************************************** 
 * Administracion Notas 
 - El administrador esta capacitado para realizar un informe Pdf con las 
   notas de un alumno en particular de 3ro o 4to Medio
 **************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user = $_SESSION['usuario'];
	//Alumnos que pertenecen a tercero medio
	$query_datos_tercero = " 	SELECT u.username, u.firstname, u.lastname
								FROM course c, course_rel_user cru, user u
								WHERE cru.course_code = c.code
								AND cru.user_id = u.user_id
								AND c.category_code = '3ro'
								AND u.status =5
								GROUP BY u.username, u.firstname, u.lastname";
								
	//Alumnos que pertenecen a cuarto medio
	$query_datos_cuarto = " 	SELECT u.username, u.firstname, u.lastname
								FROM course c, course_rel_user cru, user u
								WHERE cru.course_code = c.code
								AND cru.user_id = u.user_id
								AND c.category_code = '4to'
								AND u.status =5
								GROUP BY u.username, u.firstname, u.lastname";
								
	//echo $query_datos;			
	$resultado_tercero = mysql_query($query_datos_tercero);
	$resultado_cuarto  = mysql_query($query_datos_cuarto);
	
	$tabla_tercero = '';
	$tabla_cuarto  = '';
		
		//Tabla tercero
		while($row = mysql_fetch_assoc($resultado_tercero)) {		
			
			  $tabla_tercero .= "<tr>";
			  $tabla_tercero .= "<td class=\"todo\"><input type=\"radio\" name=\"alumno\" value=\"".$row['username']."\"></td>";
			  $tabla_tercero .= "<td class=\"todo\">".$row['firstname']." ".$row['lastname']."</td>";  
			  $tabla_tercero .= "</tr>";	

		}
		//Tabla cuarto
		while($row = mysql_fetch_assoc($resultado_cuarto)) {		
			
			  $tabla_cuarto .= "<tr>";
			  $tabla_cuarto .= "<td class=\"todo\"><input type=\"radio\" name=\"alumno\" value=\"".$row['username']."\"></td>";
			  $tabla_cuarto .= "<td class=\"todo\">".$row['firstname']." ".$row['lastname']."</td>";  
			  $tabla_cuarto .= "</tr>";	

		}
		
		//Boton que genera el pdf
		if($_POST['Notas_parciales'])
		{
			if($_POST['alumno']) {
				//Username del alumno			
				$alumno = $_POST['alumno'];
				//Rescata nombre de alumno seleccionado
				$query_alumno = "	SELECT firstname, lastname 
									FROM   user
									WHERE  username = '$alumno'";
				$resultado = mysql_query($query_alumno);
				$nombre_alumno = mysql_fetch_object($resultado);
				//Envia nombre de usuario, nombre y apellido del alumno para generar pdf.
				header("Location: genera_pdf_alumno.php?alumno=$alumno&nombre=$nombre_alumno->firstname&apellido=$nombre_alumno->lastname");
			}
			else
			{
				echo "<SCRIPT LANGUAGE=\"JavaScript\"> alert('Debe seleccionar un alumno.') </SCRIPT>";
			}
		}
}

include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('admin_notas');
	$plantilla->setVars(array(	
							"USER"			=>  $user,
							"TABLA_TERCERO" =>  $tabla_tercero,
							"TABLA_CUARTO"	=>  $tabla_cuarto
							));
	echo $plantilla->show();

	//Carga CSS
	$plantilla->setPath('./css/');
	$plantilla->setTemplate('predeterminado');
	echo $plantilla->show();
?>