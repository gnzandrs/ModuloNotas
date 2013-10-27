<form action="admin_notas.php"  method="post">
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
<div id="navegacion"><a href="administracion_mod.php">Principal Administrador </a>> Exportar Notas Alumno </div>
</div>

<p>&nbsp;</p>
<table border="0" align="center">
  <tr class="titulo_tabla">
    <td></td>
    <td>Alumno Tercero Medio </td>
  </tr>
  <tr> {TABLA_TERCERO} </tr>
</table>
<p>&nbsp;</p>
<table border="0" align="center">
  <tr class="titulo_tabla">
    <td></td>
    <td>Alumno Cuarto Medio </td>
  </tr>
  <tr> {TABLA_CUARTO} </tr>
</table>
<p>&nbsp;</p>
<div align="center">
    <input name="Notas_parciales" type="submit" id="Notas_parciales" value="Notas Parciales" class="boton"/>
  </div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="pie_pagina">
Módulo Notas
</div>
</form>