<?php
/*******************************************************************************
 * 
 * Panel de Vista de notas actuales
  - muestra las notas de un determinado curso y asignatura a alumno o apoderado.
  
 *******************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user	 = $_SESSION['usuario'];
	$status	 = $_SESSION['status'];
	$largo = 50;
	
	
	//Si el usuario es un alumno estado(5)
	if($status == 5)
	{
		$tipo_user = "Alumno";
		$query_datos = "SELECT		c.title, cru.nota1, cru.nota2, cru.nota3
						FROM 		course_rel_user cru, user u, course_category cc, course c
						WHERE	 	u.username = '$user'
						AND 		cru.course_code = c.code
						AND 		cru.user_id = u.user_id
						GROUP BY 	c.title, cru.nota1, cru.nota2, cru.nota3";
		$resultado = mysql_query($query_datos);
		$tabla = '';
		$promedio = "";
		
		//Contruyo la tabla con las asignaturas y sus notas
		while($row = mysql_fetch_assoc($resultado)) {
						
			  $tabla .= "<tr>";
			  $tabla .= "<td class=\"todo\">".$row['title']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota1']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota2']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota3']."</td>";
			  //Calcula promedio
			  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
			  $promedio = substr($promedio,0,3);
			  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
			  $tabla .= "</tr>";
			  
			  //tabla para el grafico
			  $prom     = $promedio;
			  $barra = $largo * $promedio - 60;
						
			  $tablag .= "<table>";
			  $tablag .= "<tr class=\"todo\">";
			  $tablag .= "<td width=\"150\"><b>".$row['title']."</b></td>";
			  $tablag .= "<td width=\"$barra\" bgcolor=\"#AB456F\"></td>";
			  $tablag .= "</tr>";
			  $tablag .= "</table>";

		}
		
		//Datos del alumno
		$query_datos_alum	=  "select firstname, lastname from user where username = '$user'";
		$resultado 			=	 mysql_query($query_datos_alum) or die(mysql_error());
		$nombre_alum		= '';
		$nombre_apod		= '';
		
		while($row = mysql_fetch_assoc($resultado)) {			
			  $nombre_alum .= $row['firstname']. " ".$row['lastname'];
		}
		//Datos del apod
		$query_datos_apod 	=  "SELECT firstname, lastname FROM  user WHERE username = (SELECT user_apod FROM user_rel_apod WHERE user_alumn = '$user')";
		$resultado 		= mysql_query($query_datos_apod) or die(mysql_error());
		$nombre_apod    = '';
		
		while($row = mysql_fetch_assoc($resultado)) {			
			  $nombre_apod .= $row['firstname']. " ".$row['lastname'];
		}

		
	}
	
	
	
	//Si el usuario es un apoderado estado(6)
	if($status == 6)
	{
		$tipo_user = "Alumno";
		$query_sel_alumno = "SELECT c.title, cru.nota1, cru.nota2, cru.nota3
							FROM course c, course_rel_user cru, user u, user_rel_apod ura
							WHERE cru.course_code = c.code
							AND cru.user_id = u.user_id
							AND u.status =5
							AND username = (
							SELECT user_alumn
							FROM user_rel_apod
							WHERE user_apod = '$user')
							GROUP BY c.title, cru.nota1, cru.nota2, cru.nota3";
				
		$resultado = mysql_query($query_sel_alumno);
		$tabla = '';
		
		//Contruyo la tabla con las asignaturas y sus notas
		while($row = mysql_fetch_assoc($resultado)) {
						
			  $tabla .= "<tr>";
			  $tabla .= "<td class=\"todo\">".$row['title']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota1']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota2']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota3']."</td>";
			  //Calcula promedio
			  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
			  $promedio = substr($promedio,0,3);
			  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
			  $tabla .= "</tr>";
			  
			  //tabla para el grafico
			  $prom     = $promedio;
			  $barra = $largo * $promedio - 60;
						
			  $tablag .= "<table>";
			  $tablag .= "<tr class=\"todo\">";
			  $tablag .= "<td width=\"150\"><b>".$row['title']."</b></td>";
			  $tablag .= "<td width=\"$barra\" bgcolor=\"#AB456F\"></td>";
			  $tablag .= "</tr>";
			  $tablag .= "</table>";

		}
		
		//Datos del alumno
		$query_datos_alum	=  "select firstname, lastname from user where username = (select user_alumn from user_rel_apod where user_apod = '$user')";
		$resultado 			=	 mysql_query($query_datos_alum) or die(mysql_error());
		$nombre_alum		= '';
		$nombre_apod		= '';
		
		while($row = mysql_fetch_assoc($resultado)) {			
			  $nombre_alum .= $row['firstname']. " ".$row['lastname'];
		}
		//Datos del apod
		$query_datos_apod 	=  "select firstname, lastname from user where username = '$user'";
		$resultado 		= mysql_query($query_datos_apod) or die(mysql_error());
		$nombre_apod    = '';
		
		while($row = mysql_fetch_assoc($resultado)) {			
			  $nombre_apod .= $row['firstname']. " ".$row['lastname'];
		}
		
	}

		

}	

include ("Template.php");

//Carga Plantilla
$plantilla 			= new Template();
$plantilla->setPath('./plantillas/');

$plantilla->setTemplate('ver_notas_alumno');
$plantilla->setVars(array(	
						"USER"			=>  $user,
						"TABLA"	        =>  $tabla,
						"TABLAG"		=>   $tablag,
						"NOMBRE_ALUM"	=>  $nombre_alum,
						"NOMBRE_APOD"	=>  $nombre_apod,
						"TIPO_USER"		=>  $tipo_user
						));
echo $plantilla->show();

//Carga CSS
$plantilla->setPath('./css/');
$plantilla->setTemplate('predeterminado');
echo $plantilla->show();

?>

