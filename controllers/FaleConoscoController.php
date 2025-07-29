<?php
  include("../models/FaleConoscoModel.php");

  class FaleConoscoController {
    
    public function ListarMotivos() {
      $faleConoscoModel = new FaleConoscoModel;
      $listaMotivos = $faleConoscoModel->ListarMotivos();
      
      if (mysqli_num_rows($listaMotivos) > 0) {
        while ($row = mysqli_fetch_assoc($listaMotivos)) {
          echo "<option value='".$row["ID"]."'>".$row["Mensagem"]."</option>";
        }
      }
    }
  }
?>