<?php

class Mh_admission_ext
{
	
	var $name = 'Admission, by Mark Huot';
	var $version = '1.0.0';
	var $description = 'Admission hooks for the login action.';
	var $settings_exist = 'n';
	var $docs_url = 'http://docs.markhuot.com/';
	var $settings = array();
	
	function __construct($settings='')
	{
		$this->EE =& get_instance();
		$this->settings = $settings;
	}
	
	function activate_extension()
	{
		$this->settings = array(
			/*'max_link_length'	=> 18,
			'truncate_cp_links'	=> 'no',
			'use_in_forum'		=> 'no'*/
		);
		
		
		$hooks = array(
			array(
				'class'		=> __CLASS__,
				'method'	=> 'member_member_register_start',
				'hook'		=> 'member_member_register_start',
				'settings'	=> serialize($this->settings),
				'priority'	=> 10,
				'version'	=> $this->version,
				'enabled'	=> 'y'
			),
			array(
				'class'		=> __CLASS__,
				'method'	=> 'user_register_start',
				'hook'		=> 'user_register_start',
				'settings'	=> serialize($this->settings),
				'priority'	=> 10,
				'version'	=> $this->version,
				'enabled'	=> 'y'
			)
		);
		
		foreach ($hooks as $hook)
		{
			$this->EE->db->insert('extensions', $hook);
		}
	}
	
	function update_extension($current = '')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}
		
		if ($current < '2.0')
		{
			// Update to version 2.0
		}
		
		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->update('extensions', array('version' => $this->version));
	}
	
	function disable_extension()
	{
		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->delete('extensions');
	}
	
}