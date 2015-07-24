<?php

error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once "PHPExcel.php";

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);

$objPHPExcel = $objReader->load("PedalBox.xlsx");
$objWorksheet = $objPHPExcel->getActiveSheet();

$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

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
        'brand'     => 'brand_pedal',
        'model'     => 'model_pedal',
        'chip'      => 'pedalbox',
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

		if(!empty($value))
			$general_info_array[$general_ctn][$cnt] = $value;
		else
			$general_info_array[$general_ctn][$cnt] = "";

		if($general_ctn > 0) {

			// Колонка з брендом
			if($cnt == 1)
				if(!isset($brand[strtolower($value)]))
					$brand[strtolower($value)] = $value;

			// Колонка з моделью
			if($cnt == 2) {
				if(!isset($model[$value]) && !empty($value))
					$model[$value] = $general_info_array[$general_ctn][1];
			}
		}
		$cnt++;

	}
	if($general_ctn == 40) {
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



/*    GET brand  -------------------        */

$sql = "SELECT count(*) FROM ". $tables['brand'];

$count_db_brand = DatabaseHandler::GetOne( $sql );

if( $count_db_brand != count($brand) or $update == 1 ) {

	echo "PedalBox brand info - old value: " . $count_db_brand . " updated: " . count($brand) . "<br>";

	$delete_all_data = "TRUNCATE TABLE ". $tables['brand'];
	DatabaseHandler::Execute( $delete_all_data );

	foreach($brand as $val_brand) {
		$brand_to_db .= "('". $val_brand ."'),";
	}

	insert_info_to_db($tables['brand'], '`name`', $brand_to_db );
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

	echo "PedalBox Model info - old value: " . $count_db_response_models . " updated: " . count($model) . "<br>";
	$delete_all_models_data = "TRUNCATE TABLE " . $tables['model'];
	DatabaseHandler::Execute( $delete_all_models_data );
	insert_info_to_db($tables['model'], '`brand_id`,`model`', $model_to_db );

	$update = 1;
}

/*    GET PedalBox  -------------------        */

if($count_db_response_models > 0 or $update > 0) {
	$sql = "SELECT * FROM  ". $tables['model'];


	$data = DatabaseHandler::GetAll( $sql );

	foreach($data as $v) {
		$info_models[strtolower($v['model'])] = $v['id'];
	}
	unset($data, $sql);

	foreach($general_info_array as $k => $v) {

		//if(!isset($info_models[strtolower($v[$doc_title['model']])])) {
		//	echo 'value: ' . $v;
		//	d($v, 2);
		//	echo '---';
		//	d($info_models, 2);
		//}


		$general_info_to_db .= "(
			'". $info_vehicles[strtolower($v[$doc_title['oem']])] . "',
			'". $info_models[strtolower($v[$doc_title['model']])] ."',
			'". $v[$doc_title['typ']]. "',
			'". $v[$doc_title['motorisation']]. "',
			'". $v[$doc_title['construction year']]. "',
			'". $v[$doc_title['engine capacity']]. "',
			'". $v[$doc_title['performance kW']]. "',
			'". $v[$doc_title['performance hp']]. "',
			'". $v[$doc_title['system number']]. "'
		),";

	}

	$sql = "SELECT count(*) FROM  " . $tables['chip'];
	$count_db_general = DatabaseHandler::GetOne( $sql );

	if(count($general_info_array) != $count_db_general or $update == 1) {
		echo "Pedalbox info - old value: " . $count_db_general . " updated: " . count($general_info_array) . "<br>";
		$delete_all_general_data = "TRUNCATE TABLE " . $tables['chip'];
		DatabaseHandler::Execute( $delete_all_general_data );
		insert_info_to_db($tables['chip'], 'brand_id, model_id, typ, motorisation, construction_year, engine_capacity, performance_kw, performance_hp, system_number', $general_info_to_db );
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

	//$sql = "INSERT INTO `$table` (" . rtrim( $fields, ',' ) . ") VALUES" . rtrim( $value, ',' ) . ';' . "<br>";

	if(!empty($table) && !empty($fields) && !empty($value) ) {
		$sql = "INSERT INTO `$table` (" . rtrim( $fields, ',' ) . ") VALUES " . rtrim( $value, ',' ) . ';' . " ";
	}



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


