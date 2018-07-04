<?php
/**
 * Template for displaying the enroll button
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 2.1.6
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->global['course'];


//Necessary for #close
$course2 = learn_press_get_the_course();
$user   = learn_press_get_current_user();



if ( !$course->is_required_enroll() ) {
	return;
}

$course_status = learn_press_get_user_course_status();
$user          = learn_press_get_current_user();

// only show enroll button if user had not enrolled
$purchase_button_text = apply_filters( 'learn_press_purchase_button_text', __( 'Buy this course', 'cryptic' ) );
$enroll_button_text   = apply_filters( 'learn_press_enroll_button_text', __( 'Enroll', 'cryptic' ) );
$retake_button_text   = apply_filters( 'learn_press_retake_button_text', __( 'Retake', 'cryptic' ) );
?>
			<div class="learn-press-course-buttons">

				<?php do_action( 'learn_press_before_course_buttons', $course->id ); ?>

				<?php

				# -------------------------------
				# Finished Course
				# -------------------------------
				if ( $user->has( 'finished-course', $course->id ) ): ?>
					<?php if ( $count = $user->can( 'retake-course', $course->id ) ): ?>
						<button
							class="button button-retake-course"
							data-course_id="<?php echo esc_attr( $course->id ); ?>"
							data-security="<?php echo esc_attr( wp_create_nonce( sprintf( 'learn-press-retake-course-%d-%d', $course->id, $user->id ) ) ); ?>">
							<?php echo esc_html( sprintf( __( 'Retake course (+%d)', 'cryptic' ), $count ) ); ?>
						</button>
					<?php endif; ?>
					<?php

				# -------------------------------
				# Enrolled Course
				# -------------------------------
				elseif ( $user->has( 'enrolled-course', $course->id ) ): ?>
					<?php
					$can_finish = $user->can_finish_course( $course->id );
					//if ( $can_finish ) {
					$finish_course_security = wp_create_nonce( sprintf( 'learn-press-finish-course-' . $course->id . '-' . $user->id ) );
					//} else {
					//$finish_course_security = '';
					//}
					?>
					<button
						id="learn-press-finish-course"
						class="button-finish-course<?php echo !$can_finish ? ' hide-if-js' : ''; ?>"
						data-id="<?php echo esc_attr( $course->id ); ?>"
						data-security="<?php echo esc_attr( $finish_course_security ); ?>">
						<?php esc_html_e( 'Finish course', 'cryptic' ); ?>
					</button>
				<?php elseif ( $user->can( 'enroll-course', $course->id ) ) : ?>
					<form name="enroll-course" class="enroll-course" method="post" enctype="multipart/form-data">
						<?php do_action( 'learn_press_before_enroll_button' ); ?>

						<input type="hidden" name="lp-ajax" value="enroll-course" />
						<input type="hidden" name="enroll-course" value="<?php echo $course->id; ?>" />
						<button class="button enroll-button" data-block-content="yes"><?php echo $enroll_button_text; ?></button>

						<?php do_action( 'learn_press_after_enroll_button' ); ?>
					</form>
				<?php elseif ( $user->can( 'purchase-course', $course->id ) ) : ?>
					<form name="purchase-course" class="purchase-course" method="post" enctype="multipart/form-data">
						<?php do_action( 'learn_press_before_purchase_button' ); ?>
						<input type="hidden" name="purchase-course" value="<?php echo $course->id; ?>" />
						<button class="button purchase-button" data-block-content="yes">
							<?php echo $course->is_free() ? $enroll_button_text : $purchase_button_text; ?>
						</button>
						<?php do_action( 'learn_press_after_purchase_button' ); ?>
					</form>
				<?php else: ?>

					<?php learn_press_display_message( '<p>' . apply_filters( 'learn_press_user_can_not_purchase_course_message', __( 'Sorry, you can not purchase this course', 'cryptic' ), $course, $user ) . '</p>' ); ?>

				<?php endif; ?>

				<?php do_action( 'learn_press_after_course_buttons', $course->id ); ?>

			</div>


<?php if ( $user->has_course_status( $course2->id, array( 'enrolled', 'finished' ) ) || !$course2->is_require_enrollment() ) { ?>

<?php } else { ?>
		</div> <!-- Close the col-md-9 div -->
	</div>  <!-- Close the row div -->
</div> <!-- Close the col-md-3 div -->

<?php } ?>

