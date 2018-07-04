<?php
/**
||-> LearnPress Functions
*/
function cryptic_learnpress_thumbnail_group_before() {
    echo '<div class="row">
            <div class="lms-thumbnail-group-holder">
                <div class="lms-thumbnail-group col-md-9">';
}
function cryptic_learnpress_thumbnail_group_after() {
    echo '</div>';
}

function cryptic_learnpress_author_sidebar_group_before() {
    echo '<div class="lms-author-sidebar-group col-md-3">';
}
function cryptic_learnpress_author_sidebar_group_after() {
    echo '</div></div></div>';
}

function cryptic_learnpress_price_button_before() {
    echo '<!-- Open the col-md-3 div -->
            <div class="col-md-3">
                <div class="row">';
}
function cryptic_learnpress_price_button_after() {
    echo '</div></div><!-- End the col-md-3 div -->';
}


/**
||-> LearnPress HOOKS rewrites
*/
/**
||-> TEMPLATE: Single landing course
*/
// Single landing course -> remove_actions (remove_action)
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_thumbnail', 5 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_title', 10 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_meta_start_wrapper', 15 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_price', 25 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_students', 30 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_meta_end_wrapper', 35 );
// remove_action( 'learn_press_content_landing_summary', 'learn_press_single_course_content_lesson', 40 );
// remove_action( 'learn_press_content_landing_summary', 'learn_press_single_course_content_item', 40 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_enroll_button', 45 );
// remove_action( 'learn_press_content_landing_summary', 'learn_press_single_course_description', 55 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_progress', 60 );
// remove_action( 'learn_press_content_landing_summary', 'learn_press_course_curriculum', 65 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_buttons', 70 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_students_list', 75 );
remove_action( 'learn_press_course_landing_content', 'learn_press_print_review', 80 );


// // Single landing course -> add_actions (add_action)
add_action( 'learn_press_content_landing_summary', 'learn_press_course_meta_start_wrapper', 5 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_status', 10 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_instructor', 15 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_students', 20 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_price', 20 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_buttons', 21 );
// add_action( 'learn_press_content_landing_summary', 'cryptic_learnpress_price_button_after', 21 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_enroll_button', 20 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_meta_end_wrapper', 25 );
add_action( 'learn_press_content_landing_summary', 'learn_press_course_thumbnail', 30 );
// add_action( 'learn_press_content_landing_summary', 'learn_press_single_course_description', 35 );
add_action( 'learn_press_course_landing_content', 'learn_press_print_review', 80 );





/**
||-> TEMPLATE: Single learning course
*/
remove_action( 'learn_press_before_main_content', 'learn_press_breadcrumb' );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_thumbnail', 5 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_meta_start_wrapper', 10 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_status', 15 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_instructor', 20 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_students', 25 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_meta_end_wrapper', 30 );
// remove_action( 'learn_press_content_learning_summary', 'learn_press_single_course_description', 35 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_single_course_content_lesson', 40 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_single_course_content_item', 40 );
remove_action( 'learn_press_content_learning_summary', 'learn_press_course_progress', 45 );
// remove_action( 'learn_press_content_learning_summary', 'learn_press_course_finish_button', 50 );
// remove_action( 'learn_press_content_learning_summary', 'learn_press_course_curriculum', 55 );
// remove_action( 'learn_press_content_learning_summary', 'learn_press_course_remaining_time', 60 );

add_action( 'learn_press_content_learning_summary', 'learn_press_course_meta_start_wrapper', 5 );
add_action( 'learn_press_content_learning_summary', 'learn_press_course_status', 10 );
add_action( 'learn_press_content_learning_summary', 'learn_press_course_instructor', 15 );
add_action( 'learn_press_content_learning_summary', 'learn_press_course_students', 20 );
add_action( 'learn_press_content_learning_summary', 'learn_press_course_meta_end_wrapper', 25 );
add_action( 'learn_press_content_learning_summary', 'learn_press_course_thumbnail', 30 );
add_action( 'learn_press_content_learning_summary', 'learn_press_course_progress', 35 );
// add_action( 'learn_press_content_learning_summary', 'learn_press_single_course_description', 36 );
add_action( 'learn_press_content_learning_summary', 'learn_press_single_course_content_lesson', 40 );
add_action( 'learn_press_content_learning_summary', 'learn_press_single_course_content_item', 40 );
// add_action( 'learn_press_content_learning_summary', 'learn_press_course_finish_button', 50 );
// add_action( 'learn_press_content_learning_summary', 'learn_press_course_curriculum', 55 );
// add_action( 'learn_press_content_learning_summary', 'learn_press_course_remaining_time', 60 );


/**
 * Display ratings count
 */

if ( !function_exists( 'cryptic_course_ratings_count' ) ) {
    function cryptic_course_ratings_count( $course_id = null ) {
        if ( !cryptic_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
            return;
        }
        if ( !$course_id ) {
            $course_id = get_the_ID();
        }
        $ratings = learn_press_get_course_rate_total( $course_id ) ? learn_press_get_course_rate_total( $course_id ) : 0;
        echo '<div class="course-comments-count">';
        echo '<div class="value"><i class="fa fa-comment"></i>';
        echo esc_html( $ratings );
        echo '</div>';
        echo '</div>';
    }
}



