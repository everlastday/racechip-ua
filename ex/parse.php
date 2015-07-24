<?php

error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: WestSIDe
 * Date: 11.07.14
 * Time: 16:42
 */



require_once "PHPExcel.php";

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);

$objPHPExcel = $objReader->load("rc.xlsx");
$objWorksheet = $objPHPExcel->getActiveSheet();

$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

//echo $highestRow  . ' => ' .  $highestColumn;

//echo '<table border=1>' . "\n";

$general_ctn = 0;
$general_info_array = array();
$info_vehicles = array();
$brand = array();
$model = array();
$update = 0;

if(isset($_GET['update']) and $_GET['update'] == 1)
    $update = 1;


foreach ($objWorksheet->getRowIterator() as $row) {

    //echo '<tr>' . "\n";



    $cellIterator = $row->getCellIterator();

    // This loops all cells, even if it is not set.
    // By default, only cells that are set will be iterated.
    //$cellIterator->setIterateOnlyExistingCells(false);
    $cnt = 1;




    foreach ($cellIterator as $cell) {


      // В файлі існують пусті колнки і ми їх всі пропускаємо.
        if( $cnt != 4 and $cnt != 6  and $cnt != 10 and $cnt != 12 and $cnt != 13 and $cnt != 14 and $cnt != 15 ) {

            $value = (string)$cell->getValue();

            if(!empty($value))
                $general_info_array[$general_ctn][$cnt] = $value;

            if($cnt == 1)

                if(!isset($brand[strtolower($value)]))
                    $brand[strtolower($value)] = $value;

            if($cnt == 2) {
                if(!isset($model[$value]) && !empty($value))
                    $model[$value] = strtolower($general_info_array[$general_ctn][1]);
            }


            if($cnt == 16 and count($general_info_array[$general_ctn]) == 1) { // Якщо в колонці тільки назва бренду то переносим його в окремий масив
                //$brand[] = $general_info_array[$general_ctn][1];
                unset($general_info_array[$general_ctn]);
            }


            //if(!empty($value))
               // echo '<td>' . $value . '</td>' . "\n";
            //else
               // echo '<td>' . 'NULL' . '</td>' . "\n";
            $cnt++;

        } else {
            $cnt++;
            continue;
        }

    }

    //echo '</tr>' . "\n";
    $general_ctn++;
}


//$brand = array_unique($brand, SORT_STRING);
//array_shift($brand);
//echo '</table>' . "\n";



$sql = "SELECT count(*) FROM  `response_vehicles` ";

$count_db_response_vehicles = DatabaseHandler::GetOne( $sql );

array_shift($brand);

if( $count_db_response_vehicles != count($brand) or $update == 1 ) {

    echo "Brand info - old value: " . $count_db_response_vehicles . " updated: " . count($brand) . "<br>";

    $delete_all_data = "TRUNCATE TABLE `response_vehicles`";
    DatabaseHandler::Execute( $delete_all_data );

    foreach($brand as $val_brand) {
        $brend_to_db .= "('". $val_brand ."'),";
    }
    insert_info_to_db('response_vehicles', '`name`', $brend_to_db );
    $update = 1;
}

    $sql = "SELECT * FROM  `response_vehicles` ";

    $data = DatabaseHandler::GetAll( $sql );

    foreach($data as $v) {
        $info_vehicles[strtolower($v['name'])] = $v['id'];
    }



    //array_shift($model);
    unset($model['Model']);



    foreach($model as $val_model => $val_brand) {
        $model_to_db .= "('". $info_vehicles[$val_brand] ."', '". $val_model . "' ),";
    }


    $sql = "SELECT count(*) FROM  `response_models` ";
    $count_db_response_models = DatabaseHandler::GetOne( $sql );

    if(count($model) != $count_db_response_models or $update == 1) {

        echo "Model info - old value: " . $count_db_response_models . " updated: " . count($model) . "<br>";
        $delete_all_models_data = "TRUNCATE TABLE `response_models`";
        DatabaseHandler::Execute( $delete_all_models_data );
        insert_info_to_db('response_models', '`vehicle_id`,`name`', $model_to_db );

        $update = 1;
    }

    if($count_db_response_models > 0) {
        $sql = "SELECT * FROM  `response_models` ";
        $data = DatabaseHandler::GetAll( $sql );

        foreach($data as $v) {
            $info_models[strtolower($v['name'])] = $v['id'];
        }



        array_shift($general_info_array);
        foreach($general_info_array as $k => $v) {

            $general_info_to_db .= "('". $info_vehicles[strtolower($v[1])] . "', '". $info_models[strtolower($v[2])] ."', '$v[3]', '$v[5]', '$v[7]', '$v[8]', '$v[9]', '$v[11]', '$v[16]'),";

            //idebug($v);


        }

        $sql = "SELECT count(*) FROM  `response_general` ";
        $count_db_response_general = DatabaseHandler::GetOne( $sql );

        if(count($general_info_array) != $count_db_response_general or $update == 1) {

            echo "General info - old value: " . $count_db_response_general . " updated: " . count($general_info_array) . "<br>";
            $delete_all_general_data = "TRUNCATE TABLE `response_general`";
            DatabaseHandler::Execute( $delete_all_general_data );
            insert_info_to_db('response_general', '`vehicle_id`,`model_id`,`engine`,`dispacement`,`zylinder`,`power`,`ps`,`swcode`,`kabel`', $general_info_to_db );


        }




    }



    //idebug($model_to_db);
    die();








die();







//idebug($brand);









//idebug($model);









function idebug ( $var ) {
    echo "<pre>";
    print_r( $var );
    echo "</pre>";
}


function insert_info_to_db ( $table = null, $fields = null, $value = null ) {

        //$sql = "INSERT INTO `$table` (" . rtrim( $fields, ',' ) . ") VALUES" . rtrim( $value, ',' ) . ';' . "<br>";

        if(!empty($table) && !empty($fields) && !empty($value) ) {
            $sql = "INSERT INTO `$table` (" . rtrim( $fields, ',' ) . ") VALUES " . rtrim( $value, ',' ) . ';' . " ";
        }

       // print $sql;

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
        define( 'MYY_DB_USERNAME', 'racechip_vehicle' );
        define( 'MYY_DB_PASSWORD', 'IB2ZbrAT3OjE' );
        define( 'MYY_DB_DATABASE', 'racechip_vehicles_db2' );
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


