<?php 
/*
* Este archivo realiza el llamado al modulo para la inserción de los objetivos estratégicos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/?>
<html>
<head>
<?php include "../templates/CENE.dwt"?>

<title>Sistema Gestión/Organización/Listado de Objetivos Estratégicos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../css/tablas.css" rel="stylesheet" type="text/css">
<head>
<script language="javascript" type="text/javascript">

function confirma_eliminar(cod,objetivo_estrategico_organizacion)
{
if (confirm("Se dispone a eliminar el objetivo estratégico: "+objetivo_estrategico_organizacion+". ¿Desea continuar?"))
   elimina_objetivo_estrategico_organizacion(cod);
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

function carga_plan()
{
   var valor=document.getElementById("select_0").options[document.getElementById("select_0").selectedIndex].value;
   if(valor==0)
   {
      // Si el usuario eligio la opcion "Elige", no voy al servidor y pongo todo por defecto
      combo=document.getElementById("select_1");
      combo.length=0;
      var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona plan...";
      combo.appendChild(nuevaOpcion);   combo.disabled=true;
   }
   else
   {
      ajax=nuevoAjax();
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=11", true);
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

function carga_objetivo()
{ 
   var valor=document.getElementById("select_1").options[document.getElementById("select_1").selectedIndex].value;
   // var codigo=document.getElementById("select_0").options[document.getElementById("select_0").selectedIndex].value;
   

 //alert (valor);
   if(valor==0){
    document.getElementById("objetivo").innerHTML="No disponible";
   }
   else
   {
      ajax=nuevoAjax();
	 //document.write(valor);
	//alert (valor);
      ajax.open("GET", "muestra_objetivos_estrategicos.php?seleccionado="+valor+"&cod_org="+document.form.organizacion.value, true);
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

function elimina_objetivo_estrategico_organizacion(cod)
{
      ajax=nuevoAjax();
      ajax.open("GET", "../eliminar/eliminar.php?seleccionado="+cod+"&elimina=7", true);
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

</script>
</head>

<body>

  <?php

function genera_organizacion()
{
   include ("../conexion/conectar.php");
   $result=mysql_query("SELECT * FROM gestion_organizacion");
   mysql_close($link);

   // Muestra el primer select compuesto por las organizaciones
   echo "<select class='combo' id='select_0' name='organizacion' onChange='carga_plan()'>",
      "<option value='0'>Elige Organización....</option>";
	  
   while($row=mysql_fetch_row($result))
   {
      echo "<option value='".$row[1]."'>".$row[2]."</option>";
   }
   echo "</select>";
}
?>

<form name="form" method="POST" action="objetivos_estrategicos.php">
  <table width="600" height="142" border="1" align="center" >
    <tr class="encabezado">
      <td height="26" colspan="2" id="fila_1"><div align="center"><strong><img src="../imag/j0432636.png" alt="" width="54" height="40" />Listado de Objetivos Estrategicos Organizaci&oacute;n</strong></div></td>
    </tr>
    <tr>
      <td width="30%" align="justify" id="nombre"><strong>Organizaci&oacute;n</strong></td>
      <td width="70%" height="26" align="center" id="nombre"><div align="justify">
          <?php genera_organizacion(); ?>
      </div></td>
    </tr>
    <tr>
      <td width="30%" align="" ><strong>Plan Estrat&eacute;gico</strong></td>
      <td width="70%" height="26" align="" id="cod"><div align="justify">
          <select class="combo" disabled="disabled" id="select_1" name="direccion" onChange="carga_objetivo();">
            <option id="valor_defecto"  value="0">Selecciona Plan...</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td height="25" colspan="2" align="center" id="objetivo">&nbsp;</td>
    </tr>
    <tr>
      <td height="25" colspan="2" align="center" id="objetivo2">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
