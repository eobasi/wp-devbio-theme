<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Developer_Bio
 * @since Developer Bio 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class='section section-inner'>
		<header class="entry-header">
			<?php the_title( '<h2 class="heading entry-title">', '</h2>' ); ?>
		</header><!-- .entry-header -->

		<?php devbio_excerpt(); ?>

		<?php devbio_post_thumbnail(); ?>

		<div class="content entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</section>
	<footer class="entry-footer section-inner">
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'devbio' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'devbio' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
			
			devbio_entry_meta(); 
		 
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'devbio' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
