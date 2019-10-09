<?php
/**
 * Template Name: Endorsements Page
 */
get_header();
?>

  <div id="primary" class="content-area">
		<main id="main" class="site-main endorsementspage">
      <?php
        $endorsements_header_array;

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
              case 'endorsements-header':
                $endorsements_header_array = $innerhtml_array;
                break;
            }
          }
        }
      ?>
      <div class="endorsements-header-container">
        <div class="endorsements-header-inner">
          <?php
          foreach($endorsements_header_array as $endorsements_header) {
            print_r($endorsements_header);
          }
          ?>
        </div>
      </div>
      <div class="endorsements-list">
        <ul>
        <?php
        $endorsement_list = get_field('endorsements');
        foreach($endorsement_list as $endorsement_each) {
          $endorsement_url = $endorsement_each[image][url];
          echo '<li>';
            echo '<div class="right">';
              echo '<img src=' . $endorsement_url . ' />';
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