<?php

class Search_model extends CI_Model {

function search_results($keywords){
	
	$returned_result=array();
	$where="";
	
	$keywords=preg_split('/[\s]+/',$keywords);
   
	$total_keywords=count($keywords);
	
	foreach($keywords as $key=>$keyword){
		$where .="`name` like '%$keyword%'";
		if($key !=($total_keywords -1)){
			$where .="AND";
			}
		}
		$result="select id,name,nashat,address,phone,type from adv where $where ";
		$result_num= ($result = mysql_query($result)) ? mysql_num_rows($result) : 0 ;
		
		if( $result_num == 0){
			return false;
			}else{
				while($result_row= mysql_fetch_assoc($result)){
					$returned[]=array(
					'id'=> $result_row['id'],
					'name' =>$result_row['name'],
					'nashat' =>$result_row['nashat'],
					'phone' =>$result_row['phone'],
					'address' =>$result_row['address'],
					'type' =>$result_row['type']
					);
					
					}
					
					return $returned;
				}
}
	
	
}