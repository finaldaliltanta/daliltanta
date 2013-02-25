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
            <?php
            if (isset($errors)) {
                echo '<p style="color:#F00">' . $errors . '</p>';
            }
            ?>
            <?php echo form_open('civou/c_dept/add'); ?>
            <?php echo validation_errors(); ?>
            <table>
                <tr>
                    <td><?php echo form_input('deptname') ?></td>
                    <td><label> اسم القسم </label></td>
                </tr>
                <tr>
                    <td></td>
                </tr>                               
            </table>
            <?php echo form_submit('add', 'اضافه'); ?>   
            <?php echo form_close(); ?>
        </div>


        <div id="show_data">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <table border="1" width="900">

                <th>تعديل</th>
                <th>الترتيب</th>
                <th>القسم </th>

                <?php
                echo form_open('civou/c_dept/edit_order');
                $i = 1;
                if (isset($res)) {
                    ?>
    <?php foreach ($res as $d) { ?>
                        <tr>
                            <td> <?php echo form_hidden('id' . $i, $d->id); ?> </td>
                            <td> <?php echo form_input('order' . $i, $d->order); ?>    </td>
                            <td> <?php echo $d->name; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
<?php } ?>

            </table>
            <br/><br/>
<?php echo form_submit('', 'تأكيد تغيير الترتيب ') ?>
        </div>
    </body>
</html>
