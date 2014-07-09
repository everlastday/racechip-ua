<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>"/>
  <title><?php
      /*
       * Print the <title> tag based on what is being viewed.
       */
      global $page, $paged;


      wp_title( '|', true, 'right' );

      // Add the blog name.
      bloginfo( 'name' );

      // Add the blog description for the home/front page.
      $site_description = get_bloginfo( 'description', 'display' );

      if(isset($wp_query->query_vars['car_id']) ) {
        $site_description = 'test';
      }

      if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

      // Add a page number if necessary:
      if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
    ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11"/>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>
  <link rel="shortcut icon" href="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-NEU/favicon.ico"
        type="image/vnd.microsoft.icon"/>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

  <?php
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
      wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */


    wp_head();
  ?>

  <link rel='stylesheet' id='rcclient_theme_style-css'
        href='<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/css/themefunctions.css?ver=3.4.2'
        type='text/css' media='all'/>
  <link rel='stylesheet' id='css_jq_flist_slider-css'
        href='<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rc-featurelist-slider/jq_featurelist_slider.css?ver=3.4.2'
        type='text/css' media='all'/>
  <script type='text/javascript'
          src='<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rc-featurelist-slider/js/jquery.tools.tabs.min.js?ver=3.4.2'></script>


  <!-- TipTip JS -->
  <script
    type="text/javascript"
    src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/adminoptions/js/tiptip/jquery.tipTip.js"></script>
  <link
    rel="stylesheet" type="text/css"
    href="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/adminoptions/js/tiptip/tipTip.css"/>
  <!-- TipTip  JS END -->

  <!-- RaceChip Client Theme JS -->
  <script
    type="text/javascript"
    src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/themefunctions.js"></script>
  <script
    type="text/javascript"
    src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/main.js"></script>
  <script
    type="text/javascript"
    src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.validate.min.js"></script>

  <script
    type="text/javascript"
    src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.form.js"></script>
  <!-- RaceChip Client Theme JS END -->
  <style type="text/css" media="screen">
    .qtrans_flag {height:12px;width:18px;display:block}
    .qtrans_flag span {display:none}
    .qtrans_flag_and_text {padding-left:20px}
    .qtrans_flag_de {background:url(/wp-content/plugins/qtranslate/flags/de.png) no-repeat }
    .qtrans_flag_en {background:url(/wp-content/plugins/qtranslate/flags/us.png) no-repeat }
    .qtrans_flag_es {background:url(/wp-content/plugins/qtranslate/flags/es.png) no-repeat }
    .qtrans_flag_fr {background:url(/wp-content/plugins/qtranslate/flags/fr.png) no-repeat }
    .qtrans_flag_hr {background:url(/wp-content/plugins/qtranslate/flags/hr.png) no-repeat }
    .qtrans_flag_tr {background:url(/wp-content/plugins/qtranslate/flags/tr.png) no-repeat }
    .qtrans_flag_it {background:url(/wp-content/plugins/qtranslate/flags/it.png) no-repeat }
    .qtrans_flag_pt {background:url(/wp-content/plugins/qtranslate/flags/br.png) no-repeat }
    .qtrans_flag_nl {background:url(/wp-content/plugins/qtranslate/flags/nl.png) no-repeat }
    .qtrans_flag_ru {background:url(/wp-content/plugins/qtranslate/flags/ru.png) no-repeat }
  </style>
</head>

