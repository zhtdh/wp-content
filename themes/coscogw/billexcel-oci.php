<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-30
 * Time: 下午1:45
 */
//数据查询
//var_dump($_POST["shipno"]);

//创建文件
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Shanghai');



/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("coscogw")
    ->setLastModifiedBy("coscogw")
    ->setTitle("shiplists")
    ->setSubject("shiplists")
    ->setDescription("shiplists")
    ->setKeywords("shiplists")
    ->setCategory("shiplists");



include_once('dbconnect.php');
//$business_db = new PDO($oracle_connectStr, $oracle_connectName, $oralce_connectPW);
$business_db = oci_pconnect($oracle_connectName, $oralce_connectPW,$oci_gwconnectStr,"zhs16gbk");
$billno = strtoupper($_POST['ebillno']);
if (empty($billno)){
    echo '提单号错误';
    exit;
}
//$statement = $business_db->prepare("select max(ship_no) ship_no from contract_bill where bill_no = :bill_no");
$statement = oci_parse($business_db,"select max(ship_no) ship_no from contract_bill where bill_no = :bill_no");
oci_bind_by_name($statement,":bill_no",$billno);
if (oci_execute($statement) == false){
    echo '提单号错误';
    exit;
}
$row = oci_fetch_assoc($statement);
$shipno = mb_convert_encoding($row['SHIP_NO'], 'utf-8', 'gbk');
oci_free_statement($statement);

// 船舶信息
$queryStr = "select s.ship_cod,sc.e_ship_nam,sc.c_ship_nam,s.e_voyage,s.e_voyage_ship,s.ship_corp_cod,"
    . "to_char(s.leave_port_tim,'yyyy-mm-dd hh24:mi:ss') leave_port_tim,"
    . "to_char(s.cy_beg_tim,'yyyy-mm-dd hh24:mi:ss') cy_beg_tim,"
    . "to_char(s.cy_end_tim,'yyyy-mm-dd hh24:mi:ss') cy_end_tim,s.remark_txt"
    . " from ship s,c_ship_cod sc"
    . " where s.ship_no = :ship_no and s.ship_cod = sc.ship_cod";
$statement = oci_parse($business_db,$queryStr);
oci_bind_by_name($statement,":ship_no",$shipno);
oci_execute($statement);
$row = oci_fetch_assoc($statement);

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '船代码')
    ->setCellValue('B1', mb_convert_encoding($row['SHIP_COD'], 'utf-8', 'gbk'))
    ->setCellValue('A2', '英文船名')
    ->setCellValue('B2', mb_convert_encoding($row['E_SHIP_NAM'], 'utf-8', 'gbk'))
    ->setCellValue('A3', '中文船名')
    ->setCellValue('B3', mb_convert_encoding($row['C_SHIP_NAM'],'utf-8', 'gbk'))
    ->setCellValue('A4', '码头航次')
    ->setCellValue('B4', mb_convert_encoding($row['E_VOYAGE'], 'utf-8', 'gbk'))
    ->setCellValue('A5', '船公司航次')
    ->setCellValue('B5', mb_convert_encoding($row['E_VOYAGE_SHIP'], 'utf-8', 'gbk'))
    ->setCellValue('A6', '船公司')
    ->setCellValue('B6', mb_convert_encoding($row['SHIP_CORP_COD'], 'utf-8', 'gbk'))
    ->setCellValue('A7', '离港时间')
    ->setCellValue('B7', mb_convert_encoding($row['LEAVE_PORT_TIM'], 'utf-8', 'gbk'))
    ->setCellValue('A8', '集港开始时间')
    ->setCellValue('B8', mb_convert_encoding($row['CY_BEG_TIM'], 'utf-8', 'gbk'))
    ->setCellValue('A9', '集港截止时间')
    ->setCellValue('B9', mb_convert_encoding($row['CY_END_TIM'], 'utf-8', 'gbk'))
    ->setCellValue('A10', '备注')
    ->setCellValue('B11', mb_convert_encoding($row['REMARK_TXT'], 'utf-8', 'gbk'));
$objPHPExcel->getActiveSheet()->setTitle('船舶信息');
$objPHPExcel->createSheet();
oci_free_statement($statement);
//提单信息
$objPHPExcel->setActiveSheetIndex(1)
    ->setCellValue('A1', '提单号')
    ->setCellValue('B1', '中转港')
    ->setCellValue('C1', '目的港')
    ->setCellValue('D1', '放行标示')
    ->setCellValue('E1', '件数')
    ->setCellValue('F1', '重量')
    ->setCellValue('G1', '体积')
    ->setCellValue('H1', '退关标志')
    ->setCellValue('I1', '主提单号');
