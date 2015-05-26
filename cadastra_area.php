<?php

		include_once("banco/banco.php"); 
        $b = new Database();

$area=$_GET['q'];
$sigla=$_GET['s'];



$sql = "select max(id_area) id from area"; //selecionando o ultimo id inserido para determinar o próximo
$b = new Database();
$stmt = $b->busca($sql);
$rs_a = $stmt->fetch(PDO::FETCH_OBJ);
$max_id=($rs_a->id)+1;//incremento que define o nome id a ser inserido

$sql_INSERIR ="insert into area(id_area,nome_area,sigla_area) value($max_id,'$area','$sigla')"; //insei
$b -> query($sql_INSERIR);

                      
 $sql_area = "select sigla_area sigla,id_area id,nome_area nome from area ORDER BY sigla_area";
 $stmt = $b->busca($sql_area);
  $area="";
  
  
  echo "  <table >                              
                                <tr>
                                <th>SIGLA</th>
                                <th>ÁREA</th>
                                </tr> ";
                         while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                       
                         $cod=$rs->id;
                         $sigla=$rs->sigla;
                         $nome = $rs->nome;
                         
                            $area.=" <tr>
                                        <th><input id='area". $rs->id."' name='area". $rs->id."' value='".$rs->sigla."' readonly='readonly' style='width:220px; height:22px'></th>
                                        <th><input id='area" . $rs->id."' name='area" . $rs->id."' value='".$rs->nome."' readonly='readonly' style='width:220px; height:22px'></th>
                                        <th><a href=".$rs->id." onclick='excluir_area(this.href)'><img src='imagens/excluir.png' style='widith: 10%; height: 10%'></a></th>
                                        <th><a href=".'#'." name=".$rs->id." onclick='alterar_area(this.name)'><img src='imagens/alterar.png' style='widith: 10%; height: 10%'></a></th>
                                        </tr>
                          ";
                        }
                        
                        $area.="</table>";
                        echo $area;