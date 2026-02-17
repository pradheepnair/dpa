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
        wp_enqueue_style('dpa_bootstrap', DPA_THEME_URI . '/assets/css/bootstrap.min.css', false, '');
        wp_enqueue_style('dpa_Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap', false, ''); 
        wp_enqueue_style('dpa_font_awesome_4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0'); 
        wp_enqueue_style('dpa_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', false, '5.11.2'); 
        wp_enqueue_style('dpa_magnific_popup', DPA_THEME_URI . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css', false, '1.0.0');
        wp_enqueue_style('dpa_magnific_popup', DPA_THEME_URI . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css', false, '1.0.0'); 
        wp_enqueue_style('dpa_jquery_ui', DPA_THEME_URI . '/assets/vendors/jquery-ui/jquery-ui.css', false, '1.0.0'); 
        wp_enqueue_style('dpa_timepicker', DPA_THEME_URI . '/assets/vendors/timepicker/timePicker.css', false, '1.0.0');
        wp_enqueue_style('dpa_line_icons', DPA_THEME_URI . '/assets/fonts/line-icons.css', false, '1.0.0'); 
        wp_enqueue_style( 'dpa_css_plugin', DPA_THEME_URI . '/assets/css/plugin.css', false, '1.0.0');
        wp_enqueue_style('dpa_css_style', DPA_THEME_URI . '/assets/css/style.css', false, '5.4.1');
    }
    add_action('wp_enqueue_scripts', 'dpa_register_style');
    
    // Load scripts
    function dpa_register_scripts() {
        wp_enqueue_script('dpa_script_jquery', DPA_THEME_URI . '/assets/js/jquery-3.5.1.min.js', NULL, NULL, true); 
		wp_enqueue_script('dpa_script_bootstrap', DPA_THEME_URI . '/assets/js/bootstrap.min.js', NULL, NULL, true); 
        wp_enqueue_script('dpa_script_plugin', DPA_THEME_URI . '/assets/js/plugin.js', NULL, NULL, true);  
        wp_enqueue_script('dpa_script_magnific', DPA_THEME_URI . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js', NULL, NULL, true); 
        wp_enqueue_script('dpa_script_jquery_ui', DPA_THEME_URI . '/assets/vendors/jquery-ui/jquery-ui.js', NULL, NULL, true); 
        wp_enqueue_script('dpa_script_timepicker', DPA_THEME_URI . '/assets/vendors/timepicker/timePicker.js', NULL, NULL, true); 
        wp_enqueue_script('dpa_script_main', DPA_THEME_URI . '/assets/js/main.js', NULL, '1.0.1', true); 
        wp_enqueue_script('dpa_script_custom_swiper', DPA_THEME_URI . '/assets/js/custom-swiper.js', NULL, '1.0.1', true);  
        wp_enqueue_script('dpa_script_custom_accordian', DPA_THEME_URI . '/assets/js/custom-accordian.js', NULL, '1.0.1', true);  
        wp_enqueue_script('dpa_script_custom_nav', DPA_THEME_URI . '/assets/js/custom-nav.js', NULL, '1.0.1', true); 
        // wp_localize_script('dpa_script_local', 'dpa_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'template_url' => DPA_THEME_URI)); 
        wp_enqueue_script('dpa_script_custom', DPA_THEME_URI . '/assets/js/script.js', NULL, '1.1.2', true); 
        wp_localize_script('dpa_script_custom', 'dpa_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'template_url' => DPA_THEME_URI)); 
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
 
	add_filter('manage_testimonial_posts_columns', function($columns) {
		$new_columns = [];

		foreach ($columns as $key => $value) {
			$new_columns[$key] = $value;

			// Insert after title column
			if ($key === 'title') {
				$new_columns['location'] = 'Location';
			}
		}

		return $new_columns;
	});

	add_action('manage_testimonial_posts_custom_column', function($column, $post_id) {
		if ($column === 'location') {
			$location = get_post_meta($post_id, 'location', true);
			echo $location ? esc_html($location) : '—';
		}
	}, 10, 2);

function form_action() {
    global $wpdb;
    $target = isset($_POST['target']) ? $_POST['target'] : '';
    $html = '';
    switch ($target) {
        case 'booking-form':
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            if ($id > 0) {
                $post = get_post($id);
                $post_title = $post->post_title;

                $html = '
                <form method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Book: ' . $post_title . '</h1>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Please enter your details below</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="required" data-message="required"><label>Tour date</label> <input id="dpa_tour_date" name="dpa_tour_date" data-id="tour_date" class="input df_date" maxlength="10" type="text" placeholder="dd/mm/yyyy" autocomplete="off" value=""></fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="required" data-message="required"><label>Pickup time</label> <input id="dpa_pickup_time" name="dpa_pickup_time" data-id="pickup_time" class="input alpha" maxlength="50" type="text" placeholder="eg: 4:30 PM" value=""></fieldset>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12">
                            <fieldset class="required" data-message="required"><label>Nationality</label> 
                                <select id="dpa_nationality" name="dpa_nationality" data-id="nationality" class="input">
                                    <option value="">Select one</option>
                                    <option value="Afganistan">Afganistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia Herzegovina">Bosnia Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Virgin Islands">British Virgin Islands</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Congo (Democratic Republic)">Congo (Democratic Republic)</option>
                                    <option value="Congo (Republic of)">Congo (Republic of)</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curacao">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="DJIBOUTI">DJIBOUTI</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="ERITREA">ERITREA</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Ivory Coast">Ivory Coast</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="kosovo">kosovo</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="MADAGASCAR">MADAGASCAR</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of the Congo">Republic of the Congo</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Barthelemy">Saint Barthelemy</option>
                                    <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino (Republic of)">San Marino (Republic of)</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="SIERRA LEONE">SIERRA LEONE</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="SUDAN">SUDAN</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Yemen Republic">Yemen Republic</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="required" data-message="required"><label>Your name</label> <input id="dpa_first_name" name="dpa_first_name" data-id="first_name" class="input alpha" maxlength="100" type="text" placeholder="Enter your  name" value=""></fieldset>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="required" data-message="required"><label>Email address</label> <input id="dpa_email_address" name="dpa_email_address" data-id="email_address" class="input email" maxlength="255" type="email" placeholder="eg: name@domain.com" value=""></fieldset>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="required" data-message="required"><label>Country code</label>
                                <select id="dpa_country_code" name="dpa_country_code" data-id="country_code" class="input">
                                    <option value="">Select an option</option>
                                    <option value="+93">Afghanistan (+93)</option>
                                    <option value="+358">Aland Islands (+358)</option>
                                    <option value="+355">Albania (+355)</option>
                                    <option value="+213">Algeria (+213)</option>
                                    <option value="+1">American Samoa(+1)</option>
                                    <option value="+376">Andorra (+376) </option>
                                    <option value="+244">Angola (+244) </option>
                                    <option value="+1">Anguilla (+1) </option>
                                    <option value="+672">Antarctica (+672) </option>
                                    <option value="+1">Antigua And Barbuda (+1) </option>
                                    <option value="+54">Argentina (+54) </option>
                                    <option value="+374">Armenia (+374) </option>
                                    <option value="+297">Aruba (+297)</option>
                                    <option value="+61">Australia (+61)</option>
                                    <option value="+43">Austria (+43)</option>
                                    <option value="+994">Azerbaijan (+994)</option>
                                    <option value="+1">The Bahamas (+1)</option>
                                    <option value="+973">Bahrain (+973)</option>
                                    <option value="+880">Bangladesh (+880)</option>
                                    <option value="+1">Barbados (+1)</option>
                                    <option value="+375">Belarus (+375)</option>
                                    <option value="+32">Belgium (+32)</option>
                                    <option value="+501">Belize (+501)</option>
                                    <option value="+229">Benin (+229)</option>
                                    <option value="+1">Bermuda (+1)</option>
                                    <option value="+975">Bhutan (+975)</option>
                                    <option value="+591">Bolivia (+591)</option>
                                    <option value="+387">Bosnia and Herzegovina (+387)</option>
                                    <option value="+267">Botswana (+267)</option>
                                    <option value="+0055">Bouvet Island (+0055)</option>
                                    <option value="+55">Brazil (+55)</option>
                                    <option value="+246">British Indian Ocean Territory (+246)</option>
                                    <option value="+673">Brunei (+673)</option>
                                    <option value="+359">Bulgaria (+359)</option>
                                    <option value="+226">Burkina Faso (+226)</option>
                                    <option value="+257">Burundi (+257)</option>
                                    <option value="+855">Cambodia (+855)</option>
                                    <option value="+237">Cameroon (+237)</option>
                                    <option value="+1">Canada (+1)</option>
                                    <option value="+238">Cape Verde (+238)</option>
                                    <option value="+1">Cayman Islands (+1)</option>
                                    <option value="+236">Central African Republic (+236)</option>
                                    <option value="+235">Chad (+235)</option>
                                    <option value="+56">Chile (+56)</option>
                                    <option value="+86">China (+86)</option>
                                    <option value="+61">Christmas Island (+61)</option>
                                    <option value="+61">Cocos (Keeling) Islands (+61)</option>
                                    <option value="+57">Colombia (+57)</option>
                                    <option value="+269">Comoros (+269)</option>
                                    <option value="+242">Congo (+242)</option>
                                    <option value="+243">Democratic Republic of the Congo (+243)</option>
                                    <option value="+682">Cook Islands (+682)</option>
                                    <option value="+506">Costa Rica (+506)</option>
                                    <option value="+225">Cote D\'Ivoire (Ivory Coast) (+225)</option>
                                    <option value="+385">Croatia (+385)</option>
                                    <option value="+53">Cuba (+53)</option>
                                    <option value="+357">Cyprus (+357)</option>
                                    <option value="+420">Czech Republic (+420)</option>
                                    <option value="+45">Denmark (+45)</option>
                                    <option value="+253">Djibouti (+253)</option>
                                    <option value="+1">Dominica (+1)</option>
                                    <option value="+1">Dominican Republic (+1)</option>
                                    <option value="+670">East Timor (+670)</option>
                                    <option value="+593">Ecuador (+593)</option>
                                    <option value="+20">Egypt (+20)</option>
                                    <option value="+503">El Salvador (+503)</option>
                                    <option value="+240">Equatorial Guinea (+240)</option>
                                    <option value="+291">Eritrea (+291)</option>
                                    <option value="+372">Estonia (+372)</option>
                                    <option value="+251">Ethiopia (+251)</option>
                                    <option value="+500">Falkland Islands (+500)</option>
                                    <option value="+298">Faroe Islands (+298)</option>
                                    <option value="+679">Fiji Islands (+679)</option>
                                    <option value="+358">Finland (+358)</option>
                                    <option value="+33">France (+33)</option>
                                    <option value="+594">French Guiana (+594)</option>
                                    <option value="+689">French Polynesia (+689)</option>
                                    <option value="+262">French Southern Territories (+262)</option>
                                    <option value="+241">Gabon (+241)</option>
                                    <option value="+220">Gambia The (+220)</option>
                                    <option value="+995">Georgia (+995)</option>
                                    <option value="+49">Germany (+49)</option>
                                    <option value="+233">Ghana (+233)</option>
                                    <option value="+350">Gibraltar (+350)</option>
                                    <option value="+30">Greece (+30)</option>
                                    <option value="+299">Greenland (+299)</option>
                                    <option value="+1">Grenada (+1)</option>
                                    <option value="+590">Guadeloupe (+590)</option>
                                    <option value="+1">Guam (+1)</option>
                                    <option value="+502">Guatemala (+502)</option>
                                    <option value="+44">Guernsey and Alderney (+44)</option>
                                    <option value="+224">Guinea (+224)</option>
                                    <option value="+245">Guinea-Bissau (+245)</option>
                                    <option value="+592">Guyana (+592)</option>
                                    <option value="+509">Haiti (+509)</option>
                                    <option value="+672">Heard Island and McDonald Islands (+672)</option>
                                    <option value="+504">Honduras (+504)</option>
                                    <option value="+852">Hong Kong S.A.R. (+852)</option>
                                    <option value="+36">Hungary (+36)</option>
                                    <option value="+354">Iceland (+354)</option>
                                    <option value="+91">India (+91)</option>
                                    <option value="+62">Indonesia (+62)</option>
                                    <option value="+98">Iran (+98)</option>
                                    <option value="+964">Iraq (+964)</option>
                                    <option value="+353">Ireland (+353)</option>
                                    <option value="+972">Israel (+972)</option>
                                    <option value="+39">Italy (+39)</option>
                                    <option value="+1">Jamaica (+1)</option>
                                    <option value="+81">Japan (+81)</option>
                                    <option value="+44">Jersey (+44)</option>
                                    <option value="+962">Jordan (+962)</option>
                                    <option value="+7">Kazakhstan (+7)</option>
                                    <option value="+254">Kenya (+254)</option>
                                    <option value="+686">Kiribati (+686)</option>
                                    <option value="+850">North Korea (+850)</option>
                                    <option value="+82">South Korea (+82)</option>
                                    <option value="+965">Kuwait (+965)</option>
                                    <option value="+996">Kyrgyzstan (+996)</option>
                                    <option value="+856">Laos (+856)</option>
                                    <option value="+371">Latvia (+371)</option>
                                    <option value="+961">Lebanon (+961)</option>
                                    <option value="+266">Lesotho (+266)</option>
                                    <option value="+231">Liberia (+231)</option>
                                    <option value="+218">Libya (+218)</option>
                                    <option value="+423">Liechtenstein (+423)</option>
                                    <option value="+370">Lithuania (+370)</option>
                                    <option value="+352">Luxembourg (+352)</option>
                                    <option value="+853">Macau S.A.R. (+853)</option>
                                    <option value="+389">Macedonia (+389)</option>
                                    <option value="+261">Madagascar (+261)</option>
                                    <option value="+265">Malawi (+265)</option>
                                    <option value="+60">Malaysia (+60)</option>
                                    <option value="+960">Maldives (+960)</option>
                                    <option value="+223">Mali (+223)</option>
                                    <option value="+356">Malta (+356)</option>
                                    <option value="+44">Man (Isle of) (+44)</option>
                                    <option value="+692">Marshall Islands (+692)</option>
                                    <option value="+596">Martinique (+596)</option>
                                    <option value="+222">Mauritania (+222)</option>
                                    <option value="+230">Mauritius (+230)</option>
                                    <option value="+262">Mayotte (+262)</option>
                                    <option value="+52">Mexico (+52)</option>
                                    <option value="+691">Micronesia (+691)</option>
                                    <option value="+373">Moldova (+373)</option>
                                    <option value="+377">Monaco (+377)</option>
                                    <option value="+976">Mongolia (+976)</option>
                                    <option value="+382">Montenegro (+382)</option>
                                    <option value="+1">Montserrat (+1)</option>
                                    <option value="+212">Morocco (+212)</option>
                                    <option value="+258">Mozambique (+258)</option>
                                    <option value="+95">Myanmar (+95)</option>
                                    <option value="+264">Namibia (+264)</option>
                                    <option value="+674">Nauru (+674)</option>
                                    <option value="+977">Nepal (+977)</option>
                                    <option value="+599">Bonaire, Sint Eustatius and Saba (+599)</option>
                                    <option value="+31">Netherlands (+31)</option>
                                    <option value="+687">New Caledonia (+687)</option>
                                    <option value="+64">New Zealand (+64)</option>
                                    <option value="+505">Nicaragua (+505)</option>
                                    <option value="+227">Niger (+227)</option>
                                    <option value="+234">Nigeria (+234)</option>
                                    <option value="+683">Niue (+683)</option>
                                    <option value="+672">Norfolk Island (+672)</option>
                                    <option value="+1">Northern Mariana Islands (+1)</option>
                                    <option value="+47">Norway (+47)</option>
                                    <option value="+968">Oman (+968)</option>
                                    <option value="+92">Pakistan (+92)</option>
                                    <option value="+680">Palau (+680)</option>
                                    <option value="+970">Palestinian Territory Occupied (+970)</option>
                                    <option value="+507">Panama (+507)</option>
                                    <option value="+675">Papua new Guinea (+675)</option>
                                    <option value="+595">Paraguay (+595)</option>
                                    <option value="+51">Peru (+51)</option>
                                    <option value="+63">Philippines (+63)</option>
                                    <option value="+870">Pitcairn Island (+870)</option>
                                    <option value="+48">Poland (+48)</option>
                                    <option value="+351">Portugal (+351)</option>
                                    <option value="+1">Puerto Rico (+1)</option>
                                    <option value="+974">Qatar (+974)</option>
                                    <option value="+262">Reunion (+262)</option>
                                    <option value="+40">Romania (+40)</option>
                                    <option value="+7">Russia (+7)</option>
                                    <option value="+250">Rwanda (+250)</option>
                                    <option value="+290">Saint Helena (+290)</option>
                                    <option value="+1">Saint Kitts And Nevis (+1)</option>
                                    <option value="+1">Saint Lucia (+1)</option>
                                    <option value="+508">Saint Pierre and Miquelon (+508)</option>
                                    <option value="+1">Saint Vincent And The Grenadines (+1)</option>
                                    <option value="+590">Saint-Barthelemy (+590)</option>
                                    <option value="+590">Saint-Martin (French part) (+590)</option>
                                    <option value="+685">Samoa (+685)</option>
                                    <option value="+378">San Marino (+378)</option>
                                    <option value="+239">Sao Tome and Principe (+239)</option>
                                    <option value="+966">Saudi Arabia (+966)</option>
                                    <option value="+221">Senegal (+221)</option>
                                    <option value="+381">Serbia (+381)</option>
                                    <option value="+248">Seychelles (+248)</option>
                                    <option value="+232">Sierra Leone (+232)</option>
                                    <option value="+65">Singapore (+65)</option>
                                    <option value="+421">Slovakia (+421)</option>
                                    <option value="+386">Slovenia (+386)</option>
                                    <option value="+677">Solomon Islands (+677)</option>
                                    <option value="+252">Somalia (+252)</option>
                                    <option value="+27">South Africa (+27)</option>
                                    <option value="+500">South Georgia (+500)</option>
                                    <option value="+211">South Sudan (+211)</option>
                                    <option value="+34">Spain (+34)</option>
                                    <option value="+94">Sri Lanka (+94)</option>
                                    <option value="+249">Sudan (+249)</option>
                                    <option value="+597">Suriname (+597)</option>
                                    <option value="+47">Svalbard And Jan Mayen Islands (+47)</option>
                                    <option value="+268">Swaziland (+268)</option>
                                    <option value="+46">Sweden (+46)</option>
                                    <option value="+41">Switzerland (+41)</option>
                                    <option value="+963">Syria (+963)</option>
                                    <option value="+886">Taiwan (+886)</option>
                                    <option value="+992">Tajikistan (+992)</option>
                                    <option value="+255">Tanzania (+255)</option>
                                    <option value="+66">Thailand (+66)</option>
                                    <option value="+228">Togo (+228)</option>
                                    <option value="+690">Tokelau (+690)</option>
                                    <option value="+676">Tonga (+676)</option>
                                    <option value="+1">Trinidad And Tobago (+1)</option>
                                    <option value="+216">Tunisia (+216)</option>
                                    <option value="+90">Turkey (+90)</option>
                                    <option value="+993">Turkmenistan (+993)</option>
                                    <option value="+1">Turks And Caicos Islands (+1)</option>
                                    <option value="+688">Tuvalu (+688)</option>
                                    <option value="+256">Uganda (+256)</option>
                                    <option value="+380">Ukraine (+380)</option>
                                    <option value="+971">United Arab Emirates (+971)</option>
                                    <option value="+44">United Kingdom (+44)</option>
                                    <option value="+1">United States (+1)</option>
                                    <option value="+1">United States Minor Outlying Islands (+1)</option>
                                    <option value="+598">Uruguay (+598)</option>
                                    <option value="+998">Uzbekistan (+998)</option>
                                    <option value="+678">Vanuatu (+678)</option>
                                    <option value="+379">Vatican City State (Holy See) (+379)</option>
                                    <option value="+58">Venezuela (+58)</option>
                                    <option value="+84">Vietnam (+84)</option>
                                    <option value="+1">Virgin Islands (British) (+1)</option>
                                    <option value="+1">Virgin Islands (US) (+1)</option>
                                    <option value="+681">Wallis And Futuna Islands (+681)</option>
                                    <option value="+212">Western Sahara (+212)</option>
                                    <option value="+967">Yemen (+967)</option>
                                    <option value="+260">Zambia (+260)</option>
                                    <option value="+263">Zimbabwe (+263)</option>
                                    <option value="+383">Kosovo (+383)</option>
                                    <option value="+599">Curaçao (+599)</option>
                                    <option value="+1721">Sint Maarten (Dutch part) (+1721)</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-6"><fieldset class="required" data-message="required"><label>Contact number</label> <input id="dpa_contact_number" name="dpa_contact_number" data-id="contact_number" class="input num" maxlength="12" type="text" placeholder="" value=""></fieldset></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <fieldset class="required" data-message="required"><label>Number of adults</label> <input id="dpa_no_adults" name="dpa_no_adults" data-id="no_adults" class="input num" maxlength="3" type="text" placeholder="eg: 1" value=""></fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="required" data-message="required"><label>Number of children</label> <input id="dpa_no_children" name="dpa_no_children" data-id="no_children" class="input num" maxlength="3" type="text" placeholder="eg: 1" value="0"></fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="required" data-message="required"><label>Number of infants</label> <input id="dpa_no_infants" name="dpa_no_infants" data-id="no_infants" class="input num" maxlength="3" type="text" placeholder="eg: 0" value="0"></fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="required" data-message="required"><label>Pickup address</label> <input id="dpa_address" name="dpa_address" data-id="address" class="input alpha_num" maxlength="150" type="text" placeholder="eg: Room No & Hotel Name, Airport name, etc" value=""><span class="helper">For hotel please mention the room number</span></fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="required" data-message="required"><label>How did you discovered Us</label> <select id="dpa_discover" name="dpa_discover" data-id="discover" class="input">
                            <option value="">-- select one --</option>
                            <option>Google search</option>
                            <option>Tripadvisor</option>
                            <option>Recommended by friends/relatives</option>
                            <option>Bing</option>
                            <option>Instagram</option>
                            <option>Yahoo</option>
                            <option>Facebook</option>
                            <option>Other</option>
                            </select></fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset data-message="required"><label>Special requests</label> <input id="dpa_notes" name="dpa_notes" data-id="notes" class="input alpha" maxlength="150" type="text" placeholder="eg: Wheelchair, baby seat, etc" value=""><span class="helper">Mention any special services required</span></fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset><a data-id="' . $id . '" data-action="book_submit" class="nir-btn white btn_action">Submit</a></fieldset>
                        </div>
                    </div>
                </form>';
            }
            break;
    }
    
    echo $html;
    die();
}
add_action('wp_ajax_nopriv_form_action', 'form_action');
add_action('wp_ajax_form_action', 'form_action');
?>