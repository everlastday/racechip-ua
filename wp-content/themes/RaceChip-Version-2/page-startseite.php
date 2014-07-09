<?php
/**
 * Template Name: startseite
 *
 */
get_header(); ?>
<div id="slider">
<div class="slider-inhalt"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('slider-home') ) : ?><?php endif;?></div>
</div>
<div id="container" class="startseite">
<div id="content" role="main">
<?php get_template_part( 'loop', 'page' ); ?>
</div><!-- #content -->
<?php get_sidebar(); ?>
</div><!-- #container -->
<?php get_footer(); ?>