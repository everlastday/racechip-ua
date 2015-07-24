<?php

phpinfo();
die();

date_default_timezone_set('Europe/Moscow');

echo "Today - ".date("d F Y")."<br>";
echo "Current time - ".date("H:i:s");
$current_time = date("Hi");
echo "Current time - ".date("Hi");

if($current_time >= 800 and $current_time <= 1900 ) {
	echo 'standart price';
} else {
	echo 'night price';
}