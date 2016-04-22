<?php
  $bdhost = "localhost";
  $bdusuario = "root";
  $bdsenha = "";
  $baseDados = "olimpiadas2016";

  // Cria a conexão
  //mySQLi, ORIENTADA A OBJETOS
  $conn = new mysqli($bdhost, $bdusuario, $bdsenha, $baseDados);
  $conn->set_charset('utf8');
  // Verifica conexão
  if ($conn->connect_error) {
    die("Conexão ao MySQL falhou: " . $conn->connect_error);	
  }
  
?>
