<?php
include("include/cabecalho.php"); 

?>
<!-- About -->
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Vai Brasil!</h2>
                <p class="lead">A vez agora é nossa! Acompanhe tudo sobre as Olimpíadas 2016 no Brasil.</p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!-- Modadidade -->
<section id="modalidade" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2 class="text-center">Modalidades</h2>
                <hr class="small">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <a href="modalidade/volei-de-praia.php#volei-de-praia">
                                <img class="img-portfolio img-responsive" src="images/volei-de-praia.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="modalidade/volei-de-praia.php#volei-de-praia">Vôlei de praia</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <a href="modalidade/voleibol.php#voleibol">
                                <img class="img-portfolio img-responsive" src="images/voleibol.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="modalidade/voleibol.php#voleibol">Vôlei</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <a href="modalidade/futebol.php#futebol">
                                <img class="img-portfolio img-responsive" src="images/futebol.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="modalidade/futebol.php#futebol">Futebol</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <a href="modalidade/ginastica-artistica.php#ginastica-artistica">
                                <img class="img-portfolio img-responsive" src="images/ginastica.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="modalidade/futebol.php#futebol">Ginástica Artística</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!-- Calendário -->
<section id="calendario" class="services">
    <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
            <h2 class="text-center">Calendário <small>Agosto de 2016</small></h2>
            <hr class="small">
            <div class="text-center">
                <div class="btn-group">
                    <?php for ($i=3; $i <= 21; $i++) { 
                        echo '<a href="#evento-dia'.$i.'" class="btn btn-default" role="tab" data-toggle="tab">'.($i < 10 ? '0'.$i : $i).'</a>';
                    } ?>                   
                </div>                
            </div>
            <div class="tab-content">
                <?php 
                require_once("include/conexaoBD.php");

                for ($i=3; $i <= 21; $i++) { 
                    $sql = "select codEvento, descricao, local, cidade, TIME_FORMAT(dataInicio, '%H:%i') as horario, nome
                    from evento inner join modalidade on evento.codModalidade = modalidade.codModalidade 
                    and DAY(dataInicio) = ".$i." order by dataInicio ASC"; 

                    $result = $conn->query($sql);
                    //var_dump($result->fetch_assoc());

                    echo '<div role="tabpanel" class="tab-pane fade '.($i == 3 ? "in active" : "").'" id="evento-dia'.$i.'">';
                    echo '<h3>'.($i < 10 ? '0'.$i : $i).' de Agosto.</h3>'; 

                    while($row = $result->fetch_assoc()){
                        echo '<hr><p class="lead"><b>'.$row['descricao'].'</b></p>';
                        echo '<p><b>Local: </b>'.$row['local'].' - '.$row['cidade'].'</p>';
                        echo '<p><b>Horário: </b>'.$row['horario'].'</p>';
                        echo '<p><b>Evento: </b>'.$row['nome'].'</p>';
                        echo "<a type='submit' class='btn btn-info' href='ingressos/comprar.php?codigo=".htmlspecialchars($row['codEvento'])."#comprar'><span class='glyphicon glyphicon-shopping-cart'></span><span class='submit-text'> Comprar</span></a>";
                    };           

                    echo '</div>';

                };?>

            </div>
        </div>
    </div>
</section>

<!-- Belo Horizonte -->
<section id="bh" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2 class="text-center">Belo Horizonte</h2>
                <hr class="small">
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="bh/historia.php#historia">
                                <img style="width:100%" class="img-portfolio img-responsive" src="images/bh.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="bh/historia.php#historia">História</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="bh/atracoes.php#atracoes">
                                <img class="img-portfolio img-responsive" src="images/atracao.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="bh/atracoes.php#atracoes">Atrações Turísticas</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="bh/hoteis.php#hoteis">
                                <img class="img-portfolio img-responsive" src="images/hotel.jpg">
                            </a>
                            <div class="caption">
                                <h3><a href="bh/hoteis.php#hoteis">Hotéis</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<?php include("include/rodape.php"); ?>