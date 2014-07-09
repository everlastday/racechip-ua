<?php
/**
 * Template Name: Seiten Template ohne Sidebar - Full width
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
<div id="container" class="">
<div id="container" class="one-column">
<div id="content" role="main">
<?php get_template_part( 'loop', 'page' );?>
</div><!-- #content -->
</div><!-- #container -->
</div>
<?php get_footer(); ?>