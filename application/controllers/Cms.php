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
                  if ($path[2] != "admin" && $this->session->uname == NULL)
                  {
                        header('Location: admin');
                        //$this->load->view('admin/admin');
                  }
		}

            /*Admin links*/
            public function getpagedetails()
            {
                  $data = array();
                  $data = $this->Cms_model->getpageinfo($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function updatelink()
            {
                  $data = array();
                  $data = $this->Cms_model->updatelinkdetails($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function removelink()
            {
                  $data = array();
                  $data = $this->Cms_model->deletelink($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function removepage()
            {
                  $data = array();
                  $data = $this->Cms_model->deletepage($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function addlink()
            {
                  $data = array();
                  $data = $this->Cms_model->addnewlink($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function links()
            {
                  $data['linklist'] = $this->getlinks();
                  $data['pagenames'] = $this->getpagenames();
                  $this->load->view('admin/links', $data);
            }

            public function getlinks()
            {
                  $link = '';
                  $linkdetails = array();
                  $linkdetails = $this->Cms_model->getlinkdetails();
                  foreach ($linkdetails->result() as $row)
                  {
                        $data = (array) $row;
                        $link .= $this->load->view('admin/linklist', $data, true);
                  }
                  return $link;
            }

            public function getpagenames()
            {
                  $page = '';
                  $pagename = array();
                  $pagename = $this->Cms_model->getpagenamelist();
                  foreach ($pagename->result() as $row) 
                  {
                        $data = (array) $row;
                        $page .= $this->load->view('admin/pagenamelist', $data, true);
                  }
                  return $page;
            }

            public function searchpage()
            {
                  $data = array();
                  $data = $this->Cms_model->filtersearchpage($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function pages()
            {
                  $data['page_list'] = $this->getpagelist();
                  $this->load->view('admin/pages', $data);
            }

            public function getpagelist()
            {
                  $pages = '';
                  $pagedetails = array();
                  $pagedetails = $this->Cms_model->getpages();
                  foreach ($pagedetails->result() as $row) 
                  {
                        $data = (array) $row;
                        $pages .= $this->load->view('admin/pagelist', $data, true);
                  }
                  return $pages;
            }

            public function addpage()
            {
                  $data = array();
                  $data = $this->Cms_model->addnewpage($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function searchpanel()
            {
                  $data = array();
                  $data = $this->Cms_model->getpanelinfo($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function getsections()
            {
                  $data = array();
                  $data = $this->Cms_model->getpanelsections($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function updatepanel()
            {
                  $data = array();
                  $data = $this->Cms_model->panelupdate($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function removepanel()
            {
                  $data = array();
                  $data = $this->Cms_model->deletepanel($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function getpanelcontent()
            {
                  $panel = array();
                  $data = $this->Cms_model->getcontentpanels($_POST);
                  $panel['decoded'] = html_entity_decode($data[0]->panel_content);
                  echo json_encode($panel);
                  exit;  
            }

            public function panels()
            {
                  $data['panel_list'] = $this->getpanellist();
                  $this->load->view('admin/panels', $data);
            }

            public function getpanellist()
            {
                  $panels = '';
                  $paneldetails = array();
                  $paneldetails = $this->Cms_model->getpanels();
                  foreach ($paneldetails->result() as $row) 
                  {
                        $data = (array) $row;
                        $panels .= $this->load->view('admin/panellist', $data, true);
                  }
                  return $panels;
            }

            public function addpanel()
            {
                  $data = array();
                  $data = $this->Cms_model->newaddpanel($_POST);
                  echo json_encode($data);
                  exit;
            }
            
            public function loaddata()
            {
                  $data = array();
                  $data = $this->Cms_model->getdataforchart($_POST);
                  echo json_encode($data);
                  exit;
            }

            public function removefile()
            {
                  $filebasis = array();
                  $filebasis = $this->Cms_model->deletefile($_POST);
                  echo json_encode($filebasis);
                  exit;
            }

            public function searchfile()
            {
                  $filedetails = array();
                  $filedetails = $this->Cms_model->getfiledetails($_POST);
                  echo json_encode($filedetails);
                  exit;
            }

            public function files()
            {
                  $data['file_list'] = $this->getfilelist();
                  $this->load->view('admin/files', $data);
            }

            public function getfilelist()
            {
                  $files = '';
                  $filedetails = array();
                  $filedetails = $this->Cms_model->getfiles();
                  foreach ($filedetails->result() as $row) 
                  {
                        $data = (array) $row;
                        $files .= $this->load->view('admin/filelist', $data, true);
                  }
                  return $files;
            }

            public function updatepost()
            {
                  $updatedetails = array();
                  $updatedetails = $this->Cms_model->setnewpostdetails($_POST);
                  echo json_encode($updatedetails);
                  exit;
            }

            public function uploadfile()
            {
                  $config['upload_path']          = './www/images/';
                  $config['allowed_types']        = 'gif|jpg|png';
                  $config['max_size']             = 1000;
                  $config['max_width']            = 2000;
                  $config['max_height']           = 2000;

                  $this->load->library('upload', $config);

                  if ( ! $this->upload->do_upload('userfile') || $_POST['filedesc'] == "")
                  {
                        $error = array('error' => "<div class='alert alert-warning errmess' role='alert'><center>Please upload a valid file...</center></div>");
                        $this->load->view('admin/addnewfile', $error);
                  }
                  else
                  {
                        $success = array('error' => "<div class='alert alert-success errmess' role='alert'><center>Successfully uploaded.</center></div>");
                        $this->load->view('admin/addnewfile', $success);
                        $upload = array();
                        $upload = $this->Cms_model->uploadnewfile($_POST);
                  }
            }

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
                  $data['upload_list'] = $this->getuploadedfiles();
                  $this->load->view('admin/dashboard', $data);
            }

            public function getuploadedfiles()
            {
                  $list = '';
                  $files = array();
                  $files = $this->Cms_model->getfilesuploaded();
                  foreach ($files->result() as $row) 
                  {
                        $data = (array) $row;
                        $list .= $this->load->view('admin/filelistuploaded', $data, true);
                  }
                  return $list;
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
                  $uname = $this->session->uname;
                  var_dump($uname);
                  exit;
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
      		$this->load->view('admin/settings');
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

            public function addnewpage()
            {
                  $this->load->view('admin/addnewpage');
            }

            public function addnewpanel()
            {
                  $this->load->view('admin/addnewpanel');
            }

            public function addnewfile()
            {
                  $this->load->view('admin/addnewfile', array("error"=>''));
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