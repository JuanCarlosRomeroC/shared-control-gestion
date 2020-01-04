<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>
<?php include "../conexion/conectar.php"; 

include "../conexion/libreria.php";
  $result=mysql_query("select * from gestion_actividades WHERE cod_plan_operativo=$_GET[seleccionado] order by id asc",$link);
?>


<form id="form1" name="form1" method="post" action="actividades.php">
<table width="797" border="1" align="center" cellpadding="2">
    <tr>
      <td width="70"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="149"><div align="center"><strong>Nombre</strong></div></td>
      <td width="106"><div align="center"><strong>Fecha de Inicio</strong></div></td>
      <td width="110"><div align="center"><strong>Duraci&oacute;n</strong> <strong>(D&iacute;as)</strong></div></td>
      <td width="58"><div align="center"><strong>Vincular</strong></div></td>
      <td width="62"><div align="center"><strong>Editar</strong></div></td>
      <td width="56"><div align="center"><strong>Eliminar</strong></div></td>
      <td width="118"><div align="center"><strong>Ver/A&ntilde;adir Fases</strong></div></td>
    </tr>
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td><div align="center"><?php echo $row[0] ?></div></td>
      <td><div align="center"><?php echo $row[1]?></div></td>
      <td><div align="center"><?php echo cambiaf_a_normal($row[2])?></div></td>
      <td><div align="center"><?php echo $row[3]?></div></td>
      <td><div align="center"><a href="editar_vinculo_actividades.php?seleccionado=<?php echo $_GET['cod_org']?>&codigo_actividad=<?php echo $row[0]?>&direccion=<?php echo $_GET['cod_direccion'] ?> &plan=<?php echo $_GET['seleccionado']?>"><img src="../imag/vinculo.png" width="16" height="16" border="0" title="Vincular Actividad" /></a><a href="../select/select_objetivos_operativos_impacto.php?seleccionado=<?php echo $_GET['cod_direccion']?>&codigo=<?php echo $row[1]?>&direccion=<?php echo $_GET['seleccionado'] ?>&plan=<?php echo $_GET['seleccionado']?>&operacion=1"></a></div></td>
      <td><div align="center"><a href="modifica_actividades.php?seleccionado=<?php echo $row[0]?>"><img src="../imag/b_edit[1].png" width="16" height="16" border="0"  title="Editar Actividad"/></a></div></td>
      <td><div align="center"><img src="../imag/b_drop[1].png" width="16" height="16" border="0" title="Eliminar Actividad"  onclick="confirma_eliminar('<?php echo $row[0];?>','<?php echo $row[1]?>')"/></div></td>
      <td><div align="center"><a href="../fases/incluir_fases.php?seleccionado=<?php //echo $_GET['cod_org']?>&amp;codigo_actividad=<?php echo $row[0]?>&amp;direccion=<?php //echo $_GET['cod_direccion'] ?> plan=<?//php echo $_GET['seleccionado']?>"><img src="../imag/view_icon.png" width="24" height="26" border="0" /></a></div></td>
    </tr>
    <?php }?>
  </table>

<p align="center">
  <input type="submit" name="insertar" id="insertar" value="Insertar Nueva Actividad" />
  <a href="../fpdf/reporte_actividad.php?seleccionado=<?php echo $_GET['seleccionado'] ?>" target="_blank"><img src="../imag/printer.png"  border="0" title="Imprimir"/></a></p>
</form>
</body>
</html>
