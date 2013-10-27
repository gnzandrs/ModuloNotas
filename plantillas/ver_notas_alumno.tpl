<style type="text/css">
<!--
.Estilo4 {color: #FFFFFF; font-size: large; font-weight: bold; }
.Estilo5 {font-size: medium}
.Estilo6 {color: #FFFFFF; font-size: medium; font-weight: bold; }
-->
</style>
<form action="informe_notas.php"  method="post">
<div id="header_contenedor">
<div id="header_top">Colegio Pasionistas </div>
<div id="header_medio">
  <div align="right">Sistema de Notas Alumno</div>
</div>
<div id="header_usuario">
  <p align="right">Usuario: {USER} | <a href="logout.php">(Salir)</a></p>
</div>
<div id="navegacion"><a href="index.php">Principal</a> > Ver Notas </div>
</div>
<tr>
  <td><p>&nbsp;</p>
  <table width="900" border="0" align="center" cellpadding="40" cellspacing="0">
    <tr class="fondo_notas">
      <td><table width="900" border="0" align="center">
        <tr>
          <td class="titulo_tabla">Nombre {TIPO_USER}</td>
          <td class="todo">{NOMBRE_ALUM}</td>
        </tr>
        <tr>
          <td class="titulo_tabla">Apoderado</td>
          <td class="todo">{NOMBRE_APOD}</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
        <table width="900" border="0">
          <tr>
            <td>&nbsp;</td>
            <td><table width="900" border="0">
                <tr class="titulo_tabla">
                  <td><div align="center">Asignatura</div></td>
                  <td><div align="center">Nota 1</div></td>
                  <td><div align="center">Nota 2</div></td>
                  <td><div align="center">Nota 3</div></td>
                  <td><div align="center">Promedio</div></td>
                </tr>
                <tr> {TABLA} </tr>
            </table></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <div align="center">
          <table width="552" border="0">
              <tr class="todo">
                <td width="151">&nbsp;</td>
                <td width="90"><div align="center" class="Estilo4 Estilo5">
                  <p>Insuficiente</p>
                </div></td>
                <td width="101"><div align="center" class="Estilo6">
                  <p>Regular</p>
                </div></td>
                <td width="86"><div align="center" class="Estilo6">
                  <p>Bueno</p>
                </div></td>
                <td width="102">&nbsp;</td>
              </tr>
              <tr class="todo">
                <td>&nbsp;</td>
                <td><div align="center">2.0</div></td>
                <td><div align="center">4.0</div></td>
                <td><div align="center">6.0</div></td>
                <td><div align="center"></div></td>
              </tr>
              <tr class="todo">
                <td>&nbsp;</td>
                <td><div align="center">|</div></td>
                <td><div align="center">|</div></td>
                <td><div align="center">|</div></td>
                <td>&nbsp;</td>
              </tr>
              </table>
          <table width="552" border="0">
              <tr>
                <td>{TABLAG}</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              </table>
          <table width="264" border="0">
              <tr>
                <td width="157"><input type="button" name="imprimir" value="Imprimir" onclick="window.print();" class="boton" /></td>
                <td width="97"><input type="button" value="Salir" onClick="window.location = 'logout.php';" class="boton"></td>
              </tr>
              </table>
        </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
    <p>&nbsp;</p>
    </td>
</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="pie_pagina">
Módulo Notas
</div>
</form>