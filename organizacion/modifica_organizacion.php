<?php 
/*
* Este archivo realiza el llamado al modulo para la inserción de las direcciones
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Gesti&oacute;n/Organizaci&oacute;n</title>

<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<link href="../css/tablas.css" rel="stylesheet" type="text/css" />



</head>

<body>
<span class="style4"></span>

<?php include "../templates/CENE.dwt"?>
<?php include "../conexion/conectar.php"; 
  $result=mysql_query("select * from gestion_organizacion where codigo=$_GET[codigo_organizacion]",$link);
  $row=mysql_fetch_array($result);
?>
<form id="f1" name="form1" method="post" action="guarda_modificacion.php?seleccionado=<?php echo $row[1]?>">
  <table width="576" border="1" align="center" cellpadding="2" bordercolor="#000033" bgcolor="#FFFFFF">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2"><div align="center" class="style1 style4"><img src="../imag/usuario.png" alt="" width="57" height="45" /><span class="style2"><strong>Registro de Organizaci&oacute;n</strong></span></div></td>
    </tr>
    <tr>
      <td width="93"><strong>C&oacute;digo</strong></td>
      <td width="463"><label><span id="sprytextfield1">
      <input type="text" name="codigo" id="codigo" disabled="disabled"  value="<?php echo $row[1]?>"/>
      <span class="textfieldRequiredMsg">Se Requiere un Valor</span><span class="textfieldInvalidFormatMsg">Valor N&uacute;merico</span></span></label></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><label><span id="sprytextfield2">
      <input type="text" name="nombre" id="nombre" value="<?php echo $row[2]?>" />
      <span class="textfieldRequiredMsg">Se Requiere Nombre</span></span></label></td>
    </tr>
    <tr>
      <td><strong>Misi&oacute;n </strong></td>
      <td><label></label>      <span id="sprytextfield3">
        <label>
        <input name="mision" type="text" id="mision" value="<?php echo $row[3]?>" size="70" /> 
        </label>
      <span class="textfieldRequiredMsg">Se requiere un valor</span></span></td>
    </tr>
    <tr>
      <td><strong>Visi&oacute;n</strong></td>
      <td><label><span id="sprytextfield4">
        <input name="vision" type="text" id="vision" value="<?php echo $row[4]?>" size="70" />
      <span class="textfieldRequiredMsg">Se requiere un valor</span></span></label></td>
    </tr>
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td height="30" colspan="2"><label>
        <div align="center">
          <input type="submit" name="insertar" id="insertar" value="Guardar" />
          <a href="muestra_organizacion.php">
          <input type="submit" name="atras" id="atras" value="Atras" on />
          </a>                    </div>
      </label></td>
    </tr>
  </table>
  <p>
    <label></label>
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>




<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
</body>
</html>
