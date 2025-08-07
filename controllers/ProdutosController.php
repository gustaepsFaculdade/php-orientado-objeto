<?php
  require_once __DIR__.'/../models/ProdutoModel.php';
  require_once __DIR__.'/../assets/extensions/StringFormats.php';

  class ProdutosController {
    
    private $produtoModel;
    private $stringFormats;

    public function __construct(){
      $this->produtoModel = new ProdutoModel();
      $this->stringFormats = new StringFormats();
    }

    public function Remover($id) {
      $this->produtoModel->Remover($id);
    }

    public function Listar() {
      $produtos = $this->produtoModel->Listar();

      foreach ($produtos as $produto) {
        echo "<tr>";

        echo "<td>".$produto["Nome"]."</td>";
        echo "<td>".$this->stringFormats->FormatarDocumento($produto["DocumentoFederal"])."</td>";
        echo "<td>".$this->stringFormats->FormatarTelefone($produto["Telefone"])."</td>";
        echo "<td>".$produto["Email"]."</td>";
        echo "<td>".$produto["Mensagem"]."</td>";
        echo "<td>".$produto["Comentario"]."</td>";
        echo "<td>
                <form method='post' action='../assets/functions/removeRecursoListaFaleConosco.php'>
                    <input type='hidden' name='ID' value='".$produto["ID"]."'>
                    <button type='submit'>Excluir</button>
                </form>
              </td>";
        echo "</tr>";

        echo "</tr>";
      }
    }
  }
?>