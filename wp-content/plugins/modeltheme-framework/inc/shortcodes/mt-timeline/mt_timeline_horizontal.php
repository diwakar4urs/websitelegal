<?php 

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**
||-> Shortcode: Timeline Horizontal
*/
function mt_shortcode_timeline_horizontal($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'el_class'              => '',
            'animation'             => ''
        ), $params ) );


    $html = '';
        
    $html .= '<section class="timelinehorizontal '.$el_class.' wow '.$animation.'">';

        $html .= '<ol>';
            $html .= do_shortcode($content);
        $html .= '</ol>';


        $html .= '<div class="arrows">';
            $html .= '<button class="arrow arrow__prev disabled" disabled>';
              $html .= '<i class="fa fa-chevron-left"></i>';
            $html .= '</button>';
            $html .= '<button class="arrow arrow__next">';
              $html .= '<i class="fa fa-chevron-right"></i>';
            $html .= '</button>';
        $html .= '</div>';


    $html .= '</section>';
    return $html;
}
add_shortcode('mt_timeline_horizontal', 'mt_shortcode_timeline_horizontal');






/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_timeline_horizontal_items($params, $content = NULL) {
    extract( shortcode_atts( 
        array(
            'timeline_item_title'                 => '',
            'timeline_item_content'               => '',
            'timeline_item_date'                  => '',
        ), $params ) );


    $html = '';

    
        $html .= '<li>';
            $html .= '<div>';
                $html .= '<time>'.$timeline_item_date.'</time>';
                $html .= '<h3>'.$timeline_item_title.'</h3>';
                $html .= '<p>'.$timeline_item_content.'</p>';
            $html .= '</div>';
        $html .= '</li>';
    


    





    return $html;
}
add_shortcode('mt_timeline_horizontal_item', 'mt_shortcode_timeline_horizontal_items');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    vc_map( array(
        "name" => esc_attr__("MT - Horizontal Timeline", 'modeltheme'),
        "base" => "mt_timeline_horizontal",
        "as_parent" => array('only' => 'mt_timeline_horizontal_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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

        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Horizontal Timeline Item", 'modeltheme'),
        "base" => "mt_timeline_horizontal_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_timeline_horizontal'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_item_title",
                "heading"      => esc_attr__("Single item timeline Title", 'modeltheme'),
                "description"  => esc_attr__("Enter title for current timeline item.", 'modeltheme'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textarea",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_item_content",
                "heading"      => esc_attr__("Single item timeline Description", 'modeltheme'),
                "description"  => esc_attr__("Enter the description for current timeline item.", 'modeltheme'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_item_date",
                "heading"      => esc_attr__("Single item timeline Date", 'modeltheme'),
                "description"  => esc_attr__("Enter the date for current timeline item. Format example: 2017 November 15th", 'modeltheme'),
            )
        )
    ) );


    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_Mt_Timeline_Horizontal extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_Mt_Timeline_Horizontal_Item extends WPBakeryShortCode {
        }
    }


}
?>