<?php
/**
 * Plugin Name: Comport Elementor
 * Description: Adds custom Comport widgets Elementor.
 * Version:     1.0.9
 * Author:      Br8kthru
 * Author URI:  https://www.br8kthru.com/
 */

function register_comport_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/demo-form-widget.php' );
	// require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );

	$widgets_manager->register( new \Elementor_Demo_Form_Widget() );
	// $widgets_manager->register( new \Elementor_Hello_World_Widget_2() );

}
add_action( 'elementor/widgets/register', 'register_comport_widgets' );
