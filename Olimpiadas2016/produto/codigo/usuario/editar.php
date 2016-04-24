<?php
include("../include/conexaoBD.php");
include("../include/cabecalho.php");
include("../include/autentificador.php"); 

    $msg = "";
    $codigoUsuario = null;
    
    if ( !empty($_GET['codigoUsuario'])) {
        $codigoUsuario = $_REQUEST['codigoUsuario'];
    }
    
    if ( null==$codigoUsuario ) {
        header("Location: editar.php");
    }
    
    if ( !empty($_POST)) {

        $nome = utf8_encode(htmlspecialchars($_POST['nome']));
        $senha = utf8_encode(htmlspecialchars($_POST['senha']));
        $perfil = utf8_encode(htmlspecialchars($_POST['perfil']));
        $cpf = utf8_encode(htmlspecialchars($_POST['cpf']));
        $dataNasc = utf8_encode(htmlspecialchars($_POST['dataNasc']));
        $email = utf8_encode(htmlspecialchars($_POST['email']));
        $logradouro = utf8_encode(htmlspecialchars($_POST['logradouro']));
        $numero = utf8_encode(htmlspecialchars($_POST['numero']));
        $bairro = utf8_encode(htmlspecialchars($_POST['bairro']));
        $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
        $estado = utf8_encode(htmlspecialchars($_POST['estado']));
        $pais = utf8_encode(htmlspecialchars($_POST['pais']));
        
        
        $sql = "select * from usuario where email = ? and codigoUsuario <> ?";
        
        // aqui estou salvando alterações. Antes há um teste de usuário.
        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('si', $email, $codigoUsuario);
            
            $stmt->execute();   
            $result = $stmt->get_result(); 
            $linha = $result->fetch_assoc(); 
            if ($linha){
                $msg = "Esse usuário já existe.";
            }
            else{
                $sql = "UPDATE usuario SET email = ?, senha = ? WHERE codigoUsuario = ?";
                $stmt = $conn->prepare($sql); 
                if ($stmt){
                    $stmt->bind_param('ssi', $email, $senha, $codigoUsuario);
                    
                    $stmt->execute();   
                    if(!$stmt->errno){
                        if ($stmt->affected_rows == 0) {
                            $msg = "Nenhum registro foi alterado!"; 
                        }
                            
                        header("Location: ./cadastro.php?msg=$msg");
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
        $sql = "select email, senha from usuario where codigoUsuario = ?";
        
        // aqui populando campos.
        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('i', $codigoUsuario);
            
            $stmt->execute();   
            $result = $stmt->get_result(); 
            $linha = $result->fetch_assoc(); 
            if ($linha){
                $email = $linha['email'];
                $senha = $linha['senha'];
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
                        <form class="pure-form pure-form-stacked">
                            <fieldset>
                                <legend>Preencha os dados</legend>
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
                                    <select style="width:70px;" class="form-control" id="estado">
                                        <option>AC</option>
                                        <option>MG</option>
                                        <option>SP</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" style="width:500px;" class="form-control" name="email" placeholder="nome@nome.com" required>
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