<?php
/**
 * rl-simple-theme Theme Customizer.
 *
 * @package rl-simple-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rl_simple_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Logo Settings
	$wp_customize->add_section( 'logo_text_section', array( 'title' => 'Logo Text' ) );

	// Logo text - first part
	$wp_customize->add_setting( 'logo_text_first_setting', array( 
		'default' => 'rl-' 
	) );
	$wp_customize->add_control( 'logo_text_first_setting', array( 
		'label' => 'Logo Text - First', 
		'section' => 'logo_text_section', 
		'type' => 'text' 
	) );

	// Logo text - second part
	$wp_customize->add_setting( 'logo_text_second_setting', array( 
		'default' => 'simple-theme' 
	) );
	$wp_customize->add_control( 'logo_text_second_setting', array( 
		'label' => 'Logo Text - Second', 
		'section' => 'logo_text_section', 
		'type' => 'text' 
	) );
}
add_action( 'customize_register', 'rl_simple_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rl_simple_theme_customize_preview_js() {
	wp_enqueue_script( 'rl_simple_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rl_simple_theme_customize_preview_js' );
