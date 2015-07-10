<table class="table table-striped">
    <thead>
    <tr>
        <th>箱号</th>
        <th>箱尺寸</th>
        <th>箱型</th>
        <th>箱铅封号</th>
        <th>开始装箱时间</th>
        <th>装箱完成时间</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($billquery_shipno != null and $billquery_billno != null) {
        $queryStr = " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,c.cntr_seal_no,"
            . " to_char(c.pre_alloc_tim,'yyyy-mm-dd hh24:mi:ss') pre_alloc_tim,"
            . " to_char(c.alloc_tim,'yyyy-mm-dd hh24:mi:ss') alloc_tim "
            . " from contract_cntr c"
            . " where c.action_typ = 'ESNDZX' "
            . " and c.bill_no = :bill_no and c.ship_no = :ship_no ";
        $exec = $business_db->prepare($queryStr);
        $exec->execute(array('ship_no' => $billquery_shipno, 'bill_no' => $billquery_billno));
        while ($row = $exec->fetch()) {
            //var_dump($row);
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['CNTR'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_SIZ_COD'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_TYP_COD'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_SEAL_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['PRE_ALLOC_TIM'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['ALLOC_TIM'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        $exec = null;
        $row = null;
        $queryStr = null;
    }
    ?>

    </tbody>
</table>