<?php
  include("connections/mysql.php");

  class FaleConoscoModel {

    public function ListarMotivos() {
      $sql = "SELECT ID, Mensagem FROM MotivoContato;";

      $result = mysqli_query($conn, $sql);
      
      mysqli_close($conn);

      return $result;
    }
  }
?>