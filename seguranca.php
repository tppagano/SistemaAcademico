<?php
	
	class Seguranca{

		function __construct(){}
		
		function cripto($senha){
			return  hash('whirlpool', $senha);
		}

	}
	//include("index.php");
?>