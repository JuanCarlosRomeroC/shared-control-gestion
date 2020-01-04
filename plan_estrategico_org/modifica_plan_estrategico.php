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
<?php include "../templates/CENE.dwt"?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Gestión/Organización/Planes Estratégicos </title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php 
include "../conexion/conectar.php";

$cod=$_GET['seleccionado'];
$consulta="select pe.codigo, pe.nombre, pe.aqo_inicio, pe.aqo_fin, pe.codigo_organizacion, o.codigo, o.nombre from gestion_planes_estrategicos pe inner join gestion_organizacion o on (pe.codigo_organizacion=o.codigo) where pe.codigo='$cod'";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);

?>
<form id="form1" name="form1" method="post" action="guarda_modificacion.php?seleccionado=<?php echo $cod?>">

  <table width="604" border="1" align="center" cellpadding="2">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2"><div align="center" class="style2"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Planes Estrat&eacute;gicos</strong> <strong>Organizaci&oacute;n</strong> </div></td>
    </tr>
    <tr>
      <td><strong>Organizaci&oacute;n:</strong></td>
      <td>
        <input type="text" name="organizacion" id="organizacion" disabled="disabled" value="<?php echo $row[6]?>" />      </td>
    </tr>
    <tr>
      <td width="272"><strong>C&oacute;digo</strong></td>
      <td width="312"><label><span id="sprytextfield1">
      <input type="text" name="codigo" id="codigo"  disabled="disabled" value="<?php echo $cod?>"/>
      <span class="textfieldRequiredMsg">Se Requiere un Valor</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></label></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><label><span id="sprytextfield2">
      <input type="text" name="nombre" id="nombre" value="<?php echo $row[1]?>" />
      <span class="textfieldRequiredMsg">Se requiere un nombre</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de Inicio</strong></td>
      <td><label><span id="sprytextfield3">
        <input name="aqo_inicio" type="text" id="aqo_inicio" maxlength="4" value="<?php echo $row[2]?>" />
        <span class="textfieldRequiredMsg">Ingrese Año de inicio</span><span class="textfieldInvalidFormatMsg">Ingrese Numeros</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de fin</strong></td>
      <td><label><span id="sprytextfield4">
        <input name="aqo_fin" type="text" id="aqo_fin" maxlength="4" value="<?php echo $row[3]?>" />
      <span class="textfieldRequiredMsg">Ingrese Año de fin</span><span class="textfieldInvalidFormatMsg">Ingrese Numeros</span></span></label></td>
    </tr>
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td height="30" colspan="2"><label>
        <div align="center">
          <input type="submit" name="insertar" id="insertar" value="Guardar" />
                  <a href="admin_plan_estrategico.php">
                  <input type="submit" name="atras" id="atras" value="Atras" />
                  </a></div>
      </label></td>
    </tr>
  </table>
  <label></label>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>