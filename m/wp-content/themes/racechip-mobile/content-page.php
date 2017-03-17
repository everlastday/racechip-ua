<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>


  <section id="content" class="<?php echo get_permalink(); ?>">
   <?php if(!is_front_page()):?>
     <p><script>jQuery(function() {jQuery( "#accordion" ).accordion({heightStyle: "content"});});</script></p>

	<?php
    endif;
		// Page thumbnail and title.
		twentyfourteen_post_thumbnail();
		//the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>


		<?php
			the_content();
//			wp_link_pages( array(
//				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
//				'after'       => '</div>',
//				'link_before' => '<span>',
//				'link_after'  => '</span>',
//			) );

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
  </section>
<?php  if(is_front_page()) { ?>
<script>
  var slider3 = new Swipe(document.getElementById('slider3'), {

    startSlide: 0,
    speed: 400,
    auto: 3000,
    continuous: false,
    disableScroll: false,

    callback: function(e, pos) {
      var i = bullets.length;
      while (i--) {
        bullets[i].className = ' ';
      }
      bullets[pos].className = 'on';
    }

  });

  bullets = document.getElementById('position').getElementsByTagName('em');
</script>
<?
}
?>