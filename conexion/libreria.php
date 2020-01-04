<?php
/*function Conectarse()
{
	if (!($link=mysql_connect("localhost","capepo","capepo")))
	{
		//echo "Error conectando a la base de datos.";
		exit();
	}
	if (!mysql_select_db("personal",$link))
	{
		//echo "Error seleccionando la base de datos.";
		exit();
	}
	return $link;
}

function Conectarse2()
{
	if (!($link=mysql_connect("localhost","capepo","capepo")))
	{
		//echo "Error conectando a la base de datos.";
		exit();
	}
	if (!mysql_select_db("escuela",$link))
	{
		//echo "Error seleccionando la base de datos.";
		exit();
	}
	return $link;
}

function Conectarse3()
{
	if (!($link=mysql_connect("192.168.50.2","capepo","capepo")))
	{
		//echo "Error conectando a la base de datos.";
		exit();
	}
	if (!mysql_select_db("administracion",$link))
	{
		//echo "Error seleccionando la base de datos.";
		exit();
	}
	return $link;
}

function conectarse_persistente()
{
	if (!($link=mysql_pconnect("localhost","root","root")))
	{
		return false;
		exit();
	}
	if (!mysql_select_db("personal",$link))
	{   return false;
		exit();
	}
	return $link;
}
function desconectar()
{
	mysql_close();
}*/

/*function verif_real($valor,$signo=3)
{
    if($signo==1)
        $patron = "/^[0-9]+(.[0-9]{1,2}|[0-9]*)$/";
    elseif($signo==2)
        $patron = "/^-[0-9]+(.[0-9]{1,2}|[0-9]*)$/";
    else
        $patron = "/^-?[0-9]+(.[0-9]{1,2}|[0-9]*)$/";
        
    if(!preg_match($patron,$valor))
        return true;
    else
        return false;
}


	function abrir_popup($url,$parametros)
	{
	?><script language="JavaScript">
	window.open("<?echo $url;?>","","<?echo $parametros;?>")
	</script><?
	}
	*/

function cambiaf_a_mysql($fecha)
    {
    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha; 
    }
    
function cambiaf_a_normal($fecha)
    {
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
	 } 
	 
/*function mysql_evaluate_array($query) 
	{
   $result = mysql_query($query);
   $values = array();
   for ($i=0; $i<mysql_num_rows($result); ++$i)
       array_push($values, mysql_result($result,$i));
   return $values;
}
*/
?>