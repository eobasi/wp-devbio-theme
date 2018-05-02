<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
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
