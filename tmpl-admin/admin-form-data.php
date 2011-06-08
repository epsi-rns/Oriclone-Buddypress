<?php

	function oc_form_value()
	{	
		$lists = oc_form_data_lists();
		
		$options = array(
			// css minifier, 0:separated, 1:normal (one file), 2:compacted		
		    'cssload' => array(
				'title'	=> 'Loading Type',
				'type'	=> 'radio',				
				'default' => '1',
				'options' => $lists['cssload'],
				'desc'	=>	'Compact and compressed CSS into one template.css or use separated css for development.'
			),
			
			// each css in a file   
    		'width_style' => array(
				'title'	=> 'Width Style',
				'type'	=> 'select',				
				'default' => 'fluid',
				'options' => $lists['width_style'],
				'desc'	=>	'Width style of the template.'
			),
    		'layout_position' => array(
				'title'	=> 'Layout Position',
				'type'	=> 'select',				
				'default' => 'cl',
				'options' => $lists['layout_position'],
				'desc'	=>	'The layout position of sidebar container.'
			),
			'header_background' => array(
				'title'	=> 'Header Background',
				'type'	=> 'select',				
				'default' => 'grey_blue',
				'options' => $lists['header_background'],
				'desc'	=>	'Header background variation to use'
			),
			'header_image' => array(
				'title'	=> 'Custom Image',
				'type'	=> 'text',				
				'size'	=> 50,
				'default' => '',
				'desc'	=>	'This will override header background.',
			),
			
    		// each css in folder			
			'text_scheme' => array(
				'title'	=> 'Text Color Scheme',
				'type'	=> 'select',				
				'default' => 'peachykeen',
				'options' => $lists['text_scheme'],
				'desc'	=>	'General text color scheme to use'
			),
			'strip' => array(
				'title'	=> 'Default Strip',
				'type'	=> 'select',				
				'default' => 'white-simple',
				'options' => $lists['strip'],
				'desc'	=>	'Default strip background color variation to use'
			),
			'strip_hover' => array(
				'title'	=> 'Hover Strip',
				'type'	=> 'select',				
				'default' => 'ice',
				'options' => $lists['strip_hover'],
				'desc'	=>	'Hover strip background color variation to use'
			),
			
			// each css in a file   
			'hover_normalpage' => array(
				'title'	=> 'Side Menu Link Nudging',
				'type'	=> 'isradio',
				'desc'	=>	'',
				'default' => true
			),
			'mootools_watermark_scroll' => array(
				'title'	=> 'Watermark Scroll',
				'type'	=> 'isradio',
				'desc'	=>	'',
				'default' => true
			),
			'mootools_skypebutton' => array(
				'title'	=> 'Skype Button',
				'type'	=> 'isradio',
				'desc'	=>	'',
				'default' => true
			),	
			'mootools_external_favicon' => array(
				'title'	=> 'External Favicon',
				'type'	=> 'isradio',
				'desc'	=>	'',
				'default' => true
			),
			'mootools_fliptext' => array(
				'title'	=> 'Flip Text',
				'type'	=> 'isradio',
				'desc'	=>	'',
				'default' => false
			),
			'mootools_snapcasa' => array(
				'title'	=> 'SnapCasa',
				'type'	=> 'isradio',
				'desc'	=>	'',
				'default' => true
			),
			
			// branding			
			'cpdesc' => array(
				'title'	=> 'Copyright Description',
				'type'	=> 'area',				
				'default' => 'PT. Gamelan Batik, Ambalat - Natuna - Indonesia',
				'desc'	=>	'Your Company Description will be shown in footer.'
			),
			'favicon' => array(
				'title'	=> 'Site Icon',
				'type'	=> 'text',
				'desc'	=>	'',
				'size'	=> 50,
				'default' => 'wp-content/themes/bp-oriclone/images/oriclone/favicon.ico'
			),
			'logo-enabled' => array(
				'title'	=> 'Enable logo?',
				'type'	=> 'radio',
				'desc'	=>	'',
				'default' => false,
				'options' => $lists['logo-enabled']
			),
			'logo-image' => array(
				'title'	=> 'Logo Image',
				'type'	=> 'text',
				'desc'	=>	'',
				'size'	=> 50,
				'default' => 'wp-content/themes/bp-oriclone/images/oriclone/orb-spiral-yellow.png'
			),
			'logo-width' => array(
				'title'	=> 'Logo Width (px)',
				'type'	=> 'text',
				'desc'	=>	'',
				'size'	=> 5,
				'default' => '80'
			),
			
			// simple contact
			'contact-company' => array(
				'title'	=> 'Company',
				'type'	=> 'text',
				'size'	=> 25,
				'default' => 'Sekretariat ILUNI FTUI',
				'desc'	=>	'Type your company, eg. iluni inc.'
			),
			'contact-address' => array(
				'title'	=> 'Address',
				'type'	=> 'area',				
				'default' => '
Gedung Lemtek FTUI,<br/>
Jl. Salemba Raya 4,<br/>
Jakarta 10430 Indonesia',
				'desc'	=>	'Type your address description.'
			),
			'contact-phone' => array(
				'title'	=> 'Phone',
				'type'	=> 'text',
				'size'	=> 25,			
				'default' => '(021) 70904004',
				'desc'	=>	'Type your phone or leave it blank.',
			),
			'contact-hotline' => array(
				'title'	=> 'Hotline Number',
				'type'	=> 'text',
				'size'	=> 25,			
				'default' => '',
				'desc'	=>	'Type your hotline phone or leave it blank.',
			),
			'contact-fax' => array(
				'title'	=> 'Faximile',
				'type'	=> 'text',
				'size'	=> 25,			
				'default' => '(021) 31903023',
				'desc'	=>	'Type your fax or leave it blank.',
			),
			'contact-email' => array(
				'title'	=> 'email',
				'type'	=> 'text',
				'size'	=> 25,			
				'default' => 'sekretariat@iluni-ftui.org',
				'desc'	=>	'Type your email or leave it blank.',
			),
			
			// My Home Template (my-home.php)
			'guest-message' => array(
				'title'	=> 'Guest Message',
				'type'	=> 'area',
				'default' => '
Silakan login terlebih dahulu.<br/>
Jangan lupa memeriksa e-mail saat mendaftar.<br/>
Layanan <a href="http://gravatar.com">Gravatar</a> 
dapat digunakan untuk mengganti wajah avatar.',
				'desc'	=>	'Message you want to tell for non logged-in member.',
			),
			'home-find-member' => array(
				'title'	=> 'Find Member',
				'type'	=> 'area',
				'default' => '
Ikatkan silaturahmi dengan menyapa sahabat alumni.
<div class="clr"></div>
<p>Lacak dan jelajah kawan untuk bersua kembali.
Jumlah alumni yang terdaftar bertambah dari hari ke hari.</p>',
				'desc'	=>	'',
			),
			'home-find-group' => array(
				'title'	=> 'Find Group',
				'type'	=> 'area',
				'default' => '
Ikatkan kembali kekeluargaan kita dalam kebersamaan.
<div class="clr"></div>
<p>Bangkitkan kenangan, suarakan opini, utarakan minat kita 
dengan berkumpul bersama.</p>',
				'desc'	=>	'',
			),
			'home-find-blog' => array(
				'title'	=> 'Find Blog',
				'type'	=> 'area',
				'default' => '
Perkuat jati diri Anda dalam lembaran blog alumni.
<div class="clr"></div>
<p>Mari berbagi informasi yang bermanfaat bagi kemajuan alumni.
Ikatlah ilmu dengan menuliskannya.</p>',
				'desc'	=>	'',
			),
			'home-read-news' => array(
				'title'	=> 'Read News',
				'type'	=> 'area',
				'default' => '
Perbarui wawasan dengan membaca jurnal berita terbaru.
<div class="clr"></div>
<p>Redaksi beserta segenap kontributor menyumbang berbagai topik hangat
demi kemajuan bersama.</p>',
				'desc'	=>	'',
			),
			'home-news-url' => array(
				'title'	=> 'Blog URL',
				'type'	=> 'text',
				'size'	=> 25,			
				'default' => '',
				'desc'	=>	'Type your blog URL or leave it blank.',
			)
		);
		
		return $options;
	}
	
	function oc_form_data_lists()
	{
		return array(
			'width_style' => array(
				'fluid' => 'Fluid',
				'small' => 'Small',
				'medium' => 'Medium'
			),
			'layout_position' => array(		
				'lcr' => 'Sidebar - Content - Narrow',
				'lc' => 'Sidebar - Content',
				'cr' => 'Content - Narrow',
				'rcl' => 'Narrow - Content - Sidebar',
				'rc' => 'Narrow - Content',
				'cl' => 'Content - Sidebar',
				'lrc' => 'Sidebar - Narrow - Content',
				'rlc' => 'Narrow - Sidebar - Content',
				'clr' => 'Content - Sidebar - Narrow',
				'crl' => 'Content - Narrow - Sidebar'
			),			
			'header_background' => array(
				'custom' => 'Custom Image',
				'blue' => 'Blue',
				'grey_blue' => 'Grey Blue',
				'blue_tutor' => 'Blue Tutorial',
				'olive' => 'Olive',
				'red' => 'Red',
				'red_gloss' => 'Red Gloss',
				'orange' => 'Orange',
				'yellow_orange' => 'Yellow Orange',
				'yellow' => 'Yellow'
			),			
			'text_scheme' => array(
				'elegantsteps' => 'Elegant Steps',
				'thoughtprovoking' => 'Thought Provoking',
				'oceanfrontproperty' => 'Ocean Front Property',
				'sleepmode' => 'Sleep Mode',
				'trepido' => 'Trepido',
				'peachykeen' => 'Peachy Keen'
			),
			'strip' => array(
				'none' => 'Transparent',
				'white' => 'White',
				'white-simple' => 'White Simple',
				'white-trans' => 'White Transparent',
				'black-simple' => 'Black Simple',
				'ice' => 'Ice',
				'blue' => 'Blue',			
				'green' => 'Green',
				'lime' => 'Lime',
				'orange' => 'Orange',
				'red' => 'Red'
			),
			'strip_hover' => array(
				'none' => 'Transparent',
				'white' => 'White',
				'white-simple' => 'White Simple',
				'black-simple' => 'Black Simple',
				'ice' => 'Ice',
				'blue' => 'Blue',			
				'green' => 'Green',
				'lime' => 'Lime',
				'orange' => 'Orange',
				'red' => 'Red'		
			),
			'cssload' => array(				
				'2' => 'Compacted',
				'1' => 'Normal! style.css',
				'0' => 'Separated! for debugging purpose'
			),
			'logo-enabled' => array(				
				'1' => 'Yup!',
				'0' => 'Nope! not this time. '				
			)	
		);
	}
		
