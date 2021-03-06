    <?php

    include("../include/cabecalho.php"); 
    require_once("../include/conexaoBD.php");

    if (isset($_POST['email'])){

        $email = utf8_encode(htmlspecialchars($_POST['email']));

            //Uso de prepared statment
        $sql = "select * from usuario where email = ?";
        
        $stmt = $conn->prepare($sql); 
        if ($stmt){

            $stmt->bind_param('s', $email);
            
            $stmt->execute();   
            
            $result = $stmt->get_result(); 
            
            $linha = $result->fetch_assoc(); 
            
            if ($linha){
                $msg = "Esse e-mail já está cadastrado em nosso site.";
            }
            else{

                if($_POST['senha']==$_POST['repetir_senha']){
                    $nome = utf8_encode(htmlspecialchars($_POST['nome']));
                    $senha = utf8_encode(htmlspecialchars($_POST['senha']));
                    $perfil = "Comum";
                    $cpf = utf8_encode(htmlspecialchars($_POST['cpf']));
                    $dataNasc = utf8_encode(htmlspecialchars($_POST['data']));
                    $email = utf8_encode(htmlspecialchars($_POST['email']));
                    $logradouro = utf8_encode(htmlspecialchars($_POST['logradouro']));
                    $numero = utf8_encode(htmlspecialchars($_POST['num']));
                    $bairro = utf8_encode(htmlspecialchars($_POST['bairro']));
                    $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
                    $estado = utf8_encode(htmlspecialchars($_POST['estado']));
                    $pais = utf8_encode(htmlspecialchars($_POST['pais']));
                    $sql = "INSERT INTO USUARIO(nome, senha, perfil, cpf, dataNasc, email, logradouro, numero, bairro, cidade, estado, pais) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
                    
                    $stmt = $conn->prepare($sql); 
                    if ($stmt){
                        $stmt->bind_param('ssssssssssss', $nome, $senha, $perfil, $cpf, $dataNasc, $email, $logradouro, $numero, $bairro, $cidade, $estado, $pais);
                        
                        $stmt->execute();   
                        if(!$stmt->errno){
                            if ($stmt->affected_rows == 0) {
                                $msg = "Nenhum registro foi adicionado!"; 
                            }
                            
                            $_SESSION['login'] = $email;
                            $_SESSION['perfil'] = $perfil;

                            die("<script>location.href = '../index.php'</script>");
                        }else{
                                echo $stmt->error; //retorna a descricao do erro
                                echo "<p><a href=\"./login.php\">Retornar</a></p>\n";
                            }
                        }
                    }
                    else
                    {
                        $msg = "As senhas digitadas não coincidem!";
                    }
                }
                
                $stmt->close();             
            }
            else{
                $msg = "Prepare falhou";
            }
            
        }
        $conn->close();
        ?>


        <!--Cadastro-->
        <div id="cadastrar" class="section scrollspy">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div>
                            <h1>Cadastro</h1>
                            <form class="pure-form pure-form-stacked" action="cadastrar.php#cadastrar" method="post">
                                <fieldset>
                                    <legend>Preencha os dados:</legend>
                                    <?php if(isset($msg)){ echo "<div class='alert alert-danger col-sm-12'>".$msg."</div>"; } ?>
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" style="width:600px;" class="form-control" name="nome" placeholder="Nome Completo..." required size="50px">
                                    </div>
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" style="width:160px;" class="form-control" name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" 
                                        pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" size="15px" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" style="width:160px;" class="form-control" name="data" maxlength="10" placeholder="XX/XX/XXXX" required>
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
                                        <label>País</label>
                                        <input type="text" style="width:300px;" class="form-control" name="pais" placeholder="País..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select style ="width:70px;" class="form-control" name="estado">
                                            <option value="AC">AC</option>
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
                                        <label>E-mail</label>
                                        <input type="email" style="width:500px;" class="form-control" name="email" placeholder="nome@nome.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" style="width:180px;" class="form-control" name="senha" maxlength="8" placeholder="Máximo 6 caracteres..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Repetir Senha</label>
                                        <input type="password" style="width:180px;" class="form-control" name="repetir_senha" maxlength="8" placeholder="Repita a Senha..." required><br>
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
