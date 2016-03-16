<div class="[racechip_vchoice_class]">
<div class="content-box-head"></div>
<div class="content-head-spacer-vchoice"></div>
<div class="content-box-vchoice clearfix">

<div class="chiptuning_breadcrump">
    <?php
        $brand = isset( $racechips[ 0 ][ 'name' ] ) ? $racechips[ 0 ][ 'name' ] : 'Name';
        $model = isset( $racechips[ 0 ][ 'model' ] ) ? $racechips[ 0 ][ 'model' ] : 'Model';
        $submodel = isset( $racechips[ 0 ][ 'submodel' ] ) ? $racechips[ 0 ][ 'submodel' ] : 'Submodel';


        $images_info = get_graph_images($racechips[ 0 ][ 'name' ], $racechips[ 0 ][ 'model' ], $racechips[ 0 ][ 'submodel' ]);

    //d($images);

        $full_car_name = $brand . ' ' . $model . ' ' . $submodel;
        $graph = 0;

        if(!empty($images_info)) {

            $graph_images = array();
            foreach($images_info as $image) {
                $graph_images[$image['ps'] . '-' . $image['nm']] = $image['img'];
            }

            if(isset($racechips[ 1 ][ 'ps' ]) and isset($racechips[ 1 ][ 'nm' ]) and isset($graph_images[$racechips[ 1 ][ 'ps' ] . '-' . $racechips[ 1 ][ 'nm' ]]) )
                $graph = 1;

        }

        //d($graph_images);



    ?>
    <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/">Выбор автомобиля</a> &gt;
    <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/<?php echo urlencode(strtolower($brand)); ?>/"><?=$brand;?></a> &gt;
    <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/<?php echo urlencode(strtolower($brand)) . '/' . urlencode(strtolower($model)) ?>/"><?=$model;?></a>
    &gt; <?=$submodel?>

</div>
<h2><?=$full_car_name?></h2>

<p style="padding-right: 20px;"><strong>Примечание:</strong> Представленные здесь данные о мощности являются
  максимально достижимыми показателями. Фактическая мощность зависит от серийного допуска транспортного средства. Мы
  поставляем RaceChip уже оптимально-настроенным для Вашего автомобиля. Вы также можете сами настраивать мощность на
  RaceChip по своему желанию.</p>


<div class="product_details">
<table class="details info">
  <thead>
  <tr class="head">
    <th class="info"></th>
  </tr>
  <tr class="tuning">
    <th class="info head top_border"> Характеристики </th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
    <td class="info top_border"><?=$racechips[ 0 ][ 'base_kw' ] ?> кВт</td>
  </tr>
  <tr class="leistung">
    <td class="info top_border"><?=$racechips[ 0 ][ 'base_ps' ] ?> л.с</td>
  </tr>
  <tr class="leistung">
    <td class="info top_border"><?=$racechips[ 0 ][ 'base_nm' ] ?> Нм</td>
  </tr>
  <tr class="tuning">
    <td class="info head top_border bottom_border"> Экономия топлива </td>
  </tr>
  <?php if($graph == 1): ?>
  <tr class="performance-graph">
    <th>&nbsp;</th>
  </tr>
  <?php endif; ?>
  <tr class="price">
    <td class="info head"><p>Содержимое</p>
      <ul>
        <li>RaceChip</li>
        <li>Соединительный кабель</li>
        <li>Серийные заглушки</li>
        <li>Кабельные стяжки</li>
        <li>Инструкция по эксплуатации</li>
      </ul></td>
  </tr>
  <tr class="specs">
    <td class="info head bottom_border">Характеристики</td>
  </tr>
  <tr class="specs">
    <td class="info">Процессор</td>
  </tr>
  <tr class="specs">
    <td class="info">Размер ядра</td>
  </tr>
  <tr class="specs">
    <td class="info">Обработка данных</td>
  </tr>
  <tr class="specs">
    <td class="info ico">Настройка мощности</td>
  </tr>
  <tr class="specs">
    <td class="info">Штекер</td>
  </tr>
  <tr class="specs">
    <td class="info case">Корпус</td>
  </tr>
  <tr class="specs">
    <td class="info">Размеры</td>
  </tr>
  </tbody>
</table>

    <? foreach ($racechips as $k => $racechip):

            $theme = 'dark';
            if($racechip[ 'title' ] == 'Ultimate') $theme = 'light';
        ?>


