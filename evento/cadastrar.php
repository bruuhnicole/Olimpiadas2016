<?php
$cabecalho_title = "título da pagina";
include("../include/cabecalho.php"); 
?>

 <body>
     <h1> Cadastro de evento RIO 2016</h1>      
     <h2> Preencha todos os dados para cadastrar um evento:</h2><br />

	<form  method="post">

		<!--Descrição do evento-->
		<fieldset>
 			<legend>Dados do evento</legend>
    
 				<table cellspacing="10">
     
  					<tr>
   						<td>
						    <label for="nome">Nome do evento: </label>
   						</td>      
						<td align="left">
						    <input type="text" name="nome">
						</td> 
      
					   	<td>
					    	<label for="horario">Horário: </label>
					   	</td>      
					   	<td align="left">
					    	<input type="text" name="horario">
					   	</td>      
  					</tr> 
     
  					<tr>
					  	 <td>
					   		 <label>Data de inicio: </label>
					   	</td>
					   	<td align="left">
					    	<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
					   		<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
					  		<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
					   </td>
					      
					    <td>
					    	<label>Data de fim: </label>
					  	</td>
					  	<td align="left">
					   		<input type="text" name="dia" size="2" maxlength="2" value="dd"> 
					   		<input type="text" name="mes" size="2" maxlength="2" value="mm"> 
					   		<input type="text" name="ano" size="4" maxlength="4" value="aaaa">
					   	</td>
  					</tr> 
 				</table>
		</fieldset>
		<br />
    
    
    
		<!-- Modalidade -->
		<fieldset>
 			<legend>Esporte</legend>
 				<table cellspacing="10">
 					<tr>
  						<td>
      						<label for="descricao">Descrição: </label>
   						</td>      
   						<td align="left">
       						<input type="text" name="descricao">
   						</td> 
     
   						<td>
					       <label for="ingresso">Quantidade de ingressos: </label>
   						</td>      
   						<td align="left">
       						<input type="text" name="ingresso">
   						</td> 
 					</tr>
     
 					<tr>
    					<td>
        					<label for="modalidade">Modalidade:</label>
    					</td>
    					<td align="left">
        					<select name="modalidade">     
            					<option value="vp">Vôlei de praia</option> 
            					<option value="vo">Voleibol</option> 
            					<option value="ga">Ginástica artística</option> 
            					<option value="fu">Futebol</option>    
        					</select>
   						</td> 
     
   						<td>
        					<label for="variacao">Variação:</label>
   						</td>
   						<td align="left">
       						<input type="text" name="variacao">
   						</td> 
 					</tr>
 				</table>
			</fieldset>
		<br />

		<!-- Descrição do lugar -->
		<fieldset>    
			<legend>Dados de Endereço</legend>    
 				<table cellspacing="10">  

  					<tr>
   						<td>
    						<label for="rua">Rua:</label>
   						</td>
   						<td align="left">
    						<input type="text" name="rua">
   						</td>
   						<td>       
    						<label for="numero">Numero:</label>
   						</td>
   						<td align="left">
    						<input type="text" name="numero" size="4">
   						</td>
  					</tr>
     
  					<tr>
   						<td>
    						<label for="bairro">Bairro: </label>
   						</td>
						<td align="left">
							<input type="text" name="bairro">
						</td>
						<td>
						    <label for="cep">CEP: </label>
						</td>
						<td align="left">
						    <input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3">
						</td>
					</tr>
 
  					<tr>
   						<td>
    						<label for="cidade">Cidade: </label>
   						</td>
   						<td align="left">
    						<input type="text" name="cidade">
   						</td>
  					</tr>   
  
				   	<tr>
				   		<td>
				    		<label for="estado">Estado:</label>
				   		</td>
				   		<td align="left">
				    		<select name="estado">     
				    			<option value="mg">Minas Gerais</option> 
				    			<option value="pa">Pará</option> 
							    <option value="pb">Paraíba</option> 
							    <option value="pr">Paraná</option> 
							    <option value="pe">Pernambuco</option> 
							    <option value="pi">Piauí</option> 
							    <option value="rj">Rio de Janeiro</option> 
							    <option value="rn">Rio Grande do Norte</option> 
							    <option value="ro">Rondônia</option> 
							    <option value="rs">Rio Grande do Sul</option> 
							    <option value="rr">Roraima</option> 
							    <option value="sc">Santa Catarina</option> 
							    <option value="se">Sergipe</option> 
							    <option value="sp">São Paulo</option> 
							    <option value="to">Tocantins</option> 
				  			 </select>
				   		</td>
				  </tr>
    
				 	<tr>
				   		<td>
				    		<label for="imagem">Imagens do lugar:</label>
				   		</td>
				   		<td>
				    		<input type="file" name="imagem" >
				   		</td>
				  	</tr>     
 				</table>    
		</fieldset>    
		<br />

		<input type="submit">
		<input type="reset" value="Limpar">
	</form>
</body>
	

<?php include("../include/rodape.php"); ?>