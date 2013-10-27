<?php
/***************************************************************************
 * 
 * Panel de Edicion de Notas
  - realiza un update a la base de datos en los campos nota1,nota2,nota3
  
 **************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() )
{
	$user 		= $_SESSION['usuario'];
	$asignatura = $_SESSION['asignatura'];
	$curso      = $_SESSION['curso'];
	$nota 		= $_SESSION['nota'];

	
	$query_datos = "SELECT u.user_id, u.firstname, u.lastname, cru.nota1, cru.nota2, cru.nota3
					FROM   course c, course_rel_user cru, user u
					WHERE  cru.course_code = c.code
					AND    title = '$asignatura'
					AND    cru.user_id = u.user_id
					AND    c.category_code = '$curso'
					AND    u.status = 5";
	//echo $query_datos;
	$resultado 	= mysql_query($query_datos);
	$filas	 	= mysql_num_rows($resultado);
	$tabla 		= '';
	$numero_lista = 1;
	//Envia campos activados o desactivados dependiendo de la nota a editar

	if($nota == "nota1")
	{
		while($row = mysql_fetch_assoc($resultado)) {
		
		  
		  $tabla .= "<tr class=\"todo\">";
		  $tabla .= "<td name =\"\"value=\"".$row['user_id']."\">".$row['firstname']. " " .$row['lastname']. "</td>";
		  $tabla .= "<td><input type=\"text\" name=\"Nota1_".$row['user_id']."\" value=\"".$row['nota1']."\" size=3/></td>";
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
	if($nota == "nota2")
	{
		while($row = mysql_fetch_assoc($resultado)) {
		
		  
		  $tabla .= "<tr class=\"todo\">";
		  $tabla .= "<td name =\"\"value=\"".$row['user_id']."\">".$row['firstname']. " " .$row['lastname']. "</td>";
		  $tabla .= "<td><label>".$row['nota1']."</label></td>";
		  $tabla .= "<td><input type=\"text\" name=\"Nota2_".$row['user_id']."\" value=\"".$row['nota2']."\" size=3/></td>";
		  $tabla .= "<td><label>".$row['nota3']."</label></td>";
		  //Calcula promedio
		  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
		  $promedio = substr($promedio,0,3);
		  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
		  $tabla .= "</tr>";
		  $numero_lista++;
		  
		  $numero_lista++;
		  		 

		}
	}
	if($nota== "nota3")
	{
		while($row = mysql_fetch_assoc($resultado)) {
		
		  $tabla .= "<tr class=\"todo\">";
		  $tabla .= "<td name =\"\"value=\"".$row['user_id']."\">".$row['firstname']. " " .$row['lastname']. "</td>";
		  $tabla .= "<td><label>".$row['nota1']."</label></td>";
		  $tabla .= "<td><label>".$row['nota2']."</label></td>";
		  $tabla .= "<td><input type=\"text\" name=\"Nota3_".$row['user_id']."\" value=\"".$row['nota3']."\" size=3/></td>";
		  //Calcula promedio
		  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
		  $promedio = substr($promedio,0,3);
		  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
		  $tabla .= "</tr>";
		  $numero_lista++;
		  
		  $numero_lista++;
		}
	}
	
	//Se realiza el update ala base de datos.
	 if($_POST['Aplicar'])
		{
			
				if($_POST['asignatura'])
			{
				$asignatura = 	$_POST['asignatura'];
				$curso     	=  	$_POST['curso'];
				$nota 	   	=  	$_POST['nota'];
				//Rescato IDS
				$query_datos = "SELECT u.user_id
								FROM   course c, course_rel_user cru, user u
								WHERE  cru.course_code = c.code
								AND    title = '$asignatura'
								AND    cru.user_id = u.user_id
								AND    c.category_code = '$curso'
								AND    u.status = 5";
				
				$resultado 	= mysql_query($query_datos);
				$filas	 	= mysql_num_rows($resultado);
				
				if($nota == "nota1")
				{
					while($row = mysql_fetch_assoc($resultado)) {
						//Contruye Update
					  $update  = "UPDATE course_rel_user 
								  set nota1 = ".$_POST['Nota1_'.$row['user_id'].'']." 
								  WHERE user_id =  ".$row['user_id']."
								  AND course_rel_user.course_code = (select code from course where title='$asignatura' and category_code='$curso')
								  AND course_rel_user.status=5";
					  mysql_query($update);
					}
				}
				if($nota == "nota2")
				{
					while($row = mysql_fetch_assoc($resultado)) {
						//Contruye Update
					  $update  = "UPDATE course_rel_user 
								  set nota2 = ".$_POST['Nota2_'.$row['user_id'].'']." 
								  WHERE user_id =  ".$row['user_id']."
								  AND course_rel_user.course_code = (select code from course where title='$asignatura' and category_code='$curso')
								  AND course_rel_user.status=5";
					  mysql_query($update);
					}
				}
				if($nota == "nota3")
				{
					while($row = mysql_fetch_assoc($resultado)) {
						//Contruye Update
					  $update  = "UPDATE course_rel_user 
								  set nota3 = ".$_POST['Nota3_'.$row['user_id'].'']." 
								  WHERE user_id =  ".$row['user_id']."
								  AND course_rel_user.course_code = (select code from course where title='$asignatura' and category_code='$curso')
								  AND course_rel_user.status=5";
					  mysql_query($update);
					}
				}
				echo "<script>alert(\"La modificacion a sido realizada.\");</script>";
				echo "<meta http-equiv='refresh' content='0; URL=principal_profesor_jefe.php'>";
			}
		}
	//Se pulsa el boton de cancelar operacion.	
	if($_POST['Cancelar'])
	{
		echo "<SCRIPT LANGUAGE=\"JavaScript\">
			 if(confirm(\"¿Realmente desea cancelar las notas ingresadas?\"))location(\"index.php\");</SCRIPT>";	
	}
	
	//Cambia nombre 3ro o 4to para la plantilla
	if($curso == '3ro')
	{
		$curso_nombre = "Tercero Medio";
	}
	elseif($curso == '4to')
	{
		$curso_nombre = "Cuarto Medio";
	}
}	
	
	include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('editar_notas');
	$plantilla->setVars(array(	
							"USER"			=>  $user,
							"TABLA"	        =>  $tabla,
							"FILAS"			=>  $filas,
							"CURSO" 		=>  $curso,
							"ASIGNATURA"    =>  $asignatura,
							"NOTA"			=>  $nota,
							"CURSO_NOMBRE"	=> 	$curso_nombre ));
	echo $plantilla->show();

	//Carga CSS
	$plantilla->setPath('./css/');
	$plantilla->setTemplate('predeterminado');
	echo $plantilla->show();

?>