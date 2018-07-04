/*
 Project name:       MODELTHEME
 Project author:     ModelTheme
 File name:          Custom JS
*/



//Begin: Validate and Submit contact form via Ajax
jQuery("#listings_metaboxs").validate({
  //Ajax validation rules
  validClass:'validated',
  rules: {
    mt_listing_crypto_coin_name: {
      required: true,
      minlength: 2
    },
    mt_listing_interest: {
      required: true,
      minlength: 2
    },
    mt_listing_received: {
      required: true,
      minlength: 2
    },
    mt_listing_goal_money: {
      required: true,
      minlength: 2
    },
    mt_listing_end_date_pick: {
      required: true,
      minlength: 2
    },
    mt_listing_website_button: {
      required: true,
      minlength: 2
    },
    mt_listing_whitepaper_button: {
      required: true,
      minlength: 2
    },
    mt_listing_token_sale_date: {
      required: true,
      minlength: 2
    },
    mt_listing_ticker: {
      required: true,
      minlength: 2
    },
    mt_listing_token_type: {
      required: true,
      minlength: 2
    },
    mt_listing_ico_token_price: {
      required: true,
      minlength: 2
    },
    mt_listing_fundraising_goal: {
      required: true,
      minlength: 2
    },
    mt_listing_sold_on_pre_sale: {
      required: true,
      minlength: 2
    },
    mt_listing_total_tokens: {
      required: true,
      minlength: 2
    },
    mt_listing_available_for_token_sale: {
      required: true,
      minlength: 2
    },
    //mt_listing_whitelist: {
      //required: true,
      //minlength: 2
    //},
    mt_listing_cant_participate: {
      required: true,
      minlength: 2
    },
    mt_listing_accepts: {
      required: true,
      minlength: 2
    },
    mt_listing_min_max_personal_cap: {
      required: true,
      minlength: 2
    },
  },
  //Ajax validation messages
  messages: {
    mt_listing_crypto_coin_name: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_interest: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_received: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_goal_money: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_end_date_pick: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_website_button: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_whitepaper_button: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_token_sale_date: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_ticker: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_token_type: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_ico_token_price: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_fundraising_goal: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_sold_on_pre_sale: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_total_tokens: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_available_for_token_sale: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    //mt_listing_whitelist: {
      //required: "This field is required",
      //minlength: "This field must consist of at least 2 characters"
    //},
    mt_listing_cant_participate: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_accepts: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
    mt_listing_min_max_personal_cap: {
      required: "This field is required",
      minlength: "This field must consist of at least 2 characters"
    },
  },
  //Submit via Ajax Form
  // submitHandler: function() {
    // jQuery('#listings_metaboxs').ajaxSubmit();
    // jQuery('.success_message').fadeIn('slow');
  // }
});
//End: Validate and Submit contact form via Ajax






// LISTING GALLERY POPUP
if (jQuery('.mt_listing--gallery').length) {
    jQuery('.mt_listing--gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        },
        // other options
    });
}
jQuery('.select-car-type').select2();
jQuery('.select-car-category').select2();
jQuery("[class$='mt_circle']").percircle();
  if ( jQuery( "#grid" ).length ) {
    (function() {
      function init() {
        var speed = 300,
          easing = mina.backout;
        [].slice.call ( document.querySelectorAll( '#grid a' ) ).forEach( function( el ) {
          var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
            pathConfig = {
              from : path.attr( 'd' ),
              to : el.getAttribute( 'data-path-hover' )
            };
          el.addEventListener( 'mouseenter', function() {
            path.animate( { 'path' : pathConfig.to }, speed, easing );
          } );
          el.addEventListener( 'mouseleave', function() {
            path.animate( { 'path' : pathConfig.from }, speed, easing );
          } );
        } );
      }
      init();
    })();
  }
