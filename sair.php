<?php
	include("controle_acesso.php");
	$c = new controle_acesso();
	$c -> deslogar();
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>