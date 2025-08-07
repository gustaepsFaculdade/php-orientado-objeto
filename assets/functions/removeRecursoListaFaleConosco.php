<?php
  require_once __DIR__.'/../../controllers/ProdutosController.php';

  if ($_SERVER["REQUEST_METHOD"] != "POST")
    return;

    $produtosController = new ProdutosController();

  $id = $_POST['ID']; 
  
  $produtosController->Remover($id);

  header("Location: ../../html/produtos.php");
  exit;
?>