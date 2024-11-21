<?php

require '/var/www/app/models/problem.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'POST') {
    header('Location: /pages/problems/index.php');
    exit;
}

$errors = [];

$params = $_POST['problem'];
$problem = new Problem(title: $params['title']);

if ($problem->save()){
    header('Location: /pages/problems/');
} else {
    $title = 'Novo Problema';
    $view = '/var/www/app/views/problems/new.phtml';

    require '/var/www/app/views/layouts/application.phtml';
}

// if (empty($title))
//     $errors['title'] = 'Não pode ser vazio';

// if (empty($errors)){
//     define('DB_PATH', '/var/www/database/problems.txt');
//     file_put_contents(DB_PATH, $title . PHP_EOL, FILE_APPEND);
    
//     header('Location: /pages/problems/');
// } else{
//     $title = 'Novo Problema';
//     $view = '/var/www/app/views/problems/new.phtml';

//     require '/var/www/app/views/layouts/application.phtml';
// }