$i = 1;

$queryStr = " select b.bill_no,tp.c_port_nam,dp.c_port_nam as c_port_nam_a,b.custom_id,c.cargo_pieces,"
    . " c.cargo_gross_wgt,c.cargo_volume, b.retire_id,b.combine_no "
    . " from contract_bill b,contract_cargo c,c_port tp,c_port dp "
    . " where b.contract_no = c.contract_no and b.tran_port_cod = tp.port_cod "
    . " and b.disc_port_cod = dp.port_cod and b.ship_no = :ship_no  and b.bill_no = :bill_no ";

$statement = oci_parse($business_db,$queryStr);
oci_bind_by_name($statement,":ship_no",$shipno);
oci_bind_by_name($statement,":bill_no",$billno);
oci_execute($statement);
while ($row = oci_fetch_assoc($statement)) {
    $i++;
    $objPHPExcel->setActiveSheetIndex(1)
        ->setCellValue('A'.$i, mb_convert_encoding($row['BILL_NO'],'utf-8', 'gbk'))
        ->setCellValue('B'.$i, mb_convert_encoding($row['C_PORT_NAM'],'utf-8', 'gbk'))
        ->setCellValue('C'.$i, mb_convert_encoding($row['C_PORT_NAM_A'],'utf-8', 'gbk'))
        ->setCellValue('D'.$i, mb_convert_encoding($row['CUSTOM_ID'],'utf-8', 'gbk'))
        ->setCellValue('E'.$i, mb_convert_encoding($row['CARGO_PIECES'],'utf-8', 'gbk'))
        ->setCellValue('F'.$i, mb_convert_encoding($row['CARGO_GROSS_WGT'],'utf-8', 'gbk'))
        ->setCellValue('G'.$i, mb_convert_encoding($row['CARGO_VOLUME'],'utf-8', 'gbk'))
        ->setCellValue('H'.$i, mb_convert_encoding($row['RETIRE_ID'],'utf-8', 'gbk'))
        ->setCellValue('I'.$i, mb_convert_encoding($row['COMBINE_NO'],'utf-8', 'gbk'));
}
$objPHPExcel->getActiveSheet()->setTitle('提单信息');
$objPHPExcel->createSheet();
oci_free_statement($statement);
//箱信息
$objPHPExcel->setActiveSheetIndex(2)
    ->setCellValue('A1', '箱号')
    ->setCellValue('B1', '箱尺寸')
    ->setCellValue('C1', '箱型')
    ->setCellValue('D1', '箱皮重')
    ->setCellValue('E1', '箱铅封号')
    ->setCellValue('F1', '预定箱号')
    ->setCellValue('G1', '预定铅封')
    ->setCellValue('H1', '放箱标识')
    ->setCellValue('I1', '温度')
    ->setCellValue('J1', '湿度')
    ->setCellValue('K1', '通风');
$i = 1;
$queryStr = " select * from ( "
    . " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,f.cntr_net_wgt,c.cntr_seal_no,"
    . " c.pre_cntr,c.pre_seal,f_get_available_id(c.available_id,c.available_tim) AS available_id,"
    . " (c.temp_set || c.temp_id) as temp,c.humidity,c.ventilation "
    . " from contract_cntr c,cntr_file f "
    . " where c.cntr_no = f.cntr_no and c.bill_no = :bill_no and c.ship_no = :ship_no "
    . " union all "
    . " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,0 as cntr_net_wgt,c.cntr_seal_no,"
    . " c.pre_cntr,c.pre_seal,f_get_available_id(c.available_id,c.available_tim) AS available_id,"
    . " (c.temp_set || c.temp_id) as temp,c.humidity,c.ventilation "
    . " from contract_cntr c "
    . " where c.cntr_no is null and c.bill_no = :bill_no and c.ship_no = :ship_no "
    . " ) t order by t.cntr ";
