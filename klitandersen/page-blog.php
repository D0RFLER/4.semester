<!-- HENTER HEADER -->
<?php get_header(); ?>

<?php
//Template Name: Blog Page
?>


<!-- BLOG HERO SECTION -->
<?php
$hero_image = get_field('blog_hero_image');
$hero_title = get_field('blog_hero_title_blog');
$hero_text = get_field('blog_hero_text');
?>

<section class="blog-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="blog-hero-content">
    <h1><?php echo esc_html($hero_title); ?></h1>
    <div class="blog-hero-textbox">
      <?php if ($hero_text): ?>
        <p><?php echo esc_html($hero_text); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- BLOG CARDS -->
<section class="cards-wrapper">
  <?php
  $cards = new WP_Query([
    'post_type' => 'blog_card',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
  ]);

  if ($cards->have_posts()) :
    while ($cards->have_posts()) : $cards->the_post();

      $image = get_field('card_image');
      $title = get_field('card_title');
      $text  = get_field('card_text');
      $icon  = get_field('card_icon');
      $link  = get_field('card_link'); // ACF Post Object
      $link_url = $link ? get_permalink($link->ID) : '#';
  ?>
      <a href="<?php echo esc_url($link_url); ?>" class="card">
        <div class="card-image">
          <?php if ($image): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
          <?php endif; ?>
        </div>
        <div class="card-content">
          <h2 class="card-title"><?php the_title(); ?></h2>
          <?php if ($text): ?>
            <p class="card-text"><?php echo esc_html($text); ?></p>
          <?php endif; ?>
        </div>
        <?php if ($icon): ?>
          <div class="card-icon">
            <img src="<?php echo esc_url($icon['url']); ?>" alt="Dekorativ ikon">
          </div>
        <?php endif; ?>
      </a>
  <?php
    endwhile;
    wp_reset_postdata();
  endif;
  ?>
</section>


<!-- Spacer -->
<div class="contact-spacer-3"></div>

<!-- HENTER FOOTER -->
<?php get_footer(); ?>
