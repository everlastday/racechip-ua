<?php get_header(); ?>
    <section id="content" class="ResponseControl">
        <? if ( ! empty( $wp_query->query_vars[ 'response_id' ] ) && ! empty( $wp_query->query_vars[ 'response_model' ] ) ) {

            if (preg_match( "/([a-zA-Z-]{1,18})-(\d{1,3})v/", $wp_query->query_vars[ 'response_id' ], $vehicle_id ) &&
                preg_match( "/(.+)$/", $wp_query->query_vars[ 'response_model' ], $ok )) {


                $vehicle_name_bradcrums = explode('----', base64_decode($ok[0]));


                require_once 'chiptuning-responsecontrol.php';

            } else {
                return;
            }
//              }
        } elseif ( ! empty( $wp_query->query_vars[ 'response_id' ] ) && ! empty( $wp_query->query_vars[ 'response_type' ] ) && preg_match( "/([a-zA-Z-]{1,18})-(\d{1,3})v/", $wp_query->query_vars[ 'response_id' ], $ok )) {
            if(is_numeric($ok[2])) {

                $car_type = (int) $wp_query->query_vars[ 'response_type' ];
                $data = get_api_data('RSM', $car_type);




                $vehicle_name = str_replace('-', ' ', $ok[1] );

                array_shift($data); // Исключаем из масива  первий елемент который включает заголовки по типу [0] => 'id' [1] => 'name'

                foreach($data as $k => $v) {
                    if(!empty($v[0]) && !empty($v[1]) && !empty($v[2]) && !empty($v[3]) && !empty($v[4])) {
                        $info[$v[0]]['id'] = $v[0];
                        $info[$v[0]]['name'] = $v[1];
                        $info[$v[0]]['engine'] = $v[2];
                        $info[$v[0]]['capacity'] = $v[3];
                        $info[$v[0]]['power'] = $v[4];
                        $info[$v[0]]['torque'] =  '';
                    }

                }

            }
            require_once 'chiptuning-car-model.php';
        } elseif (! empty( $wp_query->query_vars[ 'response_id' ] ) && preg_match( "/([a-zA-Z-]{1,18})-(\d{1,3})v/", $wp_query->query_vars[ 'response_id' ], $ok ) ) {
            if(is_numeric($ok[2])) {
                $data = get_api_data('RMN', $ok[2]);
                $car_id = $ok[0];


                array_shift($data);

                foreach($data as $k => $v) {
                    if(!empty($v[0]) && !empty($v[1])) {
                        $info[$v[0]]['id'] = $v[0];
                        $info[$v[0]]['name'] = $v[1];
                    }
                }


            }
            require_once 'chiptuning-car-type.php';
        } else {

//            $data = get_api_data('RMF');
//            array_shift($data); // Исключаем из масива  первий елемент который включает заголовки по типу [0] => 'id' [1] => 'name'
//
//            foreach($data as $k => $v) {
//                if(!empty($v[0]) && !empty($v[1])) {
//                    $info[$v[0]]['id'] = $v[0];
//                    $info[$v[0]]['name'] = $v[1];
//                }
//
//            }
//
//
//            require_once 'chiptuning-car-brand.php';
        }
        ?>
        <p><script>jQuery(function() {jQuery( "#accordion" ).accordion({heightStyle: "content"});});</script></p>
    </p>
    <div id="respoMob">
        <div id="accordion">
            <h3>
                <div class="tablewrapper">
                    <div class="tablecell">RaceChip Response Control</div>
                </div>
            </h3>
            <div>
                <div class="video-container">
                    <iframe src="http://www.youtube.com/embed/wM2vU-Ff90U" frameborder="0" width="560" height="315"></iframe>
                </div>
                <p>Ваш автомобиль с опозданием реагирует на нажатие педали газа? Вы бы хотели самостоятельно настроить этот параметр согласно своим индивидуальным пожеланиям и потребностям?</p>
                <p>Немецкие специалисты разработали для автолюбителей отличное решение — RaceChip ReponseControl!</p>
            </div>
            <h3>
                <div class="tablewrapper">
                    <div class="tablecell">Эксплуатация</div>
                </div>
            </h3>
            <div><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/responsecontrol01.jpg" width="100%" class="cnt-img"/>
                <p>RaceChip ReponseControl предлагает 6 преднастроенных режимов отклика педали акселератора. Два агрессивных режима, два спортивных и два экорежима не оставят Вас равнодушными и позволят выбрать оптимальный вариант. Каждый из режимов уникален и идеально подходит для активного вождения, горных дорог, спокойной езды или заснеженной трассы.</p>
                <p>Eco режим обеспечивает плавную работу педали газа во всем диапазоне оборотов двигателя. Это позволяет более эффективно экономить топливо, особенно при езде в черте города.</p>
                <p>Даже в процессе езды Вы можете изменить настройки ResponseControl или отключить его полностью, что приведет автомобиль в заводские параметры.</p>
                <p>Выберите для себя излюбленный режим и RaceChip ResponseControl запомнит его. И больше не нужно будет его активировать при каждом пуске двигателя. Все просто!</p>
            </div>
            <h3>
                <div class="tablewrapper">
                    <div class="tablecell">Характеристики</div>
                </div>
            </h3>
            <div>
                <img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/responsecontrol02.jpg" width="100%" class="cnt-img"/></p>
                <ul>
                    <li>
                        <p>Управление откликом педали газа</p>
                    </li>
                    <li>
                        <p>Первый в своем роде модуль с 2-мя Eco-режимами — максимальная экономия топлива</p>
                    </li>
                    <li>
                        <p>Идеально работает в паре с RaceChip Chiptuning</p>
                    </li>
                    <li>
                        <p>6 индивидуальных режимов работы</p>
                    </li>
                    <li>
                        <p>Подходит для всех типов двигателей и трансмиссий</p>
                    </li>
                    <li>
                        <p>Легкая установка без усилий</p>
                    </li>
                    <li>
                        <p>Качественные материалы корпуса и кабеля</p>
                    </li>
                    <li>
                        <p>Разработан и произведен в Германии</p>
                    </li>
                </ul>
            </div>
            <h3>
                <div class="tablewrapper">
                    <div class="tablecell">Установка</div>
                </div>
            </h3>
            <div>
                <p>В течение 10 минут автолюбитель без особых навыков сможет самостоятельно установить RaceChip ResponseControl. Для установки не понадобятся никакие специальные инструменты.</p>
                <p>Убедитесь пожалуйста, что положение замка зажигания находится в положении «OFF». Подождите примерно 10 минут, чтобы в автомобиле выключились все потребители энергии.</p>
                <ol>
                    <li>1. Отсоедините педаль газа (при необходимости)</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step1.jpg" width="100%" class="cnt-img"/></p>
                    <li>2. Отсоедините оригинальный штекер из разъёма</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step2.jpg" width="100%" class="cnt-img"/></p>
                    <li>3. Соедините кабель с переходным кабелем</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step3.jpg" width="100%" class="cnt-img"/></p>
                    <li>4. Переходной кабель подключите к датчику педали</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step4.jpg" width="100%" class="cnt-img"/></p>
                    <li>5. Подключите переходник к заводскому кабелю</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step5.jpg" width="100%" class="cnt-img"/></p>
                    <li>6. Разместите ResponseControl в подходящем месте</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step6.jpg" width="100%" class="cnt-img"/></p>
                    <li>7. Заведите автомобиль и проверьте работоспособность</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/step7.jpg" width="100%" class="cnt-img"/></p>
                    <li>8. Наслаждайтесь новыми ощущениями от езды</li>
                    <p><img src="http://m.racechip.de/wp-content/themes/racechip-mobil/images/cnt/audi-rs6.jpg" width="100%" class="cnt-img"/>
                </ol>
                </p>
            </div>
        </div>
    </div>
    <p>RaceChip ResponseControl в настоящее время доступен только на полной версии нашего сайта. Нажмите &#8220;Полная версия сайта&#8221; чтобы иметь возможность заказать RaceChip ResponseControl.</p>
    <p><button href="http://racechip.com.ua/?mobile=1" id="bluebuttonrightarrow" type="button">Полная версия сайта</button></p>

    </section>
<?
get_footer();