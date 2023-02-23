<?php
$servidor = Route::ctrRouteServer();
$url = Route::ctrRoute();

$template = TemplateController::ctrStyleTemplate();



?>
<nav class="navbar navbar-expand-lg bg-navbar fixed-top" data-navbar-on-scroll="data-navbar-on-scroll" style="width:100%;height:50px">
    <div class="container-lg">
        <div class="row">

            <div class="col d-flex flex-row">
                <div class="phone fw-bold">Llámanos: <a href="tel:<?php echo $template["phone"] ?>"><?php echo $template["phone"] ?></a></div>
                <div class="social">
                    <ul class="social_list">
                        <?php
                        $jsonRedesSociales = json_decode($template["socialNetworks"], true);
                        foreach ($jsonRedesSociales as $key => $value) {

                            echo '<li class="social_list_item">
                                            <a href="' . $value["url"] . '" target="_blank">
                                                <i class="' . $value["red"] . '  ' . $value["estilo"] . '" aria-hidden="true"></i>
                                            </a>
                                        </li>';
                        }

                        ?>

                    </ul>
                </div>
                <div class="mail_text mail fw-bold">Envianos un correo a: <a href="mailto:<?php echo $template["email"] ?>"> <?php echo $template["email"] ?></a></div>
            </div>

        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top styleNavbar" data-navbar-on-scroll="data-navbar-on-scroll">

    <div class="container">

        <a class="navbar-brand d-inline-flex" href="<?php echo $url; ?>"><img class="d-inline-block" src="<?php echo $servidor . $template["logo"]; ?>" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient"></span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
            <div class="main_nav_container mt-3 ml-auto mx-auto pt-4 pt-lg-0 d-block d-lg-none d-xl-block">
                <ul class="main_nav_list">
                    <li class="main_nav_item mb-0 fw-bold text-lg-center"><a href="inicio">Inicio</a></li>
                    <!--
                    <li class="main_nav_item mb-0 fw-bold text-lg-center"><a href="productos">Productos</a></li>
                    -->
                    <li class="main_nav_item mb-0 fw-bold text-lg-center"><a href="tiendas">Tiendas</a></li>
                    <li class="main_nav_item mb-0 fw-bold text-lg-center"><a href="nuestra-empresa">Nuestra Empresa</a></li>
                    <li class="main_nav_item mb-0 fw-bold text-lg-center"><a href="contacto">Contacto</a></li>

                </ul>
            </div>

            <div class="input-group-icon pe-0"><i class="fas fa-search input-box-icon text-primary"></i>

                <!--
                <input class="form-control border-warning input-box bg-100 typeahead" type="text" placeholder="Buscar..." />-->
                <input type="search" class="form-control border-warning input-box bg-100 typeahead " autocomplete="on" placeholder="Buscar Producto" />
            </div>

        </div>
    </div>
</nav>

<script type="text/javascript">
    $("input.typeahead").typeahead({
        hint: true,
        highlight: true,
        /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing */ ,
        source: function(query, process) {
            return $.get(
                "ajax/products.ajax.php", {
                    query: query,
                },
                function(data) {
                    data = $.parseJSON(data);
                    return process(data);
                }
            );
        },
        updater: function(selection) {
            var product = selection.toLowerCase();
            product = product.replace(/ /g, "-");
            window.location.href = product;
        },
    });
</script>