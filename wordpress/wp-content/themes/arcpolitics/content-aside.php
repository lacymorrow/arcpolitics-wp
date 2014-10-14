<?php
/**
 * @package arcpolitics
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumb">
	    	<?php if ( is_single() ) { ?>
	    	sdg
		    	<a href="<?php esc_url( get_permalink() ); ?>">
		            <?php the_post_thumbnail('large'); ?>
		        </a>
    		<?php } else { ?>
				<a href="<?php esc_url( get_permalink() ); ?>">
			        <?php the_post_thumbnail('medium'); ?>
			    </a>
			<?php } ?>
		</div>
    <?php } ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h6 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
