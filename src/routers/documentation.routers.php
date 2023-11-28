<?php
include ROOT_DIR.'/src/controllers/documentation.controller.php';

flight::route('GET /docs/',array('DocumentationController', 'index'));
flight::route('GET /docs/getSchema',array('DocumentationController', 'getSchema'));

