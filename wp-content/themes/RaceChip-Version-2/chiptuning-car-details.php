<div class="[racechip_vchoice_class]">
<div class="content-box-head"></div>
<div class="content-head-spacer-vchoice"></div>
<div class="content-box-vchoice clearfix">

<div class="chiptuning_breadcrump">
    <?php
        $brand = isset( $racechips[ 0 ][ 'name' ] ) ? $racechips[ 0 ][ 'name' ] : '';
        $model = isset( $racechips[ 0 ][ 'model' ] ) ? str_replace('from', 'с', $racechips[ 0 ][ 'model' ]) : '';
        $submodel = isset( $racechips[ 0 ][ 'submodel' ] ) ? str_replace(['HP', 'kW', 'NM'], ['л.с', 'кВт', ' Нм'], $racechips[ 0 ][ 'submodel' ]) : '';
        $images_info = get_graph_images($racechips[ 0 ][ 'name' ], $racechips[ 0 ][ 'model' ], $racechips[ 0 ][ 'submodel' ]);


        $images_info = get_graph_images($racechips[ 0 ][ 'name' ], $racechips[ 0 ][ 'model' ], $racechips[ 0 ][ 'submodel' ]);

        $full_car_name = $brand . ' ' . $model . ' ' . $submodel;
        $graph = 0;

        if(!empty($images_info)) {

          $graph_images = array();
          foreach($images_info as $image) {
            $graph_images[$image['ps'] . '-' . $image['class'] ] = $image['img'];
          }
          if(isset($racechips[ 1 ][ 'hp' ]) and isset($graph_images[$base['hp'] . '-' . $image['class']]) )
            $graph = 1;
        }

        $brand_url = isset( $racechips[ 0 ][ 'brand_url' ] ) ? $racechips[ 0 ][ 'brand_url' ] : '';
        $model_url = isset( $racechips[ 0 ][ 'model_url' ] ) ? $racechips[ 0 ][ 'model_url' ] : '';

    ?>
    <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/">Выбор автомобиля</a> &gt;
    <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/<?=$brand_url  ?>/"><?=$brand;?></a> &gt;
    <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/<?=$brand_url . '/' . $model_url  ?>/"><?=$model;?></a> &gt; <?=$submodel?>

</div>
<h2><?=$full_car_name?></h2>
<?php if($racechips[0][ 'type' ] == 'one' or $racechips[0][ 'type' ] == 'pro2' or $racechips[0][ 'type' ] == 'ultimate'): ?>
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
    <td class="info top_border"><?=$base[ 'kw' ] ?> кВт</td>
  </tr>
  <tr class="leistung">
    <td class="info top_border"><?=$base[ 'hp' ] ?> л.с</td>
  </tr>
  <tr class="leistung">
    <td class="info top_border"><?=$base[ 'nm' ] ?> Нм</td>
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
	  if($racechip[ 'type' ] == 'one' or $racechip[ 'type' ] == 'pro2' or $racechip[ 'type' ] == 'ultimate'):
	  $theme = 'dark';
	  if($racechip[ 'type' ] == 'ultimate') $theme = 'light';
	?>

<table class="details">
  <thead>
  <tr class="head">
    <th colspan="2" class="<?=$theme?> sep">
      <a title="RaceChip" href="#"  class="performancechart-icon">
        <img src="<?php bloginfo('template_directory'); ?>/images/chiptuning/performancechart-icon.png" title="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" alt="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?> ">
      </a>RaceChip <?=ucfirst($racechip[ 'type' ])  ?></th>
  </tr>
  <tr class="tuning">
    <th class="info_head_<?=$theme?> top_border">Тюнинг</th>
    <th class="info_head_<?=$theme?> top_border inside sep">Изменения</th>
  </tr>
  </thead>
  <tbody>
  <tr class="leistung">
    <td class="<?=$theme?> top_border"><?=convert_hp_to_kw($racechip[ 'hp' ])  + $base['kw']  ?> кВт</td>
    <td class="<?=$theme?> top_border inside sep">+ <?=convert_hp_to_kw($racechip[ 'hp' ])?> кВт</td>
  </tr>
  <tr class="leistung">
    <td class="<?=$theme?> top_border"><?=$racechip[ 'hp' ] + $base['hp'] ?> л.с.</td>
    <td class="<?=$theme?> top_border inside sep">+ <?=$racechip[ 'hp' ] ?> л.с.</td>
  </tr>
  <tr class="leistung">
    <td class="<?=$theme?> top_border"><?=$racechip[ 'nm' ] + $base['nm'] ?> Нм</td>
    <td class="<?=$theme?> top_border inside sep">+ <?=$racechip[ 'nm' ] ?> Нм</td>
  </tr>
  <tr class="tuning">
    <td class="info_head_<?=$theme?> top_border bottom_border sep" colspan="2">до 1л / 100 км</td>
  </tr>
  <?php if($graph == 1): ?>
  <tr class="performance-graph">
      <td class="<?=$theme?> sep" colspan="2">
	      <?php
	      if($racechip[ 'type' ] == 'pro2' or $racechip[ 'type' ] == 'ultimate') {
		      $module_type = ($racechip[ 'type' ] == 'Pro 2') ? 'rc-pro' : 'rc-ultimate';
	      } else {
		      $module_type = strtolower($racechip[ 'type' ]);
	      }

	      $hp_on_image = $base['hp'] . '-' . $module_type;

	      if(isset($graph_images[$hp_on_image]) ):
		      $file = get_template_directory_uri() .'/images/graph/' . $graph_images[$hp_on_image];
		      $file_root_path = get_theme_root( ) . '/' . get_template() . '/images/graph/' . $graph_images[$hp_on_image];

		      if(file_exists($file_root_path)): ?>
                <div class="figure">
                  График прироста мощности:
                  <a rel="lytebox[graph]" href="<?=$file ?>" data-lightbox="graph">
                    <img  height="145"
                          title="<?=$full_car_name . ' RaceChip ' . ucfirst($racechip[ 'type' ])?>"
                          alt="<?=$full_car_name . ' RaceChip ' . ucfirst($racechip[ 'type' ])?>"
                          src="<?=$file ?>"/>
                  </a>
                </div>
		      <?php endif;
	      endif; ?>
      </td>
  </tr>
  <?php endif; ?>
  <tr class="price">
    <td class="<?=$theme?> sep" colspan="2">
      <p class="price"><?=$price[$racechip[ 'type' ]] . '' . $price['currency'];?></p>
      <br />
      <p class="vat">включая НДС</p>
      <p class="shipping-costs">Бесплатная доставка по всему СНГ<br/>
        Стоимость пересылки в другие страны: <a href="/shipping-and-payment/">здесь</a>
      </p>
    </td>
  </tr>
  <tr class="warenkorb">
    <td class="<?=$theme?> sep" colspan="2">
      <div class="button-c2a-l online-message-btn" data-chip="<?='RaceChip ' . ucfirst($racechip[ 'type' ])?>" data-model="<?=$full_car_name ?>">Заказать</div>
    </td>
  </tr>
  <tr class="lieferstatus">
    <td class="<?=$theme?> stock sep" colspan="2"><span class="bullet green"> </span> Доступен на складе </td>
  </tr>
  <tr class="product-image">
    <td class="<?=$theme?> sep" colspan="2">
	    <?php if($racechip[ 'type' ] == 'pro2') { ?>
          <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module-full-size.jpg" title="RaceChip <?=ucfirst($racechip[ 'type' ])?>">
            <img width="196" height="144" title="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" alt="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-pro2-module.png"/></a>
	    <?php } elseif($racechip[ 'type' ]  == 'ultimate') { ?>
          <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module-full-size.jpg" title="RaceChip <?=ucfirst($racechip[ 'type' ])?>">
            <img width="196" height="144" title="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" alt="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-ultimate-module.png"/></a>
          <a class="testsieger" href="<?php echo get_bloginfo( 'wpurl' ); ?>/racechip-won-the-comparison-test/">
            <img  src="<?php bloginfo('template_directory'); ?>/images/test_badges.png" />
          </a>
	    <?php } else { ?>
          <a rel="lytebox[racechip]" href="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module-full-size.jpg" title="RaceChip <?=ucfirst($racechip[ 'type' ])?>">
            <img width="196" height="144" title="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" alt="<?=$full_car_name . ' ' . ucfirst($racechip[ 'type' ])?>" src="<?php bloginfo('template_directory'); ?>/images/chiptuning/racechip-module.png"/></a>
	    <?php }  ?>

    </td>
  </tr>

  <?php if($racechip['type'] == 'pro2') { ?>
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
  <?php } elseif($racechip['type'] == 'ultimate') { ?>
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
    <?php endif; ?>
	  <?php if($racechip[ 'type' ] == 'pedal_tuning') $is_pedal_tuning = 1;?>

<? endforeach; ?>
</div>
<?php endif; ?>

	<?php if($is_pedal_tuning == 1 or
	         $racechips[0]['type'] == 'pedal_tuning' or
	         $racechips[1]['type'] == 'pedal_tuning'): ?>
      <!--RaceChip Response Control-->
      <div class="resonsecntDetail" style="margin: 0 auto">
        <h3 class="pagetitle">RaceChip Response Control &#8211; ускорение отклика педали газа для Вашего авто</h3>
        <div class="Produktbox">
          <div class="priceinf">
            <p style="float:left;margin:0px;width:100%" class="price"><?=$price['pedal_tuning'] . ' ' . $price['currency'] ?></p>
            <div id="detail_towk_btn_rc_response" class="cta2013-btn online-message-btn" data-chip="ResponseControl" data-model="<? echo $full_model ?>">Заказать</div>
            <p style="margin:8px 0 0 0;float:left;text-align:left;" class="mwst">
              <a href="/responsecontrol/">Узнать подробнее о Response Control</a>
            </p>

            <p style="float:left" class="delivery">в наличии, отправка в течение 24 часов</p>
            <p style="float:left" class="delivery">бесплатная доставка по Украине</p>
            <div class="product-pics" style="margin-top:15px">
              <ul style="width:350px">
                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_1.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_1-small.jpg" width="50" height="50" alt="RaceChip Response Control" title="RaceChip Response Control" /></a></li>
                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_2.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_2-small.jpg" width="50" height="50" alt="RaceChip Response Control" title="RaceChip Response Control" /></a></li>
                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_3.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_3-small.jpg" width="50" height="50" alt="RaceChip Response Control" title="RaceChip Response Control" /></a></li>
                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_4.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_4-small.jpg" width="50" height="50" alt="RaceChip Response Control" title="RaceChip Response Control" /></a></li>
                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_5.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_5-small.jpg" width="50" height="50" alt="ARaceChip Response Control" title="RaceChip Response Control" /></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

	<?php endif ?>
