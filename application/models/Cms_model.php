<?php
  class Cms_model extends CI_Model
  {
  	private $pdo;

    public function __construct()
    {
      parent::__construct();
      $this->pdo = $this->load->database('pdo', true);
    }

    // Admin
    public function checkLogIn($data)
    {
    	extract($data);
    	$pass = hash('md5', $pword);
    	$selek = $this->pdo->query("SELECT * FROM tbl_users WHERE username = '$uname' AND password = '$pass' ");
    	return $selek->result();
    }

    public function loadset()
    {
    	$selek = $this->pdo->query("SELECT * FROM tbl_settings");
    	return $selek->result();
    }
    
    public function loaddate($data)
    {
    	extract($data);
    	$dates = date($dateformat);
    	return $dates;
    }

    public function loadtime($data)
    {
    	extract($data);
    	$times = date($timeformat);
    	return $times;
    }

    public function updatesettings($data)
    {
    	extract($data);
    	$sql = "UPDATE tbl_settings SET site_title = ?, site_tagline = ?, email_address = ?, date_format = ?, time_format = ?, date_format_custom = ?, time_format_custom = ?";
      	$this->pdo->query($sql, array($sitename, $tagline, $emailadd, $finaldate, $finaltime, $datecustom, $timecustom));
      	return $data;
    }

    public function getuserdetails()
    {
    	$selek = $this->pdo->query("SELECT * FROM tbl_users");
    	return $selek->result();
    }

    public function updatedetails($data)
    {
    	extract($data);
    	$sql = "UPDATE tbl_users SET first_name = ?, last_name = ?, email_address = ?, mobile_number = ? WHERE id = ?";
      	$this->pdo->query($sql, array($fname, $lname, $emailadd, $contactnum, $id));
      	return $data;
    }

    public function checkpass($data)
    {
    	extract($data);
    	$pass = hash('md5', $current);
    	$selek = $this->pdo->query("SELECT password FROM tbl_users WHERE id = '$id' AND password = '$pass' ");
    	return $selek->result();
    }

    public function updatepasswithdetails($data)
    {
    	extract($data);
    	$newpass = hash('md5', $pass);
    	$sql = "UPDATE tbl_users SET first_name = ?, last_name = ?, password = ?, email_address = ?, mobile_number = ? WHERE id = ?";
    	$this->pdo->query($sql, array($fname, $lname, $newpass, $emailadd, $contactnum, $id));
    	return $data;
    }

    public function addnewaccount($data)
    {
    	extract($data);
    	$pword = hash('md5', $pass);
    	$realdate = date($date);
    	$realtime = date($time);
    	$sql = "INSERT INTO tbl_users(username, first_name, last_name, password, user_type, date_registered, time_registered, email_address, mobile_number) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    	$this->pdo->query($sql, array($uname, $fname, $lname, $pword, $role, $realdate, $realtime, $emailadd, $contactnum));
    	return $data;
    }

    public function loadtimedate()
    {
    	$selek = $this->pdo->query("SELECT date_format, time_format FROM tbl_settings");
    	return $selek->result();
    }

    public function addpost($data)
    {
    	extract($data);
    	$sql = "INSERT INTO tbl_posts(author_name, post_title, post_content, date_posted, time_posted, post_status) VALUES(?, ?, ?, ?, ?, ?)";
    	$realdate = date($dates);
    	$realtime = date($times);
    	$tagcontent = htmlentities($content);
    	$this->pdo->query($sql, array($author, $title, $tagcontent, $realdate, $realtime, $stat));
    	return $data;
    }

    public function displaypost()
    {
    	$selek = $this->pdo->query("SELECT id, author_name, post_title, date_posted, post_status FROM tbl_posts ORDER BY id DESC");
    	return $selek;
    }

    public function postremove($data)
    {
    	extract($data);
      	$sql = "DELETE FROM tbl_posts WHERE id = ?";
      	$this->pdo->query($sql, array($id));
      	return true;
    }

    public function viewpost($data)
    {
    	extract($data);
    	$selek = $this->pdo->query("SELECT post_content FROM tbl_posts WHERE id = '$id' ");
    	return $selek->result();
    }

    public function getrecentpost()
    {
        $selek = $this->pdo->query("SELECT post_title, date_posted, post_content FROM tbl_posts WHERE post_status = 'Immediate' ORDER BY id DESC LIMIT 3");
        return $selek;
    }

    public function searchpost($data)
    {
        extract($data);
        $selek = $this->pdo->query("SELECT id, author_name, post_title, date_posted, post_status FROM tbl_posts WHERE $searchcategory LIKE '%$tosearch%' ");
        return $selek->result();
    }

    public function uploadnewfile($data)
    {
        extract($data);
        $sql = "INSERT INTO tbl_files(author, file_name, file_desc, file_date_uploaded, file_time_uploaded) VALUES(?, ?, ?, ?, ?)";
        $realdate = date($date);
        $realtime = date($time);
        $this->pdo->query($sql, array($author, $filename, $filedesc, $realdate, $realtime));
    }

    public function setnewpostdetails($data)
    {
        extract($data);
        $contentnewencode = htmlentities($content);
        $sql = "UPDATE tbl_posts SET post_title = ?, post_content = ?, post_status = ? WHERE id = ?";
        $this->pdo->query($sql, array($title, $contentnewencode, $status, $id));
        return $data;
    }

    public function getfiles()
    {
        $selek = $this->pdo->query("SELECT id, file_name, file_desc, file_date_uploaded FROM tbl_files");
        return $selek;
    }

    public function getfiledetails($data)
    {
        extract($data);
        $selek = $this->pdo->query("SELECT id, file_name, file_desc, file_date_uploaded FROM tbl_files WHERE $searchcategory LIKE '%$searchtext%' ");
        return $selek->result();
    }

    public function deletefile($data)
    {
        extract($data);
        $sql = "DELETE FROM tbl_files WHERE id = ?";
        $this->pdo->query($sql, array($id));
        return true;
    }

    public function getdataforchart()
    {
        $selek = $this->pdo->query("SELECT (SELECT COUNT(id) FROM tbl_posts) AS posts, (SELECT COUNT(id) FROM tbl_comments) AS comments, (SELECT COUNT(id) FROM tbl_users) AS users ");
        return $selek->result();
    }

    public function getfilesuploaded()
    {
        $selek = $this->pdo->query("SELECT file_name, file_date_uploaded FROM tbl_files LIMIT 5");
        return $selek;
    }

    public function newaddpanel($data)
    {
        extract($data);
        $content = htmlentities($mytextarea);
        $sql = "INSERT INTO tbl_panels(panel_name, panel_content) VALUES(?, ?)";
        $this->pdo->query($sql, array($panelname, $content));
    }

    public function getpanels()
    {
        $selek = $this->pdo->query("SELECT * FROM tbl_panels");
        return $selek;
    }

    public function getcontentpanels($data)
    {
        extract($data);
        $selek = $this->pdo->query("SELECT panel_content FROM tbl_panels WHERE id = '$id' ");
        return $selek->result();
    }

    public function deletepanel($data)
    {
        extract($data);
        $sql = "DELETE FROM tbl_panels WHERE id = ?";
        $this->pdo->query($sql, array($id));
        return true;
    }

    public function panelupdate($data)
    {
        extract($data);
        $encodecontent = htmlentities($content);
        $sql = "UPDATE tbl_panels SET panel_name = ?, panel_content = ? WHERE id = ?";
        $this->pdo->query($sql, array($name, $encodecontent, $id));
        return $data;
    }

    public function getpanelsections($data)
    {
        extract($data);
        $layout = FCPATH."application/views/users/".$layout;
        $html = file_get_contents($layout);
        $panels = array();
        $pattern = "/{(.*)}(.*){\\/\\1}/s";
        $match_count = preg_match_all($pattern, $html, $matches);
        if($match_count)
        {
            for($ctr = 0; $ctr < $match_count; $ctr++)
            {
                // $matches[0] full pattern matches
                // $matches[1] subpattern name
                // $matches[2] sub-view
                $sub_key = $matches[0][$ctr];
                $sub_tag = $matches[1][$ctr];
                $sub_view = $matches[2][$ctr];

                $panels[] = array('name' => $sub_tag);

                $html = str_replace($sub_key, "", $html);
            }
        }
        $pattern = "/{(.*)}/";
        $match_count = preg_match_all($pattern, $html, $matches);
        if($match_count)
        {
            for($ctr = 0; $ctr < $match_count; $ctr++)
            {
                // $matches[0] full pattern matches
                // $matches[1] subpattern name
                // $matches[2] sub-view
                $sub_key = $matches[0][$ctr];
                $sub_tag = $matches[1][$ctr];

                $panels[] = array('section' => $sub_tag);
            }
        }

        $selek = $this->pdo->query("SELECT panel_name FROM tbl_panels ");
        
        $panelinfo['query'] = $selek->result();
        $panelinfo['sections'] = $panels;
        return $panelinfo;
    }
    // Users
  }
?>