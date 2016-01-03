<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpAutomate
 */

get_header(); 


?>
<?php
// Grab the metadata from the database
$prefix = '_page_';
$hide_sidebar = get_post_meta( get_the_ID(), $prefix . 'hide_sidebar', true );
$primary_grid_class =  $hide_sidebar ? 'col-md-12' :  'col-md-8';
$sidebar_position = get_post_meta( get_the_ID(), $prefix . 'sidebar_position', true );
$sidebar_position_class = '';
if ($sidebar_position === 'right') { $sidebar_position_class = 'sidebar-position-right'; }
if ($sidebar_position === 'left') { $sidebar_position_class = 'sidebar-position-left'; }
?>
	

	 
	<div id="primary" class="content-area <?php echo $primary_grid_class; ?> <?php echo $sidebar_position_class; ?>">

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); 	?>


				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php $hide_sidebar ?  '' :  get_sidebar(); ?>
<?php get_footer(); ?>
