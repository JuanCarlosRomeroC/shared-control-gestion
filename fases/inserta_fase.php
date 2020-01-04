<?php
include "../conexion/conectar.php";
include "../conexion/libreria.php";

if (isset($insertar))
 {
//valida que no este el objetivo
  $sql="select * from gestion_fases where id='$codigo'";
  
  $result=mysql_query($sql,$link);
  
 $cant_row=mysql_affected_rows($link);
 
 if ($cant_row==0)
 {
 
$fecha=cambiaf_a_mysql($fecha_inicio);
 $sql="insert into gestion_fases (nombre, fecha_inicio, duracion, cod_actividad) value('$nombre','$fecha','$duracion','$cod_actividad')";
 $result=mysql_query($sql,$link);
 }
 }
 
 
?>