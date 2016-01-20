<div class="[racechip_vchoice_class]">
<div class="content-box-head"></div>
<div class="content-head-spacer-vchoice"></div>
<div class="content-box-vchoice clearfix">


    <div class="chiptuning_breadcrump">
        <?php
        $brand = isset( $racechips[ 0 ][ 'name' ] ) ? $racechips[ 0 ][ 'name' ] : 'Name';
        $model = isset( $racechips[ 0 ][ 'model' ] ) ? $racechips[ 0 ][ 'model' ] : 'Model';
        $submodel = isset( $racechips[ 0 ][ 'submodel' ] ) ? $racechips[ 0 ][ 'submodel' ] : 'Submodel';

        $full_car_name = $brand . ' ' . $model . ' ' . $submodel;
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
<table class="details">
  <thead>
  <tr class="head">
    <th colspan="2" class="light sep"><a title="<?=$racechips[ 0 ][ 'title' ] ?>" href="#"  class="performancechart-icon">
        <img src="<?php bloginfo('template_directory'); ?>/images/chiptuning/performancechart-icon.png" title="<?=$full_car_name . ' ' . $racechips[ 0 ][ 'title' ]?>" alt="<?=$full_car_name . ' ' . $racechips[ 0 ][ 'title' ]?>">
      </a><?=$racechips[ 0 ][ 'title' ] ?></th>
  </tr>
  <tr class="tuning">
    <th class="info_head_light top_border">Тюнинг</th>
    <th class="info_head_light top_border inside sep">Изменения</th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
      <td class="light top_border"><?=$racechips[ 0 ][ 'kw' ] ?> кВт</td>
      <td class="light top_border inside sep"> + <?=$racechips[ 0 ][ 'kw_percent' ] ?>%</td>
  </tr>
  <tr class="leistung">
      <td class="light top_border"><?=$racechips[ 0 ][ 'ps' ] ?> л.с.</td>
      <td class="light top_border inside sep"> + <?=$racechips[ 0 ][ 'ps_percent' ] ?>%</td>
  </tr>
  <tr class="leistung">
      <td class="light top_border"><?=$racechips[ 0 ][ 'nm' ] ?> Нм</td>
      <td class="light top_border inside sep">+ <?=$racechips[ 0 ][ 'nm_percent' ] ?>%</td>
  </tr>

  <tr class="tuning">
    <td class="info_head_light top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  </tr>
  <tr class="price">
    <td class="light sep" colspan="2">
      <p onclick="showCalculator();" class="price">
        <span id="europrice"><?=$racechips[ 0 ][ 'price_ua' ]  . $currency ?></span>
        <!--<img title=" Calculate now! " alt="" src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>--></p>
      <br />
      <p class="vat">включая НДС</p>
      <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/>
        Стоимость пересылки в другие страны: <a href="/shipping-and-payment/">здесь</a>
      </p>
    </td>
  </tr>
  <tr class="warenkorb">
    <td class="light sep" colspan="2">
      <div class="button-c2a-l online-message-btn" data-chip="<?=$racechips[ 0 ][ 'title' ] ?>" data-model="<?=$full_car_name?>">Заказать</div>
    </td>
  </tr>
  <tr class="lieferstatus">
    <td class="light stock sep" colspan="2"><span class="bullet green"> </span> Доступен на складе</td>
  </tr>
  <tr class="product-image">
    <td class="light sep" colspan="2">
      <a rel="lytebox[rc-ultimate]"
        href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module-full-size.jpg">
        <img width="196" height="144" title="<?=$full_car_name . ' ' . $racechips[ 0 ][ 'title' ] ?>" alt="<?=$full_car_name . ' ' . $racechips[ 0 ][ 'title' ]?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module.jpg"/></a>
    </td>
  </tr>
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
  </tbody>
</table>

</div>