<?php
include("../include/cabecalho.php"); 
?>
    <!--Login-->
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Login</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <form>
                        <fieldset>
                            <legend>Preencha seus dados para logar:</legend>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>E-mail </label>
                                    <input type="email" name="email" placeholder="nome@nome.com" required="" size="50px">
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Senha </label>
                                    <input type="password" name="senha" maxlength="6" placeholder="Senha..." required="" size="50px">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <input type="submit" value="Entrar">
                            </div>
                            <br><br>
                            <div class="row">
                                <a id="esqueci_senha" href="esqueci_minha_senha.html#esqueci">Esqueci Minha Senha</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
   <?php include("../include/rodape.php"); ?>
