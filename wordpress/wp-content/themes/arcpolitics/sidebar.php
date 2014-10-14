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
<div class="sub-menu-toggle">MENU</div>
<div class="left-column sub-menu nicescroll">
	<div class="article-menu">
<!-- 		<h3 class="sidebar-title">
			<?php 
				// $categories = get_the_category($wp_query->post->ID);
				// if (!is_null($categories) && count($categories) > 1) {
				// 	echo $categories[1]->name;
				// }
			?>
		</h3> -->
		<ul>
			<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					if( is_single() && $wp_query->post->ID == $the_query->post->ID ) { ?>
						<li class="active"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></li>
					<?php } else { ?>
						<li><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></li>
					<?php }
				}
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
