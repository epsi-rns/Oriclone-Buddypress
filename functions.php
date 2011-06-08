<?php 
/** initial design and code by: Epsi Nurwijayadi **/

include('tmpl-admin/admin-widgets.php');
//include_once('libraries/helper-options.php');

if (!class_exists('GenericOptions'))
	include('tmpl-admin/admin-class.php');

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

if ( ! isset( $content_width ) )
	$content_width = 780;

/*--  Fix parent's functions.php --*/
/*---------------------------------*/

function remove_header_support() {
	remove_action( 'init', 'bp_dtheme_add_custom_header_support' );
}
add_action( 'init', 'remove_header_support', 9 );

/*-- The Oriclone Theme Extensions --*/
/*-----------------------------------*/

define('THEME_EXTS', 'extensions/');

// Layout
//include(THEME_EXTS . 'mod_simplecontact/mod_simplecontact.php');
include(THEME_EXTS . 'widget_buddypages/widget_buddypages.php');
include(THEME_EXTS . 'shortcode-message.php');

add_action('admin_menu', 'oc_add_theme_page');
add_action('wp_ajax_get_oc_theme', 'oc_theme_page_ajax' );	

function oc_add_theme_page() 
{
	add_theme_page(
		__('Custom Parameters', 'oc'), __('Custom Parameters', 'oc'), 
		'edit_themes', basename(__FILE__), 
		'oc_theme_page');
}

function oc_theme_page() 
{
	$theme = new OricloneTheme;
	$theme->display();	
}

function oc_theme_page_ajax() 
{  
	check_ajax_referer( 'oc_admin' );	
	
	$theme = new OricloneTheme;
	$theme->display_ajax();
	
	die();		
}


/*-- The Oriclone Theme Class --*/
/*------------------------------*/

class OricloneTheme extends GenericOptions
{	
	function __construct() {
		$this->parent_key = 'oriclone';
		$this->hidden_field_name = 'oc_submit_hidden';
	}
	
	/*-- View/ Template --*/
	function display()
	{
		$nonce = wp_create_nonce( 'oc_admin' );
		include('tmpl-admin/admin-form.php');		
	}
		
	function display_ajax()
	{
		$current_tab = $_POST[ 'oc_tab' ] ? $_POST[ 'oc_tab' ] : 'oc_tab_1';
		
		$isRebuild = $_POST[ $this->hidden_field_name ] == 'CSS';
		if ($isRebuild)
		{
			include('tmpl-admin/build_css.php');
			$saved_options = get_option( $this->parent_key );
			$css = new Build_CSS(dirname(__FILE__), $saved_options);
			$css->build();
		}
		
		$this->init_options_form_value(); 
		$this->update_options_data(); 

		$isPost	= $this->isPost;
		$options =& $this->options_form;
		$hidden_field_name = $this->hidden_field_name;
		
		include('tmpl-admin/admin-form-ajax.php');				
	}	

	/*-- Model --*/
	
	protected function init_options_form_value()
	{
		include('tmpl-admin/admin-form-data.php');
		$this->options_form = oc_form_value();
	}	
	
	public function on_oc_before_update_options()
	{
		// fix raw html in textarea	
		$keys = array(
			'cpdesc', 'contact-address', 'guest-message',
			'home-find-member', 'home-find-group', 'home-find-blog',
			'home-read-news'
		);
       	foreach ($keys as $key)
       		$this->options_data[$key] = 
				stripslashes($this->options_data[$key]);
	}

}
