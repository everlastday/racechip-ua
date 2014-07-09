<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <script type="text/javascript">
    function ActionSubmit(th) {
      if (th.siteurl.value == "") {
        alert("Укажите URL для выполнения анализа!");
        th.siteurl.focus();
        return false;
      }
      th.sb.disabled = true;
      return true;
    }
  </script>

</head>

<body>
<form method="post" name="seoform" id="seoform" onsubmit="return ActionSubmit(this)">
  Укажите URL для анализа<br /> <input type="text" size="50" name="siteurl" value="<?php echo $_POST[ 'siteurl' ]; ?>"> <input type="submit" value="Анализ" name="sb">
  <input type="hidden" value="do" name="act">
</form>



<?php
  if ( ! empty( $_POST[ 'siteurl' ] ) ) {
    $url = parse_url_if_valid( $_POST[ 'siteurl' ] );
    if ( ! $url ) {

      echo "Введите валидный адрес сайта";
      exit();
    } else {


      //echo "Ваш url: " . 'http://api.pr-cy.ru/analysis.json?domain=' . $url;

      $pr_cy_data = get_data( 'http://api.pr-cy.ru/analysis.json?domain=' . $url );

      $pr_cy_data = json_decode( $pr_cy_data );


      echo $pr_cy_data->stats->alexa_rank;
      idebug($pr_cy_data);





    }
  }


  function parse_url_if_valid ( $url ) {
    // Массив с компонентами URL, сгенерированный функцией parse_url()
    $arUrl = parse_url( $url );
    // Возвращаемое значение. По умолчанию будет считать наш URL некорректным.
    $ret = null;

    // Если не был указан протокол, или
    // указанный протокол некорректен для url
    if ( ! array_key_exists( "scheme", $arUrl )
      || ! in_array( $arUrl[ "scheme" ], array( "http", "https" ) )
    )
      // Задаем протокол по умолчанию - http
    $arUrl[ "scheme" ] = "http";

    // Если функция parse_url смогла определить host
    if ( array_key_exists( "host", $arUrl ) &&
      ! empty( $arUrl[ "host" ] )
    )
      // Собираем конечное значение url
    $ret = sprintf( "%s%s",
      $arUrl[ "host" ], $arUrl[ "path" ] );

    // Если значение хоста не определено
    // (обычно так бывает, если не указан протокол),
    // Проверяем $arUrl["path"] на соответствие шаблона URL.
    else if ( preg_match( "/^\w+\.[\w\.]+(\/.*)?$/", $arUrl[ "path" ] ) )
      // Собираем URL
    $ret = sprintf( "%s://%s", $arUrl[ "scheme" ], $arUrl[ "path" ] );

    // Если url валидный и передана строка параметров запроса
    if ( $ret && empty( $ret[ "query" ] ) )
      $ret .= sprintf( "?%s", $arUrl[ "query" ] );

    return rtrim( $ret, '/' );
  }

  function get_data ( $url ) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
    $data = curl_exec( $ch );
    curl_close( $ch );

    return $data;
  }


  function idebug ( $var ) {
    echo "<pre>";
    print_r( $var );
    echo "</pre>";
  }

?>

</body>
</html>