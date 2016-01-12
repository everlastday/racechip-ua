

<div class="[racechip_vchoice_class]">
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
    <div class="chiptuning_breadcrump">
        <?php

        $vehicle_name = (isset($model_data[0]['name'])) ? $model_data[0]['name'] : urldecode(ucwords($wp_query->query_vars[ 'response_id' ])); ?>


      <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/">ResponseControl</a> &gt; <?=$vehicle_name ?>
    </div><br/>
    <h1>Выберите марку своего автомобиля:</h1>
    <ul class="manufacturers_list">
      <?php
        //$data_from_db = get_chiptuning();

        foreach ($model_data as $key => $value):

          $model = trim($value['model']);
          $model2 = $model;

          $value['name'] = str_replace('/','---', $value['name']);
            ?>

            <li><a class="list_item list_first" href="<?php echo get_bloginfo('wpurl') . "/responsecontrol/" . $wp_query->query_vars[ 'response_id' ] . '/' . urlencode(strtolower($model)) . '/' ?>"><span class="name" style="width: 100%;"><?php echo $model2 ?></span></a></li>
          <?php

        endforeach;
      ?>
    </ul>
  </div>
  <div class="content-foot-vchoice"></div>
</div>



