<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Developer_Bio
 * @since Developer Bio 1.0
 */

get_header(); ?>

<div class='container sections-wrapper'>
	<div class='row'>
		<div id="primary" class='content-area primary col-md-8 col-sm-12 col-xs-12'>
			<main id="main" class="section site-main" role="main">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the single post content template.
					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'devbio' ),
						) );
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'devbio' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'devbio' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'devbio' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'devbio' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						) );
					}

					// End of the loop.
				endwhile;
				?>
			</main><!-- .site-main -->
		</div>
		<!--//primary-->
		<div class='secondary col-md-4 col-sm-12 col-xs-12'>
			<?php get_sidebar(); ?>
		</div>
		<!--//secondary-->    
	</div>
	<!--//row-->
</div>
<!--//masonry-->
<?php get_footer(); ?>
<?php get_footer(); ?>
