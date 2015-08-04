<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-30
 * Time: 下午1:45
 */
//数据查询
//var_dump($_POST["shipno"]);
include_once('dbconnect.php');
if (!logincheck()){
    echo '未登录';
    exit;
}
$business_db = new PDO($oracle_connectStr, $oracle_connectName, $oralce_connectPW);
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


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '箱号')
    ->setCellValue('B1', '箱尺寸')
    ->setCellValue('C1', '箱型')
    ->setCellValue('D1', '提单号')
    ->setCellValue('E1', '箱铅封号')
    ->setCellValue('F1', '件数')
    ->setCellValue('G1', '重量')
    ->setCellValue('H1', '体积')
    ->setCellValue('I1', '温度')
    ->setCellValue('J1', '湿度')
    ->setCellValue('K1', '通风')
    ->setCellValue('L1', '中转港')
    ->setCellValue('M1', '目的港');
$i = 1;
while($row = $exec->fetch(PDO::FETCH_ASSOC)){
    $i++;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, mb_convert_encoding($row['CNTR'],'utf-8', 'gbk'))
        ->setCellValue('B'.$i, mb_convert_encoding($row['CNTR_SIZ_COD'],'utf-8', 'gbk'))
        ->setCellValue('C'.$i, mb_convert_encoding($row['CNTR_TYP_COD'],'utf-8', 'gbk'))
        ->setCellValue('D'.$i, mb_convert_encoding($row['BILL_NO'],'utf-8', 'gbk'))
        ->setCellValue('E'.$i, mb_convert_encoding($row['CNTR_SEAL_NO'],'utf-8', 'gbk'))
        ->setCellValue('F'.$i, mb_convert_encoding($row['CARGO_PIECES'],'utf-8', 'gbk'))
        ->setCellValue('G'.$i, mb_convert_encoding($row['CNTR_GROSS_WGT'],'utf-8', 'gbk'))
        ->setCellValue('H'.$i, mb_convert_encoding($row['CARGO_VOLUME'],'utf-8', 'gbk'))
        ->setCellValue('I'.$i, mb_convert_encoding($row['TEMP_SET'],'utf-8', 'gbk'))
        ->setCellValue('J'.$i, mb_convert_encoding($row['HUMIDITY'],'utf-8', 'gbk'))
        ->setCellValue('K'.$i, mb_convert_encoding($row['VENTILATION'],'utf-8', 'gbk'))
        ->setCellValue('L'.$i, mb_convert_encoding($row['C_PORT_NAM'],'utf-8', 'gbk'))
        ->setCellValue('M'.$i, mb_convert_encoding($row['C_PORT_NAM_A'],'utf-8', 'gbk'));
}
// Miscellaneous glyphs, UTF-8


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Sheet1');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
$filename = tempnam(sys_get_temp_dir(),"ship");

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
$exec = null;
$queryStr = null;
$business_db = null;

?>
