<?php

include("../include/cabecalho.php");
include("../include/autentificador.php"); 
include("../include/conexaoBD.php");

    $email = null;
    
    if ( !empty( $_SESSION['login'])) {
        $email = $_SESSION['login'];
    }
    
    if ( null==$email ) {
        header("Location: ../login.php");
    }

    if ( !empty($_GET["msg2"])) {
        $msg2 = $_GET["msg2"];
    }

    if ( !empty($_GET["msg"])) {
        $msg = $_GET["msg"];
    }

    
    if ( !empty($_POST)) {

    	if(!empty($_POST["trocaSenha"])) 	{

    		$senha = $_POST["senha"];
    		$novaSenha = $_POST["nova_senha"];
    		
    		$sql = "select * from usuario where email = ? and senha = ?";
	        //testa se a senha está correta
	        $stmt = $conn->prepare($sql); 
	        if ($stmt){
	            $stmt->bind_param('ss', $email, $senha);
	            
	            $stmt->execute();   
	            $result = $stmt->get_result(); 
                $linha = $result->fetch_assoc(); 
	            if ($linha["senha"] != $senha){
	                $msg2 = "Senha antiga incorreta!";
                    die("<script>location.href = './editar.php?msg2=$msg2#senha'</script>");
	            }
	            else{
	            	$sql = "UPDATE usuario SET senha=? WHERE email = ?";
			        // troca senha
			        $stmt = $conn->prepare($sql); 
			        if ($stmt){
			            $stmt->bind_param('ss', $novaSenha, $email);
			            
			            $stmt->execute();
                        $msg2 = "Senha alterada com sucesso!";
                        die("<script>location.href = './editar.php?msg2=$msg2#senha'</script>");   
			        }
	            }
	        }
    	}
    	else{

	        $nome = utf8_encode(htmlspecialchars($_POST['nome']));
	        $dataNasc = utf8_encode(htmlspecialchars($_POST['data']));
	        $logradouro = utf8_encode(htmlspecialchars($_POST['logradouro']));
	        $numero = utf8_encode(htmlspecialchars($_POST['num']));
	        $bairro = utf8_encode(htmlspecialchars($_POST['bairro']));
	        $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
	        $estado = utf8_encode(htmlspecialchars($_POST['estado']));
	        $pais = utf8_encode(htmlspecialchars($_POST['pais']));
	        
	        
            $sql = "UPDATE usuario SET  nome = ?, dataNasc=? , logradouro =?, numero=?, bairro=?, cidade=?, estado=?, pais=? WHERE email = ?";
         
            $stmt = $conn->prepare($sql); 
            if ($stmt){
                $stmt->bind_param('sssssssss', $nome, $dataNasc, $logradouro, $numero, $bairro, $cidade, $estado, $pais, $email);
                
                $stmt->execute();   
                if(!$stmt->errno){
                    if ($stmt->affected_rows == 0) {
                        $msg = "Nenhum registro foi alterado!"; 
                    }
                    $msg = "Dados alterados com sucesso!";
                    die("<script>location.href = './editar.php?msg=$msg#editar'</script>");
                }else{
                    echo $stmt->error; //retorna a descricao do erro
                    echo "<p><a href=\"./editar.php\">Retornar</a></p>\n";
                }
            }	            
	            
	         $stmt->close();
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
                $nome = $linha['nome'];
                $cpf = $linha['cpf'];
                $dataNasc = date('Y-m-d',strtotime($linha['dataNasc']));
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
                        <form class="pure-form pure-form-stacked" action="editar.php#editar" method="post">
                            <fieldset>
                                <legend>Preencha os dados</legend>
                                <?php if(isset($msg)){ echo "<div class='alert alert-danger col-sm-12'>".$msg."</div>"; } ?>
                                <div class="form-group">
                                    <label>Nome Completo</label>
                                    <input type="text" style="width:600px;" class="form-control" value="<?php echo !empty($nome)?$nome:'';?>" name="nome" placeholder="Nome Completo..." required size="50px">
                                </div>
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" style="width:160px;" disabled class="form-control" value="<?php echo !empty($cpf)?$cpf:'';?>"name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" size="15px" required>
                                </div>
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="date" style="width:160px;" class="form-control" value="<?php echo isset($dataNasc)?$dataNasc:'';?>"name="data" maxlength="10" placeholder="XX/XX/XXXX" required>
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

                                        <?php if($estado == "AC") {?><option value="AC" selected>AC</option> <?php } else {?><option value="AC">AC</option> <?php }?>
                                        <?php if($estado == "AP") {?><option value="AP" selected>AP</option> <?php } else {?><option value="AP">AP</option> <?php }?>
                                        <?php if($estado == "AM") {?><option value="AM" selected>AM</option> <?php } else {?><option value="AM">AM</option> <?php }?>
                                        <?php if($estado == "BA") {?><option value="BA" selected>BA</option> <?php } else {?><option value="BA">BA</option> <?php }?>
                                        <?php if($estado == "CE") {?><option value="CE" selected>CE</option> <?php } else {?><option value="CE">CE</option> <?php }?>
                                        <?php if($estado == "DF") {?><option value="DF" selected>DF</option> <?php } else {?><option value="DF">DF</option> <?php }?>
                                        <?php if($estado == "ES") {?><option value="ES" selected>ES</option> <?php } else {?><option value="ES">ES</option> <?php }?>
                                        <?php if($estado == "GO") {?><option value="GO" selected>GO</option> <?php } else {?><option value="GO">GO</option> <?php }?>
                                        <?php if($estado == "MA") {?><option value="MA" selected>MA</option> <?php } else {?><option value="MA">MA</option> <?php }?>
                                        <?php if($estado == "MT") {?><option value="MT" selected>MT</option> <?php } else {?><option value="MT">MT</option> <?php }?>
                                        <?php if($estado == "MS") {?><option value="MS" selected>MS</option> <?php } else {?><option value="MS">MS</option> <?php }?>
                                        <?php if($estado == "MG") {?><option value="MG" selected>MG</option> <?php } else {?><option value="MG">MG</option> <?php }?>
                                        <?php if($estado == "PA") {?><option value="PA" selected>PA</option> <?php } else {?><option value="PA">PA</option> <?php }?>
                                        <?php if($estado == "PB") {?><option value="PB" selected>PB</option> <?php } else {?><option value="PB">PB</option> <?php }?>
                                        <?php if($estado == "PR") {?><option value="PR" selected>PR</option> <?php } else {?><option value="PR">PR</option> <?php }?>
                                        <?php if($estado == "PE") {?><option value="PE" selected>PE</option> <?php } else {?><option value="PE">PE</option> <?php }?>
                                        <?php if($estado == "PI") {?><option value="PI" selected>PI</option> <?php } else {?><option value="PI">PI</option> <?php }?>
                                        <?php if($estado == "RJ") {?><option value="RJ" selected>RJ</option> <?php } else {?><option value="RJ">RJ</option> <?php }?>
                                        <?php if($estado == "RN") {?><option value="RN" selected>RN</option> <?php } else {?><option value="RN">RN</option> <?php }?>
                                        <?php if($estado == "RS") {?><option value="RS" selected>RS</option> <?php } else {?><option value="RS">RS</option> <?php }?>
                                        <?php if($estado == "RO") {?><option value="RO" selected>RO</option> <?php } else {?><option value="RO">RO</option> <?php }?>
                                        <?php if($estado == "RR") {?><option value="RR" selected>RR</option> <?php } else {?><option value="RR">RR</option> <?php }?>
                                        <?php if($estado == "SC") {?><option value="SC" selected>SC</option> <?php } else {?><option value="SC">SC</option> <?php }?>
                                        <?php if($estado == "SP") {?><option value="SP" selected>SP</option> <?php } else {?><option value="SP">SP</option> <?php }?>
                                        <?php if($estado == "SE") {?><option value="SE" selected>SE</option> <?php } else {?><option value="SE">SE</option> <?php }?>
                                        <?php if($estado == "TO") {?><option value="TO" selected>TO</option> <?php } else {?><option value="TO">TO</option> <?php }?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" style="width:300px;" class="form-control" value="<?php echo !empty($pais)?$pais:'';?>" name="pais" placeholder="País..." required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" style="width:500px;" disabled class="form-control" value="<?php echo !empty($email)?$email:'';?>" name="email" placeholder="nome@nome.com" required>
                                </div>
                                <input type="submit" value="Salvar">
                            </fieldset>
                        </form>
                        </br>
                        <form id="senha" class="pure-form pure-form-stacked" action="editar.php#senha" method="post">
                            <fieldset>
                            <?php if(isset($msg2)){ echo "<div class='alert alert-danger col-sm-12'>".$msg2."</div>"; } ?>
                                <legend>Trocar Senha</legend>
                                <div class="form-group">
                                    <label>Senha Antiga</label>
                                    <input type="password" style="width:180px;" class="form-control" name="senha" maxlength="8" placeholder="Máximo 6 caracteres..." required>
                                </div>
                                <div class="form-group">
                                    <label>Nova Senha</label>
                                    <input type="password" style="width:180px;" class="form-control" name="nova_senha" maxlength="8" placeholder="Repita a Senha..." required><br>
                                </div>
                                <input type="submit" name="trocaSenha" value="Alterar Senha">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include("../include/rodape.php"); ?>