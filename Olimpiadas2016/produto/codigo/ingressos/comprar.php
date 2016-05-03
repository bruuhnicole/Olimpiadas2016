<?php
include("../include/cabecalho.php"); 
include("../include/autentificador.php");
require_once("../include/conexaoBD.php");

$codigo = null;
$valor = null;
$msg = "";
    
if ( !empty($_GET['codigo'])) {
    $codigo = $_REQUEST['codigo'];
}

if ( null==$codigo ) {
    die("<script>location.href = 'listar.php#comprar'</script>");
}

if ( !empty($_POST)) {

        $quantidade = utf8_encode(htmlspecialchars($_POST['qtd']));
        $email = $_SESSION['login'];
        
        $sql = "select qtdIngressos, valor from evento where codEvento = ?";
        
        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('i', $codigo);
            
            $stmt->execute();   
            $result = $stmt->get_result(); 

            $linha = $result->fetch_assoc(); 
            $total = $linha["valor"] * $quantidade;
            if ($linha["qtdIngressos"] < $quantidade || $quantidade <= 0){
                if ($linha["qtdIngressos"] < $quantidade)
                    $msg = "Só existem ".$linha["qtdIngressos"]." ingressos disponíveis!";
                else 
                    $msg = "Insira uma quantidade maior que 0!";

                $sql = "select DATE(dataInicio) as data, descricao, local, cidade, TIME_FORMAT(dataInicio, '%H:%i') as horario,valor,
                             nome from evento inner join modalidade on evento.codModalidade = modalidade.codModalidade 
                            and codEvento = ?";
                
                // aqui populando campos.
                $stmt = $conn->prepare($sql); 
                if ($stmt){
                    $stmt->bind_param('i', $codigo);
                    
                    $stmt->execute();   
                    $result = $stmt->get_result();
        }
            }
            else{
                //pega código do usuário por email
                $sql = "select codUsuario from usuario where email = ?";
        
                $stmt = $conn->prepare($sql); 
                if ($stmt){
                    $stmt->bind_param('s', $email);
                    
                    $stmt->execute();   
                    $result = $stmt->get_result(); 

                    $linha = $result->fetch_assoc();
                }
                $usuario = $linha["codUsuario"];

                // insere ingresso na tabela ingressos
                $sql = 'INSERT INTO ingresso (codUsuario, codEvento, qtdIngressos, valorTotal) VALUES (?, ?, ?, ?);';

                $stmt = $conn->prepare($sql); 
                if ($stmt){
                    $stmt->bind_param('iiid', $usuario, $codigo, $quantidade, $total);

                    $stmt->execute();   
                    if(!$stmt->errno){
                        if ($stmt->affected_rows == 0) {
                            $msg = "Nenhum registro foi alterado!"; 
                        }

                    }else{
                        echo $stmt->error; 
                    }
                }

                //retira ingressos de evento
                $sql = 'UPDATE evento SET qtdIngressos = qtdIngressos - ? WHERE codEvento = ?;';

                $stmt = $conn->prepare($sql); 
                if ($stmt){
                    $stmt->bind_param('ii', $quantidade, $codigo);

                    $stmt->execute();   
                    if(!$stmt->errno){
                        if ($stmt->affected_rows == 0) {
                            $msg = "Nenhum registro foi alterado!"; 
                        }
                            
                        die("<script>location.href = '../usuario/relatorio.php#relatorio'</script>");
                    }else{
                        echo $stmt->error; 
                    }
                }
            }
            
            $stmt->close();             
        }
        else{
            echo "Prepare falhou";
        }
        
    }else   {

        $sql = "select DATE(dataInicio) as data, descricao, local, cidade, TIME_FORMAT(dataInicio, '%H:%i') as horario,valor,
                             nome from evento inner join modalidade on evento.codModalidade = modalidade.codModalidade 
                            and codEvento = ?";
                
        // aqui populando campos.
        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('i', $codigo);
            
            $stmt->execute();   
            $result = $stmt->get_result();
        }
    }
?>

    <script>
        function calcular(valor, quantidade)
        {
            document.getElementById("total").setAttribute("value","R$ " + valor * quantidade);
        }
    </script>

    <!--Comprar ingressos-->
    <div id="comprar" class="container">
        <h2><b>Ingressos Olimpíadas Rio 2016</b></h2>
        
        <div>
            <?php
                while($row = $result->fetch_assoc()){
                    echo '<h3>'.date('d/m/Y', strtotime($row['data'])).'</h3>'; 

                    echo '<hr><p class="lead"><b>'.$row['descricao'].'</b></p>';
                    echo '<p><b>Local: </b>'.$row['local'].' - '.$row['cidade'].'</p>';
                    echo '<p><b>Horário: </b>'.$row['horario'].'</p>';
                    echo '<p><b>Evento: </b>'.$row['nome'].'</p>';
                    echo '<p><b>Preço: </b>'.'R$'.$row['valor'].'</p>';
                    $valor = $row['valor'];
                }
            ?>
        </div>
        <form class="pure-form pure-form-stacked" action="comprar.php?codigo=<?php echo $codigo?>#comprar" method="post">
            <fieldset>
                <legend>Preencha os dados:</legend>
                <div style="color:red;"><?php echo $msg ?></div>
                <div class="form-group">
                    <label>Quantidade </label>
                    <?php echo '<input required style="width:80px" name="qtd" id="qtd" type="number" onchange="calcular('.$valor.', this.value)">'?>
                    <input id='total' name='total' style='width:80px' disabled value='R$ 00,00' type='text'>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-credit-card"></span>
                        <span class="submit-text">Confirmar</span>
                    </button>
                </div>
            </fieldset>
        </form>
        <br>
        <a type="button" class="btn btn-default" href="../index.php#calendario">
            <span class="submit-text">Voltar</span>
        </a>
    </div>
    <?php include("../include/rodape.php"); ?>