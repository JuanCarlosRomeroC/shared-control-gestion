<?php 
/*
* Este archivo inserta los registros de organizaciones en la tabla gestion_organizacion en la base de datos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/?>
<?php
include "../conexion/conectar.php";
if (isset($insertar))
 {
//valida que no este el objetivo
 $sql="select * from gestion_obj_estrategicos_direcciones where codigo='$codigo'";
 $result=mysql_query($sql,$link);
 $cant_row=mysql_affected_rows($link);
 if ($cant_row==0){

 $sql="insert into gestion_obj_estrategicos_direcciones (codigo, nombre, descripcion, cod_plan_e_dir) value ('$codigo','$nombre', '$descripcion','$plan')";
 $result=mysql_query($sql,$link);
 }
 mysql_close($link);
// header ("location:muestra_objetivos_estrategicos_direcciones.php");

}
?>

