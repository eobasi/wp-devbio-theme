<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Developer Bio
 * @since Developer Bio 1.0
 */
 
 //$logo = the_custom_logo()
 $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php endif; ?>
	<?php wp_head(); ?>
	<?php if ( !empty( $logo ) ) : ?>
	<style>
		.profile-image{background-image: url(<?php echo $logo; ?>) !important;}
	</style>
	<?php endif; ?>
</head> 

<body <?php body_class(); ?> >
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">                       
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="profile-image img-responsive pull-left" ><?php bloginfo( 'name' ); ?></a>
            <div class="profile-content pull-left">
                <h1 class="name"><?php bloginfo( 'name' ); ?></h1>
                <h2 class="desc"><?php bloginfo( 'description' ); ?></h2>   
                <ul class="social list-inline">
                    <li><a href="https://facebook.com/euobasi"><i class="fa fa-facebook"></i></a></li>                   
                    <li><a href="https://twitter.com/ebenzunlimited/"><i class="fa fa-twitter"></i></a></li>                   
                    <li><a href="https://plus.google.com/u/0/+EbenezerObasi"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/ebenzunlimited/"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/eobasi"><i class="fa fa-github-alt"></i></a></li>                  
                    <li class="last-item"><a href="https://instagram.com/ebenzunlimited/"><i class="fa fa-instagram"></i></a></li>                 
                </ul> 
            </div><!--//profile-->
            <a class="btn btn-cta-primary pull-right" href="<?php echo get_permalink( get_page_by_path( 'contact' ) )?>" <i class="fa fa-paper-plane"></i> Contact Me</a>              
        </div><!--//container-->
    </header><!--//header-->
    