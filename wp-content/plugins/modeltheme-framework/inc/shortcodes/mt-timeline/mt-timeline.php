<?php 

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**
||-> Shortcode: Timeline
*/
function mt_shortcode_timeline($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'el_class'              => '',
            'timeline_version'      => ''
        ), $params ) );


    $html = '';
        
    $html .= '<section id="cd-timeline" class="'.$timeline_version.' cd-container '.$el_class.'">';
        $html .= do_shortcode($content);
    $html .= '</section>';
    return $html;
}
add_shortcode('mt_timeline_short', 'mt_shortcode_timeline');






/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_timeline_items($params, $content = NULL) {
    extract( shortcode_atts( 
        array(
            'timeline_item_title'                 => '',
            'timeline_item_content'               => '',
            'timeline_item_button_text'           => '',
            'timeline_item_button_link'           => '',
            'timeline_item_date'                  => '',
            'timeline_item_date_image'            => ''
        ), $params ) );

    $thumb      = wp_get_attachment_image_src($timeline_item_date_image, "full");
    $thumb_src  = $thumb[0];

    $html = '';
    $html .= '<div class="mt_shortcode_timeline_items cd-timeline-block">';
    
        $html .= '<div class="cd-timeline-img cd-picture">';
            $html .= '<img src="'.esc_attr($thumb_src).'" data-src="'.esc_attr($thumb_src).'" alt="">';
        $html .= '</div> <!-- cd-timeline-img -->';

        $html .= '<div class="cd-timeline-content">';
            $html .= '<h3 class="timeline_item_title">'.$timeline_item_title.'</h3>';
            $html .= '<p class="timeline_item_content">'.$timeline_item_content.'</p>';
            $html .= '<a href="'.$timeline_item_button_link.'" class="cd-read-more">'.$timeline_item_button_text.'</a>';
            $html .= '<p class="cd-date">'.$timeline_item_date.'</p>';
        $html .= '</div> <!-- cd-timeline-content -->';
    $html .= '</div>';

    return $html;
}
add_shortcode('mt_timeline_short_item', 'mt_shortcode_timeline_items');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');

    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Timeline", 'modeltheme'),
        "base" => "mt_timeline_short",
        "as_parent" => array('only' => 'mt_timeline_short_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
                "type"         => "dropdown",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_version",
                "std"          => '',
                "heading"      => esc_attr__("Versions", 'modeltheme'),
                "description"  => "",
                "value"        => array(
                    esc_attr__('Timeline version1', 'modeltheme') => 'version1',
                    esc_attr__('Timeline version2', 'modeltheme') => 'version2'
                )
            )
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Timeline Item", 'modeltheme'),
        "base" => "mt_timeline_short_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_timeline_short'), // Use only|except attributes to limit parent (separate multiple values with comma)
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
                "param_name"   => "timeline_item_button_text",
                "heading"      => esc_attr__("Single item timeline Button Text", 'modeltheme'),
                "description"  => esc_attr__("Enter the button text for current timeline item.", 'modeltheme'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_item_button_link",
                "heading"      => esc_attr__("Single item timeline Button Link", 'modeltheme'),
                "description"  => esc_attr__("Enter the button link for current timeline item.", 'modeltheme'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_item_date",
                "heading"      => esc_attr__("Single item timeline Date", 'modeltheme'),
                "description"  => esc_attr__("Enter the date for current timeline item. Format example: 2017 November 15th", 'modeltheme'),
            ),
            array(
              "group" => "General Options",
              "type" => "attach_images",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Choose image", 'modeltheme' ),
              "param_name" => "timeline_item_date_image",
              "value" => "",
              "description" => esc_attr__( "Choose image for timeline pin.", 'modeltheme' )
            )
        )
    ) );


    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_Mt_Timeline_Short extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_Mt_Timeline_Short_Item extends WPBakeryShortCode {
        }
    }


}
?>