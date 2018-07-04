<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**

||-> Shortcode: Custom Content

*/
function modeltheme_animated_svg_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'animated_svg_link'    => '', 
            'animated_svg_loop'    => '',
            'animation'       => ''
        ), $params ) );
    $uniqid = 'unique'.uniqid();
    $html = '';
    $html = '
    <section id="animation-waypoint" class="animated_svg_'.$uniqid. '">
            <div id="js-animation-hero"></div>
    </section>';
    if(empty($animated_svg_loop)) {
      $animated_svg_loop = "false";
    }
    $html .='</div>';
    $html .='<script type="text/javascript">

      var anim;
      var elem = document.getElementById("js-animation-hero")
      var animData = {
          container: elem,
          renderer: "svg",
          loop: '.$animated_svg_loop.',
          autoplay: false, 
          rendererSettings: {
              progressiveLoad:false
          },
          path: "'.$animated_svg_link.'",
          name: "scrollTop",
      };
      anim = bodymovin.loadAnimation(animData);

      var waypoint = new Waypoint({
        element: document.getElementById("animation-waypoint"),
        handler: function(direction) {
        anim.play();   
        },
      offset: "bottom-in-view"
      })

    </script>';

    return $html;
    
}

add_shortcode('animated_svg', 'modeltheme_animated_svg_shortcode');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	vc_map( 
		array(
		"name" => esc_attr__("MT - Animated SVG", 'modeltheme'),
		"base" => "animated_svg",
		"category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
		"icon" => "smartowl_shortcode",
		"params" => array(
			array(
				"group" => "Options",
				"type"         => "textfield",
				"holder"       => "div",
				"class"        => "",
				"param_name"   => "animated_svg_link",
				"heading"      => esc_attr__("Paste json link here", 'modeltheme'),
				"description"  => "In order enable the animated SVG. Replace the 'https://cryptic.modeltheme.com/' with your own website url (example http://yourwebsite.com/)"
			),
		      array(
		           "type" => "dropdown",
		           "holder" => "div",
		           "class" => "",
		           "heading" => esc_attr__("Loop animation", 'modeltheme'),
		           "param_name" => "animated_svg_loop",
		           "std" => '',
		           "default" => 'false',
		           "value" => array(
		              esc_attr__('False', 'modeltheme')  => 'false',
		              esc_attr__('True', 'modeltheme')    => 'true'           
		            ),
		            "group" => "Options"
		      ),
		      array(
		          "group" => "Animation",
		          "type" => "dropdown",
		          "heading" => esc_attr__("Animation", 'modeltheme'),
		          "param_name" => "animation",
		          "std" => '',
		          "holder" => "div",
		          "class" => "",
		          "description" => "",
		          "value" => $animations_list
		      )
		)
	));
}