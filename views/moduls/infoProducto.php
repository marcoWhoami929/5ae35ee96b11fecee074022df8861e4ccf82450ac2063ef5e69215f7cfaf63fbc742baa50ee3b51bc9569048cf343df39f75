<?php
$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();
$routes = explode("/", $_GET["ruta"]);
$urlBanner =  $routes[0];
$banner = TemplateController::ctrShowBanner($urlBanner);
$mostSelledProducts = TemplateController::ctrShowMostSelledProducts();


?>

<!--=====================================
INFOPRODUCTOS
======================================-->
<div class=" infoproducto mt-10">

    <div class="container">

        <div class="row">

            <?php

            $item =  "route";
            $valor = $routes[0];
            $infoproducto = ProductsController::ctrShowInfoProducto($item, $valor);

            $multimedia = json_decode($infoproducto["multimedia"], true);


            /*=============================================
				VISOR DE IMÁGENES
				=============================================*/

            if ($infoproducto["type"] == "fisico") {

                echo '<div class="col-md-5 col-sm-6 col-xs-12 visorImg">
						
							<figure class="visor">';

                if ($multimedia != null) {

                    for ($i = 0; $i < count($multimedia); $i++) {

                        echo '<img id="lupa' . ($i + 1) . '" class="img-thumbnail" src="' . $servidor . $multimedia[$i]["foto"] . '">';
                    }

                    echo '</figure>

								<div class="flexslider">
								  
								  <ul class="slides">';

                    for ($i = 0; $i < count($multimedia); $i++) {

                        echo '<li>
								     	<img value="' . ($i + 1) . '" class="img-thumbnail" src="' . $servidor . $multimedia[$i]["foto"] . '" alt="' . $infoproducto["title"] . '">
								    </li>';
                    }
                }

                echo '</ul>

							</div>

						</div>';
            } else {

                /*=============================================
					VISOR DE VIDEO
					=============================================*/

                echo '<div class="col-sm-6 col-xs-12">
							
						<iframe class="videoPresentacion" src="https://www.youtube.com/embed/' . $infoproducto["multimedia"] . '?rel=0&autoplay=0" width="100%" frameborder="0" allowfullscreen></iframe>

					</div>';
            }

            ?>

            <!--=====================================
			PRODUCTO
			======================================-->

            <?php

            if ($infoproducto["type"] == "fisico") {

                echo '<div class="col-md-7 col-sm-6 col-xs-12">';
            } else {

                echo '<div class="col-sm-6 col-xs-12">';
            }

            ?>

            <!--=====================================
				REGRESAR A LA TIENDA
				======================================-->

            <div class="col-xs-6">

                <h6>

                    <a href="javascript:history.back()" class="text-default-two">

                        <i class="fa fa-reply"></i> Continuar Visualizando

                    </a>

                </h6>

            </div>

            <!--=====================================
				COMPARTIR EN REDES SOCIALES
				======================================-->

            <div class="col-xs-6 mb-7">




                <div class="mainbox">
                    <input type="checkbox" id="check">
                    <label for="check"><i class="fa fa-share"></i>Compartir</label>
                    <div class="media-icons">
                        <?php
                        echo '<a href="https://www.facebook.com/share.php?u=http://sanfranciscodekkerlab.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="https://api.whatsapp.com/send/?text=https://sanfranciscodekkerlab.com/&type=custom_url&app_absent=0" target="_blank"><i class="fab fa-whatsapp"></i></a>';
                        ?>


                    </div>
                </div>



            </div>

            <div class="clearfix"></div>

            <!--=====================================
				ESPACIO PARA EL PRODUCTO
				======================================-->

            <?php


            /*=============================================
					TITULO
					=============================================*/
            echo '<h1 class=" text-uppercase fw-bold text-danger">' . $infoproducto["title"] . '</h1>';

            /*=============================================
					DETALLES
					=============================================*/

            if ($infoproducto["details"] != null) {

                $detalles = json_decode($infoproducto["details"], true);

                if ($detalles["Codigo"] != null) {

                    echo '<div class="col-md-3 col-xs-12 mt-3">

                    <h4 class="text-danger">' . $detalles["Codigo"] . '</h4>

                        </div>';
                }
            }

            /*=============================================
					DESCRIPCIÓN
					=============================================*/

            echo '<h4 class="text-primary mt-4">Descripción</h4>
            <p class="text-dark" style="text-align:justify">' . $infoproducto["description"] . '</p>';

            ?>

            <!--=====================================
				CARACTERÍSTICAS DEL PRODUCTO
				======================================-->

            <hr>

            <div class="form-group row">

                <?php

                if ($infoproducto["details"] != null) {



                    if ($detalles["Marca"] != null) {

                        echo '<div class="col-md-3 col-xs-12">

                        <div><img class="img-fluid rounded-image h-100" src="views/img/brands/' . $detalles["Marca"] . '.png" alt="..." />

                        </div>

                            </div>';
                    }
                }


                ?>

            </div>

            <!--=====================================
				BOTONES DE COMPRA
				======================================-->

            <div class="row botonesCompra mt-4">

                <?php
                if ($infoproducto["urlBuy"] == "") {
                } else {
                    echo '<div  class="col-lg-12 col-md-8 col-xs-12"><a class="btn btn-lg btn-danger" role="button" href="' . $infoproducto["urlBuy"] . '" target="_blank"><i class="fa fa-shopping-cart"></i>Comprar</a></div>';
                }

                ?>

            </div>
            <div class="row mt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="ficha-tab" data-bs-toggle="tab" data-bs-target="#ficha-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Fichas Técnicas</button>
                    </li>


                </ul>
                <div class="tab-content mt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="ficha-tab-pane" role="tabpanel" aria-labelledby="ficha-tab" tabindex="0">
                        <div class="container col-lg-12 col-md-12 col-sm-12">
                            <div class="row h-100 gx-2 mt-2">
                                <?php

                                $item =  "idProducto";
                                $valor = $infoproducto["id"];
                                $fichasTecnicas = ProductsController::ctrShowTechnicalSheets($item, $valor);
                                foreach ($fichasTecnicas as $key => $value) {


                                    echo '
                                <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                                    <div class="card card-span h-100">
                                        <div class="position-relative"> <img class="img-fluid rounded-3 w-100" src="views/img/products/ficha.png" alt="..." />
                                            <div class="card-actions">
                                                <div class="badge badge-foodwagon bg-primary p-3">
                                                    <div class="d-flex flex-between-center">
                                                        <a href="' . $servidor . $value["url"] . '" target="_blank">
                                                            <div class="text-white fs-3"><i class="fa fa-file-pdf"></i></div>
                                                        </a>

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

                    </div>


                </div>
            </div>

            <!--=====================================
				ZONA DE LUPA
				======================================-->

            <figure class="lupa">

                <img src="">

            </figure>


        </div>

    </div>


</div>

<!--=====================================
ARTÏCULOS RELACIONADOS
======================================-->
<div class="container-fluid productos mt-4">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 tituloDestacado">

                <div class="col-sm-6 col-xs-12">

                    <h1><small>PRODUCTOS RELACIONADOS</small></h1>

                </div>


            </div>

            <div class="clearfix"></div>

            <hr>

        </div>

        <div class="col-lg-12">
            <div class="carousel slide" id="carouselPopularItems" data-bs-touch="false" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="100">
                        <div class="row gx-3 h-100 align-items-center">
                            <?php
                            for ($i = 0; $i < 4; $i++) {

                                $jsonDetails = json_decode($mostSelledProducts[$i]["details"], true);
                                $marca = $jsonDetails["Marca"];

                                echo '<div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="' . $servidor . $mostSelledProducts[$i]["frontPage"] . '" alt="..." />
                                    <div class="card-body ps-0">
                                    
                                        <span class="badge bg-success span-title fw-bold fs-1 text-white" style="height:50px;border-radius: 0px 10px 10px 0px;"><h5 style="margin-top:8px" class="span-title fw-bold fs-1 text-white">' . $mostSelledProducts[$i]["title"] . '</h5></span></span>
                                        <div class="" style="width:100%;margin:2%">
                                            <center><img class="img-fluid rounded-image h-100 offset-1" src="views/img/brands-small/' . $marca . '.png"  /></center> 
                                        </div>
                                    
                                    </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-primary " href="' . $mostSelledProducts[$i]["route"] . '"  role="button">Ver Producto</a></div>
                                </div>
                                ';
                            }

                            ?>
                        </div>
                    </div>

                    <?php
                    /*
                    if (count($mostSelledProducts) > 4) {
                        echo '<div class="carousel-item" data-bs-interval="100">
                        <div class="row gx-3 h-100 align-items-center">';

                        for ($i = 4; $i < count($mostSelledProducts); $i++) {

                            $jsonDetails = json_decode($mostSelledProducts[$i]["details"], true);
                            $marca = $jsonDetails["Marca"];

                            echo '<div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="' . $servidor . $mostSelledProducts[$i]["frontPage"] . '" alt="..." />
                                    <div class="card-body ps-0">
                                    <h5 class="fw-bold text-default-two text-truncate mb-1 offset-1" >' . $mostSelledProducts[$i]["title"] . '</h5>
                                    <div class="">
                                          <center><img class="img-fluid rounded-image h-100 offset-1" src="views/img/brands-small/' . $marca . '.png"  /></center> 
                                    </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2"><a class="btn btn-lg btn-primary " href="' . $mostSelledProducts[$i]["route"] . '"  role="button">Ver Producto</a></div>
                            </div>
                            ';
                        }

                        echo '</div>
                    </div>';
                    }
*/
                    ?>


                </div>
                <!--
                <button class="carousel-control-prev carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="prev"><span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                <button class="carousel-control-next carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="next"><span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
                -->
            </div>
        </div>

    </div>

</div>


<?php

if ($infoproducto["type"] == "fisico") {

    echo '<script type="application/ld+json">

			{
			  "@context": "http://schema.org/",
			  "@type": "Product",
			  "name": "' . $infoproducto["title"] . '",
			  "image": [';

    for ($i = 0; $i < count($multimedia); $i++) {

        echo $servidor . $multimedia[$i]["foto"] . ',';
    }

    echo '],
			  "description": "' . $infoproducto["description"] . '"
	  
			}

		</script>';
} else {
}

?>