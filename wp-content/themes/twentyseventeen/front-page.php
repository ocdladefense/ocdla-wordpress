<?php
/*
Template Name: Homepage Template
*/
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>



		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== twentyseventeen_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in Twenty Seventeen.
			 *
			 * @since Twenty Seventeen 1.0
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
			global $twentyseventeencounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$twentyseventeencounter = $i;
				twentyseventeen_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== twentyseventeen_panel_count() ) ends here.
		?>

		<div class="homePageMenus">
			<div class="homepage-menu-column">
			
				<?php if(has_nav_menu('resourcesAndDatabases')): ?>
					<div class="trevor-menu trevor-about-menus">
						<div class="trevor-menu-label trevor-about-menu-label">ABOUT OCDLA</div>
						<?php
							wp_nav_menu( array('theme_location' => 'aboutOCDLA'));
						?>
					</div>
				<?php endif; ?>
				
				<?php if(has_nav_menu('resourcesAndDatabases')): ?>
					<div class="trevor-menu trevor-member-menus">
						<div class="trevor-menu-label trevor-members-menu-label">MEMBERS</div>
						<?php
							wp_nav_menu( array('theme_location' => 'members'));
						?>
					</div>
				<?php endif; ?>
			
				<?php if(has_nav_menu('resourcesAndDatabases')): ?>
					<div class="trevor-menu trevor-resources-menus">
						<div class="trevor-menu-label trevor-resources-menu-label">RESOURCES & DATABASES</div>
						<?php
						wp_nav_menu( array('theme_location' => 'resourcesAndDatabases'));?>
					</div>
				<?php endif; ?>
				
			</div>
		</div>


		<!-- announcements -->
		<h1 class="announcments-label">OCDLA Announcements</h1>
		<div class="trevor-posts-container">
			<div class="trevor-posts" >
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						wp_reset_query();
						$query = new WP_Query( array( 'post_type' => 'post' ) );
						// Show the selected front page content.
						if ($query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								get_template_part( 'template-parts/page/content', 'front-page-trevor' );
							endwhile;
						else :
							get_template_part( 'template-parts/post/content', 'none' );
						endif;
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
<?php
get_footer();
