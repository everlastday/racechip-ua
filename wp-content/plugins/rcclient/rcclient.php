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

function get_chiptuning($car_id = null, $car_name = null)
{
	      $sql    = 'SELECT id, name, url FROM brand';
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
    // можно использовать поле price_ua для вывода цен в гривнах
    // поле price_ua_euro выводит цену в евро
    $sql = 'SELECT type, price_ua_euro as price FROM price';
    $result = DatabaseHandler::GetAll($sql);

    foreach ($result as $v) $price[$v['type']] = $v['price'];
	  $price['currency'] = ' €';

    return $price;
}


function get_price_ru()
{
	  $sql = 'SELECT type, price_ru as price FROM price';
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

function get_products($submodel_id) {
	if ( !empty( $submodel_id ) and is_int($submodel_id)) {
		$sql    = "SELECT
                    `products`.`id`,
                    brand.name,
                    brand.url as brand_url,
                    models.model,
                    models.url as model_url,
                    submodels.submodel,
                    submodels.url,
                    `products`.`type`,
                    `products`.`hp`,
                    `products`.`nm`
                    FROM `products`
        LEFT JOIN submodels ON submodels.id=products.submodel_id
        LEFT JOIN models ON models.id=submodels.model_id
        LEFT JOIN brand ON brand.id=models.brand_id
        WHERE products.submodel_id = :submodel_id";
		$result = DatabaseHandler::GetAll($sql, array(':submodel_id' => $submodel_id));

		return $result;
	}

	return 0;
}



function get_submodels($brand, $model) {
    if (isset( $brand ) and ! empty( $brand ) and isset( $model ) and ! empty( $model )) {
	    $sql    = "SELECT
                    submodels.id as submodel_id,
                    submodels.submodel,
                    brand.name,
                    brand.url as brand_url,
                    models.model,
                    models.url as model_url,
                    submodels.url
                    FROM `submodels`
        LEFT JOIN models ON models.id=submodels.model_id
        LEFT JOIN brand ON brand.id=models.brand_id
        WHERE brand.url = :brand_name and models.url = :model";
        $result = DatabaseHandler::GetAll($sql, array(':brand_name' => $brand, ':model' => $model));

        return $result;
    }

    return 0;
}



function get_models($car_brend, $return_id = 0)
{
    if (isset( $car_brend ) and ! empty( $car_brend )) {
        $sql    = "SELECT models.id  as model_id,
                     models.model,
                     models.brand_id,
                     models.url,
                     brand.name,
                     brand.url as brand_url
                      FROM `models`
          LEFT JOIN brand ON brand.id=models.brand_id
          WHERE brand.url = :brand_url";
        $result = DatabaseHandler::GetAll($sql, array(':brand_url' => $car_brend));

        return $result;
    }

    return 0;
}

add_action('wp_footer', 'rc_windows_popup');
function rc_windows_popup() {
	?>
  <div class="window_popup" id="free-call">
    <div class="x"></div>
    <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
      <input type="text" name="phone" class="required" placeholder="Телефон" />
      <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Заказать звонок" name="call" />
    </form>
  </div>

  <div class="window_popup" id="online-message">
    <div class="x"></div>
    <form class="popup_form" method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
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
	<?php
	$path_to_js = plugins_url( 'rcclient/includes/themefunctions', 'rcclient' );
	wp_register_script( 'themefunctions.js', $path_to_js . '/js/themefunctions.js', '', '1.0', false );
	wp_enqueue_script( 'themefunctions.js' );
	wp_register_script( 'main.js', $path_to_js . '/js/main.js', '', '1.0', false );
	wp_enqueue_script( 'main.js' );
	wp_register_script( 'jquery.validate.min.js', $path_to_js . '/js/jquery.validate.min.js', '', '1.0', false );
	wp_enqueue_script( 'jquery.validate.min.js' );
	wp_register_script( 'jquery.form.js', $path_to_js . '/js/jquery.form.js', '', '1.0', false );
	wp_enqueue_script( 'jquery.form.js' );
	?>
  <!-- RaceChip Client Theme JS END -->

	<?php
}
function abort_404() {
	global $wp_query;
	ob_end_clean();
	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
	get_header();
	get_template_part( 404 );
	get_footer();
	exit();
}

function convert_hp_to_kw($hp) {
    $result = round($hp * 0.745699872, 0, PHP_ROUND_HALF_UP );
    return $result;
}

function get_graph_images($brand_name = null, $model_name = null, $submodel_name = null)
{
    $sql = "SELECT kw,ps, nm, img, class, capacity
                FROM  `graph_images`
          WHERE name = :brand_name and model LIKE :model_name and submodel LIKE :submodel_name";

    $model_name = explode(' ', $model_name)[0] . '%';
    $submodel_name = '%'. explode(' ', $submodel_name)[0] . '%';

    return DatabaseHandler::GetAll($sql, array(':brand_name' => $brand_name, ':model_name' =>  $model_name, ':submodel_name' => $submodel_name));

}

// Функции для подбора авто на главной
function get_vehicles_input()
{
	$data_from_db = get_chiptuning();
	foreach ($data_from_db as $data) {
		$all_data[ $data[ 'id' ] ] = $data[ 'name' ];
		$all_url[ $data[ 'id' ] ] = $data[ 'url' ];
	}
	asort($all_data);
	foreach ($all_data as $key => $value) {
		echo '<option id="/chiptuning/' . $all_url[$key] . '" value="' . $all_url[$key] . '">' . $value . '</option>';
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
			$key2 = str_replace('from', 'с',$value[ 'model' ]);
			$key  = $value[ 'url' ];
			$data .= '<option id="/chiptuning/'. $value[ 'brand_url' ] . '/' . $key .'" value=' . strtolower($key) . '>' . $key2 . '</option>';
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
			$href = get_bloginfo('wpurl') . '/chiptuning/' . $id['brand_url'] . '/' . $id[ 'model_url' ] . '/' . $id[ 'url' ] . '-' . $id[ 'submodel_id' ];
			$info .= '<option id="'. $href .'" value="' . $href . '">' . str_replace(['HP', 'kW'], ['л.с', 'кВт'], $id[ 'submodel' ])  . '</option>';
		}
		echo $info;
		wp_die();
	} else {
		return 0;
	}
	wp_die();
}
