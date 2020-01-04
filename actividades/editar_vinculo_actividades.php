<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_PRINCIPAL.dwt";
include "../conexion/fecha.php"; ?>


<!-- calendar stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="../jscalendar/calendar-system.css" title="win2k-cold-1" />
  <!-- main calendar program -->
  <script type="text/javascript" src="../jscalendar/calendar.js"></script>
  <!-- language for the calendar -->
  <script type="text/javascript" src="../jscalendar/lang/calendar-es.js"></script>
  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="../jscalendar/calendar-setup.js"></script>


<script language="javascript" type="text/javascript">
function nuevoAjax()
{
   /* Crea el objeto AJAX*/
   var xmlhttp=false;
   try
   {
      // Creacion del objeto AJAX para navegadores no IE
      xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
   }
   catch(e)
   {
      try
      {
         // Creacion del objet AJAX para IE
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(E) { xmlhttp=false; }
   }
   if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); }

   return xmlhttp;
}

/*
function carga_codigo_actividad()
{

      ajax=nuevoAjax();
      ajax.open("GET", "genera_codigo_actividad.php", true);
      ajax.onreadystatechange=function()
      {
        
         if (ajax.readyState==4)
         {
            document.getElementById("genera_codigo").innerHTML=ajax.responseText;
            
			}
      }
      ajax.send(null);
   }


*/

function carga_objetivo_operativo()
{ 
   var valor=document.getElementById("select_2").options[document.getElementById("select_2").selectedIndex].value;
 //alert ("dir "+ valor + "act "+document.form1.codigo.value);
   if(valor==0){
    document.getElementById("objetivo").innerHTML="No disponible";
   }
   else
   {
      ajax=nuevoAjax();
	 //document.write(valor);
//alert(valor);
//alert (document.form1.codigo.value);
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=15&codigo="+document.form1.codigo.value, true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
         {
            document.getElementById("objetivo").innerHTML="Cargando....";
         }
         if (ajax.readyState==4)
         {
            document.getElementById("objetivo").innerHTML=ajax.responseText;
			//alert("skhd");
         }
      }
      ajax.send(null);
   }
}



