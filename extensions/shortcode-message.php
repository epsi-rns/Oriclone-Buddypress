<?php
/*
Plugin Name: Shortcode Message
Plugin URI: http://iluni.org
Description: A very simple shortcode that type message.
Version: 1.0
Author: E.R. Nurwijayadi
Author URI: http://iluni.org
*/

add_shortcode('message', 'shortcode_message');
add_shortcode('noteaser', 'shortcode_noteaser');
add_shortcode('home', 'shortcode_home');
add_shortcode('linkbutton', 'shortcode_linkbutton');

function shortcode_message($atts, $content = null) 
{
	extract(shortcode_atts(array(
		'type' => 'notice',	// notice, warning, error, okay
		'text' => '',
		'modified' => false,
	), $atts));
	
	if	($modified)
		$contents[] = ' &#187;&#187; Update: '
			.get_the_modified_time('l, j F Y').' &#171;&#171; ';
	if	($content)
		$contents[] = $content;
	$contents[] = $text;	
	
	return 	'		
<dl id="system-message">
<dt class="'.$type.'">'.$type.'</dt>
<dd class="'.$type.' message fade">
	<ul>
		<li>'.implode($contents, '<br/>').'</li>
	</ul>
</dd>
</dl>'."\n";
}

// noticer mess-age ;-)
function shortcode_noteaser($atts, $content = null) 
{
	if (is_single()) return '';
	else return do_shortcode($content);
}

function shortcode_home()
{
	return home_url().'/';
}

function shortcode_linkbutton($atts, $content = null) 
{
	extract(shortcode_atts(array(
		'type' => ''	// compressed, word, excel, powerpoint
	), $atts));
	
	$text = __('Download...', 'oc');
	
	if (!empty($type)) 
		$text = '<span class="file_'.$type.'">'.$text.'</span>';
	
	if (empty($content)) $content ='#';
	
	return '
<div class="generic-button"><a class="nofavicon" href="'.$content.'">
'.$text.'
</a></div>'."\n";
}





