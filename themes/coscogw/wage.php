<div class="DRight">
<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-8-5
 * Time: 上午11:18
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginUserName = $_POST['LoginName'];
    $loginUserPw = $_POST['LoginPwd'];
    $authcode = $_POST['LoginiptCode'];
    $statement = $business_db->prepare("select query_pw from employee where employee_no = :employeeNo");
    $statement->execute(array('employeeNo' => $loginUserName));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (empty($row['QUERY_PW'])){
        $logerror = "此工号未开通查询功能,请联系人事部门!";
    }else {
        if ($_SESSION['AUTHCODE'] != $authcode) {
            $logerror = "验证码错误!";
        }
        if ($row['QUERY_PW'] != $loginUserPw) {
            $logerror = "密码错误!";
        }
    }
    if (empty($logerror)) {
        $_SESSION['EMPLOYEENO'] = $loginUserName;
    } else {
        $_SESSION['EMPLOYEENO'] = null;
    }
    $statement = null;
}
if (empty($_SESSION['EMPLOYEENO'])){
    if (!empty($logerror)){
        echo "<h3 style='color:red;'>" . $logerror . "</h3>";
    }
    ?>
    <form action="<?php echo urldecode(post_permalink($post->ID)); ?>" method="post">
        <div class="UserLogin">
            <ul>
                <li>工&nbsp;&nbsp; 号：<input type="text" class="iptbg1" maxlength="30"
                                           name="LoginName" value="<?php echo empty($loginUserName) ? '' : $loginUserName ;?>"></li>
                <li>密&nbsp;&nbsp; 码：<input type="password" class="iptbg1"
                                           maxlength="30" name="LoginPwd"></li>
                <li>验证码：<input type="text" style="width:40px" maxlength="4" class="iptbg1"
                               name="LoginiptCode">
                    <img width="85px" height="35" style="vertical-align: middle;" id="iptPic"
                         src="<?php echo get_stylesheet_directory_uri(); ?>/captcha.php"
                         onclick="document.getElementById('iptPic').src='<?php echo get_stylesheet_directory_uri(); ?>/captcha.php?'+Math.random();"
                        ></li>
            </ul>

            <input type="submit" style="width:55px;margin-left:40px;margin-top: 10px;" class="btnbg1" value="登录"
                   name="LoginSubmit">
        </div>
    </form>

<?php
}else{
    include_once('wagequery-result.php');
}
?>
</div>