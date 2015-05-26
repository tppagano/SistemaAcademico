<?php

$host= 'localhost';
$bd= 'root';
//$senhabd= 'q1w2e3r4';
$senhabd='';
$database = "salas";
	
function conectaBanco ()
{
	
    global $host, $bd, $senhabd, $database;
	
	$conexao = mysql_connect($host,$bd, $senhabd);
	
	mysql_select_db($database, $conexao);
	mysql_query("SET NAMES 'utf8';");	
	mysql_query("SET character_set_connection=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_database=utf8");
	mysql_query("SET character_set_server=utf8");
	mysql_query( "SET CHARACTER SET utf8");
	
	
	return $conexao;
}


function Select ($query)
{
	
	global $host, $bd, $senhabd, $database;
	
	$conexao = conectaBanco();
	$result = mysql_query($query, $conexao) or die (mysql_error());
	mysql_close($conexao);
	return $result;
}

function noQuery($nQuery)
{
	global $host, $bd, $senhabd, $database;
	$conexao = conectaBanco();
	mysql_query($nQuery,$conexao) or die (mysql_error());;	
	mysql_close($conexao);
}
?>
