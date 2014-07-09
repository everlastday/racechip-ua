<?php
/**


  class-frontend.php - goto 291

 * function title( $title, $sepinput = '-', $seplocation = '' ) {
    global $sep;
 */

    global $wp_query;
/**
    $sep = $sepinput;

    if ( is_feed() )
      return $title;

 */

  if(isset($wp_query->query_vars['car_id'])) {

    $car_id = ucfirst(preg_replace("/-[0-9]+/", "", $wp_query->query_vars['car_id']));
    $rc_title = 'Racechip: Чип-тюнинг двигателя автомобиля - чиптюнинг автомобилей ';

    if(isset($wp_query->query_vars['car_model']) && isset($wp_query->query_vars['car_name'])) {
      $car_name = preg_replace("/-/s", " ", $wp_query->query_vars['car_name']);
      $car_name = preg_replace("/(r|g)$/", "", $car_name);
      return $rc_title . ' ' . $car_id . ' ' . ucfirst($wp_query->query_vars['car_model']) . ' ' . $car_name;
    }
    elseif(isset($wp_query->query_vars['car_id']) && isset($wp_query->query_vars['car_model'])) {
      return $rc_title . $car_id . ' ' . ucfirst($wp_query->query_vars['car_model']);
    }
    else {
      return $rc_title . $car_id;
    }
  }

/**
    // This needs to be kept track of in order to generate
    // default titles for singular pages.
    $original_title = $title;
 *
 */

?>