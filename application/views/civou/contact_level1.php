<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
table{width:600px;margin:auto;}
table tr td{text-align:center} 
#message{width:600px;margin:auto;padding-top:60px;}
</style>

<body style="width:940px; margin:auto">
<?php include('view_menu.php')?>

<div id="message">
<?php if(isset($error)){?><P style="float:right"><?php echo $error?> </P><?php }?>
<table width="600" border="1">
<?php if(isset($contacts)){
	foreach($contacts as $contact){
	?>
  <tr>
    <td width="90%"><a href="<?php echo base_url();?>civou/c_sitead/contact_level2/<?php echo $contact->id?>"><?php echo $contact->mail; ?></a></td>
    <td>
	<?php if($contact->read == 0){ ?>
   <a href="<?php echo base_url();?>civou/c_sitead/contact_level2/<?php echo $contact->id?>">
    <img src="<?php echo base_url();?>images/incorrect.png" width="50" height="60" /></a>
	
	<?php }else{?>
       <a href="<?php echo base_url();?>civou/c_sitead/contact_level2/<?php echo $contact->id?>">
    <img src="<?php echo base_url();?>images/sa7.png" width="50" height="60" /><?php }?></a>
    
    </td>
  </tr>
  <?php }} ?>
</table>
</div>



</body>
</html>