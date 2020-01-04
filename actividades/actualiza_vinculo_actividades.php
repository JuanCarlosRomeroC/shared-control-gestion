 <?php
include "../conexion/conectar.php";
if ($_GET['activo']==1)//inserta
 $sql="insert into gestion_obj_operativos_actividades (cod_actividad,cod_obj_operativo) value ('$codigo','$seleccionado')";
else
 $sql="delete from gestion_obj_operativos_actividades where cod_obj_operativo = $_GET[seleccionado] ";
 $result=mysql_query($sql,$link);
 mysql_close($link);
 ?>