<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>
		

		<div class="flex-container global-header" >
			<?php if(has_nav_menu('main')): ?>
				<div class="navigation-main">
					<div class="wrap">
						<?php get_template_part( 'template-parts/navigation/navigation', 'main' ); ?>
					</div><!-- .wrap -->
				</div><!-- .navigation-main -->
			<?php endif; ?>

			<?php the_custom_logo(); ?>

			<strong class="tagline"> <?php echo get_bloginfo( 'description', 'display' ); ?> </strong>

			<?php
				if(is_active_sidebar( 'sidebar-5' )) {
					dynamic_sidebar( 'sidebar-5' );
				}
			?>
		</div>



		<!-- HERO IMAGE -->
		<header id="masthead" class="site-header" role="banner">
		
		
			<?php if(is_active_sidebar( 'sidebar-3' )): ?>
				<div class="widget-column banner-widget-area">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php endif; ?>
				
				
			<?php if(has_nav_menu('top')): ?>
				<div class="navigation-top">
					<div class="wrap">
						<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
					</div>
				</div>
			<?php endif; ?>
			
			
		</header>

		<?php

		/*
		* If a regular post or page, and not the front page, show the featured image.
		* Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
		*/
		if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
			echo '<div class="single-featured-image-header">';
			echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
			echo '</div><!-- .single-featured-image-header -->';
		endif;
		?>

		<div class="site-content-contain">
			<div id="content" class="site-content">
