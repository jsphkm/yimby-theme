<?php
/**
 * Template Name: News Page
 */
get_header();
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main newspage">
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
      $hero_description = $hero[description];
      ?>
      <div class="wp-block-cover alignfull news-hero" style="
        background-image: url(<?php echo $hero_image_url ?>)
      ">
        <div class="wp-block-cover__inner-container news-hero-inner">
          <p style="text-align: center" class="has-large-font-size">
            <?php echo $hero_header ?>
          </p>
          <p class="hero-description" style="text-align: center">
            <?php echo $hero_description ?>
          </p>
        </div>
      </div>
      <div class="articles-list">
        <ul>
        <?php
        $articles = get_field('articles');
        foreach($articles as $article) {
          $article_publication = $article[publication];
          $article_date = $article[date];
          $article_title = $article[title];
          $article_description = $article[description];
          $article_link = $article[link];
          echo '<li class="article-item">';
            echo '<small class="article-publication">' . $article_publication . '</small>';
            echo '<div class="article-date">' . $article_date . '</div>';
            echo '<a class="article-link" target="_blank" href=' . $article_link . ' rel="noopener noreferrer">';
              echo '<h3 class="article-title">' . $article_title . '</h3>';
            echo '</a>';
            echo $article_description;
            // echo '<a class="article-link" target="_blank" href=' . $article_link . ' rel="noopener noreferrer">Read Article</a>';
          echo '</li>';
        }
        ?>
        </ul>
      </div>
    </main>
  </div>
  <?php
  get_sidebar();
  get_footer();