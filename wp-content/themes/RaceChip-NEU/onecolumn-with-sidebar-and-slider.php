<?php
  /**
   * Template Name: One coulum with slider
   *
   * A custom page template with sidebar and slider for main page.
   *
   * The "Template Name:" bit above allows this to be selectable
   * from a dropdown menu on the edit page screen.
   *
   * @package WordPress
   * @subpackage Twenty_Ten
   * @since Twenty Ten 1.0
   */

  get_header(); ?>

<div id="slider">
  <div class="slider-top"></div>
  <div class="slider-inhalt">

    <div id="featurelist-slider">
      <div id="feature_list">
        <ul id="tabs">
          <li>
            <a href="">
              <span class="title">Чиптюнинг</span>
              <span>Больше мощности для Вашего автомобиля уже от 129 евро.</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="title">RaceChip® Ultimate</span>
              <span>Наша новейшая разработка в области чиптюнинга.</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="title">Центр сервисной поддержки клиентов</span>
              <span>Видео-, фото-инструкции.</span>
            </a>
          </li>
        </ul>
        <ul id="output">
          <li>
            <p>
              <img title="" src="/wp-content/uploads/2012/12/slider_chiptuning.jpg" alt="chiptuning"/>
              <span class="caption">Uber 2.200 Fahrzeuge zur Auswahl. Turbodiesel & Benziner.
                <a class="button-c2a-l" href="/chiptuning">Выбор марки автомобиля</a>
              </span>
            </p>
          </li>
          <li>
            <p>
              <img src="/wp-content/uploads/2012/12/slider_ultimate.jpg" title="" alt="ultimate"/>
              <span class="caption">Verf&uuml;gbar f&uuml;r zahlreiche Fahrzeuge ab 479 Euro.
                <a href="/racechip-ultimate" class="button-c2a-l">Подробная информация</a>
              </span>
            </p>
          </li>
          <li>
            <p>
              <img src="/wp-content/uploads/2012/11/slider_support.jpg" title="" alt="racechip-support"/>
              <span class="caption">Видео-инструкции по установке, FAQ и обучающие руководства
                <a href="<?php get_bloginfo('wpurl');?>/support/" target="_blank" class="button-c2a-l">Центр-поддержки</a>
              </span>
            </p>
          </li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
      jQuery(function ($) {
        $("ul#tabs").tabs("ul#output > li", {

          // enable "cross-fading" effect
          effect: 'fade',
          fadeOutSpeed: "slow",

          // start from the beginning after the last tab
          rotate: true

          // use the slideshow plugin. It accepts its own configuration
        }).slideshow({autoplay: true, interval: 5000, clickable: false});
      });
    </script>
  </div>
  <div class="slider-bottom"></div>
</div>

<div id="main" class="grid_24">
  <div id="container" class="grid_19">
    <div id="content" role="main">
      <?php
        get_template_part( 'loop', 'page' );
      ?>
    </div>
    <!-- #content -->
  </div>
  <!-- #container -->

  <div class="grid_5"><?php get_sidebar(); ?></div>
  <div id="mainBottom-single"></div>
  <?php get_footer(); ?>
