<?php
/***************************************************************************
 * 
 * Panel de Exportacion PDF Alumnos
  - exporta pdf esclusivamente a un alumno en especifico del que se desee
    conocer su reendimiento en todas sus asignaturas.
 **************************************************************************/
 
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user = $_SESSION['usuario'];

	$query_datos = " 	SELECT u.username, u.firstname, u.lastname
						FROM course c, course_rel_user cru, user u
						WHERE cru.course_code = c.code
						AND cru.user_id = u.user_id
						AND c.category_code = ( SELECT Responsabilidad FROM user WHERE username = '$user' )
						AND u.status =5
						GROUP BY u.username, u.firstname, u.lastname";
	//echo $query_datos;			
	$resultado = mysql_query($query_datos);
	$tabla = '';
		
		while($row = mysql_fetch_assoc($resultado)) {		
			
			  $tabla .= "<tr>";
			  $tabla .= "<td class=\"todo\"><input type=\"radio\" name=\"alumno\" value=\"".$row['username']."\"></td>";
			  $tabla .= "<td class=\"todo\">".$row['firstname']." ".$row['lastname']."</td>";  
			  $tabla .= "</tr>";	

		}
		
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

$plantilla->setTemplate('exportar_pdf_alumno');
$plantilla->setVars(array(	
						"USER"			=>  $user,
						"TABLA"	        =>  $tabla));
echo $plantilla->show();

//Carga CSS
$plantilla->setPath('./css/');
$plantilla->setTemplate('predeterminado');
echo $plantilla->show();

?>