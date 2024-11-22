<?php
require '/var/www/app/models/Problem.php';

$method = $_REQUEST['_method'] ?? ['REQUEST_METHOD'];

if ($method !== 'DELETE') {
    header('Location: /pages/problems/index.php');
    exit;
}

$problem = Problem::findById($_POST['problem']['id']);

$problem->destroy();

header('Location: /pages/problems/');