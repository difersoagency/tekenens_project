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

