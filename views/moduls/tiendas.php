<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$routes = explode("/", $_GET["ruta"]);
$urlBanner =  $routes[0];

$banner = TemplateController::ctrShowBanner($urlBanner);


echo '<section class="mb-0 containerParallax" >
        <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
        <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
        </div>
</section>';

?>
<section class="py-0">
    <div class="container">
        <div class="row flex-center">

            <div class="col-md-12 col-lg-12 text-md-start text-center" id="tabList">
                <div class="card w-xxl-75">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa-solid fa-location-pin me-2"></i>Buscar por código postal</button>

                                <button class="nav-link mb-3 btnMyLocation" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa-solid fa-location-crosshairs me-2"></i>Encuentrame</button>

                                <button class="nav-link mb-3 btnClearLocation" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa-solid fa-trash me-2"></i>Limpiar Busqueda</button>

                            </div>
                        </nav>
                        <div class="tab-content mt-3" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="row gx-2 gy-2 align-items-center">
                                    <div class="input-group-icon pe-2"><i class="fas fa-search input-box-icon text-primary"></i>
                                        <input class="form-control border-0 input-box bg-100" id="postalCode" type="search" placeholder="Ingresar código postal" aria-label="Search" />
                                    </div>

                                    <div class="d-grid bottom-0" style="margin-top:-50px"><a class="btn btn-lg btn-primary mt-xl-6 btnSearchCpMarker"><i class="fas fa-search me-2"></i>Buscar</a></div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<section class="py-0 pt-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-5 col-xl-5 col-xxl-5 p-4 p-lg-5 bg-main div-accordion ">
                                <div class="container-accordion" id="containerAccordion">

                                </div>

                            </div>
                            <div class="col-md-4 col-lg-7 col-xl-7 col-xxl-7 g-0 order-md-0" style=' background:#FB8F8A'>
                                <div id="google_map" class="map-tiendas">
                                    <div class="map_container  w-100">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>