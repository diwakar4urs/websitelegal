<?php 

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**
||-> Shortcode: Social Media
*/
function mt_shortcode_social_media($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'el_class'              => '',
        ), $params ) );


    $html = '';
        
    $html .= '<ul class="mt_social_media-shortcode '.$el_class.'">';
        $html .= do_shortcode($content);
    $html .= '</div>';
    return $html;
}
add_shortcode('mt_social_media', 'mt_shortcode_social_media');


/**
||-> Shortcode: Child Shortcode
*/
function mt_shortcode_social_media_items($params, $content = NULL) {
    extract( shortcode_atts( 
        array(
            'list_icon'                   => '',
            'list_icon_url'               => '',
            'color_social'                => '',
            'color_social_hover'          => '',
            'background_social'           => '',
            'background_social_hover'     => '',
        ), $params ) );

    $uniqid = 'unique'.uniqid();
    $html = '';
    $html .= '<style>';
    $html .= '.mt_social_media_item_id_'.$uniqid.':hover {color:'.$color_social_hover.' !important; background-color:'.$background_social_hover.' !important;}';
    $html .= '</style>';
    $html .= '<li class="mt_social_media_item">';
        $html .= '<a class="mt_social_media_item_id_'.$uniqid.'" href="'.esc_attr($list_icon_url).'" style="color:'.esc_attr($color_social).';background-color:'.esc_attr($background_social).'">';
            $html .= '<i class="list_icon '.esc_attr($list_icon).'"></i>';
        $html .= '</a>';
    $html .= '</li>';

    return $html;
}
add_shortcode('mt_social_media_item', 'mt_shortcode_social_media_items');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');

    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Social Media", 'modeltheme'),
        "base" => "mt_social_media",
        "as_parent" => array('only' => 'mt_social_media_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => "smartowl_shortcode",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "is_container" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "modeltheme"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
            ),

        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Social Media Item", 'modeltheme'),
        "base" => "mt_social_media_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_social_media'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
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
                "heading" => esc_attr__("Icon link", 'modeltheme'),
                "param_name" => "list_icon_url",
                "std" => '',
                "holder" => "div",
                "class" => "",
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Social icon color", 'modeltheme' ),
                "param_name" => "color_social",
                "value" => "",
                "group" => "Social box style"
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Social icon hover color ", 'modeltheme' ),
                "param_name" => "color_social_hover",
                "value" => "",
                "group" => "Social box style"
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Social icon background", 'modeltheme' ),
                "param_name" => "background_social",
                "value" => "",
                "group" => "Social box style"
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Social icon hover background", 'modeltheme' ),
                "param_name" => "background_social_hover",
                "value" => "",
                "group" => "Social box style"
            ),
            array(
                "group" => "Extra Options",
                "type" => "textfield",
                "heading" => __("Extra class name", "modeltheme"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
            )
        )
    ) );


    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_Mt_social_media extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_Mt_social_media_Item extends WPBakeryShortCode {
        }
    }

}
?>