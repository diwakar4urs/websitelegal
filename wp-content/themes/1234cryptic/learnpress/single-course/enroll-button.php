<?php
/**
 * Template for displaying the enroll button
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

if ( !$course->is_required_enroll() ) {
	return;
}

$course_status = learn_press_get_user_course_status();
$user          = learn_press_get_current_user();
// only show enroll button if user had not enrolled
$purchase_button_text = apply_filters( 'learn_press_purchase_button_text', __( 'Buy this course', 'cryptic' ) );
$enroll_button_text   = apply_filters( 'learn_press_enroll_button_text', __( 'Enroll', 'cryptic' ) );
?>
<?php if ( $user->has( 'enrolled-course', $course->id ) ): ?>

	<?php learn_press_display_message( __( 'You have already enrolled this course', 'cryptic' ) ); ?>

<?php else: ?>
	<?php if ( $user->has( 'purchased-course', $course->id ) ) : ?>
		<?php if ( $user->has( 'finished-course', $course->id ) ): ?>
			<?php learn_press_display_message( __( 'Congratulations! You have finished this course', 'cryptic' ) ); ?>
		<?php else: ?>
			<?php if ( $user->can( 'enroll-course', $course->id ) ) : ?>

				<form name="enroll-course" class="enroll-course" method="post" enctype="multipart/form-data">
					<?php do_action( 'learn_press_before_enroll_button' ); ?>

					<input type="hidden" name="lp-ajax" value="enroll-course" />
					<input type="hidden" name="enroll-course" value="<?php echo $course->id; ?>" />
					<input type="hidden" name="_wp_http_referer" value="<?php echo get_the_permalink(); ?>" />
					<button class="button enroll-button"><?php echo $enroll_button_text; ?></button>

					<?php do_action( 'learn_press_after_enroll_button' ); ?>
				</form>

			<?php else: ?>

				<div class="lms-notice">
					<?php learn_press_display_message( apply_filters( 'learn_press_user_can_not_enroll_course_message', __( 'You have already purchased this course. Please wait for approve', 'cryptic' ), $course, $user ) ); ?>
				</div>

			<?php endif; ?>
		<?php endif; ?>
	<?php elseif ( $user->can( 'purchase-course', $course->id ) ) : ?>

		<?php if ( LP()->cart->has_item( $course->id ) ) { ?>
			<?php if ( learn_press_is_enable_cart() ): ?>
				<div class="lms-notice">
					<?php learn_press_display_message( sprintf( __( '<i class="fa fa-info-circle"></i> This course is already added to your cart <a href="%s" class="button view-cart-button">%s</a>', 'cryptic' ), learn_press_get_page_link( 'cart' ), __( 'View Cart', 'cryptic' ) ) ); ?>
				</div>
			<?php else: ?>
				<div class="lms-notice">
					<?php learn_press_display_message( sprintf( __( 'You have selected course. <a href="%s" class="button view-cart-button">%s</a>', 'cryptic' ), learn_press_get_page_link( 'checkout' ), __( 'Process Checkout', 'cryptic' ) ) ); ?>
				</div>
			<?php endif; ?>
		<?php } else { ?>

			<form name="purchase-course" class="purchase-course col-md-3" method="post" enctype="multipart/form-data">
				<?php do_action( 'learn_press_before_purchase_button' ); ?>
				<input type="hidden" name="_wp_http_referer" value="<?php echo get_the_permalink(); ?>" />
				<input type="hidden" name="add-course-to-cart" value="<?php echo $course->id; ?>" />
				<button class="button purchase-button"><?php echo $purchase_button_text; ?></button>
				<a class="button view-cart-button hide-if-js" href="<?php echo learn_press_get_page_link( 'cart' ); ?>"><?php esc_html_e( 'View cart', 'cryptic' ); ?></a>
				<?php do_action( 'learn_press_after_purchase_button' ); ?>
			</form>

		<?php } ?>

	<?php else: ?>

		<div class="lms-notice">
			<?php learn_press_display_message( apply_filters( 'learn_press_user_can_not_purchase_course_message', __( '<i class="fa fa-info-circle"></i> Sorry, you can not purchase this course', 'cryptic' ), $course, $user ) ); ?>
		</div>

	<?php endif; ?>

<?php endif; ?>

