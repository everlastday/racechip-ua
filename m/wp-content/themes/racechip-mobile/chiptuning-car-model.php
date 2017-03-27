<section id="content" class="Chiptuning">
  <div id="productdetailpage">
    <div id="currentchoose"> <span class="left">Ваш выбор: <b><?=$brand . ' ' . $model ?></b></span>
      <span class="right"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?=isset( $submodel_data[ 0 ][ 'brand_url' ] ) ? $submodel_data[ 0 ][ 'brand_url' ] : '' ?>/">Другие модели <?=$brand ?></a></span>
      <div style="clear:both;"></div>
    </div>
  </div>
  <div class="secondstep step">

		<label>Шаг 3:</label> <span class="choosetext">Выберите модификацию</span>
		<div class="backgroundstep">
			<div class="backgroundstepwrapper">
				<span class="chiptuningicon"></span>
				<ul class="step-01 bigger-width">
					<?php
					foreach ($submodel_data as $value):
						$key2 = str_replace(['HP', 'kW', 'NM'], ['л.с', 'кВт', ' Нм'], $value[ 'submodel' ]);
						$key = urlencode($value[ 'url' ]);
						?>
						<li>
							<a href="<?php echo get_bloginfo( 'wpurl' ) . "/chiptuning/" . $wp_query->query_vars[ 'car_id' ] . '/' .  $wp_query->query_vars[ 'car_model' ] . '/' . strtolower($key) . '-' . $value[ 'submodel_id' ]  ?>"><?=$key2 ?></a>
						</li>
						<?php
					endforeach;
					?>
				</ul>
			</div>
		</div>
	</div>
</section>