<?php

error_reporting( E_ALL );
date_default_timezone_set( 'UTC' );
require_once "PHPExcel.php";
$objReader = PHPExcel_IOFactory::createReader( 'Excel2007' );
$objReader->setReadDataOnly( true );
$objPHPExcel  = $objReader->load( "full2.xlsx" );
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow    = $objWorksheet->getHighestRow();


$highestColumn = $objWorksheet->getHighestColumn();
$tables = array(                    // имена таблиц
        'category' => 'category',
        'brand'    => 'brand',
        'model'    => 'model',
        'chip'     => 'chiptuning',
        'price'    => 'price'
);


$lock = 2;


if($lock > 0 ) {
	die('please unlock script ( variable $lock must be 0 )');
}


// Main code of parse

$update = 1; // Примусово обновити всі таблиці 1 вкл , 0 - выкл

$categories = get_categories_from_excel();
update_categories_in_db($categories, $update);
//
$brands = get_brands_from_excel();
update_brands_in_db($brands, $update);
//
$models = get_models_from_excel();
update_models_in_db($models, $update);
//
$prices = get_price_from_excel();
update_prices_in_db($prices, $update);

//$title = get_title_from_excel();
//d($title)

unset($categories, $brands, $prices, $models);
insert_all_data_from_excel($update);


//--------------------------------------------------



/*
 * Витягує і групує всі категорії авто з ексель файлу (1 колонка)
 * return @array
 */
function get_categories_from_excel() {
	global $objWorksheet;
	global $highestRow;
	$data = array();
	for ( $row = 0; $row <= $highestRow; ++ $row ) {
		// Fetch the data of the columns you need
		$category = $objWorksheet->getCellByColumnAndRow( 0, $row )->getValue();
		if ( ! empty( $category ) ) {
			$data[ $category ] = $category;
		}
	}
	array_shift( $data );

	return $data;
}

/*
 *   Вставляє масив категорії в базу данних
 *
 */
function insert_categories_to_db($category = null) {
	global $tables;
	$category_data = null;

	if(!empty($category) and is_array($category)) {
		foreach($category as  $val_category) {
			$category_data .= "('". $val_category ."'),";
		}
		insert_info_to_db($tables['category'], '`category_name`', $category_data );
		return 1;
	} else {
		return 0;
	}

}

function update_categories_in_db($category = null, $update = 0) {
	global $tables;

	$categories_in_db = get_data_from_db($tables[ 'category' ], 'category_name', 1);
	$categories_in_excel_file  = count($category);

	if($categories_in_db != $categories_in_excel_file  or !empty($update) ) {
		$delete_all_data = "TRUNCATE TABLE " . $tables['category'];
		DatabaseHandler::Execute( $delete_all_data );

		$result = insert_categories_to_db($category);
		if($result == 1)
			info_message('Categories', $categories_in_db, $categories_in_excel_file);
	} else {
		echo "Skip updating categories<br>";
	}
}


// ---------------- get brand


/*
 * Витягує і групує всі категорії авто з ексель файлу (1 колонка)
 * return @array
 */
function get_brands_from_excel() {
	global $objWorksheet;
	global $highestRow;
	$data = array();
	for ( $row = 0; $row <= $highestRow; ++ $row ) {
		// Fetch the data of the columns you need
		$category = $objWorksheet->getCellByColumnAndRow( 0, $row )->getValue();
		$brand = $objWorksheet->getCellByColumnAndRow( 1, $row )->getValue();


		if ( ! empty( $category ) and ! empty( $brand ) ) {
			$data[ $brand ] = $category;
		}
	}


	array_shift( $data );
	$data = convert_categories_to_categories_id($data);
	return $data;
}

function convert_categories_to_categories_id($data) {
	global $tables;

	if(!empty($data) and is_array($data)) {
		$category_id = get_data_from_db($tables[ 'category' ], 'category_name');

		$result = array();

		foreach($data as $brand => $category_name) {
			$category_name = strtolower($category_name);

			if(isset($category_id[$category_name]) and !empty($category_id[$category_name]))
				$result[$brand] = $category_id[$category_name];
		}

		if(!empty($result))
			return $result;
		else
			echo "Error while converting categories<br>";
	}

}
/*
 *   Вставляє масив Брендів в базу данних
 *
 */
function insert_brands_to_db($brand = null) {
	global $tables;
	$data = null;

	if(!empty($brand) and is_array($brand)) {
		foreach($brand as  $val_brand => $val_category ) {
			$data .= "('". $val_brand ."', '". $val_category ."', 1),";
		}
		insert_info_to_db($tables['brand'], '`name`, `category_id`, `chiptuning`', $data);
		return 1;
	} else {
		return 0;
	}

}

