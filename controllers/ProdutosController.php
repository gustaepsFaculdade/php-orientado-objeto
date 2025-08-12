<?php namespace APP\Controllers;

  use APP\Services\Produto\IProdutoService;
  require_once __DIR__.'/../assets/extensions/StringFormats.php';

  class ProdutosController 
  {
    private readonly IProdutoService $_produtoService;
    private $stringFormats;

    public function __construct(IProdutoService $produtoService){
      $this->_produtoService = $produtoService;
      $this->stringFormats = new \StringFormats();
    }

    public function remover($id) {
      echo $id;
      $this->_produtoService->remover($id);
    }

    public function listar() {
      $produtos = $this->_produtoService->listar();

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
      }
    }
  }
?>