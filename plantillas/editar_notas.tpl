<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script>
function validarNumero(numero){
if (!/^([0-9][.][0-9])*$/.test(numero))
alert("El valor: " + numero + " No es un número correcto para asignar una nota. La sintaxis correcta debe ser un numero decimal separado por un punto. Ejemplo : 5.2");
}
</script> 
<form action="editar_notas.php"  method="post">
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
<div id="navegacion"><a href="index.php">Principal Profesor</a> > <a href="index.php">{CURSO_NOMBRE}</a> &gt; Editar Notas </div>
</div>
      <p>
        <input name="filas" type="hidden" id="filas" value="{FILAS}" />
        <input name="asignatura" type="hidden" id="asignatura" value="{ASIGNATURA}" />
        <input name="curso" type="hidden" id="curso" value="{CURSO}" />
        <input name="nota" type="hidden" id="nota" value="{NOTA}" />
      </p>
      <table border="0" align="center">
   	  <tr class="titulo_tabla">
        <td>Alumno</td>
		<td>Nota 1</td>
		<td>Nota 2</td>
        <td>Nota 3</td>
		<td>Promedio</td>
      </tr>
      <tr>
       {TABLA}	  </tr>
    </table>
<p align="center">
        <input name="Aplicar" type="submit" id="Aplicar" value="Aplicar" class="boton"/>
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
