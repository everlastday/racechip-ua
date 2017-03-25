<div class="[racechip_vchoice_class]">
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
    <div class="chiptuning_breadcrump">
		<?php
		$brand = isset( $submodel_data[ 0 ][ 'name' ] ) ? $submodel_data[ 0 ][ 'name' ] : '';
		$model = isset( $submodel_data[ 0 ][ 'model' ] ) ? str_replace('from', 'с', $submodel_data[ 0 ][ 'model' ]) : '';
		?>
      <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/">Выбор автомобиля</a> &gt;
      <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/<?=isset( $submodel_data[ 0 ][ 'brand_url' ] ) ? $submodel_data[ 0 ][ 'brand_url' ] : '' ?>/"><?=$brand;?></a>
      &gt; <?=$model?>
    </div>
    <br />
    <h2><?=$model?></h2>
    <ul class="manufacturers_list col2">
		<?php
		foreach ($submodel_data as $value):
			$key2 = str_replace(['HP', 'kW', 'NM'], ['л.с', 'кВт', ' Нм'], $value[ 'submodel' ]);
			$key = urlencode($value[ 'url' ]);
			?>

          <li>
            <a class="list_item list_first" href="<?php echo get_bloginfo('wpurl') . "/chiptuning/" . $wp_query->query_vars[ 'car_id' ] . '/' .  $wp_query->query_vars[ 'car_model' ] . '/' . strtolower($key) . '-' . $value[ 'submodel_id' ] . '/' ?>">
              <span class="name" style="width: 100%;"><?php echo $key2 ?></span>
            </a>
          </li>
			<?php
		endforeach;
		?>
    </ul>
    <br />

  </div>
  <div class="content-foot-vchoice"></div>
</div>