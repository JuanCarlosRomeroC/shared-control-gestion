<?php 
/*
* Este archivo muestra el listado de planes estrat�gicos almacenados en la base de datos
*@ Versi�n 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Pa�l Gonz�lez y Rosanny Y��ez
*
*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../progressBar/lib/style.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="../progressBar/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="../progressBar/lib/progress.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
<title>Indicadores Planes Estrat&eacute;gicos Organizaci&oacute;n</title></head>

<body>
<p><?php 

include "../conexion/conectar.php";
 $result=mysql_query("select * from gestion_planes_estrategicos_direcciones WHERE cod_direccion=$_GET[seleccionado]",$link);

?>

</p>
<form id="form1" name="form1" method="post" action="">
  
    
    <table width="589" border="1" align="center" cellpadding="2">
    <tr>
      <td width="137" height="28"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td width="346"><div align="center"><strong>Nombre</strong></div></td>
      <td width="78"><strong> <div align="center"><strong>Indicadores</strong></div></td>
    </tr> 
    <?php while ($row=mysql_fetch_array($result)){?>
    <tr>
      <td height="46"><div align="center"><?php echo $row["codigo"] ?></div>      </td>
      <td><div align="center"><?php echo $row['nombre'] ?></div>      </td>
      <td><div align="center"><a href="barra_planes_direccion.php?seleccionado=<?php echo $row["codigo"] ?>"><img src="../imag/log.png" width="78" height="40" border="0"  title="Ver Gr&aacute;ficas"/></a></div></td>
      </tr>
    <?php }?>
  </table>
 
</form>
</body>

</html>
