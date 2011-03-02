<?php

class Base_mcp {

	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function index()
	{
		$this->EE->cp->set_variable('cp_page_title', $this->EE->lang->line('base'));
		
		$this->EE->cp->set_breadcrumb(
			BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=base',
			$this->EE->lang->line('base_module_name')
		);
		
		$this->EE->cp->set_right_nav(array(
			'add_record' => BASE.AMP.
			                'C=addons_modules'.AMP.
			                'M=show_module_cp'.AMP.
			                'module=base'.AMP.
			                'method=add_record'
		));
		
		return 'Hello World!';
	}
}