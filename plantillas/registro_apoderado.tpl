<form action="registro_apoderado.php"  method="post">
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
<div id="navegacion"><a href="administracion_mod.php">Principal Administrador</a> > Registro Apoderado </div>
</div>
<p>&nbsp;</p>
<table width="322" border="0" class="todo">
  <tr class="titulo_tabla">
    <td width="170">Datos Apoderado </td>
    <td width="142">&nbsp;</td>
  </tr>
  <tr >
    <td>Nombre</td>
    <td><label>
      <input name="nombre" type="text" id="nombre" />
    </label></td>
  </tr>
  <tr>
    <td>Apellido</td>
    <td><input name="apellido" type="text" id="apellido" /></td>
  </tr>
  <tr>
    <td>Usuario</td>
    <td><input name="usuario" type="text" id="usuario" /></td>
  </tr>
  <tr>
    <td>Contrase&ntilde;a</td>
    <td><input name="password" type="text" id="password" /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="email" type="text" id="email" /></td>
  </tr>
  <tr>
    <td>Telefono</td>
    <td><input name="telefono" type="text" id="telefono" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p><div id=scrolltable style="background: #eeeeee; overflow:auto; padding-right: 15px; padding-top: 15px; padding-left: 15px; padding-bottom: 15px; border-right: #6699CC 1px solid; border-top: #999999 1px solid; border-left: #6699CC 1px solid; border-bottom: #6699CC 1px solid; scrollbar-arrow-color : #999999; scrollbar-face-color : #666666; scrollbar-track-color :#3333333; position: absolute; height:300px; left: 381px; top: 132px; width: 351px">

  <table border="0">
    <tr  class="titulo_tabla">
      <td>Alumno </td>
    </tr>
    <tr>
      <td><table border="0">
          <tr class="fondo_tabla">
            <td></td>
            <td>Alumno</td>
            <td>Username</td>
          </tr>
          <tr> {TABLA} </tr>
      </table></td>
    </tr>
    <tr>
      <td><label>
        <input name="agregar_apod" type="submit" id="agregar_apod" value="Agregar" class="boton" />
      </label></td>
    </tr>
  </table>

</div>
</p>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="pie_pagina">
Módulo Notas
</div>
