<?

if(isset($data_from_db[0]['vehicle_name']) and !empty($data_from_db[0]['vehicle_name']))
    $vehicle_name = $data_from_db[0]['vehicle_name'];
else
    $vehicle_name = urldecode($wp_query->query_vars[ 'response_id' ]);

  $full_model = $vehicle_name . ' ' .  ucwords(urldecode($wp_query->query_vars[ 'response_model' ])) . ' ' .  $data_from_db[0]['engine'];
?>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
<script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            var divs = $('.mydivs>div');
            var now = 0; // currently shown div
            divs.hide().first().show(); // hide all divs except first
            $("button[name=next]").click(function() {
                divs.eq(now).hide();
                now = (now + 1 < divs.length) ? now + 1 : 0;
                divs.eq(now).show(); // show next
            });
            $("button[name=prev]").click(function() {
                divs.eq(now).hide();
                now = (now > 0) ? now - 1 : divs.length - 1;
                divs.eq(now).show(); // show previous
            });
            $('[data-rc-box-slider="true"]').each(function() {
                var $title = $(this).find('.rc-box-title');
                $title.click(function() {
                    var $content = $(this).parent().find('.rc-box-content');
                    if ('none' == $content.css('display')) {
                        $content.slideDown(150);
                    } else {
                        $content.slideUp(150);
                    }
                });
            });
        });
    })(jQuery);


</script>
<script type="text/javascript">
    function swap(targetID) { obj = document.getElementById(targetID);
        obj.style.display = (obj.style.display == 'none') ? 'block' : 'none'; }
</script>

<div class="resonsecntDetail" style="margin: 0 auto"><!-- detail container start -->

<div class="chiptuning_breadcrump" style="margin: 10px 0">
    <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/">ResponseControl</a> &gt; <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/<?php echo urlencode(strtolower($vehicle_name)); ?>/"><?php echo $vehicle_name; ?></a>  &gt; <a href="<?php echo get_bloginfo( 'wpurl' ); ?>/responsecontrol/<?php echo urlencode(strtolower($vehicle_name)) . '/' . urlencode($wp_query->query_vars[ 'response_model' ]); ?>/"><?php echo ucwords(urldecode($wp_query->query_vars[ 'response_model' ])); ?></a> &gt; <?php echo urldecode($wp_query->query_vars[ 'response_name' ]); ?>
</div>
<h1>RaceChip ResponseControl для  <?php echo $full_model ?> </h1>
<h3 class="pagetitle">RaceChip Response Control &#8211; ускорение отклика педали газа для Вашего авто</h3>
<div class="Produktbox">

    <div class="priceinf">

        <p style="float:left;margin:0px;width:100%" class="price">€ 219,-</p>

        <div id="detail_towk_btn_rc_response" class="cta2013-btn online-message-btn" data-chip="ResponseControl" data-model="<? echo $full_model ?>">Заказать</div>
        <p style="margin:8px 0 0 0;float:left;text-align:left;padding-left:40px;" class="mwst"></p>

        <p style="float:left" class="delivery">в наличии, отправка в течение 24 часов</p>
        <p style="float:left" class="delivery">бесплатная доставка по Украине</p>
        <div class="product-pics" style="margin-top:15px">
            <ul style="width:350px">
                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_1.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_1-small.jpg" width="50" height="50" alt="Ansicht des RaceChip® von vorne, oben rechts" title="RaceChip® Chiptuning Produkt: RaceChip® (von vorne, oben rechts)" /></a></li>

                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_2.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_2-small.jpg" width="50" height="50" alt="Ansicht des RaceChip® von vorne, oben rechts" title="RaceChip® Chiptuning Produkt: RaceChip® (von vorne, oben rechts)" /></a></li>

                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_3.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_3-small.jpg" width="50" height="50" alt="Ansicht des RaceChip® von vorne, oben rechts" title="RaceChip® Chiptuning Produkt: RaceChip® (von vorne, oben rechts)" /></a></li>

                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_4.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_4-small.jpg" width="50" height="50" alt="Ansicht des RaceChip® von vorne, oben rechts" title="RaceChip® Chiptuning Produkt: RaceChip® (von vorne, oben rechts)" /></a></li>

                <li><a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_5.jpg" rel="racechip-ultimate"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/pp_rcrc_5-small.jpg" width="50" height="50" alt="Ansicht des RaceChip® von vorne, oben rechts" title="RaceChip® Chiptuning Produkt: RaceChip® (von vorne, oben rechts)" /></a></li>
            </ul>
        </div>
    </div>
