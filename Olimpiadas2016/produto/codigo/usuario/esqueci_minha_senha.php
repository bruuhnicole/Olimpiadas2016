﻿<?php
include("../include/cabecalho.php"); 
?>
    <!--Esqueci Minha Senha-->
    <section id="esqueci">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Esqueci Minha Senha</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <form>
                        <fieldset>
                            <legend>Preencha seu e-mail para recuperar sua senha:</legend>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>E-mail </label>
                                    <input type="email" name="email" placeholder="nome@nome.com" required="" size="50px">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <input type="submit" value="Recuperar">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include("../include/rodape.php"); ?>