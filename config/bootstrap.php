<?php

use Core\Env\EnvLoader;
use Core\Errors\ErrorsHandler;

require __DIR__ . '/../vendor/autoload.php';

ErrorsHandler::init();
EnvLoader::init();
