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
<?php include "../templates/CENE_MENU_PRINCIPAL.dwt"?>

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
      ajax.open("GET", "muestra_planes_estrategicos_organizacion.php?seleccionado="+valor, true);
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

</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Indicadores Planes Estrat&eacute;gicos Organizaci&oacute;n</title>

<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../css/tablas.css" rel="stylesheet" type="text/css" />
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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
<form id="f1" name="form1" method="POST" action="">
  <p>&nbsp;</p>
  <table width="600" border="1" align="center" cellpadding="2">
    <tr class="encabezado">
      <td colspan="2" align="center" id="fila_1"><div align="center"><strong><img src="../imag/Volume Manager.png" alt="" width="27" height="28" border="0" />Indicadores de Planes Estrat&eacute;gicos Organizaci&oacute;n</strong><strong></strong></div></td>
    </tr>
    <tr>
      <td width="25%"><strong>Organizaci&oacute;n</strong></td>
      <td width="25%"><?php genera_organizacion();?></td>
    </tr>
    <tr>
      <td height="25" colspan="2" id="plan"></td>
    </tr>
  </table>
  
  <p>
    <label>
    <div align="center">
    <div align="center"><a href="../menu/menu_indicadores.php">
      <input type="submit" name="button" id="button" value="Men&uacute; Indicadores"  />
      
     </a> </div>
   </label>
</form>

</body>
</html>
