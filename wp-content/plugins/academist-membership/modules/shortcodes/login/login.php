<?php

namespace AcademistMembership\Shortcodes\AcademistUserLogin;

use AcademistMembership\Lib\ShortcodeInterface;

class AcademistUserLogin implements ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_user_login';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {}
	
	public function render( $atts, $content = null ) {
		$args   = array();
		$params = shortcode_atts( $args, $atts );
		extract( $params );
		
		$html = academist_membership_get_module_template_part( 'shortcodes', 'login', 'login-template', '', $params );
		
		return $html;
	}
}