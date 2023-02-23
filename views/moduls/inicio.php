<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$categories = TemplateController::ctrShowCategories();
$mostSelledProducts = TemplateController::ctrShowMostSelledProducts();

$magazineExcelo = TemplateController::ctrShowMagazine('EXCELO');
$magazineFlex = TemplateController::ctrShowMagazine('FLEX');
$testimonials = TemplateController::ctrShowTestimonials();

?>
<div class="overflow-hidden slider-brands">

    <div class="container">
        <div class="d-flex d-lg-block d-xl-flex flex-center mt-6">
            <h2 class="fw-bolder text-1000 mb-4 text-gradient-green mt-4">Nuestras Marcas</h2>
        </div>
        <div class="row flex-center">
            <div class="col-lg-auto">
                <button class="carousel-control-prev s-icon-prev carousel-icon" type="button" data-bs-target="#carouselSearchByFood" data-bs-slide="prev"><span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px" data-aos="fade-up">
                <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="true" data-bs-interval="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/sherwin-williams.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100  bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/goni.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100  bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/3m.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/zaak.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/tekbond.png" alt="..." />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/excelo.png" alt="..." />

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100" src="views/img/brands/flex.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100" src="views/img/brands/automagic.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100" src="views/img/brands/arnold.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100" src="views/img/brands/ultra.png" alt="..." />

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100" src="views/img/brands/planet-color.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/sherwin-williams.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100  bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/goni.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100  bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/3m.png" alt="..." />

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 bg-white"><img class="img-fluid rounded-image h-100 " src="views/img/brands/zaak.png" alt="..." />

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-auto">
                <button class="carousel-control-next s-icon-next carousel-icon" type="button" data-bs-target="#carouselSearchByFood" data-bs-slide="next"><span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
            </div>
        </div>

    </div><!-- end of .container-->

</div>
<section class="slider-brands-mobile">
    <div class="d-flex d-lg-block d-xl-flex flex-center" style="height: 80px;">
        <h2 class="fw-bolder text-1000 mb-4 text-gradient-green ">Nuestras Marcas</h2>
    </div>
    <div id="carousel">

        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/sherwin-williams.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/goni.png" alt="..." /></div>
        <div class="item"><img class="img-fluid rounded-image h-100 " src="views/img/brands/3m.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/zaak.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/tekbond.png" alt="..." /></div>
        <div class="item"><img class="img-fluid rounded-image h-100 " src="views/img/brands/excelo.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/flex.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/automagic.png" alt="..." /></div>
        <div class="item"><img class="img-fluid rounded-image h-100 " src="views/img/brands/arnold.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/ultra.png" alt="..." /></div>
        <div class="item carousel-slide"><img class="img-fluid rounded-image h-100 " src="views/img/brands/planet-color.png" alt="..." /></div>

    </div>
</section>
<section>
    <div class="bg-holder" style="background-image:url(views/img/gallery/cta-one-bg.png);background-position:center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container" id="services">
        <div class="d-flex d-lg-block d-xl-flex flex-center">

        </div>
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-xxl-10">
                <div class="card card-span shadow-warning" style="border-radius: 35px;">
                    <div class="card-body py-5">
                        <div class="row justify-content-evenly">
                            <div class="col-md-4">
                                <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="views/img/icons/advisory.png" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <a href="https://api.whatsapp.com/send?phone=2225055585&text=Hola%21%20necesito%20asesoría%20técnica%20." target="_blank">
                                            <h3 class="fw-bolder text-1000 mb-0 text-gradient ml-3">¿Necesitas Asesoría Técnica?</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hr-vertical">
                                <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="views/img/icons/color.png" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <a href="https://api.whatsapp.com/send?phone=2225055585&text=Hola%21%20quiero%20que%20me%20formulen%20un%20color%20." target="_blank">
                                            <h3 class="fw-bolder text-1000 mb-0 text-gradient ml-3">¿Quieres que te formulen un color?</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hr-vertical">
                                <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="views/img/icons/shipment.png" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <a href="https://api.whatsapp.com/send?phone=2225055585&text=Hola%21%20requiero%20entrega%20a%20domicilio." target="_blank">
                                            <h3 class="fw-bolder text-1000 mb-0 text-gradient ml-3">¿Requieres entrega a domicilio?</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="pb-0 pt-8" data-aos="flip-left">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="views/img/gallery/shop.png" alt="..." /></div>
                            <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning">Ingresa a <span class="text-default">Nuestra Tienda En Linea</span></h1>

                                <img class="img-fluid w-100 fit-cover h-10 rounded-top rounded-md-end rounded-md-top-0" src="views/img/brands/mercado-shops.png" alt="..." />
                                <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="https://dekkerlab.mercadoshops.com.mx/" target="_blank">Visitar Tienda<i class="fas fa-chevron-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>

