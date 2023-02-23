<?php

require_once "conexion.php";

class ProductsModel
{
    /*=============================================
	SHOW CATEGORIES
	=============================================*/

    static public function mdlShowCategories($table, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	SHOW SUBCATEGORIES
	=============================================*/

    static public function mdlShowSubCategories($table, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW INFOPRODUCTO
	=============================================*/

    static public function mdlShowProductInfo($table, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW BANNER
	=============================================*/

    static public function mdlShowHeaders($tabla, $ruta)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE route = :ruta");

        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW INFOPRODUCTO
	=============================================*/

    static public function mdlShowInfoProducto($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SEARCH PRODUCTS
	=============================================*/

    static public function mdlSearchProducts($tabla, $search)
    {

        $stmt = Conexion::conectar()->prepare("SELECT title FROM $tabla WHERE title  like '%" . $search . "%'");


        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW TECNICAL SHEETS
	=============================================*/

    static public function mdlShowShowTechnicalSheets($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}
