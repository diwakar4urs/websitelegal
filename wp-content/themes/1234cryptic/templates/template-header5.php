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
          <?php $menu_class = 'col-md-10'; ?>
          <?php $pull_state = 'pull-right'; ?>
          <?php if(cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
            <?php $menu_class = 'col-md-10'; ?>
            <?php $pull_state = 'pull-right'; ?>
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
      				if (isset($mt_page_custom_menu) && $mt_page_custom_menu != 'default') {
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

        </div>
    </div>
  </nav>
</header>
