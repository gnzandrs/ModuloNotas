<?php
/*************************************************************************** 
 * Pagina principal registro apoderado.
  - Permite registrar un apoderado.
  - Permite asociar un alumno a un apoderado como carga familiar.
 **************************************************************************/
include("configuracion.php");
include("sesion.php");

if(verifica_usuario() ){

$user 	= $_SESSION['usuario'];
$query_datos = "select * from user where status = 5";
	
	$resultado 	= mysql_query($query_datos);
	$filas  	= mysql_num_rows($resultado);
	$tabla 		= '';
	$numero_lista = 1;
	while($row = mysql_fetch_assoc($resultado)) {
		
		  
		  $tabla .= "<tr class=\"todo\">";
		  $tabla .= "<td><input type=\"radio\" name=\"alumno\" value=\"".$row['username']."\"></td>";
		  $tabla .= "<td value=\"".$row['user_id']."\">".$row['firstname']. " " .$row['lastname']. "</td>";
		  $tabla .= "<td><label>".$row['username']."</label></td>";
		  /*$tabla .= "<td><input type=\"text\" name=\"Nota3\" value=\"".$row['nota3']."\"/></td>";*/
		  $tabla .= "</tr>";
		  $numero_lista++;
		  	 

    }

	if($_POST['agregar_apod'])
	{	
		$nombre 	= $_POST['nombre'];
		$apellido 	= $_POST['apellido'];
		$usuario 	= $_POST['usuario'];
		$password	= md5($_POST['password']);
		$email		= $_POST['email'];
		$telefono	= $_POST['telefono'];
		
		
		$query_comprueba = "SELECT * from user WHERE username = '$usuario'";
		$resultado	 =	mysql_query($query_comprueba);
		$filas  	= mysql_num_rows($resultado);
		
		if($filas == 0)
		{
			
			$alumno	= $_POST['alumno'];
			
			$insert_tabla_user  = " INSERT INTO `dokeos_main`.`user` (`user_id`, `lastname`, `firstname`, `username`, `password`, `auth_source`, `email`, `status`, 
								`official_code`, `phone`, `picture_uri`, `creator_id`, `competences`, `diplomas`, `openarea`, `teach`, `productions`, 
								`chatcall_user_id`, `chatcall_date`, `chatcall_text`, `language`, `registration_date`, `expiration_date`, `active`, `openid`,
								`theme`, `hr_dept_id`, `Responsabilidad`) 
								VALUES (NULL, '$apellido', '$nombre', '$usuario', '$password', 'platform', '$email', '6', NULL, '411037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0000-00-00 00:00:00', '', NULL, '2009-12-08 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, '0', NULL);";
			$insert_tabla_apod  = "INSERT INTO user_rel_apod (user_alumn,user_apod) VALUES ('$alumno','$usuario');";
			
			mysql_query($insert_tabla_user);
			mysql_query($insert_tabla_apod);
		}
		elseif($filas == 1)
		{
			echo "El usuario existe es imposible crearlo.";
		}
		
	}

}

	include ("Template.php");

	//Carga Plantilla
	$plantilla 			= new Template();
	$plantilla->setPath('./plantillas/');

	$plantilla->setTemplate('registro_apoderado');
	$plantilla->setVars(array(	"TABLA"	        =>  $tabla,
								"USER"	        =>  $user
								));
	echo $plantilla->show();

	//Carga CSS
	$plantilla->setPath('./css/');
	$plantilla->setTemplate('predeterminado');
	echo $plantilla->show();

?>