</div>


<div class="columns"><!--column start-->
    <div class="columnLeft"><!--left start-->
        <p class="whfo">Ваш автомобиль с опозданием реагирует на нажатие педали газа? Вы бы хотели самостоятельно настроить этот параметр согласно своим индивидуальным пожеланиям и потребностям?</p>
        <p class="whfo">Немецкие специалисты разработали для автолюбителей отличное решение - RaceChip ReponseControl!</p>
        <p class="whfo">RaceChip ReponseControl предлагает 6 преднастроенных режимов отклика педали акселератора. Два агрессивных режима, два спортивных и два экорежима не оставят Вас равнодушными и позволят выбрать оптимальный вариант. Каждый из режимов уникален и идеально подходит для активного вождения, горных дорог, спокойной езды или заснеженной трассы.</p>
    </div>

    <div class="columnRight"><!--left start-->
        <p class="whfo">Eco режим обеспечивает плавную работу педали газа во всем диапазоне оборотов двигателя. Это позволяет более эффективно экономить топливо, особенно при езде в черте города.</p>
        <p class="whfo">Даже в процессе езды Вы можете изменить настройки ResponseControl или отключить его полностью, что приведет автомобиль в заводские параметры.</p>
        <p class="whfo">Выберите для себя излюбленный режим и RaceChip ResponseControl запомнит его. И больше не нужно будет его активировать при каждом пуске двигателя. Все просто!
        </p>
    </div>
</div>
<div style="clear:both"></div>
<p style="width:100%;float:left;margin:0 0 10px 0;color:#fff;font-size:14px;"><strong>Характеристики:</strong></p>
<div class="columns"><!--column start-->
<div class="columnLeft"><!--left start-->

    <div class="listbo listnon">
        <div class="iconfront"></div>
        <div class="cont">
            <table>
                <tr>
                    <td>Управление откликом педали газа</td>
                </tr>
            </table>
        </div>

    </div>

    <a href="#modul2eco" class="fancybox"><div class="listbo">
            <div class="iconfront"></div>
            <div class="cont">
                <table>
                    <tr>
                        <td>Первый в своем роде модуль с 2-мя Eco-режимами<br />- максимальная экономия топлива</td>
                    </tr>
                </table>
            </div>
            <div class="tipicon"><img src="/wp-content/themes/RaceChip-Version-2/images/chiptuning/tip-icon.png" /></div>
        </div></a>


    <a href="#motogetr" class="fancybox"><div class="listbo">
            <div class="iconfront"></div>
            <div class="cont">
                <table>
                    <tr>
                        <td>Подходит для всех типов двигателей и трансмиссий</td>
                    </tr>
                </table>
            </div>
            <div class="tipicon"><img src="/wp-content/themes/RaceChip-Version-2/images/chiptuning/tip-icon.png" /></div>
        </div></a>


    <a href="#doit" class="fancybox"><div class="listbo">
            <div class="iconfront"></div>
            <div class="cont">
                <table>
                    <tr>
                        <td>Легкая установка без усилий</td>
                    </tr>
                </table>
            </div>
            <div class="tipicon"><img src="/wp-content/themes/RaceChip-Version-2/images/chiptuning/tip-icon.png" /></div>
        </div></a>



</div>

