<?php

class Base_tab
{
	
	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function publish_tabs($channel_id, $entry_id='')
	{
		$settings = array();
		$this->EE->lang->loadfile('base');
		
		$settings[] = array(
			'field_id'             => 'unique_string_id',
			'field_label'          => 'Field Label',
			'field_required'       => 'n',
			'field_data'           => null,
			'field_list_items'     => null,
			'field_fmt'            => '',
			'field_instructions'   => 'Instructions in here',
			'field_show_fmt'       => 'n',
			'field_pre_populate'   => 'n',
			'field_text_direction' => 'ltr',
			'field_type'           => 'text',
			'field_maxl'           => 1024
		);
		
		return $settings;
	}
	
	function validate_publish($params)
	{
		return FALSE;
	}
	
	function publish_data_db($params)
	{
		
	}

	function publish_data_delete_db($params)
	{
		
	}
	
}