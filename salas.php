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
                            
                            $sql="SELECT id_pavilhao, nome_pavilhao FROM pavilhao ORDER BY nome_pavilhao";
                            $stmt = $b ->busca($sql);
                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo "<option>".$rs -> nome_pavilhao."</option>";
                            }
                       ?>
                    </select><br>
                    Categoria: <select class="form-control" id="cat">
                        <option>Selecione</option>
                        <?php
                            $sql="SELECT id_categoria_sala,nome_categoria_sala FROM categoria_sala ORDER BY nome_categoria_sala";
                            $stmt = $b ->busca($sql);
                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo "<option>".$rs ->nome_categoria_sala."</option>";
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