<?php
include("../include/cabecalho.php"); 
include("../include/administrador.php");
require_once("../include/conexaoBD.php");

$msg = "";

$msg = isset($_GET['msg']) ? $_GET['msg']: "";
$sql = "select nome, descricao, codEvento, DATE_FORMAT(dataInicio, '%d/%m/%Y') as data, TIME_FORMAT(dataInicio, '%H:%i') as horario from evento natural join modalidade";
$result = $conn->query($sql); 
?>

    <!--Listar-->
    <div name="form-anchor" class="section scrollspy" id="eventos">
        <div class="container">
            <div class="row">
                <h2><b>Eventos</b></h2>
                <div class="row">
                    <a href="./cadastrar.php#cadastro" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Cadastrar Evento</a>
                </div>
                <br />
                <div class="row">
                    <fieldset>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <?php
                                if ($result->num_rows> 0) {                                   
                                
                                    echo "<thead><tr>";                                    
                                    echo  "<td><b>Evento</b></td>";
                                    echo  "<td><b>Modalidade</b></td>";
                                    echo  "<td><b>Data</b></td>";
                                    echo  "<td><b>Hora</b></td>";
                                    echo  "<td><b>Editar</b></td>";
                                    echo  "<td><b>Excluir</b></td>"; 
                                    echo "</tr></thead>";                                    

                                    while($row=$result->fetch_assoc())
                                    {                                         
                                        echo "<tr>";
                                        echo "<td>".$row['nome']."</td>";
                                        echo "<td>".$row['descricao']."</td>";
                                        echo "<td>".$row['data']."</td>"; 
                                        echo "<td>".$row['horario']."</td>"; 
                                        echo "<td><a href='./editar.php#editar' class='btn btn-success'><span class='glyphicon glyphicon-edit' ></td>";  
                                        echo "<td><a href='./deletar.php?codEvento=".htmlspecialchars($row['codEvento'])."' class='btn btn-danger'><span  class='glyphicon glyphicon-trash'></span></a></td>";                        
                                        echo "<tr>";
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <?php include("../include/rodape.php"); ?>
