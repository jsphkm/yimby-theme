<?php
/**
 * Template Name: About Page
 */
get_header();
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main calendarpage">
    <?php
      $hero = get_field('hero');
      $hero_image_url = $hero[image][url];
      $hero_text = $hero[text];
    ?>
    <div class="wp-block-cover alignfull hero" style="background-image: url(<?php echo $hero_image_url ?>)">
      <div class="wp-block-cover__inner-container hero-description">
        <p style="text-align: center" class="has-large-font-size">
          <?php echo $hero_text ?>
        </p>
      </div>
    </div>
    <div class="calendar">
      <iframe src="https://calendar.google.com/calendar/b/2/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FNew_York&amp;src=YTZwbzRiZHBxdHYxMTZiMmZrOThwZjFzdjBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23EF6C00&amp;showTitle=1" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>
  </main>
</div>
<?php
get_sidebar();
get_footer();