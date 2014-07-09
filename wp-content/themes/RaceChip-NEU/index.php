<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div id="wrapper" class="grid_24">
<div id="mainTop"></div>
		<div id="container" class="one-column-news">

			<div id="content" role="main">
            <div class="grid_18">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'page' );
			?>
            </div>
           <?php get_sidebar(); ?>

			</div><!-- #content -->
		</div><!-- #container -->
<div id="mainBottom"></div>
</div>

<?php get_footer(); ?>