<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package arcpolitics
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar-toggle">Menu</div>
<div class="left-column">
	<div class="main-menu">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'arcpolitics' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>

	<div class="article-menu">
		<h3 class="sidebar-title">Emmy Awards</h3>
		<ul>
			<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
					<li><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></li>
				<?php }
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>

		</ul>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	</div>
</div>
