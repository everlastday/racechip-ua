<?php
  /**
   * Template Name: Chiptuning
   *
   * A custom page template for chiptuning.
   *
   *
   * @package WordPress
   * @subpackage Twenty_Ten
   * @since Twenty Ten 1.0
   */

  get_header(); ?>

  <div id="container" class="">
  <div id="container" class="<?php echo empty( $wp_query->query_vars[ 'car_name' ] ) ? 'one-column-sidebar' : 'one-column'; ?>">
  <div id="content" role="main">
  <?php


    //print_r($wp_query);

    if ( ! empty( $wp_query->query_vars[ 'car_id' ] ) && ! empty( $wp_query->query_vars[ 'car_name' ] ) && ! empty( $wp_query->query_vars[ 'car_model' ] ) ) {
      if ( preg_match( "/^([a-zA-Z-_]{1,18})$/", $wp_query->query_vars[ 'car_id' ], $get_model ) &&
        preg_match( "/^([a-zA-Z0-9-()\.\,\+_]*)-(\d{1,5})$/", $wp_query->query_vars[ 'car_name' ], $ok )
      ) {

        $model_id = (int) $ok[ 2 ];

        $data_from_db = get_chiptuning( $wp_query->query_vars[ 'car_id' ], $model_id );
        $box_count    = 0;

        foreach ( $data_from_db as $data ) {
          //print $data['name'];
          $all_data[ $box_count ][ 'model_id' ]  = $data[ 'model_id' ];
          $all_data[ $box_count ][ 'box_class' ] = $data[ 'box_class' ];
          $all_data[ $box_count ][ 'box_name' ]  = $data[ 'box_name' ];
          $all_data[ $box_count ][ 'box_qty' ]   = $data[ 'box_qty' ];
          $all_data[ $box_count ][ 'power' ]     = $data[ 'power' ];
          $all_data[ $box_count ][ 'torque' ]    = $data[ 'torque' ];
          $box_count ++;
        }
        $all_data[ 'vehicle_name' ] = $data[ 'name' ];
        $all_data[ 'title' ] .= ' - ' . $all_data[ 'vehicle_name' ];

        $data_models_params = get_models_params( $model_id );

        $all_data[ 'capacity' ] = $data_models_params[ 0 ][ 'capacity' ];
        $all_data[ 'power' ]    = $data_models_params[ 0 ][ 'power' ];
        $all_data[ 'torque' ]   = $data_models_params[ 0 ][ 'torque' ];
//d($ok);
        $all_data[ 'img_diagram' ] = preg_replace( "/-_/", "", preg_replace( "/\+/", "/", preg_replace( "/\./", "-", $ok[ 1 ] ) ) );
        $all_data[ 'img_diagram' ] = preg_replace( "/-/", "--", strtolower( $all_data[ 'img_diagram' ] ) ) . '-' . $all_data[ 'power' ] . 'kw.png';

        //d($all_data['img_diagram']);
        $all_data[ 'model_brend' ] = preg_replace( "/-/", " ", $get_model[ 1 ] );

        //d($get_model);
        $all_data[ 'model_selection_href' ] = $get_model[ 1 ] . '-' . $get_model[ 2 ] . 'v';
        $all_data[ 'cpt' ]                  = $all_data[ 'torque' ] . 'Nm, ' . $all_data[ 'capacity' ] . '<sup>3</sup>, ' . $all_data[ 'power' ] . 'kW (' . round( ( $all_data[ 'power' ] * 1.36 ) ) . 'PS)'; // Capacity Power Torque for title
        $all_data[ 'engine_type' ]          = $data[ 'engine' ];
        // генерируем цену


        $all_data[ 'currency' ] = ' €';

        $price_from_db = get_price_ua();

        foreach ( $price_from_db as $price ) {
          $all_price[ $price[ 'box_class' ] ] = $price[ 'price' ];
        }

        if ( $data[ 'engine_type' ] == 1 or  $all_data[ 'engine_type' ] == 2 ) {
          $all_data[ 'price_standart' ] = $all_price[ 9 ];
          $all_data[ 'price_pro' ]      = $all_price[ 10 ];
          $all_data[ 'price_ultimate' ] = $all_price[ 12 ];
        } else {
          $all_data[ 'price_standart' ] = $all_price[ 2 ];
          $all_data[ 'price_pro' ]      = $all_price[ 3 ];
          $all_data[ 'price_ultimate' ] = $all_price[ 11 ];
        }
        // price for pd module
        $all_data[ 'price_pd' ] = $all_price[ 5 ];

        //echo "<pre>";
        //print_r($all_data);
        //echo "</pre>";

        if ( $all_data[ 0 ][ 'box_class' ] != 5 ) {
          //echo $all_data[ 2 ][ 'box_name' ];


          if ( $all_data[ 'model_brend' ] != 'bmw' and !empty($all_data[2]) ) {

            //$all_data[ 'price' ] = 0;
            $page_template       = 'chiptuning-car-details.php';
          } else {


            // Ціна – 529 євро
            $bmw_only_ultimate = array(
              'BMW 1er (F20) 114i',
              'BMW 1er (F20) 116i',
              'BMW 1er (F20) 118i',
              'BMW 1er (F20) 125i',
              'BMW 3er (F30) 316i',
              'BMW 3er (F30) 320i',
              'BMW 3er (F30) 320i Efficient Dynamics',
              'BMW 3er (F30) 328i',
              'BMW 5er (F10) 520i',
              'BMW 5er (F10) 528i',
              'BMW X1 (E84) sDrive20i/xDrive20i',
              'BMW X1 (E84) xDrive28i',
              'BMW X3 (F25) xDrive20i',
              'BMW X3 (F25) xDrive28i',
              'BMW Z4 (E89) sDrive20i',
              'BMW Z4 (E89) sDrive28i',
            );
            // Ціна - 879 євро
            $bmw_m_only_ultimate = array(
              'BMW M5 (F10) 4.4 V8',
              'BMW M6 (F12,F13) 4.4 V8',
              'BMW X5 (E70) M 4.4 V8',
              'BMW X6 (E71) M 4.4 V8',
            );

            //d($all_data['vehicle_name']);


            if ( in_array( $all_data[ 'vehicle_name' ], $bmw_only_ultimate ) ) {
              //print 'your price eq 529';
              $all_data[ 'price_ultimate_new' ] = 549;
              $page_template                = 'chiptuning-car-details2.php';
            } elseif ( in_array( $all_data[ 'vehicle_name' ], $bmw_m_only_ultimate ) ) {
              $all_data[ 'price_ultimate_new' ] = 879;
              $page_template                = 'chiptuning-car-details2.php';
            } elseif ( empty($all_data[2]) ) {
              $all_data[ 'price_ultimate' ] = null;
              $all_data[ 'price_ultimate_new' ] = 549;
              $page_template                = 'chiptuning-car-details2.php';
            } else {
              $page_template = 'chiptuning-car-details.php';
            }
          }
          //$this->template->left_menu_disable = 1;
        } else {
          //print '123';
          $page_template = 'chiptuning-car-details-pd.php';
        }

        //d($page_template);
        //if(is_file($page_template)) {
        //d($page_template);
        require_once $page_template;
        //}


      }

    } elseif ( ! empty( $wp_query->query_vars[ 'car_id' ] ) && ! empty( $wp_query->query_vars[ 'car_model' ] ) ) {
      if ( preg_match( "/^([a-zA-Z-_]{1,18})$/", $wp_query->query_vars[ 'car_id' ], $ok ) ) {


        // print $wp_query->query_vars[ 'car_model' ];
        //$model        = (int) $ok[ 2 ];
        $car_brend = $ok[ 1 ];
        $wp_query->query_vars[ 'car_model' ] = str_replace('---', '/', $wp_query->query_vars[ 'car_model' ]);

        $models_from_db = get_models( $car_brend );
        //d($models_from_db);
        $model_data = array();
        foreach ( $models_from_db as $k => $v ) {
          $pieces = explode( " ", $v[ name ] );

          //d($wp_query->query_vars[ 'car_model' ]);

          // Исключение для автомобилей с маркой которые содержат два слова
          if ( $pieces[ 1 ] == 'Romeo' || $pieces[ 1 ] == 'Rover' ) {
            $pieces[ 1 ] = $pieces[ 2 ];
          }
          // Фикс для моделей типа Kia Сee´d
          $pieces[ 1 ] = str_replace('´', '', $pieces[ 1 ]);

          if ( strtolower( $pieces[ 1 ] ) == $wp_query->query_vars[ 'car_model' ] ) {
            $data_from_db[ ] = $v;
          }

          //$model_data[$pieces[1]][] = $v;

        }
        //d($data_from_db);
        if ( ! empty ( $data_from_db ) ) {
          require_once 'chiptuning-car-model.php';
        } else {
          // нужно сгенерировать ошибку
        }


      } else {
        header( 'Location: /index.php' );
      }


//              }
    } elseif ( ! empty( $wp_query->query_vars[ 'car_id' ] ) ) {
      //;
      if ( preg_match( "/^([a-z-]{1,18})$/", $wp_query->query_vars[ 'car_id' ], $ok ) ) {

        //$model        = (int) $ok[ 2 ];
        $car_brend = $ok[ 1 ];


        $data_from_db = get_models( $car_brend );

        //d($data_from_db);

        $table_id = get_models( $car_brend, 1 );

        //echo $table_id;

        $racechip_info = racechip_info( 'vehicles', $table_id );

        //d($data_from_db);
        $model_data = array();
        foreach ( $data_from_db as $k => $v ) {
          $pieces = explode( " ", $v[ 'name' ] );

          if ( ! preg_match( "/^.+-.+$/", $car_brend ) ) {
            $model_data[ $pieces[ 1 ] ][ ] = $v;
          } else {
            $model_data[ $pieces[ 2 ] ][ ] = $v;
          }
        }


        require_once 'chiptuning-car-type.php';

      } else {
        header( 'Location: /index.php' );
      }
    } else {

      require_once 'chiptuning-car-brand.php';
    }

  ?>
  </div>

  <?php
    if ( empty( $wp_query->query_vars[ 'car_name' ] ) ) {
      get_sidebar();
    }
  ?>
  </div><!-- #content -->
  </div><!-- #container -->
  </div>
<?php get_footer(); ?>