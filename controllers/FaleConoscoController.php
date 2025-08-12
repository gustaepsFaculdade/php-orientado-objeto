<?php
  require_once __DIR__.'/../models/FaleConoscoModel.php';
  
  class FaleConoscoController {
    
    private $model;

    public function __construct() {
      $this->model = new FaleConoscoModel();
    }

    public function Inserir(
      $nome,
      $email,
      $telefone,
      $documentoFederal,
      $idMotivo,
      $comentario) 
    {
      $this->model->Inserir(
        $nome,
        $email,
        $telefone,
        $documentoFederal,
        $idMotivo,
        $comentario);
    }
  }
?>