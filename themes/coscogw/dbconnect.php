<?php
$oracle_connectStr = "oci:dbname=//172.40.68.108:1521/coscogw;charset=zhs16gbk";

$oracle_connectName = "gwweb";
$oralce_connectPW = "ok";
function logincheck(){
    if (empty($_SESSION['ship-query'])){
        return false;
    }else{
        return true;
    }
}
?>