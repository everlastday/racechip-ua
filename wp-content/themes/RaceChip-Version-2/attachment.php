<?php
/**
 * The template for displaying attachments.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>
<div id="container" class="single-attachment">
<div id="content" role="main"><?php get_template_part( 'loop', 'attachment' );?>
</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>
