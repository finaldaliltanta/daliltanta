<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
body{width:945px; margin:auto; }
#upload_form{float:right; margin:auto;padding:40px 0 40px ;}
#show_data{float:right;}
.delete{text-decoration:none;}
.delete:hover{text-decoration:underline}
#show_data table{text-align:center}


</style>
<body >
<?php include('view_menu.php')?>
<div id="upload_form">
<?php if(isset($errors)){echo '<p style="color:#F00">'.$errors.'</p>' ;}?>

<?php echo form_open_multipart('civou/add_panners/upload_big');?>

 <?php echo validation_errors() ;?>
<table >
<tr>
<td><?php echo form_upload(array('id'=>'file_browse','name'=>'userfile' ));?></td>
<td><label>اختار الصوره</label></td>
</tr>

<tr><td></td></tr>

<tr>

<td><?php echo form_input(array('name'=>'link', 'id'=>'caption'));?></td>

<td>اللينك</td>

</tr>

<tr><td></td></tr>

</table>
 
 <?php echo form_submit(array('id'=>'upload_button','name'=>'upload'),'Upload');?>   
 <?php echo form_close();?>
</div>

<div id="show_data">
<?php if(isset($error)){echo $error;} ?>
<table border="1" width="900">

<th> مسح</th>
<th>ايقاف | تفعيل</th>
<th> التعليق</th>
<th>الصوره</th>


<?php if (isset($big_pics)){?>
   <?php foreach($big_pics as $pic ){ ?>
<tr>


<td><a class="delete" href="<?php echo base_url();?>civou/add_panners/deleteImage?id=<?php echo $pic->id ;?>&path=
<?php echo APPPATH.'../public/uploads/slider/'.$pic->pic_name.'&path2='.APPPATH.'../public/uploads/slider/thumbs/'.$pic->pic_name ;?>
" >مسح</a></td>

<td>
<?php if($pic->active==1){?>
<a class="delete" href="<?php echo base_url();?>civou/add_panners/disactive?id=<?php echo $pic->id ;?>" >ايقاف </a>

<?php }else{?>
<a class="delete" href="<?php echo base_url();?>civou/add_panners/active?id=<?php echo $pic->id ;?>" >تفعيل </a>
<?php }?>

</td>
<td><a href="<?php echo $pic->link ;?>">الرابط</a></td>

<td width="100"><img src="<?php echo base_url();?>public/uploads/slider/<?php echo $pic->pic_name ;?>"  width=100 /></td> 


</tr>
<?php }?>
       <?php }?>
</table>

</div>
</body>
</html>
