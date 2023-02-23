<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();

$urlBanner = $routes[0];
$banner = TemplateController::ctrShowBanner($urlBanner);

echo '<section class="mb-0 containerParallax" >
        <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
        <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
        </div>
</section>';
?>
<section class="py-0 " data-aos="flip-left" id="aboutUs">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0" src="views/img/gallery/about.png" alt="" /></div>
                            <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning"><span class="text-default-three">¿Quienes</span> <span class="text-default-four">Somos?</span></h1>
                                <p class="fs-1 text-main-text fw-semi-bold">San Francisco DEKKERLAB es una empresa lider en la Ciudad de Puebla México, creada en el año de 1986, dedicada a la comercialización de las mejores marcas de pinturas, recubrimientos, solventes y productos relacionados para los segmentos automotriz, industrial y arquitectónico.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<section class="mb-0 containerParallax" data-aos="fade-down" id="containerColor">
    <div id="parallax" class="parallax-item" style="background-image: url(views/img/gallery/banner-footer-2.png);">
        <h1 style="color:#FF2A4F" class="text-capitalize">¿De que color se te antoja?</h1>
    </div>
</section>
<section data-aos="fade-left" id="containerMision">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="views/img/gallery/mision.png" alt="" /></div>
                            <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning"><span class="text-default-three">Nuestra</span> <span class="text-default-three">Misión</span></span></h1>
                                <p class="fs-1 text-main-text fw-semi-bold">Acrecentar nuestro liderazgo en el mercado de recubrimientos automotrices, industriales y arquitectónicos, mediante los mejores sistemas y personal altamente calificado que aporte soluciones integrales y de valor para nuestros clientes, además de asegurar la rentabilidad y futuro de la empresa.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="pt-0" data-aos="flip-right">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0" src="views/img/gallery/vision.png" alt="" /></div>
                            <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning"><span class="text-default-three">Nuestra</span> <span class="text-default-three">Visión</span></span></h1>
                                <p class="fs-1 text-main-text fw-semi-bold">Ser el proveedor líder de los productos necesarios en los procesos de recubrimientos automotrices, industriales y arquitectónicos en el mercado nacional.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="pt-0" data-aos="flip-left">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-span mb-3 shadow-lg">
                    <div class="card-body py-0">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="views/img/gallery/valores.png" alt="" /></div>
                            <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                <h1 class="card-title mt-xl-5 mb-4 text-warning"><span class="text-default-three">Nuestros</span> <span class="text-default-three">Valores</span></span></h1>
                                <p class="fs--1 text-main-text fw-semi-bold"><img src="views/img/icons/pin-sfd.png" class="img-fluid "><span class="text-default-three fs-0">Servicio al cliente:</span> Como la realización del trabajo excelente para cumplir con los requerimientos de los clientes.</p>
                                <p class="fs--1 text-main-text fw-semi-bold"><img src="views/img/icons/pin-sfd.png" class="img-fluid "><span class="text-default-three fs-0">Integridad:</span> Ser honrados, respetuosos, decentes, conducirnos con la verdad, de conducta recta honesta en nuestras relaciones humanas y de negocios.</p>
                                <p class="fs--1 text-main-text fw-semi-bold"><img src="views/img/icons/pin-sfd.png" class="img-fluid "><span class="text-default-three fs-0">Perseverancia:</span> Creemos en el trabajo intenso y en nuestro equipo para lograr nuestra misión.</p>
                                <p class="fs--1 text-main-text fw-semi-bold"><img src="views/img/icons/pin-sfd.png" class="img-fluid "><span class="text-default-three fs-0">Compromiso:</span> Como el cumplimiento de acuerdos, convenios, promesas, tiempos y formas adquiridos con los demás.</p>
                                <p class="fs--1 text-main-text fw-semi-bold"><img src="views/img/icons/pin-sfd.png" class="img-fluid "><span class="text-default-three fs-0">Preparación:</span> Apreciamos la constante capacitación para el trabajo y el desarrollo personal con el fin de dar soluciones de valor a nuestros clientes.</p>
                                <p class="fs--1 text-main-text fw-semi-bold"><img src="views/img/icons/pin-sfd.png" class="img-fluid "><span class="text-default-three fs-0">Eficiencia y eficacia:</span> Como el logro de los objetivos basados en la optimización de los recursos disponibles.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>