<div class="[racechip_vchoice_class]">
    <div class="content-box-head"></div>
    <div class="content-head-spacer-vchoice"></div>
    <div class="content-box-vchoice clearfix"><br />
        <h1>
            Выберите производителя Вашего автомобиля:
        </h1>
        <ul class="manufacturers_list">
            <?php
            $all_data_r               = [];
            $data_from_db             = get_chiptuning();
            foreach ($data_from_db as $data) {
                $all_data[ $data[ 'id' ] ] = $data[ 'name' ];
            }
            asort($all_data);
            foreach ($all_data as $key => $value) {
                $all_data_r[ $key ] = $value;
            }
            foreach ($all_data_r as $key => $value):
                if (isset( $all_data[ $key ] ) && is_numeric($key)):
                    $value = urlencode(strtolower(trim($value)));
                    $all_data[ $key ] = trim($all_data[ $key ]);
                    ?>

                    <li>
                        <a class="list_item list_first" href="<?php echo get_bloginfo('wpurl') . "/chiptuning/" . $value ?>"><span class="name" style="width: 100%;"><?php echo $all_data[ $key ] ?></span></a>
                    </li>
                    <?php
                endif;
            endforeach;
            ?>
        </ul>
        <br />
    </div>
    <div class="content-foot-vchoice"></div>
</div>



