<?php
/**
 * The Template for displaying all single posts.
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
            
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'single' );
			?>
<?php //get_sidebar(); ?>

			</div><!-- #content -->
		</div><!-- #container -->
<div id="mainBottom"></div>
</div>

<?php get_footer(); ?>