$statement = oci_parse($business_db,$queryStr);
oci_bind_by_name($statement,":ship_no",$shipno);
oci_bind_by_name($statement,":bill_no",$billno);
oci_execute($statement);
while($row = oci_fetch_assoc($statement)){
    $i++;
    $objPHPExcel->setActiveSheetIndex(2)
        ->setCellValue('A'.$i, mb_convert_encoding($row['CNTR'],'utf-8', 'gbk'))
        ->setCellValue('B'.$i, mb_convert_encoding($row['CNTR_SIZ_COD'],'utf-8', 'gbk'))
        ->setCellValue('C'.$i, mb_convert_encoding($row['CNTR_TYP_COD'],'utf-8', 'gbk'))
        ->setCellValue('D'.$i, mb_convert_encoding($row['CNTR_NET_WGT'],'utf-8', 'gbk'))
        ->setCellValue('E'.$i, mb_convert_encoding($row['CNTR_SEAL_NO'],'utf-8', 'gbk'))
        ->setCellValue('F'.$i, mb_convert_encoding($row['PRE_CNTR'],'utf-8', 'gbk'))
        ->setCellValue('G'.$i, mb_convert_encoding($row['PRE_SEAL'],'utf-8', 'gbk'))
        ->setCellValue('H'.$i, mb_convert_encoding($row['AVAILABLE_ID'],'utf-8', 'gbk'))
        ->setCellValue('I'.$i, mb_convert_encoding($row['TEMP'],'utf-8', 'gbk'))
        ->setCellValue('J'.$i, mb_convert_encoding($row['HUMIDITY'],'utf-8', 'gbk'))
        ->setCellValue('K'.$i, mb_convert_encoding($row['VENTILATION'],'utf-8', 'gbk'));
}
$objPHPExcel->getActiveSheet()->setTitle('箱信息');
$objPHPExcel->createSheet();
oci_free_statement($statement);
//箱配货
$objPHPExcel->setActiveSheetIndex(3)
    ->setCellValue('A1', '箱号')
    ->setCellValue('B1', '提单号')
    ->setCellValue('C1', '件数')
    ->setCellValue('D1', '重量')
    ->setCellValue('E1', '体积');
$i = 1;
$queryStr = " select c.cntr,t.bill_no,t.cntr_crg_pieces,t.cntr_crg_wgt,t.cntr_crg_vol "
    . " from contract_cntr c,CONTRACT_CNTR_CARGO t "
    . " where c.cntr_sn = t.cntr_sn "
    . " and c.bill_no = :bill_no and c.ship_no =:ship_no order by c.cntr,t.bill_no ";
$statement = oci_parse($business_db,$queryStr);
oci_bind_by_name($statement,":ship_no",$shipno);
oci_bind_by_name($statement,":bill_no",$billno);
oci_execute($statement);
while($row = oci_fetch_assoc($statement)){
    $i++;
    $objPHPExcel->setActiveSheetIndex(3)
        ->setCellValue('A'.$i, mb_convert_encoding($row['CNTR'],'utf-8', 'gbk'))
        ->setCellValue('B'.$i, mb_convert_encoding($row['BILL_NO'],'utf-8', 'gbk'))
        ->setCellValue('C'.$i, mb_convert_encoding($row['CNTR_CRG_PIECES'],'utf-8', 'gbk'))
        ->setCellValue('D'.$i, mb_convert_encoding($row['CNTR_CRG_WGT'],'utf-8', 'gbk'))
        ->setCellValue('E'.$i, mb_convert_encoding($row['CNTR_CRG_VOL'],'utf-8', 'gbk'));
}
$objPHPExcel->getActiveSheet()->setTitle('箱配货');
$objPHPExcel->createSheet();
oci_free_statement($statement);
//提箱信息
$objPHPExcel->setActiveSheetIndex(4)
    ->setCellValue('A1', '箱号')
    ->setCellValue('B1', '箱尺寸')
    ->setCellValue('C1', '箱型')
    ->setCellValue('D1', '箱铅封号')
    ->setCellValue('E1', '车号')
    ->setCellValue('F1', '司机电话')
    ->setCellValue('G1', '提箱时间')
    ->setCellValue('H1', '返回时间');
$i = 1;
$queryStr = " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,c.cntr_seal_no,t.truck_no,t.driver_phone,"
    . " to_char(c.pre_alloc_tim,'yyyy-mm-dd hh24:mi:ss') pre_alloc_tim,"
    . " to_char(c.alloc_tim,'yyyy-mm-dd hh24:mi:ss') alloc_tim "
    . " from contract_cntr c,truck_cntr_ex t"
    . " where c.cntr_no = t.cntr_no and c.cntr_sn = t.cntr_sn and t.work_dest = 'TIWDTX'"
    . " and c.bill_no = :bill_no and c.ship_no = :ship_no ";
