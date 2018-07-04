<?php 
/* ------------------------------------------------------------------
[Modeltheme - SHORTCODES]

[Table of contents]
    Recent Tweets
    Contact Form
    Recent Posts
    Featured Post with thumbnail
    Subscribe form
    Skill
    Pricing tables
    Jumbot
    Alert
    Progress bars
    Custom content
    Responsive video (YouTube)
    Heading With Border
    Testimonials
    List group
    Thumbnails custom content
    Section heading with title and subtitle
    Section heading with title
    Heading with bottom border
    Call to action
    Blog posts
    Social Media
    Quotes
    Banner
    Our Services
    Quotes Slider
    Courses
------------------------------------------------------------------ */



include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


include_once( 'mt-members/mt-members-slider.php' ); # Members 01
include_once( 'mt-members/mt-members-slider2.php' ); # Members 02
include_once( 'mt-services/mt_custom_service.php' ); # Services 03
include_once( 'mt-contact/mt-contact01.php' );
include_once( 'mt-blog-posts/mt-blogpost01.php' ); # Blog Post
include_once( 'mt-blog-posts/mt-blogpost02.php' ); # Blog Post Version 2
include_once( 'mt-testimonials/mt-testimonials01.php' ); # Testimonials 01
include_once( 'mt-testimonials/mt-testimonials02.php' ); # Testimonials 02
include_once( 'mt-clients/mt-clients.php' ); # Clients
include_once( 'mt-title-subtitle/mt-title-subtitle.php' ); # Title Subtitle
include_once( 'mt-social-icons/mt-social-icons.php' ); # Social Icons
include_once( 'mt-social-icon/mt-social-icon.php' ); # Social Icons
include_once( 'mt-featured-post/mt-featured-post.php' ); # Featured Post
include_once( 'mt-skills/mt-skills.php' ); # Skills
include_once( 'mt-skills-circle/mt-skills-circle.php' ); # Skills Cricle
include_once( 'mt-pricing-tables/mt-pricing-tables.php' ); # Pricing Tables
include_once( 'mt-countdown/mt-countdown.php' ); # Countdown
include_once( 'mt-icon-list-item/mt-icon-list-item.php' ); # Mailchimp Subscribe Form
include_once( 'mt-typed-text/mt-typed-text.php' ); # Typed text
include_once( 'mt-video/mt-video.php' ); # Video
include_once( 'mt-mailchimp-subscribe-form/mt-mailchimp-subscribe-form.php' ); # Mailchimp Subscribe Form
include_once( 'mt-featured-product/mt-featured-product.php' ); # Featured Product
include_once( 'mt-sharer/mt-sharer.php' ); # Featured Product
include_once( 'mt-coundown-version2/mt-coundown-version2.php' ); # CountDown Version 2
include_once( 'mt-particles/mt-particles.php' ); # CountDown Version 2
include_once( 'mt-timeline/mt-timeline.php' ); # Timeline
include_once( 'mt-timeline/mt-timeline-version2.php' ); # Timeline version2
include_once( 'mt-tabs/mt-tabs.php' ); # Tabs
include_once( 'mt-timeline/mt_timeline_horizontal.php' ); # Timeline Horizontal
include_once( 'mt-category-products/mt-category-products.php' ); # Category Products
include_once( 'mt-social-media/mt-social-media.php' ); # Social Media





// BOOTSTRAP ELEMENTS
include_once( 'mt-bootstrap-alert/mt-bootstrap-alert.php' ); # Bootstrap Alerts
include_once( 'mt-bootstrap-jumbotron/mt-bootstrap-jumbotron.php' ); # Bootstrap Jumbotron
include_once( 'mt-bootstrap-panel/mt-bootstrap-panel.php' ); # Bootstrap Panel
include_once( 'mt-panel/mt-panel.php' ); # Panel 2
include_once( 'mt-bootstrap-thumbnails-custom-content/mt-bootstrap-thumbnails-custom-content.php' ); # Bootstrap Thumbnails Custom Content
include_once( 'mt-bootstrap-listgroup/mt-bootstrap-listgroup.php' ); # Bootstrap List Group
include_once( 'mt-bootstrap-button/mt-bootstrap-button.php' ); # Bootstrap Buttons
include_once( 'mt-bubble-box/mt-bubble-box.php' ); # Bootstrap Buttons
include_once( 'mt-animated-svg/mt-animated-svg.php' ); # Animated SVG





