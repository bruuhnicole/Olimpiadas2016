<?php
if (!isset($_SESSION['login'])){
	header("Location: ../usuario/login.php?msg=Faça login para efetuar essa ação!#login");
}
?>