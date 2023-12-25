const hamburger = document.getElementById('toggleButton');
const ul = document.querySelector('ul');

hamburger.addEventListener('click', function () {
  ul.classList.toggle('menu_style');
  hamburger.classList.toggle('cross');
  if (ul.style.display === "" || ul.style.display === 'none') {
    ul.style.display = 'block';
    ul.style.right = '0';
    ul.style.top = '0px';
    ul.style.transform = "translate(30px)";

    hamburger.style.zIndex = "999";
  }
  else {
    ul.style.display = 'none';
    ul.style.right = "0";

  }

})




$(function () {
  // Owl Carousel
  var owl = $(".owl-carousel");
  owl.owlCarousel({

    margin: 4,
    // loop: true,
    nav:true,


    responsiveClass: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: true,
    responsive: {
      0: {
        items: 1
      },

      576: {
        items: 2
      },

      767: {
        items: 3
      },

      992: {
        items: 4
      },
      1200: {
        items: 5
      },
      1400: {
        items: 5
      }
    }
  });
});


