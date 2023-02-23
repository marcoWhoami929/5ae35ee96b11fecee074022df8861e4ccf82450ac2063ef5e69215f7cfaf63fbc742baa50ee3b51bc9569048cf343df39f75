<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$routes = explode("/", $_GET["ruta"]);
$urlBanner =  $routes[0];

$subcategoriesForCategory = TemplateController::ctrShowSubcategoriesForCategory($urlBanner);
$banner = TemplateController::ctrShowBanner($urlBanner);

echo '<section class="mb-0 containerParallax" >
        <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
        <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
        </div>
</section>';

?>

<section id="pt-0 overflow-hidden" style="margin-top:-5%">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">

                <h6>

                    <a href="javascript:history.back()" class="text-default-two">

                        <i class="fa fa-reply"></i> Continuar Visualizando

                    </a>

                </h6>

            </div>
        </div>
        <div class="row gx-2">

            <?php
            if (count($subcategoriesForCategory) > 0) {
                foreach ($subcategoriesForCategory as $key => $value) {


                    echo '<div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5 divContainerSubcategories" subcategory="' . $value["route"] . '">
                    <div class="card card-span h-100 text-white rounded-3"><img class="img-fluid rounded-3 h-100" src="' . $servidor . $value["frontPage"] . '" alt="..." />
                        <div class="card-img-overlay ps-0"><div class="span-bookmark bg-danger p-2 ms-3"><i class="fa-solid fa-bookmark"></i></div></div>
                        <div class="card-body ps-0">
                        <div class="d-flex align-items-center mb-3"><img class="img-fluid" src="' . $url . 'views/img/categories/' . $urlBanner . '.png" alt="" />
                        <div class="flex-1 ms-3">
                        <span class="badge bg-success" style="width:100%;border-radius: 0px 10px 10px 0px;"><h5 style="margin-top:8px" class="span-title fw-bold fs-1 text-white">' . $value["subcategory"] . '</h5></span></span>
                        </div>
                    </div>
                           
                        </div>
                    </div>
                </div>';
                }
            } else {
                echo '<div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-12 col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg">
                                <h1 class="text-center "></h1>
        
        
                            </div>
        
                            <div class="contant_box_404">
                            <div class="col-lg-6 text-center mx-auto ">
                            <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm ">!!Upps aun no hay ningun dato</h5>
                        </div>
        
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }

            ?>

        </div>
    </div>
</section>