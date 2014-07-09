<?php
/**
 * Template Name: One column, no sidebar, no topnav
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="headline-wrapper">
<div class="container_24">
<div id="header">
<div id="raceChip-Header">
<div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/racechip-logo-top.png"/></a></div>
<div class="header-mid">
<ul>
<li>Mehr Leistung & weniger Verbrauch</li>
<li>18 Jahre Erfahrung</li>
<li>Kostenloser 24h-Versand in Europa</li>
</ul></div>
<div class="header-right">
<img src="<?php echo get_template_directory_uri(); ?>/images/racechip-header-tuev.png"/>
<img src="<?php echo get_template_directory_uri(); ?>/images/racechip-header-safeshopping.png"/>
<a href="https://www.trustedshops.de/bewertung/info_X1CFDC3E5246F688855B6B5E710EAE164.html"><img src="<?php echo get_template_directory_uri(); ?>/images/racechip-header-trusted.png"/></a>
</div>
</div>
</div>
</div>
</div>
<div id="racechip-nav-background-wrapper">

<?php
    global $wp_query;
    
    $checkout = 'start';

    if(isset($wp_query->query_vars['checkout'])) {
        
        $get_params = $wp_query->query_vars['checkout'];
        
        if (strpos($get_params, 'confirm') !== false) {
            $checkout = 'confirm';
        }

        
        if (strpos($get_params, 'success') !== false) {
            $checkout = 'success';
        }
        
    }

    if ($checkout == 'start'){
echo "<ul id='topnav-02'>
<li><a href='/warenkorb'>Warenkorb</a></li>
<li><a href='/kasse'>Adresse und Zahlungsart</a></li>
<li>Bestellung prüfen</li>
<li>Bestellung abgeschlossen</li>
</ul>";
    }

    if ($checkout == 'confirm'){
echo "<ul id='topnav-02-confirm'>
<li><a href='/warenkorb'>Warenkorb</a></li>
<li><a href='/kasse'>Adresse und Zahlungsart</a></li>
<li>Bestellung prüfen</li>
<li>Bestellung abgeschlossen</li>
</ul>";
    }

    if ($checkout == 'success'){
echo "<ul id='topnav-02-success'>
<li><a href='/warenkorb'>Warenkorb</a></li>
<li><a href='/kasse'>Adresse und Zahlungsart</a></li>
<li><a href='/confirm'>Bestellung prüfen</a></li>
<li>Bestellung abgeschlossen</li>
</ul>";
    }
?>

</div>
<div id="wrapper" class="container_24">
<div id="wrapper" class="grid_24">
<div id="mainTop"></div>
		<div id="container" class="one-column-no-topnav">

			<div id="content" role="main">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'page' );
			?>

<?php
    global $wp_query;
    
    if(isset($wp_query->query_vars['checkout'])) {
        
        $get_params = $wp_query->query_vars['checkout'];
        
        if (strpos($get_params, 'confirm') !== false) {
            echo "<div class='racechip-checkout-bottom' >

<ul class='checkout-bottom-left'>
<li><p>Kostenloser Versand in Europa</p></li>
<li><p>Schnelle 24-Stunden Lieferung</p></li>
</ul>
<ul class='checkout-bottom-right'>
<li><p>Sichere Datenübertragung</p></li>
<li><p>Einfacher Selbsteinbau</p></li>
</ul>
  </div>";
        }
     }
?>

</div><!-- #content -->
</div><!-- #container -->

<div id="mainBottom"></div>
</div>

<?php get_footer(); ?>
