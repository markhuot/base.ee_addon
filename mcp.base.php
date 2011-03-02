<?php

class Base_mcp {

	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function index()
	{
		return 'Hello World!';
	}
}