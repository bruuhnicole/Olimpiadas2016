<?php
include("../include/cabecalho.php"); 
include("../include/autentificador.php");
?>
    <!--Comprar ingressos-->
    <div id="comprar" class="container">
        <h2><b>Ingressos Olimpíadas Rio 2016</b></h2>
        <div>
            <h3 class="promo-caption">07 de Agosto</h3><br>
            <h4 class="promo-caption"><b><u>Vôlei de Praia</u></b></h4><br>
            <p class="promo-caption"><b>Local:</b> Arena de Vôlei Praia</p>
            <p class="promo-caption"><b>Horário:</b> Arena de Vôlei Praia</p>
            <p class="promo-caption"><b>Eventos:</b> Fase de grupos masculina e/ou feminina (4 jogos)</p>
            <p class="promo-caption"><b>Preço:</b> R$ 120</p>
        </div>
        <form class="pure-form pure-form-stacked">
            <fieldset>
                <legend>Preencha os dados:</legend>
                <div class="form-group">
                    <label>Quantidade </label>
					<input style="width:80px" id="disabled" type="number">
                    <input disabled value="R$ 00,00" id="disabled" type="text" class="validate">
                </div>
                <div>
                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span class="submit-text">Comprar</span>
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    <?php include("../include/rodape.php"); ?>