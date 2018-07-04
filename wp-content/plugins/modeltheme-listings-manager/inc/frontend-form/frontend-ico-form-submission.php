<?php 


/**

||-> ... Insert custom ICO ...

*/
/**
 * Create a front-end submission form for CMB which creates new posts/post-type entries.
 *
 * @package  Custom Metaboxes and Fields for WordPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

class MTLisitngs_ICO_Front_End_Form {

    /**
     * Construct the class.
     */
    public function __construct() {
        // add_filter( 'cmb_meta_boxes', array( $this, 'cmb_metaboxes' ) );
        add_shortcode( 'crypto-ico-frontend-form', array( $this, 'mtlisitings_do_frontend_form' ) );
        add_action( 'cmb_save_post_fields', array( $this, 'mtlisitings_save_featured_image' ), 10, 4 );
    }


    /**
     * Define the metabox and field configurations.
     */


    /**
     * Shortcode to display a CMB form for a post ID.
     */
    public function mtlisitings_do_frontend_form() {

        // Default metabox ID
        $metabox_id = 'listings_metaboxs';

        // Get all metaboxes
        $meta_boxes = apply_filters( 'cmb_meta_boxes', array() );

        // If the metabox specified doesn't exist, yell about it.
        if ( ! isset( $meta_boxes[ $metabox_id ] ) ) {
            // 87D57C
            return __( "A metabox with the specified 'metabox_id' doesn't exist.", 'cmb' );
        }

        // This is the WordPress post ID where the data should be stored/displayed.
        $post_id = 0;

        if ( $new_id = $this->intercept_post_id() ) {
            $post_id = $new_id;
            // 87D57C
            echo '<div class="alert alert-success alert-dismissible ico-directory-listing">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>'.__( "Thank you for the submission!", 'cmb' ).'</strong> '.__( "It is now awaiting moderation! We will get back to you as soon as possible!", 'cmb' ).'
                    </div>';
        }

        // Shortcodes need to return their data, not echo it.
        $echo = false;

        // Get our form
        $form = cmb_metabox_form( $meta_boxes[ $metabox_id ], $post_id, $echo );

        return $form;
    }


    /**
     * Get data before saving to CMB.
     */
    public function intercept_post_id() {

        // Check for $_POST data
        if ( empty( $_POST ) ) {
            return false;
        }

        // Check nonce
        if ( ! ( isset( $_POST['submit-cmb'], $_POST['wp_meta_box_nonce'] ) && wp_verify_nonce( $_POST['wp_meta_box_nonce'], cmb_Meta_Box::nonce() ) ) ) {
            return;
        }

        // Setup and sanitize data
        if ( isset( $_POST[ 'mt_listing_interest' ] ) ) {

            add_filter( 'user_has_cap', array( $this, 'grant_publish_caps' ), 0,  3);

            $this->new_submission = wp_insert_post( array(
                'post_title'            => sanitize_text_field( $_POST['mt_listing_crypto_coin_name']),
                'post_author'           => get_current_user_id(),
                'post_status'           => 'draft', // Set to draft so we can review first
                'post_type'             => 'mt_listing',
                // 'post_content_filtered' => esc_attr(strip_tags($_POST['mt_listing_description'])),
                'post_content' => wp_kses( $_POST[ 'mt_listing_description' ], '<b><strong><i><em><h1><h2><h3><h4><h5><h6><pre><code><span>' ),
                // 'post_content_filtered' => sanitize_text_field( $_POST[ 'mt_listing_description' ] ),
            ), true );

            // If no errors, save the data into a new post draft
            if ( ! is_wp_error( $this->new_submission ) ) {
                return $this->new_submission;
            }

            // if (isset($_POST['mt_listing_featured_image'])) {
            
            //     $getImageFile = $_POST['mt_listing_featured_image'];

            //     $post_id = '17393';

            //     $attach_id = wp_insert_attachment( $this->new_submission, $getImageFile, $post_id );
            //     require_once( ABSPATH . 'wp-admin/includes/image.php' );

            //     $attach_data = wp_generate_attachment_metadata( $attach_id, $getImageFile );

            //     wp_update_attachment_metadata( $attach_id, $attach_data );

            //     set_post_thumbnail( $post_id, $attach_id );
            //     var_dump(set_post_thumbnail( $post_id, $attach_id ));
            // }

        }

        return false;
    }

    /**
     * Grant temporary permissions to subscribers.
     */
    public function grant_publish_caps( $caps, $cap, $args ) {

        if ( 'edit_post'  == $args[0] ) {
            $caps[$cap[0]] = true;
        }

        return $caps;
    }

    /**
     * Save featured image.
     */
    public function mtlisitings_save_featured_image( $object_id, $meta_box_id, $updated, $meta_box ) {

        if ( isset( $updated ) && in_array( 'mt_listing_featured_image', $updated ) ) {
            set_post_thumbnail( $object_id, get_post_meta( $object_id, 'mt_listing_featured_image', 1 ) );
        }

    }


} // end class

$MTLisitngs_ICO_Front_End_Form = new MTLisitngs_ICO_Front_End_Form();

?>