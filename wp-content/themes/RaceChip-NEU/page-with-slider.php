<?php
/* Template Name: with sidebar and slider */

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
              <span>Больше мощности для Вашего автомобиля уже от 2200 грн.</span>
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
              <span class="caption">Свыше 2 200 автомобилей для выбора. Турбодизель и бензин.
                <a class="button-c2a-l" href="/chiptuning">Выбор марки автомобиля</a>
              </span>
            </p>
          </li>
          <li>
            <p>
              <img src="/wp-content/uploads/2012/12/slider_ultimate.jpg" title="" alt="ultimate"/>
              <span class="caption">В наличии для большинства автомобилей от 5200 грн.
                <a href="/racechip-ultimate" class="button-c2a-l">Подробная информация</a>
              </span>
            </p>
          </li>
          <li>
            <p>
              <img src="/wp-content/uploads/2012/11/slider_support.jpg" title="" alt="racechip-support"/>
              <span class="caption">Видео-инструкции по установке, FAQ и обучающие руководства
                <a href="<?php echo get_bloginfo('wpurl');?>/support" target="_blank" class="button-c2a-l">Центр-поддержки</a>
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

<div id="wrapper" class="grid_24">
  <div id="container" class="startseite">
    <div id="content" role="main">
      <?php
        get_template_part( 'loop', 'page' );
      ?>
      <?php get_sidebar(); ?>
    </div>

    <!-- #content -->
  </div>
  <!-- #container -->
</div>

  <div id="mainBottom-single"></div>
  <?php get_footer(); ?>








