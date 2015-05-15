<html>
    <head>


        <meta charset="UTF-8">

        <title>Cadastro Area de conhecimento</title>
  <?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	
//include("banco/banco.php");

?>

<html>
	<?php include("head.html"); ?>	
	<body>
		<div class="panel-default">
			<div class = "divCenter">

            <!--//#############################################################  COLUNA 1 ############################################################################### -->            
            <div align="left" id="cadastro"  >
                <form name="formulario" action="facade_cadastra_aluno.php" method="post" enctype="multipart/form-data" onsubmit="return sub();">
                    <!--tabela de cadastro-->

                    <table  >
                        <tr>
                            <th>
                                <label>Nome</label> <input type="text"  id="area_nome" style="width:220px; height:22px">
                                <label>Cigla</label> <input type="text"  id="area_sigla" style="width:220px; height:22px">
                            </th>

                            <th><a href='#' onclick='cadastra_area()'><img src='../../imagens/confirma.png' style='widith: 40%; height: 40%'></a></th>


                        </tr>

                    </table>
                    <th colspan="2" align="left">

                    <div id='areas'>
                        Áreas Cadastradas: </br>

                        <?php
                        $sql_area = mysql_query("select*from area where id>0");
                        while ($rs = mysql_fetch_array($sql_area)) {
                            ?>


                            <input id='<?php echo "area" . $rs["id"]; ?>' name='<?php echo "area" . $rs["id"]; ?>' value='<?php echo $rs['sigla'] ." - ". $rs['nome']?>' readonly='readonly' style='width:220px; height:22px'>
                            
                            <a href="#<?php echo $rs["id"]; ?>" onclick="excluir_area(this.href)"><img src="../../imagens/excluir.png" style="widith: 4%; height: 4%"></a>

                            <a href="#" name="<?php echo $rs["nome"]; ?>" onclick="alterar_area(this.name)"><img src="../../imagens/alterar.png" style="widith: 4%; height: 4%"></a><br>




                        <?php } ?>

                    </div>
                </form>

                <form action="altera_area.php" method="post">

                    <div id="area_altera" style="position: absolute;opacity: 1.0; top: 20%; left: 40%;    " >



                    </div>
                </form>

            </div> 






            <?php
            $codigo = 5;
            ?>

        </div>
</div>


        <!-- ############################################ RODAPÉ ##########################################################################-->
        <footer class="art-footer">
            <div class="art-footer-inner" >
                <div class="art-content-layout">
                    <div class="art-content-layout-row">

                        <div class="art-page-footer layout-item-0" style="width: 100%; position: absolute; top: 110%; left: -4%" id="foti">
                            <div style="position: relative; top: 80%;">

                                <a href="#topo" class="scroll"> <img  src="../../imagens/topo.jpg" border="0"  style="position: relative;  left: 440px; width:8%; height: 5%;   border: 1px solid black;"  /> </a>
                                <p>Desenvolvido por SILV@PROJECT <a href="https://www.facebook.com/pages/SILVAPROJECT/799545740061341"><img  src="../../imagens/silvaproject.jpg" border="0"  style=" width:5%; height:5%;  border: 1px solid black; "  /></a></p>
                            </div>
                        </div>

                    </div>
                </div>

        </footer>



<?php      
        ?>


    </body>
</html>