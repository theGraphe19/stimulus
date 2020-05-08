<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Music Freak
* @since Music Freak 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'music_freak_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'music_freak_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'music_freak_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'music-freak' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'music-freak' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );