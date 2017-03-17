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
    <a href="http://racechip.com.ua?mobile=1">Полная версия сайта</a>
    <div style="clear:both;"></div>

  </div>
  <?php get_sidebar( 'footer' ); ?>
</footer>
</div>
<div id="mask">
  <div class="backgroundmask"></div>
  <span class="textmask">Bitte warten...</span>
</div>
    <?php wp_footer(); ?>
</body>
</html>