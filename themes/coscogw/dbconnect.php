<?php
$oracle_connectStr = "oci:dbname=//172.40.68.108:1521/coscogw;charset=zhs16gbk";

$oracle_connectName = "gwweb";
$oralce_connectPW = "ok";
function logincheck(){
    if (isset($_SESSION['ship-query']) and (!is_null($_SESSION['ship-query']))){
        return true;
    }else{
        return false;
    }
}
?>