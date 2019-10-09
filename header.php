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

		<nav id="site-navigation" class="main-navigation">
			<div id="hamburger">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<div id="topmenu">
				<div class="topmenu-inner">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						) );
					?>
					</div>
			</div>
			<div id="sidemenu">
				<div class="logo-container">
					<a class="custom-logo-link white-logo-link" href="/" rel="home">
						<img class="custom-logo" src="http://155.138.196.218/wp-content/uploads/2019/07/footer-main-logo.png" alt="Yimby" width="240" height="205" />
					</a>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
