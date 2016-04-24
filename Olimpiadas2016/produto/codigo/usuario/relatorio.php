<?php
include("../include/cabecalho.php"); 
include("../include/autentificador.php");
require_once("../include/conexaoBD.php"); 

$sql = "select modalidade.descricao as modalidade, DATE(evento.dataInicio) as data, TIME(evento.dataInicio) as hora from evento join ingresso on evento.codEvento = ingresso.codEvento join modalidade on modalidade.codModalidade = evento.codModalidade join usuario on usuario.codUsuario = ingresso.codUsuario where email = ? order by data, hora";
$stmt = $conn->prepare($sql); 

if ($stmt){
    $email = $_SESSION['login'];

    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();
}

$sql2 = "select evento.nome as evento, DATE(evento.dataInicio) as data, TIME(evento.dataInicio) as hora from evento join ingresso on evento.codEvento = ingresso.codEvento join modalidade on modalidade.codModalidade = evento.codModalidade join usuario on usuario.codUsuario = ingresso.codUsuario where email = ? order by data, hora";
$stmt2 = $conn->prepare($sql2); 

if ($stmt2){

    $stmt2->bind_param('s', $email);
    $stmt2->execute();

    $result2 = $stmt2->get_result();
}

?>
    <!--Relatório-->
    <div class="section scrollspy" id="relatorio">
        <div class="container">
            <h1><b>Relatórios</b></h1>
            <h3><i>Por Modalidade </i></h3>
            <div class="row">
                <fieldset>
                    <?php 
                    if ($result->num_rows >0){
                        
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<thead><tr><th>Modalidade</th><th>Data</th><th>Hora</th></tr></thead>";
                        echo "<br>";
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>". $row['modalidade']. "</td>";
                            echo "<td>". date('d/m/Y', strtotime($row['data'])). "</td>";
                            echo "<td>". $row['hora']. "</td>";   
                        }
                        echo "</table>";
                    }
                    ?>
                </fieldset>
            </div>
        </div>
        <div class="container">
            <h3><i>Por Evento</i></h3>
            <div class="row">
                <fieldset>
                    <?php 
                    if ($result2->num_rows >0){
                        
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<thead><tr><th>Evento</th><th>Data</th><th>Hora</th></tr></thead>";
                        echo "<br>";
                        while($row2 = $result2->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>". $row2['evento']. "</td>";
                            echo "<td>". date('d/m/Y', strtotime($row2['data'])). "</td>";
                            echo "<td>". $row2['hora']. "</td>";   
                        }
                        echo "</table>";
                    }
                    ?>
                </fieldset>
            </div>
        </div>
    </div>
   <?php include("../include/rodape.php"); ?>