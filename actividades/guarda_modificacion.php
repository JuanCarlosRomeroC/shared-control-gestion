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
 $fecha=cambiaf_a_mysql($fecha_inicio);
 $sql="UPDATE gestion_actividades set nombre='$nombre', fecha_inicio='$fecha', duracion='$duracion' where id=$cod";
 if ($result=mysql_query($sql,$link));
 {
 echo "<script language='javascript'> alert (\"Los datos han sido modificados correctamente\"); 
	location.href='admin_actividades.php';";
    echo "</script>";
 }
 }
 ?>