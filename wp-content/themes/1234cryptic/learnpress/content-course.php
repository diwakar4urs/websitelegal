<?php
/**
 * Template for displaying course content within the loop
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// global  $course;
$course = LP()->global['course'];

#Custom variables
$columns = 'col-md-4';
$image_size = 'cryptic_700x500';
$show_payment = '';

#Metaboxes
$payment_type = get_post_meta( get_the_ID(), '_lp_course_payment', true );
$payment_sum = get_post_meta( get_the_ID(), '_lp_course_price', true );
$course_background_color = get_post_meta( get_the_ID(), 'cryptic_course_background_color', true );
$course_border_color = get_post_meta( get_the_ID(), 'cryptic_course_border_color', true );
$course_badge = get_post_meta( get_the_ID(), 'cryptic_course_badge_icon', true );

#Content description
$content_post = get_post($post->ID);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);


?>



	<li id="post-<?php the_ID(); ?>" <?php post_class('category_course_page'); ?> style="background-color:<?php echo esc_attr($course_background_color) ?>; border-color: <?php echo esc_attr($course_border_color); ?>">

		<?php do_action( 'learn_press_before_courses_loop_item' ); ?>
		
		<a href="<?php the_permalink();?>" class="course-title">

			<?php do_action( 'learn_press_courses_loop_item_title' ); ?>

		</a>

		<?php do_action( 'learn_press_after_courses_loop_item' ); ?>

	</li>







