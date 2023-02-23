<?php

$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();


$urlBanner =  $routes[0];
$banner = TemplateController::ctrShowBanner($urlBanner);

echo '<section class="mb-0 containerParallax" >
        <div id="parallax" class="parallax-item" style="background-image: url(' . $servidor . $banner["img"] . ');">
        <h1 style="color:#ffffff" class="text-uppercase">' . $banner["title"] . '</h1>
        </div>
</section>';
?>
<section style="margin-top:-10px;margin-bottom:-100px">
    <div class="bg-holder" style="background-image:url(views/img/gallery/cta-two-bg.png);background-position:center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container" style="margin-top:-80px">

        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-xxl-10">
                <div class="card card-span shadow-warning" style="border-radius: 35px;">
                    <div class="card-body py-5">
                        <div class="row justify-content-evenly">
                            <div class="col-md-4">
                                <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="views/img/icons/discounts.png" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <a href="#">
                                            <h3 class="fw-bolder text-1000 mb-0 text-gradient ml-3">Descuentos</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hr-vertical">
                                <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="views/img/icons/color.png" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <a href="#">
                                            <h3 class="fw-bolder text-1000 mb-0 text-gradient ml-3">Formulación de color</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hr-vertical">
                                <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="views/img/icons/shipment.png" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <a href="#">
                                            <h3 class="fw-bolder text-1000 mb-0 text-gradient ml-3">Entrega a domicilio</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-span mb-3 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-xl-12 col-xxl-12 g-0 order-md-0 shadow-warning container-magazine">


                                    <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light text-center mt-2" data-aos="fade-down">Revista Excelo</h1>

                                    <div class="container-flipbook" id="container1" data-aos="fade-up">

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-span mb-3 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-xl-12 col-xxl-12 g-0 order-md-0 shadow-warning container-magazine-2">
                                    <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light text-center mt-2" data-aos="fade-up">Revista Flex</h1>
                                    <div class="container-flipbook" id="container2" data-aos="fade-up">

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