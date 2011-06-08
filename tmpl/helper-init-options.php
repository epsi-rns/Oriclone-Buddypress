<?php
	function fix_ori_fullpath(&$asset) 	
	{	
		$path = get_bloginfo('url');
		if (strpos($asset, 'http://') === false)
			$asset = $path.'/'.$asset;
	}	

	
	function get_ori_asset_fullpath($path, $asset) 	
	{
		if (strpos($asset, 'http://') === false)
			$asset = $path.$asset;
		return	$asset;
	}	
	
	function oc_init_options()
	{
		global $oc_options, $oc_template;
	
		$theme = new OricloneTheme;
		$oc_options = $theme->get_options_data();
	
		fix_ori_fullpath($oc_options['logo-image']);
	
		if (empty($oc_options['favicon']))
			$oc_options['favicon'] = 'favicon.ico';
		fix_ori_fullpath($oc_options['favicon']);
	
		global $oc_template;
		if (is_front_page() && isset($oc_template)) 	
			$oc_options['layout_position'] = 'c';
	}
