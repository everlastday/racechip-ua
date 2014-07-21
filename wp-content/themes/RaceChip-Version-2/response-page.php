<?php
/**
 * Template Name: Response
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
<div id="container" class="<?php echo empty( $wp_query->query_vars[ 'response_name' ] ) ? 'one-column-sidebar' : 'one-column'; ?>">
        <div id="content" role="main">
<?php


//print_r($wp_query);

if ( ! empty( $wp_query->query_vars[ 'response_id' ] ) && ! empty( $wp_query->query_vars[ 'response_name' ] ) && ! empty( $wp_query->query_vars[ 'response_model' ] ) ) {
    if ( preg_match( "/^([a-zA-Z-_+]{1,18})$/", $wp_query->query_vars[ 'response_id' ], $get_model ) &&
        preg_match( "/^([a-zA-Z0-9-()\.\,\+_]*)-(\d{1,5})$/", $wp_query->query_vars[ 'response_name' ], $ok )
    ) {

        $model_id = (int) $ok[ 2 ];


        $data_from_db = get_response_data(array('id' => $model_id));





        //$data_from_db = get_chiptuning( $wp_query->query_vars[ 'car_id' ], $model_id );
        //$box_count    = 0;



        //d($page_template);
        //if(is_file($page_template)) {
        //d($page_template);
        require_once 'response-details.php';
        //}


    }

} elseif ( ! empty( $wp_query->query_vars[ 'response_id' ] ) && ! empty( $wp_query->query_vars[ 'response_model' ] ) ) {
    if ( preg_match( "/^([a-zA-Z-_+]{1,18})$/", $wp_query->query_vars[ 'response_id' ], $ok ) ) {


        // print $wp_query->query_vars[ 'car_model' ];
        //$model        = (int) $ok[ 2 ];
        $car_brend = urldecode($ok[ 1 ]);
        $wp_query->query_vars[ 'car_model' ] = str_replace('---', '/', $wp_query->query_vars[ 'car_model' ]);

        $models_from_db = get_response_models( $car_brend );
        //d($models_from_db);
        $model_data = array();
        foreach ( $models_from_db as $k => $v ) {
            $pieces = explode( " ", $v[ 'name' ] );

            //d($wp_query->query_vars[ 'car_model' ]);

            // Исключение для автомобилей с маркой которые содержат два слова
            if ( ! preg_match( "/\(|\)/", $pieces[ 1 ] ) )
                $model_data_from_db = trim($pieces[ 0 ] . ' '. $pieces[ 1 ]);
            else
                $model_data_from_db = trim($pieces[ 0 ]);


            if ( strtolower(  $model_data_from_db ) == urldecode($wp_query->query_vars[ 'response_model' ])) {
                $model_from_db[ ] = $v;
            }

            //$model_data[$pieces[1]][] = $v;

        }
       //d($model_from_db);


        $brend_id = get_response_models( $car_brend, 1 );
        if(isset($brend_id) and !empty($brend_id) and isset($model_from_db[0]['id']) and !empty($model_from_db[0]['id'])) {
          $data_from_db = get_response_data(array('vehicle_id' => $brend_id, 'model_id' => $model_from_db[0]['id']));

        }

        require_once 'response-car-model.php';



    } else {
        header( 'Location: /index.php' );
    }


//              }
} elseif ( ! empty( $wp_query->query_vars[ 'response_id' ] ) ) {
    //;


    if ( preg_match( "/^([a-z-+]{1,18})$/", $wp_query->query_vars[ 'response_id' ], $ok ) ) {

        //$model        = (int) $ok[ 2 ];
        $car_brend = urldecode($ok[ 1 ]);




        $data_from_db = get_response_models( $car_brend );

        //d($data_from_db);

        $table_id = get_response_models( $car_brend, 1 );

        //echo $table_id;


        //d($data_from_db);
        $model_data = array();
        foreach ( $data_from_db as $k => $v ) {
            $pieces = explode( " ", $v[ 'name' ] );

            if ( ! preg_match( "/\(|\)/", $pieces[ 1 ] ) )
                $model_data[ trim($pieces[ 0 ] . ' '. $pieces[ 1 ]) ][ ] = $v;
            else
                $model_data[ trim($pieces[ 0 ]) ][ ] = $v;
        }


        require_once 'response-car-type.php';

    } else {
        header( 'Location: /index.php' );
    }
} else {

    require_once 'response-car-brand.php';
}


?>
</div>

  <?php
    if ( empty( $wp_query->query_vars[ 'response_name' ] ) ) {
        get_sidebar();
    }
  ?>
        </div><!-- #content -->
</div><!-- #container -->
</div>
<?php get_footer(); ?>