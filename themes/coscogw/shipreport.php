<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-30
 * Time: 上午9:26
 */
session_start();

include_once('dbconnect.php');
if (!logincheck()){
    echo '未登录';
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
    $queryStr = " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,b.bill_no,c.cntr_seal_no,c.cargo_pieces,"
                . "c.cntr_gross_wgt,c.cargo_volume,c.temp_set,c.humidity,c.ventilation,td.c_port_nam,"
                . "dp.c_port_nam as c_port_nam_a"
                . " from contract_bill b,contract_cntr c,c_port td,c_port dp"
                . " where b.contract_no = c.contract_no"
                . " and b.ship_no = :is_ship_no "
                . " and c.cntr is not null and c.retire_id <> '1' "
                . " and b.tran_port_cod = td.port_cod and b.disc_port_cod = dp.port_cod"
                . " order by b.bill_no,c.cntr";
    $exec = $business_db->prepare($queryStr);
    $exec->execute(array('is_ship_no' => $_POST["shipno"]));
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