function update_brands_in_db($category = null, $update = 0) {
	global $tables;

	$brands_in_db = get_data_from_db($tables['brand'], '', 1);
	$brands_in_excel_file  = count($category);

	if($brands_in_db != $brands_in_excel_file  or !empty($update) ) {
		$delete_all_data = "TRUNCATE TABLE " . $tables['brand'];
		DatabaseHandler::Execute( $delete_all_data );

		$result = insert_brands_to_db($category);
		if($result == 1)
			info_message('Brands', $brands_in_db, $brands_in_excel_file);
	} else {
		echo "Skip updating brands<br>";
	}
}




/*
 *  Витягує дані з бази даних
 * $table - таблиця з якої будуть витягуватись дані
 * $field - імя поля яке буде витягнуто в массив разом з id
 * $count - якщо задана перемінна то функція поверне число данних в табилці
 */
function get_data_from_db( $table = null, $field = null, $count = 0 ) {
	$info = null;

	if(!isset($table)) {
		echo 'unknown table';
		return 0;
	}

	if ( $count == 0 ) {
		$sql = "SELECT * FROM ". $table;
		$data = DatabaseHandler::GetAll( $sql );

		foreach ( $data as $v ) {
			$info[strtolower($v[$field])] = $v['id'];
		}


	} else {
		$sql = "SELECT count(*) FROM ". $table;
		$info = DatabaseHandler::GetOne( $sql );
	}

	return $info;
}

function get_models_from_excel() {
	global $objWorksheet;
	global $highestRow;
	$data = array();
	for ( $row = 0; $row <= $highestRow; ++ $row ) {
		// Fetch the data of the columns you need
		$brand = $objWorksheet->getCellByColumnAndRow( 1, $row )->getValue();
		$model = $objWorksheet->getCellByColumnAndRow( 2, $row )->getValue();

		if ( ! empty( $model ) and ! empty( $brand ) and !isset($data[ $model ])) {

			// Провіряєм чи строка складається тільки з цифр, якщо так то робим з неї строку добавляючи пробел.
			if(ctype_digit($model)) {
				$model =  $model . ' ';
			}

			$data[ $model ] = $brand;
		}
	}
	array_shift( $data );


	$data = convert_brand_to_brand_id($data);
	// Забираэм в масисі у всіх ключів пробели.
	$data2 = array();
	foreach($data as $k => $v) {
		$data2[trim($k)] = $v;
	}

	return $data2;
}

function convert_brand_to_brand_id($data) {
	global $tables;

	if(!empty($data) and is_array($data)) {
		$brand_id = get_data_from_db($tables[ 'brand' ], 'name');

		$result = array();

		foreach($data as $model => $brand_name) {
			$brand_name = strtolower($brand_name);

			if(isset($brand_id[$brand_name]) and !empty($brand_id[$brand_name]))
				$result[$model] = $brand_id[$brand_name];
		}

		if(!empty($result))
			return $result;
		else
			echo "Error while converting brand<br>";
	}

}
function insert_model_to_db($model = null) {
	global $tables;
	$data = null;

	if(!empty($model) and is_array($model)) {
		foreach($model as  $val_model => $val_brand ) {
			$data .= "('". $val_brand ."', '". $val_model . "' ),";
		}


		insert_info_to_db($tables['model'], '`brand_id`,`model`', $data);
		return 1;
	} else {
		return 0;
	}

}

function update_models_in_db($models = null, $update = 0) {
	global $tables;

	$count_in_db = get_data_from_db($tables['model'], '', 1);
	$count_in_excel_file  = count($models);

	if($count_in_db != $count_in_excel_file  or !empty($update) ) {
		$delete_all_data = "TRUNCATE TABLE " . $tables['model'];
		DatabaseHandler::Execute( $delete_all_data );

		$result = insert_model_to_db($models);
		if($result == 1)
			info_message('Models', $count_in_db, $count_in_excel_file);
	} else {
		echo "Skip updating models<br>";
	}
}

function get_price_from_excel() {
	global $objWorksheet;
	global $highestRow;
	$data = array();
	for ( $row = 0; $row <= $highestRow; ++ $row ) {
		// Fetch the data of the columns you need
		$price = $objWorksheet->getCellByColumnAndRow( 19, $row )->getValue();
		$price = preg_replace('~\D+~','',$price);


		if ( ! empty( $price ) and !isset($data[ $price ]) ) {
			$data[ $price ] = $price;
		}
	}

	return $data;
}


