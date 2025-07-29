<?php
  $servername = "localhost";
  $port = 3306; 
  $username = "root";
  $password = "";
  $databaseName = "Loja";
  
  $conn = mysqli_connect($servername, $username, $password, $databaseName, $port);

  if (!$conn) {
    die("Não foi possível estabelecer uma conexão segura.");
  }
?>
