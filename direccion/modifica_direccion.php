<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php include "../templates/CENE_MENU_DIRECCION.dwt"; ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sistema Gestión/Dirección</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
$cod=$_GET['seleccionado'];
$consulta="select a.codigo,a.nombre, a.mision, a.vision, a.codigo_organizacion, o.codigo, o.nombre from gestion_direcciones a inner join gestion_organizacion o on (a.codigo_organizacion=o.codigo) where a.codigo='$cod'";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);

?>
  <form id="form1" name="form1" method="post" action="guarda_modificacion.php?seleccionado=<?php echo $cod?>">
  
    <label></label>
  
  <table width="430" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="2" align="center"><div align="center" class="style1 style2"><img src="../imag/usuario.png" alt="" width="57" height="45" /><strong>Registro de Direcciones</strong></div></td>
    </tr>
    <tr>
      <td><strong>Organizaci&oacute;n</strong></td>
      <td><label>
        <input type="text" name="organizacion" id="organizacion"  disabled="disabled" value="<?php echo $row[6]?>"/>
      </label>
      </span>        </select></td>
    </tr>
    <tr>
      <td width="123"><strong>C&oacute;digo</strong></td>
      <td width="287">
      <label>
      <input type="text" name="codigo" id="codigo" disabled="disabled" value="<?php echo $row[0]?>" />
      </label>      </td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><span id="sprytextfield2">
        <label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row[1]?>"/>
        </label>
      <span class="textfieldRequiredMsg">Se Requiere Nombre</span></span></td>
    </tr>
    <tr>
      <td><strong>Misi&oacute;n </strong></td>
      <td><span id="sprytextfield1">
        <label>
        <input name="mision" type="text" id="mision" size="60" value="<?php echo $row[2]?>" />
        </label>
      <span class="textfieldRequiredMsg">Se requiere misión</span></span></td>
    </tr>
    <tr>
      <td><strong>Visi&oacute;n</strong></td>
      <td><span id="sprytextfield3">
        <label>
        <input name="vision" type="text" id="vision" size="60" value="<?php echo $row[3]?>"/>
        </label>
      <span class="textfieldRequiredMsg">Se requiere visión</span></span></td>
    </tr>
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2">
        <div align="center">
          <input type="submit" name="insertar" id="insertar" value="Guardar" />
          <a href="admin_direccion.php">
          <input type="submit" name="atras" id="atras" value="Atras" />
          </a>                  </div>
      <div align="center" class="style3"></div>      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
