<?php

include 'hacks.php';

class GP_Bootstrap_Theme extends GP_Plugin {
	public $id                = 'bootstrap_theme';
	const version             = '1.0';
	const bootstrap_version   = '3.2.0';
	const glotpress_changeset = '982';

	private $child_path;

	public function __construct() {
		parent::__construct();

		// Used for selecting the theme
		$this->add_filter( 'tmpl_load_locations', array( 'args' => 4 ) );
		$this->add_action( 'init' );

		if ( 'default' == GP::$user->current()->get_meta('default_theme') ) {
			return;
		}

		$this->child_path = dirname( __FILE__ ) . '/templates/';

		$this->add_action( 'plugins_loaded' );

		$this->add_action( 'wp_default_styles' );
		$this->add_action( 'wp_print_styles' );

		$this->add_action( 'wp_default_scripts' );
		$this->add_action( 'wp_print_scripts' );
	}

	public function plugins_loaded() {
		if ( file_exists( $this->child_path . 'helper-functions.php' ) ) {
			require_once $this->child_path . 'helper-functions.php';
		}
	}

	public function tmpl_load_locations( $locations, $template, $args, $template_path ) {
		if ( 'default' == GP::$user->current()->get_meta('default_theme') ) {
			array_unshift( $locations, dirname( __FILE__ ) . '/default/' );
		}
		else {
			array_unshift( $locations, dirname( __FILE__ ) . '/custom/', $this->child_path );
		}

		return $locations;
	}


	public function wp_default_styles( $styles ) {
		$styles->remove( 'base' );

		$styles->add( 'base', gp_url_base_root() .'plugins/child-theme/templates/css/base.css', array( 'bootstrap' ), self::version );
		$styles->add( 'bootstrap', gp_url_base_root() .'plugins/child-theme/templates/css/bootstrap.min.css', array(), self::bootstrap_version );
	}

	public function wp_print_styles() {
		wp_enqueue_style( 'base' );
	}

	public function wp_default_scripts( $scripts ) {
		$scripts->remove( 'common' );
		$scripts->remove( 'translations-page' );

		$scripts->add( 'common', gp_url_base_root() . 'plugins/child-theme/templates/js/common.js', array('jquery'), self::version );
		$scripts->add( 'translations-page', gp_url_base_root() . 'plugins/child-theme/templates/js/translations-page.js', array('common'), self::version );

		$scripts->add( 'bootstrap', gp_url_base_root() . 'plugins/child-theme/templates/js/bootstrap.min.js', array('jquery'), self::bootstrap_version );
	}

	public function wp_print_scripts() {
		wp_enqueue_script( 'bootstrap' );
	}


	public function init() {
		if ( isset( $_POST['submit'], $_POST['default_theme'] ) ) {
			GP::$user->current()->set_meta( 'default_theme', sanitize_text_field( $_POST['default_theme'] ) );
		}
	}


	public static function has_feature( $feature ) {
		switch( $feature ) {
			case 'profile':
				return method_exists( 'GP_Route_Profile', 'profile_view' );
			default:
				return false;
		}
	}

}

GP::$plugins->bootstrap_theme = new GP_Bootstrap_Theme;