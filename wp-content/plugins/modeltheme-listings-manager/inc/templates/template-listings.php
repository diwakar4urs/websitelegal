<?php

/*

* Template Name: Listings List

*/





get_header(); 



$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off',true );

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

$blog_page_header = get_post_meta( get_the_ID(), 'blog_page_header', true );

?>







<!-- Page content -->



    <!-- ///////////////////// Start Grid/List Layout ///////////////////// -->

    <?php





    wp_reset_postdata();



    $args = array(

        'post_type'        => 'mt_listing',

        'post_status'      => 'publish',

        'posts_per_page'  => -1,

    );



    $posts = new WP_Query($args);





    ?>







    <!-- Page content -->

    <div class="high-padding">

        <!-- Blog content -->

        <div class="container blog-posts">

            <div class="row">

                <div class="col-md-12 main-content">

                    <?php if ( $posts->have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>

                        <table id="DataTable-icondrops-active" class="table" cellspacing="0" width="100%">

                            <thead>

                                <tr>

                                    <th><?php esc_html_e('Project','mtlisitings'); ?></th>

                                    <th><?php esc_html_e('Interest','mtlisitings'); ?></th>

                                    <th><?php esc_html_e('Category','mtlisitings'); ?></th>

                                    <th><?php esc_html_e('Received','mtlisitings'); ?></th>

                                    <th><?php esc_html_e('Goal','mtlisitings'); ?></th>

                                    <th><?php esc_html_e('End Date','mtlisitings'); ?></th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php while ( $posts->have_posts() ) : $posts->the_post();  ?>

                                    <?php include('content-listing-archive.php');  ?>

                                <?php endwhile; ?>

                            </tbody>

                        </table>

                    <?php else : ?>

                        <?php get_template_part( 'content', 'none' ); ?>

                    <?php endif; ?>





                    <?php 

                    query_posts($args);

                    global  $wp_query;

                    if ($wp_query->max_num_pages != 1) { ?>                

                    <div class="modeltheme-pagination-holder col-md-12">           

                        <div class="modeltheme-pagination pagination">           

                            <?php cryptic_pagination(); ?>

                        </div>

                    </div>

                    <?php } ?>



                </div>

           </div>

        </div>

    </div>



<?php

get_footer();

?>