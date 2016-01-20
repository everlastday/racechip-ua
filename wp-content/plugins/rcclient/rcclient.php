<?php
/**
 * @package RcClient
 */
/*
Plugin Name: RcClient
Plugin URI: http://www.racechip.com.ua
Description: Plugin for Racechip
Version: 1.0.1
Author: WestSIDe
Author URI: http://www.racechip.com.ua
License: GPLv2 or later
*/
require_once( dirname(__FILE__) . '/../../../dbhandler.php' );
define('RCC_CLIENT_DIR', plugin_dir_path(__FILE__));
define('RCC_CLIENT_URL', plugin_dir_url(__FILE__));
function rcc_client_load()
{
    require_once( RCC_CLIENT_DIR . 'includes/admin.php' );
    add_action('admin_menu', 'mt_add_pages');
}

//rcc_client_load();
// ---
function mytheme_register_styles()
{
    //mobile.css для всех устройств
    wp_register_style('theme-mobile', //идентификатор файла
        '/wp-content/plugins/rcclient/themefunctions.css', //источник
        null, //нет зависимостей
        '1.0.0' //версия
    );
    /*Для условных комментариев*/
}

function west_test($test)
{
    //mobile.css для всех устройств
    echo 'this is -> ' . $test;
}

function get_chiptuning($car_id = null, $car_name = null)
{
        $sql    = 'SELECT id, name FROM rc_vehicles';
        $result = DatabaseHandler::GetAll($sql);

        return $result;

}

function d($value = null, $die = 1)
{
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    if ($die) {
        die;
    }
}

function get_price_ua()
{
    $sql    = 'SELECT id, box_class, box_name, price FROM price_ua';
    $result = DatabaseHandler::GetAll($sql);

    return $result;
}

function get_price_ru()
{
    $sql    = 'SELECT id, box_class, box_name, price FROM price_ru';
    $result = DatabaseHandler::GetAll($sql);

    return $result;
}

//function get_models_params($id)
//{
//    $sql    = 'SELECT id,name,engine,capacity,power,torque FROM models WHERE id=' . (int) $id;
//    $result = DatabaseHandler::GetAll($sql);
//
//    return $result;
//}

function count_vehicles()
{
    $sql    = 'SELECT COUNT(*) FROM vehicles';
    $result = DatabaseHandler::GetOne($sql);

    return $result;
}

//add_action('init', 'mytheme_register_styles');
function racechip_info($table = 'vehicles', $table_id = 0)
{
    if (( $table === 'models' or $table === 'vehicles' or $table === 'racechips' ) and ( is_int($table_id) )) {
        $sql = "SELECT `desc` FROM `racechip_info` WHERE `table` = '" . $table . "' and `table_id` = " . $table_id;
        //d($sql);
        $result = DatabaseHandler::GetOne($sql);

        return $result;
    } else {
        return null;
    }
}
function get_racechips($submodel_id) {
    if (isset( $submodel_id ) and ! empty( $submodel_id ) and is_int($submodel_id)) {
        $sql    = "SELECT
                    rc_submodels.id as submodel_id,
                    rc_vehicles.name,
                    rc_models.model,
                    rc_submodels.submodel,
                    rc_submodels.engine,
                    rc_submodels.capacity,
                    rc_submodels.kw as base_kw,
                    rc_submodels.ps as base_ps,
                    rc_submodels.nm as base_nm,
                    rc_racechips.class,
                    rc_racechips.kw,
                    rc_racechips.kw_percent,
                    rc_racechips.ps,
                    rc_racechips.ps_percent,
                    rc_racechips.nm,
                    rc_racechips.nm_percent,
                    rc_racechips.img,
                    rc_racechips.nm_percent,
                    rc_price.price_ua,
                    rc_price.price_ru,
                    rc_price.title
                    FROM `rc_racechips`
        LEFT JOIN rc_price ON rc_price.id=rc_racechips.price_id
        LEFT JOIN rc_submodels ON rc_submodels.id=rc_racechips.submodel_id
        LEFT JOIN rc_models ON rc_models.id=rc_submodels.model_id
        LEFT JOIN rc_vehicles ON rc_vehicles.id=rc_submodels.brand_id
        WHERE rc_racechips.submodel_id = :submodel_id";
        $result = DatabaseHandler::GetAll($sql, array(':submodel_id' => $submodel_id));

        return $result;
    }

    return 0;
}




