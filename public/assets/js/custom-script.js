// const { over } = require("lodash");

let navigatorText = document.querySelectorAll('div.nav-text');
let bodyWeb = document.querySelector('body');



navigatorText.forEach(function(value){
    value.addEventListener('mouseover', function(event){
        value.children[1].setAttribute("style","margin-top:-25px;");
    })

    value.addEventListener('mouseout', function(event){
        value.children[1].setAttribute("style","margin-top:5px;");
    })
})

// Owl Carrousel
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        singleItem: true
    });
  });

  $(document).on('click', '.category_filter', function(event) {
    event.preventDefault();
    var id = $(this).data('id');

    $('.category_filter').removeClass("active");
    $('#cat'+id).addClass("active");

    fetch_data(id);

    function fetch_data(id)
    {
     $.ajax({
        url:"/portfolio/data",
        data:{id:id},
           success:function(data)
      {
     $('#portfolio_body').html(data);

      }
     });
    }

})

// Sticky Navbar
let navbar = document.querySelector('header.navigation');
let menu = document.querySelector('.menu');
let logoNav = document.querySelector('img.logo-nav');

window.addEventListener("scroll",function(){
    if(window.pageYOffset >= 29){
        navbar.classList.remove('position-absolute')
        navbar.classList.add('sticky');
        logoNav.src = '../../assets/images/logo-footer.png';
        navbar.style.transition = "all 0.2s";
        
    } else {
        navbar.classList.remove('sticky');
        navbar.classList.add('position-absolute');
        navbar.style.transition = "all 0.2s";
        logoNav.src = '../../assets/images/logo-white.png'
        
    }
})

// Hamburger 
let menu_hamb = document.querySelector('.hamburger');
let mobile_menu = document.querySelector('.mobile-nav');

menu_hamb.addEventListener("click",function(){
    menu_hamb.classList.toggle('is-active');
    mobile_menu.classList.toggle('is-active');
})

// Button Send Messages
let buttonSend = document.querySelector('button.button-send');
let buttonModal = document.querySelector('button.button-modal');
let overlay = document.querySelector('.overlay-contact');
let modal = document.querySelector('.modal-contact')

buttonSend.addEventListener('click', addOverlay);
buttonModal.addEventListener('click', deletOverlay);

function addOverlay(){
    overlay.classList.add('overlay-active');
    bodyWeb.classList.add('fixed');
    modal.classList.add('modal-active');
}

function deletOverlay(){
    overlay.classList.remove('overlay-active');
    bodyWeb.classList.remove('fixed');
    modal.classList.remove('modal-active');
}

