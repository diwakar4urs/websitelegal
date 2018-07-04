<?php 
/**
* Template for Listings
* Used in: taxonomy-mt-car-category.php, taxonomy-mt-car-features.php, taxonomy-mt-car-type.php, search.php
**/
  $breadcrumbs_on_off = get_post_meta( get_the_ID(),'breadcrumbs_on_off',true );
  if (cryptic_plugin_active( 'modeltheme-framework/modeltheme-framework.php' )) {
      if (isset($breadcrumbs_on_off) && $breadcrumbs_on_off == 'yes' || $breadcrumbs_on_off == '') {
          echo cryptic_header_title_breadcrumbs();
      }
  } else {
      echo wp_kses_post(cryptic_header_title_breadcrumbs());
  }
  // List THUMBNAIL
  $post_img = '';
  $thumbnail_src_featured = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cryptic_listing_archive_featured_square' );
  $thumbnail_src_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cryptic_listing_archive_thumbnail' );
  if ($thumbnail_src_featured) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src_featured[0]) . '" alt="'.get_the_title().'" />';
    $post_col = 'col-md-6';
  } 
  else {
    $post_col = 'col-md-12 no-featured-image';
  }    
  $mt_listing_interest = get_post_meta( get_the_ID(), 'mt_listing_interest', true );
  $mt_listing_category = get_post_meta( get_the_ID(), 'mt_listing_category', true );
  $mt_listing_received = get_post_meta( get_the_ID(), 'mt_listing_received', true );
  $mt_listing_received_percentage = get_post_meta( get_the_ID(), 'mt_listing_received_percentage', true );
  $mt_listing_end_date_pick = get_post_meta( get_the_ID(), 'mt_listing_end_date_pick', true );
  $mt_listing_website_button = get_post_meta( get_the_ID(), 'mt_listing_website_button', true );
  $mt_listing_whitepaper_button = get_post_meta( get_the_ID(), 'mt_listing_whitepaper_button', true );
  $mt_listing_facebook = get_post_meta( get_the_ID(), 'mt_listing_facebook', true );
  $mt_listing_joinchat = get_post_meta( get_the_ID(), 'mt_listing_joinchat', true );
  $mt_listing_medium = get_post_meta( get_the_ID(), 'mt_listing_medium', true );
  $mt_listing_bitcointalk = get_post_meta( get_the_ID(), 'mt_listing_bitcointalk', true );
  $mt_listing_youtube = get_post_meta( get_the_ID(), 'mt_listing_youtube', true );
  $mt_video_tour = get_post_meta( get_the_ID(), 'mt_video_tour', true );
  $mt_listing_token_sale_date = get_post_meta( get_the_ID(), 'mt_listing_token_sale_date', true );
  $mt_listing_ticker = get_post_meta( get_the_ID(), 'mt_listing_ticker', true );
  $mt_listing_token_type = get_post_meta( get_the_ID(), 'mt_listing_token_type', true );
  $mt_listing_ico_token_price = get_post_meta( get_the_ID(), 'mt_listing_ico_token_price', true );
  $mt_listing_fundraising_goal = get_post_meta( get_the_ID(), 'mt_listing_fundraising_goal', true );
  $mt_listing_sold_on_pre_sale = get_post_meta( get_the_ID(), 'mt_listing_sold_on_pre_sale', true );
  $mt_listing_total_tokens = get_post_meta( get_the_ID(), 'mt_listing_total_tokens', true );
  $mt_listing_available_for_token_sale = get_post_meta( get_the_ID(), 'mt_listing_available_for_token_sale', true );
  $mt_listing_whitelist = get_post_meta( get_the_ID(), 'mt_listing_whitelist', true );
  $mt_listing_cant_participate = get_post_meta( get_the_ID(), 'mt_listing_cant_participate', true );
  $mt_listing_token_issue = get_post_meta( get_the_ID(), 'mt_listing_token_issue', true );
  $mt_listing_accepts = get_post_meta( get_the_ID(), 'mt_listing_accepts', true );
  $mt_listing_bonus_for_the_first = get_post_meta( get_the_ID(), 'mt_listing_bonus_for_the_first', true );
  $mt_listing_min_max_personal_cap = get_post_meta( get_the_ID(), 'mt_listing_min_max_personal_cap', true );
  $mt_listing_team_from = get_post_meta( get_the_ID(), 'mt_listing_team_from', true );
  $mt_listing_role_of_token = get_post_meta( get_the_ID(), 'mt_listing_role_of_token', true );
  $mt_listing_number_team_members = get_post_meta( get_the_ID(), 'mt_listing_number_team_members', true );
  $mt_listing_unsold_tokens = get_post_meta( get_the_ID(), 'mt_listing_unsold_tokens', true );
  $mt_listing_registered_company = get_post_meta( get_the_ID(), 'mt_listing_registered_company', true );
    
  $mt_listing_received_without_comma = str_replace( ',', '', $mt_listing_received );
  $mt_listing_goal_money_without_comma = str_replace( ',', '', $mt_listing_fundraising_goal );
  $mt_listing_received_without_dollar = str_replace( '$', '', $mt_listing_received_without_comma );
  $mt_listing_goal_without_dollar = str_replace( '$', '', $mt_listing_goal_money_without_comma );
  $percentage = ( $mt_listing_received_without_dollar * 100 ) / $mt_listing_goal_without_dollar; 
  $mt_select_font = get_post_meta( get_the_ID(), 'mt_select_font', true );
  $mt_font_cryptocoins_icons = get_post_meta( get_the_ID(), 'mt_font_cryptocoins_icons', true );
  $mt_font_awesome_icons = get_post_meta( get_the_ID(), 'mt_font_awesome_icons', true );
  $mt_font_simple_line = get_post_meta( get_the_ID(), 'mt_font_simple_line_icons', true );
  $mt_select_rating_star = get_post_meta( get_the_ID(), 'mt_select_rating_star', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
  <div class="container">
    <div class="panel panel-single-icondrops">
      <div class="panel-body"><?php esc_html_e('Details','mtlisitings'); ?>    </div>
    </div>
    <div class="row single-icondrops">
      <div class="col-md-8 main-content">
        <div class="row ico-info">
          <div class="col-md-2">
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
          <div class="col-md-10">
            <?php if(!empty($mt_select_rating_star)) {
              $percentage_rating = $mt_select_rating_star;
            } else {
              $percentage_rating = '0%';
            } ?>
            <h1 class="list_title">
              <span><?php echo get_the_title(); ?></span>
              <div class="parent-rating-star">
                <div class="rating-star" 
                    style="background-image:url(<?php echo plugins_url( 'images/stars.svg', dirname(__FILE__) );  ?>)">
                </div>
                <div class="fill-rating-star" 
                    style="background-image:url(<?php echo plugins_url( 'images/fill_stars.svg', dirname(__FILE__) );  ?>); width:<?php echo esc_attr($percentage_rating); ?>">
                </div>
              </div>
            </h1>
            <?php $term_list = wp_get_post_terms(get_the_ID(), 'mt-listing-category2'); ?> 
            <?php if (!empty($term_list[0]->name)) { ?>
              <a href="<?php echo esc_url(get_term_link($term_list[0]->slug, 'mt-listing-category2')); ?>">
                <h1 class="mt_listing_category"><?php echo esc_attr($term_list[0]->name); ?></h1>
              </a>
            <?php } ?>
          </div>
          <div class="col-md-12">
            <div class="list_description">
              <?php the_excerpt(); ?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="progress skill-bar">
              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo esc_attr(number_format($percentage, 2)); ?>" aria-valuemin="0" aria-valuemax="100">
                  <span class="skill">
                    <i class="val"><?php echo esc_attr(number_format($percentage, 2)) . '%' ; ?></i>
                  </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row middle-desk">
          <?php if (!empty($mt_video_tour)) { ?>
            <div class="col-md-12">
              <div class="mt_listing--youtube_video">                 
                <div class="mt_listing--youtube_video">
                  <div class="embed-responsive embed-responsive-16by9">
                    <?php echo wp_oembed_get($mt_video_tour); ?>
                  </div>
                </div>                                   
              </div>
            </div>
          <?php } ?>
        </div> <!-- row middle-desk -->
        <div class="row info-ico">
          <?php if (!empty($mt_listing_token_sale_date)) { ?>
            <div class="col-md-12">
              <h3 class="mt_listing_token_sale_date">
                <i class="fa fa-calendar"></i>                  
                <?php esc_html_e('TOKEN SALE','mtlisitings'); ?>                     
                <?php echo esc_attr($mt_listing_token_sale_date); ?>                  
              </h3>
            </div>
          <?php } ?>
          
          <div class="col-md-6">
            <?php if (!empty($mt_listing_ticker)) { ?>
              <h5><strong><?php esc_html_e('Ticker: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_ticker);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_token_type)) { ?>
              <h5><strong><?php esc_html_e('Token type: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_token_type);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_ico_token_price)) { ?>
              <h5><strong><?php esc_html_e('ICO Token price: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_ico_token_price);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_fundraising_goal)) { ?>
              <h5><strong><?php esc_html_e('Fundraising Goal: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_fundraising_goal);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_sold_on_pre_sale)) { ?>
              <h5><strong><?php esc_html_e('Sold on pre-sale: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_sold_on_pre_sale);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_total_tokens)) { ?>
              <h5><strong><?php esc_html_e('Total Tokens: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_total_tokens);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_available_for_token_sale)) { ?>
              <h5><strong><?php esc_html_e('Available for Token Sale: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_available_for_token_sale);  ?></h5>
            <?php } ?>
          </div>
          <div class="col-md-6">
            <?php if (!empty($mt_listing_whitelist)) { ?>
              <h5><strong><?php esc_html_e('Whitelist: ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_whitelist);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_kyc)) { ?>
              <h5><strong><?php esc_html_e('Know Your Customer (KYC): ','mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_kyc);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_cant_participate)) { ?>
              <h5><strong><?php esc_html_e("Сan't participate: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_cant_participate);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_token_issue)) { ?>
              <h5><strong><?php esc_html_e("Token Issue: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_token_issue);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_bonus_for_the_first)) { ?>
              <h5><strong><?php esc_html_e("Bonus for the First: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_bonus_for_the_first);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_min_max_personal_cap)) { ?>
              <h5><strong><?php esc_html_e("Enter Min/Max Personal Cap: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_min_max_personal_cap);  ?></h5>
            <?php } ?>
            <?php if (!empty($mt_listing_accepts)) { ?>
              <h5><strong><?php esc_html_e("Accepts the following: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_accepts);  ?></h5>
            <?php } ?>
          </div>
        </div> <!-- row info-ico -->
        <div class="row info-ico">
          <div class="col-md-12">
            <h3 class="mt_listing_token_sale_date">
              <i class="fa fa-bookmark-o"></i>
              <?php esc_html_e('SHORT REVIEW','mtlisitings'); ?>         
            </h3>
          </div>
          <?php if (!empty($mt_listing_team_from) || !empty($mt_listing_role_of_token) || !empty($mt_listing_number_team_members)) { ?>
            <div class="col-md-6">
              <?php if (!empty($mt_listing_team_from)) { ?>
                <h5><strong><?php esc_html_e("Team from: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_team_from);  ?></h5>
              <?php } ?>
              <?php if (!empty($mt_listing_role_of_token)) { ?>
                <h5><strong><?php esc_html_e("Role of Token: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_role_of_token);  ?></h5>
              <?php } ?>
              <?php if (!empty($mt_listing_number_team_members)) { ?>
                <h5><strong><?php esc_html_e("Number of Team Members: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_number_team_members);  ?></h5>
              <?php } ?> 
            </div>
          <?php } ?>
          <?php if (!empty($mt_listing_unsold_tokens) || !empty($mt_listing_registered_company)) { ?>
            <div class="col-md-6">
              <?php if (!empty($mt_listing_unsold_tokens)) { ?>
                <h5><strong><?php esc_html_e("Unsold Tokens: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_unsold_tokens);  ?></h5>
              <?php } ?> 
              <?php if (!empty($mt_listing_registered_company)) { ?>
                <h5><strong><?php esc_html_e("Registered Company: ",'mtlisitings'); ?></strong><?php echo esc_attr($mt_listing_registered_company);  ?></h5>
              <?php } ?> 
            </div>
          <?php } ?>
          
        </div> <!-- row info-ico -->
        <div class="row info-ico">
          <div class="col-md-12">
            <h3 class="mt_listing_token_sale_date">
              <i class="fa fa-link"></i>               
              <?php esc_html_e('ADDITIONAL LINKS','mtlisitings'); ?>                
            </h3>
          </div>
          <div class="col-md-6">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="clearfix"></div>
        <?php 
          global  $dynamic_featured_image;
          $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID() ); 
        ?>
        <?php if (!empty($featured_images)) { ?>
          <div class="row info-ico">
            <div class="col-md-12">
              <h3 class="mt_listing_token_sale_date">
                <i class="fa fa-picture-o"></i>       
                <?php esc_html_e('SCREENSHOTS','mtlisitings'); ?>                             
              </h3>  
            </div>         
            <div class="mt_listing--gallery text-center">
              <?php
                  $photos_number = '0';
                  if( !is_null($featured_images) ){
                      $photos_number = count($featured_images);
                  }
                  $final_photos_number = $photos_number + 1;
              ?>
              <?php
                  if( !is_null($featured_images) ){
                    $medias = array();
                    foreach($featured_images as $images){
                        $attachment_id = $images['attachment_id'];
                        $medias[] = $attachment_id;
                    }
                    $ids = '';
                    $len = count($medias);
                    $i = 0;
                    foreach($medias as $media){
                      $multiple_featured_image1 = wp_get_attachment_url( $media, 'full' );
                      echo '<div class="col-md-4">';
                        echo '<a class="mt_listing--single-gallery" href="'.esc_url($multiple_featured_image1).'">';
                          echo '<div class="ico-screenshot">';
                            echo '<img src="'.esc_url($multiple_featured_image1).'">'; 
                            echo '<div class="flex-zone">';
                            
                              echo '<span class="flex-zone-inside view-image-btn btn">VIEW</span>';
                            
                            echo '</div>';
                          echo '</div>';
                        echo '</a>';
                      echo '</div>';
                    }
                  } 
              ?>
            </div>         
          </div> <!-- row info-ico -->
        <?php } ?> 
      </div> <!-- col-md-8 single-icondrops main-content-->
      <div class="col-md-4 text-center">
        <div class="token-sale-column">
          <?php if (!empty($mt_listing_end_date_pick)) { ?>
            <div class="mt_listing_end_date_details">
              <?php $term_list = wp_get_post_terms(get_the_ID(), 'mt-listing-category'); ?>  
              <?php if ($term_list[0]->slug == 'active-ico') {
                esc_html_e('Token Sale ends in','mtlisitings');
              } 
              if ($term_list[0]->slug == 'upcoming-ico') {
                esc_html_e('Token Sale starts in','mtlisitings');
              } 
              if ($term_list[0]->slug == 'ended-ico') {
                esc_html_e('Token Sale ended','mtlisitings');
              } ?>
              <br>
              <?php $now = new DateTime(); 
              $date = new DateTime($mt_listing_end_date_pick);
              $date_dif = $date->diff($now)->format("%y Years, %m Months, %d Days and %h Hours");
              ?>
              <span class="token-days"><strong><?php echo esc_attr($date_dif); ?></strong></span>
            </div>
          <?php } ?>
          <?php if (!empty($mt_listing_received)) { ?>
            <div class="mt_listing_received"><?php echo esc_attr($mt_listing_received); ?></div>
          <?php } ?>
          <?php if (!empty($mt_listing_fundraising_goal) && !empty($percentage)) { ?>
            <div class="mt_listing_received-goal">
              <?php esc_html_e('OF','mtlisitings'); ?>  
              <br>
              <?php echo esc_attr($mt_listing_fundraising_goal); ?>
              <?php echo esc_attr(number_format($percentage, 2)) . '%'; ?>    
            </div>
          <?php } ?>
          <?php if (!empty($mt_listing_website_button)) { ?>
            <a target="_blank" href="<?php echo esc_attr($mt_listing_website_button); ?>" class="mt_listing_website_button">
              <?php esc_html_e('WEBSITE','mtlisitings'); ?>           
            </a>
          <?php } ?>
          <?php if (!empty($mt_listing_whitepaper_button)) { ?>
            <a target="_blank" href="<?php echo esc_attr($mt_listing_whitepaper_button); ?>" class="mt_listing_whitepaper_button">
              <?php esc_html_e('WHITEPAPPER','mtlisitings'); ?>              
            </a>
          <?php } ?>
          <?php if (!empty($mt_listing_facebook) || !empty($mt_listing_joinchat) || !empty($mt_listing_medium) || !empty($mt_listing_bitcointalk) || !empty($mt_listing_youtube)) { ?>
              <div class="social-links">
                <?php if (!empty($mt_listing_facebook)) { ?>
                  <a href="<?php echo esc_attr($mt_listing_facebook); ?>" target="_blank">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                  </a>
                <?php } ?>
                <?php if (!empty($mt_listing_joinchat)) { ?>
                  <a href="<?php echo esc_attr($mt_listing_joinchat); ?>" target="_blank">
                    <i class="fa fa-telegram" aria-hidden="true"></i>
                  </a>
                <?php } ?>
                <?php if (!empty($mt_listing_medium)) { ?>
                  <a href="<?php echo esc_attr($mt_listing_medium); ?>" target="_blank">
                    <i class="fa fa-medium" aria-hidden="true"></i>
                  </a>
                <?php } ?>
                <?php if (!empty($mt_listing_bitcointalk)) { ?>
                  <a href="<?php echo esc_attr($mt_listing_bitcointalk); ?>" target="_blank">
                    <i class="fa fa-btc" aria-hidden="true"></i>
                  </a>
                <?php } ?>
                <?php if (!empty($mt_listing_youtube)) { ?>
                  <a href="<?php echo esc_attr($mt_listing_youtube); ?>" target="_blank">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                  </a>
                <?php } ?>
              </div>
          <?php } ?>
        </div>
      </div> <!-- col-md-4 -->
    </div>
    <div class="clearfix"></div>
    <?php if ( cryptic_redux('mt_related_listings') ) { ?>
      <div class="panel panel-single-icondrops">
        <div class="panel-body"><?php esc_html_e('Related Listings','mtlisitings'); ?>    </div>
      </div>
      <div class="col-md-12 main-content">
        <div class="row">
          
          <div class="clearfix"></div>
          <div class="posts-listings">
            <?php
            global  $post;  
            $orig_post = $post;  
            ?>
            <div class="row">
              <?php 
              $args=array(  
                  'post__not_in'          => array($post->ID),  
                  'posts_per_page'        => 6, // Number of related posts to display.  
                  'post_type'             => 'mt_listing',
                  'post_status'           => 'publish',
                  'ignore_sticky_posts'   => 1  
              );
              $my_query = new wp_query( $args );
              while( $my_query->have_posts() ) {  
                $my_query->the_post(); 
            
              $mt_listing_category_recent = get_post_meta( get_the_ID(), 'mt_listing_category', true ); 
              $mt_listing_received_recent = get_post_meta( get_the_ID(), 'mt_listing_received', true );
              $mt_listing_fundraising_goal_recent = get_post_meta( get_the_ID(), 'mt_listing_fundraising_goal', true );
              $mt_listing_received_percentage_recent = get_post_meta( get_the_ID(), 'mt_listing_received_percentage', true );
              $mt_listing_interest_recent = get_post_meta( get_the_ID(), 'mt_listing_interest', true );
              $mt_listing_end_date_pick = get_post_meta( get_the_ID(), 'mt_listing_end_date_pick', true );
              $mt_select_font = get_post_meta( get_the_ID(), 'mt_select_font', true );
              $mt_font_cryptocoins_icons = get_post_meta( get_the_ID(), 'mt_font_cryptocoins_icons', true );
              $mt_font_awesome_icons = get_post_meta( get_the_ID(), 'mt_font_awesome_icons', true );
              $mt_font_simple_line = get_post_meta( get_the_ID(), 'mt_font_simple_line_icons', true );
              
              ?>
              <?php $sticky_class = '';
              if ( is_sticky(get_the_ID()) ) {
                  $sticky_class = 'is-sticky';
              }  ?>
                <div class="col-md-4 post">
                    <div class="blog_custom_listings <?php echo esc_attr($sticky_class); ?>">
                        <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )); ?>
                        <div class="row">
                          <div class="col-md-3">
                            <?php if (!empty($thumbnail_src)) { ?>
                              <a href="<?php the_permalink(); ?>" class="relative">
                                  <?php if($thumbnail_src) { ?>
                                      <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                  <?php } ?>
                              </a>
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
                          <div class="col-md-9">
                            <h4 class="post-name-listings"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                              <?php $term_list = wp_get_post_terms(get_the_ID(), 'mt-listing-category2'); ?> 
                              <?php if (!empty($term_list[0]->name)) { ?>
                                <a href="<?php echo esc_url(get_term_link($term_list[0]->slug, 'mt-listing-category2')); ?>">
                                    <h6 class="mt_listing_category_recent"><?php echo esc_attr($term_list[0]->name); ?></h6>
                                </a>
                              <?php } ?>
                          </div>
                        </div>
                        <div class="listings_details">     
                            <?php $mt_select_rating_star_recent = get_post_meta( get_the_ID(), 'mt_select_rating_star', true ); ?>
                                        
                            <?php if(!empty($mt_select_rating_star_recent)) {
                              $percentage_rating_recent = $mt_select_rating_star_recent;
                            } else {
                              $percentage_rating_recent = '0%';
                            } ?>
                            
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
                                                           
                            <?php if (!empty($mt_listing_received_recent) && !empty($mt_listing_fundraising_goal_recent) && !empty($mt_listing_received_percentage_recent)) { ?>
                              <div class="recent-received-goals">
                                <h6>
                                  <?php echo esc_attr($mt_listing_received_recent); ?>
                                  <span class="goal"> / <?php echo esc_attr($mt_listing_fundraising_goal_recent); ?></span>
                                  <span class="percentange"><?php echo esc_attr($mt_listing_received_percentage_recent); ?></span>
                                </h6>                                     
                              </div>
                            <?php } ?> 
                            <?php if (!empty($mt_listing_interest) && !empty($mt_listing_end_date_pick)) { ?>
                            <?php $now = time(); // or your date as well
                            $your_date = strtotime($mt_listing_end_date_pick);
                            $datediff = $now - $your_date;
                            $date_dif_recent = abs(round($datediff / (60 * 60 * 24)));    
                            ?>
                              <h6 class="mt_listing_interest_end_date">
                                  <?php echo esc_attr($mt_listing_interest_recent); ?>
                                  <span><?php echo esc_attr($date_dif_recent) . esc_html('d left','cryptic'); ?></span>
                              </h6>
                            <?php } ?>
                        </div>
                    </div>
                </div>
              <?php 
              } ?>
            </div>
          </div>
          <?php 
            $post = $orig_post;  
            wp_reset_postdata();  
          ?>  
        </div> <!-- row -->
      </div>
    <?php } ?>
    <?php
      // If comments are open or we have at least one comment, load up the comment template
      if ( comments_open() || get_comments_number() ) {
          comments_template();
      }
    ?>
  </div> <!-- container -->
</article>