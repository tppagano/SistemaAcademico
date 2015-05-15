<?php

$c -> pagina_anterior("pav");
		include_once("banco/banco.php"); 
        $b = new Database();


if(isset($_POST["nova_sigla"])) Select("update area set sigla='$_POST[nova_sigla]' where nome='$_POST[area_antiga]'");
 Select("update area set nome='$_POST[nova_area]' where nome='$_POST[area_antiga]'");
 


echo"    <meta HTTP-EQUIV='refresh' CONTENT='0; URL=area_conhecimento.php'>";
