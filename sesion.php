<?PHP

/***************************************************************************
 *
 * Archivo de configuracion: Session Iniciada Verifica Usuario
 *
 ***************************************************************************/

 function verifica_usuario()
 {
	session_start();
	if($_SESSION['usuario'])
	{
		return true;
	}
	else
	{
		header('Location:index.php');
	}
 }

?>