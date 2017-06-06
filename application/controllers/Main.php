<?php
  class Main extends CI_Controller
  {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Cms_model');
    }

    /*User links*/
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
 
       $headercomp = array(
           "css" => $css,
           "js" => $js
       );
 
       $index = array(
         "head" => $this->load->view('users/headerBuilder', $headercomp, true)
       );
 
       echo $this->load->view('users/index', $index, true);
       exit;
    }

    public function bloglist()
    {
      $this->load->view('users/bloglist');
    }

  }
?>