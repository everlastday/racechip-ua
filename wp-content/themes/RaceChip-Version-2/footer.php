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



<script type="text/javascript">(function(w,doc) {
if (!w.__utlWdgt ) {
    w.__utlWdgt = true;
    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
}})(window,document);
</script>
<div data-share-size="40" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1301484" data-mode="share" data-background-color="#ffffff" data-hover-effect="scale" data-share-shape="round-rectangle" data-share-counter-size="14" data-icon-color="#ffffff" data-text-color="#000000" data-buttons-color="#fe8b1a" data-counter-background-color="#ffffff" data-share-counter-type="common" data-orientation="fixed-right" data-following-enable="false" data-sn-ids="fb.vk.tw.ok.gp.mr." data-selection-enable="true" data-exclude-show-more="false" data-share-style="0" data-counter-background-alpha="1.0" data-top-button="false" class="uptolike-buttons" ></div>

<!-- Start SiteHeart code -->
<script>
    (function(){
        var widget_id = 735315;
        _shcp =[{widget_id : widget_id}];
        var lang =(navigator.language || navigator.systemLanguage
        || navigator.userLanguage ||"en")
            .substr(0,2).toLowerCase();
        var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
        var hcc = document.createElement("script");
        hcc.type ="text/javascript";
        hcc.async =true;
        hcc.src =("https:"== document.location.protocol ?"https":"http")
        +"://"+ url;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hcc, s.nextSibling);
    })();
</script>
<!-- End SiteHeart code -->



</body>
</html>