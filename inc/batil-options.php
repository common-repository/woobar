<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "batil_opt";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => __( 'Batil Settings', 'batil' ),
        // Name that appears at the top of your panel
        'display_version'      => __( '1.0', 'batil' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Batil', 'batil' ),
        'page_title'           => __( 'Batil Settings', 'batil' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_batil',
        // Page slug used to denote the panel
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
        'footer_credit'     => ' ',                   
        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
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

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'batil' ),
        'id'     => 'basic',
        'desc'   => __( 'General Options', 'batil' ),
        'icon'   => 'el el-cogs',
        'fields' => array(
            array(
                'id'       => 'batil-message',
                'type'     => 'editor',
                'default'     => __('Promote Specials, New Arrivals and Free Shipping Here', 'batil'),
                'title'    => __( 'Message Text', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => true,
                   // 'tinymce' => array(),
                    'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'batil-message-typo',
                'type'     => 'typography',
                'title'    => __( 'Message Text Font', 'batil' ),
                'subtitle' => __( 'Specify the font properties.', 'batil' ),
                'google'   => true,                
                'color'   => false,
                'subsets'   => false,
                'line-height'   => false,
                'color'     => false,
                'text-align'   => false,
                'font-style'   => false,             
                'output'      => array('.batil-inner .message-text'),
                'default'  => array(
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                    'font-size'     => '14',
                ),
            ),  
            array(
                'id'       => 'batil-msg-text-color',
                'type'     => 'color',
                'title'    => __( 'Message Text Color', 'batil' ),
                'subtitle' => __('Pick a color for the text (default: #fff).', 'batil'),
                'default'  => '#FFFFFF',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('.batil-inner .message-text')
            ),            
            array(
                'id'       => 'batil-coupon-text',
                'type'     => 'text',
                'title'    => __( 'Coupon Code', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'placeholder' => __( 'E.g. CODE123', 'batil' ),
            ),
            array(
                'id'       => 'batil-coupon-text-color',
                'type'     => 'color',
                'title'    => __( 'Coupon Code Color', 'batil' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'batil-background-color',
                'type'     => 'color',
                'title'    => __( 'Bar Background Color', 'batil' ),
                'default'  => '#67a747',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array( 'background-color' => '.batil-container' )
            ),     
        )
    ) );

   Redux::setSection( $opt_name, array(
        'title'  => __( 'Button Settings', 'batil' ),
        'desc'  => __( 'Button Setting', 'batil' ),
        'id'     => 'btn',
        'icon'   => 'el el-th-large',
        'fields' => array(
            array(
                'id'       => 'batil-get-btn',
                'type'     => 'text',
                //'default'     => '',
                'title'    => __( 'Your Button Text', 'batil' ),
                'placeholder' => __( 'E.g. Get it now', 'batil' ),
            ),
            array(
                'id'       => 'batil-get-btn-link',
                'type'     => 'text',
                'title'    => __( 'Button Link', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'placeholder'    => __( 'Ex. http://www.yoursite.com', 'batil' ),
            ),
            array(
                'id'       => 'batil-get-btn-link-target',
                'type'     => 'button_set',
                'title'    => __( 'Button Link Target', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'options' => array(
                    '_self' => 'Open in same tab', 
                    '_blank' => 'Open in new tab'
                 ), 
                'default' => '_self'
            ),
            array(
                'id'       => 'batil-get-btn-color',
                'type'     => 'color',
                'title'    => __( 'Button Text Color', 'batil' ),
                'default'  => '#272727',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('color' => '.batil-term-message .batil-info-link'),
            ),
            array(
                'id'       => 'batil-get-btn-bg',
                'type'     => 'color',
                'title'    => __( 'Button Background Color', 'batil' ),
                'subtitle' => __('Pick a Background color for the Button', 'batil'),
                'default'  => '#ffff00',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('background-color' => '.batil-term-message .batil-info-link'),
            ),
            array(
                'id'       => 'batil-get-btn-typo',
                'type'     => 'typography',
                'title'    => __( 'Button Text Font', 'batil' ),
                'subtitle' => __( 'Specify the font properties.', 'batil' ),
                'google'   => true,                
                'color'   => false,
                'subsets'   => false,
                'line-height'   => false,
                'color'     => false,
                'text-align'   => false,
                'font-style'   => false,             
                'output'      => array('.batil-term-message .batil-info-link'),
                'default'  => array(
                    'font-family' => 'arial,helvetica,sans-serif',
                    'font-weight' => '600',
                    'font-size'     => '16',
                ),
            ),  
        )
    ) );

   Redux::setSection( $opt_name, array(
        'title'      => __( 'Social Sharing', 'batil' ),
        'desc'      => __( 'Social Sharing Button settings', 'batil' ),
        'icon'       => 'el el-share',
        'fields'     => array(
            array(
                'id'       => 'social-switch',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => 'On',
                'off'      => 'Off',
                'title'    => __( 'Social Sharing Buttons', 'batil' ),
                'subtitle' => __( '', 'batil' ),
                
            ),
            array(
                'id'       => 'batil-share-page-url',
                'type'     => 'text',
                //'required' => array( 'social-switch', '!=', '0' ),
                //'default'    => '',
                'validate' => 'url',
                'title'    => __( 'Share page URL (optional)', 'batil' ),
                'placeholder' => __( 'Ex. http://www.yoursite.com', 'batil' ),
            ),
            array(
                'id'       => 'batil-social-style',
                'type'     => 'image_select',
                'title'    => __( 'Select Social Style', 'batil' ),
                'options'  => array(
                    '1' => array(
                        'alt' => 'Style 1',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/ss-1.png'
                    ),
                    '2' => array(
                        'alt' => 'Style 2',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/ss-2.png'
                    ),
                    '3' => array(
                        'alt' => 'Style 3',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/ss-3.png'
                    ),
                    /*'4' => array(
                        'alt' => 'Style 4',
                        'img' => ReduxFramework::$_url . 'assets/img/social2.png'
                    ),
                    '5' => array(
                        'alt' => 'Style 5',
                        'img' => ReduxFramework::$_url . 'assets/img/social2.png'
                    ),*/ //will develop later
                ),
                'default'  => '2',
            ),
            array(
                'id'       => 'batil-fb',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Facebook', 'batil' ),
                'subtitle' => __( '', 'batil' ),
            ),
            array(
                'id'       => 'batil-tw',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Twitter', 'batil' ),
                'subtitle' => __( '', 'batil' ),
            ),
            array(
                'id'       => 'batil-pin',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Pintarest', 'batil' ),
                'subtitle' => __( '', 'batil' ),
            ),
            array(
                'id'       => 'batil-linkedin',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Linkedin', 'batil' ),
                'subtitle' => __( '', 'batil' ),
            ),
            array(
                'id'       => 'batil-tumblr',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Tumblr', 'batil' ),
                'subtitle' => __( '', 'batil' ),
            ),
            array(
                'id'       => 'batil-reddit',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
                'title'    => __( 'Reddit', 'batil' ),
                'subtitle' => __( '', 'batil' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Countdown Timer', 'batil' ),
        'desc'      => __( 'Countdown Timer Setting', 'batil' ),
        'icon'       => 'el el-time',
        'fields'     => array(
            array(
                'id'       => 'batil-counter-switch',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => 'On',
                'off'      => 'Off',
                'title'    => __( 'Add Countdown Timer', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                
            ),
            array(
                'id'       => 'batil-count-date',
                'type'     => 'date',
                'default'     => '08/04/2018',
                'desc'     => __( 'MM/DD/YYYY', 'batil' ),
                'title'    => __( 'Countdown Date', 'batil' ),
            ),
            array(
                'id'       => 'batil-counter-style',
                'type'     => 'image_select',
                'title'    => __( 'Select Counter Style', 'batil' ),
                'options'  => array(
                    '1' => array(
                        'alt' => 'Style 1',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/cs-1.png'
                    ),
                    '2' => array(
                        'alt' => 'Style 2',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/cs-2.png'
                    ),
                    '3' => array(
                        'alt' => 'Style 3',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/cs-3.png'
                    ),
                    '4' => array(
                        'alt' => 'Style 4',
                        'img' => BATIL_PLUGIN_URL . '/assets/img/cs-4.png'
                    )
                ),
                'default'  => '1',
            ),
            array(
                'id'       => 'counter-text-color',
                'type'     => 'color',
                'title'    => __( 'Counter Text Color', 'batil' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array( 'color' => '.batil-countdown-wrapper .batil-countdown-item .batil-countdown-number,.batil-countdown-wrapper .batil-countdown-item .batil-countdown-label' ),
            ),
            array(
                'id'       => 'counter-bg-color',
                'type'     => 'color',
                'title'    => __( 'Counter Background Color', 'batil' ),
                'default'  => '#000',
                'validate' => 'color',
                'transparent' => false,
                'output'    => array( 'background-color' => '.batil-countdown-wrapper.style-2 .batil-countdown-item, .batil-countdown-wrapper.style-3 .batil-countdown-item, .batil-countdown-wrapper.style-1' ),
            ),
            array(
                'id'       => 'batil-counter-typo',
                'type'     => 'typography',
                'title'    => __( 'Counter Text Font', 'batil' ),
                'subtitle' => __( 'Specify the font properties.', 'batil' ),
                'preview'   => false,
                'google'   => true,
                'color'   => false,
                'subsets'   => false,
                'line-height'   => false,
                'color'     => false,
                'text-align'   => false,
                'font-style'   => false,             
                'output'      => array('.batil-countdown-wrapper .flip-clock-wrapper','.batil-countdown-wrapper .batil-countdown-item'),
                'default'  => array(
                    'font-family' => 'Helvetica Neue, Helvetica, sans-serif',
                    'font-weight' => 'Normal',
                    'font-size'     => '24',
                ),
            ), 
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Display Options', 'batil' ),
        'id'     => 'display',
        'desc'   => __( 'Display Options', 'batil' ),
        'icon'   => 'el el-screen',
        'fields' => array(            
            array(
                'id'       => 'batil-height',
                'type'     => 'slider',
                'title'    => __( 'Bar Height', 'batil' ),
                'subtitle'    => __( 'Specify a minimum height', 'batil' ),
                'default'   => 38,
                'min'       => 1,
                'step'      => 1,
                'max'       => 120,
                'display_value' => 'text',
                'desc' => __('(px)', 'batil'),
            ),
            array(
                'id'       => 'batil-display-position',
                'type'     => 'button_set',
                'title'    => __( 'Bar Display Position', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'options' => array(
                    'fixed-top' => 'Fixed Top', 
                    'scroll-top' => 'Scroll Top',
                    'fixed-bottom' => 'Fixed Bottom'
                 ), 
                'default' => 'scroll-top'
            ),            
            array(
                'id'       => 'when-to-display',
                'type'     => 'button_set',
                'title'    => __( 'When to display', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'options' => array(
                    'immediately' => 'Immediately', 
                    'ontime' => 'After time (seconds)',
                    'onscroll' => 'When scroll down (%)',
                 ), 
                'default' => 'immediately'
            ),            
            array(
                'id'       => 'display-after-time',
                'type'     => 'slider',
                'required' => array( 'when-to-display', '=', 'ontime' ),
                //'default'    => '',
                'title'    => __( 'Specify Time (second)', 'batil' ),
                'default'   => 0,
                'min'       => 0,
                'step'      => 1,
                'max'       => 60,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'display-after-scroll',
                'type'     => 'slider',
                'title'    => __( 'Scroll Percentage', 'batil' ),
                'default'   => 10,
                'min'       => 1,
                'step'      => 1,
                'max'       => 100,
                'display_value' => 'text',
                'required' => array( 'when-to-display', '=', 'onscroll' ),
            ),
            array(
                'id'       => 'where-to-display',
                'type'     => 'button_set',
                'title'    => __('Where to display', 'batil'),
                'options'  => array(
                    'all_page' => 'Show on all pages',
                    'show_selected' => 'Show on selected pages',
                    'not_show_selected' => 'Don\'t Show selected pages',
                ),
                'default'  => 'all_page',
            ),
            array(
                'id'        =>'matched-url-show',
                'type'      => 'multi_text',
                'title'     => __('On URLs containing', 'batil'),
                'required'  => array( 'where-to-display', '=', 'show_selected' ),
                //'subtitle' => __('', 'batil'),
                'show_empty' => false,
                'add_text' => __( 'Add URL', 'batil' ),
                'desc'      => __('<div class="where_to_show_input_tooltip"> <div>Tips</div><div>+ Use a keyword for a group of pages. Ex: apparel, iphone, blog, new-arrivals</div><div>+ Use /page-url for page</div><div>+ Copy and Paste URL from your browser</div>', 'batil')
            ),
            array(
                'id'        =>'matched-url-not-show',
                'type'      => 'multi_text',
                'title'     => __('On URLs containing', 'batil'),
                'required'  => array( 'where-to-display', '=', 'not_show_selected' ),
                //'subtitle' => __('', 'batil'),
                'show_empty' => false,
                'add_text' => __( 'Add URL', 'batil' ),
                'desc'      => __( '<div class="where_to_show_input_tooltip"> <div>Tips</div><div>+ Use a keyword for a group of pages. Ex: apparel, iphone, blog, new-arrivals</div><div>+ Use /page-url for page</div><div>+ Copy and Paste URL from your browser</div>', 'batil' )
            ),
            array(
                'id'       => 'display-rule',
                'type'     => 'checkbox',
                'title'    => __( 'Hide Bar on Specific Devices', 'batil' ),
                //'desc'     => __( '', 'batil' ),
                //'subtitle' => __( '', 'batil' ),
                'options'  => array(
                    'xl' => 'Hide on Large Desktop',
                    'lg' => 'Hide on Desktop',
                    'md' => 'Hide on Tablet',
                    'sm' => 'Hide on Mobile'
                ),
            ),            
            array(
                'id'       => 'batil-custom-css',
                'type'     => 'ace_editor',
                'title'    => __( 'Custom CSS', 'batil' ),
                'desc'     => __( '', 'batil' ),
                'subtitle' => __( '', 'batil' ),
                'mode'   => 'css',
                'theme'    => 'monokai',
                'default'  => ".batil-container .batil-dissmiss-btn{\n    color: #fff;\n}"
            ),
        )
    ) );
    

    /*
     * <--- END SECTIONS
     */
