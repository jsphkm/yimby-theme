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

	<footer id="colophon" class="site-footer">
		<div class="site-columns">
			<div class="left">
				<img src="http://155.138.196.218/wp-content/uploads/2019/07/footer-main-logo.png" />
				<div class="social">
					<a href="https://www.google.com">
						<img src="http://155.138.196.218/wp-content/uploads/2019/07/social-facebook.png">
					</a>
					<a href="https://www.google.com">
						<img src="http://155.138.196.218/wp-content/uploads/2019/07/social-twitter.png">
					</a>
					<a href="https://www.google.com">
						<img src="http://155.138.196.218/wp-content/uploads/2019/07/social-instagram.png">
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
