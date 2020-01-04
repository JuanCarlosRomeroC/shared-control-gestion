<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_PRINCIPAL.dwt" ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sistema Gestión/Dirección/Actividades</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

   include ("../conexion/conectar.php");
   $cod=$_GET['cod'];
   $result=mysql_query("SELECT * FROM gestion_fases where id ='$cod'");
   $row=mysql_fetch_array($result);

//busco cod actividad
   $result_cod=mysql_query("SELECT cod_actividad FROM gestion_fases where id ='$cod'");
   $row2=mysql_fetch_array($result_cod);
  // $cod_actividad=$row2["cod_actividad"]
?>


<form id="f1" name="form1" method="GET" action="actualizar_estado.php">
  <p>&nbsp;</p>
  <table width="658" border="1" align="center" cellpadding="2" cellspacing="0">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="3"><div align="center" class="style3"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Estado de Fase</strong>
              <input name="id" type="hidden" id="id" value="<?php echo $row['id'];?>" />
      </div></td>
    </tr>
      
    <tr>
      <td><strong>Nombre de la Fase</strong></td>
      <td><span id="sprytextfield2">
        <label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre'];?>" disabled="disabled" />
        </label>
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td><strong>Fecha</strong></td>
      <td><label>
        <input type="text" name="fecha" id="fecha"  value="<?php echo date('d/m/Y');?>"  readonly="readonly"/>
      </label></td>
    </tr>
    <tr>
      <td><strong>Estado</strong></td>
      <td id="objetivo"><label>
        <select name="estado" id="estado">
          <option value="0" <?php if ($row['estado']=='0') echo "selected='selected'";?>>Por Iniciar</option>
          <option value="1"<?php if ($row['estado']=='1') echo "selected='selected'";?>>En Proceso</option>
          <option value="2"<?php if ($row['estado']=='2') echo "selected='selected'";?>>Finalizada</option>
        </select>
      </label></td>
    </tr>
  </table>
  <p>
  <label>
  <div align="center">
<p align="center"><a href="incluir_fases.php?codigo_actividad=<?php echo $row2['cod_actividad']?>"></a>
  <input type="submit" name="Button" id="button" value="Guardar Cambios" />
  <a href="incluir_fases.php?codigo_actividad=<?php echo $row2['cod_actividad']?>">
  <input  type="button" name="atras" id="atras" value="Atras"   />
  </a></p>
<p align="center">&nbsp;</p>
</label>
</form>
<script type="text/javascript">
<!--
//-->
//carga_objetivo_operativo();
muestra_fases();
//carga_fase();
</script>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>

</body>
</html>

