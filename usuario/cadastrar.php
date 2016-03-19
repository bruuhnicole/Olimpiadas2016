<?php
$cabecalho_title = "Cadastre-se";
include("../include/cabecalho.php"); 
?>

<div style="background-color:#eeeeee;height:500px;width:150px;float:left;padding:15px;line-height:30px;">
	<a href="#">Usuário</a><br>
	<a href="#">Modalidades</a><br>
	<a href="#">Eventos</a>
</div>
	<div style="float:left;padding:15px;align:center;background-color:lightgreen;">
	<h1>Cadastrar-se</h1>
	<form action="action_page.php">
	  <fieldset>
	    <legend>Preencha os dados:</legend>
	    Nome Completo:<br>
	    <input type="text" name="nome" placeholder="Nome Completo..." required size="30px"><br>
	    CPF:<br>
	    <input type="text" name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" required><br>
	    Data de Nascimento:<br>
	    <input type="date" name="data" maxlenght="10" placeholder="XX/XX/XXXX" required><br>
	    Logradouro:<br>
	    <input type="text" name="logradouro" placeholder="Av., Rua..." required><br>
	    Nº:<br>
	    <input type="text" name="num" placeholder="Nº..." required><br>
	    Bairro:<br>
	    <input type="text" name="bairro" placeholder="Bairro..." required><br>
	    Cidade:<br>
	    <input type="text" name="cidade" placeholder="Cidade..." required><br>
	    Estado:<br>
	    <input list="estado" size="2px"> <br>
		  <datalist id="estado">
		    <option value="MG">
		    <option value="SP">
		    <option value="RJ">
		    <option value="RS">
		    <option value="GO">
		  </datalist> 
	    E-mail:<br>
	    <input type="email" name="email" placeholder="nome@nome.com" required><br>
	    Senha:<br>
	    <input type="password" name="senha" maxlength="6" placeholder="Máximo 6 caracteres..." required><br>
	    Repetir Senha:<br>
	    <input type="password" name="repetir_senha" maxlength="6" placeholder="Repita a Senha Digitada..." required><br><br>
	    <input type="submit" value="Cadastrar">
	  </fieldset>
	</form>
</div>

<?php include("../include/rodape.php"); ?>
