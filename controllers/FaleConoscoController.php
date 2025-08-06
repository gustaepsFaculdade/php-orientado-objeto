<?php
  require_once __DIR__.'/../models/FaleConoscoModel.php';
  
  class FaleConoscoController {
    
    private $model;

    public function __construct() {
      $this->model = new FaleConoscoModel();
    }

    public function ListarMotivos() {
      $motivos = $this->model->ListarMotivos();

      foreach ($motivos as $motivo) {
        echo "<option value='{$motivo['ID']}'>{$motivo['Mensagem']}</option>";
      }
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