<table class="details">
  <thead>
  <tr class="head">
    <th colspan="2" class="<?=$theme?> sep">
      <a title="RaceChip" href="#"  class="performancechart-icon">
        <img src="<?php bloginfo('template_directory'); ?>/images/chiptuning/performancechart-icon.png" title="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" alt="<?=$full_car_name . ' ' . $racechip[ 'title' ]?> ">
      </a>RaceChip <?=$racechip[ 'title' ] ?></th>
  </tr>
  <tr class="tuning">
    <th class="info_head_<?=$theme?> top_border">Тюнинг</th>
    <th class="info_head_<?=$theme?> top_border inside sep">Изменения</th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
    <td class="<?=$theme?> top_border"><?=$racechip[ 'kw' ] ?> кВт</td>
    <td class="<?=$theme?> top_border inside sep">+ <?=$racechip[ 'kw_percent' ] ?> кВт</td>
  </tr>
  <tr class="leistung">
    <td class="<?=$theme?> top_border"><?=$racechip[ 'ps' ] ?> л.с.</td>
    <td class="<?=$theme?> top_border inside sep">+ <?=$racechip[ 'ps_percent' ] ?> л.с.</td>
  </tr>
  <tr class="leistung">
    <td class="<?=$theme?> top_border"><?=$racechip[ 'nm' ] ?> Нм</td>
    <td class="<?=$theme?> top_border inside sep">+ <?=$racechip[ 'nm_percent' ] ?> Нм</td>
  </tr>
  <tr class="tuning">
    <td class="info_head_<?=$theme?> top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  </tr>
  <?php if($graph == 1): ?>
  <tr class="performance-graph">
      <td class="<?=$theme?> sep" colspan="2">
          <?php

          if(isset($graph_images[$racechip[ 'ps' ] . '-' . $racechip[ 'nm' ]]) ) {
              $file = get_template_directory_uri() .'/images/graph/' . $graph_images[$racechip[ 'ps' ] . '-' . $racechip[ 'nm' ]];

              if(@fopen($file , "r")): ?>
                  <div class="figure">
                      График прироста мощности:
                      <a rel="lytebox[graph]" href="<?=$file ?>" data-lightbox="graph">
                          <img  height="145"
                                title="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>"
                                alt="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>"
                                src="<?=$file ?>"/>
                      </a>
                  </div>
              <?php endif;


          } ?>




      </td>
  </tr>
  <?php endif; ?>
  <tr class="price">
    <td class="<?=$theme?> sep" colspan="2">
      <p class="price"><?=$racechip[ 'price_ua' ] . $currency?></p>
      <br />
      <p class="vat">включая НДС</p>
      <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/>
        Стоимость пересылки в другие страны: <a href="/shipping-and-payment/">здесь</a>
      </p>
    </td>
  </tr>
  <tr class="warenkorb">
    <td class="<?=$theme?> sep" colspan="2">
      <div class="button-c2a-l online-message-btn" data-chip="<?=$racechip[ 'title' ]?>" data-model="<?=$full_car_name ?>">Заказать</div>
    </td>
  </tr>
  <tr class="lieferstatus">
    <td class="<?=$theme?> stock sep" colspan="2"><span class="bullet green"> </span> Доступен на складе </td>
  </tr>
  <tr class="product-image">
    <td class="<?=$theme?> sep" colspan="2">
        <?php if($racechip['title'] == 'Pro 2') { ?>
        <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module-full-size.jpg" title="RaceChip <?=$racechip[ 'title' ]?>">
            <img width="196" height="144" title="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" alt="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module.jpg"/></a>
        <?php } elseif($racechip['title'] == 'Ultimate') { ?>
            <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module-full-size.jpg" title="RaceChip <?=$racechip[ 'title' ]?>">
            <img width="196" height="144" title="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" alt="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module.jpg"/></a>
            <a class="testsieger" href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip-won-the-comparison-test/">
                <img  src="<?php bloginfo('template_directory'); ?>/images/test_badges.png" />
            </a>
        <?php } else { ?>
            <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module-full-size.jpg" title="RaceChip <?=$racechip[ 'title' ]?>">
            <img width="196" height="144" title="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" alt="<?=$full_car_name . ' ' . $racechip[ 'title' ]?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module.jpg"/></a>
        <?php }  ?>

    </td>
  </tr>

  <?php if($racechip['title'] == 'Pro 2') { ?>
      <tr class="specs">
          <td colspan="2" class="dark bottom_border sep"></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">STM8 (24Mhz)</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">8bit</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">24 Млн. / сек</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да" /></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">FCI Automotive</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep case"><span>Термостойкий, армированный стекловолокном пластик, водонепроницаемый</span></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">9,2 см × 10,4 см × 3,6 см</td>
      </tr>
      <tr class="specs" id="legal-tr">
          <td colspan="2" class="dark top_border sep">&nbsp;</td>
      </tr>
  <?php } elseif($racechip['title'] == 'Ultimate') { ?>
      <tr class="specs">
          <td colspan="2" class="light bottom_border sep"></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep"><span class="keyfeatures">ARM Cortex III ™ (48MHz)</span></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep">32bit</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep">48 Млн. / сек</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да" /></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep">FCI Automotive</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep case"><span>Термостойкий, армированный стекловолокном пластик</span></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="light sep">11,5 см × 10,0 см × 4,0 см</td>
      </tr>
      <tr class="specs" id="legal-tr">
          <td colspan="2" class="light top_border sep">&nbsp;</td>
      </tr>
  <?php } else { ?>
      <tr class="specs">
          <td colspan="2" class="dark bottom_border sep"></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">ST62 (8MHz)</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">8bit</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">12 Млн. / сек</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да" /></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">Sub-D</td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep case"><span>Алюминиевый</span></td>
      </tr>
      <tr class="specs">
          <td colspan="2" class="dark sep">7,4 см × 6,3 см × 3,4 см</td>
      </tr>
      <tr class="specs" id="legal-tr">
          <td colspan="2" class="dark top_border sep"><span id="laws_link_1">&nbsp;</td>
      </tr>
  <?php }  ?>

  </tbody>
</table>


<? endforeach; ?>
</div>