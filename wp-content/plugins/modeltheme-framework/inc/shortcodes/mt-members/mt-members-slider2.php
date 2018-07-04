<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');


/**

||-> Shortcode: Members Slider

*/

function mt_shortcode_members02($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation' => '',
            'number' => '',
            'navigation' => 'false',
            'order' => 'desc',
            'pagination' => 'false',
            'autoPlay' => 'false',
            'paginationSpeed' => '700',
            'slideSpeed' => '700',
            'number_desktop' => '4',
            'number_tablets' => '2',
            'number_mobile' => '1',
            'member_color' => '',
            'member_position_color' => '',
        ), $params ) );


    $html = '';



    // CLASSES
    $class_slider = 'mt_slider_members_'.uniqid();



    $html .= '<script>
                jQuery(document).ready( function() {
                    jQuery(".'.$class_slider.'").owlCarousel({
                        navigation      : '.$navigation.', // Show next and prev buttons
                        pagination      : '.$pagination.',
                        autoPlay        : '.$autoPlay.',
                        slideSpeed      : '.$paginationSpeed.',
                        paginationSpeed : '.$slideSpeed.',
                        autoWidth: true,
                        itemsCustom : [
                            [0,     '.$number_mobile.'],
                            [450,   '.$number_mobile.'],
                            [600,   '.$number_desktop.'],
                            [700,   '.$number_tablets.'],
                            [1000,  '.$number_tablets.'],
                            [1200,  '.$number_desktop.'],
                            [1400,  '.$number_desktop.'],
                            [1600,  '.$number_desktop.']
                        ]
                    });
                    
                jQuery(".'.$class_slider.' .owl-wrapper .owl-item:nth-child(2)").addClass("hover_class");
                jQuery(".'.$class_slider.' .owl-wrapper .owl-item").hover(
                  function () {
                    jQuery(".'.$class_slider.' .owl-wrapper .owl-item").removeClass("hover_class");
                    jQuery(this).addClass("hover_class");
                  }
                );


                });
              </script>';


        $html .= '<div class="row mt_members2 '.$class_slider.' row wow '.$animation.'">';
        $args_members = array(
                    'posts_per_page'   => $number,
                    'orderby'          => 'post_date',
                    'order'            => $order,
                    'post_type'        => 'member',
                    'post_status'      => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'mt-member-category',
                            'field' => 'slug',
                            'terms' => 'memberfilter'
                        )
                    )
                ); 
        $members = get_posts($args_members);
            foreach ($members as $member) {
                #metaboxes
                $metabox_member_position = get_post_meta( $member->ID, 'smartowl_member_position', true );
                $metabox_linkedin_profile = get_post_meta( $member->ID, 'smartowl_linkedin_profile', true );
                if($metabox_linkedin_profile) {
                    $profil_in = '<a target="_new" href="'. $metabox_linkedin_profile .'" class="member01_profile-linkedin"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> ';
                }

                $member_title = get_the_title( $member->ID );

                $testimonial_id = $member->ID;
                $content_post   = get_post($member);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $member->ID ),'full' );

                $member_color_style = '';
                if (isset($member_color)) {
                  $member_color_style = 'color:'.$member_color.' !important;';
                }

                $member_position_color_style = '';
                if (isset($member_position_color)) {
                  $member_position_color_style = 'color:'.$member_position_color.' !important;';
                }
             
                $html.='

                    <div class="col-md-12 relative">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="members_img_holder">
                                    <div class="memeber02-img-holder">';
                                        $html .= '<div class="linkedin-profile">'.$profil_in.'</div>';
                                        if($thumbnail_src) { 
                                            $html .= '<img src="'. $thumbnail_src[0] . '" alt="'. $member->post_title .'" />';
                                        }else{ 
                                            $html .= '<img src="http://placehold.it/450x1000" alt="'. $member->post_title .'" />'; 
                                        }                                        
                                    $html.='</div>
                                    <div class="member02-content">
                                        <div class="member02-content-inside">
                                            <h3 style='.$member_color_style.' class="member02_name">'.$member_title.'</h3>
                                            <h5 style='.$member_position_color_style.' class="member02_position">'.$metabox_member_position.'</h5> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

            }
                $html .= '
                </div>';
    return $html;
}
add_shortcode('mt_members_slider2', 'mt_shortcode_members02');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    
    vc_map( array(
        "name" => esc_attr__("MT - Members Slider version2", 'modeltheme'),
        "base" => "mt_members_slider2",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "icon" => "smartowl_shortcode",
        "params" => array(
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Number of members", 'modeltheme' ),
                "param_name" => "number",
                "value" => "",
                "description" => esc_attr__( "Enter number of members to show.", 'modeltheme' )
            ),
            array(
                "group" => "Slider Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "param_name" => "order",
                "std"          => '',
                "heading" => esc_attr__( "Order options", 'modeltheme' ),
                "description" => esc_attr__( "Order ascending or descending by date", 'modeltheme' ),
                "value"        => array(
                    esc_attr__('Ascending', 'modeltheme') => 'asc',
                    esc_attr__('Descending', 'modeltheme') => 'desc',
                )
                
            ),
            array(
                "group" => "Slider Options",
                "type"         => "dropdown",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "navigation",
                "std"          => '',
                "heading"      => esc_attr__("Navigation", 'modeltheme'),
                "description"  => "",
                "value"        => array(
                    esc_attr__('Disabled', 'modeltheme') => 'false',
                    esc_attr__('Enabled', 'modeltheme')  => 'true',
                )
            ),
            array(
                "group" => "Slider Options",
                "type"         => "dropdown",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "pagination",
                "std"          => '',
                "heading"      => esc_attr__("Pagination", 'modeltheme'),
                "description"  => "",
                "value"        => array(
                    esc_attr__('Disabled', 'modeltheme') => 'false',
                    esc_attr__('Enabled', 'modeltheme')  => 'true',
                )
            ),
            array(
                "group" => "Slider Options",
                "type"         => "dropdown",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "autoPlay",
                "std"          => '',
                "heading"      => esc_attr__("Auto Play", 'modeltheme'),
                "description"  => "",
                "value"        => array(
                    esc_attr__('Disabled', 'modeltheme') => 'false',
                    esc_attr__('Enabled', 'modeltheme')    => 'true',
                )
            ),
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Pagination Speed", 'modeltheme' ),
                "param_name" => "paginationSpeed",
                "value" => "",
                "description" => esc_attr__( "Pagination Speed(Default: 700)", 'modeltheme' )
            ),
            array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "class" => "",
                  "heading" => esc_attr__( "Member title color", 'modeltheme' ),
                  "param_name" => "member_color",
                  "value" => "", //Default color
                  "description" => esc_attr__( "Choose color for member title", 'modeltheme' )
            ),
            array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "class" => "",
                  "heading" => esc_attr__( "Member position color", 'modeltheme' ),
                  "param_name" => "member_position_color",
                  "value" => "", //Default color
                  "description" => esc_attr__( "Choose color for position color", 'modeltheme' )
            ),
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Slide Speed", 'modeltheme' ),
                "param_name" => "slideSpeed",
                "value" => "",
                "description" => esc_attr__( "Slide Speed(Default: 700)", 'modeltheme' )
            ),
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Items for Desktops", 'modeltheme' ),
                "param_name" => "number_desktop",
                "value" => "",
                "description" => esc_attr__( "Default - 4", 'modeltheme' )
            ),
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Items for Tablets", 'modeltheme' ),
                "param_name" => "number_tablets",
                "value" => "",
                "description" => esc_attr__( "Default - 2", 'modeltheme' )
            ),
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Items for Mobile", 'modeltheme' ),
                "param_name" => "number_mobile",
                "value" => "",
                "description" => esc_attr__( "Default - 1", 'modeltheme' )
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
            ),
        )
    ));
}

?>