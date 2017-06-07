<?php
	class Official extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library("tools");
			$this->load->helper('url');
	        $this->load->model('Cms_model');
		}

		public function index()
        {
            $urlname = $GLOBALS['params'];
             
            $data = array();
            $data = $this->Cms_model->getindexdetails($urlname);
       
            $css = '';
            foreach ($data["css"] as $row)
            {
                $style = (array) $row;
                $css .= $this->load->view('users/cssBuilder', $style, true);
            }
       
            $js = '';
            foreach ($data["js"] as $row)
            {
                $script = (array) $row;
                $js .= $this->load->view('users/scriptBuilder', $script, true);
            }
       
            
            $content = array(
                "Header" => $css.$js,
                "Navbar" => $data["sections"][0]->content,
                "About" => $data["sections"][1]->content,
                "Location" => $data["sections"][2]->content,
                "Contact" => $data["sections"][3]->content,
                "Footer" => $data["sections"][4]->content
            );

            $data = array();
            $views = $this->load->view('users/index', array(), true);
            $data = $this->tools->LoadViewParser($views, $content, true);
            echo html_entity_decode($data);
            exit;
      	}
	}
?>