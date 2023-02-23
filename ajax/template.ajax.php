<?php

require_once "../controllers/template.controller.php";
require_once "../models/template.model.php";

class TemplateAjax
{

    public function ajaxStyleTemplate()
    {

        $response = TemplateController::ctrStyleTemplate();

        echo json_encode($response);
    }
}

$objeto = new TemplateAjax();
$objeto->ajaxStyleTemplate();
