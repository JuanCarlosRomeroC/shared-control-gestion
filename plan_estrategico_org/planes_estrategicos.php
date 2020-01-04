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
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php 
include "../conexion/conectar.php";
$result= mysql_query("Select nombre, codigo from gestion_organizacion",$link) or die(mysql_error());
$row=mysql_fetch_array($result)
?>
<form id="form1" name="form1" method="post" action="inserta_planes.php">
  <table width="604" border="1" align="center" cellpadding="2">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2"><div align="center" class="style2"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Planes Estrat&eacute;gicos</strong> <strong>Organizaci&oacute;n</strong> </div></td>
    </tr>
    <tr>
      <td><strong>Organizaci&oacute;n:</strong></td>
      <td><select name="select" size="1">
      <option value="0"> Selecciona Organización...</option>
        <?php do{?>
          <option value="<?php echo $row['codigo'] ?>">  <?php echo $row['nombre'] ?></option>
        <?php 
	
	 }while ($row=mysql_fetch_array($result))?>
      </select></td>
    </tr>
    <tr>
      <td width="92"><strong>C&oacute;digo</strong></td>
      <td width="220"><label><span id="sprytextfield1">
      <input type="text" name="codigo" id="codigo" />
      <span class="textfieldRequiredMsg">Se Requiere un Valor</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></label></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><label><span id="sprytextarea1">
      <textarea name="nombre" id="nombre" cols="45" rows="1"></textarea>
      <span class="textareaRequiredMsg">Se Requiere Nombre</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de Inicio</strong></td>
      <td><label><span id="sprytextfield3">
        <input name="aqo_inicio" type="text" id="aqo_inicio" maxlength="4" /> 
      <span class="textfieldRequiredMsg">Ingrese Año de inicio</span><span class="textfieldInvalidFormatMsg">Ingrese Numeros</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de fin</strong></td>
      <td><label><span id="sprytextfield4">
      <input name="aqo_fin" type="text" id="aqo_fin" maxlength="4" />
      <span class="textfieldRequiredMsg">Ingrese Año de fin</span><span class="textfieldInvalidFormatMsg">Ingrese Numeros</span></span></label></td>
    </tr>
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2"><label>
        <div align="center">
          <input type="submit" name="insertar" id="insertar" value="Guardar" />
        </div>
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
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
//-->
</script>
</body>
</html>
