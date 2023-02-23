<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$routes = explode("/", $_GET["ruta"]);
$urlBanner =  $routes[0];

$productsForSubCategory = TemplateController::ctrShowProductsForSubCategory($urlBanner);
$banner = TemplateController::ctrShowBanner($urlBanner);

if ($banner) {
    echo '<section class="mb-0 containerParallax" >
    <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
    <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
    </div>
</section>';
} else {
    echo '<section class="mb-0 containerParallax" >
    <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . 'vistas/img/banner/bannner-general.png);">
    <h1 style="color:#ffffff" class="text-uppercase">' . $urlBanner . '</h1>
    </div>
    </section>';
}


?>

<section class="pt-0 overflow-hidden">

    <!------------------------------------>
    <div class="container col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-xs-6">

                <h6>

                    <a href="javascript:history.back()" class="text-default-two">

                        <i class="fa fa-reply"></i> Continuar Visualizando

                    </a>

                </h6>

            </div>
        </div>
        <div class="row">
            <?php
            if (count($productsForSubCategory) > 0) {
                foreach ($productsForSubCategory as $key => $value) {
                    $jsonDetails = json_decode($value["details"], true);

                    $marca = $jsonDetails["Marca"];

                    echo '<div class="col-sm-6 col-md-4 col-lg-3 h-100">
                            <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100"  src="' . $servidor . $value["frontPage"] . '" alt="..." />
                                <div class="card-body ps-0">
                                    
                                    <span class="badge bg-success span-title fw-bold fs-1 text-white" style="height:50px;border-radius: 0px 10px 10px 0px;"><h5 style="margin-top:8px" class="span-title fw-bold fs-1 text-white">' . $value["title"] . '</h5></span></span>
                                    <div class="" style="width:100%;margin:2%">
                                          <center><img class="img-fluid rounded-image h-100 offset-1" src="views/img/brands-small/' . $marca . '.png"  /></center> 
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="d-grid gap-2"><a class="btn btn-lg btn-primary" href="' . $value["route"] . '" role="button">Ver Producto</a></div>
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
                            <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm ">!!Upps aun no hay productos en esta categoria</h5>
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