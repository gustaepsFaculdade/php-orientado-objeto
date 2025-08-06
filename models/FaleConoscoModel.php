<?php
  require_once __DIR__.'/connections/mysql.php';

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

    public function Inserir(
      $nome,
      $email,
      $telefone,
      $documentoFederal,
      $motivoContatoID,
      $comentario) 
    {
      $sql = "INSERT INTO FaleConosco
                (Nome, DocumentoFederal, Telefone, Email, MotivoContatoID, Comentario)
              VALUES (:nome, :documentoFederal, :telefone, :email, :motivoContatoID, :comentario)";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':nome' => $nome,
        ':documentoFederal' => $documentoFederal,
        ':telefone' => $telefone,
        ':email' => $email,
        ':motivoContatoID' => $motivoContatoID,
        ':comentario' => $comentario
      ]);
    }
  }
?>