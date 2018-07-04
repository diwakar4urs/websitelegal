<?php

/**

||-> Shortcode: Countdown Version 2

*/

function modeltheme_shortcode_countdown_version_2($params, $content) {

    extract( shortcode_atts( 
        array(
            'animation'                 => '',
            'insert_date'               => '',
            'el_class'              => ''
        ), $params ) );

    $html = '';
    

    // custom javascript
    $html .= '<script type="text/javascript">
      var clock;

      jQuery(document).ready(function() {

        // Grab the current date
        var currentDate = new Date();

        // Grab the date inserted by user
        var inserted_date = new Date("'.$insert_date.'");

        // Calculate the difference in seconds between the future and current date
        var diff = inserted_date.getTime() / 1000 - currentDate.getTime() / 1000;

        // Instantiate a coutdown FlipClock
        clock = jQuery(".clock").FlipClock(diff, {
          clockFace: "DailyCounter",
          countdown: true
        });
      });
    </script>';



              
    $html .= '<div class="countdownv2_holder '.$el_class.'">';
    	$html .= '<div class="countdownv2 clock" style="padding:10px;"></div>';
    $html .= '</div>';
    

      

    return $html;
}

add_shortcode('shortcode_countdown_v2', 'modeltheme_shortcode_countdown_version_2');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("MT - CountDown Version 2", 'modeltheme'),
     "base" => "shortcode_countdown_v2",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Extra class name", "modeltheme"),
          "param_name" => "el_class",
          "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Date", 'modeltheme'),
           "param_name" => "insert_date",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => "Insert date. Format:YYYY-MM-DD"
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
        )));
}

?>