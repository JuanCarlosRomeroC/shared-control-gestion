<?php
	include ("../conexion/conectar.php");
	
	switch ($_GET['select'])
	{
	case '1':
	select_planes_estrategicos();
	break;
    case '2':
	select_direccion2();
	break;
	case '3':
	select_planes_estrategicos3();
	break;
	case '4':
	select_direccion();
	break;
	case '5':
	select_planes_estrategico_direccion();
	break;
	case '6':
	select_obj_estrategicos_organizacion();
	break;
	case '7':
	select_plan_estrategico_direccion_impacto();
	break;
	case '8':
	select_direccion_operativo();	
	break;
	case '9':
	select_plan_operativo();	
	break;
	case '10':
	select_objetivos_estrategicos_direccion();	
	break;
	case '11':
	select_admin_objetivos_estrategicos_org();	
	break;
	case '12':
	select_admin_objetivos_estrategicos_direcciones();	
	break;
	case '13':
	select_admin_plan_operativo();	
	break;
	case '14':
	select_plan_operativo_actividad();	
	break;
	case '15':
	select_objetivos_operativos_impacto();	
	break;
	case '16':
	select_admin_plan_operativo_actividad();	
	break;
	case '17':
	select_actividad_fase();	
	break;
	
}
	
	function select_planes_estrategicos()
	{
	$result=mysql_query("SELECT * FROM gestion_planes_estrategicos WHERE codigo_organizacion=$_GET[seleccionado]")or die();
   //mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_1' name='direccion'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentors y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  //SE CAMBIO 1 POR 5
      echo "<option value='".$row[1]."'>".$row[2]."</option>";
   }         
   echo "</select>";
	}
	
	function select_direccion2()
	{
	$result=mysql_query("SELECT * FROM gestion_direcciones WHERE codigo_organizacion=$_GET[seleccionado]")or die();
   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_1' name='direccion'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
      echo "<option value='".$row[1]."'>".$row[2]."</option>";
   }         
   echo "</select>";
	//mysql_close($link);
   }
   
   function select_planes_estrategicos3()
   {
$result=mysql_query("SELECT * FROM gestion_planes_estrategicos AS a inner join gestion_plan_e_org_dir AS b on a.codigo=b.cod_plan_e_org WHERE a.codigo_organizacion=$_GET[seleccionado] and  b.cod_plan_e_dir=$_GET[codigo]")or die();

$result1=mysql_query("SELECT * FROM gestion_planes_estrategicos WHERE codigo not in (SELECT a.codigo FROM gestion_planes_estrategicos AS a inner join gestion_plan_e_org_dir AS b ON a.codigo=b.cod_plan_e_org WHERE codigo_organizacion=$_GET[seleccionado] and b.cod_plan_e_dir=$_GET[codigo])and codigo_organizacion=$_GET[seleccionado]")or die();
   //mysql_close($link);
   echo "<table width='75%' border='0'>"; 
   //muestra planes que SI estan vinculados MARCADOS
    while($row=mysql_fetch_row($result))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_plan_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)'checked>".$row[2]."</td>";
  echo "</tr>";
  } 
     //muestra planes que NO estan vinculados
while($row=mysql_fetch_row($result1))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_plan_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value,this.checked)'>".$row[2]."</td>";
  echo "</tr>";
  } 
echo "</table>";
     }
	 
function select_direccion()
{
$result=mysql_query("SELECT * FROM gestion_direcciones WHERE codigo_organizacion=$_GET[seleccionado]")or die();
//   mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_1' name='direccion'onChange='carga_plan()'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
      echo "<option value='".$row[1]."'>".$row[2]."</option>";
   }         
   echo "</select>";
}	 
	
function select_planes_estrategico_direccion()
	 {
	 $result=mysql_query("SELECT * FROM gestion_planes_estrategicos_direcciones WHERE cod_direccion=$_GET[seleccionado]")or die();
  // mysql_close($link);
   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_2' name='plan' onChange='carga_objetivo()'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentors y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if (strlen($row[2])>50)
	  {
	  $cad=substr($row[2],0,50);
	  $cad=$cad.'...';
	  }
	  echo "<option value='".$row[1]."'>  ".$row[1]." - ".$cad."</option>";
   }         
   echo "</select>";
	 }
	 
	 
