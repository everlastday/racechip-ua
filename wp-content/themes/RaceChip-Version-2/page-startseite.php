<?php
/**
 * Template Name: startseite
 *
 */
get_header(); ?>

<?php $comments = get_comments('post_id=1575'); ?>

    <div class="reviews-menu">
        <p class="rs-review-block-title">Отзывы</p>
        <ul class="rs-reviews">
            <? foreach ($comments as $comment) : ?>
                <li class="rs-review">
                    <div class="rs-review-author">
                        <span><?=$comment->comment_author?> </span><?=mysql2date('d.m.Y в H:i',
                            $comment->comment_date)?>
                    </div>

                    <div class="rs-review-text">
                        <?=cut_string($comment->comment_content, 200) . '...'?>
                        <br><a href="<?=site_url('reviews/#comment-' . $comment->comment_ID)?>">Подробнее</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="select-main-box cf" style="display: none;">
        <h2>УЗНАЙТЕ НА СКОЛЬКО УВЕЛИЧИТСЯ МОЩНОСТЬ ВАШЕГО АВТО</h2>

        <form id="rc-choice-form">
            <select id="mark" name="mark">
                <option class="marks first" value="0">Bыберите марку...</option>
                <?php get_vehicles_input() ?>
            </select>
            <select id="model" name="model" disabled>
                <option class="marks first" value="0">Выберите модель...
            </select>
            <select id="modification" name="modification" disabled>
                <option class="marks first" value="0">Выберите модификацию...
            </select>
            <input type="submit" class="butt" value="Узнать">
        </form>
    </div>

    <div id="slider" style="display: none;">
        <div class="slider-inhalt"><?php if ( ! function_exists('dynamic_sidebar') || ! dynamic_sidebar('slider-home')) : ?><?php endif; ?></div>
    </div>

    <div id="produkt-bilder-home" style="display: none;">
        <ul>
            <li>
                <a href="/racechip-ultimate"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip® Ultimate &lt;/strong&gt; Самый производительный! Процессор 48 MHz, армированный стекловолокном композитный корпус, автомобильный разъём FCI и до 31% больше мощности." alt="RaceChip® Ultimate" src="/wp-content/uploads/2014/06/index_product_ultimate.jpg" width="240" height="155" /></a>
            </li>
            <li>
                <a href="/racechip-pro2"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip® Pro2 &lt;/strong&gt; Лидер продаж! Процессор 24 MHz, армированный стекловолокном композитный корпус, автомобильный разъём FCI, регулировка увеличения мощности до +30%" alt="RaceChip® Pro2" src="/wp-content/uploads/2014/06/index_product_pro2.jpg" width="240" height="155" /></a>
            </li>
            <li>
                <a href="/racechip"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip® &lt;/strong&gt; Проверенный временем! Процессор  8 MHz, алюминиевый корпус, разъём Sub-D, регулировка увеличения мощности до +20%" alt="RaceChip®" src="/wp-content/uploads/2014/06/index_product_racechip.jpg" width="239" height="155" /></a>
            </li>
            <li>
                <a href="/responsecontrol"><img class="tooltip_c" title=" &lt;strong&gt;RaceChip Response Control &lt;/strong&gt;  – ускорение отклика педали газа для Вашего авто" alt="Response Control" src="/wp-content/uploads/2014/06/index_product_rc.jpg" width="231" height="155" /></a>
            </li>

        </ul>
    </div>
    <div class="trenner2"></div>
    <?php
      $price = get_price_ua();
    ?>
    <div style="background-color:#16181d; display: block; clear: both; margin: -12px 5px">
        <table style="margin-bottom: 5px;" class="main-page-images-table">
            <tbody>
            <tr>
                <td width="240px">
                    <a href="/racechip-ultimate">RaceChip® Ultimate</a><br>
                    <span style="font-size: 10px;">от <?=$price[ 'ultimate' ] . ' ' . $price[ 'currency' ]  ?></span></td>
                <td width="280px"><a href="/racechip-pro2">RaceChip® Pro2</a><br>
                    <span style="font-size: 10px;">от <?=$price[ 'pro2' ] . ' ' . $price[ 'currency' ] ?></span></td>
                <td width="200px"><a href="/racechip">RaceChip®</a><br>
                    <span style="font-size: 10px;">от <?=$price[ 'one' ] . ' ' . $price[ 'currency' ] ?></span></td>
                <td width="241px">Новинка: <a href="/responsecontrol">Response Control</a><br>
                    <span style="font-size: 10px;">от <?=$price[ 'pedal_tuning' ] . ' ' . $price[ 'currency' ] ?></span></td>
            </tr>
            </tbody>
        </table>
        <p style="text-align: center; padding:5px 0 12px;">Оплата в гривнах по курсу НБУ на день оплаты</p>
    </div>

    <div id="container" class="startseite">
        <div id="content" role="main">
            <?php get_template_part('loop', 'page'); ?>
        </div>
        <!-- #content -->
        <?php get_sidebar(); ?>
    </div><!-- #container -->
<?php get_footer(); ?>