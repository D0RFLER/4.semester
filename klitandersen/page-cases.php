<?php
//Template Name: Cases Page
?>

<?php get_header(); ?>


<!-- Hero Section deluxe -->
<?php
$hero_image = get_field('caseswork_hero_image');
$hero_title = get_field('work_title');
$hero_text = get_field('work_text');
?>

<section class="work-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="work-hero-content">
    <h1><?php echo esc_html($hero_title); ?></h1>
    <div class="work-hero-textbox">
      <?php if ($hero_text): ?>
        <p><?php echo esc_html($hero_text); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Work Cards -->
<section class="cards-wrapper">
  <?php
  $args = array(
    'post_type' => 'case',
    'posts_per_page' => -1
  );
  $query = new WP_Query($args);

  if ($query->have_posts()):
    while ($query->have_posts()): $query->the_post();

      $image = get_field('case_image');
      $text = get_field('case_text');
      $icon = get_field('case_icon');
      $link = get_field('card_link');

      $link_url = $link ? get_permalink($link->ID) : '#';
  ?>

      <a href="<?php echo esc_url($link_url); ?>" class="card">
        <?php if ($image): ?>
          <div class="card-image">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          </div>
        <?php endif; ?>

        <div class="card-content">
          <div class="card-title"><?php the_title(); ?></div>
          <?php if ($text): ?>
            <div class="card-text"><?php echo esc_html($text); ?></div>
          <?php endif; ?>
        </div>

        <?php if ($icon): ?>
          <div class="card-icon">
            <img src="<?php echo esc_url($icon['url']); ?>" alt="Ikon" />
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

<?php get_footer(); ?>

