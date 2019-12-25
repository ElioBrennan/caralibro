<?php

require_once 'controller/template.controller.php';
require_once 'controller/users.controller.php';

require_once 'model/connection.php';
require_once 'model/users.model.php';

$connection = Connection::connect();

$template = new TemplateController();
$template -> getTemplate();
