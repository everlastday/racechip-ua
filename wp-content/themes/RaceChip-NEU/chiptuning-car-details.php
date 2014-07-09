<div class="[racechip_vchoice_class]">
<div class="content-box-head"></div>
<div class="content-head-spacer-vchoice"></div>
<div class="content-box-vchoice clearfix">


<div class="chiptuning_breadcrump"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля</a>
  &gt;
  <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/"><?php echo ucwords($all_data['model_brend']); ?></a>
  &gt;
  <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/<?php echo $wp_query->query_vars[ 'car_model' ]; ?>/"><?php echo ucwords($wp_query->query_vars[ 'car_model' ]); ?></a>
   &gt;
  <? echo trim(str_ireplace(str_ireplace('-', ' ', $wp_query->query_vars['car_id']) . ' ' . $wp_query->query_vars['car_model'], '', $all_data[ 'vehicle_name' ])); ?>
</div>
<h2><? echo $all_data[ 'vehicle_name' ]; ?></h2>

<p style="padding-right: 20px;"><strong>Примечание:</strong> Представленные здесь данные о мощности являются
  максимально достижимыми показателями. Фактическая мощность зависит от серийного допуска транспортного средства. Мы
  поставляем RaceChip уже оптимально-настроенным для Вашего автомобиля. Вы также можете сами настраивать мощность на
  RaceChip по своему желанию.</p>

<div class="product_details">
<table id="details">
<thead>
<tr class="head">

  <th class="info"></th>
  <th colspan="2" class="dark sep">
<!--    <a  href="http://media.racechip.de/images/charts/rc/racechip----><?// echo $all_data[ 'img_diagram' ]; ?><!--"-->
<!--      rel="lytebox[diagramm]" class="performancechart-icon"><img-->
<!--        src="http://media.racechip.de/images/chiptuning/details/performancechart-icon.png"-->
<!--        alt="--><?// echo $all_data[ 'vehicle_name' ]; ?><!-- RaceChip Leistungsdiagramm" title="RaceChip Leistungsdiagramm"/></a>-->

    RaceChip
  </th>
  <th colspan="2" class="dark sep">
<!--    <a  href="http://media.racechip.de/images/charts/rc/racechip-pro2----><?// echo $all_data[ 'img_diagram' ]; ?><!--"-->
<!--      rel="lytebox[diagramm]" class="performancechart-icon"><img-->
<!--        src="http://media.racechip.de/images/chiptuning/details/performancechart-icon.png"-->
<!--        alt="--><?// echo $all_data[ 'vehicle_name' ]; ?><!-- RaceChip Pro2 Leistungsdiagramm"-->
<!--        title="RaceChip Pro2 Leistungsdiagramm"/></a>-->
    RaceChip Pro2
  </th>
  <th colspan="2" class="light sep">
<!--    <a-->
<!--      href="http://media.racechip.de/images/charts/rc/racechip-ultimate----><?// echo $all_data[ 'img_diagram' ]; ?><!--"-->
<!--      rel="lytebox[diagramm]" class="performancechart-icon"><img-->
<!--        src="http://media.racechip.de/images/chiptuning/details/performancechart-icon.png"-->
<!--        alt="--><?// echo $all_data[ 'vehicle_name' ]; ?><!-- RaceChip CR Ultimate Leistungsdiagramm"-->
<!--        title="RaceChip CR Ultimate Leistungsdiagramm"/></a>-->
    RaceChip CR Ultimate
  </th>
</tr>
<tr class="tuning">
  <th class="info head top_border">Характеристики</th>
  <th class="info_head_dark top_border">Тюнинг</th>
  <th class="info_head_dark top_border inside sep">Изменения</th>
  <th class="info_head_dark top_border">Тюнинг</th>
  <th class="info_head_dark top_border inside sep">Изменения</th>
  <th class="info_head_light top_border">Тюнинг</th>
  <th class="info_head_light top_border inside sep">Изменения</th>
</tr>
</thead>
<tbody>

<tr class="leistung">
  <td class="info top_border"><?= $all_data[ 'power' ] ?> kW</td>
  <td class="dark top_border"><?= $all_data[ 0 ][ 'power' ] ?> kW</td>
  <td class="dark top_border inside sep">
    + <?= round( ( $all_data[ 0 ][ 'power' ] / ( $all_data[ 'power' ] / 100 ) ) - 100 ) ?>%
  </td>
  <td class="dark top_border"><?= $all_data[ 1 ][ 'power' ] ?> kW</td>
  <td class="dark top_border inside sep">
    + <?= round( ( $all_data[ 1 ][ 'power' ] / ( $all_data[ 'power' ] / 100 ) ) - 100 ) ?>%
  </td>
  <td class="light top_border"><span class="keyfeatures"><?= $all_data[ 2 ][ 'power' ] ?> kW</span></td>
  <td class="light top_border inside sep">
    + <?= round( ( $all_data[ 2 ][ 'power' ] / ( $all_data[ 'power' ] / 100 ) ) - 100 ) ?>%
  </td>
