<?php

include 'hacks.php';

class GP_Bootstrap_Theme extends GP_Plugin {
	public $id = 'bootstrap_theme';
	public $version = '1.0';

	private $child_path;

	public function __construct() {
		parent::__construct();

		$this->child_path = dirname( __FILE__ ) . '/templates/';

		$this->add_action( 'plugins_loaded' );
		$this->add_filter( 'tmpl_load_locations', array( 'args' => 4 ) );

		$this->add_action( 'wp_default_styles' );
		$this->add_action( 'wp_print_styles' );
	}

	public function plugins_loaded() {
		if( file_exists( $this->child_path . 'helper-functions.php' ) ) {
			require_once $this->child_path . 'helper-functions.php';
		}
	}

	public function tmpl_load_locations( $locations, $template, $args, $template_path ) {
		array_unshift( $locations, $this->child_path );

		return $locations;
	}


	public function wp_default_styles( &$styles ) {
		$styles->remove( 'base' );

		$styles->add( 'base', gp_url_base_root() .'plugins/child-theme/templates/css/base.css', array( 'bootstrap' ), $this->version );
		$styles->add( 'bootstrap', gp_url_base_root() .'plugins/child-theme/templates/css/bootstrap.min.css', array(), $this->version );
	}

	public function wp_print_styles() {
		wp_enqueue_style( 'base' );
	}

}

GP::$plugins->bootstrap_theme = new GP_Bootstrap_Theme;