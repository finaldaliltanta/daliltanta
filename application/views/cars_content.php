<style type="text/css">
    #update_content table {margin-top:40px;margin-right:10px;}
    #update_content table tr td{padding:5px;text-align:right;}		
    #update_content input[type="text"]{float:right;color:#333;text-align:right;color:#000;
                                       padding:7px 9px 6px; 
                                       margin:0; 
                                       width:340px;
                                       border:1px solid #e5e5e5; 
                                       background:#fff;
                                       outline:none;}
       #update_content textarea{width:530px;}
    #update_submit{background: none; border: none;
                   text-align:right;
                   width:100px;
                   height:30px;
                   padding-right:4px;

                   text-align:center;

                   background:#666;
                   color:#fff;
                   cursor:pointer;
                   font-family: 'myfont2';
                   margin-top:-60px;
                   margin-left:595px;
    }	
	#valid2{float:right;margin:10px 150px 0 0;color:#F30;}
</style>
<div id="valid2">
<?php

 echo validation_errors();


       
        
        if(isset($name)){
            echo " تم اضافه اعلان السياره ";
            echo $name.'   ';
            echo "   بنجاح ";
            
        }
       

echo form_open('site/addCarAdv');
?>
</div>
<div id="update_content">
<table id="contact" width="700" border="0">
  <tr>
    <td width="571"><?php echo form_input('name'); ?></td>
    <td width="119">: الاسم</td>
  </tr>
  <tr>
    <td><?php echo form_input('phone'); ?></td>
    <td>: التليفون</td>
  </tr>
  <tr>
    <td><?php echo form_input('email'); ?></td>
    <td>: البريد الالكترونى</td>
  </tr>
  <tr>
    <td><?php echo form_input('face_page'); ?></td>
    <td>:بروفيل الفيس ان وجد</td>
  </tr>
  <tr>
    <td><?php echo form_textarea('detail'); ?></td>
    <td>: بيانات الاعلان</td>
  </tr>
 
  <tr>
    <td><?php echo form_textarea('notes'); ?></td>
    <td>: ملحوظات</td>
  </tr>
   <tr>
    <td><?php echo form_submit(array('name'=>'submit','id'=>'contact_submit'), 'ارسال '); ?> </td>
    <td></td>
  </tr>
</table>
<?php 
echo form_close();
?>
</div>
