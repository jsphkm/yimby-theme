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
            <a href="javascript: document.getElementById('board-container').scrollIntoView({ behavior: 'smooth' })">MEET THE YIMBY DEM TEAM</a>
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
      <div id="board-container">
        <div class="wp-block-cover board-hero">
          <?php
          foreach($team_header_array as $team_header) {
            echo $team_header;
          }
          ?>
        </div>
        <!-- <form id="boardbio-form">
          <fieldset>
            <label class="iconview-label" for="iconview" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Iconsview.svg');">
              <input type="radio" id="iconview" name="board-bio" value="iconview" checked="checked" />
            </label>
            <label class="listview-label" for="listview" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Listview.svg');">
              <input type="radio" id="listview" name="board-bio" value="listview" />
            </label>
          </fieldset>
        </form> -->
        <div class="board-list-container">  
          <!-- <select id="board-select" onchange="toggleView()">
            <option selected>Icon View</option>
            <option>List View</option>
          </select> -->
          <button id="expand-btn" onclick="toggleView()">Expand Details</button>
          <?php
          $executive_board = get_field('executive_board');
          ?>
          <!-- <ul class="board-list bio-active"> -->
          <ul class="board-list">
            <?php
            foreach($executive_board as $board_member) {
              echo '<li class="card">';
                echo '<div class="left">';
                  echo '<img src="' . $board_member[image][sizes][thumbnail] . '" />';
                  echo '<div class="left-subtext">';
                    echo '<h3>' . $board_member[name] . '</h3>';
                    echo '<small>' . $board_member[title] . '</small>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="right">';
                  echo '<p>' . $board_member[bio] . '</p>';
                echo '</div>';
              echo '</li>';
            };
            ?>
          </ul>
        </div>
      </div>
    </main>
  </div>
  <script type="text/javascript">
    function toggleView() {
      document.querySelector('.board-list').classList.toggle('bio-active');
      document.querySelector('#expand-btn').classList.toggle('isActive');
    };
    // window.onload = function () {
    //   document.getElementById('board-select').selectedIndex = null;
    // }
  </script>
<?php
get_sidebar();
get_footer();