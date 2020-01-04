
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
 $sql="select * from gestion_obj_operativos where codigo='$codigo'";
 $result=mysql_query($sql,$link);
 $cant_row=mysql_affected_rows($link);
 if ($cant_row==0){

 $sql="insert into gestion_obj_operativos(codigo, nombre, descripcion, cod_plan_o_dir) value ('$codigo','$nombre', '$descripcion', '$plan_operativo')";
 $result=mysql_query($sql,$link);
 }
 
 
// header ("location:muestra_objetivos_operativos.php");

}
?>


