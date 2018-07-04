<?php
/*
 * Template for displaying the status of course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->global['course'];

$user = learn_press_get_current_user();

if ( !$user->has( 'purchased-course', $course->id ) ) {
	return;
}

$status = $user->get_course_status( $course->id );
?>
<div class="col-md-3">
	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo get_template_directory_uri().'/images/lms_icon_1_status.png'; ?>" alt="" />
		</div>
		<div class="col-md-9">
			<h5 class="lms-meta-heading"><?php echo esc_attr__('Your Status:','cryptic'); ?></h5>
			<span class="learn-press-course-status <?php echo sanitize_title( $status );?>"><?php echo ucfirst( $status ); ?></span>
		</div>
	</div>
</div>
