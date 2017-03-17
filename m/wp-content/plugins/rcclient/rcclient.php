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


// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
    wp_register_style( 'popup', plugins_url( 'rcclient/css/popup.css' ) );
    wp_enqueue_style( 'popup' );
}





  add_action('wp_footer', 'rc_windows_popup');

  function rc_windows_popup() {
    ?>
    <div class="window_popup" id="free-call">
      <div class="x">X</div>
      <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
        <input type="text" name="phone" class="required" placeholder="Телефон" />
        <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Заказать звонок" name="call"/>
      </form>
    </div>


    <div class="window_popup" id="online-message">
      <div class="x">X</div>
      <form method="post" action="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/rcvalidate.php">
        <input type="text" class="required" placeholder="Имя" name="name" />
        <input type="text" class="required" placeholder="E-mail" name="email" />
        <input type="text" class="required" placeholder="Номер телефона" name="phone" />
        <textarea placeholder="Сообщение"  name="comment"></textarea>
        <input type="submit" class="button-c2a-l" style="height: 10px !important" value="Заказать" name="online"/>
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








    <!-- RaceChip Client Theme JS -->
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/themefunctions.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/main.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/rcclient/includes/themefunctions/js/jquery.form.js"></script>
    <!-- RaceChip Client Theme JS END -->



    <?php
  }