function insert_prices_to_db($price = null) {
	global $tables;
	$price_data = null;

	if(!empty($price) and is_array($price)) {
		foreach($price as  $val_price) {
			$price_data .= "('". $val_price ."', 'EUR', 'RU'),";
		}
		insert_info_to_db($tables['price'], 'price, currency, country', $price_data );
		return 1;
	} else {
		return 0;
	}
}

function update_prices_in_db($price = null, $update = 0) {
	global $tables;

	$count_in_db = get_data_from_db($tables['price'], 'price', 1);
	$count_in_excel_file  = count($price);

	if($count_in_db != $count_in_excel_file  or !empty($update) ) {
		$delete_all_data = "TRUNCATE TABLE " . $tables['price'];
		DatabaseHandler::Execute( $delete_all_data );

		$result = insert_prices_to_db($price);
		if($result == 1)
			info_message('Prices', $count_in_db, $count_in_excel_file);
	} else {
		echo "Skip updating prices<br>";
	}
}

function get_title_from_excel() {
	global $objWorksheet;
	$cnt = 1;
	$data = array();


	foreach ( $objWorksheet->getRowIterator() as $row ) {
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells( false );
		foreach ( $cellIterator as $cell ) {
			$data[$cnt] = (string) $cell->getValue();
			$cnt++;
		}

		break;
	}
	 ;
	return array_flip($data);
}

/*
 *  Витягує всі данні з ексель файлу по рядку і вставляє їх в базу
 *
 */
function insert_all_data_from_excel($update = 0) {
	global $objWorksheet;
	global $tables;
	global $highestRow;


	$count_chiptuning = get_data_from_db($tables['chip'], 'id', 1);
	$count_excel_data = $highestRow - 1;

	if($count_chiptuning != $count_excel_data  or !empty($update) ) {
		$delete_all_data = "TRUNCATE TABLE " . $tables['chip'];
		DatabaseHandler::Execute( $delete_all_data );
	} else {
		echo 'Skip update chiptuning';
		return false;
	}



	$general_ctn = 0;
	$data = array();
	$general_info_array = array();
	$category = get_data_from_db($tables['category'], 'category_name');
	$brand = get_data_from_db($tables['brand'], 'name');
	$model = get_data_from_db($tables['model'], 'model');
	$price = get_data_from_db($tables['price'], 'price');
	$doc_title = get_title_from_excel(); // Витягуэм заголовок з документку



	foreach ( $objWorksheet->getRowIterator() as $row ) {
		$cnt = 1;
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells( false );
		foreach ( $cellIterator as $cell ) {

			$value = (string) $cell->getValue();
			if(!empty($value))
				$general_info_array[$general_ctn][$cnt] = $value;
			else
				$general_info_array[$general_ctn][$cnt] = "";


			$cnt++;
		}

		$general_ctn++;

		if($general_ctn > 120) {

			if(isset($general_info_array[0])) {
				array_shift( $general_info_array );
			}

			insert_all_data_to_db($general_info_array, $category, $brand, $model, $price, $doc_title);
			$general_ctn = 1;
			unset($general_info_array);
			$general_info_array = array();
		}
	}

	if(!empty($general_info_array)) {
		insert_all_data_to_db($general_info_array, $category, $brand, $model, $price, $doc_title);
		unset($general_info_array);
	}


	info_message('Chiptuning', $count_chiptuning, $count_excel_data);
	echo "<br><strong>jobs done :)</strong>";
}

