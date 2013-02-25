<style type="text/css">#invalid{color:#C90;margin-right:4px;}</style>
<div id="login">

    <?php if (isset($user)) { ?>
        <?php if (!$user) { ?>
            <div id="main" class="form-4">
                <?php echo form_open('c_custmer/enter'); ?> 
                <span>دخول العملاء لتعديل اعلانتهم</span>
                <p>
                    <label for="login">البريد الالكتروني</label>
                    <?php
                    echo form_input(array('id' => '', 'name' => 'username', 'value' => '....اسم العميل',
                        'onblur' => "if(this.value=='') this.value='....اسم العميل'", 'onfocus' => "if(this.value =='....اسم العميل' ) this.value=''"
                    ));
                    ?>                </p>
                <p>
                    <label for="password">كلمه المرور</label>
                    <?php
                    echo form_password(array('id' => '', 'name' => 'password', 'value' => '....اسم العميل',
                        'onblur' => "if(this.value=='') this.value='....اسم العميل'", 'onfocus' => "if(this.value =='....اسم العميل' ) this.value=''"
                    ));
                    ?>                
                </p>
                <p>
                    <input type="submit" name="submit" value="دخول">
                </p>       
                <?php echo form_close(); ?>
            </div>
             
            <?php
			
        } else {
            ?>
           <div id="agent">
             <a id="edit" href="<?php echo site_url("c_custmer/edit/$user") ?>" > التعديل على الاعلان  </a>

            <br/>
            <a id="exit" href="<?php echo site_url("c_custmer/logout/$user") ?>" > خروج   </a>
            </div>
           
            <?php
			
        }
    } else {
        
    }
    if (isset($logged_error2)) {
        if ($logged_error2) {
            echo "<p id='invalid'> اسم العميل او الرقم السري احدهما خطأ </p>";
        }
    }
    ?>
 
</div>

<!----------------------------------------------- main menu ----------------------------------------------->        
<div class="main_menu" >

    <ul class="nav2" style="margin-top:-10px">



        <?php
        $v = "";
        foreach ($result as $row) {
            if (!isset($row->sd_id)) {
                $v = $row->d_name;
                echo "<li><a href=" . site_url() . "site/showByDeptId/" . $row->d_id . " style=\"color:\"> " . $v . " </a></li>";
            } else {
                if ($v != $row->d_name) {
                    $v = $row->d_name;
                    echo "<li><a style=\"color:\"> " . $v . " </a></li>";
                    echo "<div class=\"sub_links\" style=\"display: none; \">";
                    foreach ($result as $r) {
                        if ($r->d_name == $v) {
                            if ($r->d_id != 1) {
                                echo "<p><a href=" . site_url() . "site/showBySubId/" . $r->sd_id . "  style=\"color:0\">" . $r->sd_name . "</a></p>";
                            } else {
                                echo "<p><a href=" . site_url() . "site/showDoctor/" . $r->sd_id . "  style=\"color:0\">" . $r->sd_name . "</a></p>";
                            }
                        }
                    }
                    echo " </div>";
                }
            }
        }
        ?>                  

    </ul>    
</div>
