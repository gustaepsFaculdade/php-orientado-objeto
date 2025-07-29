<?php
	include("../models/connections/mysql.php");
  
  if ($_SERVER["REQUEST_METHOD"] != "POST")
    return;

  $id = $_POST['ID'];
  
  $stmt = $conn->prepare("DELETE FROM faleconosco WHERE ID = ?");
  $stmt->bind_param("i", $id);
  
  $stmt->execute();

  header("Location: ../html/produtos.php");
  exit;
?>