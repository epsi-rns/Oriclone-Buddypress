<?php

function oc_default_widget() 
{
	$instance = array(
		'title' => __('Community', 'oc'), 
		'number' => 9);
	$args = array(
		'title' => __('Community ', 'oc'), 
		'before_widget' => '<div id="buddypages" class="widget widget_buddypages">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>'
	);
	$sidebar = new BuddyPages();	// widget
	$sidebar->number = $instance['number'];
	$sidebar->widget($args,$instance);
}
?>

<?php do_action( 'bp_before_sidebar' ) ?>

<div id="sidebar">
<?php do_action( 'bp_inside_before_sidebar' ) ?>

<?php
	if (is_front_page()) {
		dynamic_sidebar( 'sidebar-home' );
	} 
	else {
		// http://buddypress.org/blog/how-to/customizable-slugs-in-buddypress/
		$bpc = bp_current_component();

		$bp_slugs = oc_bp_slugs();
		
		$bpg_slugs = array( 
			BP_GROUPS_SLUG,
			BP_FORUMS_SLUG,
			BP_BLOGS_SLUG
		);		
		
		if	( in_array( $bpc, $bp_slugs ) )	{
			if (!dynamic_sidebar( 'sidebar-buddy' )) 
				oc_default_widget();
			
			if ( is_user_logged_in() ) {			
				include 'tmpl/sidebar-user.php'	;
				if	( in_array( $bpc, $bpg_slugs ) )
					dynamic_sidebar( 'sidebar-group' );
				else
					dynamic_sidebar( 'sidebar-user' );	
			}		
		} else {
			dynamic_sidebar( 'sidebar-blog' );
		}
	}		
?>

<?php do_action( 'bp_inside_after_sidebar' ) ?>
</div><?php /* #sidebar */ ?>

<?php do_action( 'bp_after_sidebar' ) ?>
