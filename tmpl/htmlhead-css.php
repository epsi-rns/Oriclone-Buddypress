<?php
	$theme	= get_bloginfo( 'stylesheet_directory' );
	$css	= $theme.'/css';
	$cssdev	= $theme.'/css-dev';
?>

<?php	if (!empty($oc_options['cssload'])): ?>	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $theme; ?>/_inc/css/adminbar.css" type="text/css" media="screen" />
<?php	else:?>
	<link rel="stylesheet" href="<?php echo $theme; ?>/import.css" type="text/css" media="screen" />
<?php	endif;?>
	<link rel="stylesheet" href="<?php echo $css; ?>/print.css" type="text/css" media="print" />
<?php

	$style = array();
	$styles[] = $cssdev.'/scheme/'	.$oc_options['text_scheme'].'.css';
	$styles[] = $cssdev.'/strip/'	.$oc_options['strip'].'.css';
	$styles[] = $cssdev.'/hover/'	.$oc_options['strip_hover'].'.css';

	foreach ($styles as $style)
	{ ?>
	<link rel="stylesheet" href="<?php echo $style; ?>" type="text/css" media="screen" />
<?php }		

	