function select_obj_estrategicos_organizacion()	 
{
$res=mysql_query("SELECT cod_plan_e_org FROM gestion_plan_e_org_dir WHERE cod_plan_e_dir=$_GET[seleccionado]") or die();
$row=mysql_fetch_array($res);
$seleccionado=$row["cod_plan_e_org"];


$result=mysql_query("SELECT * FROM gestion_obj_estrategicos AS a inner JOIN gestion_obje_org_dir AS b ON a.codigo = b.cod_obj_e_org WHERE b.cod_obj_e_dir=$_GET[codigo] and a.codigo_plan_estrategico='$seleccionado'") or die();


$result1=mysql_query("SELECT * FROM gestion_obj_estrategicos where codigo not in (SELECT a.codigo FROM gestion_obj_estrategicos AS a inner JOIN gestion_obje_org_dir AS b ON a.codigo = b.cod_obj_e_org WHERE b.cod_obj_e_dir=$_GET[codigo] and a.codigo_plan_estrategico='$seleccionado') and codigo_plan_estrategico='$seleccionado'") or die();

  // mysql_close($link);
   echo "<table width='75%' border='0'>"; 
   //muestra planes que SI estan vinculados MARCADOS
    while($row=mysql_fetch_row($result))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_obj_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)' checked>".$row[2]."</td>";
  echo "</tr>";
  } 
     //muestra planes que NO estan vinculados
  while($row=mysql_fetch_row($result1))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_obj_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)'>".$row[2]."</td>";
  echo "</tr>";
  } 
echo "</table>";
}

function select_plan_estrategico_direccion_impacto()
{
$result=mysql_query("SELECT * FROM gestion_planes_estrategicos_direcciones AS a inner join gestion_plan_e_o_dir AS b on a.codigo=b.cod_plan_e_dir WHERE a.cod_direccion=$_GET[seleccionado] and  b.cod_plan_o_dir=$_GET[codigo]")or die();

$result1=mysql_query("SELECT * FROM gestion_planes_estrategicos_direcciones WHERE codigo not in (SELECT a.codigo FROM gestion_planes_estrategicos_direcciones AS a inner join gestion_plan_e_o_dir AS b ON a.codigo=b.cod_plan_e_dir WHERE cod_direccion=$_GET[seleccionado] and b.cod_plan_o_dir=$_GET[codigo])and cod_direccion=$_GET[seleccionado]")or die();

//   mysql_close($link);
   echo "<table width='75%' border='0'>"; 
   //muestra planes que SI estan vinculados MARCADOS
    while($row=mysql_fetch_row($result))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_plan_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)'checked>".$row[2]."</td>";
  echo "</tr>";
  } 
     //muestra planes que NO estan vinculados
while($row=mysql_fetch_row($result1))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_plan_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value,this.checked)'>".$row[2]."</td>";
  echo "</tr>";
  } 
echo "</table>";
}

function select_direccion_operativo()
{
$result=mysql_query("SELECT * FROM gestion_direcciones WHERE codigo_organizacion=$_GET[seleccionado]")or die();
//   mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_1' name='direccion' onchange='carga_plan_operativo()'>";
   echo "<option value='0'>Elige Dirección....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
      echo "<option value='".$row[1]."'>".$row[2]."</option>";
   }         
   echo "</select>";
}

function select_plan_operativo()
{
 $result=mysql_query("SELECT * FROM gestion_planes_operativos WHERE cod_direccion=$_GET[seleccionado]")or die();
   //mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_2' name='plan_operativo' onchange='carga_objetivo_operativo()'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if(strlen($row[2])>50)
	  {
	  	$cad=substr($row[2],0,50);
		$cad=$cad.'...';
	  }
      echo "<option value='".$row[1]."'>  ".$row[1]."  - ".$cad."</option>";
   }         
   echo "</select>";
}


