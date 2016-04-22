<?php
include("../include/cabecalho.php"); 
include("../include/autentificador.php");
?>
    <!--Relatório-->
    <div class="section scrollspy" id="relatorio">
        <div class="container">
            <h1><b>Relatórios</b></h1>
            <h3><i>Por Modalidade </i></h3>
            <div class="row">
                <fieldset>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><b>Modalidade</b></th>
                                    <th><b>Data</b></th>
                                    <th><b>Hora</b></th>
                                </tr>
                            <tbody>
                                <tr>
                                    <td>Vôlei de Praia</td>
                                    <td>07/08/2016</td>
                                    <td>10:00</td>
                                </tr>
                                <tr>
                                    <td>Futebol</td>
                                    <td>20/08/2016</td>
                                    <td>15:00</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="container">
            <h3><i>Por Evento</i></h3>
            <div class="row">
                <fieldset>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <td><b>Evento</b></td>
                                    <td><b>Data</b></td>
                                    <td><b>Hora</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fases de grupo masculina e/ou feminina (4 jogos)</td>
                                    <td>07/08/2016</td>
                                    <td>10:00</td>
                                </tr>
                                <tr>
                                    <td>Primeira fase feminino (2 jogos)</td>
                                    <td>20/08/2016</td>
                                    <td>15:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
   <?php include("../include/rodape.php"); ?>