<div class="[racechip_vchoice_class]">
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
    <div class="chiptuning_breadcrump">
      <a href="<?=get_bloginfo('wpurl'); ?>/chiptuning/">Выбор автомобиля</a>
      &gt; <?=$model_data[0]['name']; ?>
    </div>
    <br />
    <h1>Выберите марку своего автомобиля:</h1>
    <ul class="manufacturers_list col2">
		<?php
		foreach ($model_data as $value):
			$key2 = $value[ 'model' ];
			$key2 = str_replace('from', 'с',$value[ 'model' ]);
			$key = urlencode($value[ 'url' ]);
			?>
          <li>
            <a class="list_item list_first" href="<?=get_bloginfo('wpurl') . "/chiptuning/" . $wp_query->query_vars[ 'car_id' ] . '/' . strtolower($key) . '/' ?>">
              <span class="name" style="width: 100%;"><?=$key2 ?></span>
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