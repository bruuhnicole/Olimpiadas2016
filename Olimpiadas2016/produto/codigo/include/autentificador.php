<?php
if (!isset($_SESSION['login'])){
	header("Location: ../usuario/login.php#login");
}
?>