<?php 
/**
* Template for House Listings
* Used in: taxonomy-mt-car-category.php, taxonomy-mt-car-features.php, taxonomy-mt-car-type.php, search.php
**/
// CAR THUMBNAIL
$post_img = '';
$thumbnail_src_featured = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cryptic_listing_archive_featured_square' );
$thumbnail_src_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cryptic_listing_archive_thumbnail' );
    if ($thumbnail_src_featured) {
        $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src_featured[0]) . '" alt="'.get_the_title().'" />';
        $post_col = 'col-md-6';
    } else {
        $post_col = 'col-md-12 no-featured-image';
    }    
$mt_listing_interest = get_post_meta( get_the_ID(), 'mt_listing_interest', true );
$mt_listing_category = get_post_meta( get_the_ID(), 'mt_listing_category', true );
$mt_listing_received = get_post_meta( get_the_ID(), 'mt_listing_received', true );
$mt_listing_received_percentage = get_post_meta( get_the_ID(), 'mt_listing_received_percentage', true );
$mt_listing_goal_money = get_post_meta( get_the_ID(), 'mt_listing_goal_money', true );
$mt_listing_end_date_pick = get_post_meta( get_the_ID(), 'mt_listing_end_date_pick', true );
$mt_select_font = get_post_meta( get_the_ID(), 'mt_select_font', true );
$mt_font_cryptocoins_icons = get_post_meta( get_the_ID(), 'mt_font_cryptocoins_icons', true );
$mt_font_awesome_icons = get_post_meta( get_the_ID(), 'mt_font_awesome_icons', true );
$mt_font_simple_line = get_post_meta( get_the_ID(), 'mt_font_simple_line_icons', true );
$sticky_class = '';
if ( is_sticky(get_the_ID()) ) {
    $sticky_class = 'is-sticky';
} ?>
<tr id="post-<?php the_ID(); ?>" class="<?php echo esc_attr($sticky_class); ?>"> 
    <td class="ico-row text-left"> 
        <div class="ico-icon">
            <?php if (!empty($post_img)) { ?>
              <?php echo wp_kses_post($post_img); ?>
            <?php } else { ?>
              <div class="featured-icon">
                
                <?php if (isset($mt_select_font) && $mt_select_font == 'cryptocoins_icons') { ?>
                  <?php if($mt_font_cryptocoins_icons) { ?>
                    <i class="<?php echo esc_attr($mt_font_cryptocoins_icons); ?>"></i>
                  <?php } ?>
                <?php } elseif (isset($mt_select_font) && $mt_select_font == 'font_awesome_icons') { ?>
                  <?php if($mt_font_awesome_icons) { ?>
                    <i class="<?php echo esc_attr($mt_font_awesome_icons); ?>"></i>
                  <?php } ?>
                <?php } elseif (isset($mt_select_font) && $mt_select_font == 'simple_line_icons') { ?>
                  <?php if($mt_font_simple_line) { ?>
                    <i class="<?php echo esc_attr($mt_font_simple_line); ?>"></i>
                  <?php } ?>
                <?php } ?>
              </div>
            <?php } ?>
        </div>
        <?php $mt_select_rating_star_recent = get_post_meta( get_the_ID(), 'mt_select_rating_star', true ); ?>
                    
        <?php if(!empty($mt_select_rating_star_recent)) {
          $percentage_rating_recent = $mt_select_rating_star_recent;
        } else {
          $percentage_rating_recent = '0%';
        } ?>
                            
        <div class="ico-main-info">
            <h1 class="list_title">
                <a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php echo get_the_title(); ?></a>
            </h1>
            <div class="review-recent">
              <div class="parent-rating-star">
                <div class="rating-star" 
                    style="background-image:url(<?php echo plugins_url( 'images/stars.svg', dirname(__FILE__) );  ?>)">
                </div>
                <div class="fill-rating-star" 
                    style="background-image:url(<?php echo plugins_url( 'images/fill_stars.svg', dirname(__FILE__) );  ?>); width:<?php echo esc_attr($percentage_rating_recent); ?>">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="list_description"><?php echo wp_trim_words( get_the_excerpt(), 5 ); ?></div>
        </div>
    </td>
    <td class="interest">
        <div class="mt_listing_interest"><?php echo esc_attr($mt_listing_interest); ?></div> 
    </td>
    <td class="category">
        <div class="mt_listing_category">
            <?php $term_list = wp_get_post_terms(get_the_ID(), 'mt-listing-category2'); ?> 
            <?php if (!empty($term_list[0]->name)) { ?>
                <a href="<?php echo esc_url(get_term_link($term_list[0]->slug, 'mt-listing-category2')); ?>"> 
                    <?php echo esc_attr($term_list[0]->name); ?>
                </a>
            <?php } ?>
            <?php// echo esc_attr($mt_listing_category); ?>         
        </div> 
    </td>
    <?php 
    
    $mt_listing_received_without_comma = str_replace( ',', '', $mt_listing_received );
    $mt_listing_goal_money_without_comma = str_replace( ',', '', $mt_listing_goal_money );
    $mt_listing_received_without_dollar = str_replace( '$', '', $mt_listing_received_without_comma );
    $mt_listing_goal_without_dollar = str_replace( '$', '', $mt_listing_goal_money_without_comma );
    $percentage = ( $mt_listing_received_without_dollar * 100 ) / $mt_listing_goal_without_dollar; 
    ?>
    
    <td class="received"><div class="mt_listing_received"><?php echo  esc_attr($mt_listing_received); ?><span><?php echo esc_attr(number_format($percentage, 2)) . '%'; ?></span></div></td>
    <td class="goal">
        <div class="mt_listing_goal_money"><?php echo esc_attr($mt_listing_goal_money); ?></div>
    </td>
    <td class="end-date">
    <?php $now = time(); // or your date as well
    $your_date = strtotime($mt_listing_end_date_pick);
    $datediff = $now - $your_date;
    $date_dif_recent = abs(round($datediff / (60 * 60 * 24)));   ?>
    <div class="mt_listing_end_date"><?php echo esc_attr($date_dif_recent) . esc_html('d left','cryptic'); ?></div>
    </td>
</tr>
