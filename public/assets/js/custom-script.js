let navigatorText = document.querySelectorAll('div.nav-text');



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

