<section id="content" class="Chiptuning">
  <div id="productdetailpage">
    <div id="currentchoose"> <span class="left">Ваш выбор: <b><?=$brand ?></b></span>
      <span class="right"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Другие производители</a></span>
      <div style="clear:both;"></div>
    </div>
  </div>
	<div class="secondstep step">
		<label>Шаг 2:</label> <span class="choosetext">Выберите модель</span>
		<div class="backgroundstep">
			<div class="backgroundstepwrapper">
				<span class="chiptuningicon"></span>
				<ul class="step-01 bigger-width">
					<?php
					foreach ($model_data as $value):
						$key2 = $value[ 'model' ];
						$key2 = str_replace('from', 'с',$value[ 'model' ]);
						$key = urlencode($value[ 'url' ]);
						?>
						<li>
							<a href="<?php echo get_bloginfo( 'wpurl' ) . "/chiptuning/" . $wp_query->query_vars[ 'car_id' ] . '/' . strtolower( $key ) . '/' ?>"><?=$key2 ?></a>
						</li>
						<?php
					endforeach;
					?>
				</ul>
			</div>
		</div>
	</div>
</section>