// if ( jQuery( "#mt-members-slideshow" ).length ) {
//   document.documentElement.className = 'js';
//   var slideshow = new CircleSlideshow(document.getElementById('mt-members-slideshow'));
// }
(function ($) {
  'use strict';
  jQuery( document ).ready(function() {
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> TESTIMONIALS01 SLIDER (Shortcode)
    */
    jQuery(".testimonials-container").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : true,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  2],
            [1200,  2],
            [1400,  2],
            [1600,  2]
        ]
    });
    jQuery(".members-container").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        singleItem      : true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   1],
            [700,   1],
            [1000,  1],
            [1200,  1],
            [1400,  1],
            [1600,  1]
        ]
    });
    jQuery(".testimonials-container-1").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   1],
            [700,   1],
            [1000,  1],
            [1200,  1],
            [1400,  1],
            [1600,  1]
        ]
    });
    jQuery(".testimonials-container-2").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  2],
            [1200,  2],
            [1400,  2],
            [1600,  2]
        ]
    });
    jQuery(".testimonials-container-3").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  3],
            [1200,  3],
            [1400,  3],
            [1600,  3]
        ]
    });
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> TESTIMONIALS02 SLIDER (Shortcode)
    */
    jQuery(".testimonials02-container").owlCarousel({
      navigation      : false, // Show next and prev buttons
      pagination      : true,
      autoPlay        : true,
      slideSpeed      : 700,
      paginationSpeed : 700,
      navigationText  : ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
      // navigationText  : ["",""],
      singleItem      : true
    });
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> TWEETS SLIDER (Shortcode)
    */
    jQuery(".mt_tweets_slider").owlCarousel({
      navigation      : false, // Show next and prev buttons
      pagination      : false,
      autoPlay        : false,
      slideSpeed      : 700,
      paginationSpeed : 700,
      singleItem      : true
    });
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> MEMBERS FANCY SLIDER (Shortcode)
    */
    jQuery(".mt_members_fancy_slider").owlCarousel({
      navigation      : false, // Show next and prev buttons
      pagination      : false,
      autoPlay        : false,
      slideSpeed      : 700,
      paginationSpeed : 700,
      autoPlay : true,
      autoPlayTimeout:10000,
      autoPlayHoverPause:true,
      itemsCustom : [
          [0,     1],
          [450,   1],
          [600,   2],
          [700,   2],
          [1000,  4],
          [1200,  4],
          [1400,  4],
          [1600,  4]
      ]
    });
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> CLIENTS SLIDER (Shortcode)
    */
    jQuery(".clients_container_shortcode-1").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   1],
            [700,   1],
            [1000,  1],
            [1200,  1],
            [1400,  1],
            [1600,  1]
        ]
    });
    jQuery(".clients_container_shortcode-2").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  2],
            [1200,  2],
            [1400,  2],
            [1600,  2]
        ]
    });
    jQuery(".clients_container_shortcode-3").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  3],
            [1200,  3],
            [1400,  3],
            [1600,  3]
        ]
    });
    jQuery(".clients_container_shortcode-4").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   3],
            [1000,  4],
            [1200,  4],
            [1400,  4],
            [1600,  4]
        ]
    });
    jQuery(".clients_container_shortcode-5").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   2],
            [600,   2],
            [700,   5],
            [1000,  6],
            [1200,  6],
            [1400,  6],
            [1600,  6]
        ]
    });
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> GET DIV HEIGHT (Shortcode) 
    */
    jQuery(document).ready( function() {
        var height = jQuery(".about_image").height();
        jQuery('.about_text_holder').css('height',height);
    });
    jQuery(document).ready( function() {
        var height = jQuery(".portfolio03_thumbnail").height();
        jQuery('.color_verlay_portfolio3').css('height',height);
    });
    jQuery(document).ready( function() {
        var height = jQuery(".color_verlay_portfolio3").height();
        jQuery('.portfolio03_title_subtitle_holder').css('height',height);
    });
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> SERVICES SLIDER (Shortcode)
    */
    // SET LEFT SIDE height of RIGHT SIDE
    jQuery( '.right-side' ).ready(function() {
      var right_side_height = jQuery('.right-side').height();
      jQuery( '.left-side' ).height( right_side_height )
    });
    var sync1 = jQuery("#service_big_slides");
    var sync2 = jQuery("#service_small_slides");
   
    jQuery(".service_small_slides_holder .fa-angle-right").click(function(){
      sync1.trigger('owl.next');
    })
    jQuery(".service_small_slides_holder .fa-angle-left").click(function(){
      sync1.trigger('owl.prev');
    })
    sync1.owlCarousel({
      // mouseDrag: false,
      center:true,
      loop: true,
      navigationText:  ["<",">"],
      rewindNav: true,
      singleItem : true,
      slideSpeed : 1000,
      navigation: false,
      pagination: false,
      afterAction : syncPosition,
      responsiveRefreshRate : 200,
      afterInit : function(elem){
        this.jumpTo(1);
      }
    });
   
    sync2.owlCarousel({
      // mouseDrag: false,
      center:true,
      loop: true,
      items : 3,
      itemsDesktop      : [1199,3],
      itemsDesktopSmall     : [979,3],
      itemsTablet       : [768,3],
      itemsMobile       : [479,3],
      pagination:false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(1).addClass("synced");
      }
    });
   
    function syncPosition(el){
      var current = this.currentItem;
      jQuery("#service_small_slides")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced")
      if(jQuery("#service_small_slides").data("owlCarousel") !== undefined){
        center(current)
      }
    }
   
    jQuery("#service_small_slides").on("click", ".owl-item", function(e){
      e.preventDefault();
      var number = jQuery(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
    });
   
    function center(number){
      var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
      var num = number;
      var found = false;
      for(var i in sync2visible){
        if(num === sync2visible[i]){
          var found = true;
        }
      }
   
      if(found===false){
        if(num>sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", num - sync2visible.length+2)
        }else{
          if(num - 1 === -1){
            num = 0;
          }
          sync2.trigger("owl.goTo", num);
        }
      } else if(num === sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", sync2visible[1])
      } else if(num === sync2visible[0]){
        sync2.trigger("owl.goTo", num-1)
      }
      
    }
    jQuery('#DataTable-icondrops-active').dataTable( {
/*        "bSort": false,
*/
        "columns":[
          {
              "sortable": false
            },
            {
              "sortable": false
            },
            {
              "sortable": false
            },
            {
              "sortable": true
            },
            {
              "sortable": true
            },
            {
              "sortable": false
            }
      ],
      "aoColumnDefs": [
        { "sType": "numeric" }
      ],
      language: {
          searchPlaceholder: "Search ICO"
      },
    });
    jQuery('.single-icondrops .progress .progress-bar').css("width",
      function() {
          return jQuery(this).attr("aria-valuenow") + "%";
      }
    );
    
    setTimeout(function() {
        jQuery(".cd-tab-filter a.selected").trigger('click');
    },0);

  });
} (jQuery) )
