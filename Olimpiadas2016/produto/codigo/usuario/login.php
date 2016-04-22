<?php
include("../include/cabecalho.php"); 
?>
<!--Login-->
<section id="login" class="about">
    <div  class="container">
        <div class="row">
            <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <h2 class="text-center">Login</h2>
                <hr class="small">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Entrar</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" role="form">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Email">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="senha" placeholder="Senha">
                            </div>
                            <div class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                  <a id="btn-login" href="#" class="btn btn-success">Entrar  </a>

                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Você ainda não tem uma conta?
                                    <a href="#" class="text-info">
                                        Cadastre-se aqui!
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>     
            </div>                     
        </div>  
    </div>

</div>

</div>
</section>
<?php include("../include/rodape.php"); ?>
