<section id="content" class="Chiptuning">
  <div id="productdetailpage">
    <div id="currentchoose">
      <span class="right"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>/">На главную страницу</a></span>
      <div style="clear:both;"></div>
    </div>
  </div>
	<div class="firststep step">
		<label>Шаг 1:</label> <span class="choosetext">Пожалуйста, выберите производителя Вашего автомобиля</span>
		<div class="backgroundstep">
			<div class="backgroundstepwrapper">
				<span class="chiptuningicon"></span>
				<ul class="step-01">
					<?php
					$all_data_r               = [];
					$data_from_db             = get_chiptuning();
					$data_url = ''; // Для формирования ссылок
					foreach ($data_from_db as $data) {
						$all_data[ $data[ 'id' ] ] = $data[ 'name' ];
						$data_url[$data[ 'id' ]] = $data[ 'url' ];
					}
					asort($all_data);
					foreach ($all_data as $key => $value) {
						$all_data_r[ $key ] = $value;
					}
					foreach ($all_data_r as $key => $value):
						if (isset( $all_data[ $key ] ) && is_numeric($key)):
							$all_data[ $key ] = trim($all_data[ $key ]);
							?>
							<li><a href="<?php echo get_bloginfo( 'wpurl' ) . "/chiptuning/" . $data_url[$key] ?>"><?=$all_data[ $key ] ?></a></li>
							<?php
						endif;
					endforeach;
					?>
				</ul>
			</div>
		</div>
	</div>
</section>