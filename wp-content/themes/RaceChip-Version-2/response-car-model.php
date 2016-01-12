<?php

    if(isset($models_from_db[0]['name']) and !empty($models_from_db[0]['name'])) {
        $vehicle_name = trim($models_from_db[0]['name']);
        $vehicle_model = trim($models_from_db[0]['model']);
    }

    else {
        $vehicle_name = trim(urldecode($wp_query->query_vars[ 'response_id' ]));
        $vehicle_model = trim(urldecode($wp_query->query_vars[ 'response_model' ]));
    }

?>

<div>
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
  <div class="chiptuning_breadcrump" style="margin-bottom:10px ">
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/">ResponseControl</a> &gt; <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/<?php echo urlencode(strtolower($vehicle_name)); ?>/"><?php echo $vehicle_name; ?></a>  &gt; <?php echo ucwords(urldecode($wp_query->query_vars[ 'response_model' ])); ?>
  </div>

    <h2><?php echo ucwords(urldecode($wp_query->query_vars[ 'response_model' ])); ?></h2>
    <span>
      <ul id="filter" style="display: none;">
          <li style="display: inline;">Двигатель:</li>
          <li style="display: inline; cursor: pointer;" id="filter_all">Все</li>
          <li style="display: inline; cursor: pointer;" id="filter_diesel">Дизель</li>
          <li style="display: inline; cursor: pointer;" id="filter_petrol">Бензин</li>
      </ul>
    </span>
    <div id="model_selection">
      <table>
        <thead>
        <tr>
          <th class="diff"> </th>
          <th class="name"> <h2><?php echo ucwords($vehicle_name . ' ' . urldecode($wp_query->query_vars[ 'response_model' ])); ?></h2>
          </th>
          <th class="ccm"> Объем </th>
          <th class="power"> Мощность  </th>

          <th class="nm">Крутящий <br> &nbsp; момент</th>
        </tr>
        </thead>
        <tbody>

<?php
   if(isset($models_from_db) and is_array($models_from_db) and !empty($models_from_db)):
        foreach($models_from_db as $data):
            if($data['engine'] == 'petrol'):

                $href = get_bloginfo('wpurl') .  '/responsecontrol/' . strtolower(urlencode($vehicle_name)) . '/' . strtolower(urlencode($vehicle_model)) . '/' . strtolower(urlencode($data['submodel'])) . '-' . $data['submodel_id'];
        $show_petrol_spacer = 1;
?>

        <tr class="<?=$data['engine']?>_row">
          <td></td>
          <td class="model"><a href="<?php echo $href ?>" ><?php echo $data['submodel'] ?></a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $data['capacity'] ?> cm<sup>3</sup></a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $data['kw'] . 'kW (' . $data['ps'] .  ' ЛС)' ?></a></td>

          <td><a href="<?php echo $href ?>" ><?php echo $data['nm'] ?>Nm</a></td>
        </tr>

<?php
    endif;
    endforeach;

   if(isset($show_petrol_spacer) and $show_petrol_spacer == 1):
?>
   <tr class="spacer petrol_row">
       <td class="dif"></td>
       <td colspan="4"><hr /></td>
   </tr>

<?php
   endif;

       foreach($models_from_db as $data):
           if($data['engine'] == 'diesel'):

               $href = get_bloginfo('wpurl') .  '/responsecontrol/' . strtolower(urlencode($vehicle_name)) . '/' . strtolower(urlencode($vehicle_model)) . '/' . strtolower(urlencode($data['submodel'])) . '-' . $data['submodel_id'];
               $show_diesel_spacer = 1;
?>
               <tr class="<?=$data['engine']?>_row">
                   <td></td>
                   <td class="model"><a href="<?php echo $href ?>" ><?php echo $data['submodel'] ?></a></td>
                   <td><a href="<?php echo $href ?>" ><?php echo $data['capacity'] ?> cm<sup>3</sup></a></td>
                   <td><a href="<?php echo $href ?>" ><?php echo $data['kw'] . 'kW (' . $data['ps'] .  ' ЛС)' ?></a></td>

                   <td><a href="<?php echo $href ?>" ><?php echo $data['nm'] ?>Nm</a></td>
               </tr>

               <?php
           endif;
       endforeach;

    endif;

    if(isset($show_diesel_spacer) and $show_diesel_spacer == 1):
?>

        <tr class="spacer diesel_row">
          <td class="dif"></td>
          <td colspan="4"><hr /></td>
        </tr>
<?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="content-foot-vchoice"></div>
</div>

