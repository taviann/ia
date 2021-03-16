<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Stortech
* @since Stortech 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'stortech_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'stortech_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'stortech_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'stortech' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'stortech' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'stortech_is_static_homepage_enable',
) );