<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Developer_Bio
 * @since Developer Bio 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
	</div><!-- .content-area -->
	<div class='container sections-wrapper'>
	<div class='row'>
		<div id="primary" class='content-area primary col-md-8 col-sm-12 col-xs-12'>
			<main id="main" class="section site-main" role="main">
				<section class="error-404 not-found section-inner">
					<header class="page-header">
						<h1 class="page-title heading"><?php _e( 'Oops! That page can&rsquo;t be found.', 'devbio' ); ?></h1>
					</header><!-- .page-header -->

					<div class="content page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'devbio' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- .site-main -->
			<?php get_sidebar( 'content-bottom' ); ?>
		</div>
		<!--//primary-->
		<div class='secondary col-md-4 col-sm-12 col-xs-12'>
			<?php get_sidebar(); ?>
		</div>
		<!--//secondary-->    
	</div>
	<!--//row-->
</div>
<?php get_footer(); ?>
