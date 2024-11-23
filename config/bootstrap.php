<?php

use Core\Errors\ErrorsHandler;

require __DIR__ . '/../vendor/autoload.php';

ErrorsHandler::init();

require_once dirname(__DIR__) . '/core/Constants/general.php';

require_once ROOT_PATH . '/core/Env/env.php';
require_once ROOT_PATH . '/core/Debug/functions.php';
// require_once ROOT_PATH . '/core/errors/handler.php';
