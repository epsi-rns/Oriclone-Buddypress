<?php
abstract class GenericOptions
{	
	protected $parent_key = null;	// set this in inherted class
	protected $options_form;
	protected $options_data;
	
	protected $hidden_field_name = 'submit_hidden'; // reset this in inherted class
	protected $isPost = false;
	
	/*-- View/ Template --*/
	
	abstract public function display();
	
	/*-- Model --*/
	
	abstract protected function init_options_form_value();
	
	// event
	public function on_oc_before_update_options() {}
	
	function form_to_data()
	{
		$default = array();
		foreach ($this->options_form as $k => $v)
			$default[$k] = $v['default'];
			
    	// Read in existing option value from database
    	$saved_options = get_option( $this->parent_key );
    	
    	if (!empty($saved_options))	
			foreach($saved_options as $opt_name => $opt_val)
				$default[$opt_name] = $saved_options[$opt_name];
				
		$this->options_data = $default;    			
	}	
	
	function data_to_form()
	{
		foreach($this->options_data as $opt_name => $opt_val)
			$this->options_form[$opt_name]['value'] = $opt_val;
	}	

	// displays the page content for the Test Options submenu
	function update_options_data()
	{
		// get default value from form
		$this->form_to_data();
		
    	// See if the user has posted us some information
    	// If they did, this hidden field will be set to 'Y'
    	$this->isPost = ($_POST[ $this->hidden_field_name ] == 'Y');
    	
    	if( $this->isPost )
		{
			// Read their submitted value
			foreach($this->options_data as $opt_name => $opt_val)
				if(isset( $_POST[ $opt_name ] ))
        			$this->options_data[$opt_name] = $_POST[ $opt_name ];
        			
			$this->on_oc_before_update_options();		

			// Save the submitted value in the database
			update_option( $this->parent_key, $this->options_data );			
		}
		
		// revert current value to form
		$this->data_to_form();
	}
	
	public function get_options_data()
	{	
		$this->init_options_form_value(); 
		$this->form_to_data();
		return $this->options_data;	
	}
	
	/*-- Helper --*/	
	
	function render_field($key, $echo = true)
	{
		$form = $this->options_form[$key];
		
		switch($form['type']) 
		{
			case 'select':	$content = $this->field_select($key);	break;
			case 'radio':	$content = $this->field_radio($key);	break;
			case 'isradio':	$content = $this->field_isradio($key);	break;	// toggle
			case 'area':	$content = $this->field_area($key);	break;		
			case 'text':	$content = $this->field_text($key);	break;	
		}
		
		if ($echo) 
			echo $content;
		else
			return $content;
	}

	function field_select($key)
	{
		extract( $this->options_form[$key] );
		$titledesc = $desc ? ' title="'.$desc.'"' : '';
		
		$list = array();
		foreach ($options as $k => $v)
		{	
			$selected = ($k==$value) ? ' selected="selected"' : '';
			$list[] = '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
		}

		$list_text = implode("\n\t\t", $list);		
		
		return '
	<tr'.$titledesc.'>
		<td width="25%" nowrap="nowrap" valign="top">'.$title.'</td>
		<td>
			<select name="'.$key.'">
			'.$list_text.'
			</select>
		</td>
	</tr>
';
	}		
	
	function field_radio($key)
	{
		extract( $this->options_form[$key] );
		$titledesc = $desc ? ' title="'.$desc.'"' : '';
		
		$list = array();
		foreach ($options as $k => $v)
		{	
			$checked = ($k==$value) ? 'checked="checked"' : '';
			$list[] = '<input type="radio" name="'.$key.'" value="'.$k.'" '
				.$checked.' />'.$v.'<br/>';			
		}

		$list_text = implode("\n\t\t", $list);
		
		return '
	<tr'.$titledesc.'>
		<td width="25%" nowrap="nowrap" valign="top">'.$title.'</td>
		<td>
			'.$list_text.'
		</td>
	</tr>
';
	}
	
	function field_isradio($key)
	{
		extract( $this->options_form[$key] );
		$titledesc = $desc ? ' title="'.$desc.'"' : '';
		
		$list = array();
	
		$checked = ($value) ? 'checked="checked"' : '';
		$list[] = '<input type="radio" name="'.$key.'" value="1" '
			.$checked.' />Enabled';			
			
		$checked = (!$value) ? 'checked="checked"' : '';
		$list[] = '<input type="radio" name="'.$key.'" value="0" '
			.$checked.' />Disabled';				

		$list_text = implode("\n\t\t", $list);
		
		return '
	<tr'.$titledesc.'>
		<td width="25%" nowrap="nowrap" valign="top">'.$title.'?</td>
		<td>
			'.$list_text.'
		</td>
	</tr>
';
	}
	
	function field_area($key)
	{
		extract( $this->options_form[$key] );
		$titledesc = $desc ? ' title="'.$desc.'"' : '';
		
		return '
	<tr'.$titledesc.'>
		<td width="25%" nowrap="nowrap" valign="top">'.$title.'</td>	
		<td>
		<textarea name="'.$key.'" cols="35" rows="5" 
			>'.$value.'</textarea>
		</td>
	</tr>
';
	}
	
	
	function field_text($key)
	{
		extract( $this->options_form[$key] );
		$titledesc = $desc ? ' title="'.$desc.'"' : '';
		$attr = (int)$size? 'size="'.(int)$size.'" ' : '';
		
		return '
	<tr'.$titledesc.'>
		<td width="25%" nowrap="nowrap" valign="top">'.$title.'</td>	
		<td>
			<input	type="text" name="'.$key.'" '.$attr.'
				value="'.$value.'"/>
		</td>
	</tr>
';
	}		
}