</tr>
<tr class="leistung">
  <td class="info top_border"><?= round( ( $all_data[ 'power' ] * 1.36 ) ) ?> PS</td>
  <td class="dark top_border"><?= round( ( $all_data[ 0 ][ 'power' ] * 1.36 ) ) ?> PS</td>
  <td class="dark top_border inside sep">
    + <?= round( ( $all_data[ 0 ][ 'power' ] / ( $all_data[ 'power' ] / 100 ) ) - 100 ) ?>%
  </td>
  <td class="dark top_border"><?= round( ( $all_data[ 1 ][ 'power' ] * 1.36 ) ) ?> PS</td>
  <td class="dark top_border inside sep">
    + <?= round( ( $all_data[ 1 ][ 'power' ] / ( $all_data[ 'power' ] / 100 ) ) - 100 ) ?>%
  </td>
  <td class="light top_border"><span class="keyfeatures"><?= round( ( $all_data[ 2 ][ 'power' ] * 1.36 ) ) ?> PS</span>
  </td>
  <td class="light top_border inside sep">
    + <?= round( ( $all_data[ 2 ][ 'power' ] / ( $all_data[ 'power' ] / 100 ) ) - 100 ) ?>%
  </td>
</tr>
<tr class="leistung">
  <td class="info top_border"><?= $all_data[ 'torque' ] ?> Nm</td>
  <td class="dark top_border"><?= $all_data[ 0 ][ 'torque' ] ?> Nm</td>
  <td class="dark top_border inside sep">
    + <?= round( ( $all_data[ 0 ][ 'torque' ] / ( $all_data[ 'torque' ] / 100 ) ) - 100 ) ?>%
  </td>
  <td class="dark top_border"><?= $all_data[ 1 ][ 'torque' ] ?> Nm</td>
  <td class="dark top_border inside sep">
    + <?= round( ( $all_data[ 1 ][ 'torque' ] / ( $all_data[ 'torque' ] / 100 ) ) - 100 ) ?>%
  </td>
  <td class="light top_border"><span class="keyfeatures"><?= $all_data[ 2 ][ 'torque' ] ?> Nm</span></td>
  <td class="light top_border inside sep">
    + <?= round( ( $all_data[ 2 ][ 'torque' ] / ( $all_data[ 'torque' ] / 100 ) ) - 100 ) ?>%
  </td>
</tr>
<tr class="tuning">
  <td class="info head top_border bottom_border">Экономия топлива</td>
  <td class="info_head_dark top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  <td class="info_head_dark top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  <td class="info_head_light top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
</tr>
<tr class="price">
  <td class="info head" rowspan="4">
    <p>Содержимое</p>
    <ul>
      <li>RaceChip</li>
      <li>Соединительный кабель</li>
      <li>Серийные заглушки</li>
      <li>Кабельные стяжки</li>
      <li>Инструкция по эксплуатации</li>
    </ul>
  </td>
  <td class="dark sep" colspan="2"><p onclick="showCalculator();" class="price"><span
        id="europrice"><?= $all_data[ 'price_standart' ] . '' . $all_data[ 'currency' ]; ?></span>
<!--      <img title=" Calculate now! " alt="" src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/></p>-->

    <p class="vat">включая НДС</p>

    <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/><a href="/shipping-and-payment/">Стоимость пересылки
        в другие страны: <span>здесь</span></a></p></td>
  <td class="dark sep" colspan="2"><p onclick="showCalculator();" class="price"><span
        id="europrice1"><?= $all_data[ 'price_pro' ] . ''; ?></span><?= $all_data[ 'currency' ]; ?>
<!--      <img title=" Calculate now! " alt=""  src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>-->
    </p>

    <p class="vat">включая НДС</p>

    <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/><a href="/shipping-and-payment/">Стоимость пересылки
        в другие страны: <span>здесь</span></a></p></td>
  <td class="light sep" colspan="2"><p onclick="showCalculator();" class="price"><span
        id="europrice2"><?= $all_data[ 'price_ultimate' ] . '' . $all_data[ 'currency' ]; ?></span>
<!--      <img title=" Calculate now! " alt="" src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>-->
    </p>

    <p class="vat">включая НДС</p>

    <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/><a href="/shipping-and-payment/">Стоимость пересылки
        в другие страны: <span>здесь</span></a></p></td>

</tr>
<tr class="warenkorb">
  <td class="dark sep" colspan="2">
    <div class="button-c2a-l online-message-btn" data-chip="RaceChip" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>

  </td>
  <td class="dark sep" colspan="2">
    <div class="button-c2a-l online-message-btn" data-chip="RaceChip Pro2" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
  </td>
  <td class="light sep" colspan="2">
    <div class="button-c2a-l online-message-btn" data-chip="RaceChip Ultimate" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
  </td>
</tr>
<tr class="lieferstatus">
  <td class="dark stock sep" colspan="2"><span class="bullet green">&nbsp;</span> Есть в наличии</td>
  <td class="dark stock sep" colspan="2"><span class="bullet green">&nbsp;</span> Есть в наличии</td>
  <td colspan="2" class="light stock sep"><span class="bullet green">&nbsp;</span> Есть в наличии</td>
