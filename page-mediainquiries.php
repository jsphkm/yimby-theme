<?php
/**
 * Template Name: Media Inquiries Page
 */

get_header();
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main mediainquiriespage">
      <div class="inquiries-container">
        <div class="inquiries-inner">
          <div class="inquiries-header">
          <?php
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
                  case 'inquiries-header':
                    $inquiries_header_array = $innerhtml_array;
                    break;
                }
              }
            }
          ?>
            <?php
            foreach($inquiries_header_array as $inquiries_header) {
              print_r($inquiries_header);
            }
            ?>
          </div>
          <?php echo do_shortcode('[contact-form-7 id="20" title="Media Inquiries Form"]'); ?>
        </div>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();