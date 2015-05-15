<?php
include '../Conexaobd.php';

$term=$_GET['q'];

$sql_terminalidade = Select("select max(idterminalidade) id from terminalidade");
$rs_mt=  mysql_fetch_array($sql_terminalidade);
$max_id=$rs_mt['id']+1;
$sql_terminalidade = Select("insert into terminalidade(idterminalidade,nome) value($max_id,'$term')");
                      
 $sql_terminalidade = Select("select*from terminalidade where idterminalidade>0");
  $terminalidade="";
                         while ($rs = mysql_fetch_array($sql_terminalidade)) {
                         $nome=$rs['nome'];
                         $id=$rs['idterminalidade'];
                            $terminalidade.="<input id='terminalidade$id' name='terminalidade$id' value=' $nome ' readonly='readonly' style='width:220px; height:22px'>
                           
                           
                                <a href='# $id' onclick='excluir(this.href)'><img src='../../imagens/excluir.png' style='widith: 4%; height: 4%'></a>
                                <a href='# $id' onclick='alterar(this.href)'><img src='../../imagens/alterar.png' style='widith: 4%; height: 4%'></a><br>
                          ";
                        }
                        
                        echo $terminalidade;