<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>
<?php include "../conexion/conectar.php";
  $result=mysql_query("select * from gestion_fases WHERE cod_actividad=$_GET[seleccionado] order by id",$link);
  $result2=mysql_query("select a.id,b.precedida from gestion_fases as a inner join gestion_relacion_actividades_fases as b on a.id=b.fase WHERE a.cod_actividad=$_GET[seleccionado] order by a.id",$link);
 if ($result) {
?>


<form id="form1" name="form1" method="post" action="../actividades/actividades.php">
<table width="794" border="1" align="center" cellpadding="2">
    <tr>
      <td width="49"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="445"><div align="center"><strong>Nombre</strong></div></td>
      <td width="81"><div align="center"><strong>Precedencia</strong></div></td>
      <td width="98"><div align="center"><strong>Editar</strong><strong> Estado</strong></div></td>
      <td width="77"><div align="center"><strong>Eliminar</strong></div></td>
    </tr>
    <?php while ($row=mysql_fetch_array($result)){
	 $result2=mysql_query("select a.id,b.precedida from gestion_fases as a inner join gestion_relacion_actividades_fases as b on a.id=b.fase WHERE a.cod_actividad=$_GET[seleccionado] order by a.id",$link);
 ?>
    <tr>
      <td><div align="center"><?php echo $row[0] ?></div></td>
      <td><div align="justify"><?php echo $row[1] ?></div></td>
      
      <td><div align="center">
        <?php while (($row2=mysql_fetch_array($result2))){
		  	  if ($row[0]==$row2[0])
	  	      echo $row2[1]."-";
			   }
			  ?>
      </div></td>
      <td><div align="center"><a href="editar_fase.php?cod=<?php echo $row[0];?>"><?php if ($row[5]=='0') echo "<img src='../imag/por_iniciar.png' alt='Por iniciar' border='0' title='Por Iniciar'/>"; else if ($row[5]=='1') echo "<img src='../imag/en_proceso.png' alt='En Proceso' border='0' title='En Proceso'/>"; else if ($row[5]=='2') echo "<img src='../imag/finalizada.png' alt='Finalizada' border='0' title='Finalizada'/>";?></a></div></td>
      <td><div align="center"><img src="../imag/b_drop[1].png" alt="Eliminar" width="16"  height="16" border="0" title="Eliminar Fase" onclick="confirma_eliminar('<?php echo $row[0];?>','<?php echo $row[1]?>')"/></div></td>
    </tr>
    <?php }
	}?>
  </table>

<label> 
  
      <div align="center"><a href="../fpdf/reporte_fase.php?seleccionado=<?php echo $_GET['seleccionado'] ?>" target="_blank"><img src="../imag/printer.png"  border="0" title="Imprimir"/></a></div>
  <div align="center"></div>
</form>
</body>
</html>
