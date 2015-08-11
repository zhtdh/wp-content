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
$employee_no = $_SESSION['EMPLOYEENO'];
$detailpath = $_POST['detailpath'];
$selfurl = $_POST['selfurl'];
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
//var_dump($month);
//echo $year .'/' . $month . '/' . $employee_no;
//exit;
$business_db = new PDO($oracle_connectStr, $oracle_connectName, $oralce_connectPW);

?>
<script type="text/javascript">
    $(function(){
        $('.detailbtn').bind('click',function(event){
            event.preventDefault();
            $('#detailcontent').load('<?php echo $detailpath;?>/wagedetail.php',
                {
                    'year':$(event.target).data('year'),
                    'month':$(event.target).data('month'),
                    'wagetype':$(event.target).data('wagetype')
                },
                function(t,s,x){
                    if (t == '非法'){
                        alert('内部错误，请联系系统管理员!');
                        window.location.href = "<?php echo $selfurl; ?>";
                    }else{
                        $('#wagedetail').modal({});
                    }
                }
            );
        });
    });
</script>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>姓名</th>
        <th>年</th>
        <th>月</th>
        <th>应发工资</th>
        <th>应发奖金</th>
        <th>应发其他</th>
        <th>应发合计</th>
        <th>扣发金额</th>
        <th>实发金额</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $result = '';
    $queryStr = " begin p_income_display_single(:iv_year,:iv_month,:iv_employee_no,:ov_rtn); end;";
    $exec = $business_db->prepare($queryStr);
    $exec->bindParam('iv_year',$year,PDO::PARAM_STR);
    $exec->bindParam('iv_month',$month,PDO::PARAM_STR);
    $exec->bindParam('iv_employee_no',$employee_no,PDO::PARAM_STR);
    $exec->bindParam('ov_rtn',$result,PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT,200);
    $exec->execute();
    //var_dump($result);
    if ($result == 'SUC'){
        $queryStr = " select employee_name,year,month,yfgz,yuejiang,"
                . " (zhudao  +  zengliang  +  bannian  +  nianzhong  +  zongjingli  +  danxiang) yfqt,"
                . " (zhudao  +  zengliang  +  yfgz  +  yuejiang  +  bannian  +  nianzhong  +  zongjingli  +  danxiang) yfhj,"
                . " (kougz + koutaxother + koujiangjin + meals) kou,"
                . " (zhudao  +  zengliang  +  yfgz  +  yuejiang  +  bannian  +  nianzhong  +  zongjingli  +  danxiang - kougz - koutaxother - koujiangjin - meals) sf"
                . " from t_employee_income order by year,month";
        $exec = $business_db->prepare($queryStr);
        $exec->execute();
        while ($row = $exec->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['EMPLOYEE_NAME'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['YEAR'],'utf-8', 'gbk');?></td>
                <td><?php echo mb_convert_encoding($row['MONTH'],'utf-8', 'gbk');?></td>
                <td><a data-year="<?php echo mb_convert_encoding($row['YEAR'],'utf-8', 'gbk');?>"
                       data-month="<?php echo mb_convert_encoding($row['MONTH'],'utf-8', 'gbk');?>"
                       data-wagetype="YFGZ"
                       href="#" class="detailbtn">
                        <?php echo mb_convert_encoding($row['YFGZ'],'utf-8', 'gbk');?>
                    </a>
                </td>
                <td><?php echo mb_convert_encoding($row['YUEJIANG'],'utf-8', 'gbk');?></td>
                <td>
                    <a data-year="<?php echo mb_convert_encoding($row['YEAR'],'utf-8', 'gbk');?>"
                       data-month="<?php echo mb_convert_encoding($row['MONTH'],'utf-8', 'gbk');?>"
                       data-wagetype="YFQT"
                       href="#" class="detailbtn">
                        <?php echo mb_convert_encoding($row['YFQT'],'utf-8', 'gbk');?>
                    </a>
                </td>
                <td><?php echo mb_convert_encoding($row['YFHJ'],'utf-8', 'gbk');?></td>
                <td>
                    <a data-year="<?php echo mb_convert_encoding($row['YEAR'],'utf-8', 'gbk');?>"
                       data-month="<?php echo mb_convert_encoding($row['MONTH'],'utf-8', 'gbk');?>"
                       data-wagetype="KOU"
                       href="#" class="detailbtn">
                        <?php echo mb_convert_encoding($row['KOU'],'utf-8', 'gbk');?>
                    </a>
                </td>
                <td><?php echo mb_convert_encoding($row['SF'],'utf-8', 'gbk');?></td>
            </tr>

        <?php
        }
        $queryStr = null;
        $exec = null;
        $row = null;
    }else{
        echo '内部错误，请联系系统管理员!'.$result;
        exit;
    }
    $business_db = null;

    ?>
    </tbody>
</table>
<!-- 弹出明细窗口-->
<div class="modal fade" id="wagedetail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <buton type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</buton>
                <h4 class="modal-title">工资明细</h4>
            </div>
            <div class="modal-body" id="detailcontent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
