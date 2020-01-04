<?php 
/*
* Este archivo muestra el listado de direcciones almacenadas en la base de datos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <?php include "../templates/CENE.dwt"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Gestión/Organización/Listado</title>
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include "../conexion/conectar.php"; 
$result=mysql_query("select * from gestion_organizacion order by codigo asc",$link);
?>
<form id="form1" name="form1" method="post" action="organizacion.php">
  <table width="535" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td><div align="center"><strong><img src="../imag/j0432636.png" width="54" height="40" /></strong></div></td>
      <td colspan="2"><div align="center"><strong>Listado de Organizaciones</strong></div></td>
    </tr>
    <tr>
      <td width="92"><div align="center"><strong>Código</strong></div></td>
      <td width="367"><div align="justify"><strong>Nombre</strong></div></td>
      <td width="48"><strong>Editar</strong></td>
    </tr>
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td><div align="center"><?php echo $row[1] ?></div></td>
      <td><div align="justify"><?php echo $row[2] ?></div></td>
      <td><div align="center"><a href="modifica_organizacion.php?codigo_organizacion=<?php echo $row[1] ?>"><img src="../imag/b_edit[1].png" width="16" height="16" border="0"  title="Editar Organización"/></a></div></td>
    </tr>

    <?php }?>
  </table>
<p>
    <label>
    <div align="center">
  <div align="center">
    <p>
      <input type="submit" name="insertar" id="insertar" value="Insertar Organizacion" />
      <a href="../fpdf/reporte_organizacion.php" target="_blank"><img src="../imag/printer.png"  border="0" title="Imprimir"/></a>      </p>
    <p>&nbsp;</p>
  </div>
  </label>
</form>
<p>&nbsp;</p>
</body>
</html>
