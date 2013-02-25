<?php

class Search extends CI_Controller {

    public function index() {
       $this->search_golden();
    }
	
	
	
	function search_golden(){
		 $this->load->model('slider_model');
        $slider_pics = $this->slider_model->load_img();
        if ($slider_pics->num_rows() > 0)
            $data['big_pics'] = $slider_pics->result();
        
        $this->load->model('dept');
        $data['result'] = $this->dept->showAll_deptANDsub();
		if($this->input->post('keywords')!=''){
			$this->load->model("search_model");
	$suffix="";
	$key=mysql_real_escape_string(trim($this->input->post('keywords')));
	$errors=array();
	if(empty($key)){
		$errors[]="من فضلك ادخل كلمه البحث";
		}else if(strlen($key)<3){
			$errors[]="عفوا كلمه البحث يجب ان لا تقل عن 3 احرف";
			
			
			}else if($this->search_model->search_results($key) === false){
				$errors[]="عفوا لا يوجد نتائج عن كلمه البحث التي ادخلتها";
				}
				
				if(empty($errors)){
					//search
					//echo '<pre>' ,print_r( search_results($key)), '</pre>';
					$result=$this->search_model->search_results($key);
					$data['results']=$this->search_model->search_results($key);
					$result_num=count($result);
					$suffix=($result_num != 1) ? 's':'' ;
					$data['result_num']='<p class="result">يوجد عدد <strong>'. $result_num .'</strong> نتيجه للبحث عن <strong> '.$key.' </strong>  </p>';
					foreach($result as $results){
						$data['id']=$results['id'];
						$data['name']=$results['name'];
						$data['address']=$results['address'];
						$data['phone']=$results['phone'];
						$data['nashat']=$results['nashat'];
						$data['type']=$results['type'];
						}
					
					}else{
					foreach($errors as $error){
						$data['error']=$error.'</br>';
						}
						}
	
	}       
	         
	      
       
	         $this->load->view('search_view',$data);

		}
}