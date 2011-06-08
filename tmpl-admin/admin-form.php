<script  type='text/javascript'><!--
<?php include('admin-form-jquery.js'); ?>
--></script>

<style type='text/css'>
<?php include('admin-form-style.css'); ?>
</style>

<div class="wrap">

	<div id="icon-themes" class="icon32"><br /></div>
	<h2>Oriclone Configuration</h2>
	<p>Here is where the form would go if I actually had options.</p>
	
	<div id="oc_tabs">
		<a href='#' id='oc_tab_1'>Visual Appearance</a>	|
		<a href='#' id='oc_tab_2'>Theme Plugins</a>	|
		<a href='#' id='oc_tab_3'>Mootools Effects</a>	|
		<a href='#' id='oc_tab_4'>CSS Minifier</a>	|
		<a href='#' id='oc_tab_5'>Branding</a>	|
		<a href='#' id='oc_tab_6'>Contacts</a>	|
		<a href='#' id='oc_tab_7'>Home Teaser</a>	|
		<a href='#' id='oc_tab_8'>Credits</a>
	</div>	

	<div id='oc_loading'>Loading!</div>
	
	<form name="oc_form" id="oc_form" method="post" action="">	
	<div id="poststuff" class="metabox-holder">
		<input type="hidden" name="action" value="get_oc_theme">	
		<div id='oc_params_container'>
			<input type="hidden" name="_ajax_nonce" value="<?php echo $nonce; ?>">
			<input type="hidden" name="oc_tab" id="oc_tab" value="">
		</div>
		
		<a href='#' id='oc_update'><?php _e('Update Options'); ?>!</a>	|
		<a href='#' id='oc_rebuild'><?php _e('Rebuild CSS'); ?>!</a>
	</div>
	</form>
	
	<br/>
	<p><small>This administration page currently require 'not using internet explorer',<br/>
	You may switch to Safari, Chrome, or Mozilla based browser.<br/>
	<br/>
	Apologize for this inconvenience.<br/>
	Hope this JQuery.html(html) DOM validation bug is temporary.</small></p>	
</div>
