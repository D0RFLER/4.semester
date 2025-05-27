<!-- HENTER HEADER -->
<?php get_header(); ?>

<!-- HERO SECTION -->

<?php
$hero_image = get_field('hero_image');
?>

<section class="hero-section" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="hero-text-wrapper">
    <div class="hero-title-box">
      <h1><?php pll_e ("A screen unseen holds<br>no value.") ?></h1>
    </div>
    <div class="hero-subtext-box">
      <p>
        <?php pll_e ("If you want to sell more, communicate better, or strengthen your customer service – you've come to the right place.
        These are just a few examples of the business value you can expect from your digital signage.") ?>
      </p>
      <p>
        Curious about what’s possible?<br>
        Explore our services to see how we turn screens into strategic tools that drive real results.
      </p>
    </div>
  </div>
</section>

<!-- HERO SERVICE SECTION -->

<section class="home-service-section">
  <div class="home-service-header">
    <h2><?php the_field('home_our_service_title'); ?></h2>
  </div>

  <div class="home-service-cards">
    <?php 
    $base_url = get_permalink(get_page_by_path('services')); 

    for ($i = 1; $i <= 4; $i++): 
      $image  = get_field("home_our_service_$i");
      $title  = get_field("home_our_service_title_$i");
      $button = get_field("home_our_service_button_$i");
      $anchor = get_field("home_our_service_link_$i"); 
      $link   = $base_url . $anchor;
    ?>
      <?php if ($image && $anchor): ?>
        <a class="service-card-item" href="<?php echo esc_url($link); ?>" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
          <div class="home-card-overlay">
            <?php if ($title): ?>
              <h3 class="home-card-title"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if ($button): ?>
              <img class="home-card-button" src="<?php echo esc_url($button['url']); ?>" alt="Button">
            <?php endif; ?>
          </div>
        </a>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</section>


<!-- HERO CLIENTS  SECTION -->

<?php
$clients_title = get_field('clients');
?>

<section class="clients-section">
  <div class="clients-wrapper">
    <?php if ($clients_title): ?>
      <h2 class="clients-title"><?php echo esc_html($clients_title); ?></h2>
    <?php endif; ?>

    <div class="clients-logos">
      <?php for ($i = 1; $i <= 6; $i++): ?>
        <?php $logo = get_field("client_logo_$i"); ?>
        <?php if ($logo): ?>
          <div class="client-logo">
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- HERO CASE HIGHLIGHT SECTION -->
<?php
$case_title   = get_field('case_read_title');
$case_image   = get_field('case_read_image');
$case_text    = get_field('case_read_text');
$arrow_text   = get_field('case_read_arrow_text');
$arrow_icon   = get_field('case_read_button');
$case_link    = get_field('case_read_link'); // Tilføj dette felt i ACF som et link-felt
?>

<section class="case-read-section">
  <div class="case-read-wrapper">
    
    <?php if ($case_image): ?>
      <div class="case-read-image">
        <img src="<?php echo esc_url($case_image['url']); ?>" alt="<?php echo esc_attr($case_image['alt']); ?>">
      </div>
    <?php endif; ?>

    <div class="case-read-text">
      <?php if ($case_title): ?>
        <h2><?php echo esc_html($case_title); ?></h2>
      <?php endif; ?>

      <?php if ($case_text): ?>
        <p><?php echo esc_html($case_text); ?></p>
      <?php endif; ?>

      <?php if ($arrow_text && $arrow_icon && $case_link): ?>
        <div class="case-read-link">
          <a href="<?php echo esc_url($case_link); ?>" class="case-read-arrow-text"><?php echo esc_html($arrow_text); ?></a>
          <a href="<?php echo esc_url($case_link); ?>">
            <img class="case-read-arrow-img" src="<?php echo esc_url($arrow_icon['url']); ?>" alt="Read Case">
          </a>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<!-- HOME BUTTON SECTION -->
<section class="home-button-section">
  <div class="home-button-content">
    <?php 
    $button_text = get_field('home_button_text');
    $button_image = get_field('home_button_image');
    $post_link = get_permalink(get_option('page_for_posts'));
    ?>
    <?php if ($button_text && $button_image && $post_link): ?>
      <a href="<?php echo esc_url($post_link); ?>" class="home-button-link">
        <span class="home-button-text"><?php echo esc_html($button_text); ?></span>
        <img class="home-button-image" src="<?php echo esc_url($button_image['url']); ?>" alt="<?php echo esc_attr($button_image['alt']); ?>">
      </a>
    <?php endif; ?>
  </div>
</section>



<!-- HENTER FOOTER -->
<?php get_footer(); ?>