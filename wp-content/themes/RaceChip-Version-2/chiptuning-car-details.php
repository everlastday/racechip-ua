<div class="[racechip_vchoice_class]">
<div class="content-box-head"></div>
<div class="content-head-spacer-vchoice"></div>
<div class="content-box-vchoice clearfix">

<div class="chiptuning_breadcrump"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля</a>
  &gt;
  <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/"><?php echo ucwords(urldecode($all_data['model_brend'])); ?></a>
  &gt;
  <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/<?php echo $wp_query->query_vars[ 'car_model' ]; ?>/"><?php echo ucwords(urldecode($wp_query->query_vars[ 'car_model' ])); ?></a>
   &gt;
  <? echo trim(str_ireplace(str_ireplace('-', ' ', $wp_query->query_vars['car_id']) . ' ' . $wp_query->query_vars['car_model'], '', $all_data[ 'vehicle_name' ])); ?>
</div>
<h2><? echo $all_data[ 'vehicle_name' ]; ?></h2>

<p style="padding-right: 20px;"><strong>Примечание:</strong> Представленные здесь данные о мощности являются
  максимально достижимыми показателями. Фактическая мощность зависит от серийного допуска транспортного средства. Мы
  поставляем RaceChip уже оптимально-настроенным для Вашего автомобиля. Вы также можете сами настраивать мощность на
  RaceChip по своему желанию.</p>
<?php

function rc_ps($ps) {
  return round( ( $ps * 1.36 ) );
}

function rc_perc_chg($chg_param, $basic_param) {
  return round( ( $chg_param / ( $basic_param / 100 ) ) - 100 );
}

?>


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
    <td class="info top_border"><?= $all_data[ 'power' ] ?> kW</td>
  </tr>
  <tr class="leistung">
    <td class="info top_border"><?= rc_ps( $all_data[ 'power' ] ) ?> PS</td>
  </tr>
  <tr class="leistung">
    <td class="info top_border"><?= $all_data[ 'torque' ] ?> Nm</td>
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
    <th colspan="2" class="dark sep">
      <a title="RaceChip" href="#"  class="performancechart-icon">
        <img src="<?php bloginfo('template_directory'); ?>/images/chiptuning/performancechart-icon.png" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip">
      </a>RaceChip</th>
  </tr>
  <tr class="tuning">
    <th class="info_head_dark top_border">Тюнинг</th>
    <th class="info_head_dark top_border inside sep">Изменения</th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
    <td class="dark top_border"><?= $all_data[ 0 ][ 'power' ] ?> kW</td>
    <td class="dark top_border inside sep">+ <?= rc_perc_chg( $all_data[ 0 ][ 'power' ], $all_data[ 'power' ])?>%</td>
  </tr>
  <tr class="leistung">
    <td class="dark top_border"><?= rc_ps( $all_data[ 0 ][ 'power' ]); ?> PS</td>
    <td class="dark top_border inside sep">+ <?= rc_perc_chg( $all_data[ 0 ][ 'power' ], $all_data[ 'power' ])?>%</td>
  </tr>
  <tr class="leistung">
    <td class="dark top_border"><?= $all_data[ 0 ][ 'torque' ] ?> Nm</td>
    <td class="dark top_border inside sep">+ <?= rc_perc_chg( $all_data[ 0 ][ 'torque' ],  $all_data[ 'torque' ] ); ?>%</td>
  </tr>
  <tr class="tuning">
    <td class="info_head_dark top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  </tr>
  <tr class="price">
    <td class="dark sep" colspan="2">
      <p onclick="showCalculator();" class="price">
        <span id="europrice"><?= $all_data[ 'price_standart' ] . '' . $all_data[ 'currency' ]; ?></span>
        <!--<img title=" Calculate now! " alt="" src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>--></p>
      <br />
      <p class="vat">включая НДС</p>
      <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/>
        Стоимость пересылки в другие страны: <a href="/shipping-and-payment/">здесь</a>
      </p>
    </td>
  </tr>
  <tr class="warenkorb">
    <td class="dark sep" colspan="2">
      <div class="button-c2a-l online-message-btn" data-chip="RaceChip" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
    </td>
  </tr>
  <tr class="lieferstatus">
    <td class="dark stock sep" colspan="2"><span class="bullet green"> </span> Доступен на складе </td>
  </tr>
  <tr class="product-image">
    <td class="dark sep" colspan="2">
      <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module-full-size.jpg" title="RaceChip">
        <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module.jpg"/></a>
    </td>
  </tr>
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
  </tbody>
