<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
    session_start();

    $server = Route::ctrRouteServer();

    $template = TemplateController::ctrStyleTemplate();

    echo '<link rel="icon" type="image/x-icon" href="' . $server . $template["icon"] . '">';

    /*=============================================
		MANTENER LA RUTA FIJA DEL PROYECTO
		=============================================*/

    $url = Route::ctrRoute();

    /*=============================================
		MARCADO DE CABECERA
		=============================================*/

    $routes = array();

    if (isset($_GET["ruta"])) {

        $routes = explode("/", $_GET["ruta"]);

        $route = $routes[0];
    } else {

        $route = "inicio";
    }

    $headers = TemplateController::ctrGetHeaders($route);

    if (!$headers["route"]) {

        $route = "inicio";

        $headers = TemplateController::ctrGetHeaders($route);
    }

    ?>



    <!--=====================================
	Marcado HTML5
	======================================-->
    <meta name="title" content="<?php echo  $headers['title']; ?>">
    <meta name="description" content="<?php echo  $headers['description']; ?>">
    <meta name="robots" content="noodp">
    <meta name="keywords" content="<?php echo  $headers['keywords']; ?>">
    <title><?php echo  $headers['title']; ?></title>
    <!--=====================================
	Marcado de Open Graph FACEBOOK
	======================================-->

    <link rel="canonical" href="https://sanfranciscodekkerlab.com/">
    <meta property="og:locale" content="es_Es">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $headers['title']; ?>">
    <meta property="og:description" content="<?php echo  $url . $headers['description']; ?>">
    <meta property="og:url" content="<?php echo  $url . $headers['route']; ?>">
    <meta property="og:site_name" content="San Francisco Dekkerlab">
    <meta property="image" content="<?php echo  $headers['frontPage']; ?>">

    <!--=====================================
	Marcado para DATOS ESTRUCTURADOS GOOGLE
	======================================-->

    <meta itemprop="name" content="<?php echo $headers['title']; ?>">
    <meta itemprop="url" content="<?php echo $url . $headers['route']; ?>">
    <meta itemprop="description" content="<?php echo $headers['description']; ?>">
    <meta itemprop="image" content="<?php echo $headers['frontPage']; ?>">
    <!--=====================================
	PLUGINS CSS
	======================================-->
    <link href="<?php echo $url; ?>views/plugins/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/plugins/OwlCarousel2-2.2.1/animate.css">
    <!--=====================================
	STYLES VIEWS
	======================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/styles-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/videos.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/plugins/aos/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">


    <!--=====================================
	PLUGINS JS
	======================================-->
    <script src="<?php echo $url; ?>views/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $url; ?>views/plugins/aos/aos.js"></script>
    <script src="<?php echo $url; ?>views/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?php echo $url; ?>views/plugins/easing/easing.js"></script>
    <script src="<?php echo $url; ?>views/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="<?php echo $url; ?>views/plugins/@popperjs/popper.min.js"></script>
    <script src="<?php echo $url; ?>views/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>views/plugins/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?php echo $url; ?>views/plugins/fontawesome/all.min.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <!--=====================================
	Pixel de Facebook
	======================================-->

    <?php echo $template["pixelFacebook"]; ?>


</head>

<body>
    <?php

    echo '<main class="main" id="top">';

    include "moduls/header.php";

    /*=============================================
	DINAMIC CONTENT
	=============================================*/

    $routes = array();
    $route = null;
    $infoProduct = null;


    if (isset($_GET["ruta"])) {


        $routes = explode("/", $_GET["ruta"]);

        $item = "route";
        $valor =  $routes[0];


        /*=============================================
	URL'S CATEGORIES
	=============================================*/

        $routeCategories = ProductsController::ctrShowCategories($item, $valor);

        if ($routes[0] == $routeCategories["route"]) {

            $route = $routes[0];
        }

        /*=============================================
	URL'S SUBCATEGORIES
	=============================================*/

        $routeSubCategories = ProductsController::ctrShowSubCategories($item, $valor);

        foreach ($routeSubCategories as $key => $value) {

            if ($routes[0] == $value["route"]) {

                $route = $routes[0];
            }
        }

        /*=============================================
	URL'S AMIGABLES DE PRODUCTOS
	=============================================*/

        $routeProducts = ProductsController::ctrShowProductInfo($item, $valor);

        if ($routes[0] == $routeProducts["route"]) {

            $productInfo = $routes[0];
        } else {
            $productInfo = null;
        }

        /*=============================================
	LISTA BLANCA DE URL'S AMIGABLES
	=============================================*/

        if ($route != null ||  $routes[0] == "lo-mas-visto" ||  $routes[0] == "productos") {

            include "moduls/productos.php";
        } else if ($productInfo != null) {

            include "moduls/infoproducto.php";
        } else if ($routes[0] == "aviso-privacidad" || $routes[0] == "contacto" || $routes[0] == "nuestra-empresa" || $routes[0] == "revista" || $routes[0] == "tiendas") {

            include "moduls/" . $routes[0] . ".php";
        } else if ($routes[0] == "inicio") {

            include "moduls/slide.php";
            include "moduls/inicio.php";
        } else {

            include "moduls/404.php";
        }
    } else {

        include "moduls/slide.php";
        include "moduls/inicio.php";
    }


    include "moduls/footer.php";
    echo '</main>';
    ?>
    <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
    <script src="<?php echo $url; ?>views/js/theme.js"></script>
    <script src="<?php echo $url; ?>views/js/slide.js"></script>
    <script src="<?php echo $url; ?>views/js/videos.js"></script>
    <!--=============================
	ACTIONS VIEWS
	================================-->


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA_dlGznsov-uJDQUmmsHIR_vsA103iiLc"></script>

    <!--=====================================
https://developers.facebook.com/
======================================-->

    <?php echo $template["apiFacebook"]; ?>

    <!--=====================================
Pixel de Google Analytics
======================================-->

    <?php echo $template["apiGoogleAnalytics"]; ?>

    <script>
        AOS.init();
    </script>
</body>

</html>