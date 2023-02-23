<?php

/*
	CONTROLLERS
 */
require_once "controllers/template.controller.php";

require_once "controllers/products.controller.php";

/*
MODELS
 */

require_once "models/template.model.php";
require_once "models/products.model.php";

/*
OTHERS
 */
require_once "models/routes.php";

$plantilla = new TemplateController();
$plantilla->template();
