<?php

include("../include/cabecalho.php"); 
include("../include/administrador.php");
require_once("../include/conexaoBD.php");

$codigoEvento = "";

if(isset($GET['codEvento']))
    $codigoEvento = utf8_encode(htmlspecialchars($_GET['codEvento']));

if (!empty($_POST)) { 

    $modalidade = utf8_encode(htmlspecialchars($_POST['modalidad']));

    $nome = utf8_encode(htmlspecialchars($_POST['nome']));
    $horario = utf8_encode(htmlspecialchars($_POST['horario']));  

    $dataInicio = utf8_encode(htmlspecialchars($_POST['dataInicio']));
    $dataFim = utf8_encode(htmlspecialchars($_POST['dataFim']));
    $ingresso = utf8_encode(htmlspecialchars($_POST['ingresso']));

    $valor = utf8_encode(htmlspecialchars($_POST['valor']));                           

    $local = utf8_encode(htmlspecialchars($_POST['local'])); 
    $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));   
               
    
    $sql = "UPDATE EVENTO SET nome = ?, local = ?, cidade = ?, dataInicio = ?, dataFim = ?, qtdIngressos = ?, valor = ? WHERE codEvento = ?";
                
    $stmt = $conn->prepare($sql); 

    if ($stmt){
        $stmt->bind_param('sssssidi', $nome, $local, $cidade, $dataInicio, $dataFim, $ingresso, $valor, $codigoEvento);
        
        $stmt->execute(); 

        if(!$stmt->errno){
            if ($stmt->affected_rows == 0) {
                $msg = "Nenhum registro foi adicionado!"; 
            }
        }else{
            header("Location: ./listar.php#eventos");
            }
    } 

    $stmt->close();   

}else{  
        $codigoEvento = utf8_encode(htmlspecialchars($_GET['codEvento']));

        

        $sql = "select nome, qtdIngressos, valor, descricao, local, cidade, descricao, TIME_FORMAT(dataInicio, '%H:%i') as horario, DATE_FORMAT(dataInicio, '%Y-%m-%d') as dtini, DATE_FORMAT(dataFim, '%Y-%m-%d') as dtfim from evento natural join modalidade where codEvento = ?";

        $stmt = $conn->prepare($sql); 
        if ($stmt){
            $stmt->bind_param('i', $codigoEvento);
            
            $stmt->execute();   
            $result = $stmt->get_result(); 
            $linha = $result->fetch_assoc(); 
            
            if ($linha){
    
               $nome = $linha['nome'];
               $horario = $linha['horario'];

               $dataInicio = $linha['dtini'];
               $dataFim = $linha['dtfim'];

               $ingresso = $linha['qtdIngressos'];
               $valor = $linha['valor'];
               $modalidade = $linha['descricao'];

               $local = $linha['local'];
               $cidade = $linha['cidade'];               
            }
            $stmt->close();
        }
}
?>
    <!--Editar evento-->
    <div class="container" id="editar">
        <h2><b>Edição de evento</b></h2>

        <form class="pure-form pure-form-stacked"  action="editar.php" method="post">
            <!--Descrição do evento-->
            <fieldset>
                <legend>Dados do evento</legend>
                <div class="form-group">
                    <label>Nome do Evento</label>
                    <input type="text" style="width:300px;" class="form-control" value="<?php echo !empty($nome)?$nome:'';?>" name="nome" placeholder="Nome do Evento" required size="50px">
                </div>

                <div class="form-group">
                    <label for="horario">Horário: </label>
                    <input style="width:115px;" class="form-control" value="<?php echo !empty($horario)?$horario:'';?>" type="time" name="horario" placeholder="hh:mm" required>
                    
                    <label>Data de inicio: </label>
                    <input style="width:160px;" class="form-control" value="<?php echo !empty($dataInicio)?$dataInicio:'';?>" type="date" name="dataInicio" placeholder="dd/mm/yyyy" required>
                    
                    <label>Data de fim: </label>
                    <input style="width:160px;" class="form-control" value="<?php echo !empty($dataFim)?$dataFim:'';?>" type="date" name="dataFim" placeholder="dd/mm/yyyy" required>
                    
                    <label for="ingresso">Quantidade de ingressos: </label>
                    <input style="width:70px;" class="form-control" value="<?php echo !empty($ingresso)?$ingresso:'';?>" type="number" name="ingresso" required>

                    <label for="valor">Valor do ingresso: </label>
                    <input style="width:150px;" class="form-control" value="<?php echo !empty($valor)?$valor:'';?>" type="number" name="valor" required>
                </div>
            </fieldset>

            <!-- Modalidade -->  
            <fieldset>
                <legend>Esporte</legend>                
                <div class="form-group">
                    <label for="modalidad">Modalidade:</label>
                    <select style="width:150px;" class="form-control" value="<?php echo !empty($modalidade)?$modalidade:'';?>"  name="modalidad">
                        
                        <option value="Vôlei de praia">Vôlei de praia</option>
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
                    <input style="width:400px;" class="form-control" value="<?php echo !empty($local)?$local:'';?>" type="text" name="local" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade: </label>
                    <input style="width:300px;" class="form-control" value="<?php echo !empty($cidade)?$cidade:'';?>" type="text" name="cidade" required>
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