function crear_vinculo(valor, activo)
{
   if (document.form1.nombre.value=="")
   alert("debe colocar un Nombre ");
   else
   if (document.form1.fecha_inicio.value=="")
   alert("debe colocar una fecha de inicio para la actividad");
   else
   if (document.form1.duracion.value=="")
   alert("debe colocar los dias de duración de la actividad");
   
   else
   {//LLAMO A ENVIAR FORMULARIO PARA QUE INSERTE EL OBJETIVO ESTRATEG DE LA DIRECCION
      enviarFormulario("inserta_actividades.php", "f1");
	  
	  if (activo)
	    activo=1;
        ajax.open("GET", "actualiza_vinculo_actividades.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value+"&activo="+activo, true);
       // ajax.open("GET", "elimina_vinculo_obj_estr_direc.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value, true);
		
		ajax.onreadystatechange=function()
      {        
		  if (ajax.readyState==4)
               carga_objetivo_operativo();//cargo de nuevo los obj estrateg de org para que actualice la tabla que los muestra
   	  }
		
	  ajax.send(null);
	 
	}
}

//CODIGO PARA ENVIAR FORMULARIO POR POST

var peticion = false;
try {
      peticion = new XMLHttpRequest();
} catch (trymicrosoft) {
      try {
            peticion = new ActiveXObject("Msxml2.XMLHTTP");
} catch (othermicrosoft) {
      try {
            peticion = new ActiveXObject("Microsoft.XMLHTTP");
} catch (failed) {
            peticion = false;
} 
}
}
 
  function enviarFormulario(url, formid){
  
         var Formulario = document.getElementById(formid);
         var longitudFormulario = Formulario.elements.length;
		 
         var cadenaFormulario = "";
         var sepCampos;
         sepCampos = "";
         for (var i=0; i <= Formulario.elements.length-1;i++) {
         cadenaFormulario += sepCampos+Formulario.elements[i].name+'='+encodeURI(Formulario.elements[i].value);
         sepCampos="&";
}
  peticion.open("POST", url, true);		

  peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
  peticion.onreadystatechange = function () {
  if (peticion.readyState == 4) {
     document.getElementById('ficha').innerHTML = "Los datos han sido enviados correctamente";
  }
}
peticion.send(cadenaFormulario);
}

   
</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sistema Gestión/Dirección/Actividades</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

   include ("../conexion/conectar.php");
   
   $result=mysql_query("SELECT * FROM gestion_organizacion where codigo = $_GET[seleccionado]");
  
   $row=mysql_fetch_array($result);
      
?>

<form id="f1" name="form1" method="post" action="admin_actividades.php">
  <p>&nbsp;</p>
  <table width="658" border="1" align="center" cellpadding="2" cellspacing="0">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="3"><div align="center" class="style3"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Vincular Actividades</strong>          
          <input type="hidden" name="insertar" id="insertar"/>
      </div></td>
    </tr>
    <tr>
      <td width="327"><strong>Organizaci&oacute;n</strong></td>
      <td><label>
      <select name="select" disabled="disabled" id="select_0">
     <?php echo "<option value='".$row[1]."'>".$row[2]."</option>";?> 
      </select>
      </label></td>
    </tr>
    <tr>
      <td align="center" id=> <div align="justify"><strong>Direcci&oacute;n</strong></div></td>
      <td align="" id="cod"> <div align="justify"><label></label>
          <label>
          <?php
		  $result=mysql_query("SELECT * FROM gestion_direcciones WHERE codigo=$_GET[direccion]");
		  $row=mysql_fetch_row($result); 
		  ?>
          
          <select name="select2" disabled="disabled" id="select_1">
          <?php echo "<option value='".$row[1]."'>".$row[2]."</option>";?>
          </select>
          </label>
      </div> </td>
    </tr>
    <tr>
      <td align="center" id=> <div align="justify"><strong>Plan Operativo</strong></div></td>
      <td align="" id="plan_operativo"> <div align="justify"><label></label>
          
          
          <label>
          
          <?php
		  $result=mysql_query("SELECT * FROM gestion_planes_operativos WHERE codigo=$_GET[plan]");
		  $row=mysql_fetch_row($result);
		  ?>
          <select name="select3" disabled="disabled" id="select_2">
          <?php echo "<option value='".$row[1]."'>".$row[2]."</option>";?>
          </select>
          </label>
      </div>      </td>
      </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td width="313"><span id="sprytextfield1">
        <label>
        
        <?php
	  $result=mysql_query("SELECT * FROM gestion_actividades WHERE id=$_GET[codigo_actividad]");
	  $row=mysql_fetch_row($result);
	  ?>
        
        
        <input type="text" name="nombre" id="nombre" disabled="disabled" value="<?php echo $row[1];?>" />
        </label>
      <span class="textfieldRequiredMsg">A value is required.</span></span>
      <input name="codigo" type="hidden" id="codigo" value="<?php echo $_GET['codigo_actividad'];?>" /></td>
      <td width="17"  id="genera_codigo"><?php /* include "genera_codigo_actividad.php"; */?>
<label></label></td
    >
    </tr>
    <tr>
      <td><strong>Fecha de Inicio</strong></td>
      <td><label>
      <input type="text" name="fecha_inicio" disabled="disabled" readonly="readonly" id="fecha_inicio" value="<?php echo cambiaf_a_normal($row[2]);?>" />
      </label></td>
    </tr>
    <tr>
      <td><strong>Duraci&oacute;n (D&iacute;as)</strong></td>
      <td id="objetivo2"><span id="sprytextfield4">
      <label>
      <input type="text" name="duracion" disabled="disabled" id="duracion" value="<?php echo $row[3];?>" />
      </label>
      <span class="textfieldRequiredMsg">Ingrese Duración</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></td>
    </tr>
    <tr>
      <td height="25"><strong>Objetivo Operativo de la Direcci&oacute;n que Impacta</strong></td>
      <td id="objetivo">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" id="ficha"></td>
    </tr>
  </table>
  <p>
  <label>
    <div align="center">
<p align="center">
        <label>
        <input type="submit" name="incluir" id="incluir" value="Listado" />
        </label>
</p>
<div align="center"></div>
  </label>
</form>
<script type="text/javascript">
<!--
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
//-->
carga_objetivo_operativo();
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
