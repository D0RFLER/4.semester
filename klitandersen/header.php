<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="main-header" class="site-header">
  <div class="container">
    <div class="header-inner">
      
      <!-- Logo -->
      <div class="logo">
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Klit-Andersen-Logo-White.svg" alt="Logo">
        </a>
      </div>

      <!-- MENU + SPROG PICKER WRAPPER -->
      <div class="menu-language-group">
        <?php
        wp_nav_menu([
          'theme_location' => 'main-menu',
          'menu_class' => 'main-menu',
          'container' => false
        ]);
        ?>

        <div class="language-switcher">
          <button class="lang-toggle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/globe-icon.png" alt="Language icon">
          </button>
          <div class="lang-dropdown">
            <?php pll_the_languages([
              'dropdown' => 0,
              'show_flags' => 0,
              'show_names' => 1
            ]); ?>
          </div>
        </div>
      </div> <!-- /.menu-language-group -->

    </div> <!-- /.header-inner -->
  </div>
</header>


