<?php if ( !is_user_logged_in() ) : ?>

	<div id="lay_bar_left">
	<form name="login-form" id="login-form" action="<?php echo site_url( 'wp-login.php' ) ?>" method="post">
		<input type="text" name="log" id="user_login" 
			value="<?php echo esc_attr(stripslashes($user_login)); ?>" 
			onfocus="if (this.value == '<?php _e( 'Username', 'buddypress' ) ?>') {this.value = '';}" 
			onblur="if (this.value == '') {this.value = '<?php _e( 'Username', 'buddypress' ) ?>';}" />
		<input type="password" name="pwd" id="user_pass" class="input" value="" />

		<span class="forgetmenot"><label>
		<input name="rememberme" type="checkbox" id="sidebar-rememberme"
			value="forever" title="<?php _e( 'Remember Me', 'buddypress' ) ?>" /> 
		<?php _e( 'Remember Me', 'buddypress' ) ?></label></span>

		<input type="submit" name="wp-submit" id="wp-submit"  tabindex="100" 
			value="<?php _e( 'Log In', 'buddypress' ) ?>"/>
			
		<?php if ( bp_get_signup_allowed() ) : ?>
		<input type="button" name="signup-submit" id="signup-submit" 
			value="<?php _e( 'Sign Up', 'buddypress' ) ?>" 
			onclick="location.href='<?php echo bp_signup_page() ?>'" />
		<?php endif; ?>

		<input type="hidden" name="redirect_to" value="<?php echo bp_root_domain() ?>" />
		<input type="hidden" name="testcookie" value="1" />

		<?php do_action( 'bp_login_bar_logged_out' ) ?>
	</form>
	</div>
	
	<div class="clr"></div>
	<div id="oc_tweet">
	<?php 
		if (function_exists('get_random_tweet'))
			echo get_random_tweet();
	?>	
	</div>		

<?php else : ?>

	<div id="lay_bar_right">
		<?php bp_loggedin_user_avatar( 'width=20&height=20' ) ?> &nbsp; 
		<?php bp_loggedinuser_link() ?> / <?php bp_log_out_link() ?>

		<?php do_action( 'bp_login_bar_logged_in' ) ?>
	</div>
	
	<div id="oc_tweet">
	<?php 
		if (function_exists('get_random_tweet'))
			echo get_random_tweet();
	?>	
	</div>	

<?php endif; ?>
		