$statement = oci_parse($business_db,$queryStr);
oci_bind_by_name($statement,":ship_no",$shipno);
oci_bind_by_name($statement,":bill_no",$billno);
oci_execute($statement);
while($row = oci_fetch_assoc($statement)){
    $i++;
    $objPHPExcel->setActiveSheetIndex(4)
        ->setCellValue('A'.$i, mb_convert_encoding($row['CNTR'],'utf-8', 'gbk'))
        ->setCellValue('B'.$i, mb_convert_encoding($row['CNTR_SIZ_COD'],'utf-8', 'gbk'))
        ->setCellValue('C'.$i, mb_convert_encoding($row['CNTR_TYP_COD'],'utf-8', 'gbk'))
        ->setCellValue('D'.$i, mb_convert_encoding($row['CNTR_SEAL_NO'],'utf-8', 'gbk'))
        ->setCellValue('E'.$i, mb_convert_encoding($row['TRUCK_NO'],'utf-8', 'gbk'))
        ->setCellValue('F'.$i, mb_convert_encoding($row['DRIVER_PHONE'],'utf-8', 'gbk'))
        ->setCellValue('G'.$i, mb_convert_encoding($row['PRE_ALLOC_TIM'],'utf-8', 'gbk'))
        ->setCellValue('H'.$i, mb_convert_encoding($row['ALLOC_TIM'],'utf-8', 'gbk'));
}
$objPHPExcel->getActiveSheet()->setTitle('提箱信息');
$objPHPExcel->createSheet();
oci_free_statement($statement);
//站装箱信息
$objPHPExcel->setActiveSheetIndex(5)
    ->setCellValue('A1', '箱号')
    ->setCellValue('B1', '箱尺寸')
    ->setCellValue('C1', '箱型')
    ->setCellValue('D1', '箱铅封号')
    ->setCellValue('E1', '开始装箱时间')
    ->setCellValue('F1', '装箱完成时间');
$i = 1;
$queryStr = " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,c.cntr_seal_no,"
    . " to_char(c.pre_alloc_tim,'yyyy-mm-dd hh24:mi:ss') pre_alloc_tim,"
    . " to_char(c.alloc_tim,'yyyy-mm-dd hh24:mi:ss') alloc_tim "
    . " from contract_cntr c"
    . " where c.action_typ = 'ESNDZX' "
    . " and c.bill_no = :bill_no and c.ship_no = :ship_no ";
$statement = oci_parse($business_db,$queryStr);
oci_bind_by_name($statement,":ship_no",$shipno);
oci_bind_by_name($statement,":bill_no",$billno);
oci_execute($statement);
while($row = oci_fetch_assoc($statement)){
    $i++;
    $objPHPExcel->setActiveSheetIndex(5)
        ->setCellValue('A'.$i, mb_convert_encoding($row['CNTR'],'utf-8', 'gbk'))
        ->setCellValue('B'.$i, mb_convert_encoding($row['CNTR_SIZ_COD'],'utf-8', 'gbk'))
        ->setCellValue('C'.$i, mb_convert_encoding($row['CNTR_TYP_COD'],'utf-8', 'gbk'))
        ->setCellValue('D'.$i, mb_convert_encoding($row['CNTR_SEAL_NO'],'utf-8', 'gbk'))
        ->setCellValue('E'.$i, mb_convert_encoding($row['PRE_ALLOC_TIM'],'utf-8', 'gbk'))
        ->setCellValue('F'.$i, mb_convert_encoding($row['ALLOC_TIM'],'utf-8', 'gbk'));
}
$objPHPExcel->getActiveSheet()->setTitle('站装箱信息');
$objPHPExcel->setActiveSheetIndex(0);
oci_free_statement($statement);
// Save Excel 2007 file
$filename = tempnam(sys_get_temp_dir(),"bill");

if ($filename === false){
    echo "下载文件失败";
    exit;
}
$pathfilename = $filename . '.xlsx';
//var_dump($pathfilename);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save($pathfilename);

//下载文件

$file = fopen($pathfilename, "r");
header("Content-type:application/octet-stream");
header("Accept-Ranges:bytes");
header("Content-Type:application/msexcel");
header("Accept-Length:" . filesize($pathfilename));
header("Content-Disposition:attachment;filename=" . basename($pathfilename));
echo fread($file,filesize($pathfilename));
fclose($file);

$filename = null;
$pathfilename = null;
$row = null;
$statement = null;
$queryStr = null;
//$business_db = null;
oci_close($business_db);
?>
