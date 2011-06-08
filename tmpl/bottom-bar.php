
	<?php if ( is_home() || is_front_page() ): ?>
		<div id="lay_bottom_left">
			<?php include('module-simple-contact.php'); ?>
		</div>
		
		<?php if (function_exists('get_recent_comments')) : ?>
		<div id="lay_bottom_right">
			<h3><?php _e('Recent Comments', 'oc'); ?>:</h3>
			<ul class="recentcomments">
			<?php get_recent_comments(); ?>
			</ul>
		</div>
		<?php endif; ?>
		
		<?php if (function_exists('mdv_recent_posts')) : ?>
		<div id="lay_bottom_center">
			<h3><?php _e('Recent Posts', 'buddypress'); ?>:</h3>
			<ul class="recentposts">
			<?php mdv_recent_posts(); ?>
			</ul>
		</div>	
		<?php endif; ?>
	
	<?php elseif (is_single() || is_archive() 
			|| is_search() || is_attachment()): ?>	
		<?php if (function_exists('wp_tag_cloud')) : ?>	
		<div id="lay_bottom_left">
			<h3><?php _e('Popular Tags', 'oc'); ?></h3>
			<ul>
			<?php wp_tag_cloud(); ?>
			</ul>
		</div>
		<?php endif; ?>		

		<div id="lay_bottom_center">
			<div class="icon_feed"><a href="<?php bloginfo('rss2_url'); ?>">
			<?php _e('Subscribe to RSS Feed', 'oc');?></a></div>
			</ul>
		</div>					
	<?php endif; ?>	
