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
<title>Indicadores Actividades</title>

<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<?php 

include "../conexion/conectar.php";
$cod=$_GET['seleccionado'];
 
$sql=mysql_query("select distinct a.id, a.nombre, a.cod_plan_operativo, a.completados, po.codigo, oo.codigo, oo.cod_plan_o_dir, ooa.cod_actividad, a.tiempo_ejecucion from gestion_actividades a inner join gestion_planes_operativos po on (a.cod_plan_operativo=po.codigo) inner join gestion_obj_operativos oo on (po.codigo=oo.cod_plan_o_dir) inner join gestion_obj_operativos_actividades ooa on (a.id=ooa.cod_actividad) WHERE oo.codigo=$cod",$link);
/* $a=mysql_fetch_array($sql);
$b=$a[5]; */
?>
<form id="f1" name="form1" method="POST" action="">
  <p>&nbsp;</p>
  <table width="800" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="5" align="center" id="fila_1"><div align="center"><strong><img src="../imag/Volume Manager.png" width="24" height="24" />Indicadores de Actividades</strong><strong></strong></div></td>
    </tr>
    <tr><?php /* $result=mysql_fetch_array($sql);{ ?>
      <td colspan="3"><?php echo $result[5]  ?></td>
      <?php } */?>
    </tr>
    <tr>
      <td height="25" id="plan2"><div align="center"><strong>C&oacute;digo</strong></div></td>
      <td id="plan2"><div align="center"><strong>Nombre</strong></div></td>
      <td width="24%" id="plan2"><div align="center"><strong>Indicador de Cumplimiento</strong></div></td>
      <td width="23%" id="plan2"><div align="center"><strong>Indicador de Tiempo</strong></div></td>
      <td width="8%" height="25" id="plan2"><div align="center"><strong>Detalles</strong></div></td>
    </tr>
    <tr>
    <?php while ($result=mysql_fetch_array($sql)){?>
       <td width="8%" height="51" id="plan"><div align="center"><?php echo $result[0] ?></div></td>
      <td width="37%" id="plan"><div align="left"><?php echo $result[1] ?></div></td>
      <td height="51"><div id="demo2">
        <div align="center">
          <script>display ('element2',<?php echo $result[3]?>,1);</script>
            <span>Completado</span></div>
      </div></td>
      <td id="plan"><div align="center">
        <?php if ($result[8]=='0') echo "<img src='../imag/por_iniciar.png' border='0' title='Muy Retrasada'/>"; else if ($result[8]=='1') echo "<img src='../imag/en_proceso.png' border='0' title='Retraso Moderado'/>"; else if ($result[8]=='2') echo "<img src='../imag/finalizada.png' border='0' title='En Tiempo'/>"?>
          <?php if ($result[8]=='0') echo "Retraso Grave"; else if ($result[8]=='1') echo "Retraso Moderado"; if ($result[8]=='2') echo "En Tiempo";  ?>
      </div>      </td>
      <td height="51" id="plan"><div align="center"><a href="fases.php?seleccionado=<?php echo $result[0] ?>"><img src="../imag/demo.png" width="58" height="50" border="0"  title="Ver Detalles"/></a></div></td>
    </tr>
     <?php }?>
  </table>
  
  <p align="center"><a href="../menu/menu_indicadores.php"
    <label>
    <input type="submit" name="button" id="button" value="Men&uacute; Indicadores" />
    </label></a>
  </p>
</form>

</body>
</html>
