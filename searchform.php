<?php
/**
 * Template for displaying search forms in Developer Bio
 *
 * @package WordPress
 * @subpackage Developer_Bio
 * @since Developer Bio 1.0
 */
?>

<!-- Search Form -->
<div class="bar search-bar">
	<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="search search-field" placeholder="<?php echo esc_attr_x( 'Quick Search&hellip;', 'placeholder', 'devbio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-button search-submit"><i class="fa fa-search"></i></button>
	</form>
</div>
