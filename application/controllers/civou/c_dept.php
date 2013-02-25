<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_dept
 *
 * @author Ci Vou MallaH
 */
class c_dept extends CI_Controller {

 

    public function add() {

        if ($this->session->userdata('logged_in')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('deptname', 'Department Name ', 'required|trim|max_length[454]|xss_clean');

            if ($this->form_validation->run() == false) {
                $this->load->view("civou/view_dept");
            } else {
                $d_n = $this->input->post('deptname');
                $da = array('name' => $d_n);
                $this->load->model('dept');
                $this->dept->create($da);
                $this->load_dept_view();
            }
        } else {
             redirect('site/notAdmin');
        }
    }

    // show all dept in order 
    public function load_dept_view() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('dept');
            $data['res'] = $this->dept->showAll();
            $this->load->view('civou/view_dept', $data);
        } else {
             redirect('site/notAdmin');
        }
    }

    // edit the order of  the  dept 
    public function edit_order() {

        if ($this->session->userdata('logged_in')) {
            $this->load->model('dept');

            for ($i = 1;; $i++) {
                $nn = $this->input->post('order' . $i);
                if ($nn != "") {
                    $n = $this->input->post('order' . $i);
                    $id = $this->input->post('id' . $i);
                    $this->dept->update_order($id, $n);
                }else
                    break;
            }
            redirect('civou/c_dept/load_dept_view');
        }else {
             redirect('site/notAdmin');
        }
    }

    // methos to  handle  sub department 

    public function loadSubDeptView() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('dept');
            $data['re'] = $this->dept->showAll();
            $this->load->view('civou/view_subDept', $data);
        } else {
             redirect('site/notAdmin');
        }
    }

    function addSubDept() {

        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subdeptname', 'Sub_Department Name ', 'required|trim|max_length[45]|xss_clean');
            if ($this->form_validation->run() == false) {
                
            } else {
                $d_n = $this->input->post('subdeptname');
                $d_id = $this->input->post('dept');
                $da = array('name' => $d_n, 'dept_id' => $d_id);
                $this->load->model('dept');
                $this->dept->createSubDept($da);
                $this->load->view('civou/view_admin');
            }
        } else {
             redirect('site/notAdmin');
        }
    }

}

?>
