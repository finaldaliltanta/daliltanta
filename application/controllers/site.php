<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class site extends CI_Controller {

    public function index() {

        $this->start();
    }

    function start() {

        $data1 = $this->home_page();
        $this->load->view('index', $data1);
    }

    ////////////////////////////////////

    function home_page() {

        $data1 = $this->templete();
        // photo for last add 
        $slider_last_add = $this->slider_model->last_adv_add();
        if ($slider_last_add->num_rows() > 0) {
            $data1['slider1_pics'] = $slider_last_add->result();
        }
        // photo for 3 adv top 
        $slider_last_add_top = $this->slider_model->last_adv_add_top();
        if ($slider_last_add_top->num_rows() > 0) {
            $data1['slider1_pics_top'] = $slider_last_add_top->result();
        }

        // photo for max views 
        $last_views = $this->slider_model->select_last_views();
        if ($last_views != false) {
            $data1['last_views'] = $last_views;
        }

        return $data1;
    }

    function templete() {
        $data1 = array();
        $this->load->model('slider_model');
        $this->load->model('golden');
        $this->load->model('adv');
        $slider_pics = $this->slider_model->load_img();
        if ($slider_pics->num_rows() > 0)
            $data1['big_pics'] = $slider_pics->result();
        $this->load->model('dept');
        $data1['result'] = $this->dept->showAll_deptANDsub();

        // data of login  customer 
        if ($this->session->userdata('logged_custmer')) {
            $id = $this->session->userdata('user_id');
            $data1['logged_error2'] = false;
            $data1['user'] = $id;
        } else {
            $data1['user'] = false;
            if ($this->session->flashdata('logged_error2'))
                $data1['logged_error2'] = true;
        }

        return $data1;
    }

    ///////////////////////////////////////

    public function login() {
        $this->load->view('view_login');
    }

    public function load_admin() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('civou/view_admin');
        } else {
            $this->load->view('view_login');
        }
    }

    function enter($s) {
        echo $s;
    }

    function load_whoAre() {
        $data1 = $this->templete();
        $this->load->view('view_whoAre', $data1);
    }

    ///////////////////////////////////////

    function showBySubId() {

        if ($this->uri->segment(3) != '') {
            // data on home page
            $data1 = $this->templete();
            // load adv data  
            $this->load->model('adv');
            $adv_id = mysql_escape_string($this->uri->segment(3));
            $data1['golden'] = $this->adv->showAllBySubDeptID($adv_id, 'g');
            $data1['sliver'] = $this->adv->showAllBySubDeptID($adv_id, 's');
            $data1['normal'] = $this->adv->showAllBySubDeptID($adv_id, 'n');
            $this->load->view('index_1', $data1);
        } else {
            $data = $this->templete();

            $this->load->view('view_error', $data);
        }
    }