/**

||-> Shortcode: Courses

*/
function modeltheme_list_courses_shortcode( $params, $content ) {

    extract( shortcode_atts( 
        array(
            'number'                                       => '',
            'category'                                     => '',
            'columns'                                      => '',
            'all_courses_box'                              => '',
            'all_courses_box_title'                        => '',
            'all_courses_box_title_color'                  => '',
            'all_courses_box_description_color'            => '',
            'all_courses_box_description'                  => '',
            'all_courses_box_button_text'                  => '',
            'all_courses_box_button_link'                  => '',
            'all_courses_box_button_background'            => '',
            'all_courses_box_button_border'                => '',
       ), $params ) 
    );

    $args_posts = array(
            'posts_per_page'        => $number,
            'post_type'             => 'lp_course',
            'post_status'           => 'publish',
            'orderby'               => 'post_date',
            'order'                 => 'DESC',
            // 'tax_query' => array(
            //     array(
            //         'taxonomy' => 'course_category',
            //         'field' => 'slug',
            //         'terms' => $category
            //     )
            // )
        );
    $posts = get_posts($args_posts);

    $shortcode_content  = "";
    $shortcode_content .= '<div class="courses-list row relative">';
    $counter = 1;

    if ($all_courses_box == 'yes') {
        $shortcode_content .= '<div class="'.esc_attr($columns).' courses">';
            $shortcode_content .= '<div class="col-md-12 all_courses_box">';
                $shortcode_content .= '<div class="all_courses_title">';      
                    $shortcode_content .= '<h1 class="all_courses_box_title" style="color:'.esc_attr($all_courses_box_title_color).';">'.esc_attr($all_courses_box_title).'</h1>';
                $shortcode_content .= '</div>';
                $shortcode_content .= '<div class="all_courses_description">';
                    $shortcode_content .= '<p class="all_courses_box_desc" style="color:'.esc_attr($all_courses_box_description_color).';">'.$all_courses_box_description.'</p>';
                $shortcode_content .= '</div>';
                $shortcode_content .= '<div class="all_courses_buton">';
                    $shortcode_content .= '<h4><a class="hvr-float rippler rippler-default" style="background-color:'.esc_attr($all_courses_box_button_background).'; border-color: '.esc_attr($all_courses_box_button_border).';" href="'.esc_attr($all_courses_box_button_link).'">'.esc_attr($all_courses_box_button_text).'</a></h4>';
                $shortcode_content .= '</div>';
            $shortcode_content .= '</div>';
        $shortcode_content .= '</div>';
    }

    if ($columns == 'vc_col-sm-6') {
        $image_size = 'cryptic_post_pic700x450';
    }elseif ($columns == 'vc_col-sm-4') {
        $image_size = 'cryptic_post_pic700x450';
    }elseif ($columns == 'vc_col-sm-3') {
        $image_size = 'cryptic_post_pic700x450';
    }

    foreach ($posts as $post) {
        $counter++;
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $image_size );
        $author_id = $post->post_author;


        $payment_type = get_post_meta( $post->ID, '_lpr_course_payment', true );
        $payment_sum = get_post_meta( $post->ID, '_lpr_course_price', true );
        $course_background_color = get_post_meta( $post->ID, 'smartowl_course_background_color', true );
        $course_badge = get_post_meta( $post->ID, 'smartowl_course_badge_icon', true );
        // learn_press_settings( 'general' );
        // $settings = learn_press_settings( 'general' );
        // $course_currency_position =$settings->get( 'currency_pos' );

        $custom_blog_color = "";
        if ( !empty($course_background_color)) { 
            $custom_blog_color = "text-white";
        } else { 
            echo ""; 
        }


        if ($payment_type == 'free') {

            $show_payment = 'Free';

        } elseif ($payment_type == 'not_free') {

            if ($course_currency_position == 'left') {
                $show_payment = learn_press_get_currency_symbol().esc_attr($payment_sum);
            }
            elseif ($course_currency_position == 'right') {
                $show_payment = esc_attr($payment_sum).learn_press_get_currency_symbol();
            }
            elseif ($course_currency_position == 'left_with_space') {
                $show_payment = learn_press_get_currency_symbol() . esc_attr($payment_sum);
            }
            elseif ($course_currency_position == 'right_with_space') {
                $show_payment = esc_attr($payment_sum) . learn_press_get_currency_symbol();
            }

        }else{
            $show_payment = '';
        }

            $shortcode_content .= '<div class="'.esc_attr($columns).' courses">';
                $shortcode_content .= '<div class="shortcode_course_content '. $custom_blog_color.'" style="background-color:'.esc_attr($course_background_color).';">';
                    $shortcode_content .= '<a href="'.get_permalink($post->ID).'">';
                        $shortcode_content .= '<div class="featured_image_courses">';
                        $shortcode_content .= '<div class="course_badge"><i class="'.esc_attr($course_badge).'" style="background-color:'.esc_attr($course_background_color).';"></i></div>';
                                if($thumbnail_src) { 
                                    $shortcode_content .= '<img src="'. esc_attr($thumbnail_src[0]) . '" alt="'. $post->post_title .'" />';
                                }else{ 
                                    $shortcode_content .= '<img src="http://placehold.it/700x500" alt="'. $post->post_title .'" />'; 
                                }
                        $shortcode_content .= '</div>';
                    $shortcode_content .= '</a>';
                    $shortcode_content .= '<div class="col-md-12 course_text_content">';
                        $shortcode_content .= '<a href="'.get_permalink($post->ID).'">';
                            $shortcode_content .= '<div class="col-md-11 course_text_container">';
                            if($columns == 'vc_col-sm-3') {
                                $shortcode_content .= '<h5 class="course_title">'.$post->post_title.'</h5>';
                            } else {
                                $shortcode_content .= '<h4 class="course_title">'.$post->post_title.'</h4>';
                            }

                            $shortcode_content .= '<div class="clearfix"></div>';
                            $shortcode_content .= '<h5 class="course_cost">'.esc_attr($show_payment).'</h5>';
                            $shortcode_content .= '</div>';
                        $shortcode_content .= '</a>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</div>';
            $shortcode_content .= '</div>';

        if ($columns == 'vc_col-sm-6' && $counter%2 == 0 && $all_courses_box == 'yes') {
            $shortcode_content .= '<div class="clearfix"></div>';
        }elseif ($columns == 'vc_col-sm-4' && $counter%3 == 0 && $all_courses_box == 'yes') {
            $shortcode_content .= '<div class="clearfix"></div>';
        }elseif ($columns == 'vc_col-sm-3' && $counter%4 == 0 && $all_courses_box == 'yes') {
            $shortcode_content .= '<div class="clearfix"></div>';
        }
    }

    $shortcode_content .= '</div>';
    return $shortcode_content;
}
add_shortcode('list_courses', 'modeltheme_list_courses_shortcode');





  // $lms_terms = get_terms( "course_category", array( "hide_empty" => 0 ) );;
  // // $lms_terms = get_terms('course_category');
  // $lms_category = array();
  // foreach ( $lms_terms as $term ) {
  //    $lms_category[$term->name] = $term->slug;
  // }

