<?php
/*******************************************************************************
 * 
 * Genera Estadisticas
  - genera estadisticas con respecto a las notas parciales de un alumno.
  
 *******************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user	 = $_SESSION['usuario'];
	$status	 = $_SESSION['status'];
	
	$largo = 50;
	$cantidad_notas = 3;
	$nombre_alumno = "";
	
	$query_nombre_alumno = " SELECT u.firstname, u.lastname 
								FROM user u, user_rel_apod ura
								WHERE u.username = ura.user_alumn
								AND ura.user_apod = '$user'";
							
	$resultado_alumno = mysql_query($query_nombre_alumno);
	
	while($row = mysql_fetch_assoc($resultado_alumno)){
			$nombre_alumno = $row['firstname']. " ". $row['lastname'];
	}

	if($status == 5)
	{
		
	}
	elseif($status == 6)
	{
		$query_nombre = "	SELECT c.title, cru.nota1, cru.nota2, cru.nota3
							FROM course c, course_rel_user cru, user u, user_rel_apod ura
							WHERE cru.course_code = c.code
							AND cru.user_id = u.user_id
							AND u.status = 5
							AND username = (
							SELECT user_alumn
							FROM user_rel_apod
							WHERE user_apod = '$user')
							GROUP BY c.title, cru.nota1, cru.nota2, cru.nota3 ";
							
		$resultado = mysql_query($query_nombre);
		
		$nota1 = "";
		$nota2 = "";
		$nota3 = "";
		$tabla = "";
		$color = "";
		
		while($row = mysql_fetch_assoc($resultado)){
			
			$asignatura = $row['title'];
			$nota1 		= $row['nota1'];
			$nota2 		= $row['nota2'];
			$nota3 		= $row['nota3'];
			 $promedio = ( $nota1 + $nota2 + $nota3 )/3;
			 $promedio = substr($promedio,0,3);
			 $prom     = $promedio;
			//echo $asignatura . ": ". round($promedio)."<br>";
			
			
			//$promedio = round($promedio);
			$barra = $largo * $promedio - 60;
			
			//Verifico si el promedio es malo, regular o bueno.
			/*si es inferior a la nota 4
			if($barra < 240)
			{
				$color = "red";
			}
			//Si es mayor o igual a nota 4
			if($barra  >= 240)
			{
				$color = "blue";
			}
			//Si es mayor o igual a nota 6
			if($barra >= 360)
			{
				$color = "yellow";
			}*/
			
			$tabla .= "<table>";
			$tabla .= "<tr class=\"todo\">";
			$tabla .= "<td width=\"150\"><b>$asignatura</b></td>";
			$tabla .= "<td width=\"$barra\" bgcolor=\"red\">$prom</td>";
			$tabla .= "</tr>";
			$tabla .= "</table>";
		
			//echo "$asignatura ".$nota1." ".$nota2." ".$nota3."<br>";
			
		}
	}
}

	include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('informe_notas');
	$plantilla->setVars(array(	
							"TABLA"	        =>  $tabla,
							"NOMBRE_ALUMNO" =>  $nombre_alumno,
							 ));
	echo $plantilla->show();

	//Carga CSS
	$plantilla->setPath('./css/');
	$plantilla->setTemplate('predeterminado');
	echo $plantilla->show();	


?>