<div class="columnRight"><!--left start-->

    <div class="listbo listnon">
        <div class="iconfront"></div>
        <div class="cont">
            <table>
                <tr>
                    <td>6 индивидуальных режимов работы</td>
                </tr>
            </table>
        </div>

    </div>

    <a href="#idealkombi" class="fancybox"><div class="listbo">
            <div class="iconfront"></div>
            <div class="cont">
                <table>
                    <tr>
                        <td>Идеально работает в паре с RaceChip Chiptuning</td>
                    </tr>
                </table>
            </div>
            <div class="tipicon"><img src="/wp-content/themes/RaceChip-Version-2/images/chiptuning/tip-icon.png" /></div>
        </div></a>

    <a href="#tuevein" class="fancybox"><div class="listbo">
            <div class="iconfront"></div>
            <div class="cont">
                <table>
                    <tr>
                        <td>Качественные материалы корпуса и кабеля</td>
                    </tr>
                </table>
            </div>
            <div class="tipicon"><img src="/wp-content/themes/RaceChip-Version-2/images/chiptuning/tip-icon.png" /></div>
        </div></a>


    <div class="listbo listnon">
        <div class="iconfront"></div>
        <div class="cont">
            <table>
                <tr>
                    <td>Разработан и произведен в Германии</td>
                </tr>
            </table>
        </div>

    </div>
</div>



<div class="columnOne"><!--columnOne start-->
    <p class="headline whfo"><strong>Как работает RaceChip Response Control?</strong></p>
    <p class="whfo">На лицевой стороне пульта управления размещены кнопки + и - для выбора одного из 6-ти положений регулятора. Путём кратного нажатия одной из клавиш + или - Вы выбираете наиболее подходящий для Вас режим. Отключение RaceChip ResponseControl возвращает настройки автомобиля в заводские параметры.</p>

    <p class="whfo">На слайде ниже можно ознакомиться с интерактивным управлением, вариантами индикации выбранного режима, характеристиками и оказываемом эффекте каждого из 6-ти установленных режимов RaceChip ResponseControl на разгон и динамику Вашего автомобиля:</p>
</div>

