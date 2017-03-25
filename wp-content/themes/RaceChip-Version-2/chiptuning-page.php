<?php
ob_start();
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
?>


<?php
if ( ! empty( $wp_query->query_vars[ 'car_id' ] ) && ! empty( $wp_query->query_vars[ 'car_name' ] ) && ! empty( $wp_query->query_vars[ 'car_model' ] ) ) {
	if ( preg_match( "/-(\d{1,5})$/", $wp_query->query_vars[ 'car_name' ], $ok ) ) {
		$submodel_id = (int) $ok[ 1 ];
		$racechips   = get_products( $submodel_id );
		if ( empty( $racechips ) ) {
			abort_404();
		}
		$price    = get_price_ua();
		if ( ! empty( $racechips[ 0 ][ 'url' ] ) ) {
			preg_match( "/(\d+)hp-(\d+)kw-(\d+)nm/", $racechips[ 0 ][ 'url' ], $output_array );
			$base = [
				'hp' => $output_array[ 1 ],
				'kw' => $output_array[ 2 ],
				'nm' => $output_array[ 3 ],
			];
		}
		require_once 'chiptuning-car-details.php';
	} else {
		abort_404();
	}
} elseif ( ! empty( $wp_query->query_vars[ 'car_id' ] ) && ! empty( $wp_query->query_vars[ 'car_model' ] ) ) {
	$car_brand     = urldecode( $wp_query->query_vars[ 'car_id' ] );
	$car_model     = urldecode( $wp_query->query_vars[ 'car_model' ] );
	$submodel_data = get_submodels( $car_brand, $car_model );
	if ( empty( $submodel_data ) ) {
		abort_404();
	}
	require_once 'chiptuning-car-model.php';
} elseif ( ! empty( $wp_query->query_vars[ 'car_id' ] ) ) {
	$model_data = get_models( $wp_query->query_vars[ 'car_id' ] );
	if ( empty( $model_data ) ) {
		abort_404();
	}
	require_once 'chiptuning-car-type.php';
} else {
	require_once 'chiptuning-car-brand.php';
}
?>
</div>

<?php
$template = ob_get_contents();
ob_end_clean();
get_header(); ?>

<div id="container" class="<?php echo empty( $wp_query->query_vars[ 'car_name' ] ) ? 'one-column-sidebar' : 'one-column'; ?>">
  <div id="content" role="main">

	  <?=$template?>
	  <?php if ( empty( $wp_query->query_vars[ 'car_name' ] ) ) get_sidebar() ?>

  </div><!-- #content -->
</div><!-- #container -->

<?php
get_footer();
?>
