<?php   
   session_start();

   session_destroy();

   header("Location: ../usuario/login.php#login");
?>