<?php
/**
 * Template for displaying the instructor of a course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course = LP()->global['course'];

$user = get_userdata( get_post_field( 'post_author', $course->id ) );

printf(
	'<div class="course-author col-md-3" aria-hidden="true" itemprop="author">
		<div class="row">
			<div class="col-md-3">
				<img src="'.get_template_directory_uri().'/images/lms_icon_3_instructor.png" alt="" />
			</div>
			<div class="col-md-9">
				<h5 class="lms-meta-heading">'.esc_attr__('Course Intructor:','cryptic').'</h5>
				<a href="'.learn_press_get_page_link( 'profile' ).$user->data->user_login.'">'.$user->display_name.'</a>
			</div>
		</div>
	</div>',
	apply_filters( 'before_instructor_link', __( '', 'cryptic' ) ),
	apply_filters( 'learn_press_instructor_profile_link', '#', null, $course->id ),
	get_the_author(),
	apply_filters( 'after_instructor_link', '' )
);