function get_submodels($brand, $model) {
    if (isset( $brand ) and ! empty( $brand ) and isset( $model ) and ! empty( $model )) {
        $sql    = "SELECT
                    rc_submodels.id as submodel_id,
                    rc_vehicles.name,
                    rc_models.model,
                    rc_submodels.submodel,
                    rc_submodels.engine,
                    rc_submodels.capacity,
                    rc_submodels.kw,
                    rc_submodels.ps,
                    rc_submodels.nm
                    FROM `rc_submodels`
        LEFT JOIN rc_models ON rc_models.id=rc_submodels.model_id
        LEFT JOIN rc_vehicles ON rc_vehicles.id=rc_submodels.brand_id
        WHERE rc_vehicles.name = :brand_name and rc_models.model = :model";
        $result = DatabaseHandler::GetAll($sql, array(':brand_name' => $brand, ':model' => $model));

        return $result;
    }

    return 0;
}



function get_models($car_brend, $return_id = 0)
{
    if (isset( $car_brend ) and ! empty( $car_brend )) {
        $sql    = "SELECT rc_models.id  as model_id,
                   rc_models.model,
                   rc_models.brand_id,
                   rc_vehicles.name
                    FROM `rc_models`
        LEFT JOIN rc_vehicles ON rc_vehicles.id=rc_models.brand_id
        WHERE rc_vehicles.name = :brand_name";
        $result = DatabaseHandler::GetAll($sql, array(':brand_name' => $car_brend));

        return $result;
    }

    return 0;
}

