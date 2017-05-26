<?php
    class Main extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('Cms_model');

            $path = explode("/", $_SERVER['PATH_INFO']);
            if ($path[2] != "admin" && $this->session->uname == null)
            {
                  header('Location: admin');      
            }
        }

      /*User links*/
      public function index()
      {
            $this->load->view('index');
      }
    }
?>