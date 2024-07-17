<?php

function drreuter_customize_register($wp_customize) {

    $wp_customize->add_section('color_scheme_section', array(
        'title'    => __('Color Scheme', 'drreuter'),
        'priority' => 30,
    ));

    $wp_customize->add_section('license_section', array(
        'title'    => __('License', 'drreuter'),
        'priority' => 50,
    ));

    $wp_customize->add_setting('primary_color', array(
        'default'   => '#710053',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'drreuter'),
        'section'  => 'color_scheme_section',
        'settings' => 'primary_color',
    )));

    $wp_customize->add_setting('lighter_primary_color', array(
        'default'   => '#FFE8ED',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lighter_primary_color', array(
        'label'    => __('Lighter Primary Color', 'drreuter'),
        'section'  => 'color_scheme_section',
        'settings' => 'lighter_primary_color',
    )));

    $wp_customize->add_setting('background_color', array(
        'default'   => '#F7F7F7',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'    => __('Background Color', 'drreuter'),
        'section'  => 'color_scheme_section',
        'settings' => 'background_color',
    )));

    $wp_customize->add_setting('accent_color', array(
        'default'   => '#52525B',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Accent Color', 'drreuter'),
        'section'  => 'color_scheme_section',
        'settings' => 'accent_color',
    )));

    // Spacing section
    $wp_customize->add_section('spacing_section', array(
        'title'    => __('Spacing', 'drreuter'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('container_width', array(
        'default'   => '1000',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('container_width', array(
        'label'    => __('Container Width (in pixels)', 'drreuter'),
        'section'  => 'spacing_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('border_radius', array(
        'default'   => '30',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('border_radius', array(
        'label'    => __('Border Radius (in pixels)', 'drreuter'),
        'section'  => 'spacing_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'step' => 1,
        ),
    ));
}

add_action('customize_register', 'drreuter_customize_register');