function insert_all_data_to_db($data = null, $category = null, $brand = null, $model = null, $price = null, $doc_title = null) {
	global $tables;
	$data_to_db = null;


	foreach($data as $k => $v) {
		$category_val = strtolower( $v[ $doc_title[ 'category' ] ] );
		$category_val = ( isset( $category[ $category_val ] ) ) ? $category[ $category_val ] : 0;
		$brand_val    = strtolower( $v[ $doc_title[ 'oem' ] ] );
		$brand_val    = ( isset( $brand[ $brand_val ] ) ) ? $brand[ $brand_val ] : 0;
		$model_val    = trim(strtolower( $v[ $doc_title[ 'model' ] ] ));

		$model_val    = isset( $model[ $model_val ] ) ? $model[ $model_val ] : 0;






		$price_val    = strtolower( $v[ $doc_title[ 'price' ] ] );
		$price_val    = preg_replace( '~\D+~', '', $price_val );
		$price_val    = ( isset( $price[ $price_val ] ) ) ? $price[ $price_val ] : 200;

		$data_to_db .= "(
			'" . $category_val . "',
			'" . $brand_val . "',
			'" . $model_val . "',
			'" . $v[ $doc_title[ 'typ' ] ] . "',
			'" . $v[ $doc_title[ 'motorisation' ] ] . "',
			'" . $v[ $doc_title[ 'orig. performance kW' ] ] . "',
			'" . $v[ $doc_title[ 'orig. performance PS' ] ] . "',
			'" . $v[ $doc_title[ 'tuning performance kW' ] ] . "',
			'" . $v[ $doc_title[ 'tuning performance PS' ] ] . "',
			'" . $v[ $doc_title[ 'orig. tourque Nm' ] ] . "',
			'" . $v[ $doc_title[ 'tuning torque Nm' ] ] . "',
			'" . $v[ $doc_title[ '+ vmax' ] ] . "',
			'" . $v[ $doc_title[ 'system' ] ] . "',
			'" . $v[ $doc_title[ 'program' ] ] . "',
			'" . $v[ $doc_title[ 'cable' ] ] . "',
			'" . $v[ $doc_title[ 'tn_modul' ] ] . "',
			'" . $v[ $doc_title[ 'tn_cable' ] ] . "',
			'" . $v[ $doc_title[ 'tn_extra_cable' ] ] . "',
			'" . $v[ $doc_title[ 'system number' ] ] . "',
			'" . $price_val . "',
			'" . $v[ $doc_title[ 'engine code' ] ] . "',
			'" . $v[ $doc_title[ 'comment1' ] ] . "',
			'" . $v[ $doc_title[ 'comment2' ] ] . "',
			'" . $v[ $doc_title[ 'comment3' ] ] . "',
			'" . $v[ $doc_title[ 'instruction' ] ] . "',
			'" . $v[ $doc_title[ 'instruction_english' ] ] . "',
			'" . $v[ $doc_title[ 'part approval' ] ] . "',
			'" . $v[ $doc_title[ 'construction year' ] ] . "',
			'" . $v[ $doc_title[ 'diagram' ] ] . "'
		),";
	}
	insert_info_to_db($tables['chip'], 'category_id, brand_id, model_id, typ, motorisation, original_kw, original_ps, tuning_kw, tuning_ps, original_nm, tuning_nm, vmax, system, program, cable, tn_modul, tn_cable, tn_extra_cable, system_number, price_id, engine_code, comment1, comment2, comment3, instruction, instruction_english, part_approval, construction_year, diagram', $data_to_db);
}





function info_message($tip = 'Tip', $old_value = 0, $new_value = 0) {
	echo $tip . " info - old value: " . $old_value . " updated: " . $new_value . "<br>";
}

function d( $var, $die = 0 ) {
	echo "<pre>";
	print_r( $var );
	echo "</pre>";
	if ( $die == 0 ) {
		die( 'end debug' );
	}
}

