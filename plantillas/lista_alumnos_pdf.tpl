<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<form action="lista_alumnos_pdf.php"  method="post">
<body>
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
</div>
<p>
  <input name="asignatura" type="hidden" value="{ASIGNATURA}" />
</p>
<table width="39%" height="27" border="0">
  <tr class="fondo_tabla">
    <td width="37%">Alumno</td>
  </tr>
  <tr> {TABLA} </tr>
</table>
<p>
  <label>
  <input name="Generar_pdf" type="submit" id="Generar_pdf" value="Generar PDF" class="boton"/>
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