// SHORTCODE: List Courses
if (function_exists('vc_map')) {
  # code...
  vc_map( array(
     "name" => __("MODELTHEME - List Courses"),
     "base" => "list_courses",
     "category" => esc_attr__('LMStudy'),
     "icon" => "smartowl_shortcode",
     "params" => array(
         array(
            "group" => "Shortcode Setup",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number" ),
            "param_name" => "number",
            "value" => esc_attr__( "4" ),
            "description" => esc_attr__( "" )
        ),
        // array(
        //    "group" => "Shortcode Setup",
        //    "type" => "dropdown",
        //    "holder" => "div",
        //    "class" => "",
        //    "heading" => esc_attr__("Select Course Category"),
        //    "param_name" => "category",
        //    "description" => esc_attr__("Please select a category"),
        //    "std" => 'Default value',
        //    "value" => $lms_category
        // ),
        array(
           "group" => "Shortcode Setup",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns"),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('2 columns')     => 'vc_col-sm-6',
            esc_attr__('3 columns')     => 'vc_col-sm-4',
            esc_attr__('4 columns')     => 'vc_col-sm-3'
           )
        ),
        array(
           "group" => "Courses Box",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Do you want the All Courses box?"),
           "param_name" => "all_courses_box",
           "std" => 'no',
           "description" => esc_attr__(""),
           "value" => array(
            'Yes'     => 'yes',
            'No'     => 'no'
           )
        ),
        array(
            "group" => "Courses Box",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "All courses box - title" ),
            "param_name" => "all_courses_box_title",
            "value" => esc_attr__( "All Courses" ),
            "description" => esc_attr__( "" )
        ),
        array(
            "group" => "Courses Box",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("All courses box - color"),
           "param_name" => "all_courses_box_title_color",
           "value" => esc_attr__("#485052"),
           "description" => esc_attr__("")
        ),
        array(
            "group" => "Courses Box",
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "All courses box - description" ),
            "param_name" => "all_courses_box_description",
            "value" => esc_attr__( "Description for all courses box" ),
            "description" => esc_attr__( "" )
        ),
        array(
            "group" => "Courses Box",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("All courses box - description color"),
           "param_name" => "all_courses_box_description_color",
           "value" => esc_attr__("#485052"),
           "description" => esc_attr__("")
        ),
        array(
            "group" => "Courses Box",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "All courses box - button text" ),
            "param_name" => "all_courses_box_button_text",
            "value" => esc_attr__( "Button text" ),
            "description" => esc_attr__( "" )
        ),
        array(
            "group" => "Courses Box",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "All courses box - button link" ),
            "param_name" => "all_courses_box_button_link",
            "value" => esc_attr__( "#" ),
            "description" => esc_attr__( "" )
        ),
        array(
           "group" => "Courses Box",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Button background color"),
           "param_name" => "all_courses_box_button_background",
           "value" => esc_attr__("#FFBA41"),
           "description" => esc_attr__("")
        ),
        array(
            "group" => "Courses Box",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Button border color"),
           "param_name" => "all_courses_box_button_border",
           "value" => esc_attr__("#C89230"),
           "description" => esc_attr__("")
        )
     )
  ));
}

?>