$(document).ready(function () {
  "use strict";
  var map;
  //parallax();
  categoriesAction();
  subcategoriesAction();
  initHomeSlider();
  initGoogleMap(19.012106071216763, -98.20581416067367, 12, 1);

  colorMatchAction();
  accordionAction();

  $(".btnShowMarker").on("click", function () {
    var lat = $(this).attr("lat");
    var lng = $(this).attr("lng");

    initGoogleMap(lat, lng, 15, 1);
  });

  $(".btnSearchCpMarker").on("click", function () {
    accordionAction();
    var cp = $("#postalCode").val();
    if (cp == "") {
      alert("No es posible realizar la búsqueda");
    } else {
      searchCoordinatesByCp(cp);
    }
  });
  $(".btnMyLocation").on("click", function () {
    getLocation();
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "No esta soportado por el navegador.";
      }
    }
    function showPosition(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      initGoogleMap(lat, lng, 15, 2);
    }
  });
  $(".btnClearLocation").on("click", function () {
    initGoogleMap(19.012106071216763, -98.20581416067367, 12, 1);
  });
  function searchCoordinatesByCp(cp) {
    var datos = new FormData();
    datos.append("accion", "localizarCoordenadas");
    datos.append("codigo", cp);

    $.ajax({
      url: "ajax/localizador.ajax.php",
      type: "post",
      dataType: "json",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      if (res != false) {
        var latitud = res[0];
        var longitud = res[1];

        initGoogleMap(latitud, longitud, 13, 2);
      } else {
        alert("Ingrese un código postal válido");
      }
    });
  }

  function initHomeSlider() {
    if ($(".home_slider").length) {
      var homeSlider = $(".home_slider");

      homeSlider.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        smartSpeed: 1200,
        dotsContainer: "main_slider_custom_dots",
      });

      /* Custom nav events */
      if ($(".home_slider_prev").length) {
        var prev = $(".home_slider_prev");

        prev.on("click", function () {
          homeSlider.trigger("prev.owl.carousel");
        });
      }

      if ($(".home_slider_next").length) {
        var next = $(".home_slider_next");

        next.on("click", function () {
          homeSlider.trigger("next.owl.carousel");
        });
      }

      /* Custom dots events */
      if ($(".home_slider_custom_dot").length) {
        $(".home_slider_custom_dot").on("click", function () {
          $(".home_slider_custom_dot").removeClass("active");
          $(this).addClass("active");
          homeSlider.trigger("to.owl.carousel", [$(this).index(), 300]);
        });
      }

      /* Change active class for dots when slide changes by nav or touch */
      homeSlider.on("changed.owl.carousel", function (event) {
        $(".home_slider_custom_dot").removeClass("active");
        $(".home_slider_custom_dots li")
          .eq(event.page.index)
          .addClass("active");
      });

      // add animate.css class(es) to the elements to be animated
      function setAnimation(_elem, _InOut) {
        // Store all animationend event name in a string.
        // cf animate.css documentation
        var animationEndEvent =
          "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

        _elem.each(function () {
          var $elem = $(this);
          var $animationType = "animated " + $elem.data("animation-" + _InOut);

          $elem.addClass($animationType).one(animationEndEvent, function () {
            $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
          });
        });
      }

      // Fired before current slide change
      homeSlider.on("change.owl.carousel", function (event) {
        var $currentItem = $(".home_slider_item", homeSlider).eq(
          event.item.index
        );
        var $elemsToanim = $currentItem.find("[data-animation-out]");
        setAnimation($elemsToanim, "out");
      });

      // Fired after current slide has been changed
      homeSlider.on("changed.owl.carousel", function (event) {
        var $currentItem = $(".home_slider_item", homeSlider).eq(
          event.item.index
        );
        var $elemsToanim = $currentItem.find("[data-animation-in]");
        setAnimation($elemsToanim, "in");
      });
    }
  }
  /* 

	2. Init Google Map

	*/

  function initGoogleMap(latZoom, lngZoom, zoom, accion) {
    var myLatlng = new google.maps.LatLng(latZoom, lngZoom);
    var mapOptions = {
      center: myLatlng,
      zoom: zoom,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      draggable: true,
      scrollwheel: false,
      zoomControl: true,
      panControl: true,
      zoomControlOptions: {
        position: google.maps.ControlPosition.RIGHT_CENTER,
      },
      mapTypeControl: true,
      scaleControl: true,
      streetViewControl: true,
      overviewMapControl: true,
      rotateControl: true,
      fullscreenControl: true,
      styles: [],
    };

    // Initialize a map with options
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // Re-center map after window resize
    google.maps.event.addDomListener(window, "resize", function () {
      setTimeout(function () {
        google.maps.event.trigger(map, "resize");
        map.setCenter(myLatlng);
      }, 1400);
    });

    if (accion == 1) {
      //document.getElementById("containerAccordion").innerHTML = "";
      //accordionAction();
      var infowindow1 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Centro de Distribución <span class="iw-number"></span> <span class="iw-number"></span></div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Calle Ejido #5970, LOCAL A-B-C,San Baltazar Campeche, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      var infowindow2 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Sucursal San Manuel <span class="iw-number"></span> <span class="iw-number"></span></div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Av. San Francisco #1023, San Manuel, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      var infowindow3 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Sucursal Reforma <span class="iw-number"></span> <span class="iw-number"></span></div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Prolongación Reforma #4712, Aquiles Serdán, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      var infowindow4 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Sucursal Santiago <span class="iw-number"></span> </div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Calle 11 Sur #1707, Barrio de Santiago, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      var infowindow5 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Sucursal Capu <span class="iw-number"></span><span class="iw-number"></span> </div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Calle 50 Poniente #2719, Cleotilde Torres, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      var infowindow6 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Sucursal Las Torres <span class="iw-number"></span><span class="iw-number"></span> </div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Calle 87 B Oriente 1402 Local A y B, Granjas San Isidro, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      var infowindow7 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Sucursal Acatepec <span class="iw-number"></span><span class="iw-number"></span> </div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Federal a Atlixco Km 9.5, San Francisco Acatepec, San Andrés Cholula, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });
      // Creamos dos marcadores.
      var marker1 = new google.maps.Marker({
        position: { lat: 19.012145119931233, lng: -98.20587699331371 },
        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "cedis",
      });
      // a este marcador le añadimos un icono personalizado
      var marker2 = new google.maps.Marker({
        position: { lat: 19.012310467240912, lng: -98.20296852742545 },

        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "san manuel",
      });
      var marker3 = new google.maps.Marker({
        position: { lat: 19.062735728241933, lng: -98.2308908757948 },

        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "reforma",
      });
      var marker4 = new google.maps.Marker({
        position: { lat: 19.04167938367321, lng: -98.21031266947574 },

        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "santiago",
      });
      var marker5 = new google.maps.Marker({
        position: { lat: 19.072163617432594, lng: -98.20183510743433 },

        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "capu",
      });
      var marker6 = new google.maps.Marker({
        position: { lat: 18.992644987911845, lng: -98.21322756301647 },

        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "las torres",
      });
      var marker7 = new google.maps.Marker({
        position: { lat: 19.02368338038731, lng: -98.3006238132431 },

        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "acatepec",
      });
      // Asignar los eventos de tolltip nombre sucursal
      google.maps.event.addListener(marker1, "click", function () {
        infowindow1.open(map, marker1);
      });
      google.maps.event.addListener(marker2, "click", function () {
        infowindow2.open(map, marker2);
      });
      google.maps.event.addListener(marker3, "click", function () {
        infowindow3.open(map, marker3);
      });
      google.maps.event.addListener(marker4, "click", function () {
        infowindow4.open(map, marker4);
      });
      google.maps.event.addListener(marker5, "click", function () {
        infowindow5.open(map, marker5);
      });
      google.maps.event.addListener(marker6, "click", function () {
        infowindow6.open(map, marker6);
      });
      google.maps.event.addListener(marker7, "click", function () {
        infowindow7.open(map, marker7);
      });
      // Le asignamos el mapa a los marcadores.
      marker1.setMap(map);
      marker2.setMap(map);
      marker3.setMap(map);
      marker4.setMap(map);
      marker5.setMap(map);
      marker6.setMap(map);
      marker7.setMap(map);

      $("#containerAccordion").append(`<div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Sucursal San Manuel</span>
          <i class="fas fa-plus icon-accordion"></i>
      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Av. San Francisco #1023, San Manuel, Puebla, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="19.012310467240912" lng="-98.20296852742545">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2222646428" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)2646428</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                      <a href="tel:2222647663" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)2647663</a>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Sucursal Reforma</span>
          <i class="fas fa-plus icon-accordion"></i>

      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Prolongación Reforma #4712, Aquiles Serdán, Puebla, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="19.062735728241933" lng="-98.2308908757948">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2222304201" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)2304201</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                      <a href="tel:2225730393" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)5730393</a>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Sucursal Santiago</span>
          <i class="fas fa-plus icon-accordion"></i>

      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Calle 11 Sur #1707, Barrio de Santiago, Puebla, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="19.04167938367321" lng="-98.21031266947574">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2229621703" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)9621703</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">


                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Sucursal Capu</span>
          <i class="fas fa-plus icon-accordion"></i>

      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Calle 50 Poniente #2719, Cleotilde Torres, Puebla, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="19.072163617432594" lng="-98.20183510743433">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2224196629" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)4196629</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                      <a href="tel:2224196636" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)4196636</a>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Sucursal Las Torres</span>
          <i class="fas fa-plus icon-accordion"></i>

      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Calle 87 B Oriente 1402 Local A y B, Granjas San Isidro, Puebla, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="18.992644987911845" lng="-98.21322756301647">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2221952203" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)1952203</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                      <a href="tel:2222132475" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)2132475</a>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Sucursal Acatepec</span>
          <i class="fas fa-plus icon-accordion"></i>

      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Federal a Atlixco Km 9.5, San Francisco Acatepec, San Andrés Cholula, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="19.02368338038731" lng="-98.3006238132431">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2229851740" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)9851740</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                      <a href="tel:2229851741" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)9851741</a>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="wrapper-accordion">
      <button class="toggle-accordion">
          <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
          <span class="fs-1 text-default-five fw-bold">Centro de Distribución</span>
          <i class="fas fa-plus icon-accordion"></i>

      </button>
      <div class="content-accordion">

          <div class="container col-lg-12">
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                      <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                      <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">Calle Ejido #5970, LOCAL A-B-C,San Baltazar Campeche, Puebla, Puebla.</p>

                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                      <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">


                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                      <button class="btn btn-sm btn-primary btnShowMarker" lat="19.012145119931233" lng="-98.20587699331371">Ver Tienda<i class="fas fa-chevron-right ms-2"> </i></button>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                      <a href="tel:2222488604" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> (222)2488604</a>
                  </div>
                  <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                  </div>
              </div>
          </div>

      </div>
  </div>`);
    } else if (accion == 2) {
      /**TOOLTIP**/
      var data = new FormData();
      data.append("latitud", latZoom);
      data.append("longitud", lngZoom);

      $.ajax({
        url: "ajax/tablaRadio.ajax.php",
        type: "post",
        dataType: "json",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
      }).done(function (res) {
        var marker = new google.maps.Marker({
          position: { lat: parseFloat(latZoom), lng: parseFloat(lngZoom) },
          icon: "views/img/icons/pin-user.png",
          draggable: false,
          title: "Mi Ubicacion",
        });

        marker.setMap(map);

        var sucursales = JSON.parse(JSON.stringify(res));
        var variables1 = {};
        var variables2 = {};
        var prefijo1 = "infowindow";
        var prefijo2 = "marker";
        document.getElementById("containerAccordion").innerHTML = "";
        for (let i = 0; i < sucursales.data.length; i++) {
          var sucursal = sucursales.data[i][0];
          var domicilio = sucursales.data[i][1];
          var latitud = sucursales.data[i][2];
          var longitud = sucursales.data[i][3];
          var phone1 = sucursales.data[i][4];
          var phone2 = sucursales.data[i][5];

          variables1[prefijo1 + i] = new google.maps.InfoWindow({
            content:
              '<div id="iw-container">' +
              '<div class="iw-title">' +
              sucursal +
              ' <span class="iw-number"></span> <span class="iw-number"></span></div>' +
              '<div class="iw-content">' +
              '<div class="iw-subTitle">Domicilio</div>' +
              '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
              "<p class='fs-1 text-texto'>" +
              domicilio +
              "</p>" +
              "</div>" +
              '<div class="iw-bottom-gradient"></div>' +
              "</div>",
            maxWidth: 400,
          });

          var marker1 = new google.maps.Marker({
            position: { lat: parseFloat(latitud), lng: parseFloat(longitud) },
            icon: "views/img/icons/pin-sfd.png",
            draggable: false,
            title: sucursal,
          });
          marker1.setMap(map);
          /*
          // Asignar los eventos de tolltip nombre sucursal
          google.maps.event.addListener(marker1, "click", function () {
            infowindow.open(map, marker1);
          });

          */

          $("#containerAccordion").append(
            `<div class="wrapper-accordion">
          <button class="toggle-accordion">
              <img class="img-fluid rounded-image h-100" src="views/img/icons/pin-sfd.png" alt="" />
              <span class="fs-1 text-default-five fw-bold">` +
              sucursal +
              `</span>
              <i class="fas fa-plus icon-accordion"></i>
          </button>
          <div class="content-accordion">

              <div class="container col-lg-12">
                  <div class="row">
                      <div class="col-lg-6 col-md6 col-sm-6" style="width:40%">
                          <span class="badge bg-danger p-2 "><i class="fa-solid fa-location-pin me-2 fs-0"></i><span class="fs-0">Domicilio</span></span>
                          <p class="text-default-five text-left fw-semi-bold" style="text-align:justify">` +
              domicilio +
              `</p>

                      </div>
                      <div class="col-lg-6 col-md6 col-sm-6" style="width:60%">
                          <span class="badge bg-danger p-2 ms-3"><i class="fa-solid fa-clock me-2 fs-0"></i><span class="fs-0">Horarios</span></span>
                          <p class="text-default-five text-left fw-lighter m-0"><strong>Lun:</strong> 08:30 am - 18:00 pm</p>
                          <p class="text-default-five text-left fw-lighter m-0"><strong>Mar:</strong> 08:30 am - 18:00 pm</p>
                          <p class="text-default-five text-left fw-lighter m-0"><strong>Mier:</strong> 08:30 am - 18:00 pm</p>
                          <p class="text-default-five text-left fw-lighter m-0"><strong>Jue:</strong> 08:30 am - 18:00 pm</p>
                          <p class="text-default-five text-left fw-lighter m-0"><strong>Vier:</strong> 08:30 am - 18:00 pm</p>
                          <p class="text-default-five text-left fw-lighter m-0"><strong>Sab:</strong> 09:00 am - 15:00 pm</p>

                      </div>
                  </div>
                  <div class="row">
                    
                      
                  </div>
                  <div class="row mt-2">

                      <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">
                          <a href="tel:` +
              phone1.trim() +
              `" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> ` +
              phone1 +
              `</a>
                      </div>
                      <div class="col-lg-6 col-md6 col-sm-6" style="width:50%">

                          <a href="tel:` +
              phone2.trim() +
              `" class="text-warning call-phone"><i class="fa-solid fa-phone  ms-2"></i> ` +
              phone2 +
              `</a>
                      </div>
                  </div>
              </div>

          </div>
      </div>`
          );
        }

        accordionAction();
      });

      /*
      var infowindow1 = new google.maps.InfoWindow({
        content:
          '<div id="iw-container">' +
          '<div class="iw-title">Cedis <span class="iw-number"><i class="fa-solid fa-phone"></i> <a href="tel:2222488604" class="iw-number-phone">222 248 8604</a></span> <span class="iw-number"><i class="fa-solid fa-envelope"></i> ventas1@sfd.com.mx</span></div>' +
          '<div class="iw-content">' +
          '<div class="iw-subTitle">Domicilio</div>' +
          '<img src="views/img/icons/pancho-pintor-right.png" alt="" height="115" width="83">' +
          "<p class='fs-1 text-texto'>Calle Ejido #5970, LOCAL A-B-C,San Baltazar Campeche, Puebla, Puebla.</p>" +
          "</div>" +
          '<div class="iw-bottom-gradient"></div>' +
          "</div>",
        maxWidth: 400,
      });


      var marker1 = new google.maps.Marker({
        position: { lat: 19.012145119931233, lng: -98.20587699331371 },
        icon: "views/img/icons/pin-sfd.png",
        draggable: false,
        title: "Sucursal San Manuel",
      });

      // Asignar los eventos de tolltip nombre sucursal
      google.maps.event.addListener(marker1, "click", function () {
        infowindow1.open(map, marker1);
      });

    
      marker1.setMap(map);
      */
    }
  }

  /* 

	4. Categories

	*/
  function categoriesAction() {
    $(".containerCategorie").on("click", function () {
      var category = $(this).attr("category");
      window.location.href = category;
    });
  }

  /* 

	5. subcategories

	*/
  function subcategoriesAction() {
    $(".divContainerSubcategories").on("click", function () {
      var subcategory = $(this).attr("subcategory");
      window.location.href = subcategory;
    });
  }

  /* 

	6. Color Match
	*/
  function colorMatchAction() {
    $(".brandColor").on("click", function () {
      var brandColor = $(this).attr("brandColor");
      window.location.href = brandColor;
    });
  }
  /* 

	7. Accordion
	*/
  function accordionAction() {
    let toggles = document.getElementsByClassName("toggle-accordion");
    let contentDiv = document.getElementsByClassName("content-accordion");
    let icons = document.getElementsByClassName("icon-accordion");

    for (let i = 0; i < toggles.length; i++) {
      toggles[i].addEventListener("click", () => {
        if (
          parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight
        ) {
          contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
          toggles[i].style.color = "#0084e9";
          icons[i].classList.remove("fa-plus");
          icons[i].classList.add("fa-minus");
        } else {
          contentDiv[i].style.height = "0px";
          toggles[i].style.color = "#111130";
          icons[i].classList.remove("fa-minus");
          icons[i].classList.add("fa-plus");
        }

        for (let j = 0; j < contentDiv.length; j++) {
          if (j !== i) {
            contentDiv[j].style.height = "0px";
            toggles[j].style.color = "#111130";
            icons[j].classList.remove("fa-minus");
            icons[j].classList.add("fa-plus");
          }
        }
      });
    }
  }
});
