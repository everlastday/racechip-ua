<?php

class UN_Integration {
	
	public function __construct(){
		if (!is_admin() && (!$this->is_mobile() || !un_get_option(UN_DISABLE_ON_MOBILES))){
			add_action('wp_head', array(&$this, 'action_head'), 1);
			add_action('wp_footer', array(&$this, 'action_wp_footer'));
		}
	}
	
	public function action_head(){
		wp_enqueue_style('facebox', usernoise_url('/vendor/facebox/facebox.css'), null, '1.3');
		wp_enqueue_style('usernoise', usernoise_url('/css/usernoise.css'), null, UN_VERSION);
		wp_enqueue_style('usernoise-fixes', usernoise_url('/css/fixes.css'), null, UN_VERSION);
		wp_enqueue_script('facebox', usernoise_url('/vendor/facebox/facebox.js'), array('jquery'), '1.3',
			un_get_option(UN_LOAD_IN_FOOTER));
		wp_enqueue_script('usernoise', usernoise_url('/js/usernoise.js'), array('jquery', 'facebox'),
		 	UN_VERSION, un_get_option(UN_LOAD_IN_FOOTER));
		wp_localize_script('usernoise', 'usernoise', apply_filters('un_localization_array', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'closeImageUrl' => usernoise_url("/vendor/facebox/closelabel.png"),
			'ajaxLoaderUrl' => usernoise_url("/images/loader.gif"),
			'buttonText' => 'Задать вопрос',
			'buttonStyle' => sprintf("background-color: %s; color: %s", 
					un_get_option(UN_FEEDBACK_BUTTON_COLOR), un_get_option(UN_FEEDBACK_BUTTON_TEXT_COLOR)),
			'buttonClass' => implode(' ', un_button_class()),
			'button' => un_get_option(UN_ENABLED)
			)));
		if (is_user_logged_in()){
			wp_enqueue_style('usernoise-adminbar', usernoise_url('/css/admin-bar.css'), null, UN_VERSION);
		}
	}
	
	public function is_mobile(){
		if (function_exists('bnc_wptouch_is_mobile')){
			return bnc_wptouch_is_mobile();
		}
		$useragents = apply_filters('un_mobile_agents', array(		
			"iPhone",  				 	// Apple iPhone
			"iPod", 						// Apple iPod touch
			"incognito", 				// Other iPhone browser
			"webmate", 				// Other iPhone browser
			"Android", 			 	// 1.5+ Android
			"dream", 				 	// Pre 1.5 Android
			"CUPCAKE", 			 	// 1.5+ Android
			"blackberry9500",	 	// Storm
			"blackberry9530",	 	// Storm
			"blackberry9520",	 	// Storm v2
			"blackberry9550",	 	// Storm v2
			"blackberry 9800",	// Torch
			"webOS",					// Palm Pre Experimental
			"s8000", 				 	// Samsung Dolphin browser
			"bada",				 		// Samsung Dolphin browser
			"Googlebot-Mobile"	// the Google mobile crawler
		));
		
		foreach($useragents as $agent){
			if (preg_match("/$agent/i", $_SERVER['HTTP_USER_AGENT']))
				return true;
		}
		return false;
	}
	
	public function action_wp_footer(){
		require(usernoise_path('/html/facebox.php'));
	}
	
}

$un_integration = new UN_Integration;