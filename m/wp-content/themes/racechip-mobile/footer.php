<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<footer>
  <div id="desktopansicht">
	  <?php
	  global $wp;
	  $post_type = get_query_var( 'post_type' );
	  $current_url = home_url(add_query_arg(array(),$wp->request));
	  $current_url  = str_replace(['http://m.', 'www.m.'], ['http://', 'www.'], $current_url);
	  ?>
	  <?php if($post_type == 'chiptuning' or
	           $post_type == 'responsecontrol' or
	           is_front_page() or
	           is_page('installation')): ?>
        <a href="<?=$current_url ?>?mobile=1">Полная версия сайта</a>
	  <?php endif; ?>
    <div style="clear:both;"></div>
  </div>
	<?php get_sidebar( 'footer' ); ?>
</footer>
</div>
<div id="mask">
  <div class="backgroundmask"></div>
  <span class="textmask">Пожалуйста, подождите...</span>
</div>
    <?php wp_footer(); ?>
</body>
</html>