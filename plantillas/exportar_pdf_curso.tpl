<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<form action="exportar_pdf_curso.php"  method="post">
<body>
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
<div id="navegacion"><a href="index.php">Principal Profesor</a> > Exportar a PDF Curso </div>
</div>
<p>&nbsp;</p>
<table border="0" align="center">
  <tr class="titulo_tabla">
    <td></td>
    <td>Nombre Asignatura </td>
  </tr>
  <tr> {TABLA} </tr>
</table>
<p>
  <label>
  <div align="center">
    <input name="Lista_alumnos" type="submit" id="Lista_alumnos" value="Lista" class="boton"/>
  </div>
  </label>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="pie_pagina">
Módulo Notas
</div>
</body>
</html>
