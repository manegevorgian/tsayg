<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_YoastSEO_AMP_Frontend' ) ) {
	class Penci_YoastSEO_AMP_Frontend {

		private $front;
		private $wpseo_options;

		public function __construct() {

			add_action( 'init', array( $this, 'func_init' ), 9 );
		}

		public function func_init() {

			if ( defined( 'WPSEO_FILE' ) && is_callable( 'WPSEO_Frontend::get_instance' ) ) {
				$this->wpseo_options = WPSEO_Options::get_all();
				add_action( 'amp_post_template_head', array( $this, 'add_wpseo_social' ) );
			}

		}

		public function add_wpseo_social() {
			$options = WPSEO_Options::get_option( 'wpseo_social' );

			if ( $options['twitter'] === true ) {
				WPSEO_Twitter::get_instance();
			}

			if ( $options['opengraph'] === true ) {
				$GLOBALS['wpseo_og'] = new WPSEO_OpenGraph();
			}

			do_action( 'wpseo_opengraph' );

			echo strip_tags( '', '<link><meta>' );
		}
	}

	new Penci_YoastSEO_AMP_Frontend();
}