<div class="Produktbox middle">

    <div class="left">
        <div class="controlpanel">
            <div class="offli"><a class="offline" href="javascript:toggleDiv('toggle');" onClick="swap('element')"></a></div>
            <button class="prevbtn btn" name="next"></button>
            <button class="nextbtn btn" name="prev"></button>
        </div>
    </div>
    <div class="right"><!--right control start-->
        <div id="toggle" style="display:block;">
            <div class="mydivs">
                <div class="first">
                    <div class="head"><h3>Режим: Eco I</h3></div>

                    <div class="content">
                        <p>In der Einstellung Eco II wird das Ansprechverhalten Ihres Fahrzeugs moderat reduziert.</p>
                        <p>Dadurch wird eine Verbrauchsreduktion im Vergleich zu Eco I nochmals zusätzlich begünstigt, da Sie Ihr Fahrzeug in diesem Programm oftmals in einem niedrigeren Drehzahlbereich bewegen.</p>
                        <p>Eco II eignet sich damit besonders gut für langsameren Stadt- und Stop &#038; Go-Verkehr.</p>
                    </div>
                    <div class="led"></div>
                </div>

                <div class="second">
                    <div class="head"><h3>Режим: Eco II</h3></div>
                    <div class="content">
                        <p>In der Einstellung Eco I wird das Ansprechverhalten des Gaspedals leicht verringert. So lassen sich bessere Verbrauchswerte erreichen und ein komfortorientiertes Fahren
                            wird begünstigt.</p>
                    </div>
                    <div class="led"></div>
                </div>

                <div class="third">
                    <div class="head"><h3>Режим: Sport I</h3></div>
                    <div class="content">
                        <p>In Sport I wird das Ansprechverhalten Ihres Fahrzeugs leicht optimiert.</p>
                        <p>Diese Stufe eignet sich gut als Basiseinstellung für Fahrzeuge, die im Serienzustand etwas zu träge auf Gaspedalbefehle reagieren, Sie aber dennoch auf Komfort im Ansprechverhalten Wert legen.</p>
                    </div>
                    <div class="led"></div>
                </div>

                <div class="fourth">
                    <div class="head"><h3>Режим: Sport II</h3></div>
                    <div class="content">
                        <p>Режим Sport II существенно улучшает время отклика педали газа.</p>
                        <p>Настройки данного режима хорошо подходят для автомобилей со значительной задержкой реакции на изменения положения акселератора.</p>
                        <p>Sport II - рекомендуется для большинства внедорожников.</p>
                    </div>
                    <div class="led"></div>
                </div>

                <div class="fifth">
                    <div class="head"><h3>Режим: Sport Plus I</h3></div>
                    <div class="content">
                        <p>Die Einstellung Sport Plus I führt zu einem deutlich gesteigerten Ansprechverhalten und ist ideal für ein sehr sportliches Fahren.</p>
                        <p>Wollen Sie Ihr Fahrzeug beispielsweise auf einer Landstraße in schnellen Kurven genießen, sind sie in dieser Einstellung richtig unterwegs.</p>
                    </div>
                    <div class="led"></div>
                </div>

                <div class="sixth">
                    <div class="head"><h3>Режим: Sport Plus II</h3></div>
                    <div class="content">
                        <p>In der Einstellung Sport Plus II entspricht das Ansprechverhalten Ihres Fahrzeugs auf Gaspedalbefehle dem reinrassiger Sportwagen.</p>
                        <p>Diese Stufe eignet sich für eine sehr sportliche Fahrweise oder auch für die Rennstrecke. Jeder Gasbefehl wird beinahe verzögerungsfrei umgesetzt und Ihr Fahrzeug fährt sich wesentlich sportlicher.</p>
                    </div>
                    <div class="led"></div>
                </div>


            </div>
        </div>

        <div id="element" style="display:none">
            <div class="off-cnt">
                <div class="head"><h3>ResponseControl Off</h3></div>
                <div class="content">
                    <p>Bei ausgeschaltetem RaceChip ResponseControl befindet sich das Ansprechverhalten Ihres Fahrzeugs im Serienzustand.</p>
                    <p>Schalten Sie RaceChip ResponseControl wieder ein so ist das von Ihnen zuletzt genutzte Programm für den nächsten Start gespeichert.</p>
                </div>
            </div>
        </div>
    </div><!-- right sontrol end-->
</div>

