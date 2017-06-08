<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Tools
	{
		public function __construct()
	    {
	         $this->ci =& get_instance(); 
	    }

	    public function LoadViewParser($view, $data)
	    {
	    	foreach ($data as $key => $val)
	    	{
	    		$section = "{".$key."}";
	    		$view = str_replace($section, $val, $view);
	    	}
	    	return $view;
	    }
	}
?>