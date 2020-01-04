<?php
include "../conexion/conectar.php";
if ($_GET['activo']==1)//inserta
 $sql="insert into gestion_plan_e_org_dir (cod_plan_e_org, cod_plan_e_dir) value ('$seleccionado','$codigo')";
else
 $sql="delete from gestion_plan_e_org_dir where cod_plan_e_org = $_GET[seleccionado] and cod_plan_e_dir= $_GET[codigo]";
 
 $result=mysql_query($sql,$link);
  mysql_close($link); 
  ?>
