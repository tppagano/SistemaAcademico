<!DOCTYPE html>

<!-- Esse Pode e do modelo para todas as outras paginas, com isso já adiciona o Nav bar, rodape e tambem o <head> do html com todas
	as importações necessarias

	Pagina do bootstrap para ver os componentes existentes e usa -los 

									http://getbootstrap.com/components/
	
	La pode ser varios exemplos que podem ser usados! Eles permitem que customize via CSS também. 
	Criem seus css na pasta css! E cada pessoas crie seu css! Não esqueçam de importar eles no arquivo head.html.

-->
<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {

?>

<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>


<?php
	}
?>