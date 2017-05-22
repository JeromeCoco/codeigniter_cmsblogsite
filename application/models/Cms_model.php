<?php
  class Cms_model extends CI_Model
  {
  	private $pdo;

    public function __construct()
    {
      parent::__construct();
      $this->pdo = $this->load->database('pdo', true);
    }

    public function checkLogIn($data)
    {
    	extract($data);
    	$pass = hash('sha256', $pword);
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
    	$pass = hash('sha256', $current);
    	$selek = $this->pdo->query("SELECT password FROM tbl_users WHERE id = '$id' AND password = '$pass' ");
    	return $selek->result();
    }

    public function updatepasswithdetails($data)
    {
    	extract($data);
    	$newpass = hash('sha256', $pass);
    	$sql = "UPDATE tbl_users SET first_name = ?, last_name = ?, password = ?, email_address = ?, mobile_number = ? WHERE id = ?";
    	$this->pdo->query($sql, array($fname, $lname, $newpass, $emailadd, $contactnum, $id));
    	return $data;
    }

    public function addnewaccount($data)
    {
    	extract($data);
    	$pword = hash('sha256', $pass);
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
  }
?>