<?php
  namespace APP\Controllers;

  //use APP\Services\MotivoContato\IMotivoContatoService;

  class MotivoContatoController
  {
    public function __construct()
    {
    }

    public function listar()
    {
      echo "<option value='10'>teste</option>";
      /*
      $motivos = $this->_motivoContatoService->listar();

      foreach ($motivos as $motivo) {
        echo "<option value='{$motivo['ID']}'>{$motivo['Mensagem']}</option>";
      }*/
    }
  }
?>