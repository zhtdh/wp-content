<?php
$billquery_billno = strtoupper($_GET['billno']);
$billquery_flag = $_GET['queryflag'];
$billquery_shipno = null;
//var_dump($billquery_billno);
if (!empty($billquery_billno)) {
    //echo '查找';
    $statement = $business_db->prepare("select max(ship_no) ship_no from contract_bill where bill_no = :bill_no");
    $statement->execute(array('bill_no' => $billquery_billno));
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $billquery_shipno = mb_convert_encoding($row['SHIP_NO'], 'utf-8', 'gbk');
        //var_dump($billquery_shipno);
    }
    $statement = null;
}
//var_dump($billquery_shipno);
?>
<script type="text/javascript">
    $(function(){
        $('#billdownloadbtn').bind('click',function(event){
            event.preventDefault();
            $('#ebillno').val($('#billno').val());
            //console.info($('#ebillno').val());
            $('#billdownload').submit();
    });
});
</script>
<div class="DRight">
    <div style="margin-left: 10px;">
        <form action="<?php echo post_permalink($post->ID); ?>" method="get">
            <table cellspacing="0" cellpadding="0" border="0"
                   background="<?php bloginfo('template_url'); ?>/images/ywcxback.gif" width="697" height="40">
                <tbody>
                <tr>
                    <td align="right" width="50" style="line-height: 40px;">
                        <img width="21" height="21" src="<?php bloginfo('template_url'); ?>/images/arrow01.gif">
                    </td>
                    <td width="75" valign="bottom">
                            <span style="font-size: 14px; color: #3366cc; font-weight: bold; vertical-align: middle;
                                line-height: 40px;">客户查询</span>
                    </td>
                    <td align="right" style="line-height: 40px;">
                        <div align="right" style="font-size: 13px; text-align: center; font-family: 微软雅黑">
                            提单查询：
                            <input id="billno" type="text" name="billno" style="vertical-align:middle;
                        margin:0;border-color: #CCCCCC; border-width: 1px; border-style: Solid;
                         width: 212px;line-height: 20px;" value="<?php
                            if ($billquery_billno == null) {
                                echo '';
                            } else {
                                echo htmlentities($billquery_billno);
                            }
                            ?>">
                            <input type="submit" style="margin-left: 10px; width: 55px;" class="btnbg1" value="查询"
                                   name="queryflag">
                            <input type="submit" style="margin-left: 10px; width: 55px;" class="btnbg1" value="下载" id="billdownloadbtn"
                                   name="queryflag">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="tabPanel">
        <ul class="nav nav-tabs tabMenus">
            <li class="tabMenus_li active"><a href="#billquery-ship" data-toggle="tab">船舶信息</a></li>
            <li class="tabMenus_li"><a href="#billquery-bill" data-toggle="tab">提单信息</a></li>
            <li class="tabMenus_li"><a href="#billquery-contractcntr" data-toggle="tab">箱信息</a></li>
            <li class="tabMenus_li"><a href="#billquery-contractcntrcargo" data-toggle="tab">箱配货</a></li>
            <li class="tabMenus_li"><a href="#billquery-outcntr" data-toggle="tab">提箱信息</a></li>
            <li class="tabMenus_li"><a href="#billquery-incntr" data-toggle="tab">站装箱信息</a></li>
            <li class="tabMenus_li"><a href="#billquery-receivecargo" data-toggle="tab">送货信息</a></li>
            <li class="tabMenus_li"><a href="#billquery-ciq" data-toggle="tab">商检划拨</a></li>
        </ul>
        <div class="tab-content" id="tabCons">
            <div class="tab-pane fade in active con" id="billquery-ship">
                <?php
                include('billquery-ship.php');
                ?>
            </div>
            <div class="tab-pane fade con" id="billquery-bill">
                <?php include('billquery-bill.php'); ?>
            </div>
            <div class="tab-pane fade con" id="billquery-contractcntr">
                <?php include('billquery-contractcntr.php'); ?>
            </div>
            <div class="tab-pane fade con" id="billquery-contractcntrcargo">
                <?php include('billquery-contractcntrcargo.php'); ?>
            </div>
            <div class="tab-pane fade con" id="billquery-outcntr">
                <?php include('billquery-outcntr.php'); ?>
            </div>
            <div class="tab-pane fade con" id="billquery-incntr">
                <?php include('billquery-incntr.php'); ?>
            </div>
            <div class="tab-pane fade con" id="billquery-receivecargo">
                <?php include('billquery-receivecargo.php'); ?>
            </div>
            <div class="tab-pane fade con" id="billquery-ciq">
                <?php include('billquery-ciq.php'); ?>
            </div>
        </div>

    </div>
</div>
<form id="billdownload" style="display: none;" action="<?php bloginfo('template_url'); ?>/billexcel.php" method="post">
    <input name="ebillno" type="hidden" id="ebillno">
</form>