<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="JavaScript">

</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php include "../conexion/conectar.php";
  $result=mysql_query("select * from gestion_planes_estrategicos_direcciones where cod_direccion=$_GET[seleccionado]",$link);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="600" height="59" border="1" align="center" cellpadding="0">
    <tr>
      <td width="108" height="26"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="509"><div align="center"><strong>Nombre</strong></div></td>
      <td width="56"><strong>Vincular</strong></td>
      <td width="44"><strong>Editar</strong></td>
    <td width="59"><strong>Eliminar</strong></td>    
    </tr>
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td height="25"><div align="center"><?php echo $row[1] ?></div></td>
      <td><div align="justify"><?php echo $row[2] ?></div></td>
      <td><div align="center"><a href="editar_vinculo_planes_estrategicos_direccion.php?seleccionado=<?php echo $_GET['cod_org']?>&codigo_plan=<?php echo $row[1]?>&direccion=<?php echo $_GET['seleccionado'] ?>"><img src="../imag/vinculo.png" width="16" height="16" border="0" title="Vincular Plan" /></a></div></td>
      <td><div align="center"><a href="modifica_plan_estrategico_direccion.php?seleccionado=<?php echo $row[1]?>"><img src="../imag/b_edit[1].png" width="16" height="16" border="0" title="Editar Plan" /></a></div></td>
      <td><div align="center"><img src="../imag/b_drop[1].png" width="16" height="16" title="Eliminar Plan" onclick="confirma_eliminar('<?php echo $row[1];?>','<?php echo $row[2]?>')" /></div></td>
    </tr>
    <?php }?>
  </table>
<p>
    <label>
<div align="center">
  <div align="center">
    <p>
      <input type="submit" name="insertar" id="insertar" value="Insertar Nuevo Plan" />
      <a href="../fpdf/reporte_plan_direccion.php?seleccionado=<?php echo $_GET['seleccionado'] ?>"><img src="../imag/printer.png"  border="0" title="Imprimir"/></a>
      <input type="hidden" name="buscar" id="buscar" />
    </p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
