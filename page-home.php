<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main homepage">
			<?php
				$hero_image = get_field('hero_image');
				$hero_image_url = $hero_image[url];
				
				$hero_array;
				$advocate_array;
				$facebook_array;

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
							case 'advocate-text':
								$advocate_array = $innerhtml_array;
								break;
							case 'facebook-embed';
								$facebook_array = $innerhtml_array;
						}
					}
				}
			?>
			<div class="wp-block-cover alignfull hero" style="
				background-image: url(<?php echo $hero_image_url ?>);
				"
			>
				<div class="wp-block-cover__inner-container hero-description">
					<!-- <p class="has-large-font-size" style="text-align: center"> -->
						<?php
							foreach($hero_array as $hero_each) {
								echo $hero_each;
							};
						?>
					<!-- </p> -->
				</div>
			</div>
			<?php
				$engagement_links = get_field('engagement_links');
			?>
			<div class="engagementlinks-container">
				<ul>
				<?php
				foreach($engagement_links as $engagement_link) {
					echo '<li>';
						echo '<a href="">';
							echo '<img src="' . $engagement_link[image][sizes][thumbnail] . '" />';
							echo '<div class="divider"></div>';
							echo '<h3>' . $engagement_link[text] . '</h3>';
						echo '</a>';
					echo '</li>';
				}
				?>
				</ul>
			</div>
			<?php
				$advocate_image = get_field('advocate_image');
				$advocate_image_url = $advocate_image[url];
			?>
			<div class="advocate-container">
				<div class="advocate-columns">
					<div class="left">
						<div class="wp-block-cover advocate-image" style="
							background-image: url(<?php echo $advocate_image_url ?>);
						"
						></div>
					</div>
					<div class="right">
						<?php
							foreach($advocate_array as $advocate_each) {
								echo $advocate_each;
							}
						?>
					</div>
				</div>
			</div>
			<?php
				$definition_columns = get_field('yimby_definition');
				$definition_left = $definition_columns[left];
				$definition_right = $definition_columns[right];
			?>
			<div class="definition-container">
				<div class="definition-columns">
					<div class="left">
						<?php echo $definition_left ?>
					</div>
					<div class="right">
						<?php echo $definition_right ?>
					</div>
				</div>
			</div>
			<?php
				print_r($facebook_array);
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
