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
<div id="container" class="one-column-news">
<div id="content" role="main">
<div class="grid_18">
<?php get_template_part( 'loop', 'page' );?>
</div>
<?php get_sidebar(); ?>
</div><!-- #content -->
</div><!-- #container -->
</div>
<?php get_footer(); ?>