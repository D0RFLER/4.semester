<?php get_header(); ?>

<?php
$hero_image = get_field('case_hero_image');
$text1      = get_field('case_text_1');
$text2      = get_field('case_text_2');
$text3      = get_field('case_text_3');
$main_img   = get_field('case_image');
$back_icon  = get_field('back_arrow');
$back_text  = get_field('back_arrow_text');

// Link tilbage til siden "Cases"
$back_page = get_page_by_path('cases');
$back_url  = $back_page ? get_permalink($back_page->ID) : home_url();
?>

<!-- HERO SECTION -->
<section class="case-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="case-hero-overlay">
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<!-- CASE CONTENT SECTION -->
<section class="case-content">
  <?php if ($text1): ?>
    <p class="case-text"><?php echo wp_kses_post($text1); ?></p>
  <?php endif; ?>

  <?php if ($text2 || $main_img): ?>
    <div class="case-text-image">
      <?php if ($text2): ?>
        <p class="case-text"><?php echo wp_kses_post($text2); ?></p>
      <?php endif; ?>

      <?php if ($main_img): ?>
        <div class="case-main-image">
          <img src="<?php echo esc_url($main_img['url']); ?>" alt="<?php echo esc_attr($main_img['alt']); ?>">
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ($text3): ?>
    <p class="case-text"><?php echo wp_kses_post($text3); ?></p>
  <?php endif; ?>
</section>

<!-- BACK LINK SECTION -->
<?php if ($back_icon || $back_text): ?>
  <section class="case-back-link">
    <a href="<?php echo esc_url($back_url); ?>" class="back-arrow-link">
      <?php if ($back_icon): ?>
        <img class="back-icon" src="<?php echo esc_url($back_icon['url']); ?>" alt="Back icon">
      <?php endif; ?>
      <?php if ($back_text): ?>
        <span class="back-text"><?php echo esc_html($back_text); ?></span>
      <?php endif; ?>
    </a>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
