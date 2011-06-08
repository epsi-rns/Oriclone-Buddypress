<?php
$sb_default = 	array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	);
	
$sb_narrow = $sb_group = $sb_user = $sb_buddy = $sb_blog = $sb_home = $sb_default;
$sb_home['name'] = 'sidebar-home';
$sb_blog['name'] = 'sidebar-blog';
$sb_buddy['name'] = 'sidebar-buddy';
$sb_user['name'] = 'sidebar-user';
$sb_group['name'] = 'sidebar-group';
$sb_narrow['name'] = 'sidebar-narrow';

register_sidebars( 1, $sb_home);
register_sidebars( 1, $sb_blog);
register_sidebars( 1, $sb_buddy);
register_sidebars( 1, $sb_user);
register_sidebars( 1, $sb_group);
register_sidebars( 1, $sb_narrow);
