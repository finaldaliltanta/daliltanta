<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title> </title>

    </head>

    <body>
        <?php include('view_menu.php') ?>


        <?php
        if (isset($name)) {
            echo "تم  مسح الدكتور بنجاح  ";
        }
        ?>
        <?php
        if (isset($name_edit)) {
            echo "تم  تعديل  الدكتور بنجاح  ";
        }
        ?>

        <br>
        <br>
        <?php
        echo form_open('civou/c_doctor/edit');
        ?>
        القسم الفرعى  :   
        <select name="dept" >
            <?php foreach ($res as $row) { ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php } ?>
        </select>

        <?php
        echo "<br/><br/>";

        echo form_submit('upload', 'التالى ');
        echo "<br/><br/>";

        echo form_close();
        ?>

        <br/><br/>
        <br/><br/>

        <?php echo validation_errors(); ?>

    </body>  

</html>