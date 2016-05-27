﻿<?php 
ob_start();
$style = '<link href="/Olimpiadas2016/produto/codigo/style/bootstrap-social.css" rel="stylesheet">';
include("../include/cabecalho.php"); 

if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
}

require_once("../include/conexaoBD.php"); 

include_once("google_login.php");

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}

if (isset($_POST['username'])){

    if (empty($_POST['username'])){
        $msg = "Por favor informe o usuário.";
    }
    elseif (empty($_POST['senha'])){
        $msg = "Por favor informe a senha.";
    }
    else {
        $sql = "select email, senha, perfil from usuario where email = ?";
        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $username = $_POST['username'];

            $stmt->bind_param('s', $username);
            $stmt->execute();

            $result = $stmt->get_result(); 

            $linha = $result->fetch_assoc(); 
            if ($linha){
                if ($_POST['senha'] == $linha['senha']){
                    $_SESSION['login'] = $linha['email'];
                    $_SESSION['perfil'] = $linha['perfil'];

                    header("Location: ../index.php");  
                }
                else {
                    $msg = "Nome de usuário ou senha incorretos.";
                }
            }
            else {
                $msg = "Esse usuário não está cadastrado.";
            }
            $stmt->close(); 
        }
    }
}
$conn->close();
ob_end_flush();
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

                        <?php if(isset($msg)){ echo "<div class='alert alert-danger col-sm-12'>".$msg."</div>"; } ?>

                        <form id="loginform" action="" class="form-horizontal" role="form" method="post">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="email" class="form-control" name="username" value="" placeholder="Email" autofocus required>                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" maxlength="8" type="password" class="form-control" name="senha" placeholder="Senha" required>
                            </div>
                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                <input id="btn-login" type="submit" class="btn btn-success" value="Entrar">
                                <a href="<?php echo $authUrl ?>" class="btn btn-social btn-google-plus">
                                    <i class="fa fa-google-plus"></i> Login com Google
                                </a>
                                <a class="btn btn-social btn-facebook">
                                  <i class="fa fa-facebook"></i> Login com Facebook
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Você ainda não tem uma conta?
                                    <a href="/Olimpiadas2016/produto/codigo/usuario/cadastrar.php#cadastrar" class="text-info">
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
