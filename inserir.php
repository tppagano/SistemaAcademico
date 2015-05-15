<?php

include "banco.php";

$nome = $_POST["nome"];

$noquery = "insert into categoria_sala (nome) values ('$nome')";

noQuery($noquery);

?>


<script>
window.location = "interface_cadSala.php";

</script>
