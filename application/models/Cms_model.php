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
    	$sql = "INSERT INTO tbl_posts(author_name, post_title, post_content, date_posted, time_posted, post_status, post_url) VALUES(?, ?, ?, ?, ?, ?, ?)";
    	$realdate = date($dates);
    	$realtime = date($times);
    	$tagcontent = htmlentities($content);
        $url = str_replace(" ", "-", $title);
    	$this->pdo->query($sql, array($author, $title, $tagcontent, $realdate, $realtime, $stat, $url));
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

        $selek = $this->pdo->query("SELECT * FROM tbl_panels ");
        
        $panelinfo['query'] = $selek->result();
        $panelinfo['sections'] = $panels;
        return $panelinfo;
    }

    public function getpanelinfo($data)
    {
        extract($data);
        $selek = $this->pdo->query("SELECT id, panel_name FROM tbl_panels WHERE panel_name LIKE '%$txtsearch%' ");
        return $selek->result();
    }

    public function addnewpage($data)
    {
        extract($data);

        $insertpage = "INSERT INTO tbl_pages(page_name, page_title, page_desc, page_keywords) VALUES(?, ?, ?, ?)";
        $this->pdo->query($insertpage, array($pagename, $pagetitle, $pagedesc, $pagekeywords));

        $pagenum = $this->pdo->query("SELECT id FROM tbl_pages ORDER BY id DESC LIMIT 1");
        $result = $pagenum->result();
        $lastpage = $result[0]->id;
        $current = $lastpage++;

        $css = json_decode($csslists, true);
        $js = json_decode($jslists, true);
        $sections = json_decode($listpanels, true);

        $cssorder = 0;
        $jsorder = 0;

        for ($i = 0; $i < count($css); $i++)
        {
            $cssorder++;
            $insertcss = "INSERT INTO tbl_page_css(page_id, css_order, css_name) VALUES(?, ?, ?)";
            $this->pdo->query($insertcss, array($current, $cssorder, $css[$i]));
        }

        for ($j = 0; $j < count($js); $j++)
        {
            $jsorder++;
            $insertjs = "INSERT INTO tbl_page_js(page_id, js_order, js_name) VALUES(?, ?, ?)";
            $this->pdo->query($insertjs, array($current, $jsorder, $js[$j]));
        }

        for ($k = 0; $k < count($sections); $k++)
        {
            $insertsections = "INSERT INTO tbl_sections(page_id, section_label, panel_id, layout) VALUES(?, ?, ?, ?)";
            $this->pdo->query($insertsections, array($current, $sections[$k]['panel'], $sections[$k]['panel_id'], $layoutname));
        }
    }

    public function getpages()
    {
        $selek = $this->pdo->query("SELECT * FROM tbl_pages");
        return $selek;
    }

    public function filtersearchpage($data)
    {
        extract($data);
        $selek = $this->pdo->query("SELECT id, page_name FROM tbl_pages WHERE page_name LIKE '%$txtsearch%' ");
        return $selek->result();
    }

    public function getpagenamelist()
    {
        $selek = $this->pdo->query("SELECT id, page_name FROM tbl_pages");
        return $selek;
    }

    public function addnewlink($data)
    {
        extract($data);
        $sql = "INSERT INTO tbl_links(link_name, page_id, page_url) VALUES(?, ?, ?)";
        $this->pdo->query($sql, array($linkname, $pageid, $urlname));
        return $data;
    }

    public function getlinkdetails()
    {
        $selek = $this->pdo->query("SELECT * FROM tbl_links");
        return $selek;
    }

    public function deletepage($data)
    {
        extract($data);
        $deletepage = "DELETE FROM tbl_pages WHERE id = ?";
        $deletelinks = "DELETE FROM tbl_links WHERE page_id = ?";
        $deletecss = "DELETE FROM tbl_page_css WHERE page_id = ?";
        $deletejs = "DELETE FROM tbl_page_js WHERE page_id = ?";
        $deletesections = "DELETE FROM tbl_sections WHERE page_id = ?";
        $this->pdo->query($deletepage, array($id));
        $this->pdo->query($deletelinks, array($id));
        $this->pdo->query($deletecss, array($id));
        $this->pdo->query($deletejs, array($id));
        $this->pdo->query($deletesections, array($id));
        return true;
    }

    public function deletelink($data)
    {
        extract($data);
        $deletelink = "DELETE FROM tbl_links WHERE id = ?";
        $this->pdo->query($deletelink, array($id));
    }

    public function updatelinkdetails($data)
    {
        extract($data);
        $sql = "UPDATE tbl_links SET link_name = ?, page_url = ? WHERE id = ?";
        $this->pdo->query($sql, array($linknameedit, $urlnameedit, $linkid));
        return $data;
    }

    public function getpageinfo($data)
    {
        extract($data);
        $selekpage = $this->pdo->query("SELECT * FROM tbl_pages WHERE id = '$id' ");
        $selekcss = $this->pdo->query("SELECT css_order, css_name FROM tbl_page_css WHERE page_id = '$id' ");
        $selekjs = $this->pdo->query("SELECT js_order, js_name FROM tbl_page_js WHERE page_id = '$id' ");
        $seleklayout = $this->pdo->query("SELECT ts.page_id, ts.section_label, ts.panel_id, tp.panel_name, ts.layout FROM tbl_sections AS ts INNER JOIN tbl_panels AS tp ON ts.panel_id = tp.id WHERE ts.page_id = '$id' ");
        $selekpanels = $this->pdo->query("SELECT id, panel_name FROM tbl_panels");
        $page['info'] = $selekpage->result();
        $page['css'] = $selekcss->result();
        $page['js'] = $selekjs->result();
        $page['layout'] = $seleklayout->result();
        $page['panels'] = $selekpanels->result();
        return $page;
    }

    public function editpageinfo($data)
    {
        extract($data);
        $newpanels = json_decode($listpanel, true);
        $cssorder = 0;
        $jsorder = 0;
        $newcss = json_decode($listofcss, true);
        $newjs = json_decode($listofjs, true);
       
        $updatepages = "UPDATE tbl_pages SET page_name = ?, page_title = ?, page_desc = ?, page_keywords = ? WHERE id = ?";
        $this->pdo->query($updatepages, array($pagename, $pagetitle, $pagedesc, $pagekeywords, $pageid));
        $delcss = "DELETE FROM tbl_page_css WHERE page_id = ?";
        $this->pdo->query($delcss, array($pageid));
        $deljs = "DELETE FROM tbl_page_js WHERE page_id = ?";
        $this->pdo->query($deljs, array($pageid));
        $delsec = "DELETE FROM tbl_sections WHERE page_id = ?";
        $this->pdo->query($delsec, array($pageid));

        for ($i = 0; $i < count($newcss); $i++)
        { 
            $cssorder++;
            $insertnewcss = "INSERT INTO tbl_page_css(page_id, css_order, css_name) VALUES(?, ?, ?)";
            $this->pdo->query($insertnewcss, array($pageid, $cssorder, $newcss[$i]));
        } 
        
        for ($j = 0; $j < count($newjs); $j++)
        { 
            $jsorder++;
            $insertnewjs = "INSERT INTO tbl_page_js(page_id, js_order, js_name) VALUES(?, ?, ?)";
            $this->pdo->query($insertnewjs, array($pageid, $jsorder, $newjs[$j]));
        }
        
        $panelbase = array();
        for ($k = 0; $k < count($newpanels); $k++)
        { 
            $name = $newpanels[$k]['panel_name'];
            $selek = $this->pdo->query("SELECT id FROM tbl_panels WHERE panel_name = '$name' ");
            $row = $selek->result();
            $panel = array($newpanels[$k]['panel_name']=>$row[0]->id);
            array_push($panelbase, $panel);
        }

        for ($l = 0; $l < count($newpanels); $l++)
        { 
            $panelid = $panelbase[$l][$newpanels[$l]['panel_name']];
            $insertnewsections = "INSERT INTO tbl_sections(page_id, section_label, panel_id, layout) VALUES(?, ?, ?, ?)";
            $this->pdo->query($insertnewsections, array($pageid, $newpanels[$l]['section'], $panelid, $layoutname));
        }
    }

    public function getpagenamelistlimit()
    {
        $selek = $this->pdo->query("SELECT id, page_name FROM tbl_pages LIMIT 5");
        return $selek;
    }

    // Users

    public function getindexdetails($data)
    {
        $urlname = $data[0];
        $selekid = $this->pdo->query("SELECT page_id FROM tbl_links WHERE page_url = '$urlname' ");
        $resultid = $selekid->result();
        $id = $resultid[0]->page_id;
        $selekcss = $this->pdo->query("SELECT css_order, css_name FROM tbl_page_css WHERE page_id = '$id' ");
        $resultcss = $selekcss->result();
        $selekjs = $this->pdo->query("SELECT js_order, js_name FROM tbl_page_js WHERE page_id = '$id' ");
        $resultjs = $selekjs->result();
        $seleksectionandpanel = $this->pdo->query("SELECT ts.page_id , ts.section_label AS section_name, ts.panel_id, tp.id, tp.panel_content AS content FROM tbl_sections AS ts INNER JOIN tbl_panels AS tp ON ts.panel_id = tp.id WHERE ts.page_id = '$id' ");
        $resultsectionandpanel = $seleksectionandpanel->result();
       
        $content['css'] = $resultcss;
        $content['js'] = $resultjs;
        $content['sections'] = $resultsectionandpanel;
        return $content;
    }

    public function getblogsdetails($data)
    {
        $urlname = $data[0];

        $selekid = $this->pdo->query("SELECT page_id FROM tbl_links WHERE page_url = '$urlname' ");
        $resultid = $selekid->result();

        $id = $resultid[0]->page_id;
        $selekcss = $this->pdo->query("SELECT css_order, css_name FROM tbl_page_css WHERE page_id = '$id' ");
        $resultcss = $selekcss->result();

        $selekjs = $this->pdo->query("SELECT js_order, js_name FROM tbl_page_js WHERE page_id = '$id' ");
        $resultjs = $selekjs->result();

        $seleksectionandpanel = $this->pdo->query("SELECT ts.page_id , ts.section_label AS section_name, ts.panel_id, tp.id, tp.panel_content AS content FROM tbl_sections AS ts INNER JOIN tbl_panels AS tp ON ts.panel_id = tp.id WHERE ts.page_id = '$id' ");
        $resultsectionandpanel = $seleksectionandpanel->result();
       
        $content['css'] = $resultcss;
        $content['js'] = $resultjs;
        $content['sections'] = $resultsectionandpanel;
        return $content;
    }

    public function getpostlist()
    {
        $selek = $this->pdo->query("SELECT post_title, post_content, date_posted, time_posted, post_url FROM tbl_posts WHERE post_status = 'Immediate' ");
        return $selek;
    }

    public function getactivepost($data)
    {
        $urlname = $data[0];

        $resultcss = array('bootstrap.css', 'bootstrap.min.css', 'navbar.css', 'footer.css');
        $resultjs = array('jquery-3.1.1.min.js', 'bootstrap.js', 'bootstrap.min.js');

        $selekcss = $this->pdo->query("SELECT css_order, css_name FROM tbl_page_css WHERE css_name = 'bootstrap.css' OR css_name = 'bootstrap.min.css' OR css_name = 'navbar.css' OR css_name = 'footer.css' GROUP BY css_name");
        $resultcss = $selekcss->result();

        $selekjs = $this->pdo->query("SELECT js_order, js_name FROM tbl_page_js WHERE js_name = 'jquery-3.1.1.min.js' OR js_name = 'bootstrap.js' OR js_name = 'bootstrap.min.js' GROUP BY js_name");
        $resultjs = $selekjs->result();

        $selekpost = $this->pdo->query("SELECT id, author_name, post_title, post_content, date_posted, time_posted FROM tbl_posts WHERE post_url = '$urlname' ");
        $post = $selekpost->result();

        $seleknavbarfooter = $this->pdo->query("SELECT panel_content FROM tbl_panels WHERE panel_name = 'navbar' OR panel_name = 'footer' ");
        $navfoot = $seleknavbarfooter->result();

        $content['css'] = $resultcss;
        $content['js'] = $resultjs;
        $content['blogcontent'] = $post;
        $content['navfooter'] = $navfoot;

        return $content;
    }

    public function addnewcomment($data)
    {
        extract($data);
        $sql = "INSERT INTO tbl_comments(post_id, comment_author, comment_content) VALUES(?, ?, ?)";
        $this->pdo->query($sql, array($postid, $author, $comment));
        return $data;
    }

    public function getcomment($data)
    {
        $title = str_replace("-", " ", $data[0]);
        $selekid = $this->pdo->query("SELECT id FROM tbl_posts WHERE post_title = '$title' ");
        $resultid = $selekid->result();
        $id = $resultid[0]->id;

        $selekcomment = $this->pdo->query("SELECT comment_author, comment_content FROM tbl_comments WHERE post_id = '$id' ORDER BY id DESC ");
        return $selekcomment->result();
    }

    public function getcommentslist()
    {
        $seleks = $this->pdo->query("SELECT * FROM tbl_comments");
        return $seleks;
    }
  }
?>