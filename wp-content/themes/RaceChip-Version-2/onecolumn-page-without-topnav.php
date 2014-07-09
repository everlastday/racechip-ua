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
<title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="headline-wrapper">
<div class="container_24">
<div id="header">
<div id="raceChip-Header">
<div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-logo-top.png" alt="RaceChip Logo" /></a></div>
<div class="header-mid">
<ul>
<?php echo $headtxt; ?>
</ul>
</div>
<div class="header-right">
<div class="header-right-title"><p>Sicher einkaufen beim testsieger</p></div>
<ul class="right-images">
<li class="first"><a href="http://www.racechip.de/racechip-ist-testsieger-im-chiptuningvergleichstest/"><img class="tooltip_c" title="RaceChip ist Testsieger des Chiptuning-Vergleichstest von Eurotuner. Für weitere Details klicken Sie bitte einfach auf das Testsieger Icon." src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/testsieger_eurotuner.png" alt="Testsieger eurotuner" /></a></li>
<li><img src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-header-tuev.png" alt="RaceChip Tüv" /></li>
<li><img class="tooltip_c" title="Sichere Datenübertragung über SSL. Ihre Daten werden über eine verschlüsselte Verbindung übertragen und nicht an Dritte weitergegeben" src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-header-safeshopping.png" alt="RaceChip sicheres Einkaufen"/></li>
<li class="last"><a href="https://www.trustedshops.de/bewertung/info_X1CFDC3E5246F688855B6B5E710EAE164.html"><img class="tooltip_c" title="Wir sind Mitglied bei Trusted Shops. Dieses unabhängige Tool für Kundenbewertungen bietet Ihnen die Möglichkeit, uns nach Ihrem Kauf zu bewerten. Unseren Bewertungsschnitt können Sie nach einem Klick auf das Symbol einsehen." src="<?php echo TEMPLATE_DIRECTORY_URI; ?>/images/racechip-header-trusted.png" alt="Trusted Shop" /></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div id="racechip-nav-background-wrapper"><div class='topnav-02-inner'>
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
        
        if (strpos($get_params, 'payment_success') !== false) {
            $checkout = 'payment_end';
        }
        
        if (strpos($get_params, 'payment_cancel') !== false) {
            $checkout = 'payment_end';
        }
        
    }

    if(function_exists('rcbsc_get_permalink')){
	    
	    if ($checkout == 'start'){
echo "
<ul id='topnav-02'>
<li><a href='" . rcbsc_get_permalink('shoppingcart') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcbsc' ) . "</a></li>
<li><a href='" . rcbsc_get_permalink('checkout') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcbsc' ) . "</a></li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcbsc' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcbsc' ) . "</li>
</ul>";
	    }
	
	    if ($checkout == 'confirm'){
echo "<ul id='topnav-02-confirm'>
<li><a href='" . rcbsc_get_permalink('shoppingcart') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcbsc' ) . "</a></li>
<li><a href='" . rcbsc_get_permalink('checkout') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcbsc' ) . "</a></li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcbsc' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcbsc' ) . "</li>
</ul>";
	    }
	
	    if ($checkout == 'success'){
echo "<ul id='topnav-02-success'>
<li><a href='" . rcbsc_get_permalink('shoppingcart') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcbsc' ) . "</a></li>
<li><a href='" . rcbsc_get_permalink('checkout') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcbsc' ) . "</a></li>
<li><a href='" . rcbsc_get_permalink('checkout') . "confirm/'>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcbsc' ) . "</a></li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcbsc' ) . "</li>
</ul>";
	    }
	
	    if ($checkout == 'payment_end'){
echo "<ul id='topnav-02-success'>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcbsc' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcbsc' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcbsc' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcbsc' ) . "</li>
</ul>";
	    }
	}
	elseif(function_exists('rcclient_get_permalink')){
		 
		if ($checkout == 'start'){
			echo "<ul id='topnav-02'>
<li><a href='" . rcclient_get_permalink('shoppingcart') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcclient' ) . "</a></li>
<li><a href='" . rcclient_get_permalink('checkout') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcclient' ) . "</a></li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcclient' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcclient' ) . "</li>
</ul>";
		}
	
		if ($checkout == 'confirm'){
			echo "<ul id='topnav-02-confirm'>
<li><a href='" . rcclient_get_permalink('shoppingcart') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcclient' ) . "</a></li>
<li><a href='" . rcclient_get_permalink('checkout') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcclient' ) . "</a></li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcclient' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcclient' ) . "</li>
</ul>";
		}
	
		if ($checkout == 'success'){
			echo "<ul id='topnav-02-success'>
<li><a href='" . rcclient_get_permalink('shoppingcart') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcclient' ) . "</a></li>
<li><a href='" . rcclient_get_permalink('checkout') . "'>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcclient' ) . "</a></li>
<li><a href='" . rcclient_get_permalink('checkout') . "confirm/'>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcclient' ) . "</a></li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcclient' ) . "</li>
</ul>";
		}
	
		if ($checkout == 'payment_end'){
			echo "<ul id='topnav-02-success'>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Shoppingcart' , 'rcclient' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Address & Payment Option' , 'rcclient' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Check order' , 'rcclient' ) . "</li>
<li>" . /* translators: Theme - Checkout Step Navi */ __( 'Order completed' , 'rcclient' ) . "</li>
</ul>";
		}
	}
?>
</div>
</div>
<div id="wrapper" class="container_24">
<div id="wrapper" class="grid_24">
<div id="container" class="one-column-no-topnav">
<div id="content" role="main"><?php	 get_template_part( 'loop', 'page' );?>

<?php
/*
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
*/
?>
</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>