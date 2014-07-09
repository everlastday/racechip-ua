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
<div id="container" class="one-column-news">
<div id="content" role="main">
<?php get_template_part( 'loop', 'single' );?>
</div><!-- #content -->
<?php get_sidebar(); ?>
</div><!-- #container -->
</div>
<?php get_footer(); ?>