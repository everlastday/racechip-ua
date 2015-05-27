<?php

error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once "PHPExcel.php";

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);

$objPHPExcel = $objReader->load("full2.xlsx");
$objWorksheet = $objPHPExcel->getActiveSheet();

$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

//echo $highestRow  . ' => ' .  $highestColumn;

//echo '<table border=1>' . "\n";

$general_ctn = 0;   // счетчик рядов в документе
$general_info_array = array();  // массив всех данных для хранения всех данных из документа
$info_vehicles = array();   // массив для хранения брендов из базы
$info_categories = array(); // масив для хранения категорий транс. средств из базы
$info_models = array();  //  масив для хранения моделей транс. средств из базы
$info_price = array();  //  масив для хранения цен транс. средств из базы
$category = array();   // масив для хранения категорий из документа
$brand = array();  // массив для хранения брендов из документа
$model = array(); // масив для хранения моделей транс. средств из документа
$price = array();  // масив для хранения цен транс. средств из документа

$update = 1;    // если установить значение 1 то обновит все данные

$doc_title = array(); // для заголовків документу (1 ряд в документі)
$tables = array(                    // имена таблиц
	'category'  => 'category',
	'brand'     => 'brand',
	'model'     => 'model',
	'chip'      => 'chiptuning',
	'price'     => 'price'
);




if(isset($_GET['update']) and $_GET['update'] == 1)
	$update = 1;


foreach ($objWorksheet->getRowIterator() as $row) {

	//echo '<tr>' . "\n";

	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(false);
	$cnt = 1;


	// Цикл для виводу 1 ряду excel документу
	foreach ($cellIterator as $cell) {

		// Якщо строка не э колонкою с датою

			$value = (string) $cell->getValue();

			//if($cnt == 30 and $general_ctn > 0)
			//	$value = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($cell->getCalculatedValue()));



			if(!empty($value))
				$general_info_array[$general_ctn][$cnt] = $value;
			else
				$general_info_array[$general_ctn][$cnt] = "";

			if($general_ctn > 0) {


				// Колонка з категоріями
				if($cnt == 1)
					if(!isset($category[strtolower($value)]))
						$category[strtolower($value)] = $value;

				// Колонка з брендом
				if($cnt == 2)
					if(!isset($brand[strtolower($value)]))
						$brand[$value] = strtolower($general_info_array[$general_ctn][1]);

				// Колонка з моделью
				if($cnt == 3) {
					if(!isset($model[$value]) && !empty($value))
						$model[$value] = $general_info_array[$general_ctn][2];
				}
				// Колонка з ціною
				if($cnt == 20) {
					if ( ! isset( $price[ $value ] ) && ! empty( $value ) ) {
						$price[ $value ] = $value;
					}
				}




			}
			$cnt++;

	}



	if($general_ctn ==  2976) {
		// Ліміт рядків
		//break;

	}
	//echo '</tr>' . "\n";
	$general_ctn++;
}


// Витягуэм і формуэм заголовки для документу
if(!empty($general_info_array[0])) {
	$doc_title  = $general_info_array[0];
	$doc_title = array_flip($doc_title);
	unset($general_info_array[0]);
}

d($general_info_array);

/*    GET category  -------------------        */

$sql = "SELECT count(*) FROM " . $tables['category'];
$count_db_category = DatabaseHandler::GetOne( $sql );
if( $count_db_category != count($category) or $update == 1 ) {

	//echo "Category info - old value: " . $count_db_category . " updated: " . count($category) . "<br>";

	$delete_all_data = "TRUNCATE TABLE " . $tables['category'];
	DatabaseHandler::Execute( $delete_all_data );

	foreach($category as  $val_category) {
		$brend_to_db .= "('". $val_category ."'),";
	}
	insert_info_to_db($tables['category'], '`category_name`', $brend_to_db );
	$update = 1;
}

/*    GET brand  -------------------        */

$sql = "SELECT count(*) FROM ". $tables['brand'];

$count_db_brand = DatabaseHandler::GetOne( $sql );