function select_objetivos_estrategicos_direccion()
{
if ($_GET[seleccionado]<>"")
{
$res=mysql_query("SELECT cod_plan_e_dir FROM gestion_plan_e_o_dir WHERE cod_plan_o_dir=$_GET[seleccionado]")or die();
$row=mysql_fetch_array($res);
$seleccionado=$row["cod_plan_e_dir"]; 

$result=mysql_query("SELECT * FROM gestion_obj_estrategicos_direcciones AS a inner JOIN gestion_obje_objo_dir AS b ON a.codigo = b.cod_obj_e_dir WHERE b.cod_obj_o_dir=$_GET[codigo] and a.cod_plan_e_dir='$seleccionado'")or die();


$result1=mysql_query("SELECT * FROM gestion_obj_estrategicos_direcciones where codigo not in (SELECT a.codigo FROM gestion_obj_estrategicos_direcciones AS a inner JOIN gestion_obje_objo_dir AS b ON a.codigo = b.cod_obj_e_dir WHERE b.cod_obj_o_dir=$_GET[codigo] and a.cod_plan_e_dir='$seleccionado') and cod_plan_e_dir='$seleccionado'")or die();


  // mysql_close($link);
   echo "<table width='75%' border='0'>"; 
   //muestra planes que SI estan vinculados MARCADOS
    while($row=mysql_fetch_row($result))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_obj_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)' checked>".$row[2]."</td>";
  echo "</tr>";
  } 
     //muestra planes que NO estan vinculados
  while($row=mysql_fetch_row($result1))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_obj_estrategico' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)'>".$row[2]."</td>";
  echo "</tr>";
  } 
echo "</table>";
}
}

function select_admin_objetivos_estrategicos_org()
{
$result=mysql_query("SELECT * FROM gestion_planes_estrategicos WHERE codigo_organizacion=$_GET[seleccionado]")or die();
  // mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_1' name='direccion' onchange='carga_objetivo()'>";
   echo "<option value='0'>Elige....</option>";
  
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentors y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if(strlen($row[2])>50)
	  {
	  $cad=substr($row[2],0,50);
	  $cad=$cad.'...';
	  }
      echo "<option value='".$row[1]."'> ".$row[1]."-".$cad."</option>";
   }         
   echo "</select>";
}

