<?php

include("../include/cabecalho.php");
include("../include/autentificador.php"); 
include("../include/conexaoBD.php");

    $msg = "";
    $email = null;
    
    if ( !empty( $_SESSION['login'])) {
        $email = $_SESSION['login'];
    }
    
    if ( null==$email ) {
        header("Location: ../login.php");
    }
    
    if ( !empty($_POST)) {

        $nome = utf8_encode(htmlspecialchars($_POST['nome']));
        $senha = utf8_encode(htmlspecialchars($_POST['senha']));
        $perfil = utf8_encode(htmlspecialchars($_POST['perfil']));
        $cpf = utf8_encode(htmlspecialchars($_POST['cpf']));
        $dataNasc = utf8_encode(htmlspecialchars($_POST['data']));
        $email = utf8_encode(htmlspecialchars($_POST['email']));
        $logradouro = utf8_encode(htmlspecialchars($_POST['logradouro']));
        $numero = utf8_encode(htmlspecialchars($_POST['num']));
        $bairro = utf8_encode(htmlspecialchars($_POST['bairro']));
        $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
        $estado = utf8_encode(htmlspecialchars($_POST['estado']));
        $pais = utf8_encode(htmlspecialchars($_POST['pais']));
        
        
        $sql = "select * from usuario where email = ? ";
        echo $sql;
        // aqui estou salvando alterações. Antes há um teste de usuário.
        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('s', $email);
            
            $stmt->execute();   
            $result = $stmt->get_result(); 
            $linha = $result->fetch_assoc(); 
            if ($linha){
                $msg = "Esse usuário já existe.";
            }
            else{
                $sql = "UPDATE usuario SET email = ?, senha = ?, nome = ?, perfil= ?, cpf=? , dataNasc=? , logradouro =?, numero=?, bairro=?, cidade=?, estado=?, pais=? WHERE email = ?";
               
                $stmt = $conn->prepare($sql); 
                if ($stmt){
                    $stmt->bind_param('ssssssssssss', $nome, $senha, $perfil, $cpf, $dataNasc, $email, $logradouro, $numero, $bairro, $cidade, $estado, $pais);
                    
                    $stmt->execute();   
                    if(!$stmt->errno){
                        if ($stmt->affected_rows == 0) {
                            $msg = "Nenhum registro foi alterado!"; 
                        }
                            
                        header("Location: ./editar.php?msg=$msg");
                    }else{
                        echo $stmt->error; //retorna a descricao do erro
                        echo "<p><a href=\"./editar.php\">Retornar</a></p>\n";
                    }
                }
            }
            
            $stmt->close();             
        }
        else{
            echo "Prepare falhou";
        }
        
    } else {
        $sql = "select * from usuario where email = ?";

        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('s', $email);
            
            $stmt->execute();   
            $result = $stmt->get_result(); 
            $linha = $result->fetch_assoc(); 
            if ($linha){
                $email = $linha['email'];
                $senha = $linha['senha'];
                $nome = $linha['nome'];
                $perfil = $linha['perfil'];
                $cpf = $linha['cpf'];
                $dataNasc = $linha['dataNasc'];
                $logradouro = $linha['logradouro'];
                $numero = $linha['numero'];
                $bairro = $linha['bairro'];
                $cidade = $linha['cidade'];
                $estado = $linha['estado'];
                $pais = $linha['pais'];
            }
        }
    }
    
    $conn->close();
?>
    <!--Editar-->
    <div id="editar" class="section scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div>
                        <h1>Editar Dados Pessoais</h1>
                        <form class="pure-form pure-form-stacked" action="editar.php" method="post">
                            <fieldset>
                                <legend>Preencha os dados</legend>
                                <div class="form-group">
                                    <label>Nome Completo</label>
                                    <input type="text" style="width:600px;" class="form-control" value="<?php echo !empty($nome)?$nome:'';?>" name="nome" placeholder="Nome Completo..." required size="50px">
                                </div>
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" style="width:160px;" class="form-control" value="<?php echo !empty($cpf)?$cpf:'';?>"name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" size="15px" required>
                                </div>
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="date" style="width:160px;" class="form-control" value="<?php echo !empty($dataNasc)?$dataNasc:'';?> "name="data" maxlenght="10" placeholder="XX/XX/XXXX" required>
                                </div>
                                <div class="form-group">
                                    <label>Logradouro</label>
                                    <input type="text" style="width:600px;" class="form-control" value="<?php echo !empty($logradouro)?$logradouro:'';?> "name="logradouro" placeholder="Av., Rua..." required>
                                </div>
                                <div class="form-group">
                                    <label>Nº</label>
                                    <input type="text" style="width:100px;" class="form-control" value="<?php echo !empty($numero)?$numero:'';?>" name="num" placeholder="Nº..." required>
                                </div>
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" style="width:500px;" class="form-control" value="<?php echo !empty($bairro)?$bairro:'';?> "name="bairro" placeholder="Bairro..." required>
                                </div>
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" style="width:500px;" class="form-control" value="<?php echo !empty($cidade)?$cidade:'';?>" name="cidade" placeholder="Cidade..." required>
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select style="width:70px;" class="form-control" name="estado">
                                        <option value="AC">AC</option>
                                        <option value="AL">MG</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" style="width:300px;" class="form-control" value="<?php echo !empty($pais)?$pais:'';?>" name="pais" placeholder="País..." required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" style="width:500px;" class="form-control" value="<?php echo !empty($email)?$email:'';?>" name="email" placeholder="nome@nome.com" required>
                                </div>
                                <input type="submit" value="Salvar">
                            </fieldset>
                        </form>
                        </br>
                        <form class="pure-form pure-form-stacked">
                            <fieldset>
                                <legend>Trocar Senha</legend>
                                <div class="form-group">
                                    <label>Senha Antiga</label>
                                    <input type="password" style="width:180px;" class="form-control" name="senha" maxlength="6" placeholder="Máximo 6 caracteres..." required>
                                </div>
                                <div class="form-group">
                                    <label>Nova Senha</label>
                                    <input type="password" style="width:180px;" class="form-control" name="nova_senha" maxlength="6" placeholder="Repita a Senha..." required><br>
                                </div>
                                <input type="submit" value="Alterar Senha">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include("../include/rodape.php"); ?>