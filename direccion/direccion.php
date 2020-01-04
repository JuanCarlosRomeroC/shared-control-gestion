<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php include "../templates/CENE_MENU_DIRECCION.dwt"; ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sistema Gestión/Dirección</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
</head>

<body>

  
  
    <?php 
include "../conexion/conectar.php";
$result= mysql_query("Select nombre, codigo from gestion_organizacion",$link) or die(mysql_error());
$row=mysql_fetch_array($result)
?>

<form id="form1" name="form1" method="post" action="inserta_direccion.php">
  
    <label></label>
  
  <table width="430" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="2" align="center"><div align="center" class="style1 style2"><img src="../imag/usuario.png" alt="" width="57" height="45" /><strong>Registro de Direcciones</strong></div></td>
    </tr>
    <tr>
      <td><strong>Organizaci&oacute;n</strong></td>
      <td>
        <select name="select" onchange="" id="select">
        <option value="0"> Selecciona Organización...</option>
          <?php do{?>
          <option value="<?php echo $row['codigo'] ?>"> <?php echo $row['nombre'] ?></option>
          <?php }while ($row=mysql_fetch_array($result))?>
        </select>
                 </span>        </select></td>
    </tr>
    <tr>
      <td width="123"><strong>C&oacute;digo</strong></td>
      <td width="287"><span id="sprytextfield1">
      <label>
      <input type="text" name="codigo" id="codigo" />
      </label>
      <span class="textfieldRequiredMsg">Se Requiere un Valor</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><span id="sprytextfield2">
        <label>
        <input type="text" name="nombre" id="nombre" />
        </label>
      <span class="textfieldRequiredMsg">Se Requiere Nombre</span></span></td>
    </tr>
    <tr>
      <td><strong>Misi&oacute;n </strong></td>
      <td><span id="sprytextfield3">
        <label></label>
      <span class="textfieldRequiredMsg">Ingrese Misión</span></span><span id="sprytextarea1">
      <label>
      <textarea name="mision" id="mision" cols="45" rows="1"></textarea>
      </label>
      <span class="textareaRequiredMsg">Ingrese Misión</span></span></td>
    </tr>
    <tr>
      <td><strong>Visi&oacute;n</strong></td>
      <td><span id="sprytextfield4">
        <label></label>
      <span class="textfieldRequiredMsg">Ingrese Visión</span></span><span id="sprytextarea2">
      <label>
      <textarea name="vision" cols="45" rows="1" id="vision"></textarea>
      </label>
      <span class="textareaRequiredMsg">Ingrese Visión</span></span></td>
    </tr>
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2"><span class="style3">
        <div align="center" class="style3">
          <input type="submit" name="insertar" id="insertar" value="Guardar" />
        </div>
        <span class="style3">
        </label>
      </span></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"]});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {validateOn:["blur"]});
//-->
</script>
</body>
</html>
