<html>
    <head>


        <meta charset="UTF-8">

        <title>Cadastro Area de conhecimento</title>
        <?php
        include_once("controle_acesso.php");
        $c = new controle_acesso();

        include_once("banco/banco.php");
        ?>

    <html>
        <?php include("head.html"); ?>	
        <body>
            <div class="container panel panel-default">
                <?php include("nav.html"); ?>
                <div class="panel panel-default jumbotron">
                    <!--//#############################################################  COLUNA 1 ############################################################################### -->            

                        <!--tabela de cadastro-->

                        <div class="input-group"> 
                            <table  >
                                <tr>
                                <rt>
                                    <label>Nome</label> <input type="text"  id="area_nome" style="width:220px; height:22px">
                                    <label>Cigla</label> <input type="text"  id="area_sigla" style="width:220px; height:22px">
                                    <button  onclick='cadastra_area()' >Cadastrar</button>
                                </rt>




                                </tr>

                            </table>
                            <br><br>
<div id='areas'>
    
                            <table >
                               
                                <tr>
                                <th>SIGLA</th>
                                <th>ÁREA</th>
                                </tr>      
                                    <?php
                                    $sql = "select sigla_area sigla,id_area id,nome_area nome from area ORDER BY sigla_area";
                                    $b = new Database();
                                    $stmt = $b->busca($sql);
                                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                        ?>

                                        <tr>
                                        <th><input id='<?php echo "area" . $rs->id; ?>' name='<?php echo "area" . $rs->id; ?>' value='<?php echo $rs->sigla ?>' readonly='readonly' style='width:220px; height:22px'></th>
                                        <th><input id='<?php echo "area" . $rs->id; ?>' name='<?php echo "area" . $rs->id; ?>' value='<?php echo $rs->nome ?>' readonly='readonly' style='width:220px; height:22px'></th>
                                        <th><a href="#<?php echo $rs->id; ?>" onclick="excluir_area(this.href)"><img src="imagens/excluir.png" style="widith: 10%; height: 10%"></a></th>
                                        <th><a href="#" name="<?php echo $rs->id; ?>" onclick="alterar_area(this.name)"><img src="imagens/alterar.png" style="widith: 10%; height: 10%"></a></th>
                                        </tr>

                                    <?php } ?>
                               

                            </table>
     </div>
                        </div>

                    





                    <div id="fechar"></div>
                    <div id="white_content">
                        <a href = "javascript:void(0)" onclick = "document.getElementById('white_content').style.display = 'none';
                                document.getElementById('black_overlay').style.display = 'none'"><strong style="float:right"><img src="imagens/fechar.png" style="width:5%; height: 8%;float:right"/> </strong></a>.

                        <div id="prog" style="position: relative; left: 10%;top: 10% ;opacity: 1.0;  width: 90%; height: 400px;  overflow: hidden;" >



                            <label>Digite o novo nome da Terminalidade e click em <b>ALTERAR</b><br> Alterar: "+area+"<br><br></label>
                            <BR><input type='text' id='nova_area' value='Digite o novo nome ' onfocus=this.value = '';>
                            <input type='text' id='nova_sigla' value='Digite a nova sigla' onfocus=this.value = '';>

                            <button onclick="finaliza_alterar_area()">Alterar</button>

                        </div>



                    </div>

                    <div id="black_overlay"></div>


                </div>



            </div>





        </body>
    </html>

