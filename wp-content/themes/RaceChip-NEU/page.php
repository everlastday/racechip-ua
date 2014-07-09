<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div id="slider">
<div class="slider-top"></div>
<div class="slider-inhalt">
<?php echo do_shortcode( '[featurelist-slider]' ) ?>
</div>
<div class="slider-bottom"></div>
</div>

<div id="main" class="grid_24" >
<div id="container" class="grid_19">
<div id="content" role="main">
	<?php
get_template_part( 'loop', 'page' );
?>
</div><!-- #content -->
</div><!-- #container -->

<div class="grid_5"><?php get_sidebar(); ?></div>
<div id="mainBottom-single"></div>
<?php get_footer(); ?>
