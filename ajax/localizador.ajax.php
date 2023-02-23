<?php
require_once "../controllers/template.controller.php";
require_once "../models/template.model.php";

class Locator
{
    public $accion;
    public $codigo;

    public  function locatorCoordinatesCp()
    {

        $datos = array(
            "codigo" => $this->codigo

        );

        $respuesta = TemplateController::ctrLocatorCoordinatesCp($datos);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["accion"])) {
    if ($_POST["accion"] === "localizarCoordenadas") {
        $locator = new Locator();
        $locator->codigo = $_POST["codigo"];
        $locator->locatorCoordinatesCp();
    }
}
