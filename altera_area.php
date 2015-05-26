<?php

include_once("banco/banco.php");
$b = new Database();



if (isset($_GET["nova_sigla"])) {


    $sql_terminalidade = "update area set sigla_area='$_GET[nova_sigla]' where id_area='$_GET[area_antiga]'"; //insei
    $b->query($sql_terminalidade);
}

$sql_terminalidade = "update area set nome_area='$_GET[nova_area]' where id_area='$_GET[area_antiga]'"; //insei
$b->query($sql_terminalidade);


echo"    <meta HTTP-EQUIV='refresh' CONTENT='0; URL=area_conhecimento.php'>";
