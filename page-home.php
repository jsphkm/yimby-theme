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

				$post = get_post();

				if (has_blocks($post->post_content )) {
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
						}
					}
				}
			?>
			<div class="wp-block-cover alignfull hero" style="
				background-image: url(<?php echo $hero_image_url ?>);
				"
			>
				<div class="wp-block-cover__inner-container hero-description">
					<?php
						foreach($hero_array as $hero_each) {
							echo $hero_each;
						};
					?>
				</div>
			</div>
			<?php
				$engagement_links = get_field('engagement_links');
			?>
			<div class="engagementlinks-container">
				<ul>
				<?php
				$links = [
					"home-subscribe" => "javascript: document.body.scrollIntoView({ behavior: 'smooth', block: 'end' })",
					"home-attend" => "/calendar",
					"home-member" => "https://secure.actblue.com/donate/yimbydems",
				];
				foreach($engagement_links as $engagement_link) {
					$each_title = $engagement_link[image][title];
					echo '<li>';
						echo '<a href="' . $links[$each_title] . '" >';
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
			<!-- Facebook script -->
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=2473156899395443&autoLogAppEvents=1"></script>
			<div class="fbendorsement-container">
				<div class="left">
					<!-- Facebook embed -->
					<div class="fb-page" data-href="https://www.facebook.com/YIMBYDemocratsSD/?epa=SEARCH_BOX" data-tabs="timeline" data-width="500" data-height="900" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/YIMBYDemocratsSD/?epa=SEARCH_BOX" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/YIMBYDemocratsSD/?epa=SEARCH_BOX">YIMBY Democrats of San Diego County</a></blockquote></div>
				</div>
				<div class="right">
					<?php
						$endorsements = get_field('endorsements');
						$endorsements_image = $endorsements[image];
						$endorsements_title = $endorsements[title];
						$endorsements_description = $endorsements[description];
						echo '<img src="' . $endorsements_image . '" />';
						echo '<h2>' . $endorsements[title] . '</h2>';
						echo '<p>' . $endorsements_description . '</p>';
						echo '<a class="endorsements-link" href="/endorsements">OUR ENDORSEMENTS</a>'
					?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
