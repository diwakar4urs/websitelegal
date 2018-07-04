<?php
/**
||-> Shortcode: Video
*/

function modeltheme_shortcode_particles($params, $content) {

    extract( shortcode_atts( 
        array(
            'source_vimeo'              => '',
            'source_youtube'            => '',
        ), $params ) );

    $html = '';

    $html .= '<div class="mt_particles_shortcode mt_particles">';
      $html .= '<div id="particles-js"></div>';
    $html .= '</div>';

    return $html;
}

add_shortcode('mt_particles', 'modeltheme_shortcode_particles');


/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if (function_exists('vc_map')) {
    vc_map( array(
     "name" => esc_attr__("MT - Particles", 'modeltheme'),
     "base" => "mt_particles",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        // array(
        //   "group" => "Options",
        //   "type" => "attach_images",
        //   "holder" => "div",
        //   "class" => "",
        //   "heading" => esc_attr__( "Choose image", 'modeltheme' ),
        //   "param_name" => "button_image",
        //   "value" => "",
        //   "description" => esc_attr__( "Choose image for play button", 'modeltheme' )
        // ),
        // array(
        //    "group" => "Options",
        //    "type" => "dropdown",
        //    "holder" => "div",
        //    "class" => "",
        //    "heading" => esc_attr__("Video source"),
        //    "param_name" => "video_source",
        //    "std" => '',
        //    "description" => esc_attr__(""),
        //    "value" => array(
        //     'Youtube'   => 'source_youtube',
        //     'Vimeo'     => 'source_vimeo',
        //     )
        // ),
        array(
           "group" => "Options",
           // "dependency" => array(
           //   'element' => 'video_source',
           //   'value' => array( 'source_vimeo' ),
           // ),
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Vimeo id link", 'modeltheme'),
           "param_name" => "vimeo_link_id",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
      )));
}

?>