<?php
/**
* Plugin Name: ModelTheme Listings Manager
* Plugin URI: http://modeltheme.com/
* Description: ModelTheme Listings Manager required by the Theme.
* Version: 1.1
* Author: ModelTheme
* Author http://modeltheme.com/
* Text Domain: mtlisitings
*/
/**
||-> Function: LOAD PLUGIN TEXTDOMAIN
*/
function mtlisitings_load_textdomain(){
    $domain = 'mtlisitings';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
    load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'mtlisitings_load_textdomain' );
/**
||-> Function: Dynamic Featured Image for 'mt_listing' CPT only
*/
function mtlisitings_allowed_post_types() {
    return array('mt_listing'); //show DFI only in post
}
add_filter('dfi_post_types', 'mtlisitings_allowed_post_types');
/**
||-> Function: mtlisitings_cmb_initialize_cmb_meta_boxes
*/
function mtlisitings_cmb_initialize_cmb_meta_boxes() {
    // CMB v1
    if ( ! class_exists( 'cmb_Meta_Box' ) ){
        // require_once ('init.php');
    }
    // CMB v2
    // if ( ! class_exists( 'CMB2_Bootstrap_2261' ) ){
    //     require_once ('inc/cmb2/init.php');
    //     require_once ('inc/cmb2/example-functions.php');
    // }
}
add_action( 'init', 'mtlisitings_cmb_initialize_cmb_meta_boxes', 9999 );
        require_once ('inc/cmb2/init.php');
        require_once ('inc/cmb2/example-functions.php');
/**
||-> Function: mtlisitings_excerpt_limit
*/
function mtlisitings_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}
/**
||-> Function: require_once() plugin necessary parts
*/
require_once('inc/post-types/post-types.php'); // POST TYPES
require_once('inc/metaboxes/metaboxes.php'); // METABOXES
require_once('inc/metaboxes/metaboxes-taxonomy.php'); // METABOXES FOR TAX's
require_once('inc/shortcodes/shortcodes.php'); // SHORTCODES
if ( ! class_exists( 'Dynamic_Featured_Image' ) ){
	require_once('inc/dynamic-featured-image/dynamic-featured-image.php'); // DYNAMIC FEATURED IMAGE
}
require_once('inc/redux-options/redux.listings.config.php'); // SHORTCODES
require_once('inc/frontend-form/frontend-ico-form-submission.php'); // ICO FRONTEND SUBMISSION FORM
/**
||-> Function: mtlisitings_taxonomy_template_from_directory()
*/
function mtlisitings_taxonomy_template_from_directory($template){
    // is a specific custom taxonomy being shown?
    $taxonomy_array = array('mt-listing-category', 'mt-listing-category2');
    foreach ($taxonomy_array as $taxonomy_single) {
        if ( is_tax($taxonomy_single) ) {
            if(file_exists(trailingslashit(plugin_dir_path( __FILE__ ) . 'inc/templates/taxonomy-listing-archive.php'))) {
                $template = trailingslashit(plugin_dir_path( __FILE__ ) . 'inc/templates/taxonomy-listing-archive.php');
            }else {
                $template = plugin_dir_path( __FILE__ ) . 'inc/templates/taxonomy-listing-archive.php';
            }
            break;
        }
    }
    return $template;
}
add_filter('template_include','mtlisitings_taxonomy_template_from_directory');
/* Filter the single_template with our custom function*/
function mtlisitings_listing_single_template($single) {
    global $wp_query, $post;
    /* Checks for single template by post type */
    if ( $post->post_type == 'mt_listing' ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'inc/templates/single/single-listing.php' ) ) {
            return plugin_dir_path( __FILE__ ) . 'inc/templates/single/single-listing.php';
        }
    }
    return $single;
}
add_filter('single_template', 'mtlisitings_listing_single_template');
/**
||-> CHECK IF PLUGIN ACTIVE OR NOT
*/
function mtlisitings_plugin_active( $plugin ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( $plugin ) ) {
        return true;
    }
    return false;
}
function mtlisitings_custom_excerpt_length( $length ) {
    return 26;
}
add_filter( 'excerpt_length', 'mtlisitings_custom_excerpt_length', 999 );
/**
||-> Function: mtlisitings_get_currency_symbol()
*/
function mtlisitings_get_currency_symbol( $currency = '' ) {
    
    if ( !$currency ) {
        $currency = cryptic_redux('mt_listings_settings_currency_select');
    }
    switch ( $currency ) {
        case 'AED' :
            $currency_symbol = 'د.إ';
            break;
        case 'AUD' :
        case 'CAD' :
        case 'CLP' :
        case 'COP' :
        case 'HKD' :
        case 'MXN' :
        case 'NZD' :
        case 'SGD' :
        case 'USD' :
            $currency_symbol = '&#36;';
            break;
        case 'BDT':
            $currency_symbol = '&#2547;&nbsp;';
            break;
        case 'BGN' :
            $currency_symbol = '&#1083;&#1074;.';
            break;
        case 'BRL' :
            $currency_symbol = '&#82;&#36;';
            break;
        case 'CHF' :
            $currency_symbol = '&#67;&#72;&#70;';
            break;
        case 'CNY' :
        case 'JPY' :
        case 'RMB' :
            $currency_symbol = '&yen;';
            break;
        case 'CZK' :
            $currency_symbol = '&#75;&#269;';
            break;
        case 'DKK' :
            $currency_symbol = 'kr.';
            break;
        case 'DOP' :
            $currency_symbol = 'RD&#36;';
            break;
        case 'EGP' :
            $currency_symbol = 'EGP';
            break;
        case 'EUR' :
            $currency_symbol = '&euro;';
            break;
        case 'GBP' :
            $currency_symbol = '&pound;';
            break;
        case 'HRK' :
            $currency_symbol = 'Kn';
            break;
        case 'HUF' :
            $currency_symbol = '&#70;&#116;';
            break;
        case 'IDR' :
            $currency_symbol = 'Rp';
            break;
        case 'ILS' :
            $currency_symbol = '&#8362;';
            break;
        case 'INR' :
            $currency_symbol = '₹';
            break;
        case 'ISK' :
            $currency_symbol = 'Kr.';
            break;
        case 'KIP' :
            $currency_symbol = '&#8365;';
            break;
        case 'KRW' :
            $currency_symbol = '&#8361;';
            break;
        case 'MYR' :
            $currency_symbol = '&#82;&#77;';
            break;
        case 'NGN' :
            $currency_symbol = '&#8358;';
            break;
        case 'NOK' :
            $currency_symbol = '&#107;&#114;';
            break;
        case 'NPR' :
            $currency_symbol = 'रू';
            break;
        case 'PHP' :
            $currency_symbol = '&#8369;';
            break;
        case 'PLN' :
            $currency_symbol = '&#122;&#322;';
            break;
        case 'PYG' :
            $currency_symbol = '&#8370;';
            break;
        case 'RON' :
            $currency_symbol = 'lei';
            break;
        case 'RUB' :
            $currency_symbol = '&#1088;&#1091;&#1073;.';
            break;
        case 'SEK' :
            $currency_symbol = '&#107;&#114;';
            break;
        case 'THB' :
            $currency_symbol = '&#3647;';
            break;
        case 'TRY' :
            $currency_symbol = '&#8378;';
            break;
        case 'TWD' :
            $currency_symbol = '&#78;&#84;&#36;';
            break;
        case 'UAH' :
            $currency_symbol = '&#8372;';
            break;
        case 'VND' :
            $currency_symbol = '&#8363;';
            break;
        case 'ZAR' :
            $currency_symbol = '&#82;';
            break;
        default :
            $currency_symbol = $currency;
            break;
    }
    return $currency_symbol;
}
/**
||-> Function: mtlisitings_enqueue_scripts()
*/
function mtlisitings_enqueue_scripts() {
    // CSS
    // wp_register_style( 'mtlisitings-style',  plugin_dir_url( __FILE__ ) . 'inc/shortcodes/shortcodes.css' );
    // wp_enqueue_style( 'mtlisitings-style' );
    wp_register_style( 'mtlisitings-frontend',  plugin_dir_url( __FILE__ ) . 'css/mtlisitings-frontend.css' );
    wp_register_style( 'mtlisitings-dataTables-css',  plugin_dir_url( __FILE__ ) . 'css/dataTables.min.css' );
    wp_register_style( 'ico-fiters-style-css',  plugin_dir_url( __FILE__ ) . 'css/ico-fiters-style.css' );
    wp_enqueue_style( 'mtlisitings-frontend' );
    wp_enqueue_style( 'mtlisitings-dataTables-css' );
    wp_enqueue_style( 'ico-fiters-style-css' );
    // SCRIPTS
    wp_enqueue_script( 'jquery-validation', plugin_dir_url( __FILE__ ) . 'js/jquery.validation.js', array(), '1.0.0', true );
    wp_enqueue_script( 'select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'mtlisitings-custom', plugin_dir_url( __FILE__ ) . 'js/mtlisitings-custom.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mtlisitings-dataTables-js', plugin_dir_url( __FILE__ ) . 'js/dataTables.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ico-filters-mixitup-js', plugin_dir_url( __FILE__ ) . 'js/ico-filters-mixitup.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ico-filters-main-js', plugin_dir_url( __FILE__ ) . 'js/ico-filters-main.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mtlisitings_enqueue_scripts' );
if (!class_exists('MTListing_Page_Templates')) {
    class MTListing_Page_Templates {
        /**
         * A reference to an instance of this class.
         */
        private static $instance;
        /**
         * The array of templates that this plugin tracks.
         */
        protected $templates;
        /**
         * Returns an instance of this class. 
         */
        public static function get_instance() {
            if ( null == self::$instance ) {
                self::$instance = new MTListing_Page_Templates();
            } 
            return self::$instance;
        } 
        /**
         * Initializes the plugin by setting filters and administration functions.
         */
        private function __construct() {
            $this->templates = array();
            // Add a filter to the attributes metabox to inject template into the cache.
            if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
                // 4.6 and older
                add_filter(
                    'page_attributes_dropdown_pages_args',
                    array( $this, 'register_project_templates' )
                );
            } else {
                // Add a filter to the wp 4.7 version attributes metabox
                add_filter(
                    'theme_page_templates', array( $this, 'add_new_template' )
                );
            }
            // Add a filter to the save post to inject out template into the page cache
            add_filter(
                'wp_insert_post_data', 
                array( $this, 'register_project_templates' ) 
            );
            // Add a filter to the template include to determine if the page has our 
            // template assigned and return it's path
            add_filter(
                'template_include', 
                array( $this, 'view_project_template') 
            );
            // Add your templates to this array.
            $this->templates = array(
                'inc/templates/template-listings.php' => 'Listings List',
            );
                
        } 
        /**
         * Adds our template to the page dropdown for v4.7+
         *
         */
        public function add_new_template( $posts_templates ) {
            $posts_templates = array_merge( $posts_templates, $this->templates );
            return $posts_templates;
        }
        /**
         * Adds our template to the pages cache in order to trick WordPress
         * into thinking the template file exists where it doens't really exist.
         */
        public function register_project_templates( $atts ) {
            // Create the key used for the themes cache
            $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );
            // Retrieve the cache list. 
            // If it doesn't exist, or it's empty prepare an array
            $templates = wp_get_theme()->get_page_templates();
            if ( empty( $templates ) ) {
                $templates = array();
            } 
            // New cache, therefore remove the old one
            wp_cache_delete( $cache_key , 'themes');
            // Now add our template to the list of templates by merging our templates
            // with the existing templates array from the cache.
            $templates = array_merge( $templates, $this->templates );
            // Add the modified cache to allow WordPress to pick it up for listing
            // available templates
            wp_cache_add( $cache_key, $templates, 'themes', 1800 );
            return $atts;
        } 
        /**
         * Checks if the template is assigned to the page
         */
        public function view_project_template( $template ) {
            
            // Get global post
            global $post;
            // Return template if post is empty
            if ( ! $post ) {
                return $template;
            }
            // Return default template if we don't have a custom one defined
            if ( ! isset( $this->templates[get_post_meta( 
                $post->ID, '_wp_page_template', true 
            )] ) ) {
                return $template;
            } 
            $file = plugin_dir_path( __FILE__ ). get_post_meta( 
                $post->ID, '_wp_page_template', true
            );
            // Just to be safe, we check if the file exist first
            if ( file_exists( $file ) ) {
                return $file;
            } else {
                echo $file;
            }
            // Return template
            return $template;
        }
    } 
    add_action( 'plugins_loaded', array( 'MTListing_Page_Templates', 'get_instance' ) );
}
/**
||-> Function: mtlisitings_enqueue_admin_scripts()
*/
function mtlisitings_enqueue_admin_scripts( $hook ) {
    // CSS
    wp_register_style( 'mtlisitings-admin-scripts',  plugin_dir_url( __FILE__ ) . 'css/mtlisitings-custom-admin.css' );
    wp_enqueue_style( 'mtlisitings-admin-scripts' );
    
    // SCRIPTS
    // wp_enqueue_script( 'mtlisitings-admin-custom', plugin_dir_url( __FILE__ ) . 'js/mtlisitings-custom-admin.js', array(), '1.0.0', true );
}
add_action('admin_enqueue_scripts', 'mtlisitings_enqueue_admin_scripts');



// $plugin_dir = plugin_dir_path( __FILE__ );
// echo ;
    
// add_image_size( 'mt_1250x700', 1250, 700, true );
// add_image_size( 'mt_320x480', 320, 480, true );
// add_image_size( 'mt_900x550', 900, 550, true );
?>