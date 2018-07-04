<?php

/**

||-> Shortcode: Category Products

*/

function modeltheme_shortcode_category_products( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'number'                               => '',
            'category'                             => '',
            'number_of_products_by_category'       => '',
            'number_of_columns'                    => '',
            'hide_empty'                           => ''
        ), $params ) );

  
    $cat = get_term_by( 'slug', $category, 'product_cat' );

    $prod_categories = get_terms( 'product_cat', array(
        'number'        => $number,
        'hide_empty'    => $hide_empty,
        'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category
                )
            )
    ));


    $shortcode_content = '';
    $shortcode_content .= '<div class="woocommerce_categories row">';
        $shortcode_content .= '<div class="categories categories_shortcode categories_shortcode_'.$number_of_columns.' owl-carousel owl-theme">';
        foreach( $prod_categories as $prod_cat ) {
            $shortcode_content .= '<div class="category item ">';
                $shortcode_content .= '<a class="#categoryid_'.$prod_cat->term_id.'">';
                    $shortcode_content .= '<h3>'.$prod_cat->name.'</h3>';
                $shortcode_content .= '</a>';
            $shortcode_content .= '</div>';
        }
        $shortcode_content .= '</div>';

            $shortcode_content .= '<div class="products_category">';
                foreach( $prod_categories as $prod_cat ) {
                        $shortcode_content .= '<div id="categoryid_'.$prod_cat->term_id.'" class="products_by_category '.$prod_cat->name.'">'.do_shortcode('[product_category columns="'.$number_of_columns.'" per_page="'.$number_of_products_by_category.'" category="'.$prod_cat->name.'"]').'</div>';
                }
            $shortcode_content .= '</div>';
        $shortcode_content .= '</div>';

    wp_reset_postdata();

    return $shortcode_content;
}
add_shortcode('shortcode_category_products', 'modeltheme_shortcode_category_products');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    global $wpdb;

    $myrows=$wpdb->get_results("SELECT name,slug FROM wp_terms WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy where taxonomy = 'product_cat');" );

    $post_category = array();

    foreach($myrows as $row) {
        $post_category[$row->name] = $row->slug; 
    }

    vc_map( array(
       "name" => esc_attr__("MT - Products by Category", 'modeltheme'),
       "base" => "shortcode_category_products",
       "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
       "icon" => "modeltheme_shortcode",
       "params" => array(
          array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Select Products Category", 'modeltheme'),
             "param_name" => "category",
             "description" => esc_attr__("Please select blog category", 'modeltheme'),
             "std" => 'Default value',
             "value" => $post_category
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Number of categories to show", 'modeltheme'),
             "param_name" => "number"
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Number of products to show for each category", 'modeltheme'),
             "param_name" => "number_of_products_by_category"
          ),
          array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Show categories without products?", 'modeltheme'),
             "param_name" => "hide_empty",
             "std" => 'true',
             "value" => array(
              'Yes'     => 'true',
              'No'        => 'false'
             ),
          ),
          array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Products per column", 'modeltheme'),
             "param_name" => "number_of_columns",
             "std" => '2',
             "value" => array(
              '2'        => '2',
              '3'        => '3',
              '4'        => '4'
             ),
          )
       )
    ));
}

?>