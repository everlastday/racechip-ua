<?php
/*
Plugin Name: WP Awesome FAQ
Plugin URI: http://www.codexcoder.com
Description:Accordion based awesome WordPress FAQ. 
Version: 1.4.0
Author: Liton Arefin
Author URI: http://www.codexcoder.com
License: GPL2
http://www.gnu.org/licenses/gpl-2.0.html
*/

//Custom FAQ Post Type 
function h2cweb_faq() {
    $labels = array(
        'name'               => _x( 'Вопрос/Ответ', 'post type general name' ),
        'singular_name'      => _x( 'Вопрос/Ответ', 'post type singular name' ),
        'add_new'            => _x( 'Добавить новий', 'book' ),
        'add_new_item'       => __( 'Добавить новый' ),
        'edit_item'          => __( 'Редактировать' ),
        'new_item'           => __( 'Новий значение' ),
        'all_items'          => __( 'Все' ),
        'view_item'          => __( 'Просмотреть ' ),
        'search_items'       => __( 'Поиск' ),
        'not_found'          => __( 'No FAQ Items found' ),
        'not_found_in_trash' => __( 'No FAQ Items found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Вопрос/Ответ'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Модуль Вопрос/Ответ',
        'public'        => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'query_var'     => true,
        'rewrite'       => true,
        'capability_type'=> 'post',
        'has_archive'   => true,
        'hierarchical'  => false,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor'),
        'menu_icon' => get_admin_url(). '/images/press-this.png',  // Icon Path
    );

    register_post_type( 'faq', $args ); 

        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => _x( 'Категории', 'taxonomy general name' ),
            'singular_name'     => _x( 'Категория', 'taxonomy singular name' ),
            'search_items'      =>  __( 'Поиск в категориях' ),
            'all_items'         => __( 'Все категории' ),
            'parent_item'       => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item'         => __( 'Редактировать категорию' ),
            'update_item'       => __( 'Обновить категорию' ),
            'add_new_item'      => __( 'Добавить категорию' ),
            'new_item_name'     => __( 'Новое имя категоии' ),
            'menu_name'         => __( 'Категории' ),
        );
    
        register_taxonomy('faq_cat',array('faq'), array(
            'hierarchical' => true,
            'labels'       => $labels,
            'show_ui'      => true,
            'query_var'    => true,
            'rewrite'      => array( 'slug' => 'faq_cat' ),
        ));
}

add_action( 'init', 'h2cweb_faq' );

function h2cweb_scripts(){
     if(!is_admin()){
        wp_register_style('h2cweb-jquery-ui-style',plugins_url('/jquery-ui.css', __FILE__ ));
        wp_enqueue_style('h2cweb-jquery-ui-style');
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_register_script('h2cweb-custom-js', plugins_url('/accordion.js', __FILE__ ), array('jquery-ui-accordion'),true);
        wp_enqueue_script('h2cweb-custom-js');
    }   
}
add_action( 'init', 'h2cweb_scripts' );


function h2cweb_accordion_shortcode() { 
// Registering the scripts and style


// Getting FAQs from WordPress Awesome FAQ plugin's Custom Post Type questions
$args = array( 'posts_per_page' => -1,  'post_type' => 'faq', 'order'=>"DESC");
$query = new WP_Query( $args );

global $faq;

?>
<h1>Вопрос/Ответ</h1>

<div id="accordion">
    <?php if( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
        $terms = wp_get_post_terms(get_the_ID(), 'faq_cat' );
        $t = array();
        foreach($terms as $term) $t[] = $term->name;
        echo implode(' ', $t); $t = array();
    ?>

        <h3><a href=""><?php echo get_the_title();?></a></h3><div><?php echo get_the_content();?></div>    

    <?php } //end while
} //endif ?>
</div>
<?php
    //Reset the query
wp_reset_query();
wp_reset_postdata();

}
add_shortcode('faq', 'h2cweb_accordion_shortcode');