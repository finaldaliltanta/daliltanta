<?php

class custmer extends CI_Model {

    function valid_custmer($user, $pass) {

        $this->db->select('adv_id,username,`password`');
        $this->db->from('level2');
        $this->db->where('username', $user);
        $this->db->where('`password`', $pass);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->adv_id;
        } else {
            return false;
        }
    }

    function updateAdv() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('adv_name', ' Name ', 'required|trim|max_length[45]|xss_clean');
        $this->form_validation->set_rules('adv_nashat', 'nashat ', 'required|trim|max_length[45]|xss_clean');
        $this->form_validation->set_rules('adv_address', 'address ', 'required|trim|max_length[445]|xss_clean');
        $this->form_validation->set_rules('adv_phone', 'phone ', 'required|trim|max_length[445]|xss_clean|numeric');
        $this->form_validation->set_rules('desc', 'description ', 'required|trim|max_length[1385]|xss_clean');

        if ($this->form_validation->run() == false) {
            $error = array();
            $error['error'] = "";
            $error['dept_id'] = 0;
            $this->load->view("civou/view_advAdd", $error);
        } else {

            $adv_id = $this->input->post('advid');
            $type = $this->input->post('advtype');
            $name = $this->input->post('adv_name');
            $desc = $this->input->post('desc');
            $nashat = $this->input->post('adv_nashat');
            $address = $this->input->post('adv_address');
            $phone = $this->input->post('adv_phone');

            $db_value = array(
                'name' => $name,
                'desc' => $desc,
                'nashat' => $nashat,
                'address' => $address,
                'phone' => $phone
            );
             if ($type == 's') {
                $db_value['type'] = 's';
                $this->load->model('adv');
                $this->adv->updateAdv($adv_id,$db_value);
                $this->updateLevel2('s', $name);
                //  1  for golden adv 
            } else if ($type == 'g') {
                $db_value['type'] = 'g';
                $this->load->model('adv');
                $this->adv->updateAdv($db_value);
                $this->updateLevel2('g', $name);
                $this->updateGallery($name);
            }
            $this->load->view('civou/view_advAdd');
        }
    }

    function updateLevel2($type, $advName) {
        $this->load->model('adv');
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $main_photo = $_FILES['file0']['name'];
        $advId = $this->adv->getAdvIdByName($advName);
        $db_value = array('adv_id' => $advId, 'type' => $type, 'username' => $username,
            'password' => $pass, 'main_photo' => $main_photo);
        $this->adv->addLevel2Adv($db_value);
        ///// configuration for upload library
        $photo_name = array();
        $gallery_path = realpath(APPPATH . '../public/original/');
        $config['upload_path'] = $gallery_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '20000';
        $this->load->library('upload', $config);

        /////////////  for  thumbanial /////////////////////////////////////
        $thum_path = realpath(APPPATH . '../public/original/thumbs');
        $con = array(
            'image_library' => 'gd2',
            'source_image' => '',
            'maintain_ratio' => TRUE,
            'width' => 100,
            'height' => 100,
            'new_image' => $thum_path
        );
        $this->load->library('image_lib', $con);

        ///////////// for loop and code that upload  photo /////////////////////  
        $i = 0;
        foreach ($_FILES as $file) {
            if ($this->upload->do_upload("file" . $i)) {
                $phot_data = $this->upload->data();
                $photo_name[$i] = $phot_data['file_name'];
                $con['source_image'] = $phot_data['full_path'];
                $this->image_lib->initialize($con);
                $this->image_lib->resize();
                $i++;
            }
        }
        ///////////// code that store //////////////////////////////////////////
        $ar = array();
        foreach ($photo_name as $value) {
            $ar['name'] = $value;
            $ar['level2_id'] = $advId;
            $this->adv->addLevel2Photo($ar);
        }
    }

    function updateGallery($name) {
        $this->load->model('adv');
        $vedio = $this->input->post('vedio');
        $advId = $this->adv->getAdvIdByName($advName);
        $db_value = array('g_id' => $advId, 'vedio' => $vedio);
        $this->adv->addGoldenAdv($db_value);

        // configuration for upload library

        $gallery_photo = array();
        $gallery_path = realpath(APPPATH . '../public/golden/');
        $config1['upload_path'] = $gallery_path;
        $config1['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config1['max_size'] = '20000';
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $thum_path = realpath(APPPATH . '../public/golden/thumbs');
        $con = array(
            'image_library' => 'gd2',
            'source_image' => '',
            'maintain_ratio' => TRUE,
            'width' => 100,
            'height' => 100,
            'new_image' => $thum_path
        );
        $this->load->library('image_lib', $con);

        ///////////// for loop and code that upload  photo /////////////////////  
        $ii = 0;
        foreach ($_FILES as $filey) {
            if (isset($_FILES['gallery' . $ii])) {
                $this->upload->do_upload('gallery' . $ii);
                $phot_data = $this->upload->data();
                $gallery_photo[$ii] = $phot_data['file_name'];
                $con['source_image'] = $phot_data['full_path'];
                $this->image_lib->initialize($con);
                $this->image_lib->resize();
                $ii++;
            }
        }
        /////   watermark to image   ////////////
//        $config['image_library'] = 'gd2';
//        $config['source_image'] = $gallery_path . $phot_data['file_name'];
//        $config['wm_text'] = 'malahhhhgfjfgjtgjfhgdfhfhfhhh';
//        $config['wm_type'] = 'text';
//        $config['wm_font_path'] = 'C:\Windows\Fonts\georgia.ttf';
//        $config['wm_font_size'] = '16';
//        $config['wm_font_color'] = 'ffffff';
//        $config['wm_vrt_alignment'] = 'center';
//        $config['wm_hor_alignment'] = 'center';
//        $config['wm_padding'] = '20';
//        $this->image_lib->initialize($config);
//        $this->image_lib->watermark();
        ///////////// code that store //////////////////////////////////////////
        $ar = array();
        foreach ($gallery_photo as $value) {
            $ar['name'] = $value;
            $ar['golden_id'] = $advId;
            $this->adv->addGalleryPhoto($ar);
        }
    }

}

?>
