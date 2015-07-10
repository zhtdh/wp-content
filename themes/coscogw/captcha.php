<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-2
 * Time: 下午3:05
 * 需安装GD、freetype库
 */

    session_start();
    include_once('ValidateCode.php');  //先把类包含进来，实际路径根据实际情况进行修改。
    $_vc = new ValidateCode();  //实例化一个对象
    $_vc->doimg();
    $_SESSION['AUTHCODE'] = $_vc->getCode();//验证码保存到SESSION中
?>