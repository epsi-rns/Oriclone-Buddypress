<?php
	if ( post_password_required() ) :
		echo '<h3 class="comments-header">' . __('Password Protected', 'buddypress') . '</h3>';
		echo '<p class="alert password-protected">' . __('Enter the password to view comments.', 'buddypress') . '</p>';
		return;
	endif;

	if ( is_page() && !have_comments() && !comments_open() && !pings_open() )
		return;

include('tmpl/comments-loop.php'); 
include('tmpl/comments-open.php');
include('tmpl/comments-trackbacks.php');




