<?php
/**
* Content Single
*/
$prev_post = get_previous_post();
$next_post = get_next_post();

$breadcrumbs_on_off             = get_post_meta( get_the_ID(), 'breadcrumbs_on_off',               true );
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php 
if (cryptic_plugin_active( 'modeltheme-framework/modeltheme-framework.php' )) {
    if (isset($breadcrumbs_on_off) && $breadcrumbs_on_off == 'yes' || $breadcrumbs_on_off == '') {
        echo cryptic_header_title_breadcrumbs();
    }
}else{
    echo wp_kses_post(cryptic_header_title_breadcrumbs());
}
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
       <div class="row">

            <?php if ( cryptic_redux('mt_single_blog_layout') == 'mt_single_blog_left_sidebar' && is_active_sidebar( cryptic_redux('mt_single_blog_layout_sidebar') )) { ?>
                <div class="col-md-3 sidebar-content">
                    <?php if (is_active_sidebar(cryptic_redux('mt_single_blog_layout_sidebar'))) { ?>
                        <?php dynamic_sidebar( cryptic_redux('mt_single_blog_layout_sidebar') ); ?>
                    <?php } ?>
                </div>
            <?php } ?>


            <?php if ( cryptic_redux('mt_single_blog_layout') == 'mt_single_blog_fullwidth') {
                $cols = 'col-md-12';
            }else{
                $cols = 'col-md-9';
            } ?>
            <!-- POST CONTENT -->
            <div class="<?php echo esc_attr($cols); ?> main-content">
                
                <!-- HEADER -->
                <div class="article-header">
                    <div class="article-details">

                        <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'cryptic_blog_900x550' ); 
                        if($thumbnail_src) { ?>
                            <?php the_post_thumbnail( 'cryptic_blog_900x550' ); ?>
                        <?php } ?>
                        <div class="clearfix"></div>

                        <h1 class="post-title">
                            <strong><?php echo esc_html(get_the_title()); ?></strong>
                        </h1>

                        <div class="post-category-comment-date row">
                            <span class="post-date">
                                <i class="icon-calendar"></i>
                                <?php echo esc_html(get_the_date()); ?>
                            </span>
                            <span class="post-categories">
                                <?php echo wp_kses_post(get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' )); ?>
                            </span>
                            <span class="post-author">
                                <i class="icon-user icons"></i>
                                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo get_the_author(); ?></a>
                            </span>
                            <span class="post-comments">
                                <i class="icon-bubbles icons"></i>
                                <a href="<?php echo esc_url(get_the_permalink().'#comments'); ?>"><?php comments_number( '0', '1', '%' ); ?></a>
                            </span>  
                        </div>

                    </div>
                </div>
                <!-- CONTENT -->
                <div class="article-content">
                    <?php the_content(); ?>
                    <div class="clearfix"></div>

                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cryptic' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                    <div class="clearfix"></div>


                    <?php if (get_the_tags()) { ?>
                        <div class="single-post-tags">
                            <span><?php echo esc_html__('Tags:','cryptic'); ?></span> <?php echo wp_kses_post(get_the_term_list( get_the_ID(), 'post_tag', '', ' ' )); ?>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                  

                    <?php
                        if(cryptic_plugin_active('modeltheme-framework/modeltheme-framework.php')){
                            echo do_shortcode('[mt_sharer tooltip_placement="top"]');
                        }
                    ?>
                    <div class="clearfix"></div>


                    <!-- AUTHOR BIO -->
                    <?php if ( cryptic_redux('mt_enable_authorbio') ) { ?>

                        <?php   
                        $avatar = get_avatar( get_the_author_meta('email'), '80', get_the_author() );
                        $has_image = '';
                        if( $avatar !== false ) {
                            $has_image .= 'no-author-pic';
                        }
                        ?>
                        
                        <div class="author-bio relative <?php echo esc_attr($has_image); ?>">
                            <div class="author-thumbnail col-md-4">
                                <?php
                                if( $avatar !== false ) {
                                    echo wp_kses_post($avatar); 
                                }
                                ?>
                                <div class="pull-left">
                                    <div class="author-name">
                                        <span><?php echo esc_html__('Written by','cryptic'); ?></span>
                                        <span class="name"><?php echo esc_html(get_the_author()); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="author-thumbnail col-md-8">
                                <div class="author-biography"><?php the_author_meta('description'); ?></div>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="clearfix"></div>

                    <!-- COMMENTS -->
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div>
            </div>

            <?php if(cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
                <?php if ( cryptic_redux('mt_single_blog_layout') == 'mt_single_blog_right_sidebar' && is_active_sidebar( cryptic_redux('mt_single_blog_layout_sidebar') )) { ?>
                    <div class="col-md-3 sidebar-content">
                        <?php if (is_active_sidebar(cryptic_redux('mt_single_blog_layout_sidebar'))) { ?>
                            <?php dynamic_sidebar( cryptic_redux('mt_single_blog_layout_sidebar') ); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="col-md-3 sidebar-content">
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
            
        </div>
    </div>
</article>


<div class="row post-details-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( cryptic_redux('mt_enable_related_posts') ) { ?>

                <div class="clearfix"></div>
                <div class="related-posts sticky-posts">
                    <?php
                    global  $post;  
                    $orig_post = $post;  
                    $tags = wp_get_post_tags($post->ID);  
                    ?>

                    <h2 class="heading-bottom"><?php esc_html_e('Related Posts', 'cryptic'); ?></h2>
                    <div class="row">
                        <?php
                        $args=array(  
                            'post__not_in'          => array($post->ID),  
                            'posts_per_page'        => 3, // Number of related posts to display.  
                            'ignore_sticky_posts'   => 1  
                        );  

                        $my_query = new wp_query( $args );  

                        while( $my_query->have_posts() ) {  
                            $my_query->the_post(); 
                        
                        ?>  
                            <div class="col-md-4 post">
                                <div class="related_blog_custom">
                                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'cryptic_related_post_pic500x300' ); ?>
                                    <?php if($thumbnail_src){ ?>
                                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="relative">
                                        <?php if($thumbnail_src) { ?>
                                            <img src="<?php echo esc_url($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </a>
                                    <?php } ?>
                                    <div class="related_blog_details">
                                        <h4 class="post-name"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                        <div class="post-author"><?php echo esc_attr('Posted by ','cryptic'); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a> - <?php echo esc_html(get_the_date()); ?></div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        } ?>
                    </div>
                </div>
                    <?php 
                    wp_reset_postdata();  
                    ?>  

                <?php } ?>



                <div class="clearfix"></div> 
                <?php if ( cryptic_redux('mt_enable_post_navigation') ) { ?>
                    <div class="prev-next-post">
                        <?php if(get_previous_post()){ ?>
                        <div class="col-md-6 prev-post text-left">
                            <a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
                                <i class="icon-arrow-left-circle"></i> <span><?php echo esc_html__( 'Previous Post', 'cryptic' ); ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if(get_next_post()){ ?>
                        <div class="col-md-6 next-post text-right">
                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                <span><?php echo esc_html__( 'Next Post', 'cryptic' ); ?></span> <i class="icon-arrow-right-circle"></i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>