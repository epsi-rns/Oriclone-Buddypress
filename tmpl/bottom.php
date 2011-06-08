<?php 
	$bar_layout = is_home() || is_front_page() ? 'pos_col3' : 'pos_col2';	

	global $oc_options;
	$bp_powered = sprintf( __( '%s is proudly powered by <a href="http://mu.wordpress.org">WordPress MU</a> and <a href="http://buddypress.org">BuddyPress</a>', 'buddypress' ), get_bloginfo('name') );
	$cp_desc = ($oc_options['cpdesc'])? $oc_options['cpdesc'] : $bp_powered;
?>	
			<div class="clr"></div>
		</div> <!-- #container -->

		<?php do_action( 'bp_after_container' ) ?>

		<div class="mintheme clr no-print <?php echo $bar_layout;?>">
		<div id="lay_bottom">
		<div id="lay_bottom_centering">
			<?php 	include('bottom-bar.php'); ?>
			<div class="clr"></div>		
		</div></div></div>
		
		<?php do_action( 'bp_before_footer' ) ?>
		<div id="lay_footer">
			
			Copyright &copy; <?php echo date('Y'); ?>,
			<?php echo $cp_desc; ?>
			<br/>
			<?php do_action( 'bp_footer' ) ?>
			
			<?php wp_footer(); ?>	
		</div>
		<?php do_action( 'bp_after_footer' ) ?>
		
		
		<div class="no-print"><?php /* debug */ ?></div>		
