<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_PRINCIPAL.dwt" ?>


<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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




function carga_direccion()
{
   var valor=document.getElementById("select_0").options[document.getElementById("select_0").selectedIndex].value;
   if(valor==0)
   {
      // Si el usuario eligio la opcion "Elige", no voy al servidor y pongo todo por defecto
      combo=document.getElementById("select_1");
      combo.length=0;
      var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Dirección...";
      combo.appendChild(nuevaOpcion);   combo.disabled=true;
	  carga_plan_operativo();
   }
   else
   {
      ajax=nuevoAjax();
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=8", true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
         {
            // Mientras carga elimino la opcion "Elige " y se coloca una que dice "Cargando"
            combo=document.getElementById("select_1");
            combo.length=0;
            var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
            combo.appendChild(nuevaOpcion); combo.disabled=true;   
         }
         if (ajax.readyState==4)
         {
            document.getElementById("cod").innerHTML=ajax.responseText;
			carga_codigo_actividad();
         }
      }
      ajax.send(null);
   }
}


function carga_plan_operativo()
{
   var valor=document.getElementById("select_1").options[document.getElementById("select_1").selectedIndex].value;
   if(valor==0)
   {
      // Si el usuario eligio la opcion "Elige", no voy al servidor y pongo todo por defecto
      combo=document.getElementById("select_2");
      combo.length=0;
      var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Plan...";
      combo.appendChild(nuevaOpcion);   combo.disabled=true;
   }
   else
   {
      ajax=nuevoAjax();
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=14", true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
         {
            // Mientras carga elimino la opcion "Elige plan" y pongo una que dice "Cargando"
            combo=document.getElementById("select_2");
            combo.length=0;
            var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
            combo.appendChild(nuevaOpcion); combo.disabled=true;   
         }
         if (ajax.readyState==4)
         {
            document.getElementById("plan_operativo").innerHTML=ajax.responseText;
			carga_codigo_actividad();
			
			}
      }
      ajax.send(null);
   }
 }

function carga_objetivo_operativo()
{ 
   var valor=document.getElementById("select_2").options[document.getElementById("select_2").selectedIndex].value;
 //alert ("valor "+ valor);
   if(valor==0){
    document.getElementById("objetivo").innerHTML="No disponible";
   }
   else
   {
      ajax=nuevoAjax();
	
//alert(valor);

      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=15"+"&codigo="+document.form1.codigo.value, true);
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
     //alert("sdsdsd3434");
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
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php


function genera_organizacion()
{
   include ("../conexion/conectar.php");
   $result=mysql_query("SELECT * FROM gestion_organizacion");
   mysql_close($link);

   // Muestra el primer select compuesto por las organizaciones
   echo "<select class='combo' id='select_0' name='organizacion' onChange='carga_direccion()'>",
      "<option value='0'>Elige Organización....</option>";
	  
   while($row=mysql_fetch_row($result))
   {
      echo "<option value='".$row[1]."'>".$row[2]."</option>";
   }
   echo "</select>";
}
?>

 

<form id="f1" name="form1" method="post" action="admin_actividades.php">
  <p>&nbsp;</p>
  <table width="658" height="322" border="1" align="center" cellpadding="2" cellspacing="0">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="3"><div align="center" class="style3"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Actividades</strong>          
          <input type="hidden" name="insertar" id="insertar" />
      </div></td>
    </tr>
    <tr>
      <td width="327"><strong>Organizaci&oacute;n</strong></td>
      <td><label><?php genera_organizacion()?> </label></td>
    </tr>
    <tr>
      <td align="center" id=> <div align="justify"><strong>Direcci&oacute;n</strong></div></td>
      <td align="" id="cod"> <div align="justify"><label>
        <select class="combo" disabled="disabled" id="select_1" name="direccion" onchange='carga_plan_operativo()'>
          <option id="valor_defecto"  value="0">Selecciona Dirección...</option>
        </select>
      </label>
      </div> </td>
    </tr>
    <tr>
      <td align="center" id=> <div align="justify"><strong>Plan Operativo</strong></div></td>
      <td align="" id="plan_operativo"> <div align="justify"><label>
        <select class="combo" disabled="disabled" id="select_2" name="plan_operativo" onchange='carga_objetivo_operativo()'>
          <option id="valor_defecto" value="0">Selecciona Plan...</option>
        </select>
      </label>
      </div>      </td>
      </tr>
    <tr>
      <td><strong>Nombre</strong></td>
      <td width="313"><span id="sprytextarea1">
        <label>
        <textarea name="nombre" cols="45"  rows="1" id="nombre" ></textarea>
        </label>
      <span class="textareaRequiredMsg">Se Requiere Nombre</span></span></td>
      <td width="17"  id="genera_codigo"><?php include "genera_codigo_actividad.php";?>
<label></label></td>
    </tr>
    <tr>
      <td><strong>Fecha de Inicio</strong></td>
      <td><label>
        <input type="text" name="fecha_inicio" readonly="readonly" id="fecha_inicio" />
        <img src="../imag/img.gif" alt="cal" name="f_trigger_c" width="20" height="20" border="0" id="f_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Date selector"
      onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></label></td>
    </tr>
    <tr>
      <td><strong>Duraci&oacute;n (D&iacute;as)</strong></td>
      <td ><span id="sprytextfield4">
      <label>
      <input type="text" name="duracion" id="duracion" />
      </label>
      <span class="textfieldRequiredMsg">Ingrese Duración</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></td>
    </tr>
    <tr>
      <td height="12"><strong>Objetivo Operativo de la Direcci&oacute;n que Impacta</strong></td>
      <td height="12" id="objetivo">&nbsp;</td>
    </tr>
    <tr>
      <td height="31" colspan="2" id="ficha">&nbsp;</td>
    </tr>
    
  </table>
  <p>
  <label>
    <div align="center">
<p align="center">
        <label><a href="admin_actividades.php">
        <input type="submit" name="incluir" id="incluir" value="Listado" />
        </a></label>
        <label></label>
</p>
<div align="center"></div>
  </label>
</form>
<script type="text/javascript">
<!--
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
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
</script>
</body>
</html>