if( $count_db_brand != count($brand) or $update == 1 ) {

	echo "Brand info - old value: " . $count_db_brand . " updated: " . count($brand) . "<br>";

	$delete_all_data = "TRUNCATE TABLE ". $tables['brand'];
	DatabaseHandler::Execute( $delete_all_data );

	$sql = "SELECT * FROM " . $tables['category'];
	$data = DatabaseHandler::GetAll( $sql );
	foreach($data as $v) {
		$info_categories[strtolower($v['category_name'])] = $v['id'];
	}


	foreach($brand as $val_brand => $val_category) {
		$brand_to_db .= "('". $val_brand ."', '". $info_categories[strtolower($val_category)] ."', 1),";
	}

	insert_info_to_db($tables['brand'], '`name`, `category_id`, `chiptuning`', $brand_to_db );
	$update = 1;
}

/*    GET Model  -------------------        */

$sql = "SELECT * FROM  " . $tables['brand'];
$data = DatabaseHandler::GetAll( $sql );

foreach($data as $v) {
	$info_vehicles[strtolower($v['name'])] = $v['id'];
}

foreach($model as $val_model => $val_brand) {
	$model_to_db .= "('". $info_vehicles[strtolower($val_brand)] ."', '". $val_model . "' ),";
}


$sql = "SELECT count(*) FROM " . $tables['model'];
$count_db_response_models = DatabaseHandler::GetOne( $sql );

if(count($model) != $count_db_response_models or $update == 1) {

	echo "Model info - old value: " . $count_db_response_models . " updated: " . count($model) . "<br>";
	$delete_all_models_data = "TRUNCATE TABLE " . $tables['model'];
	DatabaseHandler::Execute( $delete_all_models_data );
	insert_info_to_db($tables['model'], '`brand_id`,`model`', $model_to_db );

	$update = 1;
}

/*    GET Price  -------------------        */
$sql = "SELECT count(*) FROM " . $tables['price'];
$count_db_price = DatabaseHandler::GetOne( $sql );
if( $count_db_price != count($price) or $update == 1 ) {

	echo "Price info - old value: " . $count_db_price . " updated: " . count($price) . "<br>";

	$delete_all_data = "TRUNCATE TABLE " . $tables['price'];
	DatabaseHandler::Execute( $delete_all_data );

	foreach($price as  $val_price) {
		$price_to_db .= "('". $val_price ."', 'EUR', 'RU'),";
	}
	insert_info_to_db($tables['price'], 'price, currency, country', $price_to_db );
	$update = 1;
}





/*    GET Chiptuning  -------------------        */


if($count_db_response_models > 222222222222222220) {
	$sql = "SELECT * FROM  ". $tables['model'];
	$data = DatabaseHandler::GetAll( $sql );

	foreach($data as $v) {
		$info_models[strtolower($v['model'])] = $v['id'];
	}

	// get price from db
	$sql = "SELECT * FROM  ". $tables['price'];
	$data = DatabaseHandler::GetAll( $sql );

	foreach($data as $v) {
		$info_price[strtolower($v['price'])] = $v['id'];
	}

	unset($data, $sql);

	// get categories from db
	$sql = "SELECT * FROM " . $tables['category'];

	$data = DatabaseHandler::GetAll( $sql );
	foreach($data as $v) {
		$info_categories[strtolower($v['category_name'])] = $v['id'];
	}

	$insert_delimiter = 0;  // Розділяєм кількість значень для вставок ІNSERT
	$general_info_to_db_cnt = 0;
	$general_info_to_db = array();


	foreach($general_info_array as $k => $v) {



		$general_info_to_db[$insert_delimiter] .= "(
			'". $info_categories[strtolower($v[$doc_title['category']])] . "',
			'". $info_vehicles[strtolower($v[$doc_title['oem']])] . "',
			'". $info_models[strtolower($v[$doc_title['model']])] ."',
			'". $v[$doc_title['typ']]. "',
			'". $v[$doc_title['motorisation']]. "',
			'". $v[$doc_title['orig. performance kW']]. "',
			'". $v[$doc_title['orig. performance PS']]. "',
			'". $v[$doc_title['tuning performance kW']]. "',
			'". $v[$doc_title['tuning performance PS']]. "',
			'". $v[$doc_title['orig. tourque Nm']]. "',
			'". $v[$doc_title['tuning torque Nm']]. "',
			'". $v[$doc_title['+ vmax']]. "',
			'". $v[$doc_title['system']]. "',
			'". $v[$doc_title['program']]. "',
			'". $v[$doc_title['cable']]. "',
			'". $v[$doc_title['tn_modul']]. "',
			'". $v[$doc_title['tn_cable']]. "',
			'". $v[$doc_title['tn_extra_cable']]. "',
			'". $v[$doc_title['system number']]. "',
			'". $info_price[strtolower($v[$doc_title['price']])] ."',
			'". $v[$doc_title['engine code']]. "',
			'". $v[$doc_title['comment1']]. "',
			'". $v[$doc_title['comment2']]. "',
			'". $v[$doc_title['comment3']]. "',
			'". $v[$doc_title['instruction']]. "',
			'". $v[$doc_title['instruction_english']]. "',
			'". $v[$doc_title['part approval']]. "',
			'". $v[$doc_title['construction year']]. "',
			'". $v[$doc_title['diagram']]. "'
		),";

		$general_info_to_db_cnt++;

		if($general_info_to_db_cnt > 120) {
			$general_info_to_db_cnt = 0;
			$insert_delimiter++;
		}


	}

	//d($general_info_to_db);

	$sql = "SELECT count(*) FROM  " . $tables['chip'];
	$count_db_general = DatabaseHandler::GetOne( $sql );

	if(count($general_info_array) != $count_db_general or $update == 1) {
		echo "Chip info - old value: " . $count_db_general . " updated: " . count($general_info_array) . "<br>";
		$delete_all_general_data = "TRUNCATE TABLE " . $tables['chip'];
		DatabaseHandler::Execute( $delete_all_general_data );


		$limit_insert_query = 0; // используется для паузы при вставке значенией - 2400 записай затем пауза
		foreach($general_info_to_db as $insert_key => $val) {


			//insert_info_to_db($tables['chip'], 'category_id, brand_id, model_id, typ, motorisation, original_kw, original_ps, tuning_kw, tuning_ps, original_nm, tuning_nm, vmax, system, program, cable, tn_modul, tn_cable, tn_extra_cable, system_number, price_id, engine_code, comment1, comment2, comment3, instruction, instruction_english, part_approval, construction_year, diagram', $general_info_to_db[$insert_key] );

			//$limit_insert_query++;
			//
			//if($limit_insert_query > 19) {
			//	sleep(2);
			//	$limit_insert_query = 0;
			//}


		}

	}
}


