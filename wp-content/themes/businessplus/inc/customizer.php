<?php
/**
 * businessplus Theme Customizer
 *
 * @package businessplus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function businessplus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

// Settings

	//section2
	$wp_customize->add_setting( 'section_2_headline' , array(
		'default'     => 'Headline',
		'transport'   => 'refresh'
	));
	$wp_customize->add_setting( 'section_2_refinement' , array(
		'default'     => '',
		'transport'   => 'refresh'
	));
	$wp_customize->add_setting( 'section_2_text' , array(
		'default'     => '',
		'transport'   => 'refresh'
	));

	//section3
	$wp_customize->add_setting( 'section_3_headline' , array(
		'default'     => 'Headline',
		'transport'   => 'refresh'
	));
	$wp_customize->add_setting( 'section_3_refinement' , array(
		'default'     => '',
		'transport'   => 'refresh'
	));


	//Homepage
	$wp_customize->add_setting( 'home_section_1_headline' , array(
		'default'     => 'Headline',
		'transport'   => 'refresh'
	));
	$wp_customize->add_setting( 'home_section_1_refinement' , array(
		'default'     => '',
		'transport'   => 'refresh'
	));
	$wp_customize->add_setting( 'post_button_text' , array(
		'default'     => '',
		'transport'   => 'refresh'
	));

//Panels

	$wp_customize->add_panel('section_options', array (
		'title' => __('Sections options', 'businessplus'),
		'description' => __('Choose a headline for your section.'),
		'priority'   => 10
	));

	$wp_customize->add_panel('home_options', array (
		'title' => __('Home page options', 'businessplus'),
		'priority'   => 10
	));



//Sections

	//section2
	$wp_customize->add_section( 'businessplus_section_2' , array(
		'title'      => __( 'Section 2', 'businessplus' ),
		'panel' => 'section_options',
		'priority'   => 10
	));

	//section3
	$wp_customize->add_section( 'businessplus_section_3' , array(
		'title'      => __( 'Section 3', 'businessplus' ),
		'panel' => 'section_options',
		'priority'   => 10
	));

	//home
	$wp_customize->add_section( 'home_sections' , array(
		'title'      => __( 'Home sections', 'businessplus' ),
		'panel' => 'home_options',
		'priority'   => 10
	));

//Controls

	//section2
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_headline', array(
		'label'        => __( 'Section 2 headline', 'businessplus' ),
		'section'    => 'businessplus_section_2',
		'settings'   => 'section_2_headline'
	)));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_refinement', array(
		'label'        => __( 'Section 2 refinement', 'businessplus' ),
		'section'    => 'businessplus_section_2',
		'settings'   => 'section_2_refinement'
	)));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_text', array(
		'label'        => __( 'Section 2 text', 'businessplus' ),
		'section'    => 'businessplus_section_2',
		'settings'   => 'section_2_text'
	)));

	//section3
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_headline', array(
		'label'        => __( 'Section 3 headline', 'businessplus' ),
		'section'    => 'businessplus_section_3',
		'settings'   => 'section_3_headline'
	)));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_text', array(
		'label'        => __( 'Section 3 refinement', 'businessplus' ),
		'section'    => 'businessplus_section_3',
		'settings'   => 'section_3_refinement'
	)));

	//Home
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_section_1_headline', array(
		'label'        => __( 'Section 1 headline', 'businessplus' ),
		'section'    => 'home_sections',
		'settings'   => 'home_section_1_headline'
	)));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_section_1_refinement', array(
		'label'        => __( 'Section 1 refinement', 'businessplus' ),
		'section'    => 'home_sections',
		'settings'   => 'home_section_1_refinement'
	)));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_button_text', array(
		'label'        => __( 'Post button text', 'businessplus' ),
		'section'    => 'home_sections',
		'settings'   => 'post_button_text'
	)));

}
add_action( 'customize_register', 'businessplus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function businessplus_customize_preview_js() {
	wp_enqueue_script( 'businessplus_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'businessplus_customize_preview_js' );
