<?php
/**
 * User Information
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
global $wp_query;

$tabs         = learn_press_user_profile_tabs( $user );
$current      = learn_press_get_current_profile_tab();
$profile_link = learn_press_get_page_link( 'profile' );
if ( !empty( $tabs ) && !empty( $tabs[$current] ) ) : ?>
	<div class="user-info" id="learn-press-user-info">
		<div class="user-basic-info">
			<div class="lms-learning-profile-metas">
				<span class="user-avatar"><?php echo get_avatar( $user->ID, 150 ); ?></span>
				<div class="clearfix"></div>
				<strong class="user-nicename"><?php echo $user->user_nicename; ?></strong>
				<?php if ( $description = get_user_meta( $user->id, 'description', true ) ): ?>
					<p class="user-bio"><?php echo get_user_meta( $user->id, 'description', true ); ?></p>
				<?php endif; ?>

				<?php
				// if current user			 
				//if ( $current_user ) {
					echo '<ul class="lms-social-links">';
					    $cryptic_social_facebook = get_the_author_meta( 'cryptic_social_facebook' );
					    $cryptic_social_twitter = get_the_author_meta( 'cryptic_social_twitter' );
					    $cryptic_social_linkedin = get_the_author_meta( 'cryptic_social_linkedin' );
					    $cryptic_social_instagram = get_the_author_meta( 'cryptic_social_instagram' );
					    $cryptic_social_google_plus = get_the_author_meta( 'cryptic_social_google_plus' );
					    $instructor_site_url = get_the_author_meta( 'user_url' );
					     
					    if ( ! empty( $cryptic_social_facebook )) {
					        echo '<li class="lms-facebook"><a href="'.$cryptic_social_facebook.'"><i class="fa fa-facebook"></i></a></li>';
					    } 
					    if ( ! empty( $cryptic_social_twitter )) {
					        echo '<li class="lms-twitter"><a href="'.$cryptic_social_twitter.'"><i class="fa fa-twitter"></i></a></li>';
					    }
					    if ( ! empty( $cryptic_social_linkedin )) {
					        echo '<li class="lms-linkedin"><a href="'.$cryptic_social_linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
					    }
					    if ( ! empty( $cryptic_social_instagram )) {
					        echo '<li class="lms-instagram"><a href="'.$cryptic_social_instagram.'"><i class="fa fa-instagram"></i></a></li>';
					    }
					    if ( ! empty( $cryptic_social_google_plus )) {
					        echo '<li class="lms-google-plus"><a href="'.$cryptic_social_google_plus.'"><i class="fa fa-google-plus"></i></a></li>';
					    }
					    if ( ! empty( $instructor_site_url )) {
					        echo '<li class="lms-site-link"><a href="'.$instructor_site_url.'"><i class="fa fa-link"></i></a></li>';
					    }
					echo '</ul>';
				//} ?>
			</div>
		</div>
	</div>
<?php endif; ?>