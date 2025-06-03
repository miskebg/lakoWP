<?php
function moja_tema_setup() {
    register_nav_menus(array(
        'primary' => __('Glavni meni', 'moja-tema'),
    ));

    add_theme_support('title-tag');
    add_theme_support('custom-logo');

    register_sidebar(array(
        'name'          => __('Sidebar', 'moja-tema'),
        'id'            => 'sidebar-1',
        'description'   => __('Glavni sidebar', 'moja-tema'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('after_setup_theme', 'moja_tema_setup');

function moja_tema_enqueue_scripts() {
    wp_enqueue_style('moja-tema-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'moja_tema_enqueue_scripts');

function moj_tema_customize_register($wp_customize) {
    // Sekcija za Header
    $wp_customize->add_section('moj_tema_header_section', array(
        'title'    => __('Podešavanja zaglavlja', 'moj_tema'),
        'priority' => 30,
    ));

    // Opcija za boju headera
    $wp_customize->add_setting('moj_tema_header_color', array(
        'default'   => '#f36d28',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'moj_tema_header_color_control', array(
        'label'    => __('Boja zaglavlja', 'moj_tema'),
        'section'  => 'moj_tema_header_section',
        'settings' => 'moj_tema_header_color',
    )));

    // Sekcija za Top Bar
    $wp_customize->add_section('moj_tema_topbar_section', array(
        'title'    => __('Top Bar', 'moj_tema'),
        'priority' => 20,
    ));

    // Uključi/isključi Top Bar
    $wp_customize->add_setting('moj_tema_topbar_enabled', array(
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_enabled_control', array(
        'label'    => __('Prikaži Top Bar', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_enabled',
        'type'     => 'checkbox',
    ));

    // Adresa
    $wp_customize->add_setting('moj_tema_topbar_address', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_address_control', array(
        'label'    => __('Adresa', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_address',
        'type'     => 'text',
    ));

    // Telefon
    $wp_customize->add_setting('moj_tema_topbar_phone', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_phone_control', array(
        'label'    => __('Telefon', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_phone',
        'type'     => 'text',
    ));

    // Email
    $wp_customize->add_setting('moj_tema_topbar_email', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_email_control', array(
        'label'    => __('Email', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_email',
        'type'     => 'text',
    ));

    // Radno vreme
    $wp_customize->add_setting('moj_tema_topbar_hours', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_hours_control', array(
        'label'    => __('Radno vreme', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_hours',
        'type'     => 'text',
    ));

    // Facebook
    $wp_customize->add_setting('moj_tema_topbar_facebook', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_facebook_control', array(
        'label'    => __('Facebook URL', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_facebook',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('moj_tema_topbar_instagram', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_instagram_control', array(
        'label'    => __('Instagram URL', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_instagram',
        'type'     => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('moj_tema_topbar_youtube', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_youtube_control', array(
        'label'    => __('YouTube URL', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_youtube',
        'type'     => 'url',
    ));

    // TikTok
    $wp_customize->add_setting('moj_tema_topbar_tiktok', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('moj_tema_topbar_tiktok_control', array(
        'label'    => __('TikTok URL', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_tiktok',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'moj_tema_customize_register');

function moj_tema_enqueue_scripts() {
    wp_enqueue_style('moj-tema-style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'moj_tema_enqueue_scripts');
