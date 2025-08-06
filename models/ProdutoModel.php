<?php
  require_once("connections/mysql.php");

  class ProdutoModel {
    private $conn;

    public function __construct() {
      $conexao = new Conexao();
      $this->conn = $conexao->Conectar();
    }
    
    public function Remover($id) {
      $stmt = $this->conn->prepare("DELETE FROM faleconosco WHERE ID = :id");
      $stmt->execute([':id' => $id]);
    }
  }
?>