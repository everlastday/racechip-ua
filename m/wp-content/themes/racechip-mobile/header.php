<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">


  <header id="header">
    <div id="logo">
      <a href="<?php echo site_url(); ?>">
        <img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="RaceChip Logo" />
      </a>
    </div>

    <?php if(is_front_page()) { ?>
    <div id="languagemenu">
      <a id="menubutton" href="" onclick="return stickynavigation();">
        <span class="menuicon"></span>
<span class="menutext">
<img src="<?php echo get_template_directory_uri() ?>/images/flags/ua.png" /> Украина</span>

        <div style="clear:both;"></div>
      </a>
      <script>
        var boolactive = false;
        function stickynavigation() {
          if (boolactive == false) {
            jQuery('#languagemenu .languagemenu').show();
            boolactive = true;
          }
          else {
            jQuery('#languagemenu .languagemenu').hide();
            boolactive = false;
          }

          return false;
        }
      </script>
      <div class="languagemenu">
        <div class="languagemenuwrapper">
          <a title="Deutsch" href="http://m.racechip.de">
            <img alt="DE" src="<?php echo get_template_directory_uri() ?>/images/flags/de.png">
            Deutsch
          </a>
          <a title="Español" href="http://m.racechip.es">
            <img alt="es_ES" src="<?php echo get_template_directory_uri() ?>/images/flags/es.png">
            Español
          </a>
          <a title="Français" href="http://m.racechip.fr">
            <img alt="fr_FR" src="<?php echo get_template_directory_uri() ?>/images/flags/fr.png">
            Français
          </a>
          <a title="Hrvatski" href="http://m.hr.racechip.com">
            <img alt="hr" src="<?php echo get_template_directory_uri() ?>/images/flags/hr.png">
            Hrvatski
          </a>
          <a title="Italiano" href="http://m.racechip.it">
            <img alt="it_IT" src="<?php echo get_template_directory_uri() ?>/images/flags/it.png">
            Italiano
          </a>
          <a title="Nederlands" href="http://m.racechip.nl">
            <img alt="nl_NL" src="<?php echo get_template_directory_uri() ?>/images/flags/nl.png">
            Nederlands
          </a>
          <a title="Português" href="http://m.pt.racechip.com">
            <img alt="pt_PT" src="<?php echo get_template_directory_uri() ?>/images/flags/pt.png">
            Português
          </a>
          <a title="Englisch" href="http://m.racechip.com">
            <img alt="us" src="<?php echo get_template_directory_uri() ?>/images/flags/us.png">
            English
          </a>
        </div>
      </div>
    </div>
    <?php } else { ?>
    <div id="mainmenu">
      <a id="menubutton" href="" onclick="return stickynavigation();">
        <span class="menuicon"></span>
        <span class="menutext">Меню</span>
        <div style="clear:both;"></div>
      </a>
      <script>
        var boolactive = false;
        function stickynavigation()
        {
          if(boolactive == false)
          {
            jQuery('#mainmenu .menu').show();
            boolactive = true;
          }
          else
          {
            jQuery('#mainmenu .menu').hide();
            boolactive = false;
          }
          return false;
        }
      </script>
    <?php
      echo do_shortcode('[racechip_mobile_menu pages="1"]');
      } ?>

    <div style="clear:both;"></div>


  </header>
  <?php if(is_front_page()): ?>
  <section id="diashow">
    <div id="slider3" class="swipe">
      <div class="swipe-wrap">
        <div>
	        <img src="<?php echo get_template_directory_uri() ?>/images/slider/RU/slider-1.jpg" width="100%" />
        </div>
         <div>
			<img src="<?php echo get_template_directory_uri() ?>/images/slider/RU/slider-2.jpg" width="100%" />
         </div>
        <div>
	        <img src="<?php echo get_template_directory_uri() ?>/images/slider/RU/slider-3.jpg" width="100%" />
        </div>
        <div>
	        <img src="<?php echo get_template_directory_uri() ?>/images/slider/RU/slider-4.jpg" width="100%" />
        </div>
      </div>
    </div>
<span id="position">
		<em class="on">&bull;</em>
		<em>&bull;</em>
		<em>&bull;</em>
		<em>&bull;</em>
</span>
    <script src="<?php echo get_template_directory_uri() ?>/js/swipe.js"></script>
  </section>
  <? endif; ?>
  <div id="main" class="site-main">
