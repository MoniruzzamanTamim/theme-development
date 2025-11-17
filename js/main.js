

// OWL CAROSOL 

jQuery(document).ready(function(jQuery){
    
  // Slider Js Code Start here
  jQuery('#slider-carousel').owlCarousel({
    loop:true,
    nav:true,
    items:1
  });
  jQuery('#banner-slider').owlCarousel({
    loop:true,
    items:1
  });
  // Slider Js Code END here

  // Blog Page Ajax Pagination Create Code Start here====================================>
   jQuery(document).on("click", ".pagination a", function(e){
        e.preventDefault();

        let page = jQuery(this).data("page");

        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: {
                action: "my_ajax_pagination",
                page: page
            },
            beforeSend: function(){
                jQuery("#post-container").addClass("loading");
            },
            success: function(response){
                jQuery("#post-container").html(response);

                // smooth scroll (optional)
                jQuery('html, body').animate({
                    scrollTop: jQuery("#post-container").offset().top - 50
                }, 300);
            }
        });

    });
     // Blog Page Ajax Pagination Create Code End here====================================>
});


