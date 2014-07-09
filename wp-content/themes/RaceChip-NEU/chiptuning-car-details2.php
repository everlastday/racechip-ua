<div class="[racechip_vchoice_class]">
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="chiptuning_breadcrump"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля</a>
    &gt;
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/"><?php echo ucwords($all_data['model_brend']); ?></a>
    &gt;
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/<?php echo $wp_query->query_vars[ 'car_model' ]; ?>/"><?php echo ucwords($wp_query->query_vars[ 'car_model' ]); ?></a>
    &gt;
    <? echo trim(str_ireplace(str_ireplace('-', ' ', $wp_query->query_vars['car_id']) . ' ' . $wp_query->query_vars['car_model'], '', $all_data[ 'vehicle_name' ])); ?>
  </div><br>
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
        <th colspan="2" class="light sep" style="width: 330px;">RaceChip TB Ultimate</th>
        <th rowspan="2" class="light info_box"><h3>Дополнительный вид</h3></th>
      </tr>
      <tr class="tuning">
        <th class="info head top_border">Характеристики</th>
        <th class="info_head_light top_border">Тюнинг</th>
        <th class="info_head_light top_border inside sep">Изменения</th>
      </tr>
      </thead>
      <tbody>

      <tr class="leistung">
        <td class="info top_border"><?=$all_data['power'] ?> kW</td>
        <td class="light top_border"><span class="keyfeatures"><?=$all_data[0]['power']?> kW</span></td>
        <td class="light top_border inside sep">+ <?= round(($all_data[0]['power'] /($all_data['power'] / 100))-100) ?>%</td>
        <td class="light info_box" rowspan="17">
          <a rel="lytebox[racechip-ultimate-addview]"
             href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-view-1-full-size.jpg">
            <img width="200" height="150" class="addview" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate"
              src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-view-1.jpg"/></a><br/>
          <br/>
          <a rel="lytebox[racechip-ultimate-addview]"
             href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-view-2-full-size.jpg">
            <img width="200" height="150" class="addview" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate"
              src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-view-2.jpg"/></a><br/>
          <br/>
          <a rel="lytebox[racechip-ultimate-addview]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-view-3-full-size.jpg">
            <img width="200" height="150" class="addview" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip Ultimate"
              src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-view-3.jpg"/></a>
        </td>
      </tr>
      <tr class="leistung">
        <td class="info top_border"><?=round(($all_data['power'] * 1.36))?> PS</td>
        <td class="light top_border"><span class="keyfeatures"><?=round(($all_data[0]['power'] * 1.36))?> PS</span></td>
        <td class="light top_border inside sep">+ <?= round(($all_data[0]['power'] /($all_data['power'] / 100))-100) ?>%</td>
      </tr>
      <tr class="leistung">
        <td class="info top_border"><?=$all_data['torque'] ?> Nm</td>
        <td class="light top_border"><span class="keyfeatures"><?=$all_data[0]['torque']?> Nm</span></td>
        <td class="light top_border inside sep">+ <?= round(($all_data[0]['torque'] /($all_data['torque'] / 100))-100) ?>%</td>
      </tr>
      <tr class="tuning">
        <td class="info head top_border bottom_border">Экономия топлива</td>
        <td class="info_head_light top_border bottom_border sep" colspan="2">до 1л/100 км</td>
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
        <td class="light sep" colspan="2"><p class="price"><?=($all_data['engine_type'] == 2 or $all_data['engine_type'] == 1) ? $all_data['price_ultimate_new'] : $all_data['price_ultimate'] ?><?=$all_data['currency']?>
<!--            <img title=" Calculate now! " alt=""  src="http://media.racechip.de/images/chiptuning/details/currency-converter-open.png"/>-->
          </p>

          <p class="vat">включая НДС</p>

          <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/><a href="/shipping-and-payment/">Стоимость пересылки в
              другие страны: <span>здесь</span></a></p></td>

      </tr>
      <tr class="warenkorb">
        <td class="light sep" colspan="2">
          <div style="width: 300px;" class="button-c2a-l online-message-btn" data-chip="RaceChip TB Ultimate" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
        </td>
      </tr>
      <tr class="lieferstatus">
        <td colspan="2" class="light stock sep"><span class="bullet green">&nbsp;</span> Есть в наличии</td>
      </tr>
      <tr class="product-image">
        <td colspan="2" class="light sep">
          <div id="neuheit-rosette">Neu!</div>
          <a rel="lytebox[rc-ultimate]"
             href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module-full-size.jpg">
            <img width="196" height="144" title="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip TB Ultimate" alt="<? echo $all_data[ 'vehicle_name' ]; ?> RaceChip TB Ultimate"
              src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module.jpg"/></a>
        </td>

      </tr>
      <tr class="specs">
        <td class="info head bottom_border">Характеристики</td>
        <td colspan="2" class="light bottom_border sep">&nbsp;</td>
      </tr>
      <tr class="specs">
        <td class="info">Процессор</td>
        <td colspan="2" class="light sep"><span class="keyfeatures">ARM Cortex &#8546; &trade; (48MHz)</span></td>
      </tr>
      <tr class="specs">
        <td class="info">Размер ядра</td>
        <td colspan="2" class="light sep">32bit</td>
      </tr>

      <tr class="specs">
        <td class="info">Обработка данных</td>
        <td colspan="2" class="light sep">48 Mio.</td>
      </tr>

      <tr class="specs">
        <td class="info">Настройка мощности</td>
        <td colspan="2" class="light sep"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/yea.png" alt="Да" title="Да"/></td>
      </tr>

      <tr class="specs">
        <td class="info">Штекер</td>
        <td colspan="2" class="light sep">FCI Automotive</td>
      </tr>
      <tr class="specs">

        <td class="info">Корпус</td>
        <td colspan="2" class="light sep"><span>Термостойкий, армированный стекловолокном пластик</span></td>
      </tr>
      <tr class="specs">
        <td class="info">Размеры</td>
        <td colspan="2" class="light sep">11,5 cm &times; 10,0 cm &times; 4,0 cm</td>
      </tr>
<!--      <tr class="specs" id="legal-tr">-->
<!--        <td class="info head top_border">Внимание!<br/>Важное примечание.</td>-->
<!--        <td colspan="2" class="light top_border sep"><span id="laws_link_1"><a href="/rechtliche-hinweise/">Обратите-->
<!--              внимание на правовые предписания</a> </span></td>-->
<!--      </tr>-->
      </tbody>
    </table>
  </div>
  <script type="text/javascript" src="/converter.js"></script>
</div>