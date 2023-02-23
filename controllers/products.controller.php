<?php

class ProductsController
{
    /*=============================================
	SHOW CATEGORIES
	=============================================*/

    static public function ctrShowCategories($item, $valor)
    {

        $table = "categories";

        $response = ProductsModel::mdlShowCategories($table, $item, $valor);

        return $response;
    }

    /*=============================================
	SHOW SUBCATEGORIES
	=============================================*/

    static public function ctrShowSubCategories($item, $valor)
    {

        $table = "subcategories";

        $response = ProductsModel::mdlShowSubCategories($table, $item, $valor);

        return $response;
    }
    /*=============================================
	SHOW INFOPRODUCTO
	=============================================*/

    static public function ctrShowProductInfo($item, $valor)
    {

        $table = "products";

        $response = ProductsModel::mdlShowProductInfo($table, $item, $valor);

        return $response;
    }
    /*=============================================
	SHOW BANNER
	=============================================*/

    static public function ctrShowHeader($ruta)
    {

        $tabla = "headers";

        $respuesta = ProductsModel::mdlShowHeaders($tabla, $ruta);

        return $respuesta;
    }
    /*=============================================
	SHOW INFOPRODUCTO
	=============================================*/

    static public function ctrShowInfoProducto($item, $valor)
    {

        $tabla = "products";

        $respuesta = ProductsModel::mdlShowInfoProducto($tabla, $item, $valor);

        return $respuesta;
    }
    /*=============================================
	SEARCH PRODUCTS
	=============================================*/

    static public function ctrSearchProducts($search)
    {

        $tabla = "products";

        $respuesta = ProductsModel::mdlSearchProducts($tabla, $search);

        return $respuesta;
    }
    /*=============================================
	SHOW TECNICAL SHEETS
	=============================================*/

    static public function ctrShowTechnicalSheets($item, $valor)
    {

        $tabla = "technicasheets";

        $respuesta = ProductsModel::mdlShowShowTechnicalSheets($tabla, $item, $valor);

        return $respuesta;
    }
}
