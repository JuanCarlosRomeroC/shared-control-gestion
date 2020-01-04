<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Indicadores de Fases</title>
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include "../conexion/conectar.php";
include "../templates/CENE_MENU_PRINCIPAL.dwt";
  $result=mysql_query("select * from gestion_fases WHERE cod_actividad=$_GET[seleccionado] order by id",$link);
  $result2=mysql_query("select a.id,b.precedida from gestion_fases as a inner join gestion_relacion_actividades_fases as b on a.id=b.fase WHERE a.cod_actividad=$_GET[seleccionado] order by a.id",$link);
 if ($result) {
?>


<form id="form1" name="form1" method="post" action="../actividades/actividades.php">
<p>&nbsp;</p>
<table width="748" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="7"><div align="center"><strong>Indicadores de Fases</strong></div></td>
    </tr>
    <tr>
      <td width="61"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="214"><div align="center"><strong>Nombre</strong></div></td>
      <td width="92"><div align="center"><strong>Precedencia</strong></div></td>
      <td width="180"><strong>Indicador de Cumplimiento</strong></td>
      <td width="159"><div align="center"><strong>Indicador de Tiempo</strong></div></td>
    </tr>
    <?php while ($row=mysql_fetch_array($result)){
	 $result2=mysql_query("select a.id,b.precedida from gestion_fases as a inner join gestion_relacion_actividades_fases as b on a.id=b.fase WHERE a.cod_actividad=$_GET[seleccionado] order by a.id",$link);
 ?>
    <tr>
      <td height="24"><div align="center"><?php echo $row[0] ?></div></td>
      <td><div align="justify"><?php echo $row[1] ?></div></td>
      
     
      <td><div align="center">
        <?php while (($row2=mysql_fetch_array($result2))){
		  	  if ($row[0]==$row2[0])
	  	      echo $row2[1]."-";
			   }
			  ?>
      </div></td>
      <td>
        <div align="left">
          <?php if ($row[5]=='0') echo "<img src='../imag/por_iniciar.png' alt='Por iniciar' border='0' title='Por Iniciar'/>"; else if ($row[5]=='1') echo "<img src='../imag/en_proceso.png' alt='En Proceso' border='0' title='En Proceso'/>"; else if ($row[5]=='2') echo "<img src='../imag/finalizada.png' alt='Finalizada' border='0' title='Finalizada'/>";?> 
          <?php if ($row[5]=='0') echo "Por Iniciar"; else if ($row[5]=='1') echo "En Proceso"; if ($row[5]=='2') echo "Finalizada";  ?>
        </div></td>
      <td>
        <div align="left">
          <?php if ($row[7]=='0') echo "<img src='../imag/por_iniciar.png' border='0' title='Muy Retrasada'/>"; else if ($row[7]=='1') echo "<img src='../imag/en_proceso.png' border='0' title='Retraso Moderado'/>"; else if ($row[7]=='2') echo "<img src='../imag/finalizada.png' border='0' title='En Tiempo'/>";?> 
          <?php if ($row[7]=='0') echo "Retraso Grave"; else if ($row[7]=='1') echo "Retraso Moderado"; if ($row[7]=='2') echo "En Tiempo";  ?>
        </div></td>
    </tr>
    <?php }
	}?>
  </table>

<label>
<p>
  <label>
<div align="center">
<div align="center"><a href="../menu/menu_indicadores.php"><br />
  <input type="submit" name="button" id="button" value="Men&uacute; Indicadores" />
</a></div>
  </label>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div align="center"></div>
</form>
</body>
</html>
