<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>
<?php if ( is_page() ) {?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content"><?php  the_content(); ?> 
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-content -->
  <?php comments_template( '', true ); ?>
</div><!-- #post-## -->
<?php endwhile; // end of the loop. ?>
<?php } else {  // wenn keine page dann...?> 
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>        
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<div id="trenner-artikel"></div>
<?php if ( is_front_page() ) { ?>
<h1> <a href="<?php the_permalink() ?>"><?php the_title(); ?>
</a></h1>
<?php } else { ?>                                      
<?php } ?>
<div class="entry-content">
 <?php
if ( has_post_thumbnail() ) {
the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
}?>
<?php if ( is_single() ) { ?>
<h1> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<?php } else { ?>
<h2> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<?php } ?>
<?php the_excerpt();	?> 
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-content -->
</div><!-- #post-## -->
<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
<?php }  ?>  