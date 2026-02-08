<?php
/**
 * Customizer class
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0
 */
 
    // Logo section
    function site_logo( $wp_customize ) { 
        $wp_customize->add_setting( 'site_logo' );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'site_logo',
                array(
                    'label'      => 'Logo (Default)',
                    'section'    => 'title_tagline',
                    'settings'   => 'site_logo'
                )
            )
        );
    }
    add_action('customize_register', 'site_logo'); 
    
    // Navigation 
    function register_dpa_menus() {
      register_nav_menus(
        array(
          'main-nav' => __('Main navigation'),
          'quick-links' => __('Quick links'), 
         )
       );
    }
    add_action( 'init', 'register_dpa_menus' );

    // General block
    function customize_general_block($wp_customize) { 
    	$wp_customize->add_section('dpa_general_block', array(
            'title'    => __('General Settings', 'dpa'),
            'description' => 'Set general settings here', 
            'priority' => 600,
        ));
    	$wp_customize->add_setting('dpa_general_tripadvisor', array(
            'default'        => '', 
            'transport'      => 'refresh',
            'type'           => 'option',
			'capability'     => 'edit_theme_options' 
        ));
    	$wp_customize->add_control('dpa_general_tripadvisor_input', array(
            'label'      => __('TripAdvisor Script:', 'dpa'),
            'section'    => 'dpa_general_block',
            'settings'   => 'dpa_general_tripadvisor',
            'type'      => 'textarea'
        ));

    	 
    }
    add_action('customize_register', 'customize_general_block'); 
    
    // Script block
    function customize_script_block($wp_customize) { 
    	$wp_customize->add_section('dpa_scripts_block', array(
            'title'    => __('Additional Scripts', 'dpa'),
            'description' => 'Set scripts here for header part',
    		//'panel'    => 'dpa_script_block',
            'priority' => 700,
        ));
    	$wp_customize->add_setting('dpa_script_header', array(
            'default'        => '', 
            'transport'      => 'refresh',
            'type'           => 'option',
			'capability'     => 'edit_theme_options' 
        ));
    	$wp_customize->add_control('dpa_script_header_input', array(
            'label'      => __('Script(inside header):', 'dpa'),
            'section'    => 'dpa_scripts_block',
            'settings'   => 'dpa_script_header',
            'type'      => 'textarea'
        ));

    	$wp_customize->add_setting('dpa_script_body', array(
            'default'        => '', 
            'transport'      => 'refresh',
            'type'           => 'option',
			'capability'     => 'edit_theme_options' 
        ));
    	$wp_customize->add_control('dpa_script_body_input', array(
            'label'      => __('Script(inside body):', 'dpa'),
            'section'    => 'dpa_scripts_block',
            'settings'   => 'dpa_script_body',
            'type'      => 'textarea'
        ));

        $wp_customize->add_setting('dpa_script_footer', array(
            'default'        => '', 
            'transport'      => 'refresh',
            'type'           => 'option',
			'capability'     => 'edit_theme_options' 
        ));
    	$wp_customize->add_control('dpa_script_footer_input', array(
            'label'      => __('Script(inside footer):', 'dpa'),
            'section'    => 'dpa_scripts_block',
            'settings'   => 'dpa_script_footer',
            'type'      => 'textarea'
        ));
    }
    add_action('customize_register', 'customize_script_block'); 
    
    
    // Footer section
    function site_footer( $wp_customize ) {  
        $wp_customize->add_panel( 'footer_blocks', array(
    		'priority'       => 500,
    		'theme_supports' => '',
    		'title'          => __( 'Footer Contents', 'dpa' ),
    		'description'    => __( 'Set editable text for certain content.', 'dpa' ),
    	) ); 
    	
        // Copyright block
    	$wp_customize->add_section('dpa_copyright', array(
            'title'    => __('Copyright information', 'dpa'),
    		'panel'    => 'footer_blocks',
            'priority' => 70,
        ));
    	$wp_customize->add_setting('dpa_copyright_text', array(
            'default'        => get_option( 'dpa_copyright_text' ), 
            'transport'      => 'refresh',
            'type'           => 'option',
			'capability'     => 'edit_theme_options' 
        ));
    	$wp_customize->add_control('dpa_copyright_input', array(
            'label'      => __('Copyright information', 'dpa'),
            'section'    => 'dpa_copyright',
            'settings'   => 'dpa_copyright_text',
            'type'      => 'textarea'
        ));
        
         
    	
    	// Social media handles
    	$wp_customize->add_section('dpa_social_handle', array(
            'title'    => __('Social media handles', 'dpa'),
    		'panel'    => 'footer_blocks',
            'priority' => 70,
        ));
    	$wp_customize->add_setting('dpa_social_fb', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod' 
        ));
    	$wp_customize->add_control('dpa_fb', array(
            'label'      => __('Facebook handle', 'dpa'),
            'section'    => 'dpa_social_handle',
            'settings'   => 'dpa_social_fb',
        ));
        
        $wp_customize->add_setting('dpa_social_ig', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod', 
        ));
        $wp_customize->add_control('dpa_ig', array(
            'label'      => __('Instagram handle', 'dpa'),
            'section'    => 'dpa_social_handle',
            'settings'   => 'dpa_social_ig',
        ));
        
        $wp_customize->add_setting('dpa_social_tw', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod', 
        ));
        $wp_customize->add_control('dpa_tw', array(
            'label'      => __('Twitter handle', 'dpa'),
            'section'    => 'dpa_social_handle',
            'settings'   => 'dpa_social_tw',
        )); 
        
        $wp_customize->add_setting('dpa_social_yt', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod', 
        ));
        $wp_customize->add_control('dpa_yt', array(
            'label'      => __('YouTube handle', 'dpa'),
            'section'    => 'dpa_social_handle',
            'settings'   => 'dpa_social_yt',
        )); 
        
        $wp_customize->add_setting('dpa_social_li', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod', 
        ));
        $wp_customize->add_control('dpa_li', array(
            'label'      => __('LinkedIn handle', 'dpa'),
            'section'    => 'dpa_social_handle',
            'settings'   => 'dpa_social_li',
        )); 

        // Footer Bio block
    	$wp_customize->add_section('dpa_footer_bio', array(
            'title'    => __('Footer Bio block', 'dpa'),
    		'panel'    => 'footer_blocks',
            'priority' => 70,
        ));
    	$wp_customize->add_setting('dpa_footer_bio_text', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod' 
        ));
    	$wp_customize->add_control('dpa_footer_bio_text_control', array(
            'label'      => __('Footer Bio Text', 'dpa'),
            'section'    => 'dpa_footer_bio',
            'settings'   => 'dpa_footer_bio_text',
            'type'      => 'textarea'
        ));
    	
    	function sanitize_text( $text ) {
    	    return sanitize_text_field( $text );
    	} 
    }
    add_action('customize_register', 'site_footer'); 
 ?>