add_action('wp_footer', 'rc_windows_popup');
function rc_windows_popup()
{
    ?>
    <div class="window_popup" id="free-call">
        <div class="x"></div>
        <form method="post" action="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/rcclient/rcvalidate.php">
            <input type="text" name="phone" class="required" placeholder="Телефон" />
            <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Заказать звонок" name="call" />
        </form>
    </div>

    <div class="window_popup" id="online-message">
        <div class="x"></div>
        <form class="popup_form" method="post" action="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/rcclient/rcvalidate.php">
            <input type="text" class="required" placeholder="Имя" name="name" />
            <input type="text" class="required" placeholder="E-mail" name="email" />
            <input type="text" class="required" placeholder="Номер телефона" name="phone" />
            <textarea placeholder="Сообщение" name="comment"></textarea>
            <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Отправить сообщение" name="online" />
        </form>
    </div>

    <script type="text/javascript">
        jQuery(".online-message-btn").click(function () {
            var self = jQuery(this);
            jQuery(".window_popup form textarea").val('Хочу заказать ' + self.attr('data-chip') + ' для автомобиля ' + self.attr('data-model'));
            //console.log();

            // "product_name": self.attr('data-chip-model'),
            // "qty": 1,
            // "product_price": self.attr('data-chip-price'),
            // "product_image": self.attr('data-chip-img')


            return false;
        });
    </script>
    <!--LiveInternet counter-->
    <script type="text/javascript"><!--
        document.write("<a href='http://www.liveinternet.ru/click' " +
            "target=_blank><img src='//counter.yadro.ru/hit?t38.6;r" +
            escape(document.referrer) + ((typeof(screen) == "undefined") ? "" :
            ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
            ";" + Math.random() +
            "' alt='' title='LiveInternet' " +
            "border='0' width='31' height='31'><\/a>")
        //--></script><!--/LiveInternet-->

    <a id="un-button" href="#" class="un-left css3 freecall-btn" style="margin-top: 60px;">Заказать звонок</a>

    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 987324113;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/987324113/?value=0&amp;guid=ON&amp;script=0" />
        </div>
    </noscript>
    <!-- RaceChip Client Theme JS -->
    <script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/themefunctions.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/main.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.form.js"></script>
    <!-- RaceChip Client Theme JS END -->

    <?php
}

// response controll
function get_response($car_id = null, $car_name = null)
{
    if ( ! empty( $car_id ) && ! empty( $car_name )) {
        $sql = 'SELECT
      racechips.box_class,
      racechips.box_name,
      racechips.box_qty,
      racechips.power,
      racechips.torque,
      models.name,
      models.engine
      FROM racechips
      LEFT JOIN models ON racechips.model_id=models.id

      WHERE racechips.model_id=' . (int) $car_name;
        //d($sql);
        $result = DatabaseHandler::GetAll($sql);

        return $result;
    } elseif ( ! empty( $car_id )) {
        $sql    = 'SELECT id,name FROM response_models WHERE vehicle_id=' . (int) $car_id;
        $result = DatabaseHandler::GetAll($sql);

        return $result;
    } else {
        $sql    = 'SELECT id, name FROM rcontrol_vehicles';
        $result = DatabaseHandler::GetAll($sql);

        return $result;
    }
}

function get_response_main_models($car_brend = null)
{
    if ( ! empty( $car_brend )) {
        $data_from_db = get_response();
        foreach ($data_from_db as $data) {
            $all_models[ strtolower(trim($data[ 'name' ])) ] = $data[ 'id' ];
        }
        if (isset( $all_models[ $car_brend ] )) {
            $sql    = "SELECT rcontrol_models.id,
                           rcontrol_models.model,
                           rcontrol_vehicles.name
                    FROM `rcontrol_models`
                    LEFT JOIN rcontrol_vehicles ON rcontrol_vehicles.id=rcontrol_models.brand_id
                    WHERE `brand_id` = :brand_id";
            $result = DatabaseHandler::GetAll($sql, array(':brand_id' => $all_models[ $car_brend ]));

            return $result;
        }
    }

    return array();
}

function get_response_data($data = array())
{
    //if(isset($data['vehicle_id']) and isset($data['model_id']) and !empty($data['vehicle_id']) and !empty($data['model_id'])) {
    //    $where = ' WHERE response_general.model_id=' . (int) $data['model_id'] . ' AND response_general.vehicle_id=' . (int) $data['vehicle_id'];
    //}
    if (isset( $data[ 'id' ] ) and ! empty( $data[ 'id' ] )) {
        $details_id = (int) $data[ 'id' ];
    } else {
        return 0;
    }
    if (isset( $data[ 'id' ] ) and ! empty( $data[ 'id' ] )) {
        $sql = "SELECT rcontrol_models.id  as model_id,
                   rcontrol_models.model,
                   rcontrol_vehicles.name,
                   rcontrol_details.engine,
                   rcontrol_details.submodel,
                   rcontrol_details.capacity,
                   rcontrol_details.kw,
                   rcontrol_details.ps,
                   rcontrol_details.nm,
                   rcontrol_details.id as submodel_id
                    FROM `rcontrol_details`

        LEFT JOIN rcontrol_models ON rcontrol_details.model_id=rcontrol_models.id
        LEFT JOIN rcontrol_vehicles ON rcontrol_vehicles.id=rcontrol_details.brand_id
        WHERE rcontrol_details.id = :details_id";
        $result = DatabaseHandler::GetAll($sql, array(':details_id' => $details_id));

        return $result;
    }

    return 0;
}

function get_response_models($brand_name = null, $model_name = null, $return_id = 0)
{
    $sql    = "SELECT rcontrol_models.id  as model_id,
                   rcontrol_models.model,
                   rcontrol_vehicles.name,
                   rcontrol_details.engine,
                   rcontrol_details.submodel,
                   rcontrol_details.capacity,
                   rcontrol_details.kw,
                   rcontrol_details.ps,
                   rcontrol_details.nm,
                   rcontrol_details.id as submodel_id
                    FROM `rcontrol_models`
        LEFT JOIN rcontrol_vehicles ON rcontrol_vehicles.id=rcontrol_models.brand_id
        LEFT JOIN rcontrol_details ON rcontrol_details.model_id=rcontrol_models.id
        WHERE rcontrol_vehicles.name = :brand_name and rcontrol_models.model = :model_name";
    $result = DatabaseHandler::GetAll($sql, array(':brand_name' => $brand_name, ':model_name' => $model_name));

    return $result;
    //$model_brends = get_response();
    //
    //foreach($model_brends as $k => $v) {
    //
    //    //$v['name'] = str_replace(' ', '-', $v['name']);
    //
    //    $model_brend[strtolower($v['name'])] = $v['id'];
    //}
    //
    //if(isset($model_brend[$car_brend])) {
    //
    //    if($return_id > 0) {
    //        return intval($model_brend[$car_brend]);
    //    }
    //
    //    $model = $model_brend[$car_brend];
    //    return get_response( $model );
    //
    //} else {
    //    return array();
    //}
}

// Функции для подбора авто на главной
function get_vehicles_input()
{
    $data_from_db = get_chiptuning();
    foreach ($data_from_db as $data) {
        $all_data[ $data[ 'id' ] ] = $data[ 'name' ];
    }
    asort($all_data);
    foreach ($all_data as $key => $value) {
        echo '<option value="' . urlencode(strtolower(trim($value))) . '">' . $value . '</option>';
    }
}

add_action('wp_ajax_rc_get_type', 'rcGetTypeAjax');
add_action('wp_ajax_nopriv_rc_get_type', 'rcGetTypeAjax');
function rcGetTypeAjax()
{

    $brand_id = urldecode($_POST[ 'brand_id' ]);
    if (isset( $brand_id )) {

        $model_data =  get_models( $brand_id );

        // Sort alphabetical
        $data = '<option value="0">Выберите модель...</option>';
        foreach ($model_data as $value) {
            $key2 = $value[ 'model' ];
            $key  = urlencode($value[ 'model' ]);
            $data .= '<option value=' . strtolower($key) . '>' . $key2 . '</option>';
        }
        echo $data;
        wp_die();
    } else {
        return 0;
        wp_die();
    }
    wp_die();
}

add_action('wp_ajax_rc_get_model', 'rcGetModelAjax');
add_action('wp_ajax_nopriv_rc_get_model', 'rcGetModelAjax');
function rcGetModelAjax()
{
    //global $mydb;
    //$brand_id = $_POST[ 'brand_id' ] + 0; // забираєм першу букву, щоб залишились тільки цифри
    $car_type  = urldecode($_POST[ 'brand_id' ]);
    $car_brand = urldecode($_POST[ 'car_type' ]);
    if (isset( $car_brand )) {

        $submodel_data = get_submodels($car_brand, $car_type);


        $info = '<option value="0">Выберите модификацию...</option>';
        foreach ($submodel_data as $id) {
            $href = get_bloginfo('wpurl') . '/chiptuning/' . urlencode($id[ 'model' ]) . '/' . urlencode($car_type) . '/' . urlencode($id[ 'submodel' ]) . '-' . $id[ 'submodel_id' ];
            $info .= '<option value="' . $href . '">' . $id[ 'submodel' ] . ' ' . $id[ 'capacity' ] . ' см&sup3' . ' ' . $id[ 'kw' ] . ' кВт ' . $id[ 'ps' ] . ' л.с.' . '</option>';
        }
        echo $info;
        wp_die();
    } else {
        return 0;
        wp_die();
    }
    wp_die();
}
