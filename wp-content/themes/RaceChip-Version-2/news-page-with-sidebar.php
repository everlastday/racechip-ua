<?php
/**
* Template Name: News Template mit Sidebar
*
*/
get_header(); ?>
<div id="container" class="one-column">
<div id="content" role="main">
<?php get_template_part( 'loop', 'page' ); ?>

<?php $listCategory = get_post_meta($post->ID, 'news', true); ?>

</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>