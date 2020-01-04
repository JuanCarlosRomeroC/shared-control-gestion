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
 $sql="select * from gestion_planes_operativos where codigo='$codigo'";
 $result=mysql_query($sql,$link);
 $cant_row=mysql_affected_rows($link);
 if ($cant_row==0)
 {
 $sql="insert into gestion_planes_operativos (codigo, nombre, aqo_inicio, aqo_fin, cod_direccion) value ('$codigo','$nombre', '$aqo_inicio', '$aqo_fin', '$direccion')";
 $result=mysql_query($sql,$link);
}
 }

?>





