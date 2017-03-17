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
<div id="currentchoose"> <span class="left">Ваш выбор: <b><? echo $all_data[ 'vehicle_name' ]; ?></b></span> <span class="right"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/<?php echo $wp_query->query_vars[ 'car_model' ]; ?>/">Другие модели</a></span>
  <div style="clear:both;"></div>
</div>
<a href="/motorgarantie">
  <div class="motorgarantie"> <img src="<?php echo get_template_directory_uri() ?>/images/engine-warranty.png" width="75" alt="Гарантия на двигатель" title="Гарантия на двигатель"/>
    <h3>Новое: RaceChip гарантия на двигатель</h3>
    <p>Теперь мы предлагаем бесплатно гарантию на двигатель.<br />
      <br />
      Узнать больше</p>
  </div>
</a>
<div id="accordion">
<?php  if ( $all_data[ 0 ][ 'box_class' ] != 5): ?>
<h3>
  <div class="tablewrapper">
    <div class="tablecell">RaceChip CR Ultimate <?=($all_data['engine_type'] == 2 or $all_data['engine_type'] == 1) ? $all_data['price_ultimate_new'] : $all_data['price_ultimate'] ?><?=$all_data['currency']?></div>
  </div>
</h3>
<div>
  <div class="accordiontext">
    <h4>RaceChip Ultimate</h4>
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
    <br/>
    <br/>
    <img class="chipimage" src="<?php echo get_template_directory_uri() ?>/images/module-racechip-ultimate-ua.png" alt="RaceChip Ultimate для <? echo $all_data[ 'vehicle_name' ]; ?>" title="RaceChip Ultimate для <? echo $all_data[ 'vehicle_name' ]; ?>" /> <br/>
    <br/>
  </div>
  <div class="cartlink"> <span class="price"><?=($all_data['engine_type'] == 2 or $all_data['engine_type'] == 1) ? $all_data['price_ultimate_new'] : $all_data['price_ultimate'] ?><?=$all_data['currency']?></span><br/>
    <span class="mehrwertsteuer">включая НДС</span> <br/>
    <br/>
      <div class="bluebuttonrightarrow online-message-btn" data-chip="RaceChip CR Ultimate" data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
  </div>
  <div style="clear:both;"></div>
  <div class="leistungstabelle ml-clear"> <span class="headline">С RaceChip Ultimate</span>
    <div class="infos"> <span class="leistungkw">
            <span class="left">Мощность в kW</span>
              <span class="right"><?= $all_data[ 0 ][ 'power' ] ?> kW
                <span class="positiv">(+ <?=rc_perc_chg($all_data[ 0 ][ 'power' ], $all_data[ 'power' ]); ?>%)</span>
              </span>
            </span>
            <span class="leistungps">
              <span class="left">Мощность в PS</span>
              <span class="right"><?= rc_ps( $all_data[ 0 ][ 'power' ] ); ?> PS
                <span class="positiv">(+ <?=rc_perc_chg($all_data[ 0 ][ 'power' ], $all_data[ 'power' ]); ?>%)</span>
              </span>
            </span>
            <span class="drehmoment">
              <span class="left">Крутящий момент</span>
              <span class="right"><?= $all_data[ 0 ][ 'torque' ] ?> Nm
                <span class="positiv">(+ <?= rc_perc_chg($all_data[ 0 ][ 'torque' ], $all_data[ 'torque' ] ); ?>%)</span>
              </span>
            </span>
    </div>
  </div>
  <div class="leistungstabelle ml-clear"> <span class="headline">Без RaceChip</span>
    <div class="infos">
            <span class="leistungkw">
              <span class="left">Мощность в kW</span>
              <span class="right"><?= $all_data[ 'power' ] ?> kW</span>
            </span>
            <span class="leistungps">
              <span class="left">Мощность в PS</span>
              <span class="right"><?= rc_ps( $all_data[ 'power' ] ) ?> PS</span>
            </span>
            <span class="drehmoment">
              <span class="left">Крутящий момент</span>
              <span class="right"><?= $all_data[ 'torque' ] ?> Nm</span>
            </span>
    </div>
  </div>
</div>
<?php else: ?>
<h3>
  <div class="tablewrapper">
    <div class="tablecell">RaceChip PD <?= $all_data['price_pd'] . '' . $all_data[ 'currency' ]; ?></div>
  </div>
</h3>
<div>
  <div class="accordiontext">
    <h4>RaceChip PD</h4>
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
    <br/>
    <br/>
    <img class="chipimage" src="<?php echo get_template_directory_uri() ?>/images/module-racechip-ua.png" alt="RaceChip PD для <? echo $all_data[ 'vehicle_name' ]; ?>" title="RaceChip PD для <? echo $all_data[ 'vehicle_name' ]; ?>" /> <br/>
    <br/>
  </div>
  <div class="cartlink"> <span class="price"><?= $all_data['price_pd'] . '' . $all_data[ 'currency' ]; ?></span><br/>
    <span class="mehrwertsteuer">включая НДС</span> <br/>
    <br/>
      <div class="bluebuttonrightarrow online-message-btn" data-chip="RaceChip PD " data-model="<? echo $all_data[ 'vehicle_name' ]; ?>">Заказать</div>
  </div>
  <div style="clear:both;"></div>
  <div class="leistungstabelle ml-clear"> <span class="headline">C RaceChip</span>
    <div class="infos"> <span class="leistungkw">
            <span class="left">Мощность в kW</span>
              <span class="right"><?= $all_data[ 0 ][ 'power' ] ?> kW
                <span class="positiv">(+ <?=rc_perc_chg($all_data[ 0 ][ 'power' ], $all_data[ 'power' ]); ?>%)</span>
              </span>
            </span>
            <span class="leistungps">
              <span class="left">Мощность в PS</span>
              <span class="right"><?= rc_ps( $all_data[ 0 ][ 'power' ] ); ?> PS
                <span class="positiv">(+ <?=rc_perc_chg($all_data[ 0 ][ 'power' ], $all_data[ 'power' ]); ?>%)</span>
              </span>
            </span>
            <span class="drehmoment">
              <span class="left">Крутящий момент</span>
              <span class="right"><?= $all_data[ 0 ][ 'torque' ] ?> Nm
                <span class="positiv">(+ <?= rc_perc_chg($all_data[ 0 ][ 'torque' ], $all_data[ 'torque' ] ); ?>%)</span>
              </span>
            </span>
    </div>
  </div>
  <div class="leistungstabelle ml-clear"> <span class="headline">Без RaceChip</span>
    <div class="infos">
            <span class="leistungkw">
              <span class="left">Мощность в kW</span>
              <span class="right"><?= $all_data[ 'power' ] ?> kW</span>
            </span>
            <span class="leistungps">
              <span class="left">Мощность в PS</span>
              <span class="right"><?= rc_ps( $all_data[ 'power' ] ) ?> PS</span>
            </span>
            <span class="drehmoment">
              <span class="left">Крутящий момент</span>
              <span class="right"><?= $all_data[ 'torque' ] ?> Nm</span>
            </span>
    </div>
  </div>
</div>
  <?php endif; ?>
</div>
</div>
</section>