function insert_info_to_db( $table = null, $fields = null, $value = null, $debug = null) {
	$sql = null;

	if ( ! empty( $table ) && ! empty( $fields ) && ! empty( $value ) ) {
		$sql = "INSERT INTO `$table` (" . rtrim( $fields, ',' ) . ") VALUES " . rtrim( $value, ',' ) . ';' . " ";
	}
	if ( ! isset( $debug ) ) {
		DatabaseHandler::Execute( $sql );
	} else {
		echo $sql . "\r\n<br>";
	}
}

	class DatabaseHandler {

		//Переменная для хранения экземпляра класса PDO
		private static $_mHandler;

		//private-конструктор, не позволяющий напрямую создавать объекты класса
		private function __construct() {
		}

		//Возвращает проинициализированный дескриптор базы данных
		public static function Execute( $sqlQuery, $params = null ) {
			//Пытаемся выполнить SQL-запрос или хранимую процедуру
			try {
				//Получаем дескриптор базы данных
				$database_handler = self::GetHandler();
				//Подготавливаем запрос к выполнению
				$statement_handler = $database_handler->prepare( $sqlQuery );
				//Выполняем запрос
				$statement_handler->execute( $params );
			} //Генерируем обибку, если при выполнении SQL-запроса возникло исключение
			catch ( PDOException $e ) {
				//Закрываем дескриптор базы данных и генерируем ошибку
				self::Close();
				trigger_error( $e->getMessage(), E_USER_ERROR );
			}
		}

		private static function GetHandler() {
			//define( 'MYY_DB_PERSISTENCY', false );
			//define( 'MYY_DB_SERVER', 'localhost' );
			//define( 'MYY_DB_USERNAME', 'racechip_dtegu' );
			//define( 'MYY_DB_PASSWORD', 'v3kMS^mgkxAU' );
			//define( 'MYY_DB_DATABASE', 'racechip_dte_general' );
			//define( 'MYY_PDO_DSN',  );

			$DB_PERSISTENCY = false;
			$DB_SERVER = 'localhost';
			$DB_USERNAME = 'racechip_dtegu';
			$MYY_DB_PASSWORD = 'v3kMS^mgkxAU';
			$DB_DATABASE = 'racechip_dte_general';
			$DB_PDO_DSN = 'mysql:host=' . $DB_SERVER . ';dbname=' . $DB_DATABASE;
			//Создаем соединение с базой данных, только если его еще нет
			if ( ! isset( self::$_mHandler ) ) {
				//Выполняем код, перехватывая потенциальные исключения
				try {
					// Создаем новый экземпляр класса PDO
					self::$_mHandler = new PDO ( $DB_PDO_DSN, $DB_USERNAME, $MYY_DB_PASSWORD, array( PDO::ATTR_PERSISTENT => $DB_PERSISTENCY ) );
					// Устанавливаем кодировку
					self::$_mHandler->exec( "set names utf8" );
					//Настраиваем PDO на генерацию исключений
					self::$_mHandler->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				} catch ( PDOException $e ) {
					//Закрываем дескриптор и генерируем ошибку
					self::Close();
					//echo $e->getMessage();
					trigger_error( $e->getMessage(), E_USER_ERROR );
				}
			}

			//Возвращаем дескриптор базы данных
			return self::$_mHandler;
		}

		//Метод-обертка для PDOStatement::execute()
		public static function Close() {
			self::$_mHandler = null;
		}

		//Метод-обертка для PDOStatement::fetch()
		public static function GetAll( $sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC ) {
			// Инициализируем возвращаемое значение в null
			$result = null;
			// Пытаемся выполнить SQL-запрос или хранимую процедуру
			try {
				// Получаем дескриптор базы данных
				$database_handler = self::GetHandler();
				// Подготовливаем запрос к выполнению
				$statement_handler = $database_handler->prepare( $sqlQuery );
				// Выполняем запрос
				$statement_handler->execute( $params );
				// Получаем результат
				$result = $statement_handler->fetchAll( $fetchStyle );
			} // Генерируем ошибку, если при выполнении SQL-запроса возникло исключение
			catch ( PDOException $e ) {
				// Закрываем дескриптор базы данных и генерируем ошибку
				self::Close();
				//trigger_error($e->getMessage(), E_USER_ERROR);
			}

			// Возвращаем результат запроса
			return $result;
		}


		//Метод-обертка для PDOStatement::fetch()
		public static function GetRow( $sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC ) {
			//Инициализируем возвращаемое значение
			$result = null;
			//Пытаемся выполнить SQL-запрос или хранимую процедуру
			try {
				//Получаем дескриптор базы данных
				$database_handler = self::GetHandler();
				//Подготовливаем запрос к выполнению
				$statement_handler = $database_handler->prepare( $sqlQuery );
				//Выполняем запрос
				$statement_handler->execute( $params );
				//Получаем результат
				$result = $statement_handler->fetch( $fetchStyle );
			} //Генерируем ошибку, если при выполнении SQL-запроса возникло исключение
			catch ( PDOException $e ) {
				//Закрываем дескриптор базы данных и генерируем ошибку
				self::Close();
				trigger_error( $e->getMessage(), E_USER_ERROR );
			}

			//Возвращаем результат запроса
			return $result;
		}

		//Возвращает значение первого столбца из строки
		public static function GetOne( $sqlQuery, $params = null ) {
			//Инициализируем возвращаемое значение
			$result = null;
			//Пытаемся выполнить SQL-запрос или хранимую процедуру
			try {
				//Получаем дескриптор базы данных
				$database_handler = self::GetHandler();
				//Подготовливаем запрос к выполнению
				$statement_handler = $database_handler->prepare( $sqlQuery );
				//Выполняем запрос
				$statement_handler->execute( $params );
				//Получаем результат
				$result = $statement_handler->fetch( PDO::FETCH_NUM );
				//Cохраняем первое значение из множества (первый столбец первой строки) в переменной $result
				$result = $result[ 0 ];
			} //Генерируем ошибку, если при выполнении SQL-запроса возникло исключение
			catch ( PDOException $e ) {
				//Закрываем дескриптор базы данных и генерируем ошибку
				self::Close();
				trigger_error( $e->getMessage() . ' | ' . $e->getCode() . ' | ' . $e->getTraceAsString(), E_USER_ERROR );
			}

			//Возвращаем результат запроса
			return $result;
		}
	}

