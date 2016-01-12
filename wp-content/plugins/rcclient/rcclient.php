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
        $sql    = 'SELECT id,name,engine,capacity,power,torque FROM models WHERE vehicle_id=' . (int) $car_id;
        $result = DatabaseHandler::GetAll($sql);

        return $result;
    } else {
        $sql    = 'SELECT id, name FROM vehicles';
        $result = DatabaseHandler::GetAll($sql);

        return $result;
    }
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

function get_models_params($id)
{
    $sql = 'SELECT id,name,engine,capacity,power,torque FROM models WHERE id=' . (int) $id;
    $result = DatabaseHandler::GetAll($sql);

    return $result;
}

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

function get_models($car_brend = 'null', $return_id = 0)
{
    $model_brends = get_chiptuning();
    foreach ($model_brends as $k => $v) {
        //$v['name'] = str_replace(' ', '-', $v['name']);
        $model_brend[ strtolower($v[ 'name' ]) ] = $v[ 'id' ];
    }
    if (isset( $model_brend[ $car_brend ] )) {
        if ($return_id > 0) {
            return intval($model_brend[ $car_brend ]);
        }
        $model = $model_brend[ $car_brend ];

        return get_chiptuning($model);
    } else {
        return array();
    }
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
            $sql = "SELECT rcontrol_models.id,
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
    //global $mydb;
    //$brand_id = $_POST[ 'brand_id' ] + 0; // забираєм першу букву, щоб залишились тільки цифри
    $brand_id = urldecode($_POST[ 'brand_id' ]);
    if (isset( $brand_id )) {
        $car_brend    = $brand_id;
        $data_from_db = get_models($car_brend);
        //d($data_from_db);
        $table_id = get_models($car_brend, 1);
        //echo $table_id;
        $racechip_info = racechip_info('vehicles', $table_id);
        //d($data_from_db);
        $model_data      = array();
        $car_brend_array = explode(' ', $car_brend);
        foreach ($data_from_db as $k => $v) {
            $pieces    = explode(" ",
                $v[ 'name' ]);  // Розділяєм строку типу  -  Toyota Avensis II (T25) 2.0 D-4D на масив слів.
            $array_key = 1;
            if (isset( $car_brend_array[ 1 ] )) {
                $array_key = 2;
            }  // Якщо назва автомобіля складається з двох слів, то для назв типів автомобілів використовуються інші ключі
            $array_key2 = $array_key + 1;
            if ( ! preg_match("/\(|\)/", $pieces[ $array_key2 ]) && ! preg_match("/\d+/",
                    $pieces[ $array_key2 ]) && strlen(trim($pieces[ $array_key2 ])) > 3
            ) {
                $model_data[ trim($pieces[ $array_key ] . ' ' . $pieces[ $array_key2 ]) ][] = $v;
            } else {
                $model_data[ trim($pieces[ $array_key ]) ][] = $v;
            }
        }
        // Sort alphabetical
        $data = '<option value="0">Выберите модель...</option>';
        foreach ($model_data as $key => $value) {
            $key2 = $key;
            $key  = urlencode($key);
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
    $car_brend = urldecode($_POST[ 'car_type' ]);
    if (isset( $car_brend )) {
        //print 'lol';
        $models_from_db = get_models($car_brend);
        $model_data      = array();
        $car_brend_array = explode(' ', $car_brend);
        $data_from_db = array();
        foreach ($models_from_db as $k => $v) {
            $pieces    = explode(" ", $v[ 'name' ]);
            $array_key = 1;
            if (isset( $car_brend_array[ 1 ] )) {
                $array_key = 2;
            }  // Якщо назва автомобіля складається з двох слів, то для назв типів автомобілів використовуються інші ключі
            $array_key2 = $array_key + 1;
            if ( ! preg_match("/\(|\)/", $pieces[ $array_key2 ]) && ! preg_match("/\d+/",
                    $pieces[ $array_key2 ]) && strlen(trim($pieces[ $array_key2 ])) > 3
            ) {
                $name_from_db = trim($pieces[ $array_key ] . ' ' . $pieces[ $array_key2 ]);
            } else {
                $name_from_db = trim($pieces[ $array_key ]);
            }
            if (strtolower($name_from_db) == strtolower($car_type)) {
                $data_from_db[] = $v;
                //$sss .= $name_from_db . ' - ' . $car_type . ',';
            }
        }
        //d($data_from_db);
        foreach ($data_from_db as $data) {
            //print $data['name'];
            $all_data[ $data[ 'id' ] ][ 'id' ]       = $data[ 'id' ];
            $all_data[ $data[ 'id' ] ][ 'name' ]     = $data[ 'name' ];
            $all_data[ $data[ 'id' ] ][ 'engine' ]   = $data[ 'engine' ];
            $all_data[ $data[ 'id' ] ][ 'capacity' ] = $data[ 'capacity' ];
            $all_data[ $data[ 'id' ] ][ 'power' ]    = $data[ 'power' ];
            $all_data[ $data[ 'id' ] ][ 'torque' ]   = $data[ 'torque' ];
            $all_data[ $data[ 'id' ] ][ 'model' ]    = $car_brend;
            //$all_data['model_brend'] = preg_replace("/-\d+/", "", $all_data[$data['id']]['model']);
            $data[ 'original_name' ] = $data[ 'name' ];
            $data[ 'name' ] = trim(str_ireplace(str_ireplace('-', ' ', $car_brend) . ' ' . $car_type, '',
                $data[ 'name' ]));
            $all_data[ $data[ 'id' ] ][ 'name_for_href' ] = preg_replace("/ \/ | /", "-", $data[ 'name' ]);
            $all_data[ $data[ 'id' ] ][ 'name_for_href' ] = preg_replace("/\//", "+",
                $all_data[ $data[ 'id' ] ][ 'name_for_href' ]);
            $all_data[ $data[ 'id' ] ][ 'name_for_href' ] = preg_replace("/>/", "_",
                $all_data[ $data[ 'id' ] ][ 'name_for_href' ]);
            $all_data[ $data[ 'id' ] ][ 'name_for_href' ] = preg_replace("/é/", "e",
                $all_data[ $data[ 'id' ] ][ 'name_for_href' ]);
            $all_data[ $data[ 'id' ] ][ 'name_for_href' ] = str_replace("´", "",
                $all_data[ $data[ 'id' ] ][ 'name_for_href' ]);
        }
        // d($all_data);
        // Sort alphabetical
        $info = '<option value="0">Выберите модификацию...</option>';
        foreach ($all_data as $id) {
            $href = get_bloginfo('wpurl') . '/chiptuning/' . urlencode($id[ 'model' ]) . '/' . urlencode($car_type) . '/' . urlencode($id[ 'name_for_href' ]) . '-' . $id[ 'id' ];
            $info .= '<option value="' . $href . '">' . $id[ 'name' ] . ' ' . $id[ 'capacity' ] . 'cm&sup3' . ' ' . $id[ 'power' ] . 'kW ' . round($id[ 'power' ] * 1.36) . 'PS' . '</option>';
        }
        echo $info;
        wp_die();
    } else {
        return 0;
        wp_die();
    }
    wp_die();
}
