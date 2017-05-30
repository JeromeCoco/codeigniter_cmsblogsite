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
      $this->load->view('users/index');
    }

    public function bloglist()
    {
      $this->load->view('users/bloglist');
    }
  }
?>