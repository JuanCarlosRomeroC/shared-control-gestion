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

function confirma_eliminar(cod,dir)
{
if (confirm("Se dispone a eliminar la dirección: "+dir+". ¿Desea continuar?"))
   elimina_direccion(cod);
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
   }
   else
   {
      ajax=nuevoAjax();
      ajax.open("GET", "muestra_direccion.php?seleccionado="+valor, true);
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

function elimina_direccion(cod)
{
      ajax=nuevoAjax();
      ajax.open("GET", "../eliminar/eliminar.php?seleccionado="+cod+"&elimina=2", true);
      ajax.onreadystatechange=function()
      {
         if (ajax.readyState==4)
		 {
            document.getElementById("cod2").innerHTML=ajax.responseText;
		    carga_direccion();
		}
      }
      ajax.send(null);
}

</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Gestión/Dirección/Listado</title>

<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

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

<form id="f1" name="form1" method="POST" action="direccion.php">
  <table width="600" border="1" align="center" cellpadding="2">
    <tr class="encabezado" >
      <td colspan="2" align="center" class="style2" id="fila_1"><strong> <img src="../imag/j0432636.png" alt="" width="54" height="40" />Listado de Direcciones</strong>
        <input type="hidden" name="insertar" id="insertar" value="insertar" /></td>
    </tr>
    <tr>
      <td width="25%"><strong>Organizaci&oacute;n </strong></td>
      <td width="75%"><?php genera_organizacion(); ?> &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" id="cod">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" id="cod2">&nbsp;</td>
    </tr>
  </table>
  <label></label>
</form>

<div align="center"></div>
</body>
</html>
