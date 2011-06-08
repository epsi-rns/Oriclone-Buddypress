<?php 
	$feeds = array();	
	
	if ( function_exists( 'bp_sitewide_activity_feed_link' ) )
		$feeds[] = array(
			'app'	=> 'rss+xml',
			'href'	=> bp_get_sitewide_activity_feed_link(),
			'title'	=> get_bloginfo('name')
				.' | '.__('Site Wide Activity RSS Feed', 'buddypress' )
		);

	if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() )		
		$feeds[] = array(
			'app'	=> 'rss+xml',
			'href'	=> bp_get_member_activity_feed_link(),
			'title'	=> get_bloginfo('name')
				.' | '.bp_get_displayed_user_fullname()
				.' | '.__( 'Activity RSS Feed', 'buddypress' )
		);
	
	if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() )
		$feeds[] = array(
			'app'	=> 'rss+xml',
			'href'	=> bp_get_group_activity_feed_link(),
			'title'	=> get_bloginfo('name')
				.' | '.bp_get_current_group_name()
				.' | '.__( 'Group Activity RSS Feed', 'buddypress' )
		);	
		
	$feeds[] = array(
		'app'	=> 'rss+xml',
		'href'	=> get_bloginfo('rss2_url'),
		'title'	=> get_bloginfo('name')
			.' | '.__( 'Blog Posts RSS Feed', 'buddypress' )
	);		
	
	$feeds[] = array(
		'app'	=> 'atom+xml',
		'href'	=> get_bloginfo('atom_url'),
		'title'	=> get_bloginfo('name')
			.' | '.__( 'Blog Posts Atom Feed', 'buddypress' )
	);	
	
	foreach ($feeds as $feed)
		echo '	<link rel="alternate" type="application/'.$feed['app'].'" '
			.'title="'.$feed['title'].'" href="'.$feed['href'].'" />'."\n";
