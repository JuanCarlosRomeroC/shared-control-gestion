<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listado de Direcciones</title>
</head>

<body>
<?php include "../conexion/conectar.php";
  $result=mysql_query("select * from gestion_direcciones WHERE codigo_organizacion=$_GET[seleccionado]",$link);
?>

<form id="form1" name="form1" method="post" action="direccion.php">
  <table width="600" border="1" align="center" cellpadding="2">
    <tr>
      <td width="100"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="370"><div align="justify"><strong>Nombre</strong></div></td>
      <td width="41"><strong>Editar</strong></td>
      <td width="57"><strong>Eliminar</strong></td>
    </tr>
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td><div align="center"><?php echo $row[1] ?></div></td>
      <td><div align="justify"><?php echo $row[2] ?></div></td>
      <td><div align="center"><a href="modifica_direccion.php?seleccionado=<?php echo $row[1]?>"><img src="../imag/b_edit[1].png" width="16" height="16" border="0"  title="Editar Direcci&oacute;n"/></a></div></td>
      <td><div align="center">
        <div align="center"><img src="../imag/b_drop[1].png" width="16" height="16" border="0" title="Eliminar Direcci&oacute;n" onclick="confirma_eliminar('<?php echo $row[1];?>','<?php echo $row[2]?>')" /></div>
      </div></td>
    </tr>
    <?php }?>
  </table>
  <p>
  <label>
    <div align="center">
      <div align="center">
        <p>
          <input type="submit" name="button" id="button" value="Insertar Direcci&oacute;n" />
          <a href="../fpdf/reporte_direccion.php?seleccionado=<?php echo $_GET['seleccionado']?>" target="_blank"><img src="../imag/printer.png" border="0" title="Imprimir" /></a></p>
  </div>
  <div align="center"></div>
</form>
</body>
</html>
