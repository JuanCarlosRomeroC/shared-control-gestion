<?php 
/*
* Este archivo inserta los registros de organizaciones en la tabla gestion_organizacion en la base de datos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/
include "../conexion/conectar.php";
include "../conexion/libreria.php";
$cod=$_GET['seleccionado'];
if (isset($insertar))
 {
 $consulta=mysql_query("select cod_actividad from gestion_fases where id=$cod") or die (mysql_error);
 $actividad=mysql_fetch_array($consulta);
 $cod_actividad=$actividad["cod_actividad"];
 $fecha=cambiaf_a_mysql($fecha_inicio);
 $sql="UPDATE gestion_fases set nombre='$nombre' where id=$cod";
 if ($result=mysql_query($sql,$link));
 {
 echo "<script language='javascript'> alert (\"Los datos han sido modificados correctamente\"); 
	location.href='incluir_fases.php?codigo_actividad=+$cod_actividad';";
    echo "</script>";
 }
 }
 ?>