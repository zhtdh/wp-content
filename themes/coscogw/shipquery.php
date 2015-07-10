<div class="DRight">
    <?php
    //session_start();
    //var_dump(empty($_SESSION['ship-query']));
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $loginUserName = $_POST['LoginName'];
        $loginUserPw = $_POST['LoginPwd'];
        $authcode = $_POST['LoginiptCode'];
        $statement = $business_db->prepare("select count(1) clientcount from c_client_cod where client_cod = :clientcod");
        $statement->execute(array('clientcod' => $loginUserName));
        $row = $statement->fetch();
        if (($row['CLIENTCOUNT'] > 0) and $loginUserName == $loginUserPw and $_SESSION['AUTHCODE'] == $authcode){
            echo 'success';
            $_SESSION['ship-query'] = $loginUserName;
        }else{
            $_SESSION['ship-query'] = null;
        }
        $statement = null;
    }
    if (empty($_SESSION['ship-query'])) {

        ?>
        <!--会员登录-->
    <form action="<?php echo urldecode(post_permalink($post->ID)); ?>" method="post">
        <div class="UserLogin">
            <ul>
                <li>用户名：<input type="text" class="iptbg1" maxlength="30"
                               name="LoginName"></li>
                <li>密&nbsp;&nbsp; 码：<input type="password" class="iptbg1"
                                           maxlength="30" name="LoginPwd"></li>
                <li>验证码：<input type="text" style="width:40px" maxlength="4" class="iptbg1"
                               name="LoginiptCode">
                    <img width="85px" height="35" style="vertical-align: middle;" id="iptPic"
                         src="<?php echo get_stylesheet_directory_uri();?>/captcha.php"
                         onclick="document.getElementById('iptPic').src='<?php echo get_stylesheet_directory_uri();?>/captcha.php?'+Math.random();"
                        ></li>
            </ul>

            <input type="submit" style="width:55px;margin-left:40px;margin-top: 10px;" class="btnbg1" value="登录"
                   name="LoginSubmit">
        </div>
        </form>
    <?php
    } else {
        include_once('shipquery-result.php');
    }
    ?>
</div>