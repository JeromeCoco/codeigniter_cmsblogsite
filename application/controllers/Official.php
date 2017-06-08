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

        public function blogs()
        {
            $urlname = $GLOBALS['params'];
            $data = array();
            if ($urlname[0] == "list")
            {
                $data = $this->Cms_model->getblogsdetails($urlname);

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
                    "Footer" => $data["sections"][1]->content
                );

                $data = array();
                $blogs['bloglisting'] = $this->getpostlist();
                $views = $this->load->view('users/blogs', $blogs, true);
                $data = $this->tools->LoadViewParser($views, $content, true);
                echo html_entity_decode($data);
                exit;
            }
            else
            {
                $data = $this->Cms_model->getactivepost($urlname);

                $js = '';
                foreach ($data["js"] as $row)
                {
                    $script = (array) $row;
                    $js .= $this->load->view('users/scriptBuilder', $script, true);
                }

                $css = '';
                foreach ($data["css"] as $row)
                {
                    $style = (array) $row;
                    $css .= $this->load->view('users/cssBuilder', $style, true);
                }
                
                $content = array(
                    "Header" => $css.$js,
                    "Navbar" => $data['navfooter'][0]->panel_content,
                    "Footer" => ''
                );

                //var_dump();
                $parse = array();
                
                
                $conts['title'] = $data["blogcontent"][0]->post_title;
                $conts['date'] = $data["blogcontent"][0]->date_posted;
                $conts['time'] = $data["blogcontent"][0]->time_posted;
                $conts['content'] = $data['blogcontent'][0]->post_content;
                $conts['author'] = $data["blogcontent"][0]->author_name;
                $views = $this->load->view('users/blogs', $conts , true);
                $parse = $this->tools->LoadViewParser($views, $content, true);

                echo html_entity_decode($parse);
                exit;
            }
        }

        public function getpostlist()
        {
            $post = '';
            $postdetails = array();
            $postdetails = $this->Cms_model->getpostlist();
            foreach ($postdetails->result() as $row)
            {
                $data = (array) $row;
                $post .= $this->load->view('users/postlist', $data, true);
            }
            return $post;
        }
	}
?>