<?php
/**
 * Template Name: News Page
 */
get_header();
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php
      $hero_array;

      $post = get_post();
      if ( has_blocks($post->post_content )) {
        $blocks = parse_blocks( $post->post_content );
        foreach($blocks as $block) {
          $innerhtml_array = [];
          if ($block[blockName] === 'core/group') {
            foreach($block[innerBlocks] as $innerBlock) {
              if (count($innerBlock[innerHTML]) > 0) {
                array_push($innerhtml_array, $innerBlock[innerHTML]);
              }
            }
          } else {
            $innerhtml_array = [];
            render_block($block);
          }
          switch ($block[attrs][className]) {
            case 'hero':
              $hero_array = $innerhtml_array;
              break;
          }
        }
      }
    ?>
    <?php
    $hero = get_field('hero');
    $hero_image_url = $hero[image][url];
    $hero_header = $hero[header];
    ?>
    <div class="wp-block-cover alignfull news-hero" style="
      background-image: url(<?php echo $hero_image_url ?>)
    ">
      <div class="wp-block-cover__inner-container">
        <p style="text-align: center" class="has-large-font-size">
          <?php echo $hero_header ?>
        </p>
      </div>
    </div>
    <?php
    $args = array(
      'categories' => '3'
    );
    $tags = get_category_tags($args);
    ?>
    <div class="news-list">
      <?php
      $args = array(
        'category_name' => 'news',
        'post_type' => 'post',
        'post_status' => 'publish',
      );

      $posts_array = get_posts( $args );

      echo '<ul>';
      foreach( $posts_array as $post) {
        $post_permalink = get_post_permalink($post -> ID);
        $post_image = get_the_post_thumbnail_url($post -> ID);
        $post_title = $post -> post_title;
        $post_date = mysql2date('M d, Y', $post -> post_date);
        $post_content = $post -> post_excerpt ? $post -> post_excerpt : $post -> post_content;
        
        echo '<li>';
          echo '<div class="left">';
            echo '<div class="thumbnail" style="
              background-image: url(' . $post_image . ');
              background-size: cover;
              background-position: center;
            ">';
            echo '</div>';
          echo '</div>';
          echo '<div class="right">';
            echo '<div class="post-date">' . $post_date . '</div>';
            echo '<a href="' . $post_permalink . '" />';
              echo '<h2>' . $post_title . '</h2>';
            echo '</a>';
            echo '<div class="post-content">' . $post_content . '</div>';
          echo '</div>';
        echo '</li>';
      }
      echo '</ul>';
      ?>
    </div>
    </main>
  </div>
  <?php
  get_sidebar();
  get_footer();