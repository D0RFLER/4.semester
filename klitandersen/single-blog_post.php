<?php get_header(); ?>


<?php
$hero_image   = get_field('blog_hero_image');
$text1        = get_field('blog_text_1');
$text2        = get_field('blog_text_2');
$text3        = get_field('blog_text_3');
$image1       = get_field('blog_image_1');
$back_icon    = get_field('blog_back_icon');
$back_text    = get_field('blog_back_text');

// Link tilbage til siden "Blog"
$back_page = get_page_by_path('blog');
$back_url  = $back_page ? get_permalink($back_page->ID) : home_url();
?>

<!-- HERO SECTION -->
<section class="ka-blog-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="ka-blog-hero-overlay">
    <div class="ka-blog-hero-inner">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<!-- TEXT 1 -->
<section class="ka-blog-text-section">
  <div class="ka-blog-text-wrapper">
    <?php if ($text1): ?><p><?php echo wp_kses_post($text1); ?></p><?php endif; ?>
  </div>
</section>

<div class="ka-spacer"></div>

<!-- IMAGE 1 + TEXT 2 -->
<section class="ka-blog-content-row">
  <?php if ($image1): ?>
    <div class="ka-blog-row">
      <div class="ka-blog-text">
        <?php if ($text2): ?><p><?php echo wp_kses_post($text2); ?></p><?php endif; ?>
      </div>
      <div class="ka-blog-image">
        <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
      </div>
    </div>
  <?php else: ?>
    <div class="ka-blog-text-wrapper">
      <?php if ($text2): ?><p><?php echo wp_kses_post($text2); ?></p><?php endif; ?>
    </div>
  <?php endif; ?>
</section>


<!-- TEXT 3 -->
<section class="ka-blog-text-section">
  <div class="ka-blog-text-wrapper">
    <?php if ($text3): ?><p><?php echo wp_kses_post($text3); ?></p><?php endif; ?>
  </div>
</section>


<!-- BACK BUTTON SECTION -->
<section class="ka-blog-back-link">
  <div class="ka-blog-back-container">
    <a href="<?php echo esc_url($back_url); ?>" class="ka-back-arrow-link">
      <?php if ($back_icon): ?>
        <img class="ka-back-icon" src="<?php echo esc_url($back_icon['url']); ?>" alt="Back icon">
      <?php endif; ?>
      <?php if ($back_text): ?>
        <span class="ka-back-text"><?php echo esc_html($back_text); ?></span>
      <?php endif; ?>
    </a>
  </div>
</section>

<?php get_footer(); ?>
