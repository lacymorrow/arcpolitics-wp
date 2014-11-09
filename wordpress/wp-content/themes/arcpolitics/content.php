<?php
/**
 * @package arcpolitics
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	    <?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumb">
				<a href="<?php esc_url( get_permalink() ); ?>">
			        <?php the_post_thumbnail('large'); ?>
			    </a>
			</div>
	    <?php } ?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="entry-meta">
			<?php arcpolitics_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'arcpolitics' ), 
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'arcpolitics' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