die('good job');



function d( $var, $die = 0) {


	echo "<pre>";
	print_r( $var );
	echo "</pre>";

	if($die == 0)  die('end debug');

}


function insert_info_to_db ( $table = null, $fields = null, $value = null ) {


	if(!empty($table) && !empty($fields) && !empty($value) ) {
		$sql = "INSERT INTO `$table` (" . rtrim( $fields, ',' ) . ") VALUES " . rtrim( $value, ',' ) . ';' . " ";
	}

	echo $sql . "\r\n<br>";

	DatabaseHandler::Execute( $sql );




}



class DatabaseHandler
{

	//Переменная для хранения экземпляра класса PDO
	private static $_mHandler;

	//private-конструктор, не позволяющий напрямую создавать объекты класса

	private function __construct () {
	}

	//Возвращает проинициализированный дескриптор базы данных

	public static function Execute ( $sqlQuery, $params = null ) {

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

	private static function GetHandler () {
		define( 'MYY_DB_PERSISTENCY', false );
		define( 'MYY_DB_SERVER', 'localhost' );
		define( 'MYY_DB_USERNAME', 'racechip_dtegu' );
		define( 'MYY_DB_PASSWORD', 'v3kMS^mgkxAU' );
		define( 'MYY_DB_DATABASE', 'racechip_dte_general' );
		define( 'MYY_PDO_DSN', 'mysql:host=' . MYY_DB_SERVER . ';dbname=' . MYY_DB_DATABASE );
		//Создаем соединение с базой данных, только если его еще нет
		if ( ! isset( self::$_mHandler ) ) {
			//Выполняем код, перехватывая потенциальные исключения
			try {
				// Создаем новый экземпляр класса PDO
				self::$_mHandler =
					new PDO ( MYY_PDO_DSN, MYY_DB_USERNAME, MYY_DB_PASSWORD,
						array( PDO::ATTR_PERSISTENT => MYY_DB_PERSISTENCY ) );
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

	public static function Close () {
		self::$_mHandler = null;
	}

	//Метод-обертка для PDOStatement::fetch()

	public static function GetAll ( $sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC ) {
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

	public static function GetRow ( $sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC ) {
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

	public static function GetOne ( $sqlQuery, $params = null ) {
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
			trigger_error( $e->getMessage(), E_USER_ERROR );
		}

		//Возвращаем результат запроса
		return $result;

	}
}



?>


