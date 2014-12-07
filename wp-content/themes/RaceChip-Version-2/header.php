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
?>
<!DOCTYPE html>
<?php
/*
 * Переключение на мобильную версию
 * mobile = 1 - переключение на полную версию сайта
 * mobile = 2 -  удаление куки полной версии и переключение на моб. версию сайта
 * Если параметр mobile не существует и не установлены куки на полную версию сайта - загрузиться моб. версия с помощю ф-ции
 * is_handheld() которая определяет моб. устройство (плагин mobble )
 */

if(isset($_GET['mobile']) and $_GET['mobile'] == 1) setcookie('r_full_version', 1, strtotime('+7 day'));
if(isset($_GET['mobile']) and $_GET['mobile'] == 2) {
    setcookie('r_full_version', null, strtotime('-7 day'));
    wp_redirect( 'http://racechip.com.ua', 301 );
}
if(is_handheld() and $_GET['mobile'] != 1 and $_COOKIE['r_full_version']  != 1) {
    wp_redirect( 'http://m.racechip.com.ua', 301 );
    exit;
}
 ?>
<!-- Розмітка мікроданих, додана Майстром розмітки структурованих даних Google. -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php echo TEMPLATE_DIRECTORY_URI; ?>/favicon.ico" type="image/vnd.microsoft.icon" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="navTopBar">
<div id="headline">
  <div id="languages">
    <span class="limg"><img alt="ua" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/ua.png"></span> <span class="lname"> Ukraine</span>
    <div class="ldropdown">
      <ul id="language_chooser">
        <li><a title="Deutsch" href="http://racechip.de"><img alt="de" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/de.png">Deutsch</a></li>
        <li><a title="Russia" href="http://racechip-ru.com"><img alt="ru" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/ru.png"> Russia</a></li>
        <li><a title="Español" href="http://www.racechip.es"><img alt="es_ES" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/es.png"> Español</a></li>
        <li><a title="Français" href="http://www.racechip.fr"><img alt="fr_FR" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/fr.png"> Français</a></li>
        <li><a title="Italiano" href="http://www.racechip.it"><img alt="it_IT" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/it.png"> Italiano</a></li>
        <li><a title="Nederlands" href="http://www.racechip.nl"><img alt="nl_NL" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/nl.png"> Nederlands</a></li>
        <li><a title="Português" href="http://pt.racechip.com"><img alt="pt_PT" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/pt.png"> Português</a></li>
        <li><a title="Englisch" href="http://www.racechip.com"><img alt="gb" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/gb.png"> English</a></li>
        <li><a title="united states" href="http://www.racechip-usa.com"><img alt="us" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/us.png">United States</a></li>
        <li><a title="Türkisch" href="http://www.racechip.com.tr"><img alt="tr" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/tr.png"> Türkei</a></li>
        <li><a title="Malaysia" href="http://www.racechip.com.my"><img alt="tr" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/themes/RaceChip-Version-2/images/flags/my.png"> Malaysia</a></li>
      </ul>
    </div>
  </div>
<?php
//}
?>
<!--<div id="warenkorb"></div>-->
</div>
</div>
<span itemscope itemtype="http://schema.org/LocalBusiness"><div id="headline-wrapper">
<div class="container_24"><div id="header">
<div id="raceChip-Header">
<div class="logo"><a href="<?php bloginfo('url'); ?>"><img itemprop="image" src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-logo-top.png" alt="RaceChip Logo" /></a></div>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('head-widget-area') ) : ?>
<div class="header-mid">
<ul>
<li>Увеличение мощности двигателя до +31%;</li>
<li>Уменьшение расхода топлива;</li>
<li>19 лет на рынке чиптюнинга;</li>
<li>Бесплатная доставка и установка;</li>
<li>7 тестовых дней на тестдрайв;</li>
</ul>
</div>
<div class="header-right">
<div class="header-right-title"><p>Надежная работа с RaceChip</p></div>
<ul class="right-images">
<li class="first"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip-won-the-comparison-test/"><img class="tooltip_c" title="RaceChip выиграл сравнительный тест." src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/testsieger_eurotuner.png" alt="RaceChip победитель" /></a></li>
<li><a href="http://racechip.com.ua/technology-and-quality"><img class="tooltip_c" title="RaceChip имеет сертификацию TÜV, что подтверждает безопасность использования чип-блоков с узлами и агрегатами авто" src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-header-tuev.png" alt="RaceChip TÜV"/></a></li>
<li><img class="tooltip_c" title="Безопасная передача данных через SSL. Ваши данные передаются по зашифрованному соединению и недоступны к просмотру третьим лицам" src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-header-safeshopping.png" alt="RaceChip безопасность совершения покупок"/></li>
<li class="last"><a href="https://www.trustedshops.de/bewertung/info_X1CFDC3E5246F688855B6B5E710EAE164.html"><img class="tooltip_c" title="Мы являемся членом Trusted Shops. Этот независимый инструмент по отзывам клиентов дает возможность оценить нас после покупки. Нашу оценку можно посмотреть, нажав на иконку." src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-header-trusted.png" alt="Trusted Shop Racechip" /></a></li>
</ul>
</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
<div id="racechip-nav-background-wrapper">
<div class="racechip-nav-background-wrapper-inner">
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
          <li id="menu-item-26302" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26302"><a
                    href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol-2/">Response Control</a></li>
          <li id="menu-item-2626" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2626"><a
              href="<?php echo get_bloginfo( 'wpurl' ); ?>/kn-air-filter/">Возд. фильтры K&ampN</a></li>
          <li id="menu-item-2624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2624"><a
              href="<?php echo get_bloginfo( 'wpurl' ); ?>/eco-chiptuning/">Eco-Tuning</a></li>
          <li id="menu-item-2624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2624"><a
              href="<?php echo get_bloginfo( 'wpurl' ); ?>/module-exhaust-systems/">Модуль <br>выхлопных систем</a></li>
        </ul>
      </li>
      <li id="menu-item-2622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2622"><a
          href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля<!--[if gte IE 7]><!--></a><!--<![endif]-->
        <!--[if lte IE 6]>
        <table>
          <tr>
            <td><![endif]-->
        <div class="listHolder">
        <ul id="menu-chiptuning">
            <li>
               <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/" style="background: none;">
                   <div id="button1">
                       <h2>Chiptuning</h2>
                       <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/menu/chiptuning-icon.png" />
                   </div>
               </a>
            </li>
            <li>
                <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/">
                    <div id="button2">
                        <h2>Response Control</h2>
                        <img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/menu/response-icon.png" />
                    </div>
                </a>
            </li>
        </ul>
        </div>

      </li>
      <li id="menu-item-2525" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a
          href="#">О RaceChip</a>
        <ul class="sub-menu">
          <li id="menu-item-2633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2633"><a
              href="<?php echo get_bloginfo( 'wpurl' ); ?>/company/">Компания</a></li>
          <li id="menu-item-2632" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2632"><a
              href="<?php echo get_bloginfo( 'wpurl' ); ?>/reviews/">Отзывы</a></li>
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
              href="<?php echo get_bloginfo( 'wpurl' ); ?>/reseller-ukraine/">Украина</a></li>
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
</div></div></div>
<div id="wrapper" class="container_24">