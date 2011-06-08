	<?php do_action( 'bp_before_header' ) ?>		
	<div class="mintheme" id="lay_header">

		<div id="lay_header_left">
			<?php if($oc_options['logo-enabled']): ?>
			<div id="brand_logo"></div>
			<?php endif; ?>
				
			<h1 id="sitename"><a href="<?php echo home_url(); ?>" 
				title="<?php _e( 'Home', 'buddypress' ) ?>"><?php bp_site_name() ?>
			</a></h1>
		</div>	

		<div id="lay_header_right" class="no-print">			
			<?php do_action( 'bp_before_search_login_bar' ) ?>
			<div id="search-login-wrapper">
				<div id="tabsearch"> 
					<div id="tabmenu_left"></div>
					<div id="tabmenu_center">
					<?php include 'top-bp-searchform.php'; ?>
					</div>				
					<div id="tabmenu_right"></div>
				</div>				
				<?php do_action( 'bp_search_login_bar' ) ?>		
			</div>	
			<?php do_action( 'bp_after_search_login_bar' ) ?>
			<div class="clr"></div>

			<?php do_action( 'bp_header' ) ?>		
		</div>
		
		<div id="lay_header_menu" class="no-print">
			<div id="menumaticwrap">
			<ul id="menumatic">
			<?php 	include('top-navigation.php'); ?>
			</ul>
			</div>
			<div class="clr"></div>
		</div>		
	
	</div>
	<?php do_action( 'bp_after_header' ) ?>
		
	<div class="mintheme clr no-print">
	<div id="lay_bar">	
		<?php 	include('top-bp-user-login.php'); ?>
		<div class="clr"></div>		
	</div></div>		
	
		<?php do_action( 'bp_before_container' ) ?>

		<div id="container" class="mintheme">

			<?php if ( !bp_is_blog_page() && !bp_is_directory() && !bp_is_register_page() && !bp_is_activation_page() ) : ?>

				<?php locate_template( array( 'userbar.php' ), true ) /* Load the user navigation */ ?>
				<?php locate_template( array( 'optionsbar.php' ), true ) /* Load the currently displayed object navigation */ ?>

			<?php endif; ?>
