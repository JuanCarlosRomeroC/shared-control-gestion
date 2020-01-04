<?php 
/*
* Este archivo realiza el llamado al modulo para la inserción de los planes estratégicos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_PRINCIPAL.dwt"?>

<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../progressbar/lib/style.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="../progressbar/lib/prototype.js"></script>
<script language="javascript" type="text/javascript" src="../progressbar/lib/progress.js"></script>


<script language="javascript" type="text/javascript">


</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Indicadores Objetivos Estrat&eacute;gicos Direcciones</title>

<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<?php 

include "../conexion/conectar.php";
$cod=$_GET['seleccionado'];
 
$sql=mysql_query("select oe.codigo, oe.nombre, oe.cod_plan_e_dir, oe.completados, pe.codigo, pe.nombre, oe.tiempo_ejecucion from gestion_obj_estrategicos_direcciones oe inner join gestion_planes_estrategicos_direcciones pe on (oe.cod_plan_e_dir=pe.codigo)  WHERE oe.cod_plan_e_dir=$cod",$link);
/* $a=mysql_fetch_array($sql);
$b=$a[5]; */
?>
<form id="f1" name="form1" method="POST" action="">
  <p>&nbsp;</p>
  <table width="800" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="4" align="center" id="fila_1"><div align="center"><strong><img src="../imag/Volume Manager.png" alt="" width="25" height="29" border="0" />Indicadores de Objetivos Estrat&eacute;gicos Direcci&oacute;n</strong><strong></strong></div></td>
    </tr>
    <tr><?php /* $result=mysql_fetch_array($sql);{ ?>
      <td colspan="3"><?php echo $result[5]  ?></td>
      <?php } */?>
    </tr>
    <tr>
      <td height="25" id="plan2"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td id="plan2"><div align="center"><strong>Nombre</strong></div></td>
      <td width="31%" id="plan2"><strong>Indicador de Cumplimiento</strong></td>
      <td width="21%" height="25" id="plan2"><div align="center"><strong>Indicador</strong> <strong>de</strong> <strong>Tiempo</strong></div></td>
    </tr>
    <tr>
    <?php while ($result=mysql_fetch_array($sql)){?>
    
      <td width="7%" height="25" id="plan"><div align="center"><?php echo $result[0] ?></div></td>
      <td width="41%" id="plan"><div align="left"><?php echo $result[1] ?></div></td>
      <td height="25"><div id="demo2">
        <div align="center">
          <script>display ('element2',<?php echo $result[3]?>,1);</script>
            <span>Completado</span></div>
      </div></td>
      <td height="25" id="plan">
        <div align="center">
          <?php if ($result[6]=='0') echo "<img src='../imag/por_iniciar.png' border='0' title='Muy Retrasada'/>"; else if ($result[6]=='1') echo "<img src='../imag/en_proceso.png' border='0' title='Retraso Moderado'/>"; else if ($result[6]=='2') echo "<img src='../imag/finalizada.png' border='0' title='En Tiempo'/>"?>
          <?php if ($result[6]=='0') echo "Retraso Grave"; else if ($result[6]=='1') echo "Retraso Moderado"; if ($result[6]=='2') echo "En Tiempo";  ?>
        </div></td>
    </tr>
     <?php }?>
  </table>
  
  <p align="center"><a href="../menu/menu_indicadores.php">
    <label>
    <input type="submit" name="button" id="button" value="Men&uacute; Indicadores" />
    </label></a>
  </p>
</form>

</body>
</html>
