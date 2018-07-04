<?php
/**
 * Template for displaying the price of a course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 2.1.4.2
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->global['course'];

if ( learn_press_is_enrolled_course() ) {
	return;
}

//Necessary for #open
$course2 = learn_press_get_the_course();
$user   = learn_press_get_current_user();

?>



<?php if ( $user->has_course_status( $course2->id, array( 'enrolled', 'finished' ) ) || !$course2->is_require_enrollment() ) { ?>

<?php } else { ?>
	<div class="col-md-3"> <!-- Open the col-md-9 div -->
		<div class="row"> <!-- Open the col-md-9 div -->
<?php } ?>
<!-- Open the col-md-3 div -->

		<div class="col-md-3">
			<img src="<?php echo get_template_directory_uri().'/images/lms_icon_1_status.png'; ?>" alt="" />
		</div>
		<div class="col-md-9 lms-course-price">

			<?php if ( $price = $course->get_price_html() ) {

				$origin_price = $course->get_origin_price_html();
				if ( $price != $origin_price ) {
					echo '<span class="course-origin-price">' . $origin_price . '</span>';
				}
				echo '<span class="course-price">' . $price . '</span>';
			}
			?>