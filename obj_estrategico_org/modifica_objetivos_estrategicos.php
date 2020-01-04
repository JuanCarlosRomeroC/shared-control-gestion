<?php 
/*
* Este archivo realiza el llamado al modulo para la inserción de los objetivos estratégicos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/?>
<html>
<head>
<?php include "../templates/CENE.dwt"?>

<title>Sistema Gesti&oacute;n/Organizaci&oacute;n/Objetivos Estrat&eacute;gicos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../css/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-weight: bold;
	font-size: medium;
}
-->
</style>
<head>

</head>

<body>
  <?php 
include "../conexion/conectar.php";

$cod=$_GET['seleccionado'];
$consulta="select oe.codigo, oe.nombre, oe.descripcion, oe.codigo_plan_estrategico, pe.codigo, pe.nombre, o.codigo, o.nombre from gestion_obj_estrategicos oe inner join gestion_planes_estrategicos pe on (oe.codigo_plan_estrategico=pe.codigo) inner join gestion_organizacion o on (pe.codigo_organizacion=o.codigo) where oe.codigo=$cod";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);

?>


<form name="aqui" method="POST" action="guarda_modificacion.php?seleccionado=<?php echo $cod?>">
  
    <tr>
      <td width="826" align="center"><table width="581" height="219" border="1" align="center" >
        <tr bgcolor="#FFFFFF" class="encabezado">
          <td colspan="2" id="fila_1"><div align="center" class="style1 style2"><img src="../imag/usuario.png" alt="" width="57" height="45" /><strong>Registro de Objetivos Estrategicos Organizaci&oacute;n</strong></div></td>
        </tr>
        <tr>
          <td width="49%" align="center" id="nombre"><div align="justify"><strong>Organizacion</strong></div></td>

          <td width="51%" align="center" id="nombre"><div align="justify">
            <label>
            <input type="text" name="organizacion" id="organizacion" disabled="disabled" value="<?php echo $row[7]?>">
            </label>
          </div></td>
        </tr>
        <tr>
          <td width="49%" align="center" id=><div align="justify"><strong>Plan Estrat&eacute;gico</strong></div></td>
          <td width="51%" align="" id="cod"><div align="justify">
            <label>
            <input type="text" name="plan" id="plan2" disabled="disabled" value="<?php echo $row[5]?>">
            </label>
          </div></td>
        </tr>
        <tr>
          <td width="49%" align="center" id="plan"><div align="justify"><strong>Codigo</strong></div></td>
          <td width="51%" align="center" id="plan">
          <div align="justify">
            <input type="text" name="codigo" id="codigo" disabled="disabled" value="<?php echo $cod?>">
          </div>         </td>
        </tr>
        <tr>
          <td align="center" id="plan"><div align="justify"><strong>Nombre</strong></div></td>
          <td align="center" id="plan">
          <div align="justify">
            <input name="nombre" type="text" id="nombre" value="<?php echo $row[1]?>" size="60"> 
            </div>            </td>
        </tr>
        <tr>
          <td align="center" id="plan6"><div align="justify"><strong>Descripcion</strong></div></td>
          <td align="center" id="plan6">
          <div align="justify">
            <input name="descripcion" type="text" id="descripcion" value="<?php echo $row[2]?>" size="60"> 
            </div>            </td>
        </tr>
        <tr bgcolor="#FFFFFF" class="encabezado">
          <td colspan="2" align="center"><input type="submit" name="insertar" id="insertar" value="Guardar">
            <a href="admin_objetivos_estrategicos.php">
            <input type="submit" name="atras" id="atras" value="Atras">
          </a> </td>
          </tr>
      </table></td>
    </tr>
</form>


</body>
</html>