<?php
/**
 * Template Name: Committees Page
 */
get_header();
?>

  <div id="primary" class="content-area">
		<main id="main" class="site-main committeespage">
      <?php
        $committees_header_array;

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
            }
            switch (array_values($block[attrs])[0]) {
              case 'committees-header':
                $committees_header_array = $innerhtml_array;
                break;
            }
          }
        }
      ?>
      <div class="committees-header-container">
        <div class="committees-header-inner">
          <?php
          foreach($committees_header_array as $committees_header) {
            print_r($committees_header);
          }
          ?>
          <a href="mailto:yimbydemssd@gmail.com?Subject=YIMBY%20Committees" target="_top">
            Message YIMBY Dems SD
          </a>
        </div>
      </div>
      <div class="committees-list">
        <ul>
        <?php
        $committees_articles = get_field('committees');
        foreach($committees_articles as $committees_article) {
          $article_title = $committees_article[title];
          $article_description = $committees_article[description];
          echo '<li>';
            echo '<div class="list-inner">';
              echo '<h2>' . $article_title . '</h2>';
              echo '<p>' . $article_description . '</p>';
            echo '</div>';
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