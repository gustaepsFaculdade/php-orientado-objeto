<?php
  require __DIR__ . '/vendor/autoload.php';
  
  use DI\ContainerBuilder;
  use function DI\autowire;

  use APP\Controllers\MotivoContatoController;
  use APP\Controllers\ProdutosController;

  use APP\Services\MotivoContato\IMotivoContatoService;
  use APP\Services\MotivoContato\MotivoContatoService;
  use APP\Services\Produto\ProdutoService;
  use APP\Services\Produto\IProdutoService;
  use APP\Services\FaleConosco\IFaleConoscoService;
  use APP\Services\FaleConosco\FaleConoscoService;

  use APP\Repositories\MotivoContato\IMotivoContatoRepository;
  use APP\Repositories\MotivoContato\MotivoContatoRepository;
  use APP\Repositories\Produto\ProdutoRepository;
  use APP\Repositories\Produto\IProdutoRepository;
  use APP\Repositories\FaleConosco\IFaleConoscoRepository;
  use APP\Repositories\FaleConosco\FaleConoscoRepository;
  
  use APP\Repositories\Connections\MySql\IMySqlConnection;
  use APP\Repositories\Connections\MySql\MySqlConnection;

  use APP\Assets\Extensions\StringFormats;
  
  $containerBuilder = new ContainerBuilder();
  
  $containerBuilder->addDefinitions([
    MotivoContatoController::class => autowire(),
    ProdutosController::class => autowire(),
    
    StringFormats::class => autowire(),

    IMotivoContatoService::class => autowire(MotivoContatoService::class),
    IProdutoService::class => autowire(ProdutoService::class),
    IFaleConoscoService::class => autowire(FaleConoscoService::class),

    IMotivoContatoRepository::class => autowire(MotivoContatoRepository::class),
    IProdutoRepository::class => autowire(ProdutoRepository::class),
    IFaleConoscoRepository::class => autowire(FaleConoscoRepository::class),

    IMySqlConnection::class => autowire(MySqlConnection::class)
  ]);

  return $containerBuilder->build();
?>