<ul>
<?php if ( 'activity' != bp_dtheme_page_on_front() && bp_is_active( 'activity' ) ) : ?>
	<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" 
		title="<?php _e( 'Activity', 'buddypress' ) ?>">
		<?php _e( 'Activity', 'buddypress' ) ?></a>
	</li>
<?php endif; ?>

	<li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" 
		title="<?php _e( 'Members', 'buddypress' ) ?>">
		<?php _e( ucwords(BP_MEMBERS_SLUG), 'buddypress' ) ?></a>
		<?php if ( is_user_logged_in() ): ?>
		<ul>
			<li<?php if ( bp_is_page( BP_XPROFILE_SLUG ) ) : ?> class="selected"<?php endif; ?>>
				<a href="<?php echo bp_get_loggedin_user_link() ?>" 
					title="<?php _e( 'My Profile', 'buddypress' ) ?>">
					<?php _e( 'My Profile', 'buddypress' ) ?></a>		
			</li>
		</ul>
		<?php endif; ?>
	</li>

<?php if ( bp_is_active( 'groups' ) ) : ?>
	<li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" 
		title="<?php _e( 'Groups', 'buddypress' ) ?>">
		<?php _e( 'Groups', 'buddypress' ) ?></a>
	</li>

	<?php if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) bp_get_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
	<li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" 
		title="<?php _e( 'Forums', 'buddypress' ) ?>">
		<?php _e( 'Forums', 'buddypress' ) ?></a>
	</li>
	<?php endif; ?>
<?php endif; ?>

<?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
	<li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" 
		title="<?php _e( 'Blogs', 'buddypress' ) ?>">
		<?php _e( 'Blogs', 'buddypress' ) ?></a>
	</li>
<?php endif; ?>

<?php do_action( 'bp_nav_items' ); ?>
</ul>
