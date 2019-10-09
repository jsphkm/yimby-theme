<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yimby
 */

?>

	</div><!-- #content -->
	<?php
	$server_reqscheme = $_SERVER[REQUEST_SCHEME];
	$server_host = $_SERVER[HTTP_HOST];
	?>
	<footer id="colophon" class="site-footer">
		<div class="site-columns">
			<div class="left">
				<img src="<?php
					echo $server_reqscheme . '://' . $server_host . '/wp-content/uploads/2019/10/footer-main-logo.png'
				?>"/>
				<div class="social">
					<a href="https://www.facebook.com/YIMBYDemocratsSD/" target="_blank" rel="noopener noreferrer">
						<img src="<?php
							echo $server_reqscheme . '://' . $server_host . '/wp-content/uploads/2019/10/social-facebook.png'
						?>" />
					</a>
					<a href="https://twitter.com/YIMBYDemsSD" target="_blank" rel="noopener noreferrer" >
						<img src="<?php
							echo $server_reqscheme . '://' . $server_host . '/wp-content/uploads/2019/10/social-twitter.png'
						?>" />
					</a>
					<a href="https://www.instagram.com/yimbydemssd/" target="_blank" rel="noopener noreferrer" >
						<img src="<?php
						echo $server_reqscheme . '://' . $server_host . '/wp-content/uploads/2019/10/social-instagram.png'
						?>" />
					</a>
				</div>
			</div>
			<div class="right">
				<h3>
					SUBSCRIBE AND STAY IN THE KNOW:
				</h3>
				<?php
				echo do_shortcode('[contact-form-7 id="178" title="Subscribe Form"]');
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
