<?php

    if(isset($data_from_db[0]['vehicle_name']) and !empty($data_from_db[0]['vehicle_name']))
        $vehicle_name = $data_from_db[0]['vehicle_name'];
    else
        $vehicle_name = $wp_query->query_vars[ 'response_id' ];

?>

<div>
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
  <div class="chiptuning_breadcrump" style="margin-bottom:10px ">
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/">ResponseControl</a> &gt; <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/<?php echo urlencode(strtolower($vehicle_name)); ?>/"><?php echo $vehicle_name; ?></a>  &gt; <?php echo ucwords(urldecode($wp_query->query_vars[ 'response_model' ])); ?>
  </div>

    <h1><?php echo ucwords(urldecode($wp_query->query_vars[ 'response_model' ])); ?></h1>

    <div id="model_selection">
      <table>
        <thead>
        <tr>
          <th class="diff"> </th>
          <th class="name"> <h2><?php echo ucwords($vehicle_name . ' ' . urldecode($wp_query->query_vars[ 'response_model' ])); ?></h2>
          </th>
          <th class="ccm"> Объем </th>
          <th class="power"> Мощность  </th>

<!--          <th class="nm">Крутящий <br> &nbsp; момент</th>-->
        </tr>
        </thead>
        <tbody>

<?php
   if(isset($data_from_db) and is_array($data_from_db)):
        foreach($data_from_db as $data):
        $href = get_bloginfo('wpurl') .  '/responsecontrol/' . strtolower(urlencode($data['vehicle_name'])) . '/' . $wp_query->query_vars[ 'response_model' ] . '/' . urlencode($data['engine']) . '-' . $data['id'];
?>


        <tr>
          <td></td>
          <td class="model"><a href="<?php echo $href ?>" ><?php echo $data['engine'] ?></a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $data['dispacement'] ?></a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $data['power'] ?>kW (<?php echo round($data['power'] * 1.36) ?> ЛС)</a></td>

<!--          <td><a href="--><?php //echo $href ?><!--" >--><?php //echo $id['torque'] ?><!--Nm</a></td>-->
        </tr>


<?php
    endforeach;


    endif;
?>



        <tr class="spacer">
          <td class="dif"></td>
          <td colspan="4"><hr /></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="content-foot-vchoice"></div>
</div>

