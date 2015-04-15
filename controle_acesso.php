<?php
	
	include_once ("banco/banco.php");

	class Controle_acesso{

		private $b;
		
		function __construct(){
			$this -> b = new Database();
			session_start();
		}

		function login($id){
			$_SESSION["id"] = $id;
		}

		function esta_logado(){
			if(isset($_SESSION["id"])) return true;
			else return false;
		}

		function is_dono_perfil($id){
			if(isset($_SESSION["id"]) && $id == $_SESSION["id"]) return true;
			else return false;
		}

		function tem_acesso($id,$q){
			$stmt =  $this -> b ->busca($q,$vet);
		    while($rs = $stmt->fetch(PDO::FETCH_OBJ)) if(isset($_SESSION["id"]) && $_SESSION["id"] == $id) return true;
		    return false;	
		}

		function deslogar(){
			unset($_SESSION["id"]);
		}
	}
?>