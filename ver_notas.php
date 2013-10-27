<?php
/***************************************************************************
 * 
 * Panel de Vista de notas actuales
  - muestra las notas de un determinado curso y asignatura a un profesor.
  
 **************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user	 	= $_SESSION['usuario'];
	$asignatura = $_SESSION['asignatura'];
	$curso      = $_SESSION['curso'];

		
	$query_datos = "SELECT u.user_id, u.firstname, u.lastname, cru.nota1, cru.nota2, cru.nota3
					FROM   course c, course_rel_user cru, user u
					WHERE  cru.course_code = c.code
					AND    title = '$asignatura'
					AND    cru.user_id = u.user_id
					AND    c.category_code = '$curso'
					AND    u.status = 5";
					
	//echo $query_datos;
	$resultado 	= mysql_query($query_datos);
	$filas  	= mysql_num_rows($resultado);
	$tabla 		= '';
	$numero_lista = 1;
	while($row = mysql_fetch_assoc($resultado)) {
		
		  
		  $tabla .= "<tr class=\"todo\">";
		  $tabla .= "<td value=\"".$row['user_id']."\">".$row['firstname']. " " .$row['lastname']. "</td>";
		  $tabla .= "<td><label>".$row['nota1']."</label></td>";
		  $tabla .= "<td><label>".$row['nota2']."</label></td>";
		  $tabla .= "<td><label>".$row['nota3']."</label></td>";
		  //Calcula promedio
		  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
		  $promedio = substr($promedio,0,3);
		  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
		  $tabla .= "</tr>";
		  $numero_lista++;
		  		 

    }	
}

	include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('ver_notas');
	$plantilla->setVars(array(	
							"USER"			=>  $user,
							"TABLA"	        =>  $tabla));
	echo $plantilla->show();

	//Carga CSS
	$plantilla->setPath('./css/');
	$plantilla->setTemplate('predeterminado');
	echo $plantilla->show();

?>