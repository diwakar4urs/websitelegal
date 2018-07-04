<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Panel', 'cryptic' ),
        'page_title'           => esc_html__( 'Theme Panel', 'cryptic' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'cryptic_redux',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.WordPress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__( 'Theme Support', 'cryptic'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://themeforest.net/downloads'),
        'title' => esc_html__( 'Rate this theme', 'cryptic'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.com'),
        'title' => esc_html__( 'ModelTheme.com', 'cryptic'),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => esc_url('https://www.facebook.com/modeltheme'),
        'title' => esc_html__('Like us on Facebook', 'cryptic'),
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://twitter.com/modeltheme'),
        'title' => esc_html__('Follow us on Twitter', 'cryptic'),
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__('Submit a Ticket', 'cryptic'),
        'icon'  => 'el el-cog'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.com/'),
        'title' => esc_html__('ModelTheme Website', 'cryptic'),
        'icon'  => 'el el-globe'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( '', $v );
    } else {
        $args['intro_text'] = '';
    }

    // Add content after the form.
    $args['footer_text'] = '';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'cryptic' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'cryptic' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'cryptic' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'cryptic' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'cryptic' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */


    include_once(get_template_directory(). '/redux-framework/modeltheme-config.arrays.php');
    include_once(get_template_directory(). '/redux-framework/modeltheme-config.responsive.php');
    include_once(get_template_directory(). '/redux-framework/modeltheme-config.woocommerce.php');
    /**
    ||-> SECTION: General Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General Settings', 'cryptic' ),
        'id'    => 'mt_general',
        'icon'  => 'el el-icon-wrench'
    ));
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'cryptic' ),
        'id'         => 'mt_general_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_breadcrumbs',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Breadcrumbs</h3>' )
            ),
            array(
                'id'       => 'mt_breadcrumbs_delimitator',
                'type'     => 'text',
                'title'    => esc_html__('Breadcrumbs delimitator', 'cryptic'),
                'subtitle' => esc_html__('Set a breadcrumbs delimitator.', 'cryptic'),
                'desc'     => esc_html__('For example: "/", "-" or "->"', 'cryptic'),
                'default'  => '/'
            ),
            array(
                'id'       => 'mt_body_global_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Global Background', 'cryptic' ),
                'subtitle' => esc_html__( 'Default: #ffffff', 'cryptic' ),
                'default'  => '#ffffff',
            ),

        ),
    ));
    // Back to Top
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Back to Top Button', 'cryptic' ),
        'id'         => 'mt_general_back_to_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_backtotop_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Back to Top Button Status', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable "Back to Top Button"', 'cryptic'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_backtotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Backgrond', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'validate' => 'color',
                'default' => 'transparent',
            ),
            array(
                'id'       => 'mt_backtotop_bg_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Backgrond - Hover', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'validate' => 'color',
                'default' => 'transparent',
            ),
            array(
                'id'       => 'mt_backtotop_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Icon Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'validate' => 'color',
                'default' => '#fff',
            ),
            array(
                'id'       => 'mt_backtotop_text_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Icon Color - Hover', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'validate' => 'color',
                'default' => '#fff',
            ),

        ),
    ));


    // Login
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Login', 'cryptic' ),
        'id'         => 'mt_general_login',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_general_login',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Login</h3>' )
            ),
             array(
                'id' => 'mt_login_nextto',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Login Popup Image', 'cryptic'),
                'subtitle' => esc_html__('Insert image/text which will be listed next to login form.', 'cryptic'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/cryptic-logo.png'),
            ),
        ),
    ));
 

        // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Preloader', 'cryptic' ),
        'id' => 'mt_general_preloader',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_divider_preloader_status',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Status</h3>' )
            ),
            array(
                'id'       => 'mt_preloader_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Page Preloader', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable page preloader', 'cryptic'),
                'default'  => true,
            ),
            array(
                'id'   => 'mt_divider_preloader_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Styling</h3>' )
            ),
            array(         
                'id'       => 'mt_preloader_bg_color',
                'type'     => 'background',
                'title'    => esc_html__('Page Preloader Backgrond', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'output' => array(
                    'body .cryptic_preloader_holder'
                )
            ),
            array(
                'id'       => 'mt_preloader_color',
                'type'     => 'color',
                'title'    => esc_html__('Preloader color:', 'cryptic'), 
                'subtitle' => esc_html__('Default: #ffffff', 'cryptic'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'   => 'mt_divider_preloader_animation',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Variant</h3>' )
            ),
            array(
                'id'       => 'mt_preloader_animation',
                'type'     => 'radio',
                'title'    => esc_html__('Preloader Animation', 'cryptic'), 
                'subtitle' => esc_html__('Select Preloader Animation', 'cryptic'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'v1_ball_triangle' => '<div class="cryptic_preloader v1_ball_triangle">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-triangle-path">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>', 

                    'v2_ball_pulse' => '<div class="cryptic_preloader v2_ball_pulse">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-pulse">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v3_ball_grid_pulse' => '<div class="cryptic_preloader v3_ball_grid_pulse">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-grid-pulse">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v4_ball_clip_rotate' => '<div class="cryptic_preloader v4_ball_clip_rotate">
                                                    <div class="loaders">
                                                        <div class="loader">
                                                            <div class="loader-inner ball-clip-rotate">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>',

                    'v5_ball_clip_rotate_pulse' => '<div class="cryptic_preloader v5_ball_clip_rotate_pulse">
                                                        <div class="loaders">
                                                            <div class="loader">
                                                                <div class="loader-inner ball-clip-rotate-pulse">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>',

                    'v6_square_spin' => '<div class="cryptic_preloader v6_square_spin">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner square-spin">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v7_ball_clip_rotate_multiple' => '<div class="cryptic_preloader v7_ball_clip_rotate_multiple">
                                                            <div class="loaders">
                                                                <div class="loader">
                                                                    <div class="loader-inner ball-clip-rotate-multiple">
                                                                        <div></div>
                                                                        <div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>',

                    'v8_ball_pulse_rise' => '<div class="cryptic_preloader v8_ball_pulse_rise">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-pulse-rise">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v9_ball_rotate' => '<div class="cryptic_preloader v9_ball_rotate">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-rotate">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v10_cube_transition' => '<div class="cryptic_preloader v10_cube_transition">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner cube-transition">
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v11_ball_zig_zag' => '<div class="cryptic_preloader v11_ball_zig_zag">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-zig-zag">
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v12_ball_zig_zag_deflect' => '<div class="cryptic_preloader v12_ball_zig_zag_deflect">
                                                        <div class="loaders">
                                                            <div class="loader">
                                                                <div class="loader-inner ball-zig-zag-deflect">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>',

                    'v13_ball_scale' => '<div class="cryptic_preloader v13_ball_scale">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-scale">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v14_line_scale' => '<div class="cryptic_preloader v14_line_scale">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner line-scale">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v15_line_scale_party' => '<div class="cryptic_preloader v15_line_scale_party">
                                                    <div class="loaders">
                                                        <div class="loader">
                                                            <div class="loader-inner line-scale-party">
                                                                <div></div>
                                                                <div></div>
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>',

                    'v16_ball_scale_multiple' => '<div class="cryptic_preloader v16_ball_scale_multiple">
                                                    <div class="loaders">
                                                        <div class="loader">
                                                            <div class="loader-inner ball-scale-multiple">
                                                                <div></div>
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>',

                    'v17_ball_pulse_sync' => '<div class="cryptic_preloader v17_ball_pulse_sync">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-pulse-sync">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v18_ball_beat' => '<div class="cryptic_preloader v18_ball_beat">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-beat">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v19_line_scale_pulse_out' => '<div class="cryptic_preloader v19_line_scale_pulse_out">
                                                        <div class="loaders">
                                                            <div class="loader">
                                                                <div class="loader-inner line-scale-pulse-out">
                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>',

                    'v20_line_scale_pulse_out_rapid' => '<div class="cryptic_preloader v20_line_scale_pulse_out_rapid">
                                                            <div class="loaders">
                                                                <div class="loader">
                                                                    <div class="loader-inner line-scale-pulse-out-rapid">
                                                                        <div></div>
                                                                        <div></div>
                                                                        <div></div>
                                                                        <div></div>
                                                                        <div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>'


                ),
                'default' => 'v2_ball_pulse'
            )
        ),
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebars', 'cryptic' ),
        'id'         => 'mt_general_sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_sidebars',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Generate Infinite Number of Sidebars</h3>' )
            ),
            array(
                'id'       => 'mt_dynamic_sidebars',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Sidebars', 'cryptic' ),
                'subtitle' => esc_html__( 'Use the "Add More" button to create unlimited sidebars.', 'cryptic' ),
                'add_text' => esc_html__( 'Add one more Sidebar', 'cryptic' ),
                'options'   => array(
                    'Burger Navigation',
                    'Sidebar 2'
                ),
            ),
        ),
    ));

    /**
    ||-> SECTION: Styling Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Styling Settings', 'cryptic' ),
        'id'    => 'mt_styling',
        'icon'  => 'el el-icon-magic'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Global Fonts', 'cryptic' ),
        'id'         => 'mt_styling_global_fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_googlefonts',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Import Infinite Google Fonts</h3>')
            ),
            array(
                'id'       => 'mt_google_fonts_select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_html__('Import Google Font Globally', 'cryptic'), 
                'subtitle' => esc_html__('Select one or multiple fonts', 'cryptic'),
                'desc'     => esc_html__('Importing fonts made easy', 'cryptic'),
                'options'  => $google_fonts_list,
                'default'  => array(
                    'Montserrat:regular,700,latin'
                ),
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Skin color', 'cryptic' ),
        'id'         => 'mt_styling_skin_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_predefined_skin',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Select a Predefined Skin</h3>' )
            ),
            array(
                'id'       => 'mt_predefined_skin',
                'type'     => 'palette',
                'title'    => esc_html__( 'Predefined Skin', 'cryptic' ),
                'default'  => 'skin_yellow2',
                'palettes' => array(
                    'skin_blue'  => array(
                        '#3498db',
                        '#2980b9',
                        '#454646',
                    ),
                    'skin_turquoise'  => array(
                        '#1abc9c',
                        '#16a085',
                        '#454646',
                    ),
                    'skin_green'  => array(
                        '#2ecc71',
                        '#27ae60',
                        '#454646',
                    ),
                    'skin_purple'  => array(
                        '#9b59b6',
                        '#8e44ad',
                        '#454646',
                    ),
                    'skin_yellow'  => array(
                        '#f1c40f',
                        '#f39c12',
                        '#454646',
                    ),
                    'skin_orange'  => array(
                        '#e67e22',
                        '#d35400',
                        '#454646',
                    ),
                    'skin_red'  => array(
                        '#e74c3c',
                        '#c0392b',
                        '#454646',
                    ),
                    'skin_gray'  => array(
                        '#95a5a6',
                        '#7f8c8d',
                        '#454646',
                    ),
                    'skin_yellow2'  => array(
                        '#ffd600',
                        '#e5c000',
                        '#454646',
                    ),
                )
            ),
            array(
                'id'   => 'mt_divider_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Links Colors(Regular, Hover, Active/Visited)</h3>' )
            ),
            array(
                'id'       => 'mt_global_link_styling',
                'type'     => 'link_color',
                'title'    => esc_html__('Links Color Option', 'cryptic'),
                'subtitle' => esc_html__('Only color validation can be done on this field type(Default Regular: #009dde; Default Hover: #007fb2; Default Active: #007fb2;)', 'cryptic'),
                'default'  => array(
                    'regular'  => '#009dde', // blue
                    'hover'    => '#007fb2', // blue-x3
                    'active'   => '#007fb2',  // blue-x3
                    'visited'  => '#007fb2',  // blue-x3
                )
            ),
            array(
                'id'   => 'mt_divider_main_colors',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Main Colors & Backgrounds</h3>' )
            ),
            array(
                'id'       => 'mt_style_main_texts_color',
                'type'     => 'color',
                'title'    => esc_html__('Main texts color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #009dde', 'cryptic'),
                'default'  => '#009dde',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #009dde', 'cryptic'),
                'default'  => '#009dde',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color (hover)', 'cryptic'), 
                'subtitle' => esc_html__('Default: #252525', 'cryptic'),
                'default'  => '#252525',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_semi_opacity_backgrounds',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Semitransparent blocks background', 'cryptic' ),
                'subtitle' => esc_html__( 'Default: rgba(14, 26, 33, 0.95)', 'cryptic' ),
                'default'  => array(
                    'color' => '#252525',
                    'alpha' => '.95'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu',
                ),
                'mode'     => 'background'
            ),
            array(
                'id'   => 'mt_divider_text_selection',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Text Selection Color & Background</h3>' )
            ),
            array(
                'id'       => 'mt_text_selection_color',
                'type'     => 'color',
                'title'    => esc_html__('Text selection color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #ffffff', 'cryptic'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_text_selection_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Text selection background color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #009dde', 'cryptic'),
                'default'  => '#009dde',
                'validate' => 'color',
            )
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Nav Menu', 'cryptic' ),
        'id'         => 'mt_styling_nav_menu',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'   => 'mt_divider_nav_menu_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Nav Menu Hover / Layout</h3>' )
            ),
            array(
                'id'       => 'mt_nav_hover_variant',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Navigation Hover / Layout', 'cryptic' ),
                'options'  => array(
                    'navstyle-v1' => array(
                        'alt' => esc_html__('Navstyle #1', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_01.png'
                    ),
                    'navstyle-v2' => array(
                        'alt' => esc_html__('Navstyle #2', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_02.png'
                    ),
                    'navstyle-v3' => array(
                        'alt' => esc_html__('Navstyle #3', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_03.png'
                    ),
                    'navstyle-v4' => array(
                        'alt' => esc_html__('Navstyle #4', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_04.png'
                    ),
                    'navstyle-v5' => array(
                        'alt' => esc_html__('Navstyle #5', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_05.png'
                    ),
                    'navstyle-v6' => array(
                        'alt' => esc_html__('Navstyle #6', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_06.png'
                    ),
                    'navstyle-v7' => array(
                        'alt' => esc_html__('Navstyle #7', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_07.png'
                    ),
                    'navstyle-v8' => array(
                        'alt' => esc_html__('Navstyle #8', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_08.png'
                    ),
                ),
                'default'  => 'navstyle-v1'
            ),


            array(
                'id'   => 'mt_divider_nav_menu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Menus Styling</h3>' )
            ),
            array(
                'id'       => 'mt_nav_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Text Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #ffffff', 'cryptic'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item > a,
                                .navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus,
                                .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Hover Text Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'default'  => '#ffd600',
                'validate' => 'color',
                'output' => array(
                    'color' => 'body #navbar .menu-item.selected > a, body #navbar .menu-item:hover > a',
                )
            ),
            array(
                'id'   => 'mt_divider_nav_submenu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Submenus Styling</h3>' )
            ),
            array(
                'id'       => 'mt_nav_submenu_background',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Background Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #f7f7f7', 'cryptic'),
                'default'  => '#f7f7f7',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Text Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: #252525', 'cryptic'),
                'default'  => '#252525',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Hover Background Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: transparent', 'cryptic'),
                'default'  => 'transparent',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Hover Background Color', 'cryptic'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'cryptic'),
                'validate' => 'color',
                'output' => array(
                    'color' => 'body #navbar ul.sub-menu li a:hover',
                )
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'cryptic' ),
        'id'         => 'mt_styling_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_4',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Body Font family</h3>' )
            ),
            array(
                'id'          => 'mt_body_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Body Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'line-height'  => false,
                'font-weight'  => false,
                'font-size'   => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array(
                    'body'
                ),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_5',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Headings</h3>' )
            ),
            array(
                'id'          => 'mt_heading_h1',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H1 Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h1', 'h1 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '36px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h2',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H2 Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h2'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '30px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h3',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H3 Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h3'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '24px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h4',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H4 Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h4'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h5',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H5 Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h5'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '14px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h6',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H6 Font family', 'cryptic'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h6'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '12px', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_6',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Inputs & Textareas Font family</h3>' )
            ),
            array(
                'id'                => 'mt_inputs_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Inputs Font family', 'cryptic'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array('input', 'textarea'),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for inputs and textareas', 'cryptic'),
                'default'           => array(
                    'font-family'       => 'Montserrat', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_7',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Buttons Font family</h3>' )
            ),
            array(
                'id'                => 'mt_buttons_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Buttons Font family', 'cryptic'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array(
                    'input[type="submit"]'
                ),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for buttons', 'cryptic'),
                'default'           => array(
                    'font-family'       => 'Montserrat', 
                    'google'            => true
                ),
            ),

        ),
    ));

    /**
    ||-> SECTION: Responsive Typography
    */
    Redux::setSection( $opt_name, $responsive_headings);

    /**
    ||-> SECTION: Shop Settings
    */
    Redux::setSection( $opt_name, $woocommerce_tab);
    Redux::setSection( $opt_name, $woocommerce_crypto_tools_tab);

    /**
    ||-> SECTION: Header Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Header Settings', 'cryptic' ),
        'id'    => 'mt_header',
        'icon'  => 'el el-icon-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - General', 'cryptic' ),
        'id'         => 'mt_header_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_generalheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Global Header Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Header layout', 'cryptic' ),
                'options'  => array(
                    'header1' => array(
                        'alt' => esc_html__('Header #1', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/1.png'
                    ),
                    'header2' => array(
                        'alt' => esc_html__('Header #2', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/2.png'
                    ),
                    'header3' => array(
                        'alt' => esc_html__('Header #3', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/3.png'
                    ),
                    'header4' => array(
                        'alt' => esc_html__('Header #4', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/4.png'
                    ),
                ),
                'default'  => 'header4'
            ),
            array(         
                'id'       => 'mt_header_main_background',
                'type'     => 'background',
                'title'    => esc_html__('Header (main-header) - background', 'cryptic'),
                'subtitle' => esc_html__('Default color: #252525', 'cryptic'),
                'output'      => array('.navbar-default'),
                'default'  => array(
                    'background-color' => '#252525',
                )
            ),
            array(
                'id'       => 'mt_is_nav_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Navigation Menu?', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable "sticky positioned navigation menu".', 'cryptic'),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'cryptic' ),
                'off'      => esc_html__( 'Disabled', 'cryptic' )
            ),
            array(
                'id'   => 'mt_divider_header_stat',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Search Icon Settings(from header)</h3>' )
            ),
            array(
                'id'       => 'mt_header_is_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon Status', 'cryptic'),
                'subtitle' => esc_html__('Enable or Disable Search Icon".', 'cryptic'),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'cryptic' ),
                'off'      => esc_html__( 'Disabled', 'cryptic' )
            ),
            array(
                'id'       => 'mt_header_is_search_custom_styling',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon - Custom Styling?', 'cryptic'),
                'subtitle' => esc_html__('Enable or Disable Custom Styling for Search Icon".', 'cryptic'),
                'default'  => false,
                'on'       => esc_html__( 'Yes - Add Custom Colors', 'cryptic' ),
                'off'      => esc_html__( 'No - Keep Predefined Colors', 'cryptic' )
            ),
            array(
                'id'       => 'mt_header_search_color',
                'type'     => 'color',
                'title'    => esc_html__('Search Icon Color', 'cryptic'), 
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'mt_header_is_search_custom_styling', '=', true ),
            ),
            array(
                'id'       => 'mt_header_search_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Search Icon Color - Hover', 'cryptic'), 
                'default'  => '#ffd600',
                'validate' => 'color',
                'required' => array( 'mt_header_is_search_custom_styling', '=', true ),
            ),
            array(
                'id'   => 'mt_divider_header_info_1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info First</h3>', 'cryptic' )
            ),
            array(
                'id'       => 'mt_divider_header_info_1_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 1 Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 1', 'cryptic' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_1_media_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Media Type', 'cryptic' ),
                'subtitle' => esc_html__( 'Choose to enter text or upload an image icon or select a font icon', 'cryptic' ),
                'options'  => array(
                    'font_awesome'      => esc_html__( 'Font Icon', 'cryptic' ),
                    'media_image'       => esc_html__( 'Media Image', 'cryptic' ),
                    'text_title'        => esc_html__( 'Text Title', 'cryptic' )
                ),
                'default'  => 'text_title',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_1_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 1', 'cryptic'),
                'options'  => $icons,
                'default'  => 'fa fa-phone',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','font_awesome') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'cryptic'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','media_image') 
                ),
                'default' => array('url' => esc_url(get_template_directory_uri().'/images/working_time1.png')),
            ),
            array(
                'id' => 'mt_divider_header_info_1_text_1',
                'type' => 'text',
                'title' => esc_html__('Title for Header Info 1', 'cryptic'),
                'subtitle' => esc_html__('Type title for Header Info 1', 'cryptic'),
                'default' => 'Call Us:',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','text_title') 
                ), 
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info first - value', 'cryptic'),
                'subtitle' => esc_html__('Type header info first value', 'cryptic'),
                'default' => '(+04) 743 323 424',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Second</h3>', 'cryptic' )
            ),
            array(
                'id'       => 'mt_divider_header_info_2_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 2 Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 2', 'cryptic' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_2_media_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Media Type', 'cryptic' ),
                'subtitle' => esc_html__( 'Choose to enter text or upload an image icon or select a font icon', 'cryptic' ),
                'options'  => array(
                    'font_awesome'      => esc_html__( 'Font Icon', 'cryptic' ),
                    'media_image'       => esc_html__( 'Media Image', 'cryptic' ),
                    'text_title'        => esc_html__( 'Text Title', 'cryptic' )
                ),
                'default'  => 'text_title',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_2_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 2', 'cryptic'),
                'options'  => $icons,
                'default'  => 'fa fa-envelope',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','font_awesome') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'cryptic'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','media_image') 
                ),
                'default' => array('url' => esc_url(get_template_directory_uri().'/images/working_location1.png')),
            ),
            array(
                'id' => 'mt_divider_header_info_2_text_2',
                'type' => 'text',
                'title' => esc_html__('Title for Header Info 2', 'cryptic'),
                'subtitle' => esc_html__('Type title for Header Info 2', 'cryptic'),
                'default' => 'Address:',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','text_title') 
                ), 
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info Second - Value', 'cryptic'),
                'subtitle' => esc_html__('Type header info Second value', 'cryptic'),
                'default' => 'New York, Thomas Nolan 5322',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Header Info Third</h3>')
            ),
            array(
                'id'       => 'mt_divider_header_info_3_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 3 Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 3', 'cryptic' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_3_media_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Media Type', 'cryptic' ),
                'subtitle' => esc_html__( 'Choose to enter text or upload an image icon or select a font icon', 'cryptic' ),
                'options'  => array(
                    'font_awesome'      => esc_html__( 'Font Icon', 'cryptic' ),
                    'media_image'       => esc_html__( 'Media Image', 'cryptic' ),
                    'text_title'        => esc_html__( 'Text Title', 'cryptic' )
                ),
                'default'  => 'text_title',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_3_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 3', 'cryptic'),
                'options'  => $icons,
                'default'  => 'fa fa-clock-o',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','font_awesome') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'cryptic'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','media_image') 
                ),
                'default' => array('url' => esc_url(get_template_directory_uri().'/images/working_phone.png')),
            ),
            array(
                'id' => 'mt_divider_header_info_3_text_3',
                'type' => 'text',
                'title' => esc_html__('Title for Header Info 3', 'cryptic'),
                'subtitle' => esc_html__('Type title for Header Info 3', 'cryptic'),
                'default' => 'Schedule:',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','text_title') 
                ), 
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info Third - Value', 'cryptic'),
                'subtitle' => esc_html__('Type header info Third value', 'cryptic'),
                'default' => 'Mon-Sat: 09:00 - 18:00',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),

        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo &amp; Favicon', 'cryptic' ),
        'id'         => 'mt_header_logo',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_logo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Logo Settings</h3>' )
            ),
            array(
                'id' => 'mt_logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image', 'cryptic'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),
            array(
                'id'        => 'mt_logo_max_width',
                'type'      => 'slider',
                'title'     => esc_html__('Logo Max Width', 'cryptic'),
                'subtitle'  => esc_html__('Use the slider to increase/decrease max size of the logo.', 'cryptic'),
                'desc'      => esc_html__('Min: 1px, max: 500px, step: 1px, default value: 140px', 'cryptic'),
                "default"   => 140,
                "min"       => 1,
                "step"      => 1,
                "max"       => 500,
                'display_value' => 'label'
            ),
            array(
                'id'   => 'mt_divider_favicon',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Favicon Settings</h3>' )
            ),
            array(
                'id' => 'mt_favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon url', 'cryptic'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'cryptic'),
                'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),
            )
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Fixed Sidebar Menu', 'cryptic' ),
        'id'         => 'mt_header_fixed_sidebar_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_fixed_headerstatus',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Status</h3>' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Burger Sidebar Menu Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Burger Sidebar Menu Status', 'cryptic' ),
                'desc'     => esc_html__( 'This Option Will Enable/Disable The Navigation Burger + Sidebar Menu triggered by the burger menu', 'cryptic' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'cryptic' ),
                'off'      => esc_html__( 'Disabled', 'cryptic' ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_custom_styling',
                'type'     => 'switch', 
                'title'    => esc_html__('Burger Sidebar Menu - Custom Styling?', 'cryptic'),
                'subtitle' => esc_html__('Enable or Disable Custom Styling for Burger Sidebar Menu Icon".', 'cryptic'),
                'default'  => false,
                'on'       => esc_html__( 'Yes - Add Custom Colors', 'cryptic' ),
                'off'      => esc_html__( 'No - Keep Predefined Colors', 'cryptic' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Burger Sidebar Menu Color', 'cryptic'), 
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_custom_styling', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Burger Sidebar Menu Color - Hover', 'cryptic'), 
                'default'  => '#ffd600',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_custom_styling', '=', true ),
            ),
            array(
                'id'   => 'mt_divider_fixed_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Other Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_bgs',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sidebar Menu Background', 'cryptic' ),
                'subtitle' => esc_html__( 'Default: rgba(255, 255, 255, 0.95) - #ffffff - Opacity: 0.95', 'cryptic' ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => '.95'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu'
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Texts Color', 'cryptic'), 
                'default'  => '#000000',
                'validate' => 'color'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_site_title_status',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Title or Logo', 'cryptic' ),
                'subtitle' => esc_html__( 'Choose what to show on fixed sidebar', 'cryptic' ),
                'desc'     => esc_html__( 'Choose Between Site Title or Site Logo', 'cryptic' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'site_title' => 'Title',
                    'site_logo' => 'Logo',
                    'site_nothing' => 'Disable This Feature'
                ),
                'default'  => 'site_logo'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Fixed Sidebar Menu - Sidebar', 'cryptic' ),
                'subtitle' => esc_html__( 'Select Sidebar.', 'cryptic' ),
                'default'   => 'sidebar-1',

            ),
            

        ),
    ) );

    /**

    ||-> SECTION: Footer Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Settings', 'cryptic' ),
        'id'    => 'mt_footer',
        'icon'  => 'el el-icon-arrow-down'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Top Rows', 'cryptic' ),
        'id'         => 'mt_footer_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_top',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Top Rows</h3>' )
            ),
            array(         
                'id'       => 'mt_footer_top_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (top) - background', 'cryptic'),
                'subtitle' => esc_html__('Footer background with image or color.', 'cryptic'),
                'output'      => array('footer .footer-top'),
                'default'  => array(
                    'background-image' => get_template_directory_uri(). '/images/footer.jpg',
                    'background-size' => 'cover',
                    'background-position' => 'top',
                )
            ),
            array(
                'id'        => 'mt_footer_top_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Top Text Color', 'cryptic' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'cryptic' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'cryptic' ),
                'output'    => array('color' => 'footer .footer-top h1.widget-title, footer .footer-top h3.widget-title, footer .footer-top .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'   => 'mt_divider_footer_row1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #1</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_1',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #1 - Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 1', 'cryptic' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_1_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'cryptic' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_1', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_1_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Padding', 'cryptic'),
                'subtitle'       => esc_html__('Choose the spacing for the first row from footer.', 'cryptic'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '90px', 
                    'padding-bottom'  => '90px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_1margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Margin', 'cryptic'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'cryptic'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_1border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #1 - Borders', 'cryptic'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'cryptic'),
                'output'   => array('.footer-row-1'),
                'all'      => false,
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '0', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #2</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_2',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #2 - Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 2', 'cryptic' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_2_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'cryptic' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_2', '=', '1' ),
            ),
            array(
                'id'             => 'footer_row_2_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Padding', 'cryptic'),
                'subtitle'       => esc_html__('Choose the spacing for the second row from footer.', 'cryptic'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_2margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Margin', 'cryptic'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'cryptic'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_2border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #2 - Borders', 'cryptic'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'cryptic'),
                'output'   => array('.footer-row-2'),
                'all'      => false,
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #3</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_3',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #3 - Status', 'cryptic' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 3', 'cryptic' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_3_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #3 - Layout', 'cryptic' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_3', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_3_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Padding', 'cryptic'),
                'subtitle'       => esc_html__('Choose the spacing for the third row from footer.', 'cryptic'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_3margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Margin', 'cryptic'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'cryptic'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '20px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_3border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #3 - Borders', 'cryptic'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'cryptic'),
                'output'   => array('.footer-row-3'),
                'all'      => false,
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            )
        ),
    ));



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom Bar', 'cryptic' ),
        'id'         => 'mt_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'cryptic'),
                'default' => '<a href="'.esc_url('https://themeforest.net/item/cryptic-cryptocurrency-wordpress-theme/20960008').'">'.esc_html__('Cryptocurrency WordPress Theme','').'</a>'.' by ModelTheme. 2018 All Rights Reserved.',
            ),
            array(         
                'id'       => 'mt_footer_bottom_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (bottom) - background', 'cryptic'),
                'subtitle' => esc_html__('Footer background with image or color.', 'cryptic'),
                'output'      => array('footer .footer'),
                'default'  => array(
                    'background-color' => '#202020',
                )
            ),
            array(
                'id' => 'mt_logo_footer',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image footer', 'cryptic'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/logo-light.png'),
            ),
            array(
                'id'        => 'mt_footer_bottom_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Bottom Text Color', 'cryptic' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'cryptic' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'cryptic' ),
                'output'    => array('color' => 'footer .footer h1.widget-title, footer .footer h3.widget-title, footer .footer .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));



    /**

    ||-> SECTION: Contact Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Contact Settings', 'cryptic' ),
        'id'    => 'mt_contact',
        'icon'  => 'el el-icon-map-marker-alt'
    ));
    // GENERAL
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Contact', 'cryptic' ),
        'id'         => 'mt_contact_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_contact_phone',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'cryptic'),
                'subtitle' => esc_html__('Contact phone number displayed on the contact us page.', 'cryptic'),
                'default' => '(+40) 74 0920 2288'
            ),
            array(
                'id' => 'mt_contact_email',
                'type' => 'text',
                'title' => esc_html__('Email', 'cryptic'),
                'subtitle' => esc_html__('Contact email displayed on the contact us page., additional info is good in here.', 'cryptic'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => 'office@example.com'
            ),
            array(
                'id' => 'mt_contact_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'cryptic'),
                'subtitle' => esc_html__('Enter your contact address', 'cryptic'),
                'default' => 'New York 11673 Collins Street West Victoria United State.'
            )
        ),
    ));
    
    // MAILCHIMP
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Mailchimp', 'cryptic' ),
        'id'         => 'mt_contact_mailchimp',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_mailchimp_apikey',
                'type' => 'text',
                'title' => esc_html__('Mailchimp apiKey', 'cryptic'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your apiKey', 'cryptic'),
                'default' => 'da1175811870557923759df1b4258d0a-us9'
            ),
            array(
                'id' => 'mt_mailchimp_listid',
                'type' => 'text',
                'title' => esc_html__('Mailchimp listId', 'cryptic'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your listId', 'cryptic'),
                'default' => '7ffd6ecdde'
            ),
            array(
                'id' => 'mt_mailchimp_data_center',
                'type' => 'text',
                'title' => esc_html__('Mailchimp form datacenter', 'cryptic'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your form datacenter', 'cryptic'),
                'default' => 'us9'
            )
        ),
    ));



    /**
    ||-> SECTION: Blog Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Settings', 'cryptic' ),
        'id'    => 'mt_blog',
        'icon'  => 'el el-icon-comment'
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Archive', 'cryptic' ),
        'id'         => 'mt_blog_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog List Layout</h3>' )
            ),
            array(
                'id'       => 'mt_blogloop_variant',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Blog Loop Design', 'cryptic' ),
                'options'  => array(
                    'blogloop-v1' => array(
                        'alt' => esc_html__('Blogloop v1', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v1.png'
                    ),
                    'blogloop-v2' => array(
                        'alt' => esc_html__('Blogloop v2', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v2.png'
                    ),
                    'blogloop-v3' => array(
                        'alt' => esc_html__('Blogloop v3', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v3.png'
                    ),
                    'blogloop-v4' => array(
                        'alt' => esc_html__('Blogloop v4', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v4.png'
                    ),
                    'blogloop-v5' => array(
                        'alt' => esc_html__('Blogloop v4', 'cryptic'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v5.png'
                    ),
                ),
                'default'  => 'blogloop-v1'
            ),
            array(
                'id'       => 'mt_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Blog List Layout', 'cryptic' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'cryptic' ),
                'options'  => array(
                    'mt_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_blog_right_sidebar'
            ),
            array(
                'id'       => 'mt_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Blog List Sidebar', 'cryptic' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'cryptic' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_blog_layout', '!=', 'mt_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog List Elements</h3>' )
            ),
            array(
                'id' => 'mt_blog_post_title',
                'type' => 'text',
                'title' => esc_html__('Blog Post Title', 'cryptic'),
                'subtitle' => esc_html__('Enter the text you want to display as blog post title.', 'cryptic'),
                'default' => 'All Blog Posts'
            )
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post', 'cryptic' ),
        'id'         => 'mt_blog_single_pos',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_single_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog List Layout</h3>' )
            ),
            array(
                'id'       => 'mt_single_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Single Blog List Layout', 'cryptic' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'cryptic' ),
                'options'  => array(
                    'mt_single_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_single_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_single_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'cryptic' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_single_blog_right_sidebar'
            ),
            array(
                'id'       => 'mt_single_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Single Blog List Sidebar', 'cryptic' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'cryptic' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_single_blog_layout', '!=', 'mt_single_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_single_blog_typo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog Post Font family</h3>' )
            ),
            array(
                'id'          => 'mt_single_post_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Blog Post Font family', 'cryptic'),
                'subtitle'    => esc_html__( 'Default color: #454646; Font-size: 18px; Line-height: 29px;', 'cryptic' ),
                'google'      => true, 
                'font-size'   => true,
                'line-height' => true,
                'color'       => true,
                'font-backup' => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'font-weight'  => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array(
                    '.single article .article-content p',
                    'p',
                    '.post-excerpt',

                ),
                'units'       =>'px',
                'default'     => array(
                    'color' => '#a7a7a7', 
                    'font-size' => '15px', 
                    'line-height' => '25px', 
                    'text-align' => 'left',
                    'font-family' => 'Montserrat', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_single_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Other Single Post Elements</h3>' )
            ),
            array(
                'id'       => 'mt_post_featured_image',
                'type'     => 'switch', 
                'title'    => esc_html__('Single post featured image.', 'cryptic'),
                'subtitle' => esc_html__('Show or Hide the featured image from blog post page.".', 'cryptic'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_related_posts',
                'type'     => 'switch', 
                'title'    => esc_html__('Related Posts', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable related posts', 'cryptic'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_post_navigation',
                'type'     => 'switch', 
                'title'    => esc_html__('Post Navigation', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable post navigation', 'cryptic'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_authorbio',
                'type'     => 'switch', 
                'title'    => esc_html__('About Author', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable "About author" section on single post', 'cryptic'),
                'default'  => false,
            ),
            // Author Bio Default Placeholder
            array(
                'id' => 'mt_author_default_placeholder',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Author Default Placeholder Thumbnail', 'cryptic'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'cryptic'),
                'default' => array('url' => 'http://placehold.it/128x128'),
            ),
            array( 
                'id'       => 'mt_opt_raw',
                'type'     => 'raw',
                'title'    => esc_html__('Post Formats Icons', 'cryptic'),
            ),
        ),
    ));
    

    /**
    ||-> SECTION: Social Media Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social Media Settings', 'cryptic' ),
        'id'    => 'mt_social_media',
        'icon'  => 'el el-icon-myspace'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'cryptic' ),
        'id'         => 'mt_social_media_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Global Social Links</h3>' )
            ),
            array(
                'id' => 'mt_social_telegram',
                'type' => 'text',
                'title' => esc_html__('Telegram URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Telegram url.', 'cryptic'),
                'validate' => 'url',
                'default' => 'http://telegram.org'
            ),
            array(
                'id' => 'mt_social_fb',
                'type' => 'text',
                'title' => esc_html__('Facebook URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Facebook url.', 'cryptic'),
                'validate' => 'url',
                'default' => 'http://facebook.com'
            ),
            array(
                'id' => 'mt_social_tw',
                'type' => 'text',
                'title' => esc_html__('Twitter username', 'cryptic'),
                'subtitle' => esc_html__('Type your Twitter username.', 'cryptic'),
                'default' => 'envato'
            ),
            array(
                'id' => 'mt_social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Pinterest url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_skype',
                'type' => 'text',
                'title' => esc_html__('Skype Name', 'cryptic'),
                'subtitle' => esc_html__('Type your Skype username.', 'cryptic'),
                'default' => ''
            ),
            array(
                'id' => 'mt_social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Instagram url.', 'cryptic'),
                'validate' => 'url',
                'default' => 'http://instagram.com'
            ),
            array(
                'id' => 'mt_social_youtube',
                'type' => 'text',
                'title' => esc_html__('YouTube URL', 'cryptic'),
                'subtitle' => esc_html__('Type your YouTube url.', 'cryptic'),
                'validate' => 'url',
                'default' => 'http://youtube.com'
            ),
            array(
                'id' => 'mt_social_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Dribbble url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_gplus',
                'type' => 'text',
                'title' => esc_html__('Google+ URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Google+ url.', 'cryptic'),
                'validate' => 'url',
                'default' => 'http://plus.google.com'
            ),
            array(
                'id' => 'mt_social_linkedin',
                'type' => 'text',
                'title' => esc_html__('LinkedIn URL', 'cryptic'),
                'subtitle' => esc_html__('Type your LinkedIn url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_deviantart',
                'type' => 'text',
                'title' => esc_html__('Deviant Art URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Deviant Art url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_digg',
                'type' => 'text',
                'title' => esc_html__('Digg URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Digg url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_flickr',
                'type' => 'text',
                'title' => esc_html__('Flickr URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Flickr url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_stumbleupon',
                'type' => 'text',
                'title' => esc_html__('Stumbleupon URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Stumbleupon url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_tumblr',
                'type' => 'text',
                'title' => esc_html__('Tumblr URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Tumblr url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo URL', 'cryptic'),
                'subtitle' => esc_html__('Type your Vimeo url.', 'cryptic'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id'   => 'mt_divider_twitter_keys',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Twitter Keys - Necessary for Tweets Feed Shortcode</h3>' )
            ),
            array(
                'id' => 'mt_tw_consumer_key',
                'type' => 'text',
                'title' => esc_html__('Twitter Consumer Key', 'cryptic'),
                'subtitle' => esc_html__('Type your Twitter Consumer key.', 'cryptic'),
                'default' => 'iSbkrNtDw51LUizz5ouEkQ'
            ),
            array(
                'id' => 'mt_tw_consumer_secret',
                'type' => 'text',
                'title' => esc_html__('Twitter Consumer Secret key', 'cryptic'),
                'subtitle' => esc_html__('Type your Twitter Consumer Secret key.', 'cryptic'),
                'default' => 'pZe6vUWyWdHmfDEbGfcAJpu9uJnGeEDrgujuySqk'
            ),
            array(
                'id' => 'mt_tw_access_token',
                'type' => 'text',
                'title' => esc_html__('Twitter Access Token', 'cryptic'),
                'subtitle' => esc_html__('Type your Access Token.', 'cryptic'),
                'default' => '2385448772-FXizji2NK4imcKoohcVu036VykIp5goymadiiYF'
            ),
            array(
                'id' => 'mt_tw_access_token_secret',
                'type' => 'text',
                'title' => esc_html__('Twitter Access Token Secret', 'cryptic'),
                'subtitle' => esc_html__('Type your Twitter Access Token Secret.', 'cryptic'),
                'default' => '2wUWJhhnd0ErTCgOYoVokrGKPWV055F9K4Xv5JpOmUL2e'
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Floating Social Button', 'cryptic' ),
        'id'         => 'mt_social_media_settings_fixed_social_btn',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links_footer',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Floating Social Button</h3>' )
            ),
            array(
                'id'       => 'mt_fixed_social_btn_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Floating Social Button', 'cryptic'),
                'subtitle' => esc_html__('Enable or disable Floating Social Button', 'cryptic'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_fixed_social_btn_social_select',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Social Media url to show', 'cryptic' ),
                'subtitle' => esc_html__( 'Url/Icon can be set from Social Media tab - on Theme Panel', 'cryptic' ),
                'options'  => array(
                    'telegram'      => esc_html__( 'Telegram Link/Icon', 'cryptic' ),
                    'facebook'      => esc_html__( 'Facebook Link/Icon', 'cryptic' ),
                    'twitter'      => esc_html__( 'Facebook Link/Icon', 'cryptic' ),
                    'pinterest'      => esc_html__( 'Pinterest Link/Icon', 'cryptic' ),
                    'skype'      => esc_html__( 'Skype Link/Icon', 'cryptic' ),
                    'instagram'      => esc_html__( 'Instagram Link/Icon', 'cryptic' ),
                    'youtube'      => esc_html__( 'YouTube Link/Icon', 'cryptic' ),
                    'dribbble'      => esc_html__( 'Dribbble Link/Icon', 'cryptic' ),
                    'googleplus'      => esc_html__( 'Google+ Link/Icon', 'cryptic' ),
                    'linkedin'      => esc_html__( 'LinkedIn Link/Icon', 'cryptic' ),
                    'deviantart'      => esc_html__( 'LinkedIn Link/Icon', 'cryptic' ),
                    'digg'      => esc_html__( 'Digg Link/Icon', 'cryptic' ),
                    'flickr'      => esc_html__( 'Flickr Link/Icon', 'cryptic' ),
                    'stumbleupon'      => esc_html__( 'Stumbleupon Link/Icon', 'cryptic' ),
                    'tumblr'      => esc_html__( 'Tumblr Link/Icon', 'cryptic' ),
                    'vimeo'      => esc_html__( 'Vimeo Link/Icon', 'cryptic' ),
                ),
                'default'  => 'telegram',
                'required' => array( 'mt_fixed_social_btn_status', '=', '1' ),
            ),
        ),
    ));
    /*
     * <--- END SECTIONS
     */
