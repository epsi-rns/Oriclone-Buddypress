<input type="hidden" name="_ajax_nonce" 
	value="<?php echo wp_create_nonce( 'oc_admin' ); ?>">
<input type="hidden" name="oc_tab" id="oc_tab" 
	value="<?php echo $current_tab; ?>">
<input type="hidden" value="N"
	name="<?php echo $hidden_field_name; ?>" id="<?php echo $hidden_field_name; ?>">

<?php if( $isPost ): ?>
	<div class="updated"><p><strong>
		<?php _e('Options saved.'); ?>
	</strong></p></div>
<?php endif;?>

<?php if( $isRebuild ): ?>
	<div class="updated"><p><strong>
		<?php echo $css->log; ?>
	</strong></p></div>
<?php endif;?>

<?php switch($current_tab) { 

case 'oc_tab_1': ?>
   	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Color Accessories</h3>
		<table>
		<?php 
			$this->render_field('header_background'); 
			$this->render_field('header_image');
			$this->render_field('text_scheme'); 
			$this->render_field('strip'); 
			$this->render_field('strip_hover'); 
		?>
		</table>
		<p>You can use http://yoursite/static/your-image or just /static/your-image.</p>
	</div></div></div><!-- post body -->

   	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Layout Features</h3>
		<table>
		<?php $this->render_field('width_style'); ?>	
		<?php $this->render_field('layout_position'); ?>
		</table>
	</div></div></div><!-- post body -->
<?php break; 

case 'oc_tab_2': ?>
	<div id="icon-plugins" class="icon32"><br /></div>
		<h3>Theme Plugins</h3>
		<p><i>Don't forget to check theme plugins on separate extensions menu.</i></p>
		<p>You might need to download latest <b>mootools</b> manually.</p>
<?php break; 

case 'oc_tab_3': ?>
   	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Mootools Effects</h3>
		<p>Almost all from davidwalsh.name.</p>
		
		<?php if (!defined('MOOTOOLS_LIBRARIES')): ?>
		<div class="updated">
			<p>This feature <strong>require</strong> 
			<a href="http://wordpress.org/extend/plugins/mootools-libraries/">
			Mootools Libraries</a>.</p>
			<p>You should download and activate it to use any of features below.</p>
		</div>
		<?php endif; ?>
				
		<table>
		<?php 
			$this->render_field('hover_normalpage'); 
			$this->render_field('mootools_watermark_scroll'); 
			$this->render_field('mootools_skypebutton'); 
			$this->render_field('mootools_external_favicon'); 
			$this->render_field('mootools_fliptext'); 
			$this->render_field('mootools_snapcasa'); 
		?>		
		</table>
	</div></div></div><!-- post body -->
<?php break; 

case 'oc_tab_4': ?>
   	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>CSS Minifier</h3>
		<table>
		<?php $this->render_field('cssload'); ?>
		</table>
		<!--p><i>style.css</i> will be remade,
		once you update normal/compacted options</p--> 
	</div></div></div><!-- post body -->		  
<?php break;

case 'oc_tab_5': ?>
   	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Copyright Description</h3>
		<table>
		<?php $this->render_field('cpdesc'); ?>
		</table>
	</div></div></div><!-- post body -->		
	
   	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Logo</h3>
		<table>
		<?php 
			$this->render_field('logo-enabled'); 
			$this->render_field('logo-image'); 
			$this->render_field('logo-width'); 
		?>
		</table>
		<p>You can use http://yourimage.</p>
	</div></div></div><!-- post body -->		
	
	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Site Icon</h3>
		<table>
		<?php $this->render_field('favicon'); ?>
		</table>
		<p>You can use http://yoursite/favicon.ico.</p>
	</div></div></div><!-- post body -->	
<?php break; 

case 'oc_tab_6': ?>
	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Simple Contact</h3>
		<p>This will show contact in your start page.</p>
		<table>
		<?php 
			$this->render_field('contact-company'); 
			$this->render_field('contact-address'); 
			$this->render_field('contact-phone'); 
			$this->render_field('contact-hotline'); 
			$this->render_field('contact-fax'); 
			$this->render_field('contact-email'); 
		?>
		</table>		
	</div></div></div><!-- post body -->	
<?php break; 

case 'oc_tab_7': ?>
	<p><i>For use with any page using 'My Home' template.</i></p>
	
	<p>Home teaser in this theme is something that you can show 
	in your start page to attract user attention.</p>

	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Non logged-in user Message</h3>
		
		<table>
		<?php $this->render_field('guest-message'); ?>
		</table>
		<p>Just empty the area if you don't want to show feature above.</p>
	</div></div></div><!-- post body -->
	
	<div id="post-body">
	<div id="post-body-content">
	<div id="namediv" class="stuffbox">	
		<h3>Site Feature</h3>
		
		<table>
		<?php 
			$this->render_field('home-find-member'); 
			$this->render_field('home-find-group'); 
			$this->render_field('home-find-blog'); 
			$this->render_field('home-read-news'); 
			$this->render_field('home-news-url'); 
		?>
		</table>
		<p>Just empty the area if you don't want to show feature above.</p>
	</div></div></div><!-- post body -->
<?php break; 

case 'oc_tab_8': ?>
	<div id="icon-plugins" class="icon32"><br /></div>
    	<h3>Special thanks to</h3>
    	<div class="clear"></div>
    	<ul>
    		<li><strong>Silk icon set 1.3</strong>, Mark James
    			<br/>http://www.famfamfam.com/lab/icons/silk/
    			<br/>License: Creative Commons Attribution 3.0 License
    			<br/>challenge: http://www.tallent.us/blog/?p=64</li>
    		<li><strong>Mootools Effects</strong>
    			<br/>http://davidwalsh.name
    			<br/>license: ???</li>
    		<li><strong>Menumatic</strong>
    			<br/>http://greengeckodesign.com/?q=menumatic
    			<br/>license: license MIT-style License
    			<br/>note: javascript is deprecated in this theme</li>
    		<li><strong>Calendar Icon</strong>
    			<br/>http://atomicant.co.uk/blog/marek/calendar-icons-blog
    			<br>license: can be used in GPL licensed Themes</li>	
    		<li><strong>NoobSlide</strong>
    			<br/>http://www.efectorelativo.net/laboratory/noobSlide/
    			<br/>license: MIT License
    			<br/>note: moved to plugin</li>	
    	</ul>   
<?php break; 

} /* switch */ ?>
</div>	
