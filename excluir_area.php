<?php

 include_once("banco/banco.php"); 
 $b = new Database();

$id=$_GET['q'];

$sql_terminalidade ="delete from area where id=$id"; //insei
$b -> query($sql_terminalidade);
  

  
$sql_area = "select sigla_area sigla,id_area id,nome_area nome from area ORDER BY sigla_area";
 $stmt = $b->busca($sql_area);
  $area="";
  echo "Áreas Cadastradas: </br>";
                         while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                       
                         $cod=$rs->id;
                         $sigla=$rs->sigla;
                         $nome = $rs->nome;
                         
                            $area.="<input id='area$cod' name='area$cod' value='$sigla - $nome' readonly='readonly' style='width:220px; height:22px'>
                           
                           
                                <a href='# $cod' onclick='excluir_area(this.href)'><img src='imagens/excluir.png' style='widith: 4%; height: 4%'></a>
                                <a href='# $cod' onclick='alterar_area(this.href)'><img src='imagens/alterar.png' style='widith: 4%; height: 4%'></a><br>
                          ";
                        }
                        
                        echo $area;