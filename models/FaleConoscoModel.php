<?php
  require_once("connections/mysql.php");

  class FaleConoscoModel {
    private $conn;

    public function __construct() {
      $conexao = new Conexao();
      $this->conn = $conexao->Conectar();
    }

    public function ListarMotivos() {
      $sql = "SELECT ID, Mensagem FROM MotivoContato";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>