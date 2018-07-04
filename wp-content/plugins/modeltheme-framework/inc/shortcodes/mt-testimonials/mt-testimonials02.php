<?php

/**

||-> Shortcode: Testimonials 02

*/

function modeltheme_shortcode_testimonials02($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'                            =>'',
            'number'                               =>'',
            'background_color_content'             =>'',
            'color_content'                        => '',
        ), $params ) );

    $html = '';
    $html .= '<div style="background-color:'.esc_attr($background_color_content).'" class="testimonials02-container wow '.esc_attr($animation).'">';
    $args_testimonials = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'testimonial',
            'post_status'      => 'publish' 
            ); 
    $testimonials = get_posts($args_testimonials);
        foreach ($testimonials as $testimonial) {
            #metaboxes
            $metabox_job_position = get_post_meta( $testimonial->ID, 'job-position', true );
            $metabox_company = get_post_meta( $testimonial->ID, 'company', true );
            // $metabox_testimonial_bg = get_post_meta( $testimonial->ID, 'smartowl_testimonial_bg_color', true );
            $testimonial_id = $testimonial->ID;
            $content_post   = get_post($testimonial_id);
            $content        = $content_post->post_content;
            $content        = apply_filters('the_content', $content);
            $content        = str_replace(']]>', ']]&gt;', $content);
            #thumbnail
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'eaglewp_testimonials02_250x530' );
            
            $html.='<div class="row">';
              $html.='<div class="item col-md-12 relative">';
                $html.='<div class="testimonials_all_holder">';


                    $html .= '<div class="testimonial02-text-holder">';
                            $html .= '<div class="testimonial02-content">';
                                $html .= '<div class="testimonial02_text">';

                                    $html .= '<div class="testimonial02_rating_titles col-md-12">';
                                        $html .= '<h4 style="color:'.esc_attr($color_content).'" class="testimonial02_title col-md-6">'.$testimonial->post_title .'</h4>';
                                        $html .= '<div style="color:'.esc_attr($color_content).'" class="testimonial02_stars col-md-6"></div>';
                                    $html .= '</div>';

                                    $html .= '<div class="testimonial02_text_content col-md-12">'.$content.'</div>';

                                    $html .= '<h4 style="color:'.esc_attr($color_content).'" class="testimonial02_position col-md-12">'.esc_attr($metabox_job_position).'</h4>';
                                    
                                $html .= '</div>';
                            $html .= '</div>';
    		            $html .= '</div>';
                $html .= '</div>';
              $html .= '</div>';
	          $html .= '</div>';

        }
    $html .= '</div>';
    return $html;
}
add_shortcode('testimonials02', 'modeltheme_shortcode_testimonials02');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
            "name" => esc_attr__("MT - Testimonials Slider", 'modeltheme'),
            "base" => "testimonials02",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                  "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of testimonials to show", 'modeltheme'),
                   "param_name" => "number",
                   "value" => "",
                   "description" => ""
                ),
                array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Color of content", 'modeltheme' ),
                  "param_name" => "color_content",
                  "value" => "",
                  "group" => "Style"
                ),
                array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Background Color of content", 'modeltheme' ),
                  "param_name" => "background_color_content",
                  "value" => "",
                  "group" => "Style"
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
        )
    );
}



?>