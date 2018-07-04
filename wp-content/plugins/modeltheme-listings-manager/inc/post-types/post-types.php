<?php



/**

||-> CPT - [Listings]

*/

function mtlisitings_listings_custom_post() {

    register_post_type('mt_listing', array(

                        'label' => __('Listings','mtlisitings'),

                        'description' => '',

                        'public' => true,

                        'show_ui' => true,

                        'show_in_menu' => true,

                        'capability_type' => 'post',

                        'map_meta_cap' => true,

                        'hierarchical' => false,

                        'rewrite' => array('slug' => 'listing', 'with_front' => true),

                        'query_var' => true,

                        'menu_position' => '1',

                        'menu_icon' => 'dashicons-performance',

                        'supports' => array('title','editor','thumbnail','author','excerpt', 'comments'),

                        'labels' => array (

                            'name' => __('Listings','mtlisitings'),

                            'singular_name' => __('Listing','mtlisitings'),

                            'menu_name' => __('MT Listings','mtlisitings'),

                            'add_new' => __('Add Listing','mtlisitings'),

                            'add_new_item' => __('Add New Listing','mtlisitings'),

                            'edit' => __('Edit','mtlisitings'),

                            'edit_item' => __('Edit Listing','mtlisitings'),

                            'new_item' => __('New Listing','mtlisitings'),

                            'view' => __('View Listing','mtlisitings'),

                            'view_item' => __('View Listing','mtlisitings'),

                            'search_items' => __('Search Listings','mtlisitings'),

                            'not_found' => __('No Listings Found','mtlisitings'),

                            'not_found_in_trash' => __('No Listings Found in Trash','mtlisitings'),

                            'parent' => __('Parent Listing','mtlisitings'),

                            )

                        ) 

                    ); 

}

add_action('init', 'mtlisitings_listings_custom_post');





/**

||-> CPT - [listing] Taxonomy ICO Types

*/

function mtlisitings_listings_category_custom_post() {

    

    $labels = array(

        'name'                       => _x( 'ICO Types', 'Taxonomy General Name', 'mtlisitings' ),

        'singular_name'              => _x( 'ICO Types', 'Taxonomy Singular Name', 'mtlisitings' ),

        'menu_name'                  => __( 'ICO Types', 'mtlisitings' ),

        'all_items'                  => __( 'All Items', 'mtlisitings' ),

        'parent_item'                => __( 'Parent Item', 'mtlisitings' ),

        'parent_item_colon'          => __( 'Parent Item:', 'mtlisitings' ),

        'new_item_name'              => __( 'New Item Name', 'mtlisitings' ),

        'add_new_item'               => __( 'Add New Item', 'mtlisitings' ),

        'edit_item'                  => __( 'Edit Item', 'mtlisitings' ),

        'update_item'                => __( 'Update Item', 'mtlisitings' ),

        'view_item'                  => __( 'View Item', 'mtlisitings' ),

        'separate_items_with_commas' => __( 'Separate items with commas', 'mtlisitings' ),

        'add_or_remove_items'        => __( 'Add or remove items', 'mtlisitings' ),

        'choose_from_most_used'      => __( 'Choose from the most used', 'mtlisitings' ),

        'popular_items'              => __( 'Popular Items', 'mtlisitings' ),

        'search_items'               => __( 'Search Items', 'mtlisitings' ),

        'not_found'                  => __( 'Not Found', 'mtlisitings' ),

    );

    $args = array(

        'labels'                     => $labels,

        'hierarchical'               => true,

        'public'                     => true,

        'show_ui'                    => true,

        'show_admin_column'          => true,

        'show_in_nav_menus'          => true,

        'show_tagcloud'              => true,

        'rewrite'                    => array( 'slug' => 'ico-drops' ),

    );

    register_taxonomy( 'mt-listing-category', array( 'mt_listing' ), $args );

}

add_action( 'init', 'mtlisitings_listings_category_custom_post' );







/**

||-> CPT - [listing] Taxonomy category

*/

function mtlisitings_listings_category2_custom_post() {

    

    $labels = array(

        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'mtlisitings' ),

        'singular_name'              => _x( 'Categories', 'Taxonomy Singular Name', 'mtlisitings' ),

        'menu_name'                  => __( 'Categories', 'mtlisitings' ),

        'all_items'                  => __( 'All Items', 'mtlisitings' ),

        'parent_item'                => __( 'Parent Item', 'mtlisitings' ),

        'parent_item_colon'          => __( 'Parent Item:', 'mtlisitings' ),

        'new_item_name'              => __( 'New Item Name', 'mtlisitings' ),

        'add_new_item'               => __( 'Add New Item', 'mtlisitings' ),

        'edit_item'                  => __( 'Edit Item', 'mtlisitings' ),

        'update_item'                => __( 'Update Item', 'mtlisitings' ),

        'view_item'                  => __( 'View Item', 'mtlisitings' ),

        'separate_items_with_commas' => __( 'Separate items with commas', 'mtlisitings' ),

        'add_or_remove_items'        => __( 'Add or remove items', 'mtlisitings' ),

        'choose_from_most_used'      => __( 'Choose from the most used', 'mtlisitings' ),

        'popular_items'              => __( 'Popular Items', 'mtlisitings' ),

        'search_items'               => __( 'Search Items', 'mtlisitings' ),

        'not_found'                  => __( 'Not Found', 'mtlisitings' ),

    );

    $args = array(

        'labels'                     => $labels,

        'hierarchical'               => true,

        'public'                     => true,

        'show_ui'                    => true,

        'show_admin_column'          => true,

        'show_in_nav_menus'          => true,

        'show_tagcloud'              => true,

        'rewrite'                    => array( 'slug' => 'categories' ),

    );

    register_taxonomy( 'mt-listing-category2', array( 'mt_listing' ), $args );

}

add_action( 'init', 'mtlisitings_listings_category2_custom_post' );







add_action( 'submitpost_box', function() {

    global $post;

    if ( isset( $post->post_type ) && in_array( $post->post_type, array( 'mt_listing') ) ) {

        $post->post_type_original = $post->post_type;

        $post->post_type = 'post';

    }

} );



?>