<?php

use AWurth\Config\ConfigurationLoader;
use Slim\App;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$config = [
    'env' => 'prod',
    'root_dir' => dirname(__DIR__)
];

$app = new App($config);
$container = $app->getContainer();

$loader = new ConfigurationLoader($config, __DIR__ . '/../var/cache/prod/config.php');

$container['config'] = $loader->load(__DIR__ . '/../app/config/config.yml');

require __DIR__ . '/../app/dependencies.php';

require __DIR__ . '/../app/handlers.php';

require __DIR__ . '/../app/middleware.php';

require __DIR__ . '/../app/controllers.php';

require __DIR__ . '/../app/routing.php';

$app->run();
