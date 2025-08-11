<?php
  require __DIR__ . '/vendor/autoload.php';
  
  use DI\ContainerBuilder;
  use function DI\autowire;

  use APP\Controllers\MotivoContatoController;
  use APP\Services\MotivoContato\IMotivoContatoService;
  use APP\Services\MotivoContato\MotivoContatoService;
  use APP\Repositories\MotivoContato\IMotivoContatoRepository;
  use APP\Repositories\MotivoContato\MotivoContatoRepository;
  use APP\Repositories\Connections\MySql\IMySqlConnection;
  use APP\Repositories\Connections\MySql\MySqlConnection;
  
  $containerBuilder = new ContainerBuilder();
  
  $containerBuilder->addDefinitions([
    MotivoContatoController::class => autowire(),
    IMotivoContatoService::class => autowire(MotivoContatoService::class),
    IMotivoContatoRepository::class => autowire(MotivoContatoRepository::class),
    IMySqlConnection::class => autowire(MySqlConnection::class)
  ]);

  return $containerBuilder->build();
?>