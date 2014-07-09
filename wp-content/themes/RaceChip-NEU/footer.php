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
	</div></div><!-- end .container_24 -->

<div class="container_24">
<div id="racechip-main-bottom"></div>
<div class="grid_24"><div id="copyright">Copyright 2008 – 2012 RaceChip Chiptuning GmbH & Co. KG - Логотипы и товарные знаки являются собственностью их владельца. Перепечатка материалов разрешается при условии указания активной ссылки на источник.</div></div>
<div class="grid_24">
	<div id="footer" role="contentinfo">

		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info"></div><!-- #site-info -->

			<div id="site-generator"></div><!-- #site-generator -->

		</div><!-- #colophon -->

	</div></div></div><!-- #footer -->

<!-- </div> #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>


<div class="window_popup" id="free-call">
  <div class="x"></div>
  <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
    <input type="text" name="phone" class="required" placeholder="Телефон" />
    <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Заказать звонок" name="call"/>
  </form>
</div>


<div class="window_popup" id="online-message">
  <div class="x"></div>
  <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
    <input type="text" class="required" placeholder="Имя" name="name" />
    <input type="text" class="required" placeholder="E-mail" name="email" />
    <input type="text" class="required" placeholder="Номер телефона" name="phone" />
    <textarea placeholder="Сообщение"  name="comment"></textarea>
    <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Отправить сообщение" name="online"/>
  </form>
</div>

<script type="text/javascript">
  jQuery(".online-message-btn").click(function () {
    var self = jQuery(this);
    jQuery(".window_popup form textarea").val('Хочу заказать ' + self.attr('data-chip') + ' для автомобиля ' + self.attr('data-model'));
    //console.log();

       // "product_name": self.attr('data-chip-model'),
       // "qty": 1,
       // "product_price": self.attr('data-chip-price'),
       // "product_image": self.attr('data-chip-img')



    return false;
  });
</script>
<center><!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t13.1;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet--></center>

<a id="un-button" href="#" class="un-left css3 freecall-btn" style="margin-top: 60px;">Заказать звонок</a>

<script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 987324113;
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
  /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
  <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/987324113/?value=0&amp;guid=ON&amp;script=0"/>
  </div>
</noscript>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45947377-1', 'racechip.com.ua');
  ga('send', 'pageview');

</script>

</body>
</html>