function select_admin_objetivos_estrategicos_direcciones()
{
$result=mysql_query("SELECT * FROM gestion_planes_estrategicos_direcciones WHERE cod_direccion=$_GET[seleccionado]")or die();
  // mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_2' name='plan' onChange='carga_objetivo()'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentors y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if (strlen($row[2])>50)
	  {
	  $cad=substr($row[2],0,50);
	  $cad=$cad.'...';
	  }
      echo "<option value='".$row[1]."'> ".$row[1]. "-" .$cad."</option>";
   }         
   echo "</select>";
   }
   
   function select_admin_plan_operativo()
   {
    $result=mysql_query("SELECT * FROM gestion_planes_operativos WHERE cod_direccion=$_GET[seleccionado]")or die();
   //mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_2' name='plan_operativo' onchange='carga_objetivo()'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if (strlen($row[2])>100)
	  {
	  $cad=substr($row[2],0,100);
	  $cad=$cad.'...';
	  }
      echo "<option value='".$row[1]."'> ".$row[1]."-".$cad."</option>";
   }         
   echo "</select>";
   }
   
   function select_plan_operativo_actividad()
   {
   $result=mysql_query("SELECT * FROM gestion_planes_operativos WHERE cod_direccion=$_GET[seleccionado]")or die();
  // mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_2' name='plan_operativo' onchange='carga_objetivo_operativo()'>";
   echo "<option value='0'>Elige Plan....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if(strlen($row[2])>50)
	  {
	  	$cad=substr($row[2],0,50);
		$cad=$cad.'...';
	  }
      echo "<option value='".$row[1]."'>  ".$row[1]."  - ".$cad."</option>";
   }         
   echo "</select>";
   }
   
   
   
   function select_objetivos_operativos_impacto()
   {
   $result=mysql_query("SELECT * FROM gestion_obj_operativos AS a inner JOIN gestion_obj_operativos_actividades AS b ON a.codigo = b.cod_obj_operativo WHERE b.cod_actividad=$_GET[codigo] and a.cod_plan_o_dir= $_GET[seleccionado]")or die();


$result1=mysql_query("SELECT * FROM gestion_obj_operativos where codigo not in (SELECT a.codigo FROM gestion_obj_operativos AS a inner JOIN gestion_obj_operativos_actividades AS b ON a.codigo = b.cod_obj_operativo WHERE b.cod_actividad=$_GET[codigo] and a.cod_plan_o_dir=$_GET[seleccionado]) and cod_plan_o_dir=$_GET[seleccionado]")or die();
  

 
  //mysql_close($link);
   echo "<table width='75%' border='0'>"; 
   //muestra objetivos que SI estan vinculados MARCADOS

    while($row=mysql_fetch_row($result))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_obj_operativo' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)' checked>".$row[2]."</td>";
  echo "</tr>";
  } 
 
     //muestra planes que NO estan vinculados
  while($row=mysql_fetch_row($result1))
   {
   echo "<tr>";
   $row[2]=htmlentities($row[2]);
   echo "<td> <input type='checkbox' name='cod_obj_operativo' value='".$row[1]."' onchange='crear_vinculo(this.value, this.checked)'>".$row[2]."</td>";
  echo "</tr>";
  } 
  
  echo "</table>";
   }
   
   function select_admin_plan_operativo_actividad()
   {
   $result=mysql_query("SELECT * FROM gestion_planes_operativos WHERE cod_direccion=$_GET[seleccionado]")or die();
   //mysql_close($link);

   // Comienzo a imprimir el select
   echo "<select class='combo' id='select_2' name='plan_operativo' onchange='carga_actividad()'>";
   echo "<option value='0'>Elige....</option>";
   while($row=mysql_fetch_row($result))
   {
      // Paso a HTML acentos y ñ para su correcta visualizacion
      $row[2]=htmlentities($row[2]);
      // Imprimo las opciones del select
	  $cad=$row[2];
	  if (strlen($row[2])>100)
	  {
	  $cad=substr($row[2],0,100);
	  $cad=$cad.'...';
	  }
      echo "<option value='".$row[1]."'> ".$row[1]."-".$cad."</option>";
   }         
   echo "</select>";
    }


function select_actividad_fase()
{
$result=mysql_query("SELECT * FROM gestion_fases AS a inner JOIN gestion_relacion_actividades_fases AS b ON a.id = b.precedida WHERE b.fase=$_GET[codigo] and a.id<>$_GET[codigo] and a.cod_actividad= $_GET[seleccionado]")or die();


$result1=mysql_query("SELECT * FROM gestion_fases where id not in (SELECT a.id FROM gestion_fases AS a inner JOIN gestion_relacion_actividades_fases AS b ON a.id = b.precedida WHERE b.fase=$_GET[codigo] and a.id<>$_GET[codigo] and a.cod_actividad=$_GET[seleccionado]) and cod_actividad=$_GET[seleccionado] and id<>$_GET[codigo]")or die();
  

 
  //mysql_close($link);
   echo "<table width='75%' border='0'>"; 
   //muestra objetivos que SI estan vinculados MARCADOS

    while($row=mysql_fetch_row($result))
   {
   echo "<tr>";
   $row[1]=htmlentities($row[1]);
   echo "<td> <input type='checkbox' name='cod_fase' value='".$row[0]."' onchange='crear_vinculo(this.value, this.checked)' checked>".$row[1]."</td>";
  echo "</tr>";
  } 
       //muestra planes que NO estan vinculados
  while($row=mysql_fetch_row($result1))
   {
   echo "<tr>";
   $row[1]=htmlentities($row[1]);
   echo "<td> <input type='checkbox' name='cod_obj_operativo' value='".$row[0]."' onchange='crear_vinculo(this.value, this.checked)'>".$row[1]."</td>";
  echo "</tr>";
  } 
  echo "</table>";
}
mysql_close($link);
?> 
