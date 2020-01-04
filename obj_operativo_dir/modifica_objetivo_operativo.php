<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_DIRECCION.dwt";
include "../conexion/conectar.php";

$cod=$_GET['seleccionado'];
$consulta="select oo.codigo, oo.nombre, oo.cod_plan_o_dir, oo.descripcion, po.codigo, po.nombre, po.cod_direccion, d.codigo, d.nombre, d.codigo_organizacion, o.codigo, o.nombre from gestion_obj_operativos oo inner join gestion_planes_operativos po on (oo.cod_plan_o_dir=po.codigo) inner join gestion_direcciones d on (po.cod_direccion=d.codigo) inner join gestion_organizacion o on (d.codigo_organizacion=o.codigo) where oo.codigo='$cod'";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);
 ?>

<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Objetivos Operativos</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../plan_operativo_dir/invento.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="f1" name="form1" method="post" action="guarda_modificacion.php?seleccionado=<?php echo $cod?>">
  <table width="600" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="2"><div align="center"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Objetivos Operativos Direcci&oacute;n</strong></div></td>
    </tr>
    <tr>
      <td width="332"><strong>Organizaci&oacute;n</strong></td>
      <td width="360"><label>
        <input type="text" name="organizacion" id="organizacion" disabled="disabled"  value="<?php echo $row[11]?>"/>
      </label></td>
    </tr>
    <tr>
      <td width="332" align="center" id=> <div align="justify"><strong>Direcci&oacute;n</strong></div></td>
      <td width="360" align="" id="cod"><label>
        <input type="text" name="direccion" id="direccion" disabled="disabled" value="<?php echo $row[8]?>" />
      </label></td>
    </tr>
    <tr>
      <td width="332" align="center" id=> <div align="justify"><strong>Plan Operativo</strong></div></td>
      <td width="360" align="" id="plan_operativo"><label>
        <input type="text" name="plan" id="plan" disabled="disabled" value="<?php echo $row[5]?>" />
      </label></td>
      </tr>
    <tr>
      <td><strong>C&oacute;digo</strong></td>
      <td>
      <input type="text" name="codigo" id="codigo" disabled="disabled"  value="<?php echo $cod?>"/>       </td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><span id="sprytextfield1">
        <label>
        <input name="nombre" type="text" id="nombre" size="60" value="<?php echo $row[1]?>" />
        </label>
      <span class="textfieldRequiredMsg">Se requiere un valor</span></span></td>
    </tr>
    <tr>
      <td><strong>Descripci&oacute;n</strong></td>
      <td><span id="sprytextfield2">
        <label>
        <input name="descripcion" type="text" id="descripcion" size="60" value="<?php echo $row[3]?>" />
        </label>
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center">
          <input type="submit" name="insertar" id="Guardar" value="Guardar" />
          <a href="admin_objetivos_operativos.php">
          <input type="submit" name="atras" id="button" value="Atras" />
          </a>            </div>     </td>
    </tr>
  </table>
  
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
