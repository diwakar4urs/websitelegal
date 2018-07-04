<header class="header4">
  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          <!-- LOGO -->
          <div class="navbar-header col-md-2">
            <!-- NAVIGATION BURGER MENU -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php 

            $custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
            $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
            $custom_logo_url = get_post_meta( get_the_ID(), 'smartowl_header_custom_logo', true );

            if($custom_header_activated == 'yes' && isset($custom_logo_url) && !empty($custom_logo_url)) { ?>

              <h1 class="logo">
                  <a href="<?php echo esc_url(get_site_url()); ?>">
                      <img src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                  </a>
              </h1>

            <?php } else {

              if(cryptic_redux('mt_logo','url')){ ?>
                <h1 class="logo">
                    <a href="<?php echo esc_url(get_site_url()); ?>">
                        <img src="<?php echo esc_url(cryptic_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                    </a>
                </h1>
              <?php }else{ ?>
                <h1 class="logo no-logo">
                    <a href="<?php echo esc_url(get_site_url()); ?>">
                      <?php echo esc_html(get_bloginfo()); ?>
                    </a>
                </h1>
              <?php } ?>
            <?php } ?>
          </div>

          <!-- NAV MENU -->
          <?php $menu_class = 'col-md-9'; ?>
          <?php $pull_state = 'pull-right'; ?>
          <?php if(cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
            <?php $menu_class = 'col-md-7'; ?>
            <?php $pull_state = 'pull-left'; ?>
          <?php } ?>

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse <?php echo esc_attr($menu_class); ?>">
            <ul class="menu nav navbar-nav <?php echo esc_attr($pull_state); ?> nav-effect nav-menu">
              <?php
        // NAV METABOX
        $mt_page_custom_menu = get_post_meta( get_the_ID(), 'mt_page_custom_menu', true );

        // NAV ARRAY
        $defaults = array(
          'menu'            => '',
          'container'       => false,
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'menu',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => false,
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '%3$s',
          'depth'           => 0,
          'walker'          => ''
        );
        $defaults['theme_location'] = 'primary';

        // NAV LISTING
        if (isset($mt_page_custom_menu) && $mt_page_custom_menu != 'default' && $mt_page_custom_menu != '') {
          echo wp_nav_menu( array('menu' => $mt_page_custom_menu ));
        }else{
            if ( has_nav_menu( 'primary' ) ) {
            echo wp_nav_menu( $defaults );
          }else{
            echo '<p class="no-menu text-right">';
              echo esc_html__('Primary navigation menu is missing. Add one from ', 'cryptic');
              echo '<a href="'.esc_url(get_admin_url() . 'nav-menus.php').'"><strong>'.esc_html__(' Appearance -> Menus','cryptic').'</strong></a>';
            echo '</p>';
          }
        }
              ?>
            </ul>
          </div>


          <?php $right_side_social = 'hidden'; ?>
          <?php if(cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
            <?php if(cryptic_redux('mt_header_fixed_sidebar_menu_status') == true || cryptic_redux('mt_header_is_search') == true) { ?>
              <?php $right_side_social = 'visibile_group'; ?>
            <?php } ?>
          <?php } ?>

          <!-- RIGHT SIDE SOCIAL / ACTIONS BUTTONS -->
          <div class="col-md-3 right-side-social-actions <?php echo esc_attr($right_side_social); ?>">

            <!-- ACTIONS BUTTONS GROUP -->
            <div class="pull-right actions-group">

              <?php if(cryptic_redux('mt_header_fixed_sidebar_menu_status') == true) { ?>
                <!-- MT BURGER -->
                <div id="mt-nav-burger">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              <?php } ?>



              <?php if(cryptic_redux('mt_header_is_search') == true){ ?>
                <!-- SEARCH ICON -->
                <a href="<?php echo esc_url('#'); ?>" class="mt-search-icon">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              <?php } ?>

                <?php $classes = get_body_class();
                if (!in_array('login-register-page',$classes)) { ?> 
                  <?php if (is_user_logged_in()) { ?> 
                    <?php if(cryptic_plugin_active('woocommerce/woocommerce.php')){ ?>  

                    <div id="dropdown-user-profile" class="ddmenu">
                      <a class="profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                      </a>
                      <ul>
                        <?php $switch = cryptic_redux('switch-slides-crypto');
                        if($switch == 1) { ?>
                        <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'crypto-tools'); ?>"><i class="icon-settings icons"></i> <?php echo esc_html__('Crypto Tools','cryptic'); ?></a></li>
                        <?php } ?>
                        <li><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>"><i class="icon-layers icons"></i> <?php echo esc_html__('My Dashboard','cryptic'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'orders'); ?>"><i class="icon-bag icons"></i> <?php echo esc_html__('My Orders','cryptic'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'edit-account'); ?>"><i class="icon-user icons"></i> <?php echo esc_html__('Account Details','cryptic'); ?></a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="icon-logout icons"></i> <?php echo esc_html__('Log Out','cryptic'); ?></a></li>
                      </ul>
                    </div>

                    <?php } ?>
                  <?php } else { ?>
                    <a class="profile modeltheme-trigger" href="#" data-modal="modal-log-in">
                      <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>
                  <?php } ?>
                <?php } ?>

            </div>

            <!-- SOCIAL LINKS -->
            <ul class="social-links">
              <?php if ( cryptic_redux('mt_social_telegram') && cryptic_redux('mt_social_telegram') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_telegram') ) ?>"><i class="fa fa-telegram"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_fb') && cryptic_redux('mt_social_fb') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_tw') && cryptic_redux('mt_social_tw') != '' ) { ?>
                <li><a href="https://twitter.com/<?php echo esc_attr( cryptic_redux('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_gplus') && cryptic_redux('mt_social_gplus') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_youtube') && cryptic_redux('mt_social_youtube') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_pinterest') && cryptic_redux('mt_social_pinterest') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_linkedin') && cryptic_redux('mt_social_linkedin') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_skype') && cryptic_redux('mt_social_skype') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_skype') ) ?>"><i class="fa fa-skype"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_instagram') && cryptic_redux('mt_social_instagram') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_dribbble') && cryptic_redux('mt_social_dribbble') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_deviantart') && cryptic_redux('mt_social_deviantart') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_digg') && cryptic_redux('mt_social_digg') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_digg') ) ?>"><i class="fa fa-digg"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_flickr') && cryptic_redux('mt_social_flickr') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_stumbleupon') && cryptic_redux('mt_social_stumbleupon') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_tumblr') && cryptic_redux('mt_social_tumblr') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i></a></li>
              <?php } ?>
              <?php if ( cryptic_redux('mt_social_vimeo') && cryptic_redux('mt_social_vimeo') != '' ) { ?>
                <li><a href="<?php echo esc_url( cryptic_redux('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i></a></li>
              <?php } ?>
            </ul>



          </div>
        </div>
    </div>
  </nav>
</header>
