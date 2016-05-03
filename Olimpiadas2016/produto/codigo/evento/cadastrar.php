<?php
include("../include/cabecalho.php");
include("../include/administrador.php");
require_once("../include/conexaoBD.php");

if (isset($_POST['nome'])){
    
    $nome = utf8_encode(htmlspecialchars($_POST['nome']));   
       
    $sql = "select * from evento where nome = ?";
            
    $stmt = $conn->prepare($sql); 

    if ($stmt){
            
        //especificar o tipo de dados minimiza o risco de SQL injections
        $stmt->bind_param('s', $nome);
        
        //executa a consulta
        $stmt->execute();   
        
        $result = $stmt->get_result();         
        
        $linha = $result->fetch_assoc(); 
            
        if ($linha){
            $msg = "Esse evento já está cadastrado!";
        }
        else{   
                $modalidade = utf8_encode(htmlspecialchars($_POST['modalidad']));

                $nome = utf8_encode(htmlspecialchars($_POST['nome']));
                $horario = utf8_encode(htmlspecialchars($_POST['horario']));  

                $dataInicio = utf8_encode(htmlspecialchars($_POST['dataInicio']));
                $dataFim = utf8_encode(htmlspecialchars($_POST['dataFim']));
                $ingresso = utf8_encode(htmlspecialchars($_POST['ingresso']));

                $valor = utf8_encode(htmlspecialchars($_POST['valor']));                           

                $local = utf8_encode(htmlspecialchars($_POST['local'])); 
                $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));

                //Pegar o código do esporte selecionado
                $sql = "select * from modalidade where descricao = ?";            
                $stmt = $conn->prepare($sql);  
                $stmt->bind_param('s', $modalidade);
                $stmt->execute();           
                $result = $stmt->get_result();
                $linha = $result->fetch_assoc(); 
                $codModalidade = $linha['codModalidade'];
                                
                $tempo = explode (":", $horario);
                
                $sql = "INSERT INTO EVENTO(codModalidade, nome, local, cidade, dataInicio, dataFim, qtdIngressos, valor)VALUES(?,?,?,?,?,?,?,?);";
                
                $stmt = $conn->prepare($sql); 

                if ($stmt){
                    $stmt->bind_param('isssssid', $codModalidade ,$nome, $local, $cidade, $dataInicio, $dataFim, $ingresso, $valor);
                    
                    $stmt->execute(); 

                        if(!$stmt->errno){
                            if ($stmt->affected_rows == 0) {
                                $msg = "Nenhum registro foi adicionado!"; 
                            }                       
                        
                    }else{
                           header("Location: ./listar.php#eventos");
                        }
                }                                    
            }
            $stmt->close(); 
        }            
}  
$conn->close();
?>    

    <!--Cadastrar-->
    <div class="container" id="cadastro">
        <h2><b>Cadastro de evento</b></h2>

        <form class="pure-form pure-form-stacked"  action="cadastrar.php" method="post">
            <!--Descrição do evento-->
            <fieldset>
                <legend>Dados do evento</legend>
                <div class="form-group">
                    <label>Nome do Evento</label>
                    <input type="text" style="width:300px;" class="form-control" name="nome" placeholder="Nome do Evento" required size="50px">
                </div>

                <div class="form-group">
                    <label for="horario">Horário: </label>
                    <input style="width:115px;" class="form-control" type="time" name="horario" placeholder="hh:mm">
                    <label>Data de inicio: </label>
                    <input style="width:160px;" class="form-control" type="date" name="dataInicio" placeholder="dd/mm/yyyy">
                    <label>Data de fim: </label>
                    <input style="width:160px;" class="form-control" type="date" name="dataFim" placeholder="dd/mm/yyyy">
                    <label for="ingresso">Quantidade de ingressos: </label>
                    <input style="width:70px;" class="form-control" type="number" name="ingresso">

                    <label for="valor">Valor do ingresso: </label>
                    <input style="width:150px;" class="form-control" type="number" name="valor">
                </div>
            </fieldset>

            <!-- Modalidade --> 
            <fieldset>
                <legend>Esporte</legend>                
                <div class="form-group">
                    <label for="modalidad">Modalidade:</label>
                    <select style="width:150px;" class="form-control" name="modalidad">
                        <option value= htmlspecialchars("Vôlei de praia") >Vôlei de praia</option>
                        <option value="Voleibol">Voleibol</option>
                        <option value="Ginástica artística">Ginástica artística</option>
                        <option value="Futebol">Futebol</option>
                    </select>
                </div>
            </fieldset>
            <br />

            <!-- Descrição do lugar -->
            <fieldset>
                <legend>Descrição da localidade</legend>
                <div class="form-group">
                    <label for="rua">Local:</label>
                    <input style="width:400px;" class="form-control" type="text" name="local">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade: </label>
                    <input style="width:300px;" class="form-control" type="text" name="cidade">
                </div>
                
            </fieldset>

            <br />
            <div class="row center-align">
                <input type="submit" class="btn btn-default" value="Cadastrar">
                <input type="reset" class="btn btn-default" value="Limpar">
            </div>
        </form>
    </div>
<?php include("../include/rodape.php"); ?>