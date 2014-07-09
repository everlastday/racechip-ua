<?php
/**
* Template Name: Seiten Template mit Sidebar
*
*/
get_header(); ?>
<div id="container" class="one-column-sidebar">
<div id="content" role="main">
<?php get_template_part( 'loop', 'page' ); ?>
</div><!-- #content -->
<?php get_sidebar(); ?>

</div><!-- #container -->
<?php get_footer(); ?>