<div class="columns"><!--column start-->
    <div class="columnLeft"><!--left start-->
        <div class="box">
            <div class="headline slope">
                <p class="title">Видео о Response Control</p>
            </div>






            <a href="#framevideo" class="fancybox" rel="fancybox"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/box-img-placerholder.jpg" width="445" height="184" alt="racechip" />
                <div class="image-overlay"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/overlay-play.png" width="445" height="185" alt="racechip" /></div></a>

        </div>

        <p style="font-weight:strong;float:left;margin:20px 0 0 0;color:#fff;font-size:14px;"><strong>Часто задаваемые вопросы FAQ:</strong></p>
        <div class="rc-einbau rc-box-1" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Насколько правомерно использование RaceChip ResponseControl?</span></h5>
            <div class="rc-box-content hidden">
                <p>Mit ResponseControl steigern Sie die Fahrdynamik Ihres Fahrzeugs spürbar oder ermöglichen ein zusätzliches Spritsparpotenzial, und das alles, ohne direkt die Leistungsdaten Ihres Fahrzeugs zu verändern oder bauliche Veränderungen vornehmen zu müssen (ResponseControl kann in nur wenigen Schritten einfach direkt am Gaspedalsensor installiert werden). Dadurch ist ResponseControl komplett eintragungsfrei und kann direkt nach dem Einbau verwendet werden.</p>
            </div>
        </div>

        <div class="rc-einbau rc-box-1" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Возможна ли установка и использование RaceChip ResponseControl на гарантийном автомобиле?</span></h5>
            <div class="rc-box-content hidden">
                <p>Die Herstellergarantie Ihres Fahrzeugs bleibt vom Einbau unberührt.</p>
            </div>
        </div>

        <div class="rc-einbau rc-box-1" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Я могу сам установить RaceChip ResponseControl?</span></h5>
            <div class="rc-box-content hidden">
                <p>RaceChip ResponseControl Einbau funktioniert nach dem von RaceChip stets verfolgten Plug &#038; Play Prinzip und kann ohne Spezialwerkzeug oder technisches Vorwissen innerhalb von nur wenigen Minuten durch Sie durchgeführt werden.</p>
                <p>Detaillierte Informationen zum Einbau finden Sie auf der dem Produkt beiliegenden, bebilderten Einbauanleitung oder direkt unten auf dieser Seite.</p>
            </div>
        </div>

        <div class="rc-einbau rc-box-1" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Влияет ли RaceChip ResponseControl на программное обеспечение моего автомобиля?</span></h5>
            <div class="rc-box-content hidden">
                <p>Nein. Die Funktionsweise von ResponseControl über den Gaspedal-Sensor ist unabhängig vom Betrieb eines RaceChip Chiptuning-Moduls. Natürlich erreichen Sie durch die Verwendung beider Produkte aber ein noch besseres Fahrgefühl.</p>
            </div>
        </div>


    </div><!--left end-->

    <div class="columnRight">
        <div class="box">
            <p style="margin:0px 0 0 0;color:#fff;font-size:14px;"></p>
            <div class="headline slope">
                <p class="title">Обои RaceChip на рабочий стол</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/wallpaper_bmw_135i_racechip.jpg" title="racechip wallpaper bmw 135i" alt="racechip wallpaper bmw 135i"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/wallpaper_bmw_135i_racechip-small.jpg" width="445" height="184" alt="racechip" />
                <div class="image-overlay"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/overlay-download.png" width="445" height="185" alt="racechip" /></div></a>
        </div>
        <p style="float:left;margin:20px 0 0 0;color:#fff;font-size:14px;">&nbsp; </p>
        <div class="rc-einbau rc-box-2" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">В чём отличие от чиптюнинга?</span></h5>
            <div class="rc-box-content hidden">
                <p>Während es sich beim Chiptuning um eine moderne und sehr effektive Methode zur Leistungssteigerung handelt wird durch die Installation von ResponseControl nicht die Leistung, sondern das Ansprechverhalten des Fahrzeugs optimiert. Aus diesem Grund wird ResponseControl auch nicht im Motorraum Ihres Fahrzeugs angebracht, sondern unmittelbar am Gaspedal mit dem entsprechenden Sensor.</p>
                <p>Vor allem durch die Kombination einer Leistungssteigerung über eines unserer Chiptuning-Modelle und die Optimierung des Ansprechverhaltens durch ResponseControl lassen sich hervorragende Ergebnisse erzielen. Ihr Fahrzeug verfügt über eine deutliche Mehrleistung und diese ist nun noch unmittelbarer abrufbar für ein Maximum an Dynamik und Performance.</p>
            </div>
        </div>

        <div class="rc-einbau rc-box-2" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Влияет ли RaceChip ResponseControl на ресурс двигателя?</span></h5>
            <div class="rc-box-content hidden">
                <p>Nein. ResponseControl verbessert lediglich das Ansprechverhalten Ihres Fahrzeugs und greift in keinster Weise in den Motor an sich ein. Die Lebensdauer des Motors wird daher nicht beeinträchtigt.</p>
            </div>
        </div>

        <div class="rc-einbau rc-box-2" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Почему автопроизводитель не предоставляет аналогичную опцию еще с завода?</span></h5>
            <div class="rc-box-content hidden">
                <p>Das Ansprechverhalten der meisten Fahrzeuge ist immer ein Kompromiss, der vielen Kundengruppen gerecht werden muss – und in einigen Fällen fragen wir uns auch, warum gerade diese Basiseinstellung gewählt wurde.</p>
                <p>Während Fahrer A seine Limousine gerne sportlich bewegt, fährt Fahrer B gerne sehr komfortabel und umweltbewusst. Mit ResponseControl können Sie nun jedoch das Ansprechverhalten Ihres Fahrzeugs individuell über die 6 Stufen anpassen.</p>
            </div>
        </div>

        <div class="rc-einbau rc-box-2" data-rc-box-slider="true">
            <h5 class="rc-box-title"><span class="selector">Какая гарантия на RaceChip ResponseControl?</span></h5>
            <div class="rc-box-content hidden">
                <p>Ja, ResponseControl kommt mit einer zweijährigen Produktgarantie. Wir entwickeln und fertigen unsere Produkte stets unter den höchsten Qualitätsstandards.</p>
            </div>
        </div>
    </div><!--right end-->
