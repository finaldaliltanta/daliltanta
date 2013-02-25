<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
	public function index(){

		}
	////////////////////////////////////////	
		function add_comment(){
		$adv_id=$this->input->post("adv_id");
		$name=$this->input->post("name", true);
		$email=$this->input->post("email", true);
		$comment=$this->input->post("comment", true);
		$this->load->model("slider_model");
		$this->slider_model->add_comment($adv_id,$name,$email,$comment);
		
		}
	/////////////////////////////////////////
	
		 
		 
		 
		 
		 
		 function get_comment_ajax(){
			 		$adv_id=$this->input->post("adv_id");
					$this->load->model("slider_model");
					
					if($chat_messages=$this->slider_model->get_comment($adv_id)){
					
					if($chat_messages->num_rows() > 0){
						//we have some messages

						$chat_message_html='';
						foreach($chat_messages->result() as $chat_message){
												
						$chat_message_html.=' 
						 <table style="margin-left:130px;margin-bottom:15px;" width="560" border="0">
						<img id="avatar" src="'.base_url().'images/avatar.png" width="60" />
						<tr>
											<td width="476">
											<div style="padding-right:5px;">
											<h4 style="text-align:right;padding-top:17px;text-transform:lowercase;font-size:15px">'.$chat_message->name.'</h4>
											<p style="text-align:right;padding-top:-5px;">'.$chat_message->comment.'</p>
											</div>
											</td>
											<td width="68">
											
											</td>
											</tr>
											<tr>											
											<td></td>
											</tr></table>';							
							}
						
						
						echo $chat_message_html;
						exit();
						}else{
							//no chat return
						
						echo '<p id="no_comments">لا يوجد تعليقات</p>';
							exit();
							}
					}else{
						echo '<p style="margin:10px 10px 0px 600px;" id="no_comments">لا يوجد تعليقات</p>';
							exit();
						}
					
			 }
	
	///////////////////////////////////////////
	
	}
