

// OWL CAROSOL 

jQuery(document).ready(function($){
        var $ = jQuery;

  // Slider Js Code Start here
  $('#slider-carousel').owlCarousel({
    loop:true,
    nav:true,
    items:1
  });
  $('#banner-slider').owlCarousel({
    loop:true,
    items:1
  });
  // Slider Js Code END here

  // Blog Page Ajax Pagination Create Code Start here====================================>
   $(document).on("click", ".pagination a", function(e){
        e.preventDefault();

        let page = $(this).data("page");

        $.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: {
                action: "my_ajax_pagination",
                page: page
            },
            beforeSend: function(){
                $("#post-container").addClass("loading");
            },
            success: function(response){
                $("#post-container").html(response);

                // smooth scroll (optional)
                $('html, body').animate({
                    scrollTop: $("#post-container").offset().top - 50
                }, 300);
            }
        });

    });
     // Blog Page Ajax Pagination Create Code End here====================================>
},jQuery.noConflict());