</div><!-- column end-->



<div style="clear:both"></div>

<div class="columnOne"><!--columnOne start-->
    <p class="headline whfo"><strong>Самостоятельная установка: быстро и легко!</strong></p>
    <p class="whfo">В течение 10 минут автолюбитель без особых навыков сможет самостоятельно установить RaceChip ResponseControl. Для установки не понадобятся никакие специальные инструменты.</p>
    <p class="whfo">Убедитесь пожалуйста, что положение замка зажигания находится в положении "OFF". Подождите примерно 10 минут, чтобы в автомобиле выключились все потребители энергии.</p>
</div>

<div class="columns"><!--column start-->
    <div class="columnLeft"><!--left start-->

        <div class="box">
            <div class="headline">
                <p class="title">1 | Отсоедините педаль газа (при необходимости)</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_1.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-01.jpg" width="445"  alt="racechip" /></a>
        </div>

        <div class="box">
            <div class="headline">
                <p class="title">3 | Соедините кабель с переходным кабелем</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_3.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-03.jpg" width="445"  alt="racechip" /></a>
        </div>

        <div class="box">
            <div class="headline">
                <p class="title">5 | Подключите переходник к заводскому кабелю</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_5.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-05.jpg" width="445"  alt="racechip" /></a>
        </div>

        <div class="box">
            <div class="headline">
                <p class="title">7 | Заведите автомобиль и проверьте работоспособность</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_7.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-07.jpg" width="445"  alt="racechip" /></a>
        </div>

    </div><!--left end-->

    <div class="columnRight"><!--right start-->
        <div class="box">
            <div class="headline">
                <p class="title">2 | Отсоедините оригинальный штекер из разъёма</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_2.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-02.jpg" width="445"  alt="racechip" /></a>
        </div>

        <div class="box">

            <div class="headline">
                <p class="title">4 | Переходной кабель подключите к датчику педали</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_4.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-04.jpg" width="445"  alt="racechip" /></a>
        </div>

        <div class="box">
            <div class="headline">
                <p class="title">6 | Разместите ResponseControl в подходящем месте</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_6.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-06.jpg" width="445"  alt="racechip" /></a>
        </div>

        <div class="box">
            <div class="headline">
                <p class="title">8 | Наслаждайтесь новыми ощущениями от езды!</p>
            </div>
            <a href="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/eba_rcrc_8.jpg" rel="einbau"><img src="/wp-content/themes/RaceChip-Version-2/images/responsecontrol/einbau-08.jpg" width="445"  alt="racechip" /></a>
        </div>

    </div><!--right end-->
</div><!-- column end-->

</div><!-- detail container end -->

<!--fancy boxen html-->
<div class="fancybox-hidden">
    <div id="modul2eco">
        <div class="fancycontent"><p class="fancy-title"><strong>Erstes Modul mit 2 Eco-Stufen zur Verbrauchsreduktion</strong></p>
            <p>Als erstes Modul zur Verbesserung des Ansprechverhaltens verfügt RaceChip ResponseControl über zwei Eco-Stufen, die eigens entwickelt wurden um eine komfortable, spritsparende Fahrweise zu unterstützen. Das Ansprechverhalten wird gegenüber dem Serienverhalten abgeschwächt und somit eine komfortable, verbrauchsärmere Fahrweise ermöglicht.</p>
        </div></div>
