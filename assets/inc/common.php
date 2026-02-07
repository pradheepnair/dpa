<?php
/**
 * Common functions
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0
 */

 
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );
    add_role( 'api_user', __('API User'), array('read' => true, 'edit_posts' => false));
     
    
    // Load style
    function dpa_register_style() {

        wp_enqueue_style(
			'dpa_bootstrap',
			DPA_THEME_URI . '/assets/css/bootstrap.min.css',
			false,
			''
		);
        wp_enqueue_style(
			'dpa_Montserrat',
			'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap',
			false,
			''
		); 
        wp_enqueue_style(
			'dpa_font_awesome_4',
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
			false,
			'4.7.0'
		); 
        wp_enqueue_style(
			'dpa_awesome',
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css',
			false,
			'5.11.2'
		); 
        wp_enqueue_style(
			'dpa_magnific_popup',
			DPA_THEME_URI . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css',
			false,
			''
		);
        wp_enqueue_style(
			'dpa_magnific_popup',
			DPA_THEME_URI . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css',
			false,
			''
		); 
        wp_enqueue_style(
            'dpa_jquery_ui',
            DPA_THEME_URI . '/assets/vendors/jquery-ui/jquery-ui.css',
            false,
            ''
        ); 
        wp_enqueue_style(
            'dpa_timepicker',
            DPA_THEME_URI . '/assets/vendors/timepicker/timePicker.css',
            false,
            ''
        );
        wp_enqueue_style(
            'dpa_line_icons',
            DPA_THEME_URI . '/assets/fonts/line-icons.css',
            false,
            ''
        ); 
        wp_enqueue_style(
            'dpa_css_plugin',
            DPA_THEME_URI . '/assets/css/plugin.css',
            false,
            ''
        );

        wp_enqueue_style(
			'dpa_css_style',
			DPA_THEME_URI . '/assets/css/style.css',
			false,
			'5.32'
		);
    }
    add_action('wp_enqueue_scripts', 'dpa_register_style');
    
    // Load scripts
    function dpa_register_scripts() {
        wp_enqueue_script(
			'dpa_script_jquery',
			DPA_THEME_URI . '/assets/js/jquery-3.5.1.min.js',
			true,
			'3.5.1'
		); 
        wp_enqueue_script(
			'dpa_script_bootstrap',
			DPA_THEME_URI . '/assets/js/bootstrap.min.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_particles',
			DPA_THEME_URI . '/assets/js/particles.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_particles',
			DPA_THEME_URI . '/assets/js/particles.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_particlerun',
			DPA_THEME_URI . '/assets/js/particlerun.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_plugin',
			DPA_THEME_URI . '/assets/js/plugin.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_magnific',
			DPA_THEME_URI . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_jquery_ui',
			DPA_THEME_URI . '/assets/vendors/jquery-ui/jquery-ui.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_timepicker',
			DPA_THEME_URI . '/assets/vendors/timepicker/timePicker.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_main',
			DPA_THEME_URI . '/assets/js/main.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_custom_swiper',
			DPA_THEME_URI . '/assets/js/custom-swiper.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_custom_accordian',
			DPA_THEME_URI . '/assets/js/custom-accordian.js',
			true,
			''
		); 
        wp_enqueue_script(
			'dpa_script_custom_nav',
			DPA_THEME_URI . '/assets/js/custom-nav.js',
			true,
			''
		);  
        wp_enqueue_script(
			'dpa_script_custom_script',
			DPA_THEME_URI . '/assets/js/script.js',
			true,
			''
		);          
		wp_localize_script(
		    'dpa_script', 'dpa_ajax',
            array('ajax_url' => admin_url('admin-ajax.php'), 'template_url' => DPA_THEME_URI), true
        );  
         
    }
    add_action('wp_enqueue_scripts', 'dpa_register_scripts');  
     
    
    function get_the_user_ip() {
        if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return apply_filters( 'wpb_get_ip', $ip );
    } 
    
    function configure_dpamce($in) {
        $in['paste_preprocess'] = "function(plugin, args){ 
            var whitelist = 'p,span,b,strong,i,em, h3,h4,h5,h6,ul,li,ol';
            var stripped = jQuery('<div>' + args.content + '</div>');
            var els = stripped.find('*').not(whitelist);
            for (var i = els.length - 1; i >= 0; i--) {
                var e = els[i];
                jQuery(e).replaceWith(e.innerHTML);
            }
            // Strip all class and id attributes
            stripped.find('*').removeAttr('id').removeAttr('class');
            // Return the clean HTML
            args.content = stripped.html();
        }";
        return $in;
    }
    add_filter('tiny_mce_before_init','configure_dpamce');

	function my_mce4_options($init) {
		$custom_colours = '
			"000000", "Black",
			"FF0000", "Red",
			"00FF00", "Green"
		';
		$init['textcolor_map'] = '['.$custom_colours.']';
		$init['textcolor_rows'] = 1; // Number of rows in palette
		return $init;
	}
	add_filter('tiny_mce_before_init', 'my_mce4_options');
 
?>