<body <?php body_class(); ?>>
<div id="navTopBar">
  <div id="headline">

    <?php
      if (! function_exists( 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage' )) {

      global $q_config;
    ?>



    <div id="languages">
      <!--[if lte IE 6]><a href="#"><![endif]-->
            <span class="lname">
  <?php // _e( 'Site Language' );  ?>
            </span>

            <span class="lname">
               <span class="limg"><img src="/wp-content/plugins/qtranslate/flags/ua.png" alt="ru"></span>
            </span>
            <span class="lname">
               <?php echo 'Украинский'  ?>
            </span>
            <span class="arrow">
              <img class="arrows_down" src="<?php echo get_template_directory_uri(); ?>/images/layout/arrows_down.png"
                   title="" alt="arrows_down" width="14" height="14"/>
            </span>
      <!--[if lte IE 6]>
      <table>
        <tr>
          <td><![endif]-->
      <div class="ldropdown">
        <?php //echo qTranslateSlug_generateLanguageSelectCode('both'); ?>
          <ul class="qtrans_language_chooser" id="qtrans_language_chooser">
            <li><a href="http://racechip-ru.com" class="qtrans_flag_ru qtrans_flag_and_text"><span>Русский</span></a></li>
            <li><a href="http://www.racechip.de/" class="qtrans_flag_de qtrans_flag_and_text"><span>Deutsch</span></a></li>
            <li><a href="http://www.racechip.de/en/" class="qtrans_flag_en qtrans_flag_and_text"><span>English</span></a></li>
            <li><a href="http://www.racechip.de/es/" class="qtrans_flag_es qtrans_flag_and_text"><span>Español</span></a></li>
            <li><a href="http://www.racechip.de/fr/" class="qtrans_flag_fr qtrans_flag_and_text"><span>Français</span></a></li>
            <li><a href="http://www.racechip.de/hr/" class="qtrans_flag_hr qtrans_flag_and_text"><span>Hrvatski</span></a></li>
            <li><a href="http://www.racechip.de/tr/" class="qtrans_flag_tr qtrans_flag_and_text"><span>Türkçe</span></a></li>
            <li><a href="http://www.racechip.de/it/" class="qtrans_flag_it qtrans_flag_and_text"><span>Italiano</span></a></li>
            <li><a href="http://www.racechip.de/pt/" class="qtrans_flag_pt qtrans_flag_and_text"><span>Português</span></a></li>
            <li><a href="http://www.racechip.de/nl/" class="qtrans_flag_nl qtrans_flag_and_text"><span>Nederlands</span></a></li>
          </ul>
        <div class="qtrans_widget_end"></div>
      </div>
    </div>
    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
  </div>
  <!-- Ende languages -->
  <?php
    }

    if ( function_exists( 'rcclient_theme_get_sc_clean_content_slim' ) ) {
      ?>


      <div id="warenkorb">
        <!--[if lte IE 6]><a href="#"><![endif]--><span class="wname" id="whover"><span class="wimg"><img
              src="<?php echo get_template_directory_uri(); ?>/images/layout/wk_logo.png" alt="" title=""/></span> Ihr Warenkorb enth?lt <span
            class="wcount">

  <?php echo rcclient_theme_get_sc_qty(); ?> Artikel</span>

              <img class="arrows_down" src="<?php echo get_template_directory_uri(); ?>/images/layout/arrows_down.png"
                   title="" alt="arrows_down" width="14" height="14"/></span>
        <!--[if lte IE 6]>
        <table>
          <tr>
            <td><![endif]-->
        <div class="wdropdown" id="wdropdown">

          <?php echo rcclient_theme_get_sc_clean_content_slim(); ?>
        </div>
        <!-- Ende #wdropdown -->
        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
      </div> <!-- Ende #warenkorb -->
      <?php echo rcclient_theme_search_form();
    } ?>
</div>
</div>

<div id="headline-wrapper">
  <div class="container_24">
    <div id="header">
      <div id="raceChip-Header">
        <div class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img
              src="<?php echo get_template_directory_uri(); ?>/images/racechip-logo-top.png"/></a></div>
        <?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'head-widget-area' ) ) : ?>
          <div class="header-mid">
            <ul>
              <li>Больше мощности & меньший расход топлива</li>
              <li>18 лет опыта</li>
              <li>Бесплатная доставка, отправка на протяжении 24-х часов</li>
            </ul>
          </div>
          <div class="header-right">
            <ul class="right-images">
              <li class="first"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip-won-the-comparison-test/"><img alt="RaceChip победитель!" src="<?php echo get_template_directory_uri(); ?>/images/eurotuner-winner-logo-ua.png" class="tooltip_c"/></a></li>
              <li><img alt="RaceChip Tuv" src="<?php echo get_template_directory_uri(); ?>/images/racechip-header-tuev-ua.png"></li>
              <li><img alt="Безопасность совершения покупок" src="<?php echo get_template_directory_uri(); ?>/images/racechip-header-safeshopping-ua.png" class="tooltip_c"></li>
              <li class="last"><a href="https://www.trustedshops.de/bewertung/info_X1CFDC3E5246F688855B6B5E710EAE164.html"><img alt="Trusted Shop" src="<?php echo get_template_directory_uri(); ?>/images/racechip-header-trusted-ua.png" class="tooltip_c"></a></li>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div id="racechip-nav-background-wrapper">
  <div id="access" role="navigation">

    <div class="menu-header">
      <ul id="menu-topnavi" class="menu">
        <li id="menu-item-2631"
            class="first-home menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-26 current_page_item menu-item-2631">
          <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/">Главная страница</a></li>
        <li id="menu-item-2522" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2522"><a
            href="#">Продукты</a>
          <ul class="sub-menu">
            <li id="menu-item-2628" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2628"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip/">RaceChip</a></li>
            <li id="menu-item-2629" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2629"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip-pro2/">RaceChip Pro2</a></li>
            <li id="menu-item-2630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2630"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip-ultimate/">RaceChip Ultimate</a></li>
            <li id="menu-item-2626" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2626"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/kn-air-filter/">Возд. фильтры K&ampN</a></li>
            <li id="menu-item-2624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2624"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/eco-chiptuning/">Eco-Tuning</a></li>
          </ul>
        </li>
        <li id="menu-item-2622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2622"><a
            href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля<!--[if gte IE 7]><!--></a><!--<![endif]-->
          <!--[if lte IE 6]>
          <table>
            <tr>
              <td><![endif]-->
          <div class="listHolder">
            <div class="top">
              <span class="title">Пожалуйста, выберите производителя Вашего автомобиля из списка.</span>
            </div>
            <?php
              $data_from_db = get_chiptuning();
              $models_count = count_vehicles();
              $cnt = 0;

              foreach ( $data_from_db as $k => $v ):
                if ( $cnt == 0 ) :
            ?>
<div class="listCol">
              <ul>
            <?php
                endif;
              $cnt ++;
              $href_name = preg_replace("/ /", "-", $v['name']);
            ?>
    <li><a class="" href="<?php echo get_bloginfo('wpurl') . "/chiptuning/" . strtolower($href_name) ?>"><?php echo $v['name'] ?></a></li>
            <?php
                if ( $cnt == ceil($models_count/6) ) : ?>
  </ul>
            </div>
            <?php
              $cnt = 0;
                endif;
              endforeach;
            ?>
            <div class="bottom"></div>
          </div>
          <!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <li id="menu-item-2525" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a
            href="#">О RaceChip</a>
          <ul class="sub-menu">
            <li id="menu-item-2633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2633"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/company/">Компания</a></li>
            <li id="menu-item-2632" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2632"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/technology-and-quality/">Технология и качество</a></li>
            <li id="menu-item-2623" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2623"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning-chronicle/">Хроника чиптюнинга</a></li>
            <li id="menu-item-2665" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2665"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/category/news/">Новости</a></li>
          </ul>
        </li>
        <li id="menu-item-2526" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2526"><a
            href="#">Установка / Сервис</a>
          <ul class="sub-menu">
            <li id="menu-item-2635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2635"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning-what-is-it/">Что такое чиптюнинг?</a></li>
            <li id="menu-item-2625" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2625"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/installation/">Установка</a></li>
            <li id="menu-item-2524" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2524"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/support/">Центр поддержки</a></li>
            <li id="menu-item-2634" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2634"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/shipping-and-payment/">Стоимость доставки</a></li>
          </ul>
        </li>
        <li id="menu-item-2523" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2523"><a
             href="#">Дилеры</a>
          <ul class="sub-menu">
            <li id="menu-item-2635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22635"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/reseller-russia/">Россия</a></li>
            <li id="menu-item-2625" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22625"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/reseller-belarus/">Белоруссия</a></li>

            <li id="menu-item-2523" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22523"><a
                href="<?php echo get_bloginfo( 'wpurl' ); ?>/reseller-portal/">Кабинет <br/>для дилеров</a></li>
          </ul>


        </li>


        <li id="menu-item-2627"
            class="last-kontakt menu-item menu-item-type-post_type menu-item-object-page menu-item-2627"><a
            href="<?php echo get_bloginfo( 'wpurl' ); ?>/contacts/">Контакты</a></li>
      </ul>
    </div>
    <div id="nav-linie-bottom"></div>
  </div>
</div>


</div>


<div id="wrapper" class="container_24">