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

<title>Sistema Gestión/Organización/Objetivos Estratégicos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">

<link href="../css/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-weight: bold;
	font-size: medium;
}
-->
</style>
<head>
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
      ajax.open("GET", "../select/select_total.php?seleccionado="+valor+"&select=1", true);
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
      <form name="aqui" method="POST" action="inserta_objetivos_estrategicos.php">
  <table width="925" border="0" align="center">
    <tr>
      <td width="919" align="center"><table width="602" height="219" border="1" align="center" >
        <tr bgcolor="#FFFFFF" class="encabezado">
          <td colspan="2" id="fila_1"><div align="center" class="style1 style2"><img src="../imag/usuario.png" alt="" width="57" height="45" /><strong>Registro de Objetivos Estrategicos Organizaci&oacute;n</strong></div></td>
        </tr>
        <tr>
          <td width="50%" align="center" id="nombre"><div align="justify"><strong>Organizacion</strong></div></td>
          <td width="50%" align="center" id="nombre"><div align="justify">
            <?php genera_organizacion(); ?>          
          </div></td>
        </tr>
        <tr>
          <td width="50%" align="center" id=><div align="justify"><strong>Plan Estrat&eacute;gico</strong></div></td>
          <td width="50%" align="" id="cod"><div align="justify">
            <select class="combo" disabled="disabled" id="select_1" name="direccion">
              <option id="valor_defecto"  value="0">Selecciona Plan...</option>
            </select>
          </div></td>
        </tr>
        <tr>
          <td width="50%" align="center" id="plan"><div align="justify"><strong>Codigo</strong></div></td>
          <td width="50%" align="center" id="plan"><span id="sprytextfield1">
          <label> </label>
          <div align="justify">
            <input type="text" name="codigo" id="codigo">
          </div>
          <span class="textfieldRequiredMsg">Se requiere un Valor</span><span class="textfieldInvalidFormatMsg">Valor Numérico</span></span></td>
        </tr>
        <tr>
          <td align="center" id="plan"><div align="justify"><strong>Nombre</strong></div></td>
          <td align="center" id="plan"><span id="sprytextarea1">
            <label>
            <textarea name="nombre" id="nombre2" cols="45" rows="1"></textarea>
            </label>
            <span class="textareaRequiredMsg">Se Requiere Nombre</span></span></td>
        </tr>
        <tr>
          <td align="center" id="plan6"><div align="justify"><strong>Descripcion</strong></div></td>
          <td align="center" id="plan6"><span id="sprytextarea2">
            <label>
            <textarea name="descripcion" id="descripcion" cols="45" rows="1"></textarea>
            </label>
            <span class="textareaRequiredMsg">Ingrese Descripción</span></span></td>
        </tr>
        <tr bgcolor="#FFFFFF" class="encabezado">
          <td colspan="2" align="center" id="plan5"><label>
            <input type="submit" name="insertar" id="insertar" value="Guardar">
          </label></td>
          </tr>
      </table></td>
    </tr>
  </table>
  </form>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {validateOn:["blur", "change"]});
//-->
</script>
</body>
</html>