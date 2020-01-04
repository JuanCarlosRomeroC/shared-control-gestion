<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Gestión/Dirección/Listado de Objetivos Estrategicos</title>
</head>

<body>
<?php include "../conexion/conectar.php";
  $result=mysql_query("select * from gestion_obj_estrategicos_direcciones WHERE cod_plan_e_dir=$_GET[seleccionado] order by codigo asc",$link);
?>
<form id="form1" name="form1" method="post" action="">
  <div align="center"></div>
  <table width="600" border="1" align="center" cellpadding="2">
    <tr>
      <td width="108"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="499"><div align="justify"><strong>Nombre</strong></div></td>
      <td width="60"><div align="center"><strong>Vincular</strong></div></td>
      <td width="41"><div align="center"><strong>Editar</strong></div></td>
      <td width="56"><div align="center"><strong>Eliminar</strong></div></td>
    </tr>
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td><div align="center"><?php echo $row[1] ?></div></td>
      <td><div align="justify"><?php echo $row[2] ?></div></td>
 <td><div align="center"><a href="editar_vinculo_objetivos_estrategicos_direccion.php?seleccionado=<?php echo $_GET['cod_org']?>&codigo_objetivo=<?php echo $row[1]?>&direccion=<?php echo $_GET['cod_direccion'] ?> &plan=<?php echo $_GET['seleccionado']?>"><img src="../imag/vinculo.png" width="16" height="16" border="0" title="Vincular Objetivo" /></a></div></td>
      <td><div align="center"><a href="modifica_objetivos_estrategicos_direccion.php?seleccionado=<?php echo $row[1]?>"><img src="../imag/b_edit[1].png" width="16" height="16" border="0" title="Editar Objetivo" /></a></div></td>
      <td><div align="center"><img src="../imag/b_drop[1].png" width="16" height="16" title="Eliminar Objetivo" onclick="confirma_eliminar('<?php echo $row[1];?>','<?php echo $row[2]?>')"/></div></td>
    </tr>
    <?php }?>
  </table>
  <p align="center">
    <label>
    <input type="submit" name="insertar" id="insertar" value="Insertar Nuevo Objetivo" />
    </label>
    <a href="../fpdf/reporte_objetivo_direccion.php?seleccionado=<?php echo $_GET['seleccionado'] ?>" target="_blank"><img src="../imag/printer.png" border="0" title="Imprimir" /></a></p>
  <p align="center"><a href="../fpdf/reporte_objetivo_direccion.php?seleccionado=<?php echo $_GET['seleccionado'] ?>" target="_blank"></a></p>
</form>
</body>
</html>
