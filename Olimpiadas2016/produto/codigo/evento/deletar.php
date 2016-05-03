<?php
require_once("../include/conexaoBD.php");

    //captura os dados passados como GET
    $codigoEvento = utf8_encode(htmlspecialchars($_GET['codEvento']));
        
    $sql = "DELETE FROM evento WHERE codEvento=?";
        
    $stmt = $conn->prepare($sql); 
        
    $stmt->bind_param('i', $codigoEvento);

    $stmt->execute(); 
    $stmt->close();
    $conn->close();           
               
    header("Location: ./listar.php#eventos");
?>