<?php
include "banco.php";
$terminalidade = $_POST["terminalidade"];

$nQuery = "delete from categoria_sala where nome = '$terminalidade';";
echo $nQuery;

noQuery($nQuery);

?>
<script>
 window.location = "interface_cadSala.php";
</script>
