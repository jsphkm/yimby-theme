<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yimby
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yimby' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="spacer"></div>
		
		<div class="site-branding">
			<?php
			if (function_exists( 'the_custom_logo' )) {
				the_custom_logo();
			}
			?>
		</div><!-- .site-branding -->

		</script>
		<nav id="site-navigation" class="main-navigation">
			<div id="hamburger">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<div id="topmenu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					) );
				?>
			</div>
			<div id="sidemenu">
				<div class="logo-container">
					<a class="custom-logo-link white-logo-link" href="/" rel="home">
						<?php
						$server_reqscheme = $_SERVER[REQUEST_SCHEME];
						$server_host = $_SERVER[HTTP_HOST];
						?>
						<img class="custom-logo" src="<?php
						echo $server_reqscheme . '://' . $server_host . '/wp-content/uploads/2019/10/footer-main-logo.png'
						?>" alt="Yimby" width="240" height="205" />
					</a>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
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
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
