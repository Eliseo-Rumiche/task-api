<?php
require ROOT_DIR.'/src/controllers/tasks.controller.php';

flight::route('GET /api/tasks',array('TaskController', 'getAll'));
flight::route('POST /api/tasks',array('TaskController', 'createTask'));
flight::route('GET /api/tasks/@id',array('TaskController', 'getTask'));
flight::route('DELETE /api/tasks/@id',array('TaskController', 'deleteTask'));
flight::route('PUT /api/tasks/@id',array('TaskController', 'updateTask'));