/**
 * Display course ratings
 */
if ( !function_exists( 'cryptic_course_ratings' ) ) {
    function cryptic_course_ratings() {

        if ( !cryptic_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
            return;
        }

        $course_id   = get_the_ID();
        $course_rate = learn_press_get_course_rate( $course_id );
        $ratings     = learn_press_get_course_rate_total( $course_id );
        ?>
        <div class="course-review">
            <div class="value">
                <?php cryptic_print_rating( $course_rate ); ?>
                <span class="lms-reviews-number"><?php $ratings ? printf( _n( '(%1$s review)', '(%1$s reviews)', $ratings, 'cryptic' ), number_format_i18n( $ratings ) ) : esc_html_e( '(0 review)', 'cryptic' ); ?></span>
            </div>
        </div>
        <?php
    }
}




if ( !function_exists( 'cryptic_print_rating' ) ) {
    function cryptic_print_rating( $rate ) {
        if ( !cryptic_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
            return;
        }

        ?>
        <div class="review-stars-rated">
            <ul class="review-stars">
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
            </ul>
            <ul class="review-stars filled" style="<?php echo esc_attr( 'width: ' . ( $rate * 20 ) . '%' ) ?>">
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
            </ul>
        </div>
        <?php
    }
}



/**
 * Display course info
 */
if ( !function_exists( 'cryptic_lms_course_infos' ) ) {
    function cryptic_lms_course_infos() {
        
        $course = LP()->global['course'];
        $course_id = get_the_ID();
        $lp_duration = get_post_meta( $course_id, '_lp_duration', true );
        $mt_course_language = get_post_meta( $course_id, 'mt_course_language', true );

        ?>
        <div class="lms-course-infos">
            <h3 class="lms-posttitle"><?php esc_html_e( 'Course Features', 'cryptic' ); ?></h3>
            <ul>
                <li>
                    <i class="fa fa-files-o"></i>
                    <span class="label"><?php esc_html_e( 'Lessons', 'cryptic' ); ?></span>
                    <span class="value"><?php echo count( $course->get_lessons() ); ?></span>
                </li>
                <li>
                    <i class="fa fa-puzzle-piece"></i>
                    <span class="label"><?php esc_html_e( 'Quizzes', 'cryptic' ); ?></span>
                    <span class="value"><?php echo count( $course->get_quizzes() ); ?></span>
                </li>

                <?php if ( $lp_duration != '' ) { ?>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <span class="label"><?php esc_html_e( 'Duration', 'cryptic' ); ?></span>
                        <span class="value"><?php echo esc_html( get_post_meta( $course_id, '_lp_duration', true ) ) . esc_attr(' weeks','cryptic'); ?></span>
                    </li>
                <?php } ?>

                <?php if ( $mt_course_language != '' ) { ?>
                    <li>
                        <i class="fa fa-language"></i>
                        <span class="label"><?php esc_html_e( 'Language', 'cryptic' ); ?></span>
                        <span class="value"><?php echo esc_html( get_post_meta( $course_id, 'mt_course_language', true ) ); ?></span>
                    </li>
                <?php } ?>
                <li>
                    <i class="fa fa-users"></i>
                    <span class="label"><?php esc_html_e( 'Students', 'cryptic' ); ?></span>
                    <?php $user_count = $course->count_users_enrolled( 'append' ) ? $course->count_users_enrolled( 'append' ) : 0; ?>
                    <span class="value"><?php echo esc_html( $user_count ); ?></span>
                </li>
                <li>
                    <i class="fa fa-check-square-o"></i>
                    <span class="label"><?php esc_html_e( 'Assessments', 'cryptic' ); ?></span>
                    <span class="value"><?php echo ( get_post_meta( $course_id, '_lp_course_result', true ) == 'yes' ) ? esc_html__( 'Yes', 'cryptic' ) : esc_html__( 'Self', 'cryptic' ); ?></span>
                </li>
                <?php if(get_the_term_list( $course_id, 'course_category', '', ', ' )){ ?>
                <li>
                    <i class="fa fa-pencil"></i>
                    <span class="label"><?php esc_html_e( 'Categories', 'cryptic' ); ?></span>
                    <span class="value"><?php echo get_the_term_list( $course_id, 'course_category', '', ', ' ); ?></span>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }

}


/**
 * Add some meta data for a course
 *
 * @param $meta_box
 */
if ( !function_exists( 'cryptic_custom_meta_boxes' ) ) {
    function cryptic_custom_meta_boxes( $meta_box ) {
        $fields             = $meta_box['fields'];
        $fields[]           = array(
            'name' => esc_html__( 'Course Language', 'cryptic' ),
            'id'   => 'mt_course_language',
            'type' => 'text',
            'desc' => esc_html__( 'Language\'s used for studying', 'cryptic' ),
            'std'  => esc_html__( 'English', 'cryptic' )
        );
        $meta_box['fields'] = $fields;

        return $meta_box;
    }
}

add_filter( 'learn_press_course_settings_meta_box_args', 'cryptic_custom_meta_boxes' );





?>