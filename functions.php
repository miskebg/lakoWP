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
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'moja_tema_enqueue_scripts');

function moj_tema_customize_register($wp_customize) {
    // Sekcija za Header
    $wp_customize->add_section('moj_tema_header_section', array(
        'title'    => __('Podešavanja zaglavlja', 'moj_tema'),
        'priority' => 30,
    ));
    
    // Sekcija za širinu sadržaja
    $wp_customize->add_section('moj_tema_layout_section', array(
        'title'    => __('Podešavanje širine sajta', 'moj_tema'),
        'priority' => 35,
    ));

    // Postavka za širinu
    $wp_customize->add_setting('moj_tema_content_width', array(
        'default'           => '1100px',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    // Kontrola za širinu
    $wp_customize->add_control('moj_tema_content_width_control', array(
        'label'       => __('Maksimalna širina sadržaja (npr. 1100px ili 90%)', 'moj_tema'),
        'section'     => 'moj_tema_layout_section',
        'settings'    => 'moj_tema_content_width',
        'type'        => 'text',
    ));

    // Opcija za boju headera
    $wp_customize->add_setting('moj_tema_header_color', array(
        'default'   => '#f36d28',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
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
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('moj_tema_topbar_enabled_control', array(
        'label'    => __('Prikaži Top Bar', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_enabled',
        'type'     => 'checkbox',
    ));

    // Boja pozadine Top Bara
    $wp_customize->add_setting('moj_tema_topbar_bg_color', array(
        'default'   => '#f36d28',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'moj_tema_topbar_bg_color_control', array(
        'label'    => __('Boja pozadine Top Bara', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_bg_color',
    )));

    // Boja fonta u Top Baru
    $wp_customize->add_setting('moj_tema_topbar_font_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'moj_tema_topbar_font_color_control', array(
        'label'    => __('Boja fonta u Top Baru', 'moj_tema'),
        'section'  => 'moj_tema_topbar_section',
        'settings' => 'moj_tema_topbar_font_color',
    )));

    // Polja za Top Bar informacije:
    $fields = [
        'address'   => __('Adresa', 'moj_tema'),
        'phone'     => __('Telefon', 'moj_tema'),
        'email'     => __('Email', 'moj_tema'),
        'hours'     => __('Radno vreme', 'moj_tema'),
        'facebook'  => __('Facebook URL', 'moj_tema'),
        'instagram' => __('Instagram URL', 'moj_tema'),
        'youtube'   => __('YouTube URL', 'moj_tema'),
        'tiktok'    => __('TikTok URL', 'moj_tema'),
    ];

    foreach ($fields as $key => $label) {
        $sanitize_cb = in_array($key, ['email']) ? 'sanitize_email' : (in_array($key, ['facebook', 'instagram', 'youtube', 'tiktok']) ? 'esc_url_raw' : 'sanitize_text_field');
        $type = in_array($key, ['facebook', 'instagram', 'youtube', 'tiktok']) ? 'url' : (($key === 'email') ? 'email' : 'text');

        $wp_customize->add_setting("moj_tema_topbar_{$key}", array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => $sanitize_cb,
        ));
        $wp_customize->add_control("moj_tema_topbar_{$key}_control", array(
            'label'    => $label,
            'section'  => 'moj_tema_topbar_section',
            'settings' => "moj_tema_topbar_{$key}",
            'type'     => $type,
        ));
    }
}
add_action('customize_register', 'moj_tema_customize_register');
