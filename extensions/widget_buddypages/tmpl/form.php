<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:'); ?> 
	<input class="widefat" type="text" 
		id="<?php echo $this->get_field_id('title'); ?>" 
		name="<?php echo $this->get_field_name('title'); ?>" 		
		value="<?php echo esc_attr($instance['title']); ?>" />
</label></p>  
