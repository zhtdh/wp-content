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
    echo '非内部员工';
    exit;
}
$business_db = new PDO($oracle_connectStr, $oracle_connectName, $oralce_connectPW);

?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>箱号</th>
        <th>箱尺寸</th>
        <th>箱型</th>
        <th>提单号</th>
        <th>箱铅封号</th>
        <th>件数</th>
        <th>重量</th>
        <th>体积</th>
        <th>温度</th>
        <th>湿度</th>
        <th>通风</th>
        <th>中转港</th>
        <th>目的港</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $year = '2015';
    $month = '07';
    $employee_no = '00018';
    $results = array();
    $queryStr = " begin p_wage_display_single(:iv_year,:iv_month,:iv_employee_no); end;";
    $exec = $business_db->prepare($queryStr);
    $exec->bindParam('iv_year',$year,PDO::PARAM_STR);
    $exec->bindParam('iv_month',$month,PDO::PARAM_STR);
    $exec->bindParam('iv_employee_no',$employee_no,PDO::PARAM_STR);
    //$exec->bindParam(':ref_cursor',$results,PDO::CURSOR_FWDONLY);
    //$r = $exec->execute(array('iv_year' => '2015','iv_month' => '07','iv_employee_no' => '00018','ref_cursor' => $results));
    $r = $exec->execute();

    $queryStr = " select * from t_wage_display ";
    $exec = $business_db->prepare($queryStr);
    $r = $exec->execute();
    $row = $exec->fetchAll();
//    $exec = $business_db->query($queryStr);
    //$row = $exec->fetch(PDO::FETCH_ASSOC);


    //$queryStr = " select * from ";
    //$row = $exec->fetch();
    var_dump($row);
    //var_dump($results);
    exit;
    while ($row = $exec->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo mb_convert_encoding($row['CNTR'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['CNTR_SIZ_COD'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['CNTR_TYP_COD'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['BILL_NO'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['CNTR_SEAL_NO'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['CARGO_PIECES'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['CNTR_GROSS_WGT'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['CARGO_VOLUME'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['TEMP_SET'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['HUMIDITY'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['VENTILATION'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['C_PORT_NAM'],'utf-8', 'gbk');?></td>
            <td><?php echo mb_convert_encoding($row['C_PORT_NAM_A'],'utf-8', 'gbk');?></td>
        </tr>

    <?php
    }
    $queryStr = null;
    $exec = null;
    $row = null;
    $business_db = null;
    ?>

    </tbody>
</table>

