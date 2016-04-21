<?php
include("../include/cabecalho.php"); 
?>
    <!--Cadastro-->
    <div id="cadastrar" class="section scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div>
                        <h1>Cadastro</h1>
                        <form class="pure-form pure-form-stacked">
                            <fieldset>
                                <legend>Preencha os dados:</legend>
                                <div class="form-group">
                                    <label>Nome Completo</label>
                                    <input type="text" style="width:600px;" class="form-control" name="nome" placeholder="Nome Completo..." required size="50px">
                                </div>
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" style="width:160px;" class="form-control" name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" size="15px" required>
                                </div>
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="date" style="width:160px;" class="form-control" name="data" maxlenght="10" placeholder="XX/XX/XXXX" required>
                                </div>
                                <div class="form-group">
                                    <label>Logradouro</label>
                                    <input type="text" style="width:600px;" class="form-control" name="logradouro" placeholder="Av., Rua..." required>
                                </div>
                                <div class="form-group">
                                    <label>Nº</label>
                                    <input type="text" style="width:100px;" class="form-control" name="num" placeholder="Nº..." required>
                                </div>
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" style="width:500px;" class="form-control" name="bairro" placeholder="Bairro..." required>
                                </div>
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" style="width:500px;" class="form-control" name="cidade" placeholder="Cidade..." required>
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select style ="width:70px;" class="form-control" id="estado">
                                        <option>AC</option>
                                        <option>MG</option>
                                        <option>SP</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" style="width:500px;" class="form-control" name="email" placeholder="nome@nome.com" required>
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" style="width:180px;" class="form-control" name="senha" maxlength="6" placeholder="Máximo 6 caracteres..." required>
                                </div>
                                <div class="form-group">
                                    <label>Repetir Senha</label>
                                    <input type="password" style="width:180px;" class="form-control" name="repetir_senha" maxlength="6" placeholder="Repita a Senha..." required><br>
                                </div>
                                <input type="submit" value="Cadastrar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../include/rodape.php"); ?>
