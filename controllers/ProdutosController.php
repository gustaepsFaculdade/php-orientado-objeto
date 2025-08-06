<?php
  require_once("../models/ProdutoModel.php");

  class ProdutosController {
    
    private $produtoModel;

    public function __construct(){
      $this->produtoModel = new ProdutoModel();
    }

    public function Remover($id) {
      $this->produtoModel->Remover($id);

     // header("Location: ../html/produtos.php");
    }
  }
?>