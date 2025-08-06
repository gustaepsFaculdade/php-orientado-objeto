<?php
  require_once("../models/FaleConoscoModel.php");
  
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
  }
?>