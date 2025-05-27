<?php get_header(); ?>

<?php
//Template Name: 404
?>

<section class="error-404-hero">

  <!-- Tekst und knap her -->
  <div class="error-content">
    <h1 class="error-code">404</h1>
  </div>

        <!-- Illustration -->
        <img class="error-illustration" src="<?php echo get_template_directory_uri(); ?>/assets/images/KLIT-ANDERSEN-404.png" alt="404 Illustration">

  <div class="error-content">
    <p class="error-message">Sorry, page not found! Please return to home below. </p>
    <a class="error-button" href="<?php echo home_url(); ?>">HOME</a>
  </div>

</section>

<?php get_footer(); ?>

