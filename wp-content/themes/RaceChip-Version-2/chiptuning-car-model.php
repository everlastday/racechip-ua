
<?php
foreach ($data_from_db as $data) {
//print $data['name'];
  $all_data[$data['id']]['id'] = $data['id'];
  $all_data[$data['id']]['name'] = $data['name'];
  $all_data[$data['id']]['engine'] = $data['engine'];
  $all_data[$data['id']]['capacity'] = $data['capacity'];
  $all_data[$data['id']]['power'] = $data['power'];
  $all_data[$data['id']]['torque'] = $data['torque'];
  $all_data[$data['id']]['model'] = $wp_query->query_vars['car_id'];
  $all_data['model_brend'] = preg_replace("/-\d+/", "", $all_data[$data['id']]['model']);

  $data['original_name'] = $data['name'];

  $data['name'] = trim(str_ireplace(str_ireplace('-', ' ', $wp_query->query_vars['car_id']) . ' ' . $wp_query->query_vars['car_model'], '', $data['name']));


  $all_data[$data['id']]['name_for_href'] = preg_replace("/ \/ | /", "-", $data['name']);
  $all_data[$data['id']]['name_for_href'] = preg_replace("/\//", "+", $all_data[$data['id']]['name_for_href']);
  $all_data[$data['id']]['name_for_href'] = preg_replace("/>/", "_", $all_data[$data['id']]['name_for_href']);
  $all_data[$data['id']]['name_for_href'] = preg_replace("/é/", "e", $all_data[$data['id']]['name_for_href']);
  $all_data[$data['id']]['name_for_href'] = preg_replace("/&/", "__", $all_data[$data['id']]['name_for_href']);
  $all_data[$data['id']]['name_for_href'] = str_replace("´", "", $all_data[$data['id']]['name_for_href']);
}

?>

<div class="[racechip_vchoice_class]">
  <div class="content-box-head"></div>
  <div class="content-head-spacer-vchoice"></div>
  <div class="content-box-vchoice clearfix">
  <div class="chiptuning_breadcrump">
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/">Выбор автомобиля</a> &gt; <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/chiptuning/<?php echo $all_data['model_brend']; ?>/"><?php echo ucwords(urldecode($all_data['model_brend'])); ?></a> &gt; <?php echo ucwords($wp_query->query_vars[ 'car_model' ]); ?>
  </div>

    <h2><?php echo ucwords($wp_query->query_vars[ 'car_model' ]); ?></h2>
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
          <th class="name"> <h2><?php echo ucwords($all_data['model_brend'] . ' ' . $wp_query->query_vars[ 'car_model' ]); ?></h2>
          </th>
          <th class="ccm"> Объем </th>
          <th class="power"> Мощность  </th>
          <th class="nm">Крутящий <br> &nbsp; момент</th>
        </tr>
        </thead>
        <tbody>
        <?php //$wp_query->query_vars[ 'car_model' ] = str_replace('/', '---', $wp_query->query_vars[ 'car_model' ]); ?>

        <?php foreach ($all_data as $id):
          $href = get_bloginfo('wpurl') .  '/chiptuning/' . $id['model'] . '/' . urlencode($wp_query->query_vars[ 'car_model' ]) . '/' . urlencode($id['name_for_href']) . '-' . $id['id'];
          ?>

          <?php if ($id['engine'] == 4 or $id['engine'] == 5): ?>
        <tr class="diesel_row">
          <td class="diff"></td>
          <td class="model"><a href="<?php echo $href ?>" ><?php echo $id['name'] ?></a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $id['capacity'] ?>cm&sup3;</a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $id['power'] ?>kW (<?php echo round($id['power'] * 1.36) ?>PS)</a></td>
          <td><a href="<?php echo $href ?>" ><?php echo $id['torque'] ?>Nm</a></td>
        </tr>
          <? endif ?>
        <? endforeach; ?>


        <?php foreach ($all_data as $id):
          $href = get_bloginfo('wpurl') .  '/chiptuning/' . $id['model'] . '/' . urlencode($wp_query->query_vars[ 'car_model' ]) . '/' . urlencode($id['name_for_href']). '-' . $id['id'];
          ?>

        <?php  if(isset($id['engine']) and $id['engine'] == 1 or $id['engine'] == 2): ?>
            <?php  if( ! isset( $spacer ) ): ?>
            <tr class="spacer">
              <td class="dif"></td>
              <td colspan="4"><hr /></td>
            </tr>

            <?php
            $spacer = 1;
            endif; ?>

            <tr class="petrol_row">
              <td class="diff"></td>
              <td class="model"><a href="<?php echo $href ?>" ><?php echo $id['name'] ?></a></td>
              <td><a href="<?php echo $href ?>" ><?php echo $id['capacity'] ?>cm&sup3;</a></td>
              <td><a href="<?php echo $href?>" ><?php echo $id['power'] ?>kW (<?php echo round($id['power'] * 1.36) ?>PS)</a></td>
              <td><a href="<?php echo $href ?>" ><?php echo $id['torque'] ?>Nm</a></td>
            </tr>

        <? endif ?>
        <? endforeach; ?>



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

