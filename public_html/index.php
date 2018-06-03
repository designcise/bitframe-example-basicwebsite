<?php

require_once __DIR__ . '/../env.php';

$app = new \BitFrame\Application();

// setup dependencies
require CONFIG_DIR . 'dependencies.php';

// register middleware
require CONFIG_DIR . 'middleware.php';

// setup routes
require CONFIG_DIR . 'routes.php';

// run app
$app->run();