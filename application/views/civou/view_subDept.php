<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>اضافه قسم فرعى </title>

    </head>

    <body>
<?php include('view_menu.php')?>
        <h2> اضافه قسم فرعى  </h2>
        <br/>
        <?php echo form_open("civou/c_dept/addSubDept"); ?>
        <br/><br/>
        
        <select name="dept" >
              <?php foreach ($re as $row) { ?>
            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
             <?php } ?>
        </select>
        
        <br/><br/>   اسم القسم الفرعى  :  
      <?php  echo form_input('subdeptname');  ?> 
        <input type="submit" value="add" />
        <br/><br/>
        <?php echo validation_errors(); ?>

    </body>  

</html>