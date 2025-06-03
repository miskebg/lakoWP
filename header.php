<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<title><?php wp_title('|', true, 'right'); ?></title>
</head>
<body <?php body_class(); ?>>

<?php if (get_theme_mod('moj_tema_topbar_enabled', true)) : ?>
<div class="top-bar">
    <div class="top-bar-inner">
        <div class="top-left">
            <?php if ($address = get_theme_mod('moj_tema_topbar_address')) : ?>
                <span class="top-item"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($address); ?></span>
            <?php endif; ?>
            <?php if ($phone = get_theme_mod('moj_tema_topbar_phone')) : ?>
                <span class="top-item"><i class="fas fa-phone"></i> <?php echo esc_html($phone); ?></span>
            <?php endif; ?>
            <?php if ($email = get_theme_mod('moj_tema_topbar_email')) : ?>
                <span class="top-item"><i class="fas fa-envelope"></i> <?php echo esc_html($email); ?></span>
            <?php endif; ?>
            <?php if ($hours = get_theme_mod('moj_tema_topbar_hours')) : ?>
                <span class="top-item"><i class="fas fa-clock"></i> <?php echo esc_html($hours); ?></span>
            <?php endif; ?>
        </div>
        <div class="top-right">
            <?php if ($fb = get_theme_mod('moj_tema_topbar_facebook')) : ?>
                <a href="<?php echo esc_url($fb); ?>" target="_blank" class="top-icon"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if ($ig = get_theme_mod('moj_tema_topbar_instagram')) : ?>
                <a href="<?php echo esc_url($ig); ?>" target="_blank" class="top-icon"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if ($yt = get_theme_mod('moj_tema_topbar_youtube')) : ?>
                <a href="<?php echo esc_url($yt); ?>" target="_blank" class="top-icon"><i class="fab fa-youtube"></i></a>
            <?php endif; ?>
            <?php if ($tt = get_theme_mod('moj_tema_topbar_tiktok')) : ?>
                <a href="<?php echo esc_url($tt); ?>" target="_blank" class="top-icon"><i class="fab fa-tiktok"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>




<header style="background-color: <?php echo get_theme_mod('moj_tema_header_color', '#f36d28'); ?>;">
  <?php 
  if (function_exists('the_custom_logo') && has_custom_logo()) {
      the_custom_logo();
  } else {
      echo '<h1>' . get_bloginfo('name') . '</h1>';
  }
  ?>
  <?php
  wp_nav_menu(array(
      'theme_location' => 'primary',
      'menu_class' => 'glavni-meni',
  ));
  ?>
  
  

</header>


