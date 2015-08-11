<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-30
 * Time: 上午9:26
 */
session_start();

include_once('dbconnect.php');
include_once('init.php');
if (!localrequest()){
    echo "<h3 style='color:red;'>" . '非内部员工禁止访问' . "</h3>";
    exit;
}
$year = $_POST['year'];
$month = $_POST['month'];
$wagetype = $_POST['wagetype'];
//var_dump($month);
$employee_no = $_SESSION['EMPLOYEENO'];
if (empty($employee_no)){
    echo '非法';
    exit;
}else{
    if (strlen($employee_no) != 5){
        echo '非法工号';
        exit;
    }
}
if (empty($year)){
    $year = null;
}else{
    if (strlen($year) != 4) {
        echo '非法年份';
        exit;
    }
}
if (empty($month)){
    $month = null;
}else{
    if ($month > 12 or $month < 1) {
        echo '非法月份';
        exit;
    }
    if (strlen($month) == 1){
        $month = '0' . $month;
    }
    if (strlen($month) != 2){
        echo '非法月份';
        exit;
    }
}

if (empty($wagetype)){
    echo '非法';
    exit;
}
if ($wagetype == 'YFGZ'){
    $type = " = '03'";
}elseif($wagetype == 'YFQT'){
    $type = " in ('01','02','06','07','08','09','10')";
}elseif($wagetype == 'KOU'){
    $type = " in ('04','11')";
}else{
    $exec = null;
    $business_db = mull;
    echo '费用类型错误,请联系系统管理员';
    exit;
}

$business_db = new PDO($oracle_connectStr, $oracle_connectName, $oralce_connectPW);

$queryStr = "SELECT fee_det.EMPLOYEE_NO,fee_det.EMPLOYEE_NAME,fee_det.YEAR,fee_det.MONTH,c_fee_cod.fee_nam FEE_COD,"
            . "fee_det.AMOUNT,fee_det.REMARK"
            . " FROM FEE_DET,c_fee_cod "
            . " where fee_det.EMPLOYEE_NO = :as_employee_no"
            . " and (fee_det.YEAR = :as_year or :as_year is null)"
            . " and (fee_det.MONTH = :as_month or :as_month is null)"
            . " and fee_det.FEE_TYP_COD " . $type
            . " and fee_det.fee_cod = c_fee_cod.fee_cod"
            . " order by fee_det.fee_cod ";
$exec = $business_db->prepare($queryStr);
$exec->bindParam('as_employee_no',$employee_no,PDO::PARAM_STR);
$exec->bindParam('as_year',$year,PDO::PARAM_STR);
$exec->bindParam('as_month',$month,PDO::PARAM_STR);
$exec->execute();

?>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>姓名</th>
        <th>年</th>
        <th>月</th>
        <th>费用名称</th>
        <th>金额</th>
        <th>备注</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($row = $exec->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['EMPLOYEE_NAME'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['YEAR'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['MONTH'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['FEE_COD'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['AMOUNT'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['REMARK'],'utf-8', 'gbk');?></td>
            </tr>
        <?php
        }
    $queryStr = "SELECT sum(fee_det.amount) amount "
        . " FROM FEE_DET,c_fee_cod "
        . " where fee_det.EMPLOYEE_NO = :as_employee_no"
        . " and (fee_det.YEAR = :as_year or :as_year is null)"
        . " and (fee_det.MONTH = :as_month or :as_month is null)"
        . " and fee_det.FEE_TYP_COD " . $type
        . " and fee_det.fee_cod = c_fee_cod.fee_cod"
        . " order by fee_det.fee_cod ";
    $exec = $business_db->prepare($queryStr);
    $exec->bindParam('as_employee_no',$employee_no,PDO::PARAM_STR);
    $exec->bindParam('as_year',$year,PDO::PARAM_STR);
    $exec->bindParam('as_month',$month,PDO::PARAM_STR);
    $exec->execute();
    $row = $exec->fetch(PDO::FETCH_ASSOC);
    ?>
    <tr>
        <td>合计：</td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo mb_convert_encoding($row['AMOUNT'],'utf-8', 'gbk');?></td>
        <td></td>
    </tr>
    <?php

        $queryStr = null;
        $exec = null;
        $row = null;
        $business_db = null;
    ?>
    </tbody>
</table>
