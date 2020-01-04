<?php 
/*
* Este archivo muestra el listado de planes estratégicos almacenados en la base de datos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script language="JavaScript">

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p>
<?php 

include "../conexion/conectar.php";
 $result=mysql_query("select * from gestion_planes_estrategicos WHERE codigo_organizacion=$_GET[seleccionado]",$link);

?>
</p>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label>
    <div align="center">
    </label>
    <table width="600" border="1" align="center" cellpadding="2">
    <tr>
      <td width="90"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="443"><div align="center"><strong>Nombre</strong></div></td>
      <td width="78"><div align="center"><strong>Editar</strong></div></td>
      <td width="62"><div align="center"><strong>Eliminar</strong></div></td>
    </tr> 
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td><div align="center"><?php echo $row['codigo'] ?></div></td>
      <td><div align="justify"><?php echo $row['nombre'] ?></div></td>
      <td><div align="center"><a href="modifica_plan_estrategico.php?seleccionado=<?php echo $row[1]?>"><img src="../imag/b_edit[1].png" width="16" height="16" border="0" title="Editar Plan" /></a><a href="../select/select_planes_estretegicos2.php?seleccionado=<?php echo $_GET['cod_org']?>&codigo=<?php echo $row[1]?>&direccion=<?php echo $_GET['seleccionado'] ?>&operacion=1"></a></div></td>
     <td><div align="center"><img src="../imag/b_drop[1].png" width="16" height="16" title="Eliminar Plan" onclick="confirma_eliminar('<?php echo $row[1];?>','<?php echo $row[2]?>')" /></div></td>
    </tr>
    <?php }?>
  </table>
<p>
    <label>
    <div align="center">
      <div align="center">
        <p>
          <input type="submit" name="insertar" id="insertar" value="Insertar Plan" />
          <a href="../fpdf/reporte_plan_organizacion.php?seleccionado=<?php echo $_GET['seleccionado']?>" target="_blank"><img src="../imag/printer.png" border="0" title="Imprimir" /></a></p>
        <p>&nbsp;</p>
  </div>
</form>
</body>

</html>
