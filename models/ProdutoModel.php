<?php
  require_once("connections/mysql.php");

  class ProdutoModel {
    private $conn;

    public function __construct() {
      $conexao = new Conexao();
      $this->conn = $conexao->Conectar();
    }
    
    public function Remover($id) {
      $sql = "DELETE FROM faleconosco WHERE ID = :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $id]);
    }

    public function Listar() {
      $sql = "SELECT
                fc.ID,
                fc.Nome,
                fc.DocumentoFederal,
                fc.Telefone,
                fc.Email,
                mc.Mensagem,
                fc.Comentario
              FROM
                FaleConosco fc
              LEFT JOIN MotivoContato mc
                ON fc.MotivoContatoID = mc.ID";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>