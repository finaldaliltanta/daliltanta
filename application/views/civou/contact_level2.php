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
    <td width="90%"><?php echo $contact->name?></td>
    <td>الاسم</td>
  </tr>
  <tr>
    <td width="90%"><?php echo $contact->mail?></td>
    <td>الايميل</td>
  </tr>
  <tr>
    <td width="90%"><?php echo $contact->message?></td>
    <td>الرساله</td>
  </tr>
  <?php }} ?>
</table>
</div>



</body>
</html>