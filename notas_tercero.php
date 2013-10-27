<?php

	$user = $_COOKIE['user'];
	$pass = $_COOKIE['pass'];
	
	$query_datos = "select * from notas where user='$user'";
	$resultado = mysql_query($query_datos);
	
	while($row = mysql_fetch_assoc($resultado)) {
	  
	  echo "<tr>";
	  echo "<td class=\"table_hr_center\">$check</td>";
	  echo "<td class=\"table_tr_center\">".$row['user_id']."</td>";
	  echo "<td class=\"table_tr_center\">".$row['nota1']."</td>";     echo "</tr>";

    }



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="657" height="241" border="1">
  <tr>
    <td width="246" height="59"><span class="Estilo1">Nombre Asignatura </span></td>
    <td width="59"><span class="Estilo1">Nota 1 </span></td>
    <td width="61"><span class="Estilo1">Nota 2 </span></td>
    <td width="58"><span class="Estilo1">Nota 3 </span></td>
    <td width="60"><span class="Estilo1">Nota 4 </span></td>
    <td width="133"><span class="Estilo1"> Promedio</span></td>
  </tr>
  <tr>
    <td><span class="Estilo1">Matematicas</span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo1">Castellano</span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo1">Historia</span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo1">Musica</span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo1">Religion</span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
    <td><span class="Estilo1"></span></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
