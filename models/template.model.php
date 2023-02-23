<?php

require_once "conexion.php";

class TemplateModel
{

    static public function mdlStyleTemplate($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	HEADERS
	=============================================*/

    static public function mdlGetHeaders($table, $ruta)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE route = :ruta");

        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	SLIDE ITEMS
	=============================================*/

    static public function mdlGetSlideItems($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE active = 1 order by orden asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	STORE ITEMS
	=============================================*/

    static public function mdlGetStoreItems($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE active = 1");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW CATEGORIES
	=============================================*/

    static public function mdlShowCategories($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT cat.*,head.frontPage FROM $table as cat inner join headers as head ON cat.route = head.route WHERE cat.state = 1 and type = 1 ORDER BY cat.id asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW MOST SELLED PRODUCTS
	=============================================*/

    static public function mdlShowMostSelledProducts($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT id,title,price,frontPage,urlBuy,details,route FROM $table WHERE selled = 1 ");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	GET PAGES MAGAZINE
	=============================================*/

    static public function mdlShowMagazine($table, $brand)
    {

        $stmt = Conexion::conectar()->prepare("SELECT *  FROM $table WHERE active = 1 and brand = :brand");

        $stmt->bindParam(":brand", $brand, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW TESTIMONIALS
	=============================================*/

    static public function mdlShowTestimonials($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE state = 1");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW PRODUCTS FOR CATEGORY
	=============================================*/

    static public function mdlSubcategoriesForCategory($table, $category)
    {

        $stmt = Conexion::conectar()->prepare("SELECT sub.*,head.frontPage FROM $table as sub inner join headers as head ON sub.route = head.route inner join categories as cat ON sub.categoryId = cat.id  WHERE sub.state = 1 and cat.route = :category ORDER BY sub.id asc");

        $stmt->bindParam(":category", $category, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW PRODUCTS FOR SUBCATEGORY
	=============================================*/

    static public function mdlShowProductsForSubCategory($table, $subcategory)
    {

        $stmt = Conexion::conectar()->prepare("SELECT prod.id,prod.title,prod.price,prod.frontPage,prod.urlBuy,prod.details,prod.route FROM products as prod INNER JOIN subcategories as sub ON prod.subcategoryId = sub.id WHERE sub.route = :subcategory");

        $stmt->bindParam(":subcategory", $subcategory, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW DATA BANNER
	=============================================*/

    static public function mdlShowBanner($table, $route)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE state = 1 and route = :route");

        $stmt->bindParam(":route", $route, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW DATA COLOR MATCH
	=============================================*/

    static public function mdlShowColorMatch($table)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE state = 1");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW COLORS COLOR MATCH
	=============================================*/

    static public function mdlShowColors($table, $route)
    {

        $stmt = Conexion::conectar()->prepare("SELECT col.* FROM `colors` as col INNER JOIN colormatch as colm ON col.idColorMatch = colm.id WHERE colm.route = :route");

        $stmt->bindParam(":route", $route, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SHOW LOCATOR CP 
	=============================================*/
    static public function mdlLocatorCoordinatesCp($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("SELECT latitud,longitud FROM $tabla WHERE codigo_postal = :codigo limit 1");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
}