</div>


<div class="fancybox-hidden">
    <div id="idealkombi">
        <div class="fancycontent"><p class="fancy-title"><strong>Ideal mit RaceChip Chiptuning kombinierbar</strong></p>
            <p>Für Sie stehen Fahrspaß und Dynamik im Zentrum? Dann haben wir das perfekte Paket für Sie. RaceChip ResponseControl ist die ideale Ergänzung zu unseren Chiptuning Produkten RaceChip, RaceChip Pro2 und RaceChip Ultimate. Die Verbesserung des Ansprechverhaltens Ihres Fahrzeugs durch RaceChip ResponseControl harmoniert perfekt mit der durch unsere Chiptuning Produkte erreichte Mehrleistung. In Kombination erzielen Sie ein Maximum an Fahrspaß.
                Sollten Sie unsere Chiptuning Produkte jedoch zur Verbrauchsreduktion verwenden, so stellen die beiden Eco-Stufen von RaceChip ResponseControl ebenfalls eine optimale Ergänzung dar.
            </p>
        </div></div>
</div>

<div class="fancybox-hidden">
    <div id="motogetr">
        <div class="fancycontent"><p class="fancy-title"><strong>Für alle Motor- und Getriebearten</strong></p>
            <p>RaceChip ResponseControl harmoniert perfekt mit allen Motor- und Getriebearten, egal ob Benzin- oder Dieselmotor oder Automatik- oder Schaltgetriebe.
                RaceChip ResponseControl wird direkt an den Sensor des Gaspedals angeschlossen und greift damit nicht aktiv in die Steuerung von Motor oder Getriebe ein. Durch die Änderung der originalen Kennlinie am Gaspedalsensor wird eine Verkürzung (oder im Eco-Modus, eine Verlängerung) der Reaktionszeit erreicht.</p>
        </div>
    </div>
</div>

<div class="fancybox-hidden">
    <div id="tuevein">
        <div class="fancycontent"><p class="fancy-title"><strong>Keine TÜV-Eintragung erforderlich</strong></p>
            <p>Mit RaceChip ResponseControl steigern Sie die Fahrdynamik Ihres Fahrzeugs spürbar oder ermöglichen ein zusätzliches Spritsparpotenzial, und das alles, ohne direkt die Leistungsdaten Ihres Fahrzeugs zu verändern oder bauliche Veränderungen vornehmen zu müssen (RaceChip ResponseControl kann in nur wenigen Schritten einfach direkt am Gaspedalsensor installiert werden). Dadurch ist RaceChip ResponseControl komplett eintragungsfrei und kann direkt nach dem Einbau verwendet werden.</p>
        </div></div>
</div>

<div class="fancybox-hidden">
    <div id="doit">
        <div class="fancycontent"><p class="fancy-title"><strong>Einfacher Do-it-Yourself Einbau</strong></p>
            <p>RaceChip ResponseControl kann innerhalb von wenigen Minuten durch Sie selbst eingebaut werden. Die komplette Installation funktioniert nach dem einfachen Plug &#038; Play Prinzip, das auch unseren anderen Produkten zu Grunde liegt. Für den Einbau finden Sie eine bebilderte Einbauanleitung im Lieferumfang und natürlich steht Ihnen für weitere Fragen unser umfassender Kundenservice zur Verfügung. Nähere Informationen zum Einbau finden Sie weiter unten auf dieser Seite. </p>
        </div></div>
</div>

<div class="fancybox-hidden">
    <div id="framevideo">
        <iframe width="853" height="480" src="//www.youtube.com/embed/wM2vU-Ff90U?rel=0" frameborder="0" allowfullscreen></iframe>
    </div></div>
</div>
