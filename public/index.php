<?php

use Core\Http\Request;
use Core\Model;

$rootPath = dirname(__DIR__);

require $rootPath . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require $rootPath . DIRECTORY_SEPARATOR . 'bootstrap.php';

echo "<h1>Hello World!</h1>";

// $model = new Model();
// echo $model->find('hi');

// echo Model::find(50)->get();

// $request_uri = trim($_SERVER['REQUEST_URI']);
// $script_path = str_replace('index.php', '', trim($_SERVER['SCRIPT_NAME']));
// $query_string = trim(str_replace($script_path, '', $request_uri));
// print_r($query_string);
// print_r(explode('/', $query_string));

$req = new Request();

print_r($req->getHttpMethod());

echo "<pre>";
// print_r($_SERVER);
echo "</pre>";
