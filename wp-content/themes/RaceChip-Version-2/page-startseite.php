<?php
/**
 * Template Name: startseite
 *
 */
get_header(); ?>
<div id="slider">
<div class="slider-inhalt"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('slider-home') ) : ?><?php endif;?></div>
</div>

    <div id="produkt-bilder-home">
        <ul>
            <li><a href="/racechip-ultimate"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip® Ultimate &lt;/strong&gt; Самый производительный! Процессор 48 MHz, армированный стекловолокном композитный корпус, автомобильный разъём FCI и до 31% больше мощности." alt="RaceChip® Ultimate" src="/wp-content/uploads/2014/06/index_product_ultimate.jpg" width="240" height="155" /></a></li>
            <li><a href="/racechip-pro2"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip® Pro2 &lt;/strong&gt; Лидер продаж! Процессор 24 MHz, армированный стекловолокном композитный корпус, автомобильный разъём FCI, регулировка увеличения мощности до +30%" alt="RaceChip® Pro2" src="/wp-content/uploads/2014/06/index_product_pro2.jpg" width="240" height="155" /></a></li>
            <li><a href="/racechip"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip® &lt;/strong&gt; Проверенный временем! Процессор  8 MHz, алюминиевый корпус, разъём Sub-D, регулировка увеличения мощности до +20%" alt="RaceChip®" src="/wp-content/uploads/2014/06/index_product_racechip.jpg" width="239" height="155" /></a></li>
            <li><a href="/responsecontrol"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip Response Control &lt;/strong&gt;  – ускорение отклика педали газа для Вашего авто" alt="Response Control" src="/wp-content/uploads/2014/06/index_product_rc.jpg" width="231" height="155" /></a></li>


        </ul>
    </div>
 <div class="trenner2"></div>
<div style="background-color:#16181d; display: block; clear: both; margin: -12px 5px">
        <table style="margin-bottom: 5px;" class="main-page-images-table">
            <tbody>
            <tr>
                <td width="240px">
                    <a href="/racechip-ultimate">RaceChip® Ultimate</a><br>
                    <span style="font-size: 10px;">от 459 EUR</span></td>
                <td width="280px"><a href="/racechip-pro2">RaceChip® Pro2</a><br>
                    <span style="font-size: 10px;">от 275 EUR</span></td>
                <td width="200px"><a href="/racechip">RaceChip®</a><br>
                    <span style="font-size: 10px;">от 175 EUR</span></td>
                <td width="241px">Новинка: <a href="/responsecontrol">Response Control</a><br>
                    <span style="font-size: 10px;">от 199 EUR</span></td>
            </tr>
            </tbody>
        </table>
        <p style="text-align: center; padding:5px 0 12px;">Оплата в гривнах по курсу НБУ на день оплаты</p>
</div>



<div id="container" class="startseite">
<div id="content" role="main">
<?php get_template_part( 'loop', 'page' ); ?>
</div><!-- #content -->
<?php get_sidebar(); ?>
</div><!-- #container -->
<?php get_footer(); ?>