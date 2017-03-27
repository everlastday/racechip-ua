<?php
ob_start();


if ( ! empty( $wp_query->query_vars[ 'car_id' ] ) && ! empty( $wp_query->query_vars[ 'car_name' ] ) && ! empty( $wp_query->query_vars[ 'car_model' ] ) ) {
	if ( preg_match( "/-(\d{1,5})$/", $wp_query->query_vars[ 'car_name' ], $ok ) ) {
		$submodel_id = (int) $ok[ 1 ];
		$racechips   = get_products( $submodel_id );
		if ( empty( $racechips ) ) {
			abort_404();
		}
		$currency = ' руб.';
		$price    = get_price_ru();
		if ( ! empty( $racechips[ 0 ][ 'url' ] ) ) {
			preg_match( "/(\d+)hp-(\d+)kw-(\d+)nm/", $racechips[ 0 ][ 'url' ], $output_array );
			$base = [
				'hp' => $output_array[ 1 ],
				'kw' => $output_array[ 2 ],
				'nm' => $output_array[ 3 ],
			];
		}
		require_once 'chiptuning-modules.php';
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
	$brand = isset( $submodel_data[ 0 ][ 'name' ] ) ? $submodel_data[ 0 ][ 'name' ] : '';
	$model = isset( $submodel_data[ 0 ][ 'model' ] ) ? str_replace('from', 'с', $submodel_data[ 0 ][ 'model' ]) : '';

	require_once 'chiptuning-car-model.php';
} elseif ( ! empty( $wp_query->query_vars[ 'car_id' ] ) ) {
	$model_data = get_models( $wp_query->query_vars[ 'car_id' ] );
	if ( empty( $model_data ) ) {
		abort_404();
	}
	$brand = isset( $model_data[0]['name'] ) ? $model_data[0]['name'] : '';
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

<section id="content">
	  <?=$template ?>
</section>
<?php
  get_footer();

