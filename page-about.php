<?php
/**
 * Template Name: About Page
 */
get_header();
?>

  <div id="primary" class="content-area">
		<main id="main" class="site-main aboutpage">
      <?php
        $hero_image = get_field('hero_image');
        $hero_image_url = $hero_image[url];

        $hero_array;
        $corevalues_header_array;
        $corevalues_list_array;
        $team_header_array;
        $inquiries_header_array;

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
              case 'hero-text':
                $hero_array = $innerhtml_array;
                break;
              case 'corevalues-header':
                $corevalues_header_array = $innerhtml_array;
                break;
              case 'corevalues-list':
                $corevalues_list_array = $innerhtml_array;
                break;
              case 'team-header':
                $team_header_array = $innerhtml_array;
                break;
              case 'inquiries-header':
                $inquiries_header_array = $innerhtml_array;
                break;
            }
          }
        }
      ?>
      <div class="wp-block-cover hero-image" style="
        background-image: url(<?php echo $hero_image_url ?>);
        "
      ></div>
      <div class="hero-description-container">
        <div class="hero-description-inner-container">
          <div class="hero-description">
            <?php
            foreach($hero_array as $hero_each) {
              echo $hero_each;
            };
            ?>
          </div>
        </div>
      </div>
      <div class="corevalues">
        <div class="corevalues-header">
          <?php
          foreach($corevalues_header_array as $corevalues_header) {
            echo $corevalues_header;
          }
          ?>
        </div>
        <div class="corevalues-list">
          <?php
            foreach($corevalues_list_array as $corevalues_list) {
              echo $corevalues_list;
            }
          ?>
        </div>
      </div>
      <div class="board-container">
        <div class="wp-block-cover about-team">
          <?php
          foreach($team_header_array as $team_header) {
            echo $team_header;
          }
          ?>
        </div>
        <div class="board-list-container">  
          <?php
          $executive_board = get_field('executive_board');
          ?>
          <ul class="board-list">
            <?php
            foreach($executive_board as $board_member) {
              echo '<li class="card">';
              echo '<img src="' . $board_member[image][sizes][thumbnail] . '" />';
              echo '<h3>' . $board_member[name] . '</h3>';
              echo '<small>' . $board_member[title] . '</small>';
              echo '</li>';
            };
            ?>
          </ul>
        </div>
      </div>
      <div class="inquiries-container">
        <div class="inquiries-inner">
          <div class="inquiries-header">
            <?php
            foreach($inquiries_header_array as $inquiries_header) {
              print_r($inquiries_header);
            }
            ?>
          </div>
          <?php echo do_shortcode('[contact-form-7 id="102" title="Media Inquiries Form"]'); ?>
        </div>
      </div>
    </main>
  </div>
<?php
get_sidebar();
get_footer();