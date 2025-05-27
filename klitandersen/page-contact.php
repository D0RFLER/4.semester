<!-- Henter header juubi -->
<?php get_header(); ?>

<?php
//Template Name: Contact
?>


<!-- HERO SECTION -->
<?php
$hero_image = get_field('contact_hero_image');
$hero_title = get_field('contact_hero_title');
?>

<section class="contact-hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
  <div class="contact-hero-overlay">
    <h1><?php echo wp_kses_post($hero_title); ?></h1> <!-- Den tillader <br> i min back-end således at jeg kan få det ønksede tekst break! Mega fe' -->
  </div>
</section>


<!-- FORMULAR SECTION -->
<section class="contact-wrapper">

<!-- FREMKALDER FORM _ NIKS PILLE -->
  <div class="contact-form">
    <?php echo do_shortcode('[contact-form-7 id="ee5d273" title="Contact Form"]'); ?>
  </div>

<!-- RØD INFO BOKS MED ACF -->
  <div class="contact-info-box">

  <div class="contact-info-inner">

        <!-- Adresse -->
        <h4><?php the_field('address_title'); ?></h4>
        <p><?php the_field('address'); ?></p>

        <!-- Spacer -->
        <div class="contact-spacer-1"></div>

        <!-- Kontaktoplysninger -->
        <h4><?php the_field('contact_title'); ?></h4>
        <p><?php the_field('phone'); ?></p>

        <?php
        $email = get_field('email_link');
          if ($email): ?>
            <p><span class="email-label">Email :</span>
              <a class="email-link" href="mailto:<?php echo esc_attr($email); ?>">
            <?php echo esc_html($email); ?>
           </a>
        </p>
        <?php endif; ?>

      <!-- Spacer -->
      <div class="contact-spacer-2"></div>

      <!-- SoMe -->
      <h4><?php the_field('stay_connected_title'); ?></h4>

      <?php
        $linkedin_icon = get_field('linkedin_contact_icon');
        $linkedin_url = get_field('linkedin_link');
          if ($linkedin_icon && $linkedin_url): ?>

        <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank">
          <img class="linkedin-icon" src="<?php echo esc_url($linkedin_icon['url']); ?>" alt="LinkedIn">
        </a>
      <?php endif; ?>

</div>


  </div>
</section> <!-- CONTACT WRAPPER SLUTTER -  -->

<!-- Spacer -->
<div class="contact-spacer-3"></div>

<!-- MAP SECTION – udenfor wrapper -->
<?php
$map_image = get_field('map_image');
if ($map_image):
?>
  <section class="map-section" style="background-image: url('<?php echo esc_url($map_image['url']); ?>');">
  </section>
<?php endif; ?>

<!-- Henter den der satans footer -->
<?php get_footer(); ?>
