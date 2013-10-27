<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<form action="principal_profesor_jefe.php"  method="post">
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
<p>&nbsp;</p>
<h1 class="encabezado">Bienvenido al Sistema de Notas <hr /></h1><hr />
<table width="285" border="0-">
  <tr>
    <td class="titulo_tabla" width="243"><strong>Cursos Disponibles </strong></td>
    <td width="32">&nbsp;</td>
  </tr>
  <tr class="todo">
    <td>Tercero Medio </td>
    <td><label>
      <input type="submit" name="boton_tercero_medio" value="Ir" class="boton"/>
    </label></td>
  </tr>
  <tr class="todo">
    <td>Cuarto Medio </td>
    <td><input type="submit" name="boton_cuarto_medio" value="Ir" class="boton"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="titulo_tabla"><strong>Exportar PDF </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr class="todo">
    <td>Alumno</td>
    <td><input type="submit" name="boton_ex_alumno" value="Ir" class="boton"/></td>
  </tr>
  <tr class="todo">
    <td>Curso</td>
    <td><input type="submit" name="boton_ex_curso" value="Ir" class="boton"/></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="pie_pagina">
Módulo Notas
</div>
</body>
</html>
