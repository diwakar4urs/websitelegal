<?php
/**
 * The template for displaying search results.
 *
 */

get_header(); 



get_header(); 

$class_row = "col-md-9";
if ( cryptic_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class_row = "col-md-12";
}elseif ( cryptic_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or cryptic_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class_row = "col-md-9";
}
$sidebar = cryptic_redux('mt_blog_layout_sidebar');

// theme_ini
$theme_init = new cryptic_init_class;
?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo wp_kses_post(cryptic_header_title_breadcrumbs()); ?>

    <!-- Page content -->
    <div class="high-padding">
        <!-- Blog content -->
        <div class="container blog-posts">
            <div class="row">

                <?php if ( cryptic_redux('mt_blog_layout') != '' && cryptic_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                    <?php if (is_active_sidebar($sidebar)) { ?>
                        <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
                    <?php } ?>
                <?php } ?>

                <div class="<?php echo esc_attr($class_row); ?> main-content">
                <?php if ( have_posts() ) : ?>
                    <div class="row">

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php /* Loop - Variant 1 */ ?>
                            <?php get_template_part( 'content', $theme_init->cryptic_blogloop_variant() ); ?>
                        <?php endwhile; ?>

                        <div class="modeltheme-pagination-holder col-md-12">             
                            <div class="modeltheme-pagination pagination">             
                                <?php cryptic_pagination(); ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
                </div>

                <?php if ( cryptic_plugin_active('redux-framework/redux-framework.php')) { ?>
                    <?php if ( cryptic_redux('mt_blog_layout') != '' && cryptic_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <div class="col-md-3 sidebar-content">
                                <?php dynamic_sidebar( $sidebar ); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="col-md-3 sidebar-content">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>