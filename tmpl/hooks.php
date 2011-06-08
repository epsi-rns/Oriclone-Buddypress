<?php
// add_action('wp_print_styles', 'oc_style');
// add_action('wp_print_scripts', 'oc_script');
add_action('wp_print_scripts', 'oc_effects');
add_action('bp_head', 'oc_favicon');
add_action('bp_before_header', 'oc_accessibility');
add_action('bp_404', 'oc_404_shake');
add_filter('bp_blog_comment_form', 'oc_comment_allowed_tags' );
add_filter('body_class','oc_body_class');
add_filter('the_content_more_link', 'oc_content_more_link');
add_filter('oc_style', 'oc_style__logo' );
add_filter('oc_script', 'oc_script__effects' );

//--- core

function oc_style()
{
	$content = '';
	$content = 	apply_filters( 'oc_style', $content );
	if (!empty($content))	echo '
<style type="text/css">
'.$content.'
</style>
';	
}

function oc_script()
{
	$content = '';
	$content = 	apply_filters( 'oc_script', $content );
	if (!empty($content))	echo '
<script type="text/javascript">	
'.$content.'
</script>
';	
}

//--- options

function oc_body_class($classes)
{		
	global $oc_options;
	
	if (!empty($oc_options['header_image']))
		$oc_options['header_background'] = 'custom';

	$classes[] = 'width_'	.$oc_options['width_style'];
	$classes[] = 'hbg_'	.$oc_options['header_background'];

	return $classes;
}

function oc_favicon()
{ 
	global $oc_options;
	$favicon = $oc_options['favicon'];
	$favicon = apply_filters( 'oc_favicon', $favicon );
	?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
<?php }

//--- action

function oc_accessibility()
{ 	
	$content = 'This website was created to reach every audience possible.';
	$content = 	apply_filters( 'oc_accessibility', $content );
	$text = '
	<p class="accessibility no-print">'.$content.'</p>
';
	echo $text;
}

function oc_comment_allowed_tags()
{ ?>
	<p><small><strong>XHTML:</strong> You can use these tags:
	<code><?php echo allowed_tags(); ?></code></small></p>
<?php }


//--- filter

function oc_content_more_link($link)
	{ return '<div class="readmore">'.$link.'</div>'; }

function oc_style__logo($content)
{
	global $oc_options;
	
	$css = '';	
	if ($oc_options['logo-enabled'])
		$css = 	apply_filters( 'oc_style__logo', $css );	
		$css .= '
#brand_logo {	
	background-image: url('.$oc_options['logo-image'].'); 
	width: '.$oc_options['logo-width'].'px;	
}
';

	if (!empty($oc_options['header_image']))
	{
		$image = $oc_options['header_image'];
		fix_ori_fullpath($image);
		$css .= '
.hbg_custom #lay_header 
	{	background:url('.$image.') top left no-repeat;	}
';
	}
	
	return $content.$css;
}

function oc_effects()
{
	$theme	= get_bloginfo( 'stylesheet_directory' );
	$js		= $theme.'/js';
	
	wp_enqueue_script('clone-effects', $js.'/effects.js',
		array('mootools-core', 'mootools-more')	);	
		
	if (is_404())	
		wp_enqueue_script('moo-shake', $js.'/Fx.Shake.js',
			array('mootools-core', 'mootools-more')	);	
}

	function getDefaultOptionsEffects() 
	{
		global $oc_options;
		
		$effects = array(
			'hover_normalpage',
			'mootools_watermark_scroll',
			'mootools_skypebutton',
			'mootools_external_favicon',
			'mootools_fliptext',
			'mootools_snapcasa'
		);
		
		$eff_options = array();
		foreach ($effects as $effect)
			$eff_options[$effect] = $oc_options[$effect]; 
		
		if (is_404()) $eff_options['mootools_shake'] = true;		

		return $eff_options;
	}
		
function oc_script__effects($content)
{		
	$eff_options = getDefaultOptionsEffects();	
	
	$effects = array();
	foreach ($eff_options as $opt_name => $opt_val)
		if ($opt_val) $effects[] = $opt_name;

	$effs = array();
	foreach ($effects as $effect) $effs[] = $effect.'();';	
	
	$fx = "
	window.addEvent('domready', function() {		
		".implode($effs,"\n\t\t")."\n"."
	});	
";
	
	return $content.$fx;	
}

function oc_404_shake()
{
?>
<dl id="system-message">
<dt class="error">Error</dt>
<dd class="error message">
	<ul>
		<li>Uh oh... We are sorry. Whatever you are looking isn't around. 
		Go back friend, go back...</li>
	</ul>
</dd>
</dl>	
<?php
}

function oc_bp_slugs()
{
	$slugs = array( 
			BP_SETTINGS_SLUG,
			BP_ACTIVITY_SLUG,
			BP_MESSAGES_SLUG,
			BP_MEMBERS_SLUG,
			BP_FRIENDS_SLUG,
			BP_XPROFILE_SLUG,
			BP_GROUPS_SLUG,
			BP_FORUMS_SLUG,
			BP_BLOGS_SLUG,
			//BP_REGISTER_SLUG,
			BP_ACTIVATION_SLUG,
			BP_SEARCH_SLUG			
		);
		
	$slugs = apply_filters( 'oc_bp_slugs', $slugs );	
		
	return $slugs;
}

/*	
	function inline_script_menumatic()
	{ ?>	
<script type="text/javascript">	
	window.addEvent('domready', function() {		
		var myMenu = new MenuMatic({id: 'menumatic'});
	});	  
</script>
<?php }		
	
	*/
