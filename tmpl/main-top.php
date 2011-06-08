<?php
	// note: reserved for future use
	// this both always set to ture
	$left = true;	// wide sidebar
	$right = true;	// narrows sidebar
	
	// Main Layout	
	$layout = $oc_options['layout_position'];
	
	if (!$left)		$layout = str_replace('l', '', $layout);	
	if (!$right)	$layout = str_replace('r', '', $layout);
	
	$show_left	= $left		&& (strpos($layout, 'l')!==false);
	$show_right	= $right	&& (strpos($layout, 'r')!==false);
	
	$flip_leftright = ($layout=='rlc') || ($layout=='clr');	
	$main_layout = 'pos_'.$layout;
?>

	<div id="lay_main" class="<?php echo $main_layout;?>">
		<?php if ($flip_leftright) : ?>
		<?php if ($show_right) : ?>
		<div id="lay_right">
			<?php get_sidebar('narrow'); ?>
		</div>	
		<?php endif; ?>
		<?php endif; ?>

 		<?php if ($show_left) : ?>
		<div id="lay_left">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	
		<?php if (!$flip_leftright) : ?>
		<?php if ($show_right) : ?>
		<div id="lay_right">
			<?php get_sidebar('narrow'); ?>
		</div>	
		<?php endif; ?>
		<?php endif; ?>	
		
	
		<div id="lay_content">
			<?php if (class_exists('breadcrumb_navigation_xt')) 
				the_ori_breadcrumb(); ?>
			
			<?php /*
			<div id="container-message">
				message
			</div>
			*/ ?>
	
			<div id="main_content">	
				<?php /* get_ori_teaser();	*/?>		