<section class="py-0" style="margin-top:20px;margin-bottom:50px">

    <div class="container">
        <div class="col-lg-6 text-center mx-auto ">
            <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">Nuestros Productos</h5>
        </div>
        <div class="row gx-2">
            <?php

            foreach ($categories as $key => $value) {
                if ($value["offer"] != 0) {
                    $discount = '<span class="badge bg-danger p-2 ms-3"><i class="fas fa-tag me-2 fs-0"></i><span class="fs-0">' . $value["discountOffer"] . '% off</span></span>';
                } else {
                    $discount = '';
                }

                echo '<div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5 containerCategorie " category="' . $value["route"] . '" data-aos="flip-left">
                <div class="card card-span h-100 text-white rounded-3"><img class="img-fluid rounded-3 h-100" src="' . $servidor . $value["frontPage"] . '" alt="..." />
                    <div class="card-img-overlay ps-0">' . $discount . '</div>
                    <div class="card-body ps-0">
                        <div class="d-flex align-items-center mb-3"><img class="img-fluid" src="views/img/categories/' . $value["route"] . '.png" alt="" />
                            <div class="flex-1 ms-3">
                                <h5 class="mb-0 fw-bold text-default-two text-capitalize ">' . $value["route"] . '</h5><span class="text-primary fs--1 me-1"><i class="fa-solid fa-boxes-stacked"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            ?>



        </div>
    </div><!-- end of .container-->

</section>

<section class="py-0 overflow-hidden bg-info" id="home" data-aos="flip-right">
    <div class="container">
        <div class="row flex-center">

            <div class="col-md-1 col-lg-1 py-8 text-md-start text-center">

            </div>
            <div class="col-md-5 col-lg-4 py-8 text-md-start text-center" style="z-index:1001">

                <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Conoce nuestras tiendas</h1>

                <div class="card w-xxl-75">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Entrega a Domicilio</button>
                                <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-shopping-bag me-2"></i>Recolección</button>
                            </div>
                        </nav>
                        <div class="tab-content mt-3" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="row gx-2 gy-2 align-items-center">

                                    <div class="d-grid gap-3 col-sm-auto">

                                        <a class="btn btn-lg btn-danger" role="button" href="tiendas">Ver Sucursales</a>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form class="row gx-4 gy-2 align-items-center">

                                    <div class="d-grid gap-3 col-sm-auto">
                                        <a class="btn btn-lg btn-danger" role="button" href="tiendas">Ver Sucursales</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7 order-0 order-md-1 mt-0 mt-md-0" style="z-index:1001">
                <div id="google_map" class="google_map ">
                    <div class="map_container rounded-3 w-100">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div style="z-index:1;position:absolute;margin-left:-400px">
                <?php echo '<img class="img-fluid rounded-3 " src="' . $servidor . "vistas/img/plantilla/pancho-pintor-left.png" . '" alt="..." />' ?>
            </div>
        </div>
    </div>
</section>
<section class="py-0 pt-5" data-aos="flip-left" id="sectionMagazine1">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-xl-8 col-xxl-8 g-0 order-md-0" style='background:#16C0A2'>
                                <div class="flipbook-viewport">
                                    <div class="container">
                                        <div class="flipbook">
                                            <?php
                                            foreach ($magazineExcelo as $key => $value) {
                                                echo '  <div style="background-image:url(' . $servidor . $value["image"] . ')"></div>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="flipbook-viewport-mobile">

                                    <div class="container-flipbook" id="container1" data-aos="fade-up">

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-12 col-xl-4 col-xxl-4 p-4 p-lg-5" style="height: 450px;">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning">Nuestras <span class="text-default-three">Promociones</span> <span class="text-default-two"></span></h1>
                                <p class="fs-1 text-texto"></p>

                                <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" style="z-index: 1001;" href="views/magazine/excelo/revista.pdf" download="revista"><i class="fa-solid fa-file-pdf"></i>Descargar Revista</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<section class="py-0 pt-5" data-aos="flip-right" id="sectionMagazine2">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-xl-4 col-xxl-4 p-4 p-lg-5" style="height: 450px;">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning">Nuestras <span class="text-default-two">Promociones</span> <span class="text-default-three"></span></h1>
                                <p class="fs-1 text-texto"></p>
                                <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" style="z-index: 1001;" href="views/magazine/flex/revista.pdf" download="revista"><i class="fa-solid fa-file-pdf"></i>Descargar Revista</a></div>

                            </div>
                            <div class="col-md-12 col-xl-8 col-xxl-8 g-0 order-md-0" style='background:#FB8F8A'>
                                <div class="flipbook-viewport2">
                                    <div class="container2">
                                        <div class="flipbook2">
                                            <?php
                                            foreach ($magazineFlex as $key => $value) {
                                                echo '  <div style="background-image:url(' . $servidor . $value["image"] . ')"></div>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="flipbook-viewport2-mobile">

                                    <div class="container-flipbook" id="container2" data-aos="fade-up">

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

<section id="testimonial" class="py-0 pt-4 overflow-hidden">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-6 text-center mx-auto ">
                <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">Nuestros Clientes nos recomiendan</h5>
            </div>
        </div>
        <div class="row gx-2">
            <?php
            foreach ($testimonials as $key => $value) {
                echo '<div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5 testimonials" data-aos="flip-down">
                <div class="card card-span h-100 text-white rounded-3">
                <div class="flex-1 ms-3 mt-2">
                
                </div>
                <img class="img-fluid rounded-3 h-100" src="' . $servidor . $value["image"] . '" alt="..." />
                    <div class="card-img-overlay ps-7 pt-9"><a class="btn btn-lg btn-primary youtube-video-player youtube" data-video-id="' . $value["url"] . '"><i class="fa-solid fa-play fa-2x ms-2"></i></a></div>
                    <div class="card-body ps-0">
                    <span class="badge bg-soft-danger py-2 px-3"><span class="fs-1 text-danger">' . $value["title"] . '</span></span>    
                    <div class="d-flex align-items-center mb-3"><img class="img-fluid" src="views/img/gallery/bg-logo.png" alt="" />
                            <div class="flex-1 ms-3">
                                <div class="animated_share"> 
                                <div class="animated_share_btn">
                                <a href="https://www.facebook.com/share.php?u=https://youtu.be/' . $value["url"] . '=' . $value["title"] . '" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://api.whatsapp.com/send/?text=https://youtu.be/' . $value["url"] . '&type=custom_url&app_absent=0" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                </div>
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
<section class="py-0" style="margin-top:-50px;margin-bottom:50px">

    <div class="container">
        <div class="col-lg-6 text-center mx-auto ">
            <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-8">Conócenos</h5>
        </div>
        <div class="row gx-2">
            <div class="col-sm-12 col-md-6 col-lg-4 h-100 mb-5" data-aos="flip-left">
                <div class="card card-span h-100 text-white rounded-3">
                    <div class="elfsight-app-f76a7a18-cffd-41c5-8e88-dce7ee8d1f12" style="width:100%;height:500px;overflow:scroll;margin-top:110px"></div>
                    <div class="ps-0" style="z-index:101;position:absolute;margin-top:-50px">

                        <span class="badge bg-danger p-2" style="margin-left:5px;width:350px">
                            <img class="img-fluid" src="views/img/icons/instagram.png" alt="" />
                            <h5 class="fw-bold text-1000 text-truncate fs-3 text-white">Síguenos como</h5><span class="badge bg-soft-success py-2 px-3"><span class="fs-2 text-danger">@sanfranciscodekkerlab</span></span>
                        </span>
                    </div>
                    <div class="card-body ps-0">

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 h-100 mb-5">
                <div class="card card-span h-100 text-white rounded-3" data-aos="flip-up">
                    <div class="elfsight-app-6cd7617d-d7f0-4a65-99a6-f11487de1101" style="width:100%;height:500px;overflow:scroll;margin-top:110px"></div>
                    <div class="ps-0" style="z-index:101;position:absolute;margin-top:-50px">

                        <span class="badge bg-danger p-2" style="margin-left:5px;width:350px">
                            <img class="img-fluid" src="views/img/icons/tiktok.png" alt="" />
                            <h5 class="fw-bold text-1000 text-truncate fs-3 text-white">Síguenos como</h5><span class="badge bg-soft-success py-2 px-3"><span class="fs-3 text-danger"> @dekkerlab </span></span>
                        </span>
                    </div>
                    <div class="card-body ps-0">

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 h-100 mb-5 " data-aos="flip-right">
                <div class="card card-span h-100 text-white rounded-3">

                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.9";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>

                    <div class="fb-page" data-href="https://www.facebook.com/SFDekkerlab/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-adapt-container-height="true" data-hide-cover="false" data-show-facepile="true" style="width:100%;height:500px;overflow:scroll;margin-top:110px">
                        <blockquote cite="https://www.facebook.com/SFDekkerlab/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SFDekkerlab/"></a></blockquote>
                    </div>

                    <div class="ps-0" style="z-index:101;position:absolute;margin-top:-50px">

                        <span class="badge bg-danger p-2" style="margin-left:5px;width:350px">
                            <img class="img-fluid" src="views/img/icons/facebook.png" alt="" />
                            <h5 class="fw-bold text-1000 text-truncate fs-3 text-white">Síguenos como</h5><span class="badge bg-soft-success py-2 px-3"><span class="fs-2 text-danger">San Francisco Dekkerlab</span></span>
                        </span>
                    </div>
                    <div class="card-body ps-0">

                    </div>
                </div>
            </div>



        </div>
    </div><!-- end of .container-->

</section>
<section class="py-0 overflow-hidden bg-info" id="home" data-aos="fade-down">
    <div class="container pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="views/img/gallery/contact.png" alt="..." /></div>
                            <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning">Contá<span class="text-default-three">ctanos</span></h1>
                                <p class="fs-1 text-texto">Escríbenos y nosotros nos ponemos en contacto contigo.</p>
                                <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="contacto">Contactar<i class="fas fa-chevron-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>

<section class="py-0  bg-primary">

    <input id="play" name="control" type="radio">
    <label class="button btn1" for="play">
    </label>
    <input id="pause" name="control" type="radio">
    <label class="button btn2" for="pause">
    </label>
    <input id="stop" name="control" type="radio">
    <div class="fondo">
    </div>
    <div class="sol">
    </div>
    <div class="nubes">
    </div>
    <div class="ciudad">
    </div>

    <div class="bici">
        <div class="llanta llan1">
        </div>
        <div class="marco">
        </div>
        <div class="llanta llan2">
        </div>
    </div>
    <div class="container">
        <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
                <h1 class="fw-bold mb-4 text-gradient-color fs-8 text-color-match">Encuentra tu color </h1><a class="btn btn-danger" href="color-match"><i class="fas fa-chevron-right ms-2"></i></a>
            </div>
        </div>
    </div>
    </input>
    </input>
    </input>

</section>
<style>
    .container-flipbook {
        height: 70vh;
        width: 80%;
        margin: 20px auto;

    }

    .fullscreen {
        background-color: #333;
    }
</style>
<script type="text/javascript">
    function loadApp() {

        // Create the flipbook

        $('.flipbook').turn({
            // Width

            width: 722,

            // Height

            height: 420,

            // Elevation

            elevation: 50,

            // Enable gradients

            gradients: true,

            // Auto center this flipbook

            autoCenter: true

        });

        $('.flipbook2').turn({
            // Width

            width: 722,

            // Height

            height: 420,

            // Elevation

            elevation: 50,

            // Enable gradients

            gradients: true,

            // Auto center this flipbook

            autoCenter: true

        });
    }

    // Load the HTML4 version if there's not CSS transform

    yepnope({
        test: Modernizr.csstransforms,
        yep: ['views/plugins/turnjs/turn.js'],
        nope: ['views/plugins/turnjs/turn.html4.min.js'],
        both: ['views/plugins/turnjs/basic.css'],
        complete: loadApp
    });

    var template = {
        html: 'views/plugins/3dflipbook/templates/default-book-view.html',
        links: [{
            rel: 'stylesheet',
            href: 'views/plugins/3dflipbook/css/font-awesome.min.css'
        }],
        styles: [
            'views/plugins/3dflipbook/css/short-black-book-view.css'
        ],
        script: 'views/plugins/3dflipbook/js/default-book-view.js'
    };

    // Book 1 {
    $('#container1').FlipBook({
        pdf: '<?php echo $servidor ?>revistas/excelo.pdf',
        template: template
    });
    // }

    // Book 2 {
    $('#container2').FlipBook({
        pdf: '<?php echo $servidor ?>revistas/flex.pdf',
        template: template
    });
    // }
</script>