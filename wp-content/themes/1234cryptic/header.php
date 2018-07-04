<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url(cryptic_redux('mt_favicon', 'url')); ?>">
    <?php } ?>


    <link rel="stylesheet" type="text/css" media="all" href="//cryptic.modeltheme.com/wp-content/themes/cryptic/css/simple-line-icons.css">
    <link rel='stylesheet' href='//cryptic.modeltheme.com/wp-content/themes/cryptic/fonts/cryptocoins.css' type='text/css' media='all' />


    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php /* PAGE PRELOADER */ ?>
    <?php
        if (cryptic_redux('mt_preloader_status')) {
            echo '<div class="cryptic_preloader_holder '.wp_kses_post(cryptic_redux('mt_preloader_animation')).'">'.wp_kses_post(cryptic_loader_animation()).'</div>';
        } 
    ?>


    <?php /* VARS */ ?>
    <?php 
    $normal_headers = array('header1', 'header2', 'header3', 'header4', 'header5');
    $custom_header_options_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_custom_variant = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
    $header_layout = cryptic_redux('mt_header_layout');
    if (isset($custom_header_options_status) && $custom_header_options_status == 'yes') {
        $header_layout = $header_custom_variant;
    }
    ?>

    <?php $classes = get_body_class();
    if (!in_array('login-register-page',$classes)) { ?>
        <div class="modeltheme-modal" id="modal-log-in">
            <div class="modeltheme-content" id="login-modal-content">
                <h3 class="relative">
                    <?php echo esc_html__('Login to Your Account','cryptic'); ?>
                </h3>
                <div class="modal-content row">
                    <div class="col-md-12">
                        <?php wp_login_form(); ?>
                        <?php if(cryptic_plugin_active('ultimate-member/index.php')){ ?>  
                            <?php global $ultimatemember;
                            if (  get_option('users_can_register')) { ?>
                                <a class="btn btn-register" id="register-modal"><?php echo esc_html__('Register','cryptic'); ?></a>
                            <?php } else { ?>
                                <p class="um-notice err text-center"><?php echo esc_html__('Registration is currently disabled','cryptic'); ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="modeltheme-content" id="signup-modal-content">
                <h3 class="relative">
                    <?php echo esc_html__('Personal Details','cryptic'); ?>
                </h3>
                <div class="modal-content row">
                    <div class="col-md-12">
                        <?php echo do_shortcode('[ultimatemember form_id=16587]'); ?>
                    </div>
                </div>            
            </div>
        </div>
    <?php } ?>

    <div class="modeltheme-overlay"></div>
    
    <?php /* SEARCH BLOCK */ ?>
    <?php if(cryptic_redux('mt_header_is_search') == true){ ?>
        <!-- Fixed Search Form -->
        <div class="fixed-search-overlay">
            <!-- Close Sidebar Menu + Close Overlay -->
            <i class="icon-close icons"></i>
            <!-- INSIDE SEARCH OVERLAY -->
            <div class="fixed-search-inside">
                <div class="modeltheme-search">
                    <form method="GET" action="<?php echo esc_url(home_url('/')); ?>">
                        <input class="search-input" placeholder="<?php echo esc_html__('Enter search term...', 'cryptic'); ?>" type="search" value="" name="s" id="search" />
                        <i class="fa fa-search"></i>
                        <input type="hidden" name="post_type" value="post" />
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php /* BURGER MENU */ ?>
    <?php if(cryptic_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
        <!-- Fixed Sidebar Overlay -->
        <div class="fixed-sidebar-menu-overlay"></div>
        <!-- Fixed Sidebar Menu -->
        <div class="relative fixed-sidebar-menu-holder header7">
            <div class="fixed-sidebar-menu">
                <!-- Close Sidebar Menu + Close Overlay -->
                <i class="icon-close icons"></i>
                <!-- Sidebar Menu Holder -->
                <div class="header7 sidebar-content">
                    <!-- RIGHT SIDE -->
                    <div class="left-side">
                        <?php if(cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
                          <?php if(cryptic_redux('mt_logo','url')){ ?>
                            <h1 class="logo">
                                <a href="<?php echo esc_url(get_site_url()); ?>">
                                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/logo_black.png'); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                                </a>
                            </h1>
                          <?php }else{ ?>
                            <h1 class="logo no-logo">
                                <a href="<?php echo esc_url(get_site_url()); ?>">
                                  <?php echo esc_html(get_bloginfo()); ?>
                                </a>
                            </h1>
                          <?php } ?>
                        <?php }else{ ?>
                          <h1 class="logo no-logo">
                              <a href="<?php echo esc_url(get_site_url()); ?>">
                                <?php echo esc_html(get_bloginfo()); ?>
                              </a>
                          </h1>
                        <?php } ?>
                        <?php if (is_active_sidebar( cryptic_redux('mt_header_fixed_sidebar') )) {
                            dynamic_sidebar( cryptic_redux('mt_header_fixed_sidebar') ); 
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- PAGE #page -->
    <div id="page" class="hfeed site">
        <?php
            $page_slider = get_post_meta( get_the_ID(), 'select_revslider_shortcode', true );
            if (in_array($header_layout, $normal_headers)){
                // Header template variant
                echo wp_kses_post(cryptic_current_header_template());
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.esc_attr($page_slider).']');
                    echo '</div>';
                }
            }else{
                echo wp_kses_post(cryptic_current_header_template());
            }
        ?>