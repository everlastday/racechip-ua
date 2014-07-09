

<div class="[racechip_vchoice_class]">
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
    <div class="chiptuning_breadcrump">
      <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля</a> &gt; <?php echo ucwords(str_ireplace('-', ' ', $wp_query->query_vars[ 'car_id' ])); ?>
    </div><br/>
    <h1>Выберите марку своего автомобиля:</h1>
    <ul class="manufacturers_list">
      <?php
        //$data_from_db = get_chiptuning();

        foreach ($model_data as $key => $value):
            ?>

            <li><a class="list_item list_first" href="<?php echo get_bloginfo('wpurl') . "/chiptuning/" . $wp_query->query_vars[ 'car_id' ] . '/' . strtolower($key) . '/' ?>"><span class="name" style="width: 100%;"><?php echo $key ?></span></a></li>
          <?php

        endforeach;
      ?>
    </ul>
    <br />
    <p>
      <?php echo $racechip_info ?>

    </p>
  </div>
  <div class="content-foot-vchoice"></div>
</div>



