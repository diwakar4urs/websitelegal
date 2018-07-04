<?php

/**

 * Template for displaying the students of a course

 *

 * @author  ThimPress

 * @package LearnPress/Templates

 * @version 2.1.4

 */



if ( !defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly

}



$course = LP()->global['course'];



?>



<div class="course-students col-md-3">

	<div class="row">

		<div class="col-md-3">

			<img src="<?php echo get_template_directory_uri(); ?>/images/lms_icon_4_enrolled.png" alt="" />

		</div>

		<div class="col-md-9">

			<h5 class="lms-meta-heading"><?php echo esc_attr__('Students Enrolled:', 'cryptic'); ?></h3>

			<?php echo $course->get_students_html(); ?>

		</div>

	</div>

</div>



<div class="lms-course-review-stars col-md-3">

	<div class="row">

		<div class="col-md-3">

			<img src="<?php echo get_template_directory_uri(); ?>/images/lms_icon_2_reviews.png" alt="" />

		</div>

		<div class="col-md-9">

			<h5 class="lms-meta-heading"><?php echo esc_attr__('Course Review:', 'cryptic'); ?></h3>

			<?php cryptic_course_ratings(); ?>

		</div>

	</div>

</div>