<?php
	class Cms extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
                  $this->load->helper('form');
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

            /*Admin links*/
            public function filtersearchpost()
            {
                  $postsearch = array();
                  $postsearch = $this->Cms_model->searchpost($_POST);
                  echo json_encode($postsearch);
                  exit;
            }

            public function dashboard()
            {
                  $data['recent_posts'] = $this->getrecentpostlist();
                  $this->load->view('admin/dashboard', $data);
                  
                  //var_dump($GLOBALS['params']);
            }

            public function getrecentpostlist()
            {
                  $list = '';
                  $postdetails = array();
                  $postdetails = $this->Cms_model->getrecentpost();
                  foreach ($postdetails->result() as $row) 
                  {
                        $data = (array) $row;
                        $list .= $this->load->view('admin/recentposts', $data, true);
                  }
                  return $list;
            }

            public function retrievecontent()
            {
                  $data = array();
                  $post = $this->Cms_model->viewpost($_POST);
                  $data['decoded'] = html_entity_decode($post[0]->post_content);
                  echo json_encode($data);
                  exit;
            }

            public function removepost()
            {
                  $removebasis = array();
                  $removebasis = $this->Cms_model->postremove($_POST);
                  echo json_encode($removebasis);
                  exit;  
            }

            public function posts()
            {
                  $data['post_list'] = $this->retrievepost();
                  $this->load->view('admin/posts', $data);
            }

            public function retrievepost()
            {
                  $list = '';
                  $postdetails = array();
                  $postdetails = $this->Cms_model->displaypost();
                  foreach ($postdetails->result() as $row) 
                  {
                        $data = (array) $row;
                        $list .= $this->load->view('admin/postlist', $data, true);
                  }
                  return $list;
            }
            
            public function removesession()
            {
                  $this->session->unset_userdata("uname");
            }

            public function retrievesession()
            {
                  $sess = array();
                  $sess = $this->session->all_userdata();
                  echo json_encode($sess);
                  exit;
            }

            public function newpost()
            {
                  $post = array();
                  $post = $this->Cms_model->addpost($_POST);
                  echo json_encode($post);
                  exit; 
            }

            public function loaddatetime()
            {
                  $datetime = array();
                  $datetime = $this->Cms_model->loadtimedate($_POST);
                  echo json_encode($datetime);
                  exit; 
            }

            public function addnewuseraccount()
            {
                  $newuser = array();
                  $newuser = $this->Cms_model->addnewaccount($_POST);
                  echo json_encode($newuser);
                  exit;
            }

            public function updatepasswordwithcred()
            {
                  $detailswithpass = array();
                  $detailswithpass = $this->Cms_model->updatepasswithdetails($_POST);
                  echo json_encode($detailswithpass);
                  exit;
            }

            public function checkcurrentpass()
            {
                  $currPass = array();
                  $currPass = $this->Cms_model->checkpass($_POST);
                  echo json_encode($currPass);
                  exit;
            }

            public function updateuserdetails()
            {
                  $details = array();
                  $details = $this->Cms_model->updatedetails($_POST);
                  echo json_encode($details);
                  exit;
            }

            public function loaduser()
            {
                  $user = array();
                  $user = $this->Cms_model->getuserdetails();
                  echo json_encode($user);
                  exit;
            }

            public function updatesettingschanges()
            {
                  $changes = array();
                  $changes = $this->Cms_model->updatesettings($_POST);
                  echo json_encode($changes);
                  exit;
            }

            public function passtimeformat()
            {
                  $timefrmt = array();
                  $timefrmt = $this->Cms_model->loadtime($_POST);
                  echo json_encode($timefrmt);
                  exit;
            }

            public function passdateformat()
            {
                  $datefrmt = array();
                  $datefrmt = $this->Cms_model->loaddate($_POST);
                  echo json_encode($datefrmt);
                  exit;
            }

		public function loadsettings()
		{
      		$this->load->view('admin/admin');
                  $settings = array();
                  $settings = $this->Cms_model->loadset();
                  echo json_encode($settings);
                  exit;
      	}

            public function admin()
            {
                  $this->load->view('admin/admin');
            }

            public function addnewpost()
            {
                  $this->load->view('admin/addnewpost');
            }

            public function comments()
            {
                  $this->load->view('admin/comments');
            }

            public function blogs(){
                  var_dump($GLOBALS['params']);
            }

            public function pages()
            {
                  $this->load->view('admin/pages');
            }

            public function addnewpage()
            {
                  $this->load->view('admin/addnewpage');
            }

            public function panels()
            {
                  $this->load->view('admin/panels');
            }

            public function links()
            {
                  $this->load->view('admin/links');
            }

            public function addnewpanel()
            {
                  $this->load->view('admin/addnewpanel');
            }

            public function files()
            {
                  $this->load->view('admin/files');
            }

            public function addnewfile()
            {
                  $this->load->view('admin/addnewfile');
            }

            public function settings()
            {
                  $this->load->view('admin/settings');
            }

            public function accounts()
            {
                  $this->load->view('admin/accounts');
            }

            public function addnewuser()
            {
                  $this->load->view('admin/addnewuser');
            }

            public function login()
            {
                  $cred = array();
                  $cred = $this->Cms_model->checkLogIn($_POST);
                  foreach($cred as $data)
                  {
                        $row = (array) $data;
                        $this->session->set_userdata('uname', $row["username"]);
                  }
                  echo json_encode($cred);
                  exit;
            }
   	}
?>