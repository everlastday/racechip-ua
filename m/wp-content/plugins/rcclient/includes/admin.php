<?php

  add_action('admin_menu', 'mt_add_pages');

// action function for above hook
  function mt_add_pages() {
    // Add a new submenu under Settings:
    //add_options_page(__('Test Settings','menu-test'), __('Test Settings','menu-test'), 'manage_options', 'testsettings', 'mt_settings_page');

    // Add a new submenu under Tools:
    //add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    //add_menu_page(__('Test Toplevel','menu-test'), __('Заказы','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

    //add_menu_page(__('Test Toplevel','menu-test'), __('Заказы','menu-test'), 'manage_options', 'mt-top-level-handle', 'rcc_client_show_orders' );

    // Add a submenu to the custom top-level menu:
    //add_submenu_page('mt-top-level-handle', __('Test Sublevel','menu-test'), __('Test Sublevel','menu-test'), 'manage_options', 'sub-page', 'mt_sublevel_page');

    // Add a second submenu to the custom top-level menu:
    //add_submenu_page('mt-top-level-handle', __('Test Sublevel 2','menu-test'), __('Test Sublevel 2','menu-test'), 'manage_options', 'sub-page2', 'mt_sublevel_page2');
  }

  function rcc_client_show_orders() {
    ?>

    <div class="wrap">
      <div id="icon-users" class="icon32"></div>
      <h2>My List Table Test</h2>
    </div>

  <?php
    if( ! class_exists( 'WP_List_Table' ) ) {
      require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
    }

    class My_List_Table extends WP_List_Table {
    }
    $myListTable = new My_List_Table();

    var $example_data = array(
      array('ID' => 1,'booktitle' => 'Quarter Share', 'author' => 'Nathan Lowell',
            'isbn' => '978-0982514542'),
      array('ID' => 2, 'booktitle' => '7th Son: Descent','author' => 'J. C. Hutchins',
            'isbn' => '0312384378'),
      array('ID' => 3, 'booktitle' => 'Shadowmagic', 'author' => 'John Lenahan',
            'isbn' => '978-1905548927'),
      array('ID' => 4, 'booktitle' => 'The Crown Conspiracy', 'author' => 'Michael J. Sullivan',
            'isbn' => '978-0979621130'),
      array('ID' => 5, 'booktitle'     => 'Max Quick: The Pocket and the Pendant', 'author'    => 'Mark Jeffrey',
            'isbn' => '978-0061988929'),
      array('ID' => 6, 'booktitle' => 'Jack Wakes Up: A Novel', 'author' => 'Seth Harwood',
            'isbn' => '978-0307454355')
    );


  }



  function mt_toplevel_page() {
    ?>
    <div class="wrap nosubsub">

      <form id="posts-filter" action="" method="get">



        <input type="hidden" id="_wpnonce" name="_wpnonce" value="a77795a0be" /><input type="hidden" name="_wp_http_referer" value="/wp-admin/link-manager.php" />


        <div class="tablenav top">

          <div class="alignleft actions">
            <select name='action'>
              <option value='-1' selected='selected'>Действия</option>
              <option value='delete'>Удалить</option>
            </select>
            <input type="submit" name="" id="doaction" class="button action" value="Применить"  />
          </div>
          <br class="clear" />
        </div>
        <table class="wp-list-table widefat fixed bookmarks" cellspacing="0">
          <thead>
          <tr>
            <th scope='col' id='cb' class='manage-column column-cb check-column'  style=""><label class="screen-reader-text" for="cb-select-all-1">Выделить все</label><input id="cb-select-all-1" type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=name&#038;order=asc"><span>Название</span><span class="sorting-indicator"></span></a></th><th scope='col' id='url' class='manage-column column-url sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=url&#038;order=asc"><span>URL</span><span class="sorting-indicator"></span></a></th><th scope='col' id='categories' class='manage-column column-categories'  style="">Рубрики</th><th scope='col' id='rel' class='manage-column column-rel'  style="">Отношение</th><th scope='col' id='visible' class='manage-column column-visible sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=visible&#038;order=asc"><span>Видна</span><span class="sorting-indicator"></span></a></th><th scope='col' id='rating' class='manage-column column-rating sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=rating&#038;order=asc"><span>Рейтинг</span><span class="sorting-indicator"></span></a></th>	</tr>
          </thead>

          <tfoot>
          <tr>
            <th scope='col'  class='manage-column column-cb check-column'  style=""><label class="screen-reader-text" for="cb-select-all-2">Выделить все</label><input id="cb-select-all-2" type="checkbox" /></th><th scope='col'  class='manage-column column-name sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=name&#038;order=asc"><span>Название</span><span class="sorting-indicator"></span></a></th><th scope='col'  class='manage-column column-url sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=url&#038;order=asc"><span>URL</span><span class="sorting-indicator"></span></a></th><th scope='col'  class='manage-column column-categories'  style="">Рубрики</th><th scope='col'  class='manage-column column-rel'  style="">Отношение</th><th scope='col'  class='manage-column column-visible sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=visible&#038;order=asc"><span>Видна</span><span class="sorting-indicator"></span></a></th><th scope='col'  class='manage-column column-rating sortable desc'  style=""><a href="http://racechip.com.ua/wp-admin/link-manager.php?orderby=rating&#038;order=asc"><span>Рейтинг</span><span class="sorting-indicator"></span></a></th>	</tr>
          </tfoot>

          <tbody id="the-list">
          <tr id="link-2" valign="middle"  class="alternate">
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-2">Выбрать Блог WordPress</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-2" value="2" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=2' title='Редактировать &laquo;Блог WordPress&raquo;'>Блог WordPress</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=2">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=2&amp;_wpnonce=4b55270ed9' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Блог WordPress»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://wordpress.org/news/' title='Перейти на Блог WordPress'>wordpress.org/news</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          <tr id="link-1" valign="middle" >
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-1">Выбрать Документация</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-1" value="1" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=1' title='Редактировать &laquo;Документация&raquo;'>Документация</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=1">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=1&amp;_wpnonce=463c33def0' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Документация»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://codex.wordpress.org/Заглавная_страница' title='Перейти на Документация'>codex.wordpress.org/Заглав...</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          <tr id="link-6" valign="middle"  class="alternate">
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-6">Выбрать Обратная связь</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-6" value="6" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=6' title='Редактировать &laquo;Обратная связь&raquo;'>Обратная связь</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=6">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=6&amp;_wpnonce=5e133a300c' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Обратная связь»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://ru.forums.wordpress.org/forum/20' title='Перейти на Обратная связь'>ru.forums.wordpress.org/forum/20</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          <tr id="link-4" valign="middle" >
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-4">Выбрать Плагины</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-4" value="4" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=4' title='Редактировать &laquo;Плагины&raquo;'>Плагины</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=4">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=4&amp;_wpnonce=d34c5dddc8' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Плагины»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://wordpress.org/extend/plugins/' title='Перейти на Плагины'>wordpress.org/extend/plugins</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          <tr id="link-7" valign="middle"  class="alternate">
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-7">Выбрать Планета WordPress</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-7" value="7" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=7' title='Редактировать &laquo;Планета WordPress&raquo;'>Планета WordPress</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=7">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=7&amp;_wpnonce=35a9c44b84' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Планета WordPress»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://planet.wordpress.org/' title='Перейти на Планета WordPress'>planet.wordpress.org</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          <tr id="link-5" valign="middle" >
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-5">Выбрать Темы</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-5" value="5" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=5' title='Редактировать &laquo;Темы&raquo;'>Темы</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=5">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=5&amp;_wpnonce=37935812ab' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Темы»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://wordpress.org/extend/themes/' title='Перейти на Темы'>wordpress.org/extend/themes</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          <tr id="link-3" valign="middle"  class="alternate">
            <th scope="row" class="check-column">
              <label class="screen-reader-text" for="cb-select-3">Выбрать Форумы поддержки</label>
              <input type="checkbox" name="linkcheck[]" id="cb-select-3" value="3" />
            </th>
            <td class='column-name'><strong><a class='row-title' href='http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=3' title='Редактировать &laquo;Форумы поддержки&raquo;'>Форумы поддержки</a></strong><br /><div class="row-actions"><span class='edit'><a href="http://racechip.com.ua/wp-admin/link.php?action=edit&amp;link_id=3">Изменить</a> | </span><span class='delete'><a class='submitdelete' href='link.php?action=delete&amp;link_id=3&amp;_wpnonce=22a077f6b4' onclick="if ( confirm( 'Вы собираетесь удалить ссылку «Форумы поддержки»\n  «Отмена» — оставить, «OK» — удалить.' ) ) { return true;}return false;">Удалить</a></span></div></td><td class='column-url'><a href='http://ru.forums.wordpress.org/' title='Перейти на Форумы поддержки'>ru.forums.wordpress.org</a></td><td class='column-categories'><a href='link-manager.php?cat_id=2'>Ссылки</a></td><td class='column-rel'><br /></td><td class='column-visible'>Да</td><td class='column-rating'>0</td>		</tr>
          </tbody>
        </table>
        <div class="tablenav bottom">

          <div class="alignleft actions">
            <select name='action2'>
              <option value='-1' selected='selected'>Действия</option>
              <option value='delete'>Удалить</option>
            </select>
            <input type="submit" name="" id="doaction2" class="button action" value="Применить"  />
          </div>

          <br class="clear" />
        </div>

        <div id="ajax-response"></div>
      </form>

    </div>


  <?




  }