<?php
include("../include/cabecalho.php"); 
?>
    <!--Cadastrar-->
    <div class="container" id="cadastro">
        <h2><b>Cadastro de evento RIO 2016</b></h2>
        <form class="pure-form pure-form-stacked" method="post">
            <!--Descrição do evento-->
            <fieldset>
                <legend>Dados do evento</legend>
                <div class="form-group">
                    <label>Nome do Evento</label>
                    <input type="text" style="width:300px;" class="form-control" name="nome" placeholder="Nome do Evento" required size="50px">
                </div>
                <div class="form-group">
                    <label for="horario">Horário: </label>
                    <input style="width:100px;" class="form-control" type="text" name="horario">
                    <label>Data de inicio: </label>
                    <input style="width:160px;" class="form-control" type="date" name="dataInicio" placeholder="dd/mm/yyyy">
                    <label>Data de fim: </label>
                    <input style="width:160px;" class="form-control" type="date" name="dataFim" placeholder="dd/mm/yyyy">
                    <label for="ingresso">Quantidade de ingressos: </label>
                    <input style="width:70px;" class="form-control" type="number" name="ingresso">
                </div>
            </fieldset>

            <!-- Modalidade -->
            <fieldset>
                <legend>Esporte</legend>
                <div class="form-group">
                    <label>Descrição </label>
                    <input type="text" style="width:300px;" class="form-control" name="nome" placeholder="Descrição" required size="50px">
                </div>
                <div class="form-group">
                    <label for="modalidade">Modalidade:</label>
                    <select style="width:150px;" class="form-control" name="modalidade">
                        <option value="vp">Vôlei de praia</option>
                        <option value="vo">Voleibol</option>
                        <option value="ga">Ginástica artística</option>
                        <option value="fu">Futebol</option>
                    </select>
                </div>
            </fieldset>
            <br />
            <!-- Descrição do lugar -->
            <fieldset>
                <legend>Dados de Endereço</legend>
                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input style="width:400px;" class="form-control" type="text" name="rua">
                </div>
                <div class="form-group">
                    <label for="numero">Numero:</label>
                    <input style="width:80px;" class="form-control" type="number" name="numero" size="4">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro: </label>
                    <input style="width:350px;" class="form-control" type="text" name="bairro">
                </div>
                <div class="form-group">
                    <label for="cep">CEP: </label>
                    <input style="width:150px;" class="form-control"name="cep">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade: </label>
                    <input style="width:300px;" class="form-control" type="text" name="cidade">
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select style="width:180px;" class="form-control" name="estado">
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="ro">Rondônia</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="se">Sergipe</option>
                        <option value="sp">São Paulo</option>
                        <option value="to">Tocantins</option>
                    </select>
                </div>
            </fieldset>
            <br />
            <div class="row center-align">
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </div>
        </form>
    </div>
    <?php include("../include/rodape.php"); ?>