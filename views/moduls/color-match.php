<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$routes = explode("/", $_GET["ruta"]);
$urlBanner =  $routes[0];

$banner = TemplateController::ctrShowBanner($urlBanner);
$colorMatch = TemplateController::ctrShowColorMatch();

echo '<section class="mb-0 containerParallax" >
        <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
        <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
        </div>
</section>';

?>

<section class="container-color-match">
    <div class="color-match container col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <?php

            foreach ($colorMatch as $key => $value) {
                echo '<div class="container-color col-lg-4 col-md-4 col-sm-12 mt-3" data-aos="flip-down">
                <div class="inner">
                    <div class="content-color">
                        <span>Color Match</span>
                        <h2>' . $value["title"] . '</h2>
                    </div>
                    <div class="lower">
                        <img src="' . $servidor . $value["img"] . '" class="image" alt="">
                        <ul class="features-list">
    
                        </ul>
                    </div>
                </div>
                <a class="cta brandColor" href="' .  $value["route"] . '" type="button">
                    Ver más
                </a>
            </div>';
            }


            ?>

        </div>

    </div>

</section>