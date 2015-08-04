<table class="table table-striped">
    <thead>
    <tr>
        <th>箱号</th>
        <th>划拨时间</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($billquery_shipno) and !empty($billquery_billno) ) {
        $queryStr = " select cf.cntr,to_char(cf.stack_tim,'yyyy-mm-dd hh24:mi:ss') stack_tim"
            . " from contract_cntr cc,cntr_file cf"
            . " where cc.ship_no = :ship_no and cc.bill_no = :bill_no and cc.cntr_no = cf.cntr_no and cf.stack_over_id = '1'"
            . " union all"
            . " select cf.cntr,to_char(cf.stack_tim,'yyyy-mm-dd hh24:mi:ss') stack_tim"
            . " from contract_cntr cc,cntr_file cf"
            . " where cc.ship_no = :ship_no and cc.bill_no = :bill_no and cc.cntr_no is null and cc.pre_cntr = cf.cntr"
            . " and cf.current_stat <> '0' and cf.stack_over_id = '1' ";
        $exec = $business_db->prepare($queryStr);
        $exec->execute(array('ship_no' => $billquery_shipno, 'bill_no' => $billquery_billno));
        while ($row = $exec->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($row);
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['CNTR'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['STACK_TIM'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        $exec = null;
        $row = null;
        $queryStr = null;
    }
    ?>

    </tbody>
</table>