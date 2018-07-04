<?php
/**
 * @author        ThimPress
 * @package       LearnPress/Templates
 * @version       2.1.6
 */

defined('ABSPATH') || exit();

$course = LP()->global['course'];
$user = learn_press_get_current_user();
if (!$course) {
    return;
}
$status = $user->get('course-status', $course->id);
if (!$status) {
    return;
}
$force = isset($force) ? $force : false;
$num_of_decimal = 0;
$result = $course->evaluate_course_results(null, $force);
$current = absint($result);
$passing_condition = round($course->passing_condition, $num_of_decimal);
$passed = $current >= $passing_condition;
$heading = apply_filters('learn_press_course_progress_heading', $status == 'finished' ? __('Your results', 'cryptic') : __('Learning progress', 'cryptic'));
$course_items = sizeof($course->get_curriculum_items());
$completed_items = $course->count_completed_items();
$course_results = $course->evaluate_course_results();
?>
<div class="learn-press-course-results-progress">
    <div class="items-progress">
        <?php if ($heading !== false): ?>
            <h4 class="lp-course-progress-heading"><?php echo esc_html_e('Items completed', 'cryptic'); ?></h4>
        <?php endif; ?>
        <div class="lp-course-progress">
            <div class="lp-progress-bar">
                <div class="lp-progress-value"
                     style="width: <?php echo $course_items ? absint($completed_items / $course_items * 100) : '0'; ?>%;">
                    <span class="number"><?php printf( __('%d of %d items', 'cryptic'), $completed_items, $course_items); ?></span>


                </div>
            </div>
        </div>

    </div>
    <div class="course-progress">
        <h4 class="lp-course-progress-heading">
            <?php esc_html_e('Course results', 'cryptic'); ?>
            <?php
            if ($course->is_evaluation('evaluate_final_quiz')) {
                $tooltip = __("Evaluated by results of final quiz", 'cryptic');
            } elseif ($course->is_evaluation('evaluate_quizzes')) {
                $tooltip = __("Evaluated by average results of quizzes", 'cryptic');
            } else {
                $tooltip = __("Evaluated by items completed", 'cryptic');
            }
            ?>
            <span class="learn-press-tooltip" data-content="<?php echo esc_html($tooltip); ?>"></span>
        </h4>
        <div class="lp-course-progress<?php echo $passed ? ' passed' : ''; ?>" data-value="<?php echo $current; ?>"
             data-passing-condition="<?php echo $passing_condition; ?>">
            <div class="lp-progress-bar">
                <div class="lp-progress-value" style="width: <?php echo $current; ?>%;"></div>
            </div>
            <div class="lp-passing-conditional"
                 data-content="<?php printf(esc_html__('Passing condition: %s%%', 'cryptic'), $passing_condition); ?>"
                 style="left: <?php echo $passing_condition; ?>%;">
                    <div class="lms-percentage">
                        <span class="number"><?php echo $current ?></span><span class="percentage-sign">%</span>
                    </div>
            </div>
        </div>
    </div>
    <?php /*if ($user->has_enrolled_course($course->id)): ?>
        <?php learn_press_get_template('single-course/buttons.php'); ?>
    <?php endif;*/ ?>
</div>