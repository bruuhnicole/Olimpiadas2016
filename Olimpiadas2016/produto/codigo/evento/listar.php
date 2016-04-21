<?php
include("../include/cabecalho.php"); 
?>
    <!--Listar-->
    <div class="section scrollspy" id="eventos">
        <div class="container">
            <div class="row">
                <h2><b>Eventos</b></h2>
                <div class="row">
                    <a href="./cadastrar.html#cadastro" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Cadastrar Evento</a>
                </div>
                <br />
                <div class="row">
                    <fieldset>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td><b>Evento</b></td>
                                        <td><b>Modalidade</b></td>
                                        <td><b>Data</b></td>
                                        <td><b>Hora</b></td>
                                        <td><b>Editar</b></td>
                                        <td><b>Excluir</b></td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Fases de grupo masculina e/ou feminina (4 jogos)</td>
                                    <td>Vôlei de Praia</td>
                                    <td>07/08/2016</td>
                                    <td>10:00</td>
                                    <td><a href="./editar.html#edicao" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td><a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                                <tr>
                                    <td>Primeira fase feminino (2 jogos)</td>
                                    <td>Futebol</td>
                                    <td>20/08/2016</td>
                                    <td>15:00</td>
                                    <td><a href="./editar.html#edicao" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td><a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <?php include("../include/rodape.php"); ?>
