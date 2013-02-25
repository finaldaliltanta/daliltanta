<?php

class c_doctor extends CI_Controller {

    function add() {
        $this->load->model('adv');
        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('adv_name', ' Name ', 'required|trim|max_length[100]|xss_clean');
            $this->form_validation->set_rules('adv_spe', 'nashat ', 'required|trim|max_length[100]xss_clean');
            $this->form_validation->set_rules('adv_address', 'address ', 'required|max_length[39]trim|xss_clean');
            $this->form_validation->set_rules('adv_f_date', 'date', 'required|max_length[39]trim|xss_clean');
            $this->form_validation->set_rules('adv_f_time', 'time', 'required|max_length[12]trim|xss_clean');
            $this->form_validation->set_rules('adv_phone', 'phone', 'required|trim|xss_clean|max_length[80]');

            if ($this->form_validation->run() == false) {
                $error['error'] = "";
                $this->load->view("view_doctorAdd", $error);
            } else {
                $dept_id = $this->input->post('dept');
                $adv_na = $this->input->post('adv_name');
                $desc = $this->input->post('desc');
                $adv_spe = $this->input->post('adv_spe');
                $adv_add = $this->input->post('adv_address');
                $adv_ph = $this->input->post('adv_phone');
                $f_time = $this->input->post('adv_f_time');
                $f_date = $this->input->post('adv_f_date');
                $f_book = $this->input->post('adv_f_book');
                $inset_value = array(
                    'name' => $adv_na,
                    'desc' => $desc,
                    'spe' => $adv_spe,
                    'address' => $adv_add,
                    'phone' => $adv_ph,
                    'sdept_id' => $dept_id,
                    'f_time' => $f_time,
                    'f_date' => $f_date,
                    'book' => $f_book
                );
                $this->load->model("adv");
                $this->adv->createDoctor($inset_value);
                $data['res'] = $this->adv->selectDocSubDept();
                $data['name'] = $adv_na;
                $this->load->view('civou/view_doctorAdd', $data);
            }
        } else {
            redirect('site/notAdmin');
        }
    }

    function load_doctor() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('adv');
            $data['res'] = $this->adv->selectDocSubDept();
            $this->load->view('civou/view_doctorAdd', $data);
        } else {
            redirect('site/notAdmin');
        }
    }

    function addDocDept() {
        if ($this->session->userdata('logged_in')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('dept_name', 'Department Name ', 'required|trim|max_length[45]|xss_clean');

            if ($this->form_validation->run() == false) {
                $this->load->view("civou/view_doctorDeptAdd");
            } else {
                $d_n = $this->input->post('dept_name');
                $da = array('name' => $d_n, 'dept_id' => '1');
                $this->load->model('dept');
                $this->dept->createDocDept($da);
                $data['yes'] = $d_n;
                $this->load->view('civou/view_doctorDeptAdd', $data);
            }
        } else {
            redirect('site/notAdmin');
        }
    }

    function load_doctorDeptAdd() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('civou/view_doctorDeptAdd');
        } else {
            redirect('site/notAdmin');
        }
    }

    function load_doctor_edit() {
        $this->load->model('adv');
        $data['res'] = $this->adv->selectDocSubDept();
        $this->load->view('civou/view_doctorEdit', $data);
    }

    function edit() {
        $this->load->model('adv');
        $dept_id = $this->input->post('dept');
        $data1['doctor'] = $this->adv->showDoctorAdvDetail($dept_id);
        $this->load->view('civou/view_doctorEdit_1', $data1);
    }

    function edit1() {
        $this->load->model('adv');
        $id = $this->uri->segment(4);
        $data1['doctor'] = $this->adv->showDoctorAdvDetailByDoctorId($id);
        $this->load->view('civou/view_doctorEdit_2', $data1);
    }

    function delete() {
        $this->load->model('adv');
        if ($this->session->userdata('logged_in')) {
            if ($this->uri->segment(4) != '') {
                $id = $this->uri->segment(4);
                $this->adv->deleteDoctor($id);
                $data['name'] = 'doc';
                $data['res'] = $this->adv->selectDocSubDept();
                $this->load->view('civou/view_doctorEdit', $data);
            }
        } else {
            
        }
    }

    function update() {
        $this->load->model('adv');
        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('adv_name', ' Name ', 'required|trim|max_length[500]|xss_clean');
            $this->form_validation->set_rules('adv_spe', 'nashat ', 'required|trim|max_length[500]xss_clean');
            $this->form_validation->set_rules('adv_address', 'address ', 'required|max_length[500]trim|xss_clean');
            $this->form_validation->set_rules('adv_f_date', 'date', 'required|max_length[500]trim|xss_clean');
            $this->form_validation->set_rules('adv_f_time', 'time', 'required|max_length[500]trim|xss_clean');
            $this->form_validation->set_rules('adv_phone', 'phone', 'required|trim|xss_clean|max_length[500]');

            if ($this->form_validation->run() == false) {
                $error['error'] = "";
                $this->load->view("", $error);
            } else {
                $doctor_id = $this->input->post('adv_id');
                $adv_na = $this->input->post('adv_name');
                $desc = $this->input->post('desc');
                $adv_spe = $this->input->post('adv_spe');
                $adv_add = $this->input->post('adv_address');
                $adv_ph = $this->input->post('adv_phone');
                $f_time = $this->input->post('adv_f_time');
                $f_date = $this->input->post('adv_f_date');
                $f_book = $this->input->post('adv_f_book');
                $inset_value = array(
                    'name' => $adv_na,
                    'desc' => $desc,
                    'spe' => $adv_spe,
                    'address' => $adv_add,
                    'phone' => $adv_ph,
                    'f_time' => $f_time,
                    'f_date' => $f_date,
                    'book' => $f_book
                );
                $this->load->model("adv");
                $this->adv->updateDoctor($doctor_id, $inset_value);
                $data['res'] = $this->adv->selectDocSubDept();
                $data['name_edit'] = $adv_na;
                $this->load->view('civou/view_doctorEdit', $data);
            }
        } else {
            redirect('site/notAdmin');
        }
    }

}

?>
