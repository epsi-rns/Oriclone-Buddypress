<?php
	global $oc_options;
	$vars = array('company', 'address', 'phone', 'hotline', 'fax', 'email');
	foreach($vars as $key) 	
		$$key = $oc_options['contact-'.$key];
?>

		<div class="frontact">
			<div id="company"><strong><?php echo $company; ?></strong></div>
			<div id="address"><?php echo $address; ?></div>
			
			<?php if(!empty($phone)): ?>
			<div id="tel"><?php _e('Phone', 'oc'); ?>: <?php echo $phone ?></div>
			<?php endif; ?>
			
			<?php if(!empty($hotline)): ?>
			<div id="tel"><?php _e('Hotline', 'oc'); ?>: <?php echo $hotline ?></div>
			<?php endif; ?>			
			
			<?php if(!empty($fax)): ?>
			<div id="fax"><?php echo _e('Fax', 'oc'); ?>: <?php echo $fax; ?></div>
			<?php endif; ?>
			
			<?php if(!empty($email)): ?>
			<div id="mail"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
			<?php endif; ?>
		</div>
