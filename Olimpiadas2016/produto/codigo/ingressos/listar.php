<?php
include("../include/cabecalho.php"); 
include("../include/autentificador.php");
require_once("../include/conexaoBD.php");

$sql2 = "select DATE(dataInicio) as data from Evento group by data ASC"; 

$datas = $conn->query($sql2);

?>
    <!--Comprar ingressos-->
    <div id="comprar" class="container">
        <h2><b>Eventos Olimpíadas Rio 2016</b></h2>

        <?php 
             while($row2 = $datas->fetch_assoc()) { 
                    $sql = "select codEvento, DATE(dataInicio) as data, descricao, local, cidade, TIME_FORMAT(dataInicio, '%H:%i') as horario,
                     nome from evento inner join modalidade on evento.codModalidade = modalidade.codModalidade 
                    and DATE(dataInicio)= '".$row2['data']."' order by dataInicio ASC"; 
            
            $result = $conn->query($sql);
            echo '<h3>'.date('d/m/Y', strtotime($row2['data'])).'</h3>'; 

            while($row = $result->fetch_assoc()){
                echo '<hr><p class="lead"><b>'.$row['descricao'].'</b></p>';
                echo '<p><b>Local: </b>'.$row['local'].' - '.$row['cidade'].'</p>';
                echo '<p><b>Horário: </b>'.$row['horario'].'</p>';
                echo '<p><b>Evento: </b>'.$row['nome'].'</p>';
                echo "<a type='submit' class='btn btn-info' href='comprar.php?codigo=".htmlspecialchars($row['codEvento'])."#comprar'><span class='glyphicon glyphicon-shopping-cart'></span><span class='submit-text'> Comprar</span></a>";
            };           

        };?>
                        
    </div>
    <?php include("../include/rodape.php"); ?>