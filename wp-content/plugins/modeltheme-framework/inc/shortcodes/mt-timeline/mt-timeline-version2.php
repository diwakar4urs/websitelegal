<?php 

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**
||-> Shortcode: Timeline
*/
function mt_shortcode_timeline_version2($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'el_class'              => '',
            'timeline_version'      => '',
            'timeline_position'      => ''
        ), $params ) );


    $html = '';
        
    $html .= '<section id="cd-timeline" class="'.$timeline_position.' '.$timeline_version.' cd-container '.$el_class.'">';
        $html .= do_shortcode($content);
    $html .= '</section>';
    return $html;
}
add_shortcode('mt_timeline_short_version2', 'mt_shortcode_timeline_version2');






/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_timeline_version2_items($params, $content = NULL) {
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
            $html .= '<p class="cd-date-ver2">'.$timeline_item_date.'</p>';
            $html .= '<p class="timeline_item_content">'.$timeline_item_content.'</p>';
            $html .= '<a href="'.$timeline_item_button_link.'" class="cd-read-more">'.$timeline_item_button_text.'</a>';
        $html .= '</div> <!-- cd-timeline-content -->';
    $html .= '</div>';

    return $html;
}
add_shortcode('mt_timeline_short_version2_item', 'mt_shortcode_timeline_version2_items');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');

    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Timeline version 2", 'modeltheme'),
        "base" => "mt_timeline_short_version2",
        "as_parent" => array('only' => 'mt_timeline_short_version2_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
                    esc_attr__('Timeline white version', 'modeltheme') => 'version1',
                    esc_attr__('Timeline dark version', 'modeltheme') => 'version2'
                )
            ),
            array(
                "type"         => "dropdown",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "timeline_position",
                "std"          => '',
                "heading"      => esc_attr__("Position", 'modeltheme'),
                "description"  => "",
                "value"        => array(
                    esc_attr__('Timeline on center', 'modeltheme') => 'timeline_center',
                    esc_attr__('Timeline on right', 'modeltheme') => 'timeline_right',
                    esc_attr__('Timeline on left', 'modeltheme') => 'timeline_left',
                )
            )
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Timeline Item", 'modeltheme'),
        "base" => "mt_timeline_short_version2_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_timeline_short_version2'), // Use only|except attributes to limit parent (separate multiple values with comma)
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
        class WPBakeryShortCode_mt_timeline_short_version2 extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_mt_timeline_short_version2_Item extends WPBakeryShortCode {
        }
    }


}
?>