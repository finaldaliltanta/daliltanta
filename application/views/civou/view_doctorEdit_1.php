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
        <?php include('view_menu.php') ?>
        <table border="1" width="900">

            <th> مسح</th>
            <th> تعديل </th>

            <th>الاسم</th>


            <?php if (isset($doctor)) { ?>
                <?php foreach ($doctor as $pic) { ?>
                    <tr>

                        <td><a class="delete" href="<?php echo base_url(); ?>civou/c_doctor/delete/<?php echo $pic->id; ?>
                               " >مسح</a>
                        </td>

                        <td><a class="edit" href="<?php echo base_url(); ?>civou/c_doctor/edit1/<?php echo $pic->id; ?>
                               " >تعديل </a>
                        </td>

                        <td> <?php echo $pic->name; ?>
                        </td> 


                    </tr>
                <?php } ?>
            <?php } ?>
        </table>

        </div>
    </body>
</html>
