<?php get_header(); ?>

<?php
//Template Name: About Page
?>

<!-- ___________________________________________________________________________________________________________________________ -->


<!-- HERO SECTION -->
<?php
$hero_image  = get_field('about_hero_image');
$hero_title  = get_field('about_hero_title');
$hero_text   = get_field('about_hero_text');
$hero_button = get_field('hero_button_decor');
?>

<section class="about-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="about-hero-overlay">
    <?php if ($hero_title): ?>
      <h1><?php echo wp_kses_post($hero_title); ?></h1>
    <?php endif; ?>

    <?php if ($hero_text): ?>
      <p><?php echo wp_kses_post($hero_text); ?></p>
    <?php endif; ?>

    <?php if ($hero_button): ?>
      <img src="<?php echo esc_url($hero_button['url']); ?>" alt="Dekorativ knap" class="hero-button-decor">
    <?php endif; ?>
  </div>
</section>

<!-- OUR STORY SECTION -->
<?php
$story_title = get_field('our_story_title');
$story_text  = get_field('our_story_text');
$story_img   = get_field('our_story_image');
?>

<section class="our-story-section">
  <div class="story-container">
    <!-- Venstre side: Titel + Tekst -->
    <div class="story-text">
      <?php if ($story_title): ?>
        <h2><?php echo wp_kses_post($story_title); ?></h2>
      <?php endif; ?>

      <?php if ($story_text): ?>
        <p><?php echo wp_kses_post($story_text); ?></p>
      <?php endif; ?>
    </div>

    <!-- Højre side: Billede -->
    <div class="story-image">
      <?php if ($story_img): ?>
        <img src="<?php echo esc_url($story_img['url']); ?>" alt="<?php echo esc_attr($story_img['alt']); ?>">
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- SPACER -->
<div class="about-spacer-1"></div>

<!-- VALUE CARD SECTION -->
<?php
$value_title = get_field('value_title');
?>

<section class="values-section">
  <div class="values-wrapper">

    <!-- Section Title -->
    <?php if ($value_title): ?>
      <h2 class="section-header"><?php echo esc_html($value_title); ?></h2>
    <?php endif; ?>

    <!-- Value Cards -->
    <div class="value-cards-wrapper">
      <?php for ($i = 1; $i <= 3; $i++): 
        $bg     = get_field("value_card_{$i}");
        $icon   = get_field("value_card_{$i}_icon");
        $title  = get_field("value_card_{$i}_title");
        $text   = get_field("value_card_{$i}_text");
      ?>
        <div class="value-card" style="background-image: url('<?php echo esc_url($bg['url']); ?>');">
          <?php if ($icon): ?>
            <img src="<?php echo esc_url($icon['url']); ?>" alt="Icon" class="value-icon">
          <?php endif; ?>
          <?php if ($title): ?>
            <h3 class="value-title"><?php echo esc_html($title); ?></h3>
          <?php endif; ?>
          <?php if ($text): ?>
            <p class="value-text"><?php echo esc_html($text); ?></p>
          <?php endif; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- SPACER -->
<div class="about-spacer-1"></div>


<!-- GOALS SECTION I ABOUT -->
<?php
$goals_title = get_field('goals_title');
$goals_text  = get_field('goals_text');
$goals_image = get_field('goals_image');
?>

<section class="goals-section">
  <div class="goals-container">

    <!-- Venstre: tekst -->
    <div class="goals-text">
      <?php if ($goals_title): ?>
        <h2><?php echo wp_kses_post($goals_title); ?></h2>
      <?php endif; ?>

      <?php if ($goals_text): ?>
        <p><?php echo wp_kses_post($goals_text); ?></p>
      <?php endif; ?>
    </div>

    <!-- Højre: billede -->
    <div class="goals-image">
      <?php if ($goals_image): ?>
        <img src="<?php echo esc_url($goals_image['url']); ?>" alt="<?php echo esc_attr($goals_image['alt']); ?>">
      <?php endif; ?>
    </div>

  </div>
</section>




<!-- ___________________________________________________________________________________________________________________________ -->
<?php get_footer(); ?>