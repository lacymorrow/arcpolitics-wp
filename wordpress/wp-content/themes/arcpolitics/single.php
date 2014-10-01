<?php
/**
 * The template for displaying all single posts.
 *
 * @package arcpolitics
 */

get_header(); ?>

	<div id="content-area" class="container">
		<div class="row">
			<div id="primary" class="content-area col-xs-12">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'single' ); ?>

						<?php arcpolitics_post_nav(); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

<?php get_footer(); ?>