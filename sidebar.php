<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Developer_Bio
 * @since Developer Bio 1.0
 */
 
 if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id='secondary' class='aside section sidebar widget-area' role='complementary'>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
