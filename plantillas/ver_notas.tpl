<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
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
<div id="navegacion"><a href="index.php">Principal Profesor</a> > Ver Notas </div>
</div>
      <p>&nbsp;</p>
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
      <p>
<label>
        
          <input name="Volver" type="button" id="Volver" value="Volver" class="boton" onclick="javascript :history.back()"/>
        </label>
</body>
</html>
