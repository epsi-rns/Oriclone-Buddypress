<?php 

// --- Body Helper


function get_ori_teaser()
{
	if (is_home()) 
	{
		global $oc_options;
		
		if ($oc_options['teaser1-enabled']) 
			echo do_shortcode($oc_options['teaser1']);
		
		if ($oc_options['teaser2-enabled']) 
			echo do_shortcode($oc_options['teaser2']);
			
		if ($oc_options['teaser3-enabled']) 
			echo do_shortcode($oc_options['teaser3']);
	}
}	
