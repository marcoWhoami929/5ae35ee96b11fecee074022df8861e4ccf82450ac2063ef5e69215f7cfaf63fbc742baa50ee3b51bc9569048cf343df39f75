<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$routes = explode("/", $_GET["ruta"]);
$urlBanner =  $routes[0];

$banner = TemplateController::ctrShowBanner($urlBanner);
$route = $banner["route"];
$colors = TemplateController::ctrShowColors($route);


echo '<section class="mb-0 containerParallax" >
        <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
        <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
        </div>
</section>';

?>


<section class="xop-section ">
    <div class="xop-wrapper">
        <div class="xop-container">
            <?php
            foreach ($colors as $key => $value) {
                echo ' <a href="#" class="project" data-aos="flip-down">
                <figure>
                    <img src="' . $servidor .  "vistas/img/color-match/" . $banner["route"] . "/" . $value["imgColor"] . '" alt="" title="' . $value["name"] . '">
                    <figcaption>
                        <div>
                            <h3>' . $value["name"] . '</h3>
                            <p class="cta">' . $value["code"] . '</p>
                        </div>
                    </figcaption>
                </figure>
            </a>';
            }

            ?>


        </div>
    </div>
</section>