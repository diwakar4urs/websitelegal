<?php
/**
 * Displaying the description of single course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 2.0.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->global['course'];

if( $course->is( 'viewing' ) != 'course' ){
	return;
}

$description_heading = apply_filters( 'learn_press_single_course_description_heading', __( 'Course Description', 'cryptic' ), $course );
?>


<div class="course-description" id="learn-press-course-description">
	<div class="lms-course-description-inner">

		<?php do_action( 'learn_press_begin_single_course_description' ); ?>

		<div class="lms-course-description col-md-8">
			<?php if( $description_heading ){ ?>
				<h3 class="course-description-heading" id="learn-press-course-description-heading"><?php echo $description_heading;?></h3>
			<?php } ?>

			<?php the_content(); ?>dsfgsdfg
		</div>

		<div class="lms-course-metas col-md-4">
			<?php cryptic_lms_course_infos(); ?>
		</div>

		<?php do_action( 'learn_press_end_single_course_description' ); ?>

	</div>
</div>