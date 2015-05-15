<?php

include "banco.php";

$cod = $_POST["nomeTerm"];
$n_Nome = $_POST["n_Nome"];

$noquery = "update categoria_sala set nome ='$n_Nome' where id = $cod";

echo  $noquery;

noQuery($noquery);

?>
<script>
window.location = "interface_cadSala.php";

</script>

