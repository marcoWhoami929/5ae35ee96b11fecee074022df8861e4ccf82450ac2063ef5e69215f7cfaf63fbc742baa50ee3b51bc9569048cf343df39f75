<?php

class TemplateController
{
	/*=============================================
	TEMPLATE
	=============================================*/
	public function template()
	{

		include "views/template.php";
	}
	/*=============================================
	STYLES TEMPLATE
	=============================================*/

	public function ctrStyleTemplate()
	{

		$table = "template";

		$response = TemplateModel::mdlStyleTemplate($table);

		return $response;
	}

	/*=============================================
	GET HEADERS
	=============================================*/

	static public function ctrGetHeaders($route)
	{

		$table = "headers";

		$response = TemplateModel::mdlGetHeaders($table, $route);

		return $response;
	}
	/*=============================================
	GET SLIDERS
	=============================================*/

	static public function ctrSlideItems()
	{

		$table = "slide";

		$response = TemplateModel::mdlGetSlideItems($table);

		return $response;
	}
	/*=============================================
	GET STORES
	=============================================*/

	static public function ctrStoreItems()
	{

		$table = "stores";

		$response = TemplateModel::mdlGetStoreItems($table);

		return $response;
	}
	/*=============================================
	GET CATEGORIES
	=============================================*/

	static public function ctrShowCategories()
	{

		$table = "categories";

		$response = TemplateModel::mdlShowCategories($table);

		return $response;
	}
	/*=============================================
	GET MOST SELLED PRODUCTS
	=============================================*/

	static public function ctrShowMostSelledProducts()
	{

		$table = "products";

		$response = TemplateModel::mdlShowMostSelledProducts($table);

		return $response;
	}
	/*=============================================
	GET PAGES MAGAZINE
	=============================================*/

	static public function ctrShowMagazine($brand)
	{

		$table = "magazine";

		$response = TemplateModel::mdlShowMagazine($table, $brand);

		return $response;
	}
	/*=============================================
	GET TESTIMONIALS
	=============================================*/

	static public function ctrShowTestimonials()
	{

		$table = "videos";

		$response = TemplateModel::mdlShowTestimonials($table);

		return $response;
	}
	/*=============================================
	GET SUBCATEGORIES FOR CATEGORY
	=============================================*/

	static public function ctrShowSubcategoriesForCategory($category)
	{

		$table = "subcategories";

		$response = TemplateModel::mdlSubcategoriesForCategory($table, $category);

		return $response;
	}
	/*=============================================
	GET PRODUCTS FOR SUBCATEGORY
	=============================================*/

	static public function ctrShowProductsForSubCategory($subcategory)
	{

		$table = "products";

		$response = TemplateModel::mdlShowProductsForSubCategory($table, $subcategory);

		return $response;
	}
	/*=============================================
	GET DATA BANNER
	=============================================*/

	static public function ctrShowBanner($route)
	{

		$table = "banner";

		$response = TemplateModel::mdlShowBanner($table, $route);

		return $response;
	}
	/*=============================================
	GET DATA COLOR MATCH
	=============================================*/

	static public function ctrShowColorMatch()
	{

		$table = "colormatch";

		$response = TemplateModel::mdlShowColorMatch($table);

		return $response;
	}
	/*=============================================
	GET COLORS COLOR MATCH
	=============================================*/

	static public function ctrShowColors($route)
	{

		$table = "colors";

		$response = TemplateModel::mdlShowColors($table, $route);

		return $response;
	}
	/*=============================================
	GET COORDINATES BY CP
	=============================================*/

	static public function ctrLocatorCoordinatesCp($datos)
	{

		$tabla = "colonias";

		$respuesta = TemplateModel::mdlLocatorCoordinatesCp($tabla, $datos);

		return $respuesta;
	}
}
