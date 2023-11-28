<?php
define('ROOT_DIR', __DIR__);
require ROOT_DIR.'/vendor/autoload.php';
ORM::configure('mysql:host=localhost;dbname=api-fligth');
ORM::configure('username', 'root');
ORM::configure('password', '');

require ROOT_DIR.'/src/routers/tasks.routes.php';
require ROOT_DIR.'/src/routers/documentation.routers.php';

flight::start();
