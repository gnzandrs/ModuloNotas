<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<form action="principal_profesor.php"  method="post">
<body>
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
<div id="navegacion"> Principal  Profesor
</div>
</div>
<h1 class="encabezado">Bienvenido al Sistema de Notas <hr /><br />
</h1>
</p>
<hr />
<table height="127" border="0" class="tabla_profesor">
  <tr>
    <td class="titulo_tabla" width="309" height="21"><strong>Informaci&oacute;n
	</strong></td>
    <td class="titulo_tabla" width="338"><p><strong>Cursos</strong></p>    </td>
  </tr>
  <tr>
    <td class="tabla_fondo" height="100"><div align="center">Seleccione el curso al cual desea ingresar. </div></td>
    <td><table border="0-" align="right">
      <tr class="todo">
        <td><img src="http://pasionistas.sytes.net/main/img/teachers.gif" alt="profesor" width="22" height="22" /></td>
        <td><label>Tercero Medio </label></td>
        <td><input type="submit" name="boton_tercero_medio" value="Ir" class="boton"/></td>
      </tr>
      <tr class="todo">
        <td><img src="http://pasionistas.sytes.net/main/img/teachers.gif" alt="profesor" width="22" height="22" /></td>
        <td>Cuarto Medio </td>
        <td><input type="submit" name="boton_cuarto_medio" value="Ir" class="boton"/></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="pie_pagina">
Módulo Notas
</div>
</body>
</html>