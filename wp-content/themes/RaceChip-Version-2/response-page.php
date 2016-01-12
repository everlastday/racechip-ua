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
    if (  preg_match( "/-(\d{1,5})$/", $wp_query->query_vars[ 'response_name' ], $ok )
    ) {

        $model_id = (int) $ok[ 1 ];

        $details_from_db = get_response_data(array('id' => $model_id));

        require_once 'response-details.php';
        //}


    }

} elseif ( ! empty( $wp_query->query_vars[ 'response_id' ] ) &&
           ! empty( $wp_query->query_vars[ 'response_model' ] ) ) {

       $brand = urldecode($wp_query->query_vars[ 'response_id' ] );
       $model = urldecode($wp_query->query_vars[ 'response_model' ]);

       $models_from_db = get_response_models( $brand, $model );

        require_once 'response-car-model.php';

} elseif ( ! empty( $wp_query->query_vars[ 'response_id' ] ) ) {

    if ( preg_match( "/^([a-z-+]{1,18})$/", $wp_query->query_vars[ 'response_id' ], $ok ) ) {

        $car_brend = urldecode($ok[ 1 ]);
        $model_data =  get_response_main_models($car_brend);

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