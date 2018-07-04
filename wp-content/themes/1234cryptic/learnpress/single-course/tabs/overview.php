<?php
/**
 * Displaying the description of single course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->course;
global $post;

/*
if ( $course->is( 'viewing-item' ) ) {
	if ( false === apply_filters( 'learn_press_display_course_description_on_viewing_item', false ) ) {
		return;
	}
}*/

$description_heading = apply_filters( 'learn_press_single_course_description_heading', __( 'Course Overview', 'cryptic' ), $course );
?>



<div class="course-description row" id="learn-press-course-description">

	<?php do_action( 'learn_press_begin_single_course_description' ); ?>

		<div class="lms-course-description col-md-8">

			<?php if ( $description_heading ) { ?>
				<h3 class="lms-posttitle title" id="learn-press-course-description-heading"><?php echo $description_heading; ?></h3>
			<?php } ?>

			<?php 
			    $content = apply_filters('the_content', $post->post_content); 
			    echo $content;
			?>

		</div>

		<div class="lms-course-metas col-md-4">
			<?php cryptic_lms_course_infos(); ?>
		</div>


	<?php do_action( 'learn_press_end_single_course_description' ); ?>

</div>