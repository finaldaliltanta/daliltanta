<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>add dept</title>

    </head>

    <body>
        <?php include('view_menu.php') ?>

        <?php
        if (isset($yes)) {
            echo "تم اضافه قسم  ";
            echo $yes . '  ';
            echo "بنجاح   ";
        }
        ?>

        <h2> Add Doc  Dept </h2>
        <br/>
        <?php echo form_open("civou/c_doctor/addDocDept"); ?>
        <br/><br/>  اسم القسم  :    
        <input type="text" name="dept_name" />
        <br/><br/>
        <input type="submit" value="add" />
        <br/><br/>
        <?php echo validation_errors(); ?>

    </body>  

</html>