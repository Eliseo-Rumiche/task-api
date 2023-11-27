<?php
define('ROOT_DIR', __DIR__);
require ROOT_DIR.'/vendor/autoload.php';
ORM::configure('mysql:host=localhost;dbname=api-fligth');
ORM::configure('username', 'root');
ORM::configure('password', '');

require ROOT_DIR.'/src/routers/tasks.routes.php';

Flight::route(
    'GET /docs', function () {
        $openapi =  \OpenApi\Generator::scan(['./src/controllers/']);
        header('Content-Type: application/json');
        echo $openapi->toJson();
    }
);
flight::start();
