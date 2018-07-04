<?php 
/**
||-> Shortcode: BlogPos01
*/
function modeltheme_shortcode_icofilters($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'number'              =>'',
            'searchfilter'        =>'',
            'categoriesfilter'    =>'',
        ), $params ) );
    $args_blogposts = array(
            'posts_per_page'   => $number,
            'order'            => 'DESC',
            'post_type'        => 'mt_listing',
            'post_status'      => 'publish' 
    ); 
    
    $blogposts = get_posts($args_blogposts);
    $args_total = array(
      'post_type' => 'mt_listing'
    );
    $count_total = new WP_Query( $args_total );
    $args_active_ico = array(
      'tax_query' => array(
          array('taxonomy' => 'mt-listing-category','field' => 'slug','terms' => 'active-ico'),
        ),
      'post_type' => 'mt_listing'
    );
    $count_active_ico = new WP_Query( $args_active_ico );
    $args_ended_ico = array(
      'tax_query' => array(
          array('taxonomy' => 'mt-listing-category','field' => 'slug','terms' => 'ended-ico'),
        ),
      'post_type' => 'mt_listing'
    );
    $count_ended_ico = new WP_Query( $args_ended_ico );
    $args_upcoming_ico = array(
      'tax_query' => array(
          array('taxonomy' => 'mt-listing-category','field' => 'slug','terms' => 'upcoming-ico'),
        ),
      'post_type' => 'mt_listing'
    );
    $sticky_class = '';
    if ( is_sticky(get_the_ID()) ) {
        $sticky_class = 'is-sticky';
    }  
    $count_upcoming_ico = new WP_Query( $args_upcoming_ico );
    $html = '';
    $html .= '<div class="iconfilter-shortcode wow '.$animation.'">';
      $html .= '<div class="row">';
        $html .= '<main class="cd-main-content">';
          $html .= '<div class="cd-tab-filter-wrapper">';
            $html .= '<div class="cd-tab-filter">';
              $html .= '<ul class="cd-filters">';
                $html .= '<li class="placeholder"><a data-type="all">All</a></li>';
                $html .= '<li class="filter"><a  data-type="all">All ('.esc_attr($count_total->found_posts).')</a></li>';
                global $wpdb;
                $myrows=$wpdb->get_results("SELECT name,slug FROM wp_terms 
                WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy where taxonomy = 'mt-listing-category');" );
                foreach($myrows as $row) {
                  if($row->slug == 'active-ico') {
                    $html .= '<li class="filter" data-filter=".'.esc_attr($row->slug).'">
                      <a class="selected" data-type="'.esc_attr($row->slug).'">'.esc_attr($row->name).' ('.esc_attr($count_active_ico->found_posts).')</a>
                    </li>';
                  }
                  if($row->slug == 'ended-ico') {
                    $html .= '<li class="filter" data-filter=".'.esc_attr($row->slug).'">
                      <a data-type="'.esc_attr($row->slug).'">'.esc_attr($row->name).' ('.esc_attr($count_ended_ico->found_posts).')</a>
                    </li>';
                  }
                  if($row->slug == 'upcoming-ico') {
                    $html .= '<li class="filter" data-filter=".'.esc_attr($row->slug).'">
                      <a data-type="'.esc_attr($row->slug).'">'.esc_attr($row->name).' ('.esc_attr($count_upcoming_ico->found_posts).')</a>
                    </li>';
                  }
                }
              $html .= '</ul>';
            $html .= '</div>';
          $html .= '</div>';
          $html .= '<section class="cd-gallery">';
            $html .= '<ul>';
    foreach ($blogposts as $blogpost) {
      #thumbnail
      $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ));
      $mt_listing_category = get_post_meta( $blogpost->ID, 'mt_listing_category', true ); 
      $mt_listing_received = get_post_meta( $blogpost->ID, 'mt_listing_received', true );
      $mt_listing_fundraising_goal = get_post_meta( $blogpost->ID, 'mt_listing_fundraising_goal', true );
      $mt_listing_received_percentage = get_post_meta( $blogpost->ID, 'mt_listing_received_percentage', true );
      $mt_listing_interest = get_post_meta( $blogpost->ID, 'mt_listing_interest', true );
      $mt_listing_end_date_pick = get_post_meta( $blogpost->ID, 'mt_listing_end_date_pick', true );
      $mt_select_font = get_post_meta( $blogpost->ID, 'mt_select_font', true );
      $mt_font_cryptocoins_icons = get_post_meta( $blogpost->ID, 'mt_font_cryptocoins_icons', true );
      $mt_font_awesome_icons = get_post_meta( $blogpost->ID, 'mt_font_awesome_icons', true );
      $mt_font_simple_line = get_post_meta( $blogpost->ID, 'mt_font_simple_line_icons', true );
      $icon_feature = '';
      ?>
      <?php if (isset($mt_select_font) && $mt_select_font == 'cryptocoins_icons') { ?>
        <?php if($mt_font_cryptocoins_icons) { ?>
          <?php $icon_feature = '<i class="'.esc_attr($mt_font_cryptocoins_icons).'"></i>'; ?>
        <?php } ?>
      <?php } elseif (isset($mt_select_font) && $mt_select_font == 'font_awesome_icons') { ?>
        <?php if($mt_font_awesome_icons) { ?>
          <?php $icon_feature = '<i class="'.esc_attr($mt_font_awesome_icons).'"></i>'; ?>
        <?php } ?>
      <?php } elseif (isset($mt_select_font) && $mt_select_font == 'simple_line_icons') { ?>
        <?php if($mt_font_simple_line) { ?>
          <?php $icon_feature = '<i class="'.esc_attr($mt_font_simple_line).'"></i>'; ?>
        <?php } ?>
      <?php } ?>
      <?php if ($thumbnail_src) {
          $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
      }else{
          $post_img = $icon_feature;
      }
      
      $content_post   = get_post($blogpost->ID);
      $content        = $content_post->post_content;
      $content        = apply_filters('the_content', $content);
      $content        = str_replace(']]>', ']]&gt;', $content);
      $comments_count = wp_count_comments($blogpost->ID);
      if($comments_count->approved >= 1) {
          $comments = 'Comments <a href="'.get_comments_link($blogpost->ID).'">'. $comments_count->approved.'</a>';
      } else {
          $comments = 'No comments';
      }
      $term_list = wp_get_post_terms($blogpost->ID, 'mt-listing-category');
      $term_list_categories = wp_get_post_terms($blogpost->ID, 'mt-listing-category2');
      $sticky_class = '';
      if ( is_sticky($blogpost->ID) ) {
          $sticky_class = 'is-sticky';
      }
      $mt_listing_received_without_comma = str_replace( ',', '', $mt_listing_received );
      $mt_listing_goal_money_without_comma = str_replace( ',', '', $mt_listing_fundraising_goal );
      $mt_listing_received_without_dollar = str_replace( '$', '', $mt_listing_received_without_comma );
      $mt_listing_goal_without_dollar = str_replace( '$', '', $mt_listing_goal_money_without_comma );
      if(!empty($mt_listing_received_without_dollar) && !empty($mt_listing_goal_without_dollar)) {
        $percentage = ( $mt_listing_received_without_dollar * 100 ) / $mt_listing_goal_without_dollar; 
      }
      $mt_select_rating_star_recent = get_post_meta( $blogpost->ID, 'mt_select_rating_star', true );
                                        
      if(!empty($mt_select_rating_star_recent)) {
        $percentage_rating_recent = $mt_select_rating_star_recent;
      } else {
        $percentage_rating_recent = '0%';
      }        
      $now = time(); // or your date as well
      $your_date = strtotime($mt_listing_end_date_pick);
      $datediff = $now - $your_date;
      $date_dif = abs(round($datediff / (60 * 60 * 24)));                        
      $html.='<li class="'.esc_attr($sticky_class).' mix '.esc_attr($term_list[0]->slug).' '.$blogpost->post_title.' '.esc_attr($term_list_categories[0]->slug).'">
                <div class="col-md-12 post '.esc_attr($sticky_class).'">
                  <div class="blog_custom_listings">
                    <div class="row">
                      <div class="col-md-3">
                        <a class="relative" href="'.get_permalink($blogpost->ID).'">'.$post_img.'</a>
                      </div>
                      <div class="col-md-9">
                        <h4 class="post-name-listings"><a href="'.get_permalink($blogpost->ID).'">'.$blogpost->post_title.'</a></h4>
                        <a href="'.esc_url(get_term_link($term_list[0]->slug, 'mt-listing-category')).'">
                          <h6 class="mt_listing_category_recent">'.esc_attr($term_list[0]->name).'</h6>
                        </a>
                      </div>
                    </div>
                    <div class="listings_details">  
                      <div class="review-recent">
                        <div class="parent-rating-star">
                          <div class="rating-star" 
                              style="background-image:url('.plugins_url( 'images/stars.svg', dirname(__FILE__) ).')">
                          </div>
                          <div class="fill-rating-star" 
                              style="background-image:url('.plugins_url( 'images/fill_stars.svg', dirname(__FILE__) ).'); width:'.esc_attr($percentage_rating_recent).'">
                          </div>
                        </div>
                      </div>                                 
                      <div class="recent-received-goals">
                        <h6>'.esc_attr($mt_listing_received).'
                          <span class="goal"> / '.esc_attr($mt_listing_fundraising_goal).'</span>
                          <span class="percentange">'.esc_attr(number_format($percentage, 2)) . '%'.'</span>
                        </h6>                                     
                      </div>
                      <h6 class="mt_listing_interest_end_date">
                          '.esc_attr($mt_listing_interest).'
                          <span>'.esc_attr($date_dif).esc_html('d left','cryptic').'</span>
                      </h6>
                    </div>
                  </div>
                </div>
              </li>';
    }
            $html .= '</ul>';
            $html .= '<div class="cd-fail-message">No results found</div>';
          $html .= '</section>';
          $html .= '<div class="cd-filter">';
            $html .= '<form>';
                
              if($searchfilter == 'search_on') {
              $html .= '<div class="cd-filter-block">';
                $html .= '<h4>Search</h4>';
                $html .= '<div class="cd-filter-content">';
                  $html .= '<input type="search" placeholder="Search ICO...">';
                $html .= '</div>';
              $html .= '</div>';
              }
              if($categoriesfilter == 'categories_on') {
              $html .= '<div class="cd-filter-block">';
                $html .= '<h4>Categories</h4>';
                $html .= '<ul class="cd-filter-content cd-filters list">';                
                  global $wpdb;
                  $myrows2=$wpdb->get_results("SELECT name,slug FROM wp_terms 
                  WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy where taxonomy = 'mt-listing-category2');" );
                  foreach($myrows2 as $row) {
                    $html .= '<li>';
                      $html .= '<input class="filter" data-filter=".'.$row->slug.'" type="checkbox" id="'.$row->slug.'">';
                      $html .= '<label class="checkbox-label" for="'.$row->slug.'">'.$row->name.'</label>';
                    $html .= '</li>';
                  }                
                $html .= '</ul>';  
              $html .= '</div>';  
              }
            $html .= '</form>';
            $html .= '<a class="cd-close">Close</a>';
          $html .= '</div>';
         $html .= '<a class="cd-filter-trigger">Filters</a>';
        $html .= '</main>';
      $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('icofilters', 'modeltheme_shortcode_icofilters');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  $search_filter = array('Choose' => 'Null','Search Enable ' => 'search_on', 'Search Disable' => 'search_off');
  $categories_filter = array('Choose' => 'Null','Categories Enable ' => 'categories_on', 'Categories Disable' => 'categories_off');
  vc_map( array(
     "name" => esc_attr__("MT - Ico Filters", 'modeltheme'),
     "base" => "icofilters",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'modeltheme' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'modeltheme' )
        ),
        array(
          "group" => "Filters",
          "type" => "dropdown",
          "holder" => "div",
          "heading" => esc_attr__( "Enable or disable search on filter sidebar", 'modeltheme' ),
          "param_name" => "searchfilter",
          "value" => $search_filter,
        ),
        array(
          "group" => "Filters",
          "type" => "dropdown",
          "holder" => "div",
          "heading" => esc_attr__( "Enable or disable categories on filter sidebar", 'modeltheme' ),
          "param_name" => "categoriesfilter",
          "value" => $categories_filter,
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}
?>