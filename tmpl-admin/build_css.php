<?php 
/** code by E.R. Nurwijayadi **/

class Build_CSS
{
	// css compression type, true or false
	var $compact = false;
	
	// path
	var $cssfile;
	var $cssdev;
	
	// css items
	var $statics;
	var $variations;
	var $buddypress;

	// other helper
	var $content;
	var $log;
	
	
	// PHP4 contructor
	function Build_CSS($path, $options) {
		$this->cssfile = $path.'/style.css';
		$this->cssdev = $path.'/css-dev/';		
		$this->cssbp = $path.'/css-bp/';	

		$this->compact = ($options['cssload']==2);
					
		$this->statics = array(
			'background', 'footer', 'layout', 'module',
			'theme', 'bp-custom', 'docs', 'header',  'menumatic', 
			'my-contact', 'my-home', 'scheme', 'typography', 'calendar', 
			'features',	'messages', 'wp-default', 'silk');
		// exclude: 'dateicon',	'reset',

		$this->variations[]	= 'scheme/'	.$options['text_scheme'];
		$this->variations[]	= 'strip/'	.$options['strip'];
		$this->variations[]	= 'hover/'	.$options['strip_hover'];
		
		$this->buddypress = array(
			'bp-activity-stream', 'bp-input-forms', 'bp-group-forum',
			'bp-pagination', 'bp-items', 'bp-item-headers',
			'bp-data-tables', 'bp-messages'
		);
			
	}
	
	/* css part */		
	function get_content($path, $imports=array())
	{
		$content = '';
		foreach ($imports as $file) {			
			$cssfile = $path.$file.'.css';
			$cssadd = file_get_contents( $cssfile );
			
			if	(!$this->compact)
				$content .= "\n".'/* --- '.$file.'.css --- */'."\n\n";
				
			$content .= $cssadd;
		}		
		return $content;
	}
	
	function compress()	{
		// -- The Reinhold Weber method
		// remove comments 
		$pattern = '!/\*[^*]*\*+([^/][^*]*\*+)*/!';
		$this->content = preg_replace($pattern, '', $this->content);
    	
    	// remove tabs, spaces, newlines, etc. 
    	$search = array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ');
    	$this->content = str_replace($search, '', $this->content); 
	}
	
	function ori_stylemetadata() {
		return '/*
Theme Name: BuddyPress Oriclone
Theme URI: http://iluni-ftui.org/
Description: The Oriclone Theme for BuddyPress.
Version: 1.0.1
Author: E.R. Nurwijayadi
Author URI: http://iluni.org/
Template: bp-default
Tags: buddypress, theme-options, custom-colors, white

License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

	BP Oriclone v1.2
	see readme.txt for details
*/

.commentlist .bypostauthor {
}
#content .gallery .gallery-caption {
	color: #888;
	font-size: 12px;
	margin: 0 0 12px;
}
';
	}
		
	// note: content_variation deprecated in favor of WPMU 
	// so template can be reused in many blogs.
	
	function build() {
		$content_static = $this->get_content($this->cssdev, $this->statics);
		$content_buddypress = $this->get_content($this->cssbp, $this->buddypress);
		// $content_variation = $this->get_content($this->cssdev, $this->variations);

		// fix path
		$pattern = 'url(../images/';
		$replacement = 'url(images/';
		$content_static = str_replace($pattern, $replacement, $content_static);
		$pattern = 'url(../fonts/';
		$replacement = 'url(fonts/';
		$content_static = str_replace($pattern, $replacement, $content_static);		

		// fix path
		$pattern = 'url(../images/';
		$replacement = 'url(images/';
		$content_buddypress= str_replace($pattern, $replacement, $content_buddypress);
		$pattern = 'url(../fonts/';
		$replacement = 'url(fonts/';
		$content_static = str_replace($pattern, $replacement, $content_static);		

		// fix path
		// $pattern = 'url(../../images/';
		// $replacement = 'url(images/';
		// $content_variation = str_replace($pattern, $replacement, $content_variation);
		
		// note: statics css override buddypress css
		// $this->content = $content_static.$content_variation;
		$this->content = $content_buddypress.$content_static;
		
		if	($this->compact) 
			$this->compress();
			
		$this->content = $this->ori_stylemetadata().$this->content;
		
		if ( is_writeable($this->cssfile) ) 
		{
			$f = fopen($this->cssfile, 'w');
			fwrite($f, $this->content);
			fclose($f);
			$this->log = 'CSS Updated.';
		}	else $this->log = 'Failed to open file for writing.';
	}
}


