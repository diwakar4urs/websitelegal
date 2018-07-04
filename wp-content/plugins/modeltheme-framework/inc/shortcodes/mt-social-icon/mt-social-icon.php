<?php
/**

||-> Shortcode: Social Media

*/

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');


function modeltheme_social_icon_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
        	'list_icon' 		=> '',
        	'list_title_text'	=> '',
        	'list_button_text'	=> '',
        	'list_button_icon'	=> '',
        	'list_button_url'	=> '',
            'color_content'     => '',
            'background_box'    => '',
            'animation'     	=> ''
        ), $params ) ); 
    


        $content = '';
        $content .= '<div class="social-icon-box vc_row wow '.$animation.'">';
        	$content .= '<div class="social-icon-box-holder" style="color:'.esc_attr($color_content).';background-color:'.esc_attr($background_box).'">';
	        	$content .= '<i class="list_icon '.esc_attr($list_icon).'"></i>';
	        	$content .= '<h3 class="list_title_text">'.esc_attr($list_title_text).'</h3>';
	        	$content .= '<a target="_blank" href='.esc_attr($list_button_url).' class="list_button_text" style="color:'.esc_attr($color_content).'">'
	        					.esc_attr($list_button_text).
	        					'<i class="list_button_icon '.esc_attr($list_button_icon).'"></i>
	        				</a>';
	        $content .= '</div>';
        $content .= '</div>';
        return $content;
}
add_shortcode('social_icon', 'modeltheme_social_icon_shortcode');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  #SHORTCODE: Social icons
  vc_map( array(
     "name" => esc_attr__("MT - Social Icon Box", 'modeltheme'),
     "base" => "social_icon",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
     	array(
          "group" => "Social box setup",
          "type" => "dropdown",
          "heading" => esc_attr__("Icon", 'modeltheme'),
          "param_name" => "list_icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
        array(
          "group" => "Social box setup",
          "type" => "textfield",
          "heading" => esc_attr__("Social/Title", 'modeltheme'),
          "param_name" => "list_title_text",
          "std" => '',
          "holder" => "div",
          "class" => "",
        ),
        array(
          "group" => "Social box setup",
          "type" => "textfield",
          "heading" => esc_attr__("Social/Button text", 'modeltheme'),
          "param_name" => "list_button_text",
          "std" => '',
          "holder" => "div",
          "class" => "",
        ),
        array(
          "group" => "Social box setup",
          "type" => "textfield",
          "heading" => esc_attr__("Social/Button link", 'modeltheme'),
          "param_name" => "list_button_url",
          "std" => '',
          "holder" => "div",
          "class" => "",
        ),
        array(
          "group" => "Social box setup",
          "type" => "dropdown",
          "heading" => esc_attr__("Icon Button", 'modeltheme'),
          "param_name" => "list_button_icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Color of content", 'modeltheme' ),
            "param_name" => "color_content",
            "value" => "",
            "group" => "Social box style"
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Background of the box", 'modeltheme' ),
            "param_name" => "background_box",
            "value" => "",
            "group" => "Social box style"
         ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__("Animation", 'modeltheme'),
            "param_name" => "animation",
            "std" => '',
            "holder" => "div",
            "class" => "",
            "description" => "",
            "value" => $animations_list,
            "group" => "Social box Animation"
        )
     )
  ));
}

?>