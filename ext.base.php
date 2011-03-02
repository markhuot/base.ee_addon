<?php

class Base_ext
{
	
	public $name = 'Base, by Mark Huot';
	public $version = '1.0.0';
	public $description = 'Base EE Add-On.';
	public $settings_exist = 'n';
	public $docs_url = 'http://docs.markhuot.com/';
	public $settings = array();
	
	public function __construct($settings='')
	{
		$this->EE =& get_instance();
		$this->settings = $settings;
	}
	
	public function sessions_start()
	{
	
	}
	
	public function activate_extension()
	{
		$this->settings = array(
			/*'max_link_length'	=> 18,
			'truncate_cp_links'	=> 'no',
			'use_in_forum'		=> 'no'*/
		);
		
		
		$hooks = array(
			array(
				'class'		=> __CLASS__,
				'method'	=> 'sessions_start',
				'hook'		=> 'sessions_start',
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
	
	public function update_extension($current = '')
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
	
	public function disable_extension()
	{
		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->delete('extensions');
	}
	
}