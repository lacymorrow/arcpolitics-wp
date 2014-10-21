<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package arcpolitics
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site antiscroll-wrap">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'arcpolitics' ); ?></a>
	<header id="masthead" class="site-header navbar navbar-fixed top" role="banner">
		<div class="site-branding">
			<a class="site-home-link" href="/">&nbsp;</a>
			<div class="main-menu-button"><div class="main-menu-toggle menu-toggle"><span class="hamburger"></span><span class="menu-label">MENU</span></div></div>
			<h1 class="site-title sr-only"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description sr-only"><?php bloginfo( 'description' ); ?></h2>
		</div>
		<div class="site-subtitle">
			<ul class="social-links">
				<li><a href="https://www.facebook.com/arcpoliticspage"><span class="fa fa-facebook"></span></a></li>
				<li><a href="https://twitter.com/Arcpolitics"><span class="fa fa-twitter"></span></a></li>
				<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
			</ul>
			<div class="site-logo">
				<a class="site-home-link" href="/">&nbsp;</a>
			</div>
<!-- 			<h1>
				<?php 
					$categories_sub = get_the_category($wp_query->post->ID);
					if (!is_null($categories_sub) && count($categories_sub) > 0) {
						echo $categories_sub[0]->name;
					}
				?>
			</h1> -->
		</div>
		<div class="relative">
			<div class="main-menu">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
	<?php get_sidebar(); ?>

	<div id="content" class="site-content">
