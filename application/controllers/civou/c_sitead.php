<?php

class c_sitead extends CI_Controller {

    public function index() {
        $this->is_loged_in();
    }

    public function is_loged_in() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('civou/view_admin');
        } else {
            $this->load->view('view_login');
        }
    }

    function valid_loign() {

        $this->load->model('sitead');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[255]|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user_id = $this->sitead->valid_user_pass($username, $password);
            if (!$user_id) {
                $login_data = array("login_error" => true);
                $this->load->view('view_login', $login_data);
            } else {
                $login_data = array("logged_in" => true, "user_id" => $user_id);
                $this->session->set_userdata($login_data);
                redirect('site/load_admin');
            }
        }
    }

    ////////////////////////////////////////////
    function contact_level1() {
        $this->load->model('slider_model');
        if ($this->slider_model->select_contacts()) {
            $contacts = $this->slider_model->select_contacts();
            if ($contacts->num_rows() > 0) {
                $data['contacts'] = $contacts->result();
            } else {
                $data['error'] = "لا يوجد رسائل ارسلت بعد ";
            }
        } else {
            $data['error'] = "لا يوجد رسائل ارسلت بعد ";
        }
        $this->load->view('civou/contact_level1', $data);
    }

    ////////////////////////////////////////////
    function contact_level2() {
        if ($this->uri->segment(4) != '') {
            $id = mysql_escape_string($this->uri->segment(4));
            $this->load->model('slider_model');
            $this->slider_model->read_message($id);
            if ($this->slider_model->select_contacts_level2($id)) {
                $contacts = $this->slider_model->select_contacts_level2($id);
                if ($contacts->num_rows() > 0) {
                    $data['contacts'] = $contacts->result();
                } else {
                    $data['error'] = "محتوي الرساله غير موجود";
                }
            } else {
                $data['error'] = "محتوي الرساله غير موجود";
            }
            $this->load->view('civou/contact_level2', $data);
        } else {
            $data['error'] = "لا يوجد رسائل بهذا العنوان ";
            $this->load->view('civou/contact_level2', $data);
        }
    }

}

?>
