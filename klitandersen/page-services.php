<?php
//Template Name: Services
?>


<?php
get_header();



// Definér kontaktlink én gang globalt
$contact_page = get_page_by_title('Contact');
$contact_url  = $contact_page ? get_permalink($contact_page->ID) : '#';
?>


<!-- HERO SECTION -->
<?php
$hero_image = get_field('service_hero_image');
$hero_title = get_field('service_hero_title');
$hero_text  = get_field('service_hero_text');
?>


<section class="service-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="service-hero-overlay">
    <?php if ($hero_title): ?>
      <h1><?php echo wp_kses_post($hero_title); ?></h1>
    <?php endif; ?>
    <?php if ($hero_text): ?>
      <p><?php echo wp_kses_post($hero_text); ?></p>
    <?php endif; ?>
  </div>
</section>

<!-- SERVICE CARDS -->
<section class="service-cards-wrapper">
  <?php for ($i = 1; $i <= 4; $i++) :
    $image   = get_field("service_card_$i");
    $title   = get_field("service_title_$i");
    $button  = get_field("service_button_$i");
    $link    = get_field("service_link_$i"); // Henetr link til se enkel sections! Juubi
    $bg_url  = $image ? esc_url($image['url']) : '';
    $href    = $link ? esc_url($link) : '#';
  ?>
    <a class="service-card" href="<?php echo $href; ?>" style="background-image: url('<?php echo $bg_url; ?>');">
      <?php if ($title): ?>
        <h3 class="service-card-title"><?php echo esc_html($title); ?></h3>
      <?php endif; ?>
      <?php if ($button): ?>
        <img class="service-card-button" src="<?php echo esc_url($button['url']); ?>" alt="Red Button">
      <?php endif; ?>
    </a>
  <?php endfor; ?>
</section>


<div class="service-spacer-1"></div>

<!-- DIGITAL SIGNAGE -->
<?php
$title   = get_field('digital_service_title');
$text    = get_field('digital_service_text');
$btn_txt = get_field('digital_service_button_text');
$img1    = get_field('digital_service_image_1');
$img2    = get_field('digital_service_image_2');
?>

<section id="digital-signage" class="digital-service-section">
  <div class="digital-service-wrapper">
    <div class="digital-service-textarea">
      <?php if ($title): ?>
        <h2><?php echo wp_kses_post($title); ?></h2>
      <?php endif; ?>
      <?php if ($text): ?>
        <p><?php echo wp_kses_post($text); ?></p>
      <?php endif; ?>
      <?php if ($btn_txt): ?>
        <a href="<?php echo esc_url($contact_url); ?>" class="red-button">
          <?php echo esc_html($btn_txt); ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="digital-service-images">
      <?php if ($img1): ?>
        <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt']); ?>">
      <?php endif; ?>
      <?php if ($img2): ?>
        <img src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt']); ?>">
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- EXTERNAL COMMUNICATION -->
<?php
$external_image   = get_field('external_image');
$external_title   = get_field('external_title');
$external_text    = get_field('external_text');
$external_btn_txt = get_field('external_button_text');
?>

<section id="external-communication" class="external-section">
  <div class="external-image">
    <?php if ($external_image): ?>
      <img src="<?php echo esc_url($external_image['url']); ?>" alt="<?php echo esc_attr($external_image['alt']); ?>">
    <?php endif; ?>
  </div>
  <div class="external-text">
    <?php if ($external_title): ?>
      <h2><?php echo wp_kses_post($external_title); ?></h2>
    <?php endif; ?>
    <?php if ($external_text): ?>
      <p><?php echo wp_kses_post($external_text); ?></p>
    <?php endif; ?>
    <?php if ($external_btn_txt): ?>
      <a href="<?php echo esc_url($contact_url); ?>" class="red-button">
        <?php echo esc_html($external_btn_txt); ?>
      </a>
    <?php endif; ?>
  </div>
</section>


<!-- INTERNAL COMMUNICATION -->
<?php
$internal_title  = get_field('internal_title');
$internal_text   = get_field('internal_text');
$internal_button = get_field('internal_button_text');
$internal_image  = get_field('internal_image');
?>

<section id="internal-communication" class="internal-section">
  <div class="internal-text">
    <?php if ($internal_title): ?>
      <h2><?php echo wp_kses_post($internal_title); ?></h2>
    <?php endif; ?>
    <?php if ($internal_text): ?>
      <p><?php echo wp_kses_post($internal_text); ?></p>
    <?php endif; ?>
    <?php if ($internal_button): ?>
      <a href="<?php echo esc_url($contact_url); ?>" class="red-button">
        <?php echo esc_html($internal_button); ?>
      </a>
    <?php endif; ?>
  </div>
  <div class="internal-image">
    <?php if ($internal_image): ?>
      <img src="<?php echo esc_url($internal_image['url']); ?>" alt="<?php echo esc_attr($internal_image['alt']); ?>">
    <?php endif; ?>
  </div>
</section>


<!-- QUEUEING SYSTEM -->
<?php
$queueing_title   = get_field('queueing_title');
$queueing_text    = get_field('queueing_text');
$queueing_button  = get_field('queueing_cta_button');
$image1           = get_field('queueing_image_1');
$image2           = get_field('queueing_image_2');
?>

<section id="queueing-system" class="queueing-section">
  <div class="queueing-images">
    <?php if ($image1): ?>
      <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
    <?php endif; ?>
    <?php if ($image2): ?>
      <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
    <?php endif; ?>
  </div>
  <div class="queueing-text">
    <?php if ($queueing_title): ?>
      <h2><?php echo wp_kses_post($queueing_title); ?></h2>
    <?php endif; ?>
    <?php if ($queueing_text): ?>
      <p><?php echo wp_kses_post($queueing_text); ?></p>
    <?php endif; ?>

    <?php if ($queueing_button): ?>
      <a href="<?php echo esc_url($contact_url); ?>" class="red-button">
        <?php echo esc_html($queueing_button); ?>
      </a>
    <?php endif; ?>
  </div>
</section>


<div class="service-spacer-2"></div>



<?php get_footer(); ?>