</tr>
<tr class="product-image">
  <td class="dark sep" colspan="2"><a rel="lytebox[racechip]"
     href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module-full-size.jpg" title="RaceChip">
      <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module.jpg"/></a>
  </td>
  <td class="dark sep" colspan="2">
    <a rel="lytebox[racechip-pro2]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module-full-size.jpg" title="RaceChip Pro2">
      <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Pro2" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Pro2" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module.jpg"/></a>
  </td>
  <td colspan="2" class="light sep">
    <a rel="lytebox[rc-ultimate]"
       href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module-full-size.jpg">
        <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module.jpg"/></a>
  </td>

</tr>
<tr class="specs">
  <td class="info head bottom_border">Характеристики</td>
  <td colspan="2" class="dark bottom_border sep">&nbsp;</td>
  <td colspan="2" class="dark bottom_border sep">&nbsp;</td>
  <td colspan="2" class="light bottom_border sep">&nbsp;</td>
</tr>
<tr class="specs">
  <td class="info">Процессор</td>
  <td colspan="2" class="dark sep">ST62 (8MHz)</td>
  <td colspan="2" class="dark sep">STM8 (24Mhz)</td>
  <td colspan="2" class="light sep"><span class="keyfeatures">ARM Cortex &#8546; &trade; (48MHz)</span></td>
</tr>
<tr class="specs">
  <td class="info">Размер ядра</td>
  <td colspan="2" class="dark sep">8bit</td>
  <td colspan="2" class="dark sep">8bit</td>
  <td colspan="2" class="light sep">32bit</td>
</tr>

<tr class="specs">
  <td class="info">Обработка данных</td>
  <td colspan="2" class="dark sep">12 Mio.</td>
  <td colspan="2" class="dark sep">24 Mio. / Sek.</td>
  <td colspan="2" class="light sep">48 Mio.</td>
</tr>

<tr class="specs">
  <td class="info">Настройка мощности</td>
  <td colspan="2" class="dark sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да" /></td>
  <td colspan="2" class="dark sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да" /></td>
  <td colspan="2" class="light sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да" /></td>
</tr>

<tr class="specs">
  <td class="info">Штекер</td>
  <td colspan="2" class="dark sep">Sub-D</td>
  <td colspan="2" class="dark sep">FCI Automotive</td>
  <td colspan="2" class="light sep">FCI Automotive</td>
</tr>
<tr class="specs">

  <td class="info">Корпус</td>
  <td colspan="2" class="dark sep"><span>Алюминиевый</span></td>
  <td colspan="2" class="dark sep">
    <span>Термостойкий, армированный стекловолокном пластик, водонепроницаемый</span></td>
  <td colspan="2" class="light sep"><span>Термостойкий, армированный стекловолокном пластик</span></td>
</tr>
<tr class="specs">
  <td class="info">Размеры</td>
  <td colspan="2" class="dark sep">7,4 cm &times; 6,3 cm &times; 3,4 cm</td>
  <td colspan="2" class="dark sep">9,2 cm &times; 10,4 cm &times; 3,6 cm</td>
  <td colspan="2" class="light sep">11,5 cm &times; 10,0 cm &times; 4,0 cm</td>
</tr>
</tbody>
</table>
</div>


<div id="fog" style="display:none">
  <img src="/wp-content/plugins/rcclient//includes/themefunctions/currencies/pixel_trans.gif" alt=""
       title="Klicken zum Schließen" onclick="hideCalculator()" width="100%" height="100%"/>
</div>

<div id="currency-converter" style="display:none">
  <div id="currency-converter-close"><img
      src="/wp-content/plugins/rcclient//includes/themefunctions/currencies/3col-close.png"
      alt="Klicken zum Schließen" title="Klicken zum Schließen" width="75" height="30" onclick="hideCalculator()"/>
  </div>
  <h2 class="like-h1">Währungsrechner</h2>

  <div id="price-title1">RaceChip TB</div>
  <div id="price-title2">RaceChip TB Pro2</div>
  <div id="price-title3">RaceChip TB Ultimate</div>
  <div id="price-rc1"></div>
  <div id="price-rc2"></div>
  <div id="price-rc3"></div>
  <div id="price-calc1">&nbsp;</div>
  <div id="price-calc3">&nbsp;</div>

  <p>Bitte beachten Sie, dass der Währungsrechner lediglich zur Information dient. Bezahlt wird ausschließlich in
    Euro.</p>

  <h3>Wählen Sie Ihre Währung</h3>

  <div id="currency-selector" dir="rtl">
    <table cellspacing="0" cellpadding="0" id="currency-listing">
    </table>
  </div>
</div>
<script type="text/javascript">
  rcPrice1 = 299;
  rcPrice3 = 549;
  initCalculator();
</script>
</div>
<div class="content-foot-vchoice"></div>
</div>
