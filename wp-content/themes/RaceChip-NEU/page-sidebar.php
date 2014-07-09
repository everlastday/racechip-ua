<?php
/**
 * Template Name: One column, with sidebar
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div id="wrapper" class="grid_24">
<div id="mainTop"></div>
		<div id="container" class="one-column-sidebar">

			<div id="content" role="main">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'page' );
			?>
<?php get_sidebar(); ?>
			</div><!-- #content -->
		</div><!-- #container -->
<div id="mainBottom"></div>
</div>

<?php get_footer(); ?>
