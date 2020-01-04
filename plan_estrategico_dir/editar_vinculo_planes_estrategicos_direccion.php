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
<?php include "../templates/CENE_MENU_DIRECCION.dwt" ?>

<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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



    function carga_plan()
{ 
   var valor=document.getElementById("select_0").options[document.getElementById("select_0").selectedIndex].value;
 //alert ("valor "+ valor);
   if(valor==0){
    document.getElementById("plan").innerHTML="No disponible";
   }
   else
   {
      ajax=nuevoAjax();
	 // document.write(valor);
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=3"+"&codigo="+document.form1.codigo.value, true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
         {
           document.getElementById("plan").innerHTML="Cargando....";
         }
         if (ajax.readyState==4)
         {
            document.getElementById("plan").innerHTML=ajax.responseText;
         }
      }
      ajax.send(null);
   }
}


function crear_vinculo(valor, activo)
{
  if (document.form1.codigo.value=="")
   alert("debe colocar un codigo para el objetivo");
   else
    if (document.form1.nombre.value=="")
   alert("debe colocar un Nombre ");
   else
   if (document.form1.aqo_inicio.value=="")
   alert("debe colocar un año de inicio para el plan");
   else
   if (document.form1.aqo_fin.value=="")
   alert("debe colocar un año de fin para el plan");
   else
   {//LLAMO A ENVIAR FORMULARIO PARA QUE INSERTE EL OBJETIVO ESTRATEG DE LA DIRECCION
      enviarFormulario("inserta_planes_estrategicos_direcciones.php", "f1");
	  
	  if (activo)
	    activo=1;
        ajax.open("GET", "actualiza_vinculo_plan_estrategico_org.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value+"&activo="+activo, true);
       // ajax.open("GET", "elimina_vinculo_obj_estr_direc.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value, true);
		
		ajax.onreadystatechange=function()
      {        
		  if (ajax.readyState==4)
               carga_plan();//cargo de nuevo los planes estrategicos de org para que actualice la tabla que los muestra
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
<title>Untitled Document</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

   include ("../conexion/conectar.php");
   
   $result=mysql_query("SELECT * FROM gestion_organizacion where codigo = $_GET[seleccionado]");
  
   $row=mysql_fetch_row($result);
      
?>
<form id="f1" name="form1" method="POST" action="admin_planes_estrategicos_direccion.php">
  <table width="521" border="1" align="center" cellpadding="2">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="2" id="fila_1"><div align="center" class="style2"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Vincular Planes Estrat&eacute;gicos</strong> <strong>Direcci&oacute;n</strong> 
          <input type="hidden" name="insertar" id="insertar" value="insertar" />
      </div></td>
    </tr>
    <tr>
      <td height="35"><strong>Organizaci&oacute;n</strong></td>
      <td>
      <select name="select" disabled="disabled" id="select_0">
        <?php echo "<option value='".$row[1]."'>".$row[2]."</option>";?>
      </select>
      </td>
    </tr>
    <tr>
      <td width="58%" align="center" id=><div align="justify"> <strong>Direcci&oacute;n</strong></div>  </td>
      <td width="42%" align="" id="cod"> <div align="justify">
      
   <?php $result=mysql_query("SELECT * FROM gestion_direcciones where codigo = $_GET[direccion]");
   
   $row=mysql_fetch_row($result);
   ?>   
        <select class="combo" disabled="disabled" id="select_1" name="direccion">
          <?php echo "<option value='".$row[1]."'>".$row[2]."</option>";?>
        </select>
     </div>  </td>
    </tr>
    <tr>
      <td width="58%"><strong>C&oacute;digo</strong></td>
      <td width="42%"><label><span id="sprytextfield1">
      
	  <?php 

  $result=mysql_query("select * from gestion_planes_estrategicos_direcciones where codigo = $_GET[codigo_plan]");//$_GET[codigo_plan]);
  $row=mysql_fetch_row($result);
  //echo $_GET['codigo_plan'];
  
?>
      <input type="text" name="codigo" disabled="disabled" id="codigo"  value="<?php echo $row[1];?>" />
      <span class="textfieldRequiredMsg">Se Requiere un valor</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></label></td>
    </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td><label><span id="sprytextfield2">
      <input name="nombre" type="text" disabled="disabled" id="nombre" value="<?php echo $row[2];?>" />
      <span class="textfieldRequiredMsg">Se Requiere Nombre</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de Inicio</strong></td>
      <td><label><span id="sprytextfield3">
      <input name="aqo_inicio" type="text" disabled="disabled" id="aqo_inicio" value="<?php echo $row[3];?>" maxlength="4" />
      <span class="textfieldRequiredMsg">Ingrese Año de inicio</span><span class="textfieldInvalidFormatMsg">Sólo Números</span></span></label></td>
    </tr>
    <tr>
      <td><strong>A&ntilde;o de fin</strong></td>
      <td><label><span id="sprytextfield4">
      <input name="aqo_fin" type="text" disabled="disabled" id="aqo_fin" value="<?php echo $row[4];?>" maxlength="4" />
      <span class="textfieldRequiredMsg">Ingrese Año de fin</span><span class="textfieldInvalidFormatMsg">Sólo Números</span></span></label></td>
    </tr>
    <tr>
      <td><strong>Plan Estrat&eacute;gico de la Organizaci&oacute;n que impacta </strong></td>
      <td id="plan">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" id="ficha"><label></label></td>
    </tr>
  </table>
  
  
  
  <label></label>
  <p align="center">
    <label>
    <input type="submit" name="button" id="button" value="Listado" />
    </label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur"]});

//-->

carga_plan();
</script>
</body>
</html>
