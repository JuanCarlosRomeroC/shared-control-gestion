<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php 

include "../templates/CENE_MENU_PRINCIPAL.dwt"; 
include "../conexion/conectar.php";
include "../conexion/fecha.php";

$cod=$_GET['seleccionado'];
$consulta="select a.id, a.nombre, a.fecha_inicio, a.duracion, a.cod_plan_operativo, po.codigo, po.nombre, po.cod_direccion, d.codigo, d.nombre, o.codigo, o.nombre from gestion_actividades a inner join gestion_planes_operativos po on (a.cod_plan_operativo=po.codigo) inner join gestion_direcciones d on (po.cod_direccion=d.codigo) inner join gestion_organizacion o on (d.codigo_organizacion=o.codigo) where a.id='$cod'";
$result=mysql_query($consulta,$link);
$row=mysql_fetch_array($result);
?> 
<!-- calendar stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="../jscalendar/calendar-system.css" title="win2k-cold-1" />
  <!-- main calendar program -->
  <script type="text/javascript" src="../jscalendar/calendar.js"></script>
  <!-- language for the calendar -->
  <script type="text/javascript" src="../jscalendar/lang/calendar-es.js"></script>
  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="../jscalendar/calendar-setup.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sistema Gestión/Dirección/Actividades</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="f1" name="form1" method="post" action="guarda_modificacion.php?seleccionado=<?php echo $cod?>">
  <p>&nbsp;</p>
  <table width="658" height="248" border="1" align="center" cellpadding="2" cellspacing="0">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td height="55" colspan="3"><div align="center" class="style3"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Actividades</strong></div></td>
    </tr>
    <tr>
      <td width="327" height="25"><strong>Organizaci&oacute;n</strong></td>
      <td width="313"><label>
        <input type="text" name="organizacion" id="organizacion" disabled="disabled" value="<?php echo $row[11]?>" />
      </label></td>
    </tr>
    <tr>
      <td height="25" align="center" id=> <div align="justify"><strong>Direcci&oacute;n</strong></div></td>
      <td align="" id="cod"><label>
        <input type="text" name="direccion" id="direccion" disabled="disabled" value="<?php echo $row[9]?>" />
      </label></td>
    </tr>
    <tr>
      <td height="25" align="center" id=> <div align="justify"><strong>Plan Operativo</strong></div></td>
      <td align="" id="plan_operativo"><label>
        <input type="text" name="plan" id="plan"  disabled="disabled" value="<?php echo $row[6]?>" />
      </label></td>
    </tr>
    <tr>
      <td height="25"><strong>Nombre</strong></td>
      <td colspan="2"><label><span id="sprytextfield1">
            <input name="nombre" type="text" id="nombre" size="60" value="<?php echo $row[1]?>" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
    </tr>
    <tr>
      <td height="32"><strong>Fecha de Inicio</strong></td>
      <td> 
     <input type="text" name="fecha_inicio" readonly="readonly" id="fecha_inicio" value="<?php echo cambiaf_a_normal($row[2])?>"/>
        <img src="../imag/img.gif" alt="cal" name="f_trigger_c" width="20" height="20" border="0" id="f_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Date selector"
      onmouseover="this.style.background='red';" onmouseout="this.style.background='blue'" /></td>
    </tr>
    <tr>
      <td height="28"><strong>Duraci&oacute;n (D&iacute;as)</strong></td>
      <td ><span id="sprytextfield4">
      <label>
      <input type="text" name="duracion" id="duracion"  value="<?php echo $row[3]?>" />
      </label>
      <span class="textfieldRequiredMsg">Ingrese Duración</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></td>
    </tr>
    <tr>
      <td height="31" colspan="2" >
        <div align="center">
          <input type="submit" name="insertar" id="insertar" value="Guardar" />
          <a href="admin_actividades.php">
          <input type="submit" name="atras" id="atras" value="Atras" />
        </a>      </div></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
//-->
</script>
<script type="text/javascript">
Calendar.setup({
        inputField     :    "fecha_inicio",     // id of the input field
        ifFormat       :    "%d/%m/%Y",      // format of the input field
        button         :    "f_trigger_c",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>
