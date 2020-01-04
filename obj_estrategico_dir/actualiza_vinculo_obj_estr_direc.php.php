<?php
include "../conexion/conectar.php";
if ($_GET['activo']==1)//inserta
 $sql="insert into gestion_obje_org_dir (cod_obj_e_dir, cod_obj_e_org) value ('$codigo','$seleccionado')";
else
 $sql="delete from gestion_obje_org_dir where cod_obj_e_dir = $_GET[codigo] and cod_obj_e_org= $_GET[seleccionado]";
 
 $result=mysql_query($sql,$link);
 mysql_close($link);
 //header ("location:select_obj_estrategicos_organizacion.php?seleccionado=$_GET[seleccionado]&codigo=$_GET[codigo]");
?>