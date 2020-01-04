<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_DIRECCION.dwt"; 
include "../conexion/conectar.php";

$cod=$_GET['seleccionado'];
$consulta="select po.codigo, po.nombre, po.aqo_inicio, po.aqo_fin, po.cod_direccion, d.codigo, d.nombre, d.codigo_organizacion, o.codigo, o.nombre from gestion_planes_operativos po inner join gestion_direcciones d on (po.cod_direccion=d.codigo) inner join gestion_organizacion o on (d.codigo_organizacion=o.codigo) where po.codigo='$cod'";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Getión/Dirección/Plan Operativo</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="f1" name="form1" method="post" action="guarda_modificacion.php?seleccionado=<?php echo $cod?>">
  <table width="621" border="1" align="center" cellpadding="2">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2" id="fila_1"><div align="center" class="style3"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Plan Operativo Direcci&oacute;n</strong></div></td>
    </tr>
    <tr>
      <td width="241"><strong>Organizaci&oacute;n</strong></td>
      <td width="360"><label>
        <input type="text" name="organizacion" id="organizacion" disabled="disabled"  value="<?php echo $row[9]?>"/>
      </label></td>
    </tr>
    <tr>
      <td width="241"="50%" align="center">  <div align="justify"> <strong>Direcci&oacute;n</strong> </div></td>
      <td width="360"="50%" align="" id="cod"><label>
        <input type="text" name="direccion" id="direccion" disabled="disabled"  value="<?php echo $row[6]?>"/>
      </label></td>
    </tr>
    <tr>
      <td><strong>C&oacute;digo</strong></td>
      <td><input type="text" name="codigo" id="codigo"  disabled="disabled"  value="<?php echo $cod?>"/></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><span id="sprytextfield2">
        <label>
        <input name="nombre" type="text" id="nombre" size="60"  value="<?php echo $row[1]?>"/>
        </label>
      <span class="textfieldRequiredMsg">Se requiere un valor</span></span></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de Inicio</strong></td>
      <td><span id="sprytextfield3">
      <label>
      <input name="aqo_inicio" type="text" id="aqo_inicio" maxlength="4"  value="<?php echo $row[2]?>" />
      </label>
      <span class="textfieldRequiredMsg">Ingrese Fecha de Incicio.</span><span class="textfieldInvalidFormatMsg">Sólo Números</span></span></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de Fin</strong></td>
      <td><span id="sprytextfield1">
        <label>
        <input name="aqo_fin" type="text" id="aqo_fin"  value="<?php echo $row[3]?>" maxlength="4"/>
        </label>
      <span class="textfieldRequiredMsg">Se requiere un valor.</span></span></td>
    </tr>
    <tr>
      <td colspan="2">
          <div align="center">
            <input type="submit" name="insertar" id="button" value="Guardar" />
            <a href="admin_plan_operativo.php?seleccionado">
            <input type="submit" name="atras" id="atras" value="Atras" />
          </a>          </div></td>
    </tr>
  </table>
  <p>
  
  
</form>
<script type="text/javascript">
<!--
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