</table>
<table class="details">
  <thead>
  <tr class="head">
    <th colspan="2" class="dark sep">
      <a title="RaceChip" href="#"  class="performancechart-icon">
        <img src="<?php bloginfo('template_directory'); ?>/images/chiptuning/performancechart-icon.png" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Pro2" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Pro2">
      </a>RaceChip Pro2</th>
  </tr>
  <tr class="tuning">
    <th class="info_head_dark top_border">Тюнинг</th>
    <th class="info_head_dark top_border inside sep">Изменения</th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
    <td class="dark top_border"><?= $all_data[ 1 ][ 'power' ] ?> kW</td>
    <td class="dark top_border inside sep"> + <?= rc_perc_chg($all_data[ 1 ][ 'power' ], $all_data[ 'power' ]); ?>%</td>
  </tr>
  <tr class="leistung">
    <td class="dark top_border"><?= rc_ps( $all_data[ 1 ][ 'power' ]); ?> PS</td>
    <td class="dark top_border inside sep"> + <?= rc_perc_chg($all_data[ 1 ][ 'power' ], $all_data[ 'power' ]); ?>%</td>
  </tr>
  <tr class="leistung">
    <td class="dark top_border"><?= $all_data[ 1 ][ 'torque' ] ?> Nm</td>
    <td class="dark top_border inside sep">+ <?= rc_perc_chg( $all_data[ 1 ][ 'torque' ], $all_data[ 'torque' ]); ?>%</td>
  </tr>
  <tr class="tuning">
    <td class="info_head_dark top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  </tr>
  <tr class="price">
    <td class="dark sep" colspan="2">
      <p onclick="showCalculator();" class="price"><span id="europrice1"><?= $all_data[ 'price_pro' ] . ''; ?></span><?= $all_data[ 'currency' ]; ?>
        <!-- <img title=" Calculate now! " alt=""  src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>-->
      </p>
      <br />
      <p class="vat">включая НДС</p>
      <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/>Стоимость пересылки в другие страны: <a href="/shipping-and-payment/">здесь</a></p>
    </td>
  </tr>
  <tr class="warenkorb">
    <td class="dark sep" colspan="2">
      <div class="button-c2a-l online-message-btn" data-chip="RaceChip Pro2" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
    </td>
  </tr>
  <tr class="lieferstatus">
    <td class="dark stock sep" colspan="2"><span class="bullet green"> </span> Доступен на складе</td>
  </tr>
  <tr class="product-image">
    <td class="dark sep" colspan="2">
      <a rel="lytebox[racechip-pro2]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module-full-size.jpg" title="RaceChip Pro2">
        <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Pro2" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Pro2" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module.jpg"/>
      </a>
    </td>
  </tr>
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
  </tbody>
</table>
<table class="details">
  <thead>
  <tr class="head">
    <th colspan="2" class="light sep">
      <a title="RaceChip" href="#"  class="performancechart-icon">
        <img src="<?php bloginfo('template_directory'); ?>/images/chiptuning/performancechart-icon.png" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate">
      </a>RaceChip CR Ultimate</th>
  </tr>
  <tr class="tuning">
    <th class="info_head_light top_border">Тюнинг</th>
    <th class="info_head_light top_border inside sep">Изменения</th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
    <td class="light top_border"><?= $all_data[ 2 ][ 'power' ] ?> kW</td>
    <td class="light top_border inside sep"> + <?=rc_perc_chg($all_data[ 2 ][ 'power' ], $all_data[ 'power' ]); ?>%</td>
  </tr>
  <tr class="leistung">
    <td class="light top_border"><?= rc_ps( $all_data[ 2 ][ 'power' ] ); ?> PS</td>
    <td class="light top_border inside sep"> + <?=rc_perc_chg($all_data[ 2 ][ 'power' ], $all_data[ 'power' ]); ?>%</td>
  </tr>
  <tr class="leistung">
    <td class="light top_border"><?= $all_data[ 2 ][ 'torque' ] ?> Nm</td>
    <td class="light top_border inside sep">+ <?= rc_perc_chg($all_data[ 2 ][ 'torque' ], $all_data[ 'torque' ] ); ?>%</td>
  </tr>
  <tr class="tuning">
    <td class="info_head_light top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  </tr>
  <tr class="price">
    <td class="light sep" colspan="2">
      <p onclick="showCalculator();" class="price"><span id="europrice2"><?= $all_data[ 'price_ultimate' ] . '' . $all_data[ 'currency' ]; ?></span>
          <!--<img title=" Calculate now! " alt="" src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>-->
      </p>
      <br />
      <p class="vat">включая НДС</p>
      <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/>Стоимость пересылки в другие страны: <a href="/shipping-and-payment/">здесь</a></p>
    </td>
  </tr>
  <tr class="warenkorb">
    <td class="light sep" colspan="2">
      <div class="button-c2a-l online-message-btn" data-chip="RaceChip Ultimate" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
    </td>
  </tr>
  <tr class="lieferstatus">
    <td class="light stock sep" colspan="2"><span class="bullet green"> </span> Доступен на складе</td>
  </tr>
  <tr class="product-image">
    <td class="light sep" colspan="2">
      <a rel="lytebox[rc-ultimate]"
        href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module-full-size.jpg">
        <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module.jpg"/></a>
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