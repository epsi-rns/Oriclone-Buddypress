<?php	
	include('tmpl/helper-init-options.php');
	global $oc_options;
	oc_init_options();	

	$doctype = 'XHTML 1.0 Transitional';
	include('tmpl/helper-doctype.php');
	
	include('tmpl/helper-theme.php');
	include('tmpl/hooks.php');
	include_once('tmpl/helper-blog.php');
	
	if ( file_exists( WP_PLUGIN_DIR . '/oc-custom.php' ) )
		require( WP_PLUGIN_DIR . '/oc-custom.php' );	
?>	

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php ob_start(); ?>	

<body <?php body_class() ?>>
	
<div id="wrapper">
	<a name="top" id="top"></a>
<?php	include('tmpl/top.php'); ?>	

	<div id="container-console"></div>
<?php/* --- begin of main layout --- */ ?>

<?php	include('tmpl/main-top.php'); ?>	
