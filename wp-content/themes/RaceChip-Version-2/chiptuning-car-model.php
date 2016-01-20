<div class="[racechip_vchoice_class]">
    <div class="content-box-head"></div>
    <div class="content-head-spacer-vchoice"></div>
    <div class="content-box-vchoice clearfix">
        <div class="chiptuning_breadcrump">
            <?php
            $brand = isset( $submodel_data[ 0 ][ 'name' ] ) ? $submodel_data[ 0 ][ 'name' ] : 'Name';
            $model = isset( $submodel_data[ 0 ][ 'model' ] ) ? $submodel_data[ 0 ][ 'model' ] : 'Model';
            ?>
            <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/">Выбор автомобиля</a> &gt;
            <a href="<?php echo get_bloginfo('wpurl'); ?>/chiptuning/<?php echo urlencode(strtolower($brand)); ?>/"><?=$brand;?></a>
            &gt; <?=$model?>
        </div>

        <h2><?=$model?></h2>
      <!--<span>-->
      <!--<ul id="filter" style="display: none;">-->
      <!--    <li style="display: inline;">Двигатель:</li>-->
      <!--    <li style="display: inline; cursor: pointer;" id="filter_all">Все</li>-->
      <!--    <li style="display: inline; cursor: pointer;" id="filter_diesel">Дизель</li>-->
      <!--    <li style="display: inline; cursor: pointer;" id="filter_petrol">Бензин</li>-->
      <!--</ul>-->
      <!--</span>-->
        <div id="model_selection">
            <table>
                <thead>
                <tr>
                    <th class="diff"></th>
                    <th class="name"><h2><?=$brand . ' ' . $model?></h2>
                    </th>
                    <th class="ccm">Объем <br>см&sup3;</th>
                    <th class="power">Мощность<br>кВт (Л.С.) </th>
                    <th class="nm">Крутящий<br>момент, НМ</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($submodel_data as $v):
                    $href = get_bloginfo('wpurl') . '/chiptuning/' . $wp_query->query_vars[ 'car_id' ] . '/' . $wp_query->query_vars[ 'car_model' ] . '/' . urlencode($v[ 'submodel' ]) . '-' . $v[ 'submodel_id' ];
                    ?>
                    <tr class="<?=$v[ 'engine' ]?>_row">
                        <td class="diff"></td>
                        <td class="model"><a href="<?php echo $href ?>"><?php echo $v[ 'submodel' ] ?></a></td>
                        <td><a href="<?php echo $href ?>"><?=$v[ 'capacity' ]?></a></td>
                        <td><a href="<?php echo $href ?>"><?=$v[ 'kw' ]?> (<?=$v[ 'ps' ]?>)</a></td>
                        <td><a href="<?php echo $href ?>"><?=$v[ 'nm' ]?></a></td>
                    </tr>
                <? endforeach; ?>

                <tr class="spacer">
                    <td class="dif"></td>
                    <td colspan="4">
                        <hr />
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="content-foot-vchoice"></div>
</div>

