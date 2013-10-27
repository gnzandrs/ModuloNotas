<?php
include("configuracion.php");
include ('class.ezpdf.php');
	$alumno 	= 	$_GET['alumno'];
	$nombre 	= 	$_GET['nombre'];
	$apellido   = 	$_GET['apellido'];

	//Codigo de construccion PDF

			$pdf =& new Cezpdf('a4');
			$pdf->selectFont('../fonts/courier.afm');
			$pdf->ezSetCmMargins(1,1,1.5,1.5);

			$queEmp = "	SELECT title, cru.nota1, cru.nota2, cru.nota3, SUBSTR(((cru.nota1 + cru.nota2 + cru.nota3)/3),1,3)  AS promedio
						FROM course c, course_rel_user cru, user u
						WHERE cru.course_code = c.code
						AND cru.user_id = u.user_id
						AND u.status =5
						AND username='$alumno'";
			$resEmp = mysql_query($queEmp, $bd) or die(mysql_error());
			$totEmp = mysql_num_rows($resEmp);

			$ixx = 0;
			while($datatmp = mysql_fetch_assoc($resEmp)) { 
				$ixx = $ixx+1;
				$data[] = array_merge($datatmp, array('num'=>$ixx));
			}
			$titles = array(
							'title'=>'<b>Asignatura</b>',
							'nota1'=>'<b>Nota 1</b>',
							'nota2'=>'<b>Nota 2</b>',
							'nota3'=>'<b>Nota 3</b>',
							'promedio'=>'<b>Promedio</b>'
						);
			$options = array(
							'shadeCol'=>array(0.9,0.9,0.9),
							'xOrientation'=>'center',
							'width'=>500
						);
			$txttit = "<b>PASIONISTAS.SYTES.NET</b>\n";
			$txttit.= "Notas Parciales Alumno: $nombre $apellido \n";

			$pdf->ezText($txttit, 12);
			$pdf->ezTable($data, $titles, '', $options);
			$pdf->ezText("\n\n\n", 10);
			$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
			$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
				$pdf->ezStream();

?>