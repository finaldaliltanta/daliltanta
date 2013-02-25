<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Add_panners extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $this->add_big_panner();
        } else {
            redirect('site/notAdmin');
        }
    }

    function add_big_panner() {

        if ($this->session->userdata('logged_in')) {
            $this->load->model('slider_model');
            $slider_pics = $this->slider_model->load_img_admin();
            if ($slider_pics->num_rows() > 0) {
                $data['big_pics'] = $slider_pics->result();
            } else {
                $data = "";
            }
            $this->load->view("civou/big_panner", $data);
        } else {
            redirect('site/notAdmin');
        }
    }

    function upload_big() {
        if ($this->session->userdata('logged_in')) {

            if ($this->input->post('upload')) {
                $gallery_path = realpath(APPPATH . '../public/uploads/slider/');

                $config = array(
                    'allowed_types' => 'jpg|JPEG|png|gif',
                    'upload_path' => $gallery_path,
                    'max_size' => '20000'
                );

                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {

                    $image_data = $this->upload->data();
                    $pic_name = $image_data['file_name'];
                    $image_data = $this->upload->data(); //get image data

                    $config = array(
                        'source_image' => $image_data['full_path'], //get original image
                        'new_image' => $gallery_path . '/thumbs', //save as new image //need to create thumbs first
                        'maintain_ratio' => true,
                        'width' => 100,
                        'height' => 60
                    );

                    $this->load->library('image_lib', $config); //load library
                    $this->image_lib->resize(); //do whatever specified in config
                    $this->load->model('slider_model');
                    $this->slider_model->save_big($pic_name);

                    redirect('civou/add_panners/add_big_panner');
                } else {
                    $data['errors'] = $this->upload->display_errors();
                    $this->load->model('slider_model');
                    $slider_pics = $this->slider_model->load_img_admin();
                    if ($slider_pics->num_rows() > 0) {
                        $data['big_pics'] = $slider_pics->result();
                    } else {
                        $data = "";
                    }
                    $this->load->view("civou/big_panner", $data);
                }
            }
        } else {
            redirect('site/notAdmin');
        }
    }

////////////////////////////////////////////////////////////
    function disactive() {

        if ($this->session->userdata('logged_in')) {
            if (isset($_GET['id'])) {
                if ($_GET['id'] != "") {
                    $id = $_GET['id'];
                    $this->load->model('slider_model');
                    $slider_pics = $this->slider_model->disactive($id);

                    redirect('civou/add_panners/add_big_panner');
                } else {
                    redirect('civou/add_panners/add_big_panner');
                }
            } else {
                $this->load->model('slider_model');
                $slider_pics = $this->slider_model->load_img_admin();
                if ($slider_pics->num_rows() > 0) {
                    $data['big_pics'] = $slider_pics->result();
                } else {
                    $data = "";
                }
                $this->load->view("civou/big_panner", $data);
            }
        } else {
            redirect('site/notAdmin');
        }
    }

    //////////////////////////////////
    function active() {
        if ($this->session->userdata('logged_in')) {
            if (isset($_GET['id'])) {
                if ($_GET['id'] != "") {
                    $id = $_GET['id'];
                    $this->load->model('slider_model');
                    $slider_pics = $this->slider_model->active($id);

                    redirect('civou/add_panners/add_big_panner');
                } else {
                    redirect('civou/add_panners/add_big_panner');
                }
            } else {
                redirect('civou/add_panners/add_big_panner');
            }
        } else {
            redirect('site/notAdmin');
        }
    }

    /////////////////////////////////
    function deleteImage() {

        if ($this->session->userdata('logged_in')) {
            if (isset($_GET['id']) && isset($_GET['path']) && isset($_GET['path2'])) {
                $id = $_GET['id'];
                $path = $_GET['path'];
                $path2 = $_GET['path2'];
                $this->load->model('slider_model');

                if ($this->slider_model->delete($id, $path, $path2)) {

                    redirect('civou/add_panners/add_big_panner');
                } else {
                    redirect('civou/add_panners/add_big_panner');
                }
            }
        } else {
            redirect('site/notAdmin');
        }
    }

    /////////////////////////////////////////////////////////
    function add_small_panner() {

        if ($this->session->userdata('logged_in')) {
            $this->load->model('slider_model');
            $slider_pics = $this->slider_model->load_img_small_admin();
            if ($slider_pics->num_rows() > 0) {
                $data['big_pics'] = $slider_pics->result();
            } else {
                $data = "";
            }
            $this->load->view("civou/small_panner", $data);
        } else {
            redirect('site/notAdmin');
        }
    }

    ///////////////////////////////////////////////////////////	
    function upload_small() {

        if ($this->session->userdata('logged_in')) {
            if ($this->input->post('upload')) {
                $link = $this->input->post('link');
                $gallery_path = realpath(APPPATH . '../public/uploads/slider/small');

                $config = array(
                    'allowed_types' => 'jpg|JPEG|png|gif',
                    'upload_path' => $gallery_path,
                    'max_size' => '20000'
                );

                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {

                    $image_data = $this->upload->data();
                    $pic_name = $image_data['file_name'];
                    $image_data = $this->upload->data(); //get image data

                    $config = array(
                        'source_image' => $image_data['full_path'], //get original image
                        'new_image' => $gallery_path . '/thumb', //save as new image //need to create thumbs first
                        'maintain_ratio' => true,
                        'width' => 100,
                        'height' => 60
                    );

                    $this->load->library('image_lib', $config); //load library
                    $this->image_lib->resize(); //do whatever specified in config
                    $this->load->model('slider_model');
                    $this->slider_model->save_small($pic_name);

                    redirect('civou/add_panners/add_small_panner');
                } else {
                    $data['errors'] = $this->upload->display_errors();
                    $this->load->model('slider_model');
                    $slider_pics = $this->slider_model->load_img_small_admin();
                    if ($slider_pics->num_rows() > 0) {
                        $data['big_pics'] = $slider_pics->result();
                    } else {
                        $data = "";
                    }
                    $this->load->view("civou/small_panner", $data);
                }
            }
        } else {
            redirect('site/notAdmin');
        }
    }

////////////////////////////////////////////////////			
    function disactive_small() {

        if ($this->session->userdata('logged_in')) {
            if (isset($_GET['id'])) {
                if ($_GET['id'] != "") {
                    $id = $_GET['id'];
                    $this->load->model('slider_model');
                    $slider_pics = $this->slider_model->disactive_small($id);

                    redirect('civou/add_panners/add_small_panner');
                } else {
                    redirect('civou/add_panners/add_small_panner');
                }
            } else {
                $this->load->model('slider_model');
                $slider_pics = $this->slider_model->load_img_admin();
                if ($slider_pics->num_rows() > 0) {
                    $data['big_pics'] = $slider_pics->result();
                } else {
                    $data = "";
                }
                $this->load->view("civou/big_panner", $data);
            }
        } else {
            redirect('site/notAdmin');
        }
    }

    ////////////////////////////////
    function protect_all_site() {
        $this->load->model('slider_model');
        $this->slider_model->protect_site();
    }

    //////////////////////////////////
    function active_small() {

        if ($this->session->userdata('logged_in')) {
            if (isset($_GET['id'])) {
                if ($_GET['id'] != "") {
                    $id = $_GET['id'];
                    $this->load->model('slider_model');
                    $slider_pics = $this->slider_model->active_small($id);

                    redirect('civou/add_panners/add_small_panner');
                } else {
                    redirect('civou/add_panners/add_small_panner');
                }
            } else {
                redirect('civou/add_panners/add_small_panner');
            }
        } else {
            redirect('admin/login');
        }
    }

    /////////////////////////////////
    function deleteImage_small() {

        if ($this->session->userdata('logged_in')) {
            if (isset($_GET['id']) && isset($_GET['path'])) {
                $id = $_GET['id'];
                $path = $_GET['path'];

                $this->load->model('slider_model');

                if ($this->slider_model->delete_small($id, $path)) {

                    redirect('civou/add_panners/add_small_panner');
                } else {
                    redirect('civou/add_panners/add_small_panner');
                }
            }
        } else {
            redirect('admin/login');
        }
    }

}