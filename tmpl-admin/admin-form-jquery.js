
function update_oriclone_params() {
	jQuery.ajax({
		type: "post",
		url: "admin-ajax.php",
		data: jQuery('#oc_form').serialize(),
		beforeSend: function() {
			// fadeIn loading just when link is clicked
			jQuery("#oc_loading").fadeIn('fast');
			jQuery("#oc_params_container").fadeOut('fast');
		}, 
		success: function(html){ 
			// so, if data is retrieved, store it in html
			jQuery("#oc_params_container").html(html); 
			// fadeIn the html inside oc_params div
			jQuery("#oc_params_container").fadeIn("fast"); 
			//animation
			jQuery("#oc_loading").fadeOut('slow');
		}
	}); //close jQuery.ajax(
}

// When the document loads do everything inside here ...
jQuery(document).ready(function(){
	update_oriclone_params();
	jQuery('#oc_update').click(function() { 
		jQuery('#oc_submit_hidden').val('Y');
		//start function when any update link is clicked
		update_oriclone_params();
	})
	
	jQuery('#oc_tabs a').click(function() { 
		jQuery('#oc_tab').val(this.id);
		update_oriclone_params();
	})
	
	jQuery('#oc_rebuild').click(function() { 
		jQuery('#oc_submit_hidden').val('CSS');
		update_oriclone_params();
	})	
})
