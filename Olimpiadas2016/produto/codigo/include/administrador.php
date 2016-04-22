<?php 
include("../include/autentificador.php");

if ($_SESSION['perfil'] != "Administrador") {
	header("Location: ../include/unauthorized.php#unauthorized");
} 
?>