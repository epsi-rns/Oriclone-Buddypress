<?php 
	//--- Initialize properties
	//--- Begin of html head
?>
	
<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bp_page_title() ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php 
	include('htmlhead-css.php'); 
	include('htmlhead-feed.php'); 
	do_action( 'bp_head' );	
	wp_head(); 
	oc_style();
	oc_script();
	//--- End of html head
?>
		
</head>	
