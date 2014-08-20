<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content
* after. Calls sidebar-footer.php for bottom widgets.
*
* @package WordPress
* @subpackage Twenty_Ten
* @since Twenty Ten 1.0
*/
?>
</div>
<meta itemprop="url" content="http://racechip.com.ua">
<meta itemprop="name" content="RaceChip Chiptuning Ukraine"></span>
<div class="container_24">
<div id="racechip-main-bottom"></div>
<div class="grid_24"><div id="copyright">
<?php if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar('footer-oben') ) : ?><?php endif; ?>
</div></div>
<div class="grid_24">
<div id="footer" role="contentinfo">
<div id="colophon">
<?php get_sidebar( 'footer' ); ?>
<div id="site-info"></div><!-- #site-info -->
<div id="site-generator"></div><!-- #site-generator -->
</div></div><!-- #colophon -->
</div><!-- #footer -->
</div><!-- #wrapper -->
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45947377-1', 'racechip.com.ua');
  ga('send', 'pageview');

</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'Kt413OMFdG';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>