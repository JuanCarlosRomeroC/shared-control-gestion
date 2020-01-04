<?php
include "../conexion/conectar.php";
include "../conexion/fecha.php";

if (isset($insertar))
 {
//valida que no este el objetivo
  $sql="select * from gestion_actividades where id='$codigo'";
  
  $result=mysql_query($sql,$link);
  
 $cant_row=mysql_affected_rows($link);
 
 if ($cant_row==0)
 {
 
$fecha=cambiaf_a_mysql($fecha_inicio);
$genera=mysql_query("select count(id)+1 from gestion_actividades");
$genera_id=mysql_fetch_array($genera);
$row=$genera_id[0];

 $sql="insert into gestion_actividades (id, nombre, fecha_inicio, duracion, cod_plan_operativo) value ('$row','$nombre','$fecha', '$duracion','$plan_operativo')";
 
 if ($result=mysql_query($sql,$link));
 {
 echo "<script language='javascript'> alert (\"Los datos han sido almacenados correctamente\"); 
	location.href='actividades.php';";
    echo "</script>";
 }
 }
 else 
 echo "<script language='javascript'>  alert('El Codigo ya Existe');location.href='actividades.php';</script>";
 }

?>