<?php 


/**

||-> Shortcode: BlogPost02

*/
function modeltheme_shortcode_blogpost02($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'category'            => '',
            'number'              =>''
        ), $params ) );


    $html = '';
    $html .= '<div class="blog-posts simple-posts blog-posts-shortcode-v2 blog-posts-shortcode wow '.$animation.'">';
    $html .= '<div class="row">';
    $args_blogposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $category
                )
            ),
            'post_status'      => 'publish' 
            ); 
    $blogposts = get_posts($args_blogposts);

    foreach ($blogposts as $blogpost) {


        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'cryptic_news_shortcode_1000x500' );
        
        $content_post   = get_post($blogpost->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);

        if ($thumbnail_src) {
            $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
            $post_col = 'col-md-12';
        }else{
            $post_col = 'col-md-12 no-featured-image';
            $post_img = '';
        }

          $comments_count = wp_count_comments($blogpost->ID);
          if($comments_count->approved >= 1) {
              $comments = 'Comments <a href="'.get_comments_link($blogpost->ID).'">'. $comments_count->approved.'</a>';
          } else {
              $comments = 'No comments';
          }

          $html.='<div class="col-md-12">
                      <article class="single-post list-view">
                        <div class="blog_custom">


                          <!-- POST THUMBNAIL -->
                          <div class="col-md-12 post-thumbnail">
                              <a class="relative" href="'.get_permalink($blogpost->ID).'">'.$post_img.'</a>
                              <span class="time-n-date">'.get_the_time('j M',$blogpost->ID).'</span>
                          </div>

                          <!-- POST DETAILS -->
                          <div class="post-details '.$post_col.'">

                          <div class="title-n-excerpt">
                            <h5 class="post-category">'.$category.'</h5>
                            <h3 class="post-name row">
                              <a href="'.get_permalink($blogpost->ID).'" title="'. $blogpost->post_title .'">'. $blogpost->post_title .'</a>
                            </h3>
                            <div class="post-excerpt row">
                                <p>'.modeltheme_excerpt_limit($content, 30).'</p>
                            </div>
                          </div>

                            <div class="text-element content-element">
                              <p class="author">Post by <a href="'.get_author_posts_url($blogpost->ID).'">'.get_the_author($blogpost->ID).'</a></p>
                              <p class="comments">'.$comments.'</p>
                            </div>

                          </div>

                          

                        </div>
                      </article>
                    </div>';

      }





    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('blogpost02', 'modeltheme_shortcode_blogpost02');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

	$post_category_tax = get_terms('category');
	$post_category = array();
	foreach ( $post_category_tax as $term ) {
		$post_category[$term->name] = $term->slug;
	}

    vc_map( array(
     "name" => esc_attr__("MT - Blog Posts List", 'modeltheme'),
     "base" => "blogpost02",
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
           "type" => "dropdown",
           "group" => "Options",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Select Blog Category"),
           "param_name" => "category",
           "description" => esc_attr__("Please select blog category"),
           "std" => 'Default value',
           "value" => $post_category
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