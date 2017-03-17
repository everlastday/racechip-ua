<?php
  get_header(); ?>
  <section id="content">
  <?php
    global $wp_query;
    //-------------------------------
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


        $all_data[ 'currency' ] = ' EUR';

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

        if ( $all_data[ 0 ][ 'box_class' ] != 5 && $all_data[ 'model_brend' ] != 'bmw') {
          $page_template = 'chiptuning-modules.php';

        } else {    // IF MODULE PD OR MODULES FOR BMW  ----
          if ( $all_data[ 'model_brend' ] == 'bmw' ) {
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


            if ( in_array( $all_data[ 'vehicle_name' ], $bmw_only_ultimate ) ) {
              //print 'your price eq 529';
              $all_data[ 'price_ultimate_new' ] = 5800;
              $page_template                    = 'chiptuning-modules-other.php';
            } elseif ( in_array( $all_data[ 'vehicle_name' ], $bmw_m_only_ultimate ) ) {
              $all_data[ 'price_ultimate_new' ] = 9600;
              $page_template                    = 'chiptuning-modules-other.php';
            } else {
              $page_template = 'chiptuning-modules.php';
            }
          } elseif($all_data[ 0 ][ 'box_class' ] == 5) {
            $page_template = 'chiptuning-modules-other.php';
          } else { // IF MODULE PD
            wp_die('Unknown module page');
          }
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
        $car_brend                           = $ok[ 1 ];
        $wp_query->query_vars[ 'car_model' ] = str_replace( '---', '/', $wp_query->query_vars[ 'car_model' ] );

        $models_from_db = get_models( $car_brend );
        //d($models_from_db);
        $model_data = array();
        foreach ( $models_from_db as $k => $v ) {
          $pieces = explode( " ", $v[ 'name' ] );

          //d($wp_query->query_vars[ 'car_model' ]);

          // Исключение для автомобилей с маркой которые содержат два слова
          if ( $pieces[ 1 ] == 'Romeo' || $pieces[ 1 ] == 'Rover' ) {
            $pieces[ 1 ] = $pieces[ 2 ];
          }

          if ( strtolower( $pieces[ 1 ] ) == $wp_query->query_vars[ 'car_model' ] ) {
            $data_from_db[ ] = $v;
          }

          //$model_data[$pieces[1]][] = $v;

        }
        //d($data_from_db);
        if ( ! empty ( $data_from_db ) ) {


          foreach ($data_from_db as $data) {

            $all_data[$data['id']]['id'] = $data['id'];
            $all_data[$data['id']]['name'] = $data['name'];
            $all_data[$data['id']]['engine'] = $data['engine'];
            $all_data[$data['id']]['capacity'] = $data['capacity'];
            $all_data[$data['id']]['power'] = $data['power'];
            $all_data[$data['id']]['torque'] = $data['torque'];
            $all_data[$data['id']]['model'] = $wp_query->query_vars['car_id'];
            //$all_data['model_brend'] = preg_replace("/-\d+/", "", $all_data[$data['id']]['model']);

            $data['original_name'] = $data['name'];

            $data['name'] = trim(str_ireplace(str_ireplace('-', ' ', $wp_query->query_vars['car_id']) . ' ' . $wp_query->query_vars['car_model'], '', $data['name']));

            $all_data[$data['id']]['name_for_href'] = preg_replace("/ \/ | /", "-", $data['name']);
            $all_data[$data['id']]['name_for_href'] = preg_replace("/\//", "+", $all_data[$data['id']]['name_for_href']);
            $all_data[$data['id']]['name_for_href'] = preg_replace("/>/", "_", $all_data[$data['id']]['name_for_href']);
            $all_data[$data['id']]['name_for_href'] = preg_replace("/e/", "e", $all_data[$data['id']]['name_for_href']);
            $all_data[$data['id']]['name_for_href'] = preg_replace("/&/", "__", $all_data[$data['id']]['name_for_href']);
          }

          ?>
          <section id="content" class="Chiptuning">
            <div class="thirdstep step">
              <label>Шаг 3:</label>
              <span class="choosetext">Выберите тип топлива вашего автомобиля</span>
              <div class="backgroundstep">
                <div class="backgroundstepwrapper">
                  <span class="chiptuningicon"></span>
                  <ul class="step-01">
                    <li style="display: inline; cursor: pointer;" id="filter_all"><a>Все</a></li>
                    <li style="display: inline; cursor: pointer;" id="filter_diesel"><a>Дизель</a></li>
                    <li style="display: inline; cursor: pointer;" id="filter_petrol"><a>Бензин</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="scrollherebaureihe" class="fourthstep step">
              <label>Шаг 4:</label>
              <span class="choosetext">Выберите серию вашего автомобиля</span>
              <div id="baureihe">
                <span class="diesel_row">
                  <?php $wp_query->query_vars[ 'car_model' ] = str_replace('/', '---', $wp_query->query_vars[ 'car_model' ]); ?>

                  <?php foreach ($all_data as $id):

                    $href = get_bloginfo('wpurl') .  '/chiptuning/' . $id['model'] . '/' . $wp_query->query_vars[ 'car_model' ] . '/' . $id['name_for_href'] . '-' . $id['id'];
                    ?>
                    <?php if ($id['engine'] == 4 or $id['engine'] == 5): ?>
                    <a class="baureihe" href="<?php echo $href ?>">
                      <span class="model"><?php echo $id[ 'name' ] ?></span>
                      <div class="zusatzinfo">
                        <span class="hubraum">
                          <span class="left">Объем</span>
                          <span class="right"><?php echo $id[ 'capacity' ] ?> cm&sup3;</span>
                        </span>
                        <span class="leistung">
                          <span class="left">Мощность</span>
                          <span class="right"><?php echo $id[ 'power' ] ?> kW (<?php echo round( $id[ 'power' ] * 1.36 ) ?>PS)</span>
                        </span>
                        <span class="drehmoment">
                          <span class="left">Крутящий&nbsp;момент</span>
                          <span class="right"><?php echo $id['torque'] ?>Nm</span>
                        </span></div>
                    </a>
                     <? endif ?>
                  <? endforeach; ?>
              </span>
              <span class="petrol_row">
                <?php foreach ($all_data as $id):
                  $href = get_bloginfo('wpurl') .  '/chiptuning/' . $id['model'] . '/' . $wp_query->query_vars[ 'car_model' ] . '/' . $id['name_for_href'] . '-' . $id['id'];
                  ?>

                  <?php  if($id['engine'] == 1 or $id['engine'] == 2): ?>
                  <a class="baureihe" href="<?php echo $href ?>">
                    <span class="model"><?php echo $id[ 'name' ] ?></span>
                    <div class="zusatzinfo">
                        <span class="hubraum">
                          <span class="left">Объем</span>
                          <span class="right"><?php echo $id[ 'capacity' ] ?> cm&sup3;</span>
                        </span>
                        <span class="leistung">
                          <span class="left">Мощность</span>
                          <span class="right"><?php echo $id[ 'power' ] ?> kW (<?php echo round( $id[ 'power' ] * 1.36 ) ?>PS)</span>
                        </span>
                        <span class="drehmoment">
                          <span class="left">Крутящий<br>момент</span>
                          <span class="right"><?php echo $id['torque'] ?>Nm</span>
                        </span></div>
                  </a>
                <? endif ?>
                <? endforeach; ?>

              </span>
              </div>
            </div>
            <div style="clear:both;"></div>

          </section>
          <script type="text/javascript">

            var diesel_row = jQuery(".diesel_row");
            var petrol_row = jQuery(".petrol_row");

            diesel_row.hide().fadeIn("slow");
            petrol_row.hide().fadeIn("slow");

            jQuery("#filter_all").on("click", function () {
              diesel_row.fadeIn('slow');
              petrol_row.fadeIn('slow');
            });

            jQuery("#filter_diesel").on("click", function () {
              diesel_row.fadeIn('slow');
              petrol_row.fadeOut('slow');
            });

            jQuery("#filter_petrol").on("click", function () {
              diesel_row.fadeOut('slow');
              petrol_row.fadeIn('slow');
            })
          </script>

<?php
        } else {
          wp_die();
        }


      } else {
        header( 'Location: /index.php' );
      }
    } elseif ( ! empty( $wp_query->query_vars[ 'car_id' ] ) ) {
      if ( preg_match( "/^([a-z-]{1,18})$/", $wp_query->query_vars[ 'car_id' ], $ok ) ) {

        $car_brend     = $ok[ 1 ];
        $data_from_db  = get_models( $car_brend );
        $table_id      = get_models( $car_brend, 1 );
        $racechip_info = racechip_info( 'vehicles', $table_id );
        $model_data    = array();
        foreach ( $data_from_db as $k => $v ) {
          $pieces = explode( " ", $v[ 'name' ] );

          if ( ! preg_match( "/^.+-.+$/", $car_brend ) ) {
            $model_data[ $pieces[ 1 ] ][ ] = $v;
          } else {
            $model_data[ $pieces[ 2 ] ][ ] = $v;
          }
        }

        ?>
        <section id="content" class="Chiptuning">
          <div class="secondstep step">
            <label>Шаг 2:</label> <span class="choosetext">Выберите модель</span>

            <div class="backgroundstep">
              <div class="backgroundstepwrapper">
                <span class="chiptuningicon"></span>
                <ul class="step-01">
                  <?php
                    foreach ( $model_data as $key => $value ):
                      $key2 = $key;
                      $key  = str_replace( '/', '---', $key );
                      ?>
                      <li>
                        <a href="<?php echo get_bloginfo( 'wpurl' ) . "/chiptuning/" . $wp_query->query_vars[ 'car_id' ] . '/' . strtolower( $key ) . '/' ?>"><?php echo $key2 ?></a>
                      </li>
                    <?php

                    endforeach;
                  ?>
              </div>
            </div>
          </div>
        </section>
      <?php
      } else {
        wp_die( 'Такой страницы не существует' );
      }
    } else {
      ?>
      <section id="content" class="Chiptuning">
        <div class="firststep step">
          <label>Шаг 1:</label> <span class="choosetext">Пожалуйста, выберите производителя Вашего автомобиля</span>

          <div class="backgroundstep">
            <div class="backgroundstepwrapper">
              <span class="chiptuningicon"></span>
              <ul class="step-01">
                <?php
                  $data_from_db = get_chiptuning();
                  foreach ( $data_from_db as $data ) {
                    $all_data[ $data[ 'id' ] ] = $data[ 'name' ];
                  }

                  foreach ( $all_data as $key => $value ) {
                    $all_data_r[ $key ] = preg_replace( "/ /", "-", $value );
                    //$all_data_r[$key] = preg_replace("/ \/ | /", "-", $value);
                  }

                  foreach ( $all_data_r as $key => $value ):

                    if ( isset( $all_data[ $key ] ) && is_numeric( $key ) ):
                      $value            = strtolower( trim( $value ) );
                      $all_data[ $key ] = trim( $all_data[ $key ] );
                      ?>

                      <li>
                        <a href="<?php echo get_bloginfo( 'wpurl' ) . "/chiptuning/" . $value ?>"><?php echo $all_data[ $key ] ?></a>
                      </li>
                    <?php
                    endif;
                  endforeach;
                ?>
              </ul>
            </div>
          </div>
        </div>

      </section>
    <?php

    }


    //---------------


    //    echo "<pre>";
    //     print_r($wp_query);
    //
    //     echo "</pre>";
  ?>
  </section>




<?php
//get_sidebar();
  get_footer();
