	<li<?php if ( bp_is_front_page() ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>" 
		title="<?php _e( 'Home', 'buddypress' ) ?>">
		<?php _e( 'Home', 'buddypress' ) ?></a>
	</li>
	
<?php if ( 'activity' != bp_dtheme_page_on_front() && bp_is_active( 'activity' ) ) : ?>
	<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" 
		title="<?php _e( 'Community', 'oc' ) ?>">
		<?php _e( 'Community', 'oc' ) ?></a>
	</li>
<?php endif; ?>	

<?php wp_list_pages( 'title_li=&depth=1&exclude=' . bp_dtheme_page_on_front() ); ?>




