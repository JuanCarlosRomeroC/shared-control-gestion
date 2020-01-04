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
<?php include "../templates/CENE_MENU_DIRECCION.dwt"; 
include "../conexion/conectar.php";

$cod=$_GET['seleccionado'];
$consulta="select pe.codigo, pe.nombre, pe.cod_direccion, pe.aqo_inicio, pe.aqo_fin, d.codigo, d.nombre, d.codigo_organizacion, o.codigo, o.nombre from gestion_planes_estrategicos_direcciones pe inner join gestion_direcciones d on (pe.cod_direccion=d.codigo) inner join gestion_organizacion o on (d.codigo_organizacion=o.codigo) where pe.codigo='$cod'";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);

?>

<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Gestión/Dirección/Planes Estratégicos</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="f1" name="form1" method="POST" action="guarda_modificacion.php?seleccionado=<?php echo $cod ?>">
  <table width="606" border="1" align="center" cellpadding="2">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2" id="fila_1"><div align="center" class="style2"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Planes Estrat&eacute;gicos</strong> <strong>Direcci&oacute;n</strong></div></td>
    </tr>
    <tr>
      <td><strong>Organizaci&oacute;n</strong></td>
      <td>
         <input type="text" name="organizacion" id="organizacion" disabled="disabled" value="<?php echo $row[9] ?>" />    </td>
    </tr>
    <tr>
      <td width="50%" align="center" id=><div align="justify"> <strong>Direcci&oacute;n</strong></div>  </td>
      <td width="50%" align="" id="cod"><label>
        <input type="text" name="direccion" id="direccion"  disabled="disabled" value="<?php echo $row[6]?>"/>
      </label></td>
    </tr>
    <tr>
      <td width="50%"><strong>C&oacute;digo</strong></td>
      <td width="50%"><input type="text" name="codigo" id="codigo"  disabled="disabled" value="<?php echo $cod?>"/></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><label><span id="sprytextfield2">
        <input name="nombre" type="text" id="nombre" value="<?php echo $row[1]?>" size="60" />
      <span class="textfieldRequiredMsg">Se requiere un nombre</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de Inicio</strong></td>
      <td><label><span id="sprytextfield3">
        <input name="aqo_inicio" type="text" id="aqo_inicio" maxlength="4" value="<?php echo $row[3]?>" />
      <span class="textfieldRequiredMsg">Ingrese Año de inicio</span><span class="textfieldInvalidFormatMsg">Sólo Números</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de fin</strong></td>
      <td><span id="sprytextfield4">
        <label>
        <input name="aqo_fin" type="text" id="aqo_fin" value="<?php echo $row[4]?>" maxlength="4"/>
        </label>
      <span class="textfieldRequiredMsg">Se requiere un valor</span></span></td>
    </tr>
    <tr class="encabezado">
      <td colspan="2">
        <div align="center">
          <input type="submit" name="insertar" id="ir_listado" value="Guardar" />
          <a href="admin_planes_estrategicos_direccion.php">
          <input type="submit" name="atras" id="atras" value="Atras" />
        </a>        </div></td>
    </tr>
  </table>
 
  <p align="center">
    <label></label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<script type="text/javascript">
<!--
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
</body>
</html>