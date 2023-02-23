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
<div class="contact2" style="background-image:url(views/img/gallery/map.png)" id="contact">
        <div class="container">
                <div class="row contact-container">
                        <div class="col-lg-12">
                                <div class="card card-shadow border-0 mb-4 div-contact">
                                        <div class="row">
                                                <div class="col-lg-8 bg-main bg-contact">
                                                        <div class="contact-box p-4">

                                                                <h1 class="card-title text-warning">Contáctanos </h1>
                                                                <div id="form-message-warning" class="mb-4"></div>
                                                                <div id="form-message-success" class="mb-4">
                                                                        Your message was sent, thank you!
                                                                </div>
                                                                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                                                        <div class="row">
                                                                                <div class="col-lg-6">
                                                                                        <div class="form-group mt-3">
                                                                                                <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nombre completo">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                        <div class="form-group mt-3">
                                                                                                <input class="form-control" type="email" id="email" name="email" placeholder="Correo electrónico">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                        <div class="form-group mt-3">
                                                                                                <input class="form-control" type="text" id="subject" name="subject" placeholder="Asunto">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                        <div class="form-group mt-3">
                                                                                                <input class="form-control" type="phone" id="phone" name="phone" placeholder="Celular">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                        <div class="form-group mt-3">

                                                                                                <textarea class="form-control" id="message" name="message" rows="4" cols="50" placeholder="Escriba su mensaje."></textarea>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                        <div class="d-grid gap-2 mt-3"> <input type="submit" class="btn btn-lg btn-primary" value="Contactar">
                                                                                                <div class="submitting"></div>
                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                </form>
                                                        </div>
                                                </div>
                                                <div class="col-lg-4 bg-image " style="background-image:url(views/img/gallery/contact-form.png)">
                                                        <div class="detail-box p-4">

                                                                <h4 class="card-title text-warning">Domicilio </h4>
                                                                <p class="text-white op-7">
                                                                        <i class="fa-solid fa-house-user me-2 fs-0"></i> Calle Ejido 5970, San Baltazar Linda Vista, CP 72550 Puebla,Puebla.
                                                                </p>
                                                                <h4 class="card-title text-warning">Llámanos </h4>
                                                                <a href="tel:2222488604">
                                                                        <p class="text-default-five fw-bold op-7">
                                                                                <i class="fa-solid fa-phone me-2 fs-0"></i>(222) 248 86 04
                                                                        </p>
                                                                </a>

                                                                <span class="badge bg-soft-danger p-2"><span class="fw-bold  text-danger"><i class="fa-solid fa-envelope me-2 fs-0"></i>contacto@sanfranciscodekkerlab.com</span></span>
                                                                <a href="https://sanfranciscodekkerlab.com/"><span class="badge bg-soft-danger p-2 mt-2"><span class="fw-bold  text-danger"><i class="fa-solid fa-globe me-2 fs-0"></i>sanfranciscodekkerlab.com</span></span> </a>

                                                                <div class="round-social light">
                                                                        <a href="https://www.facebook.com/SFDekkerlab" target="_blank" class="ml-0 text-decoration-none text-white border border-white rounded-circle"><i class="fa-brands fa-facebook"></i></a>
                                                                        <a href="https://www.instagram.com/sanfranciscodekkerlab/" target="_blank" class="text-decoration-none text-white border border-white rounded-circle"><i class="fa-brands fa-instagram"></i></a>
                                                                        <a href="https://www.tiktok.com/@dekkerlab" target="_blank" class="text-decoration-none text-white border border-white rounded-circle"><i class="fa-brands fa-tiktok"></i></a>
                                                                        <a href="https://api.whatsapp.com/send?phone=512225055585&text=Me%20gustaría%20recibir%20mas%20información%20sobre%20sus%20productos." target="_blank" class="text-decoration-none text-white border border-white rounded-circle"><i class="fa-brands fa-whatsapp"></i></a>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<script type="text/javascript">
        if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
        }
</script>