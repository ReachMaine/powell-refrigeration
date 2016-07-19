<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
	// contact form 7 fallback for date field 
	add_filter( 'wpcf7_support_html5_fallback', '__return_true' );
	
	/*****  change the login screen logo ****/
	function my_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/admin-login.png);
				padding-bottom: 30px;
				background-size: contain;
				margin-left: 0px;
				margin-bottom: 0px;
				margin-right: 0px;
				height: 60px;
				width: 100%;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	add_action( 'login_footer', 'reach_login_branding' );
	function reach_login_branding() {
		$outstring = "";
		$outstring .= '<p style="text-align:center;">';
		//$outstring .= 	'<a class="reach-logo" href="https://www.reachmaine.com" target="_blank">';
		$outstring .= 	'<img src="'.get_stylesheet_directory_uri().'/images/reach-favicon.png'.'">';
		$outstring .= 		'R<i style="color: #f58220">EA</i>CH Maine';
		//$outstring .= 	'</a>';
		$outstring .= '</p>';
		echo $outstring;
	}

	function add_favicon() {
	  	$favicon_url = get_stylesheet_directory_uri() . '/images/admin-favicon.png';
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	} 

		/*****  after theme setup  ****/
	add_action('after_setup_theme', 'reach_setup');
	function reach_setup() {
		add_action('login_head', 'add_favicon');
		add_action('admin_head', 'add_favicon');

		add_image_size( 'half-large', 500, 500);
			/* image size for facebook */
		add_image_size( 'facebook_share', 470, 246, true );
		add_image_size('facebook_share_vert', 246, 470, true);

	}

	
	add_filter('wpseo_opengraph_image_size', 'mysite_opengraph_image_size');
	function mysite_opengraph_image_size($val) {
		return 'facebook_share';
	}