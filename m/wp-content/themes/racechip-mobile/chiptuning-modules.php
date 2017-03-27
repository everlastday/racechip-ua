<?php
$brand = isset( $racechips[ 0 ][ 'name' ] ) ? $racechips[ 0 ][ 'name' ] : '';
$model = isset( $racechips[ 0 ][ 'model' ] ) ? str_replace('from', 'с', $racechips[ 0 ][ 'model' ]) : '';
$submodel = isset( $racechips[ 0 ][ 'submodel' ] ) ? str_replace(['HP', 'kW', 'NM'], ['л.с', 'кВт', ' Нм'], $racechips[ 0 ][ 'submodel' ]) : '';
$full_car_name = $brand . ' ' . $model . ' ' . $submodel;
$brand_url = isset( $racechips[ 0 ][ 'brand_url' ] ) ? $racechips[ 0 ][ 'brand_url' ] : '';
$model_url = isset( $racechips[ 0 ][ 'model_url' ] ) ? $racechips[ 0 ][ 'model_url' ] : '';

$img = [
      'one'  => 'module-racechip-ua.png',
      'pro2' => 'module-racechip-pro2-ua.png',
      'ultimate' => 'module-racechip-ultimate-ua.png',
];

?>
<section id="content" class="Chiptuning">
  <script>
    jQuery(function() {
      jQuery( "#accordion" ).accordion({
        heightStyle: "content",
        collapsible: true,
        active: false
      });
    });
  </script>
  <div id="productdetailpage">
    <div id="currentchoose"> <span class="left">Ваш выбор: <b><?=$full_car_name ?></b></span> <span class="right"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?=$brand_url . '/' . $model_url  ?>/">Другие модели</a></span>
      <div style="clear:both;"></div>
    </div>

      <div class="motorgarantie"> <img src="<?php echo get_template_directory_uri() ?>/images/engine-warranty.png" width="75" alt="Примечание" title="Примечание"/>
        <h3>Примечание:</h3>
        <p style="font-size: 12px; line-height: 16px">Представленные здесь данные о мощности являются максимально достижимыми показателями. <br>
          Фактическая мощность зависит от серийного допуска транспортного средства. <br>
          Мы поставляем RaceChip уже оптимально-настроенным для Вашего автомобиля. Вы также можете сами настраивать мощность на RaceChip по своему желанию.</p>
      </div>

    <div id="accordion">

      <?php foreach ($racechips as $k => $racechip): ?>
      <?php if($racechip[ 'type' ] == 'one' or $racechip[ 'type' ] == 'pro2' or $racechip[ 'type' ] == 'ultimate'): ?>
      <h3>
        <div class="tablewrapper">
          <div class="tablecell">RaceChip <?=ucfirst($racechip[ 'type' ]) . ' '  . $price[$racechip[ 'type' ]]  . ' ' . $price['currency']?></div>
        </div>
      </h3>
      <div>
        <div class="accordiontext">
          <h4>RaceChip <?=ucfirst($racechip[ 'type' ])?></h4>

          <?php if($racechip[ 'type' ] == 'ultimate'): ?>

          <h5>Cовершенство</h5>
          <p>С RaceChip Ultimate каждое путешествие это приключение.</p>
          <p>Современные компоненты и актуальное програмное обеспечение позволяет достичь идеальный выдачи мощности.</p>
          <h4>Особенности продукта</h4>
          <ul>
            <li><span class=\"orange\">Повышение мощности до 31%</span></li>
            <li><span class=\"orange\">Увеличение крутящего момента до 26%</span></li>
            <li><span class=\"orange\">Высокое качество штекера Automotive (FCI)</span></li>
            <li>Мощность можно регулировать индивидуально</li>
            <li>48 Mhz Процессор</li>
            <li>Может снизить расход топлива</li>
            <li>Термостойкий, армированный стекловолокном пластик</li>
            <li>Водонепроницаемый</li>
            <li>Легкая установка</li>
          </ul>

          <?php endif ?>
          <?php if($racechip[ 'type' ] == 'pro2'): ?>

            <h5>Сильный</h5>
            <p>Мощность и скорость значительно возрастет.</p>
            <p>Улучшенные компоненты раскрывают взрывную силу при обгоне и ускорении.</p>
            <h4>Особенности продукта</h4>
            <ul>
              <li><span class=\"orange\">Увеличение мощности до 31%</span></li>
              <li><span class=\"orange\">Увеличение крутящего момента до 25%</span></li>
              <li><span class=\"orange\">Высокое качество автомобильный разъем (FCI)</span></li>
              <li>Мощность можно регулировать индивидуально</li>
              <li>24 МГц процессор</li>
              <li>Может снизить расход топлива</li>
              <li>Усиленный стекловолокном пластиковый корпус</li>
              <li>Водонепроницаемый</li>
              <li>Легкая установка</li>
            </ul>

          <?php endif ?>
          <?php if($racechip[ 'type' ] == 'one'): ?>

            <h5>Характер</h5>
            <p>Первый шаг к большей свободе на дороге</p>
            <p>Заметно больше мощности по отличной цене</p>
            <h4>Особенности продукта</h4>
            <ul>
              <li><span class=\"orange\">Увеличение мощности до  27%</span></li>
              <li><span class=\"orange\">Увеличение крутящего момента до 19%</span></li>
              <li>Мощность можно регулировать индивидуально</li>
              <li>8 МГц процессор</li>
              <li>Может снизить расход топлива</li>
              <li>Алюминиевый корпус</li>
              <li>Брызгозащищенный</li>
              <li>Легкая установка</li>
            </ul>

          <?php endif ?>
          <br/>
          <br/>
          <img class="chipimage" src="<?=get_template_directory_uri() ?>/images/<?=$img[$racechip[ 'type' ]] ?>" alt="RaceChip <?=ucfirst($racechip[ 'type' ])?> для <?=$full_car_name ?>" title="RaceChip <?=ucfirst($racechip[ 'type' ])?> для <?=$full_car_name ?>" /> <br/>
          <br/>
        </div>
        <div class="cartlink"> <span class="price"><?=$price[$racechip[ 'type' ]] . ' ' . $currency ?></span><br/>
          <span class="mehrwertsteuer">включая НДС</span> <br/>
          <br/>
            <div class="bluebuttonrightarrow online-message-btn" data-chip="RaceChip <?=ucfirst($racechip[ 'type' ])?>" data-model="<?=$full_car_name ?>">Заказать</div>
        </div>
        <div style="clear:both;"></div>
        <div class="leistungstabelle ml-clear"> <span class="headline">С RaceChip Ultimate</span>
          <div class="infos"> <span class="leistungkw">
            <span class="left">Мощность в кВт</span>
              <span class="right"><?=convert_hp_to_kw($racechip[ 'hp' ])  + $base['kw']  ?> кВт
                <span class="positiv">(+ <?=convert_hp_to_kw($racechip[ 'hp' ])?> кВт)</span>
              </span>
            </span>
            <span class="leistungps">
              <span class="left">Мощность в л.с.</span>
              <span class="right"><?=$racechip[ 'hp' ] + $base['hp'] ?> л.с.
                <span class="positiv">(+ <?=$racechip[ 'hp' ] ?> л.с.)</span>
              </span>
            </span>
            <span class="drehmoment">
              <span class="left">Крутящий момент</span>
              <span class="right"><?=$racechip[ 'nm' ] + $base['nm'] ?> Нм
                <span class="positiv">(+ <?=$racechip[ 'nm' ] ?> Нм)</span>
              </span>
            </span>
          </div>
        </div>
        <div class="leistungstabelle ml-clear"> <span class="headline">Без RaceChip</span>
          <div class="infos">
            <span class="leistungkw">
              <span class="left">Мощность в kW</span>
              <span class="right"><?=$base[ 'kw' ] ?> кВт</span>
            </span>
            <span class="leistungps">
              <span class="left">Мощность в л.с</span>
              <span class="right"><?=$base[ 'hp' ] ?> л.с</span>
            </span>
            <span class="drehmoment">
              <span class="left">Крутящий момент</span>
              <span class="right"><?=$base[ 'nm' ] ?> Нм</span>
            </span>
          </div>
        </div>
      </div>
      <?php else:?>
        <?php if($racechip[ 'type' ] == 'pedal_tuning'): ?>
          <h3>
            <div class="tablewrapper">
              <div class="tablecell">RaceChip Response Control <?=$price[$racechip[ 'type' ]] . ' ' . $price['currency']?></div>
            </div>
          </h3>
          <div>
            <div class="accordiontext">
              <h5>Ускорение отклика педали газа для Вашего авто</h5>
              <h4>Особенности продукта</h4>
              <ul>
                <li><span class=\"orange\">Управление откликом педали газа</span></li>
                <li><span class=\"orange\">6 индивидуальных режимов работы</span></li>
                <li>Идеально работает в паре с RaceChip Chiptuning</li>
                <li>Подходит для всех типов двигателей и трансмиссий</li>
                <li>Легкая установка без усилий</li>
                <li>Качественные материалы корпуса и кабеля</li>
                <li>Первый в своем роде модуль с 2-мя Eco-режимами — максимальная экономия топлива</li>
                <li>Разработан и произведен в Германии</li>
              </ul>
              <br/>
              <br/>
              <img class="chipimage" src="<?=get_template_directory_uri() ?>/images/response/response-control.png" alt="RaceChip <?=ucfirst($racechip[ 'type' ])?> для <?=$full_car_name ?>" title="RaceChip <?=ucfirst($racechip[ 'type' ])?> для <?=$full_car_name ?>" /> <br/>
              <br/>
            </div>
            <div class="cartlink"> <span class="price"><?=$price[$racechip[ 'type' ]] . ' ' . $currency ?></span><br/>
              <span class="mehrwertsteuer">включая НДС</span> <br/>
              <br/>
              <div class="bluebuttonrightarrow online-message-btn" data-chip="RaceChip Response Control" data-model="<?=$full_car_name ?>">Заказать</div>
            </div>
            <div class="leistungstabelle ml-clear">

              <span class="headline">Эксплуатация</span>
              <div class="infos">
                <span class="leistungkw">
                  RaceChip ReponseControl предлагает 6 преднастроенных режимов отклика педали акселератора. Два агрессивных режима, два спортивных и два экорежима не оставят Вас равнодушными и позволят выбрать оптимальный вариант. Каждый из режимов уникален и идеально подходит для активного вождения, горных дорог, спокойной езды или заснеженной трассы.
                </span>
                <span class="leistungkw">
                  Eco режим обеспечивает плавную работу педали газа во всем диапазоне оборотов двигателя. Это позволяет более эффективно экономить топливо, особенно при езде в черте города.
                </span>
                <span class="leistungkw">
                  Даже в процессе езды Вы можете изменить настройки ResponseControl или отключить его полностью, что приведет автомобиль в заводские параметры.
                </span>
                <span class="leistungkw">
                  Выберите для себя излюбленный режим и RaceChip ResponseControl запомнит его. И больше не нужно будет его активировать при каждом пуске двигателя. Все просто!
                </span>
              </div>
            </div>

          </div>
        <?php endif; ?>
      <?php endif ?>
      <?php endforeach; ?>

    </div>
  </div>
</section>
