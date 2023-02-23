<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

class ProductsAjax
{


    public $query;
    public function ajaxBuscadorProductos()
    {
        $search = $this->query;
        $response = ProductsController::ctrSearchProducts($search);
        $data = array();
        foreach ($response as $resp) {
            $data[] = $resp[0];
        }

        echo json_encode($data);
    }
}

/*=============================================
Buscar producto
=============================================*/
if (isset($_GET["query"])) {

    $search = new ProductsAjax();
    $search->query = $_GET["query"];
    $search->ajaxBuscadorProductos();
}
