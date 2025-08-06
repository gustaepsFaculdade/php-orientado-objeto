<?php
  class Conexao {
    private $host = "localhost";
    private $port = 3306;
    private $db   = "Loja";
    private $user = "root";
    private $pass = "";

    private $pdo;

    public function Conectar() {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
  }
?>