<?php 
/*
* Este archivo inserta los registros de organizaciones en la tabla gestion_organizacion en la base de datos
*@ Versión 1.0 @Modificado: 28 de Marzo del 2008
*@Autores: Paúl González y Rosanny Yáñez
*
*/
include "../conexion/conectar.php";
$cod=$_GET['seleccionado'];
if (isset($insertar))
 {
 $sql="UPDATE gestion_planes_operativos set nombre='$nombre', aqo_inicio='$aqo_inicio', aqo_fin='$aqo_fin' where codigo=$cod";
 if ($result=mysql_query($sql,$link));
 {
 echo "<script language='javascript'> alert (\"Los datos han sido modificados correctamente\"); 
	location.href='admin_plan_operativo.php';";
    echo "</script>";
 }
 }
 ?>