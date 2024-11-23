<?php

use Core\Constants\Constants;
use Core\Errors\ErrorsHandler;

require __DIR__ . '/../vendor/autoload.php';

ErrorsHandler::init();

Constants::rootPath();

require_once Constants::rootPath() . '/core/Env/env.php';
// require_once ROOT_PATH . '/core/Debug/functions.php';
// // require_once ROOT_PATH . '/core/errors/handler.php';
