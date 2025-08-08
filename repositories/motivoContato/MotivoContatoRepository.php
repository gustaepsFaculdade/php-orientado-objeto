<?php
  namespace APP\Repositories\MotivoContato;
  
  use APP\Repositories\Connections\IMySql;

  class MotivoContatoRepository implements IMotivoContatoRepository
  {
    private readonly IMySql $_mySqlConnection;

    public function __construct(IMySql $mySqlConnection) 
    {
      $this->_mySqlConnection = $mySqlConnection;
    }

    public function listar() 
    {
      $sql = "SELECT ID, Mensagem FROM MotivoContato";
      $stmt = $this->_mySqlConnection->conectar()->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
  }
?>