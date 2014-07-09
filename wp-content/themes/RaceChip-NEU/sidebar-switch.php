<?php
/**
 * Template Name: sidebar switch
 *
 */


get_header(); ?>


<div id="wrapper" class="grid_24">
<div id="mainTop"></div>

<div id="container" class="<?php
    if(function_exists ( 'rcclient_is_detail' ) && rcclient_is_detail()){
echo "one-column";
   }           
    else {
echo "sidebar-switch";
    }
?>">

	<div id="content" role="main">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'page' );
			?>

<?php
    if(!function_exists ( 'rcclient_is_detail' ) && rcclient_is_detail()){
   }            
    else {
get_sidebar();
    }
?>
			</div><!-- #content -->

		</div><!-- #container -->

<div id="mainBottom"></div>
</div>

<?php get_footer(); ?>