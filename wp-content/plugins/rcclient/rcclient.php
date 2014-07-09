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


require_once(dirname(__FILE__) .  '/../../../dbhandler.php');



define('RCC_CLIENT_DIR', plugin_dir_path(__FILE__));
define('RCC_CLIENT_URL', plugin_dir_url(__FILE__));


function rcc_client_load() {
  require_once(RCC_CLIENT_DIR.'includes/admin.php');

  add_action('admin_menu', 'mt_add_pages');

}



//rcc_client_load();
// ---

function mytheme_register_styles(){
  //mobile.css для всех устройств
  wp_register_style(
    'theme-mobile', //идентификатор файла
    '/wp-content/plugins/rcclient/themefunctions.css', //источник
    null, //нет зависимостей
    '1.0.0' //версия
  );

  /*Для условных комментариев*/
}

  function west_test($test){
    //mobile.css для всех устройств
    echo 'this is -> ' . $test;


  }






  function get_chiptuning( $car_id = null, $car_name = null ) {

    if( ! empty( $car_id ) && ! empty( $car_name ) ) {
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
    }
    elseif(! empty( $car_id ) ) {
      $sql = 'SELECT id,name,engine,capacity,power,torque FROM models WHERE vehicle_id=' . (int) $car_id;
      $result = DatabaseHandler::GetAll($sql);
      return $result;
    }
    else {
      $sql = 'SELECT id, name FROM vehicles';
      $result = DatabaseHandler::GetAll($sql);
      return $result;
    }


  }

  function d ( $value = null, $die = 1 ) {

    echo 'Debug: <br /><pre>';
    print_r( $value );
    echo '</pre>';

    if ( $die ) {
      die;
    }

  }


  function get_price_ua() {

  $sql = 'SELECT id, box_class, box_name, price FROM price_ua';
  $result = DatabaseHandler::GetAll($sql);
  return $result;
}
  function get_price_ru() {

  $sql = 'SELECT id, box_class, box_name, price FROM price_ru';
  $result = DatabaseHandler::GetAll($sql);
  return $result;
}

  function get_models_params($id) {

  $sql = 'SELECT id,name,engine,capacity,power,torque FROM models WHERE id=' . (int) $id;

  $result = DatabaseHandler::GetAll($sql);
  return $result;
}

function count_vehicles() {
  $sql = 'SELECT COUNT(*) FROM vehicles';
  $result = DatabaseHandler::GetOne($sql);
  return $result;
  }

  //add_action('init', 'mytheme_register_styles');

function racechip_info ($table = 'vehicles', $table_id = 0) {

  if(($table === 'models' or $table === 'vehicles' or $table === 'racechips') and (is_int($table_id)) ) {
    $sql = "SELECT `desc` FROM `racechip_info` WHERE `table` = '" . $table . "' and `table_id` = " . $table_id;
    //d($sql);

    $result = DatabaseHandler::GetOne($sql);
    return $result;
  } else {
    return null;
  }
}

function get_models($car_brend = 'null', $return_id = 0) {
  $model_brends = get_chiptuning();

  foreach($model_brends as $k => $v) {

    $v['name'] = str_replace(' ', '-', $v['name']);

    $model_brend[strtolower($v['name'])] = $v['id'];
  }

  if(isset($model_brend[$car_brend])) {

    if($return_id > 0) {
      return intval($model_brend[$car_brend]);
    }

    $model = $model_brend[$car_brend];
    return get_chiptuning( $model );
  } else {
    return array();
  }
}

  add_action('wp_footer', 'rc_windows_popup');

  function rc_windows_popup() {
    ?>
    <div class="window_popup" id="free-call">
      <div class="x"></div>
      <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
        <input type="text" name="phone" class="required" placeholder="Телефон" />
        <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Заказать звонок" name="call"/>
      </form>
    </div>


    <div class="window_popup" id="online-message">
      <div class="x"></div>
      <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
        <input type="text" class="required" placeholder="Имя" name="name" />
        <input type="text" class="required" placeholder="E-mail" name="email" />
        <input type="text" class="required" placeholder="Номер телефона" name="phone" />
        <textarea placeholder="Сообщение"  name="comment"></textarea>
        <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Отправить сообщение" name="online"/>
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
    <!--LiveInternet counter--><script type="text/javascript"><!--
      document.write("<a href='http://www.liveinternet.ru/click' "+
        "target=_blank><img src='//counter.yadro.ru/hit?t38.6;r"+
        escape(document.referrer)+((typeof(screen)=="undefined")?"":
        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
          screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
        ";"+Math.random()+
        "' alt='' title='LiveInternet' "+
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
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/987324113/?value=0&amp;guid=ON&amp;script=0"/>
      </div>
    </noscript>
    <!-- RaceChip Client Theme JS -->
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/themefunctions.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/main.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.form.js"></script>
    <!-- RaceChip Client Theme JS END -->



    <?php
  }

