<?php
  $container = require __DIR__.'/../../index.php';

  use APP\Controllers\ProdutosController;

  if ($_SERVER["REQUEST_METHOD"] != "POST")
    return;

  $controller = $container->get(ProdutosController::class);
  $controller->remover($id);

  header("Location: ../../html/produtos.php");
  exit;
?>