<?php

class Base
{
	
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function entries()
	{
		$original_view_path = $this->EE->load->_ci_view_path;
		$this->EE->load->_ci_view_path = PATH_THIRD.'base/views/';
		
		// $this->EE->load->view();
		
		$this->EE->load->_ci_view_path = $original_view_path;
	}
	
}