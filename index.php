<?php
  require __DIR__ . '/vendor/autoload.php';

  use DI\Container;
  use function DI\create;

  use APP\Services\MotivoContato\IMotivoContatoService;
  use APP\Services\MotivoContato\MotivoContatoService;
  use APP\Repositories\MotivoContato\IMotivoContatoRepository;
  use APP\Repositories\MotivoContato\MotivoContatoRepository;
  use APP\Repositories\Connections\IMySql;
  use APP\Repositories\Connections\MySql;

  $container = new Container();

  $container->set(APP\Controllers\MotivoContatoController::class, create(APP\Controllers\MotivoContatoController::class));
 /* $container->set(IMotivoContatoService::class, create(MotivoContatoService::class));
  $container->set(IMotivoContatoRepository::class, create(MotivoContatoRepository::class));
  $container->set(IMySql::class, create(MySql::class));
*/
  return $container;
?>