<?php
/**
 * Template for displaying the thumbnail of a course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 2.0.6
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if( !has_post_thumbnail() ){
    return;
}
global $post;
$user = get_userdata( get_post_field( 'post_author', $post->id ) );
?>
<div class="lms-thumbnail-author-group row">
    <div class="course-thumbnail col-md-9">
        <?php
        $image_title    = esc_attr( get_the_title( get_post_thumbnail_id() ) );
        $image_caption  = get_post( get_post_thumbnail_id() )->post_excerpt;
        $image_link     = wp_get_attachment_url( get_post_thumbnail_id() );
        $image          = get_the_post_thumbnail( $post->ID, apply_filters( 'single_course_image_size', 'single_course' ), array(
            'title' => $image_title,
            'alt'   => $image_title
        ) );

        // echo apply_filters(
        //     'learn_press_single_course_image_html',
        //     sprintf( '<a href="%s" itemprop="image" class="learn-press-single-thumbnail" title="%s">%s</a>', $image_link, $image_caption, $image ),
        //     $post->ID
        // );
        ?>
        <?php if(has_post_thumbnail()) : ?>
            <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'cryptic_blog_900x550' ); ?>
                <?php if($thumbnail_src) { ?>
                    <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive single-post-featured-img" alt="<?php the_title(); ?>" />
                <?php } ?>
        <?php endif; ?>
    </div>

    <div class="col-md-3">
        <div class="lms-course-author-holder">
            <div class="lms-course-author">
                <?php 
                // Instructor avatar
                if (get_avatar( get_user_meta( $user->ID, $user->user_email, true ) )) {
                    echo get_avatar( get_user_meta( $user->ID, $user->user_email, true ), '100' );
                } ?>
            </div>
            <div class="text-center">
                <h3 class="lms-instructor-name"><?php echo $user->display_name; ?></h3>
                <p class="no-margin"><?php echo get_user_meta( $user->ID, 'description', true ); ?></p>
                <?php
                    echo '<ul class="lms-social-links">';
                        $cryptic_social_facebook = get_user_meta( $user->ID, 'cryptic_social_facebook', true );
                        $cryptic_social_twitter = get_user_meta( $user->ID, 'cryptic_social_twitter', true );
                        $cryptic_social_linkedin = get_user_meta( $user->ID, 'cryptic_social_linkedin', true );
                        $cryptic_social_instagram = get_user_meta( $user->ID, 'cryptic_social_instagram', true );
                        $cryptic_social_google_plus = get_user_meta( $user->ID, 'cryptic_social_google_plus', true );
                        $instructor_site_url = get_user_meta( $user->ID, 'user_url', true );

                        if ( isset( $cryptic_social_facebook )) {
                            echo '<li class="lms-facebook"><a href="'.$cryptic_social_facebook.'"><i class="fa fa-facebook"></i></a></li>';
                        } 
                        if ( isset( $cryptic_social_twitter )) {
                            echo '<li class="lms-twitter"><a href="'.$cryptic_social_twitter.'"><i class="fa fa-twitter"></i></a></li>';
                        }
                        if ( isset( $cryptic_social_linkedin )) {
                            echo '<li class="lms-linkedin"><a href="'.$cryptic_social_linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
                        }
                        if ( isset( $cryptic_social_instagram )) {
                            echo '<li class="lms-instagram"><a href="'.$cryptic_social_instagram.'"><i class="fa fa-instagram"></i></a></li>';
                        }
                        if ( isset( $cryptic_social_google_plus )) {
                            echo '<li class="lms-google-plus"><a href="'.$cryptic_social_google_plus.'"><i class="fa fa-google-plus"></i></a></li>';
                        }
                        if ( isset( $instructor_site_url )) {
                            echo '<li class="lms-site-link"><a href="'.$instructor_site_url.'"><i class="fa fa-link"></i></a></li>';
                        }
                    echo '</ul>';
                ?>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>