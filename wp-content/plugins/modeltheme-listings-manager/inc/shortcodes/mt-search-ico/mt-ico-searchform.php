<?php 


/**

||-> Shortcode: Car Search

*/
function modeltheme_shortcode_ico_search($params, $content) {
    extract( shortcode_atts( 
        array(
            'width_type'          => '',
            'animation'           => ''
        ), $params ) );


    $html = '';
    $html .= '<div class="mt-car-search wow '.esc_attr($animation).' ">
                <form method="GET" action="'.home_url( '/' ).'">
                  <input type="hidden" name="post_type" value="mt_listing" />
                  <div class="row">

                    
                    
                    <div class="slider-state-select col-md-3 '.esc_attr($width_type).'">
                      <select name="mt-listing-category" class="select-car-category form-control">';
                        $html .= "<option value=''>".esc_attr__('Choose ICO Scope','modeltheme')."</option>";
                        $terms_l = get_terms( 'mt-listing-category' );
                        foreach ($terms_l as $term) {
                          if ($term->parent == 0) {
                            $html .= "<option value='{$term->slug}'>{$term->name}</option>";
                          }
                        }
                      $html .= '</select>
                    </div>  

                    <div class="slider-state-select col-md-3 '.esc_attr($width_type).'">          
                      <select name="mt-listing-category2" class="select-car-type form-control">';
                        $terms_c = get_terms( 'mt-listing-category2' );
                        $html .= "<option value=''>".esc_attr__('Choose ICO Type','modeltheme')."</option>";
                        foreach ($terms_c as $term) {
                          $html .= "<option value='{$term->slug}'>{$term->name}</option>";
                        }
                      $html .= '</select>
                    </div>

                    <div class="slider-state-search col-md-3 '.esc_attr($width_type).'">
                      <input type="search" class="search-field form-control" placeholder="'.esc_attr_x( 'Search …', 'placeholder' ).'" value="'.get_search_query().'" name="s" />
                    </div>  

                    <div class="slider-state-submit col-md-3 '.esc_attr($width_type).' submit">
                      <input type="submit" value="FIND NOW" class="form-control btn btn-warning">
                    </div>

                  </div>
                </form>
        </div>';
    return $html;
}
add_shortcode('mt_ico_search', 'modeltheme_shortcode_ico_search');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("MT - Ico Search", 'modeltheme'),
     "base" => "mt_ico_search",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("With type"),
           "param_name" => "width_type",
           "std" => '',
           "description" => esc_attr__("Please choose the with type"),
           "value" => array(
            esc_attr__('Full width')     => 'full_with_row',
            esc_attr__('Boxed')          => ''
           )
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