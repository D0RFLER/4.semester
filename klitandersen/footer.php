
<footer class="site-footer">
  <?php
  // Find siden med titlen 'Footer' og hent ID
  $footer_page = get_page_by_title('Footer');
  $footer_id = $footer_page ? $footer_page->ID : null;

  // Funktion til at generere link til en sektion
  function render_footer_section_link($field_name, $footer_id) {
    $relative_anchor = get_field($field_name, $footer_id);
    if ($relative_anchor) {
      $url = esc_url(home_url('/services/' . ltrim($relative_anchor, '/')));
      $label = ucfirst(str_replace(['-', '_'], ' ', trim($relative_anchor, '#/')));
      echo '<p class="text-small"><a class="footer-link" href="' . $url . '">' . esc_html($label) . '</a></p>';
    }
  }
  ?>

  <script>
    window.addEventListener('scroll', function () {
      const header = document.getElementById('main-header');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  </script>

  <div class="footer-content">
    <!-- Logo + CVR/Copyright -->
    <div class="footer-logo">
      <?php
      $footer_logo = get_field('footer_logo', $footer_id);
      if ($footer_logo) {
        echo '<img src="' . esc_url($footer_logo['url']) . '" alt="' . esc_attr($footer_logo['alt']) . '">';
      }
      ?>
      <p class="text-small"><strong>CVR:</strong> <?php the_field('footer_cvr', $footer_id); ?></p>
      <p class="text-small copyright-text"><?php the_field('footer_copyright', $footer_id); ?></p>
    </div>

    <!-- Spacer -->
    <div class="footer-spacer"></div>

    <!-- Tekstkolonner -->
    <div class="footer-columns">

      <!-- Kolonne: Services -->
      <div class="footer-column">
        <h4 class="text-medium"><?php the_field('footer_services_title', $footer_id); ?></h4>

        <?php
        // Hardkodede sektion-links med anchors
        echo '<p class="text-small"><a class="footer-link" href="/services/#digital-signage">Digital signage</a></p>';
        echo '<p class="text-small"><a class="footer-link" href="/services/#external-communication">External communication</a></p>';
        echo '<p class="text-small"><a class="footer-link" href="/services/#internal-communication">Internal communication</a></p>';
        echo '<p class="text-small"><a class="footer-link" href="/services/#queueing-system">Queueing system</a></p>';
        ?>

        <!-- INDSÆTTER "Information"-titel -->
        <h4 class="text-medium">Information</h4>

        <?php
        // Dynamiske links: About, Blog, Cases
        for ($i = 1; $i <= 3; $i++) {
          $link = get_field("footer_service_{$i}_page", $footer_id);
          if ($link):
            $url = esc_url($link['url']);
            $title = esc_html($link['title']);
            $target = esc_attr($link['target']);
            echo '<p class="text-small"><a class="footer-link" href="' . $url . '" target="' . $target . '">' . $title . '</a></p>';
          endif;
        }
        ?>
      </div>

      <!-- Kolonne: Kontakt -->
      <div class="footer-column">
        <h4 class="text-medium"><?php the_field('footer_contact_title', $footer_id); ?></h4>
        <p class="text-small"><?php the_field('footer_phone', $footer_id); ?></p>
        <p class="text-small"><?php the_field('footer_email', $footer_id); ?></p>

        <h4 class="text-medium"><?php the_field('footer_address_title', $footer_id); ?></h4>
        <p class="text-small"><?php the_field('footer_address', $footer_id); ?></p>

        <h4 class="text-medium"><?php the_field('footer_social_title', $footer_id); ?></h4>
        <div class="footer-social-icons">
          <?php
          $linkedin_link = get_field('footer_linkedin_link', $footer_id);
          $linkedin_icon = get_field('footer_linkedin_icon', $footer_id);
          if ($linkedin_link && $linkedin_icon) :
          ?>
            <a href="<?php echo esc_url($linkedin_link); ?>" target="_blank" rel="noopener">
              <img src="<?php echo esc_url($linkedin_icon['url']); ?>" alt="LinkedIn" />
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
