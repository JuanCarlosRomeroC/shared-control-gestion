<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "../templates/CENE_MENU_DIRECCION.dwt" ?>


<script language="javascript" type="text/javascript">

function confirma_eliminar(cod,obj_operativo)
{
if (confirm("Se dispone a eliminar el objetivo operativo: "+obj_operativo+". ¿Desea continuar?"))
   elimina_objetivo_operativo(cod);
}


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
			
         }
      }
      ajax.send(null);
   }
}


function elimina_objetivo_operativo(cod)
{
      ajax=nuevoAjax();
      ajax.open("GET", "../eliminar/eliminar.php?seleccionado="+cod+"&elimina=3", true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==4)
		 {
            document.getElementById("objetivo2").innerHTML=ajax.responseText;
		    carga_objetivo();
		}
      }
      ajax.send(null);
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
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=13", true);
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
			carga_plan_direccion();

			}
      }
      ajax.send(null);
   }
}

function carga_objetivo()
{ 
var org=document.getElementById("select_0").options[document.getElementById("select_0").selectedIndex].value;
 
   var valor=document.getElementById("select_2").options[document.getElementById("select_2").selectedIndex].value;
   var codigo=document.getElementById("select_1").options[document.getElementById("select_1").selectedIndex].value;

 //alert ("valor "+ valor);
   if(valor==0){
    document.getElementById("objetivo").innerHTML="No disponible";
   }
   else
   {
      ajax=nuevoAjax();
	//alert(valor)
      ajax.open("GET", "muestra_objetivos_operativos.php?seleccionado="+valor+"&cod_direccion="+document.form1.direccion.value+"&cod_org="+org, true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==1)
         {
            document.getElementById("objetivo").innerHTML="Cargando....";
         }
         if (ajax.readyState==4)
         {
            document.getElementById("objetivo").innerHTML=ajax.responseText;
         }
      }
      ajax.send(null);
   }
}
   
</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Sistema Gestión/Dirección/Listado de Objetivos Operativos</title>

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


<form id="form1" name="form1" method="post" action="objetivos_operativos.php">
  <table width="600" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="2"><div align="center"><strong><img src="../imag/j0432636.png" alt="" width="54" height="40" />Listado de Objetivos Operativos</strong>
          <input type="hidden" name="insertar" id="insertar" />
      </div></td>
    </tr>
    <tr>
      <td width="106"><strong>Organizaci&oacute;n</strong></td>
      <td width="279"><label><?php genera_organizacion()?> </label></td>
    </tr>
    <tr>
      <td width="106" align="" ><strong>Direcci&oacute;n</strong></td>
      <td width="279" align="" id="cod"> <div align="justify"><label>
        <select class="combo" disabled="disabled" id="select_1" name="direccion" onchange='carga_plan_operativo()'>
          <option id="valor_defecto"  value="0">Selecciona Dirección...</option>
        </select>
      </label>
      </div> </td>
    </tr>
    <tr>
      <td width="106" align="" ><strong>Plan Operativo</strong></td>
      <td width="279" align="" id="plan_operativo"> <div align="justify"><label>
        <select class="combo" disabled="disabled" id="select_2" name="plan_operativo" onchange='carga_objetivo()'>
          <option id="valor_defecto" value="0">Selecciona Plan...</option>
        </select>
      </label>
      </div>      </td>
      </tr>
    <tr>
      <td colspan="2" id="objetivo">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" id="objetivo2">&nbsp;</td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
</form>

</body>
</html>
