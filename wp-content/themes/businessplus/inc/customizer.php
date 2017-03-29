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

	/**
	 * PANELS
	 **/
	$wp_customize->add_panel( 'home_page_options', array(
		'title'    => __( 'Home page options', 'businessplus' ),
		'priority' => 10
	) );
	/**
	 * SECTIONS
	 **/
//Front section2
	$wp_customize->add_section( 'section_2', array(
		'title'    => __( 'Section 2', 'businessplus' ),
		'panel'    => 'home_page_options',
		'priority' => 10
	) );


	$wp_customize->add_setting( 'section_2_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_headline', array(
		'label'    => __( 'Section headline', 'businessplus' ),
		'section'  => 'section_2',
		'settings' => 'section_2_headline'
	) ) );


	$wp_customize->add_setting( 'section_2_refinement', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_refinement', array(
		'label'    => __( 'Section refinement', 'businessplus' ),
		'section'  => 'section_2',
		'settings' => 'section_2_refinement'
	) ) );


	$wp_customize->add_setting( 'section_2_text', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_text', array(
		'label'    => __( 'Section text', 'businessplus' ),
		'section'  => 'section_2',
		'settings' => 'section_2_text'
	) ) );


	$wp_customize->add_setting( 'section_2_button_link', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_button_link', array(
				'label'    => __( 'Button link', 'businessplus' ),
				'section'  => 'section_2',
				'settings' => 'section_2_button_link',
				'type'     => 'radio',
				'choices'  => array(
//					'about us' => 'About Us',
//					'services' => 'Services',
//					'news' => 'News',
//					'blog' => 'Blog',
//					'pages' => 'Pages',
//					'contact us' => 'Contact Us',
					'About Us'
				) ) ) );
	$wp_customize->add_setting( 'section_2_custom_button_link', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_custom_button_link', array(
		'label'    => __( 'Custom link', 'businessplus' ),
		'section'  => 'section_2',
		'settings' => 'section_2_custom_button_link'
	) ) );
	$wp_customize->add_setting( 'section_2_button_text', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_button_text', array(
		'label'    => __( 'Button text', 'businessplus' ),
		'section'  => 'section_2',
		'settings' => 'section_2_button_text'
	) ) );
	
////Front section3
	$wp_customize->add_section( 'section_3', array(
		'title'    => __( 'Section 3', 'businessplus' ),
		'panel'    => 'home_page_options',
		'priority' => 20
	) );


	$wp_customize->add_setting( 'section_3_button_link', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_button_link', array(
		'label'    => __( 'Button link', 'businessplus' ),
		'section'  => 'section_3',
		'settings' => 'section_3_button_link',
		'type'     => 'radio',
		'choices'  => array(
			'about us' => 'About Us',
			'services' => 'Services',
			'news' => 'News',
			'blog' => 'Blog',
			'pages' => 'Pages',
			'contact us' => 'Contact Us',
		) ) ) );
	$wp_customize->add_setting( 'section_3_custom_button_link', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_custom_button_link', array(
		'label'    => __( 'Custom link', 'businessplus' ),
		'section'  => 'section_3',
		'settings' => 'section_3_custom_button_link'
	) ) );
	$wp_customize->add_setting( 'section_3_button_text', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_button_text', array(
		'label'    => __( 'Button text', 'businessplus' ),
		'section'  => 'section_3',
		'settings' => 'section_3_button_text'
	) ) );

	//Front section4
	$wp_customize->add_section( 'section_4', array(
		'title'    => __( 'Section 4', 'businessplus' ),
		'panel'    => 'home_page_options',
		'priority' => 30
	) );


	$wp_customize->add_setting( 'section_4_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_headline', array(
		'label'    => __( 'Section headline', 'businessplus' ),
		'section'  => 'section_4',
		'settings' => 'section_4_headline'
	) ) );


	$wp_customize->add_setting( 'section_4_refinement', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_refinement', array(
		'label'    => __( 'Section refinement', 'businessplus' ),
		'section'  => 'section_4',
		'settings' => 'section_4_refinement'
	) ) );


//home
	$wp_customize->add_section( 'home_sections', array(
		'title'    => __( 'Home sections', 'businessplus' ),
		'panel'    => 'home_options',
		'priority' => 8
	) );

// Settings


}

add_action( 'customize_register', 'businessplus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function businessplus_customize_preview_js() {
	wp_enqueue_script( 'businessplus_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'businessplus_customize_preview_js' );
