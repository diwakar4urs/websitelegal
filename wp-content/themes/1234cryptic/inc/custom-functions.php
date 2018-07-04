<?php
// CHECK IF PLUGIN ACTIVE OR NOT
function cryptic_plugin_active( $plugin ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( $plugin ) ) {
        return true;
    }

    return false;
}


//GET HEADER TITLE/BREADCRUMBS AREA
function cryptic_header_title_breadcrumbs(){

    $html = '';
    $html .= '<div class="header-title-breadcrumb relative">';
        $html .= '<div class="header-title-breadcrumb-overlay text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-sm-6 col-xs-6 text-left">';
                                    if (is_singular('post')) {
                                        $html .= '<h1>'.esc_html__( 'Blog', 'cryptic' ) . get_search_query().'</h1>';
                                    }elseif (class_exists( 'WooCommerce' ) && is_shop()) {
                                        $html .= '<h1>'.esc_html__( 'Shop', 'cryptic' ).'</h1>';
                                    }elseif (is_page()) {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }elseif (is_search()) {
                                        $html .= '<h1>'.esc_html__( 'Search Results for: ', 'cryptic' ) . get_search_query().'</h1>';
                                    }elseif (is_category()) {
                                        $html .= '<h1>'.esc_html__( 'Category: ', 'cryptic' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                    }elseif (is_tag()) {
                                        $html .= '<h1>'.esc_html__( 'Tag Archives: ', 'cryptic' ) . single_tag_title( '', false ).'</h1>';
                                    }elseif (is_author() || is_archive()) {
                                        $html .= '<h1>'.get_the_archive_title() . get_the_archive_description().'</h1>';
                                    }elseif (is_home()) {
                                        $html .= '<h1>'.esc_html__( 'From the Blog', 'cryptic' ).'</h1>';
                                    }else {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }
                      $html .= '</div>
                                <div class="col-md-5 col-sm-6 col-xs-6">
                                    <ol class="breadcrumb text-right">'.cryptic_breadcrumb().'</ol>                    
                                </div>
                            </div>
                        </div>
                    </div>';

    $html .= '</div>';
    $html .= '<div class="clearfix"></div>';

    return $html;
}



//GET Social Floating button
if (!function_exists('cryptic_floating_social_button')) {
    function cryptic_floating_social_button(){

        $html = '';
        $link = '';
        $fa_class = '';

        if (cryptic_redux('mt_fixed_social_btn_status') == true) {
            if (cryptic_redux('mt_fixed_social_btn_social_select') == 'telegram') {
                $link = cryptic_redux('mt_social_telegram');
                $fa_class = 'fa fa-telegram';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'facebook') {
                $link = cryptic_redux('mt_social_fb');
                $fa_class = 'fa fa-facebook';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'twitter') {
                $link = cryptic_redux('mt_social_tw');
                $fa_class = 'fa fa-twitter';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'googleplus') {
                $link = cryptic_redux('mt_social_gplus');
                $fa_class = 'fa fa-google-plus';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'youtube') {
                $link = cryptic_redux('mt_social_youtube');
                $fa_class = 'fa fa-youtube-play';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'pinterest') {
                $link = cryptic_redux('mt_social_pinterest');
                $fa_class = 'fa fa-pinterest-p';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'pinterest') {
                $link = cryptic_redux('mt_social_pinterest');
                $fa_class = 'fa fa-pinterest-p';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'linkedin') {
                $link = cryptic_redux('mt_social_linkedin');
                $fa_class = 'fa fa-linkedin';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'skype') {
                $link = cryptic_redux('mt_social_skype');
                $fa_class = 'fa fa-skype';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'instagram') {
                $link = cryptic_redux('mt_social_instagram');
                $fa_class = 'fa fa-instagram';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'dribbble') {
                $link = cryptic_redux('mt_social_dribbble');
                $fa_class = 'fa fa-dribbble';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'deviantart') {
                $link = cryptic_redux('mt_social_deviantart');
                $fa_class = 'fa fa-deviantart';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'digg') {
                $link = cryptic_redux('mt_social_digg');
                $fa_class = 'fa fa-digg';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'flickr') {
                $link = cryptic_redux('mt_social_flickr');
                $fa_class = 'fa fa-flickr';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'stumbleupon') {
                $link = cryptic_redux('mt_social_stumbleupon');
                $fa_class = 'fa fa-stumbleupon';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'tumblr') {
                $link = cryptic_redux('mt_social_tumblr');
                $fa_class = 'fa fa-tumblr';
            }elseif (cryptic_redux('mt_fixed_social_btn_social_select') == 'vimeo') {
                $link = cryptic_redux('mt_social_vimeo');
                $fa_class = 'fa fa-vimeo';
            }
        }


        $html .= '<a data-toggle="tooltip" data-placement="top" title="'.esc_attr__('Connect on Telegram','cryptic').'" class="floating-social-btn" target="_blank" href="'.esc_url($link).'">';
            $html .= '<i class="'.esc_attr__($fa_class).'"></i>';
        $html .= '</a>';

        return $html;
    }
}



