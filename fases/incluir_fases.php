<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_PRINCIPAL.dwt" ;
include ("../conexion/conectar.php");
$cod=$_GET['codigo_actividad'];
$consulta="select a.id,a.nombre, po.codigo, po.nombre,d.codigo, d.nombre,o.codigo, o.nombre from gestion_actividades a inner join gestion_planes_operativos po on (a.cod_plan_operativo=po.codigo) inner join gestion_direcciones d on (d.codigo=po.cod_direccion) inner join gestion_organizacion o on (d.codigo_organizacion=o.codigo)  where a.id='$cod'";
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



function carga_fase()
{ 
   //alert ("../select/select_actividad_fase.php?seleccionado=" + document.form1.cod_actividad.value);
   //alert ("&codigo=" + document.form1.codigo.value);
      ajax=nuevoAjax();
	  ajax.open("GET", "../select/select_total.php?seleccionado="+document.form1.cod_actividad.value+"&select=17"+"&codigo="+document.form1.codigo.value, true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
            document.getElementById("fase").innerHTML="Cargando....";
         
         if (ajax.readyState==4)
         {
            document.getElementById("fase").innerHTML=ajax.responseText;
			//alert("skhd");
         }
      }
      ajax.send(null);
}


function muestra_fases()
{
   //alert("actividad " + document.form1.cod_actividad.value);
	  ajax=nuevoAjax();
	   ajax.open("GET", "muestra_fases.php?seleccionado="+document.form1.cod_actividad.value, true);
      
	  ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
           document.getElementById("fases").innerHTML="Cargando...";
          		  
         if (ajax.readyState==4)
		 {
            document.getElementById("fases").innerHTML=ajax.responseText;
			carga_fase();
         }
	 }
      ajax.send(null);
 }

function confirma_eliminar(cod_fase,fase)
{
if (confirm("Se dispone a eliminar la Fase: "+fase+". ¿Desea continuar?"))
   elimina_fase(cod_fase);
}

function elimina_fase(cod_fase)
{
      ajax=nuevoAjax();
      ajax.open("GET", "../eliminar/eliminar.php?seleccionado="+cod_fase+"&elimina=1", true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==4)
		 {
            //document.getElementById("fase2").innerHTML=ajax.responseText;
		    muestra_fases();
		}
      }
      ajax.send(null);
}


function crear_vinculo(valor, activo)
{
   if (document.form1.nombre.value=="")
      alert("debe colocar un Nombre ");
   else
   if (document.form1.duracion.value=="")
      alert("debe colocar los dias de duración de la actividad");
   
   else
   {//LLAMO A ENVIAR FORMULARIO PARA QUE INSERTE EL OBJETIVO ESTRATEG DE LA DIRECCION
     //alert("sdsdsd3434");
         enviarFormulario("inserta_fase.php", "f1");
	  
	  if (activo)
	    activo=1;
		//alert("actualiza_vinculo_fases.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value+"&activo="+activo);
        ajax.open("GET", "actualiza_vinculo_fases.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value+"&activo="+activo, true);
       // ajax.open("GET", "elimina_vinculo_obj_estr_direc.php?seleccionado="+valor+"&codigo="+document.form1.codigo.value, true);
		
		ajax.onreadystatechange=function()
          {        
		  if (ajax.readyState==4)
               carga_objetivo_operativo();//cargo de nuevo los obj estrateg de org para que actualice la tabla que los muestra
   	     }
		
	  ajax.send(null);
	 
	}
}



function guardar()
{
if (document.form1.nombre.value=="")
      alert("debe colocar un Nombre ");
   else
   if (document.form1.fecha_inicio.value=="")
      alert("debe colocar la fecha");
	  else
	  if (document.form1.duracion.value=="")
      alert("debe colocar los dias de duración");
	  else
 enviarFormulario("inserta_fase.php", "f1");
 //crear_vinculo();
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
    //alert("SDSD");
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
	 muestra_fases();
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


<form id="f1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="658" border="1" align="center" cellpadding="2" cellspacing="0">
    <tr bgcolor="#FFFFFF" class="encabezado">
      <td colspan="3"><div align="center" class="style3"><strong><img src="../imag/usuario.png" alt="" width="57" height="45" />Registro de Fases</strong>          
          <input name="insertar" type="hidden" id="insertar" value="1" />
      </div></td>
    </tr>
    <tr>
      <td width="327"><strong>Organizaci&oacute;n</strong></td>
      <td><label>
        <input type="text" name="select" id="select" value="<?php echo $row[7];?>"  disabled="disabled"/>
      </label></td>
    </tr>
    <tr>
      <td align="center" id=> <div align="justify"><strong>Direcci&oacute;n</strong></div></td>
      <td align="" id="cod"> <div align="justify"><label></label>
          <label>
          
          <input type="text" name="select2" id="select2" value="<?php echo $row[5];?>"  disabled="disabled"/>
          </label>
      </div> </td>
    </tr>
    <tr>
      <td align="center" id=> <div align="justify"><strong>Plan Operativo</strong></div></td>
      <td align="" id="plan_operativo"> <div align="justify"><label></label>
     
          
          
          <label>
          
         
          <input type="text" name="select3" id="select3" value="<?php echo $row[3];?>"  disabled="disabled"/>
          </label>
      </div>      </td>
      </tr>
    <tr>
      <td><strong>Actividad</strong></td>
      <td width="313"><span id="sprytextfield1">
        <label>
        
      
        
        <input type="text" name="actividad" id="actividad" disabled="disabled" value="<?php echo $row[1];?>" />
        </label>
      <span class="textfieldRequiredMsg">A value is required.</span></span>
      <input name="cod_actividad" type="hidden" id="cod_actividad" value="<?php echo $row[0];?>" /></td>
      <td width="17"  id="genera_codigo"><?php include "genera_codigo_fase.php";?>
<label></label></td
    >
    </tr>
    <tr>
      <td><strong>Nombre de la Fase</strong></td>
      <td><span id="sprytextfield2">
        <label>
        <input type="text" name="nombre" id="nombre" />
        </label>
      <span class="textfieldRequiredMsg">Se requiere un Nombre</span></span></td>
    </tr>
    <tr>
      <td><strong>Fecha de Inicio</strong></td>
      <td id="objetivo"><label>
        <input type="text" disabled="disabled" name="fecha_inicio" id="fecha_inicio" />
        <img src="../imag/img.gif" alt="cal" name="f_trigger_c" width="20" height="20" border="0" id="f_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Date selector"
      onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></label></td>
    </tr>
    <tr>
      <td><strong>Duraci&oacute;n (D&iacute;as)</strong></td>
      <td id="objetivo2"><span id="sprytextfield3">
      <label>
      <input type="text" name="duracion" id="duracion" />
      </label>
      <span class="textfieldRequiredMsg">Se requiere un valor</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></td>
    </tr>
    <tr>
      <td height="25"><strong>Precedencia  de la Fase</strong></td>
      <td id="fase">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" id="ficha2"><div align="center">
        <input type="button" name="insertar" id="insertar" value="Guardar Fase" onclick="guardar()"/>
        <input type="submit" name="incluir" id="incluir" value="Añadir nueva" />
      </div></td>
    </tr>
    <tr>
      <td colspan="3" id="ficha">&nbsp;</td>
    </tr>
    <tr>
      <td height="25" colspan="3" valign="middle" id="fases">&nbsp;</td>
    </tr>
  </table>
  <p>
  <label>
    <div align="center">
<p align="center">
        <label></label>
        <label></label>
</p>
<p align="center">
<a href="../actividades/admin_actividades.php">
  <input  type="submit" name="listado" id="listado" value="Listado"  /></a></p>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
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
