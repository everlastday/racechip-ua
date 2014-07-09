<?php
/**
 * The template for displaying Category Archive pages.
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
<h1 class="page-title">
<?php
	printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	?></h1>
	<?php
	$category_description = category_description();
	if ( ! empty( $category_description ) )
	echo '<div class="archive-meta">' . $category_description . '</div>';

	get_template_part( 'loop', 'category' );
	?>

</div>
</div><!-- #content -->
</div><!-- #container -->
</div>
<?php get_footer(); ?>