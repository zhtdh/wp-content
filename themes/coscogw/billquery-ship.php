<?php
$ship = null;
if (!empty($billquery_shipno) ) {
    $queryStr = "select s.ship_cod,sc.e_ship_nam,sc.c_ship_nam,s.e_voyage,s.e_voyage_ship,s.ship_corp_cod,"
        . "to_char(s.leave_port_tim,'yyyy-mm-dd hh24:mi:ss') leave_port_tim,"
        . "to_char(s.cy_beg_tim,'yyyy-mm-dd hh24:mi:ss') cy_beg_tim,"
        . "to_char(s.cy_end_tim,'yyyy-mm-dd hh24:mi:ss') cy_end_tim,s.remark_txt"
        . " from ship s,c_ship_cod sc"
        . " where s.ship_no = :ship_no and s.ship_cod = sc.ship_cod";
    $exec = $business_db->prepare($queryStr);
    $exec->execute(array('ship_no' => $billquery_shipno));
    $ship = $exec->fetch(PDO::FETCH_ASSOC);
//        $billquery_shipno = mb_convert_encoding($row['SHIP_NO'], 'utf-8', 'gbk');
    $exec = null;
}
?>

    <div style="padding-left: 50px; width:600px">
        <ul class="ship-list">
            <li><code>船代码：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['SHIP_COD'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>英文船名：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['E_SHIP_NAM'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>中文船名：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['C_SHIP_NAM'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>码头航次：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['E_VOYAGE'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>船公司航次：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['E_VOYAGE_SHIP'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>船公司：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['SHIP_CORP_COD'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>离港时间：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['LEAVE_PORT_TIM'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>集港开始时间：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['CY_BEG_TIM'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>集港截止时间：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['CY_END_TIM'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
            <li><code>备注：</code><span style="display:inline-block;width:200px;" maxlength="80">
                <?php echo $ship != null ? mb_convert_encoding($ship['REMARK_TXT'], 'utf-8', 'gbk') : ''; ?>
            </span></li>
        </ul>
    </div>
<?php $ship = null;
$queryStr = null; ?>