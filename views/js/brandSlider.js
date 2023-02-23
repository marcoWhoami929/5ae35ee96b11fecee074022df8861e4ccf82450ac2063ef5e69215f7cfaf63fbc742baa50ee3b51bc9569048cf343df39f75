$(document).ready(function () {
  "use strict";
  brandSlider();
  brandSliderMobile();

  /* 

	3. Brand Slider

	*/
  function brandSlider() {
    $(".carousel").carousel({
      interval: 5000,
    });
  }
  function brandSliderMobile() {
    var slideIndex = 0;

    showSlides();

    function showSlides() {
      var i;

      var slides = document.getElementsByClassName("carousel-slide");

      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }

      slideIndex++;

      if (slideIndex > slides.length) {
        slideIndex = 1;
      }

      slides[slideIndex - 1].style.display = "block";

      setTimeout(showSlides, 2000);
    }
  }
});
