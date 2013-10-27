<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<form action="cuarto_medio.php"  method="post">
</head>

<body>
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
<div id="navegacion"><a href="index.php">Principal Profesor</a> &gt; Cuarto Medio </div>

</div>
<p>
<div id="espacio_izq"></div>
<hr/>
<div align="center">
  <table border="0">
    <tr class="titulo_tabla">
      <td></td>
	  <td>Asignatura</td>
    </tr>
    <tr>
      {TABLA}    </tr>
    <tr>    </tr>
  </table>
  <hr />
  <table border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="titulo_tabla">
      <td>&nbsp;</td>
      <td>Nota a Modificar </td>
    </tr>
    <tr class="todo">
      <td><label>
        <input name="ed_nota" type="radio" value="nota1" />
      </label></td>
      <td>Nota 1 </td>
    </tr>
    <tr class="todo">
      <td><label>
        <input name="ed_nota" type="radio" value="nota2" />
      </label></td>
      <td>Nota 2 </td>
    </tr>
    <tr class="todo">
      <td><label>
        <input name="ed_nota" type="radio" value="nota3" />
      </label></td>
      <td>Nota 3 </td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
<p>
  <label></label>
  <label>
  <input name="Ver" type="submit" id="Ver" value="Ver" class="boton"/>
  </label>
  <input name="Modificar" type="submit" id="Modificar" value="Modificar" class="boton"/>
  <label></label>
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