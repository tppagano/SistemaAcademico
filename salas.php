<?php
    
    include_once("controle_acesso.php");
    $c = new controle_acesso();
    if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
    else {

?>
<html>
    <?php 
        include("head.html");
        include_once("banco/banco.php"); 
        $b = new Database();
    ?>      
    <body>

        <div class="container panel panel-default">
            <?php include("nav.html"); ?>
            <div class="container divCenter" align="center">

                <form onsubmit="return verifica()">
                    Pavilhão: <select class="form-control" id="sel_pav">
                        <option>Selecione</option>
                        <?php
                            
                            $sql="SELECT id, nome FROM pavilhao ORDER BY nome";
                            $stmt = $b ->busca($sql);
                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo "<option>".$rs -> nome."</option>";
                            }
                       ?>
                    </select><br>
                    Categoria: <select class="form-control" id="cat">
                        <option>Selecione</option>
                        <?php
                            $sql="SELECT id, nome FROM categoria_sala ORDER BY nome";
                            $stmt = $b ->busca($sql);
                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo "<option>".$rs -> nome."</option>";
                            }
                       ?>
                    </select><br>
                    Número: <input id="numero" class="form-control" type="number" min="0"><br>
                    Capacidade: <input id="capacidade" class="form-control" type="number" min="0"><br>
                   <br><button type="submit" value="Enviar" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div><!-- container-->
        <?php include("foot.html"); ?>
    </body>
</html>

</body>
</html>

<?php
    }
?>