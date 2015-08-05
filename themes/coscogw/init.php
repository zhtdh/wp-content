<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-22
 * Time: 下午6:54
 */
function localrequest(){
    if (substr($_SERVER['REMOTE_ADDR'],0,9) == '172.40.68'){
        return true;
    }else{
        return false;
    }
}

?>