<?php
/**
 * Template for displaying course thumbnail within the loop
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->global['course'];

#Metaboxes
$course_background_color = get_post_meta( get_the_ID(), 'cryptic_course_background_color', true );
$course_badge = get_post_meta( get_the_ID(), 'cryptic_course_badge_icon', true );

?>
<div class="course-thumbnail">
	<div class="course_badge"><i class="<?php echo esc_attr($course_badge); ?>" style="background-color:<?php echo esc_attr($course_background_color); ?>"></i></div>
	<?php echo $course->get_image( 'course_thumbnail' ) ?>
</div>