////////////////////////////////////////////////
    function showByDeptId() {

        if ($this->uri->segment(3) != '') {
            // data on home page 
            $data1 = $this->templete();
            //// load adv data  
            $this->load->model('adv');
            $dept_id = mysql_escape_string($this->uri->segment(3));
            $data1['golden'] = $this->adv->showAllByDeptID($dept_id, 'g');
            $data1['sliver'] = $this->adv->showAllByDeptID($dept_id, 's');
            $data1['normal'] = $this->adv->showAllByDeptID($dept_id, 'n');
            $this->load->view('index_1', $data1);
        } else {
            $data = $this->templete();
            $this->load->view('view_error', $data);
        }
    }

    /////////////////////////////////////////

    function showGoldenAdvDetail() {
        if ($this->uri->segment(3) != '') {
            // data on home page 
            $data1 = $this->templete();
            // load adv data  

            $adv_id = mysql_escape_string($this->uri->segment(3));
            $data1['res'] = $this->golden->selectAllFromGolden($adv_id);

            // load adv photo 

            $z = $this->adv->selectLevel2PhotoById($adv_id);
            $this->adv->incremetAdv($adv_id);
            $phot = array();
            foreach ($z as $value) {
                $phot[] = array('url' => base_url() . "public/original/" . $value->name
                );
            }
            $data1['photo'] = $phot;

            // load adv gallery 

            $z2 = $this->golden->selectGalleryPhotoByID($adv_id);
            $ga = array();
            foreach ($z2 as $value) {
                $ga[] = array('url_ga' => base_url() . "public/golden/" . $value->name,
                    'th_url' => base_url() . "public/golden/thumbs/" . $value->name
                );
            }
            $data1['gallery'] = $ga;
            ///////////////////////////
            $this->load->view('index_golden', $data1);
        } else {
            $data = $this->templete();

            $this->load->view('view_error', $data);
        }
    }

    //////////////////////////////////////////

    function showSliverAdvDetail() {
        if ($this->uri->segment(3) != '') {
            // data on home page 
            $data1 = $this->templete();
            // load adv data  
            $this->load->model('sliver');
            $adv_id = mysql_escape_string($this->uri->segment(3));
            $data1['res'] = $this->sliver->selectAllFromSliver($adv_id);
            // load adv photo 
            $z = $this->adv->selectLevel2PhotoById($adv_id);
            $this->adv->incremetAdv($adv_id);
            $phot = array();
            foreach ($z as $value) {
                $phot[] = array('url' => base_url() . "public/original/" . $value->name
                );
            }
            $data1['photo'] = $phot;
            // load adv gallery 
            ///////////////////////////
            $this->load->view('index_silver', $data1);
        } else {
            $data = $this->templete();
            $this->load->view('view_error', $data);
        }
    }

    function showDoctor() {
        if ($this->uri->segment(3) != '') {
            // data on home page 
            $data1 = $this->templete();
            // load adv data  
            $this->load->model('adv');
            $adv_id = mysql_escape_string($this->uri->segment(3));
            if ($this->adv->showDoctorAdvDetail($adv_id)) {
                $data1['doctor'] = $this->adv->showDoctorAdvDetail($adv_id);
                $this->load->view('index_doctor', $data1);
            } else {
                $data = $this->templete();
                $this->load->view('view_error', $data);
            }
        } else {
            $data = $this->templete();
            $this->load->view('view_error', $data);
        }
    }

    //////////////////////////////////////////
    function load_trains() {
        $data1 = array();
        $this->load->model('slider_model');
        $slider_pics = $this->slider_model->load_img();
        if ($slider_pics->num_rows() > 0)
            $data1['big_pics'] = $slider_pics->result();

        $this->load->model('dept');
        $data1['result'] = $this->dept->showAll_deptANDsub();
        $this->load->view('index_trains', $data1);
    }

    ////////////////////////////////////////////
    function contact_us() {
        $data1 = array();
        $this->load->model('slider_model');
        $slider_pics = $this->slider_model->load_img();
        if ($slider_pics->num_rows() > 0)
            $data1['big_pics'] = $slider_pics->result();

        $this->load->model('dept');
        $data1['result'] = $this->dept->showAll_deptANDsub();
        $this->load->view('view_contact', $data1);
    }

//////////////////////////////////////
    function contact_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[60]|trim|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'required|max_length[500]|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[200]|xss_clean');



        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $mail = $this->input->post('email');
            $message = $this->input->post('message');
            $this->load->model('slider_model');
            if ($this->slider_model->contact_form($name, $mail, $message)) {
                $data1 = array();
                $data1['sent'] = "تم ارسال الرساله بنجاح";
                $this->load->model('slider_model');
                $slider_pics = $this->slider_model->load_img();
                if ($slider_pics->num_rows() > 0)
                    $data1['big_pics'] = $slider_pics->result();

                $this->load->model('dept');
                $data1['result'] = $this->dept->showAll_deptANDsub();
                $this->load->view('view_contact', $data1);
            }else {
                $data1 = array();
                $data1['dont_sent'] = "عفوا لم ترسل الرساله لخطأ ما <br />
حاول مره ثانيه ";

                $this->load->model('slider_model');
                $slider_pics = $this->slider_model->load_img();
                if ($slider_pics->num_rows() > 0)
                    $data1['big_pics'] = $slider_pics->result();

                $this->load->model('dept');
                $data1['result'] = $this->dept->showAll_deptANDsub();
                $this->load->view('view_contact', $data1);
            }
        }else {
            $data1 = array();
            $this->load->model('slider_model');
            $slider_pics = $this->slider_model->load_img();
            if ($slider_pics->num_rows() > 0)
                $data1['big_pics'] = $slider_pics->result();

            $this->load->model('dept');
            $data1['result'] = $this->dept->showAll_deptANDsub();
            $this->load->view('view_contact', $data1);
        }
    }

////////////////////////////////////////
    function logout() {
        $this->session->sess_destroy();
        $this->load->view('view_login');
    }

    function notAdmin() {
        $this->load->view('view_notadmin');
    }

}
