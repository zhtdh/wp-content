<table class="table table-striped">
    <thead>
    <tr>
        <th>提单号</th>
        <th>中转港</th>
        <th>目的港</th>
        <th>放行标志</th>
        <th>件数</th>
        <th>重量</th>
        <th>体积</th>
        <th>退关标志</th>
        <th>主提单号</th>
    </tr>
    </thead>
    <tbody>
    <?php

    if (!empty($billquery_shipno) and !empty($billquery_billno)) {
        $queryStr = " select b.bill_no,tp.c_port_nam,dp.c_port_nam as c_port_nam_a,b.custom_id,c.cargo_pieces,"
            . " c.cargo_gross_wgt,c.cargo_volume, b.retire_id,b.combine_no "
            . " from contract_bill b,contract_cargo c,c_port tp,c_port dp "
            . " where b.contract_no = c.contract_no and b.tran_port_cod = tp.port_cod "
            . " and b.disc_port_cod = dp.port_cod and b.ship_no = :ship_no  and b.bill_no = :bill_no ";
        $exec = $business_db->prepare($queryStr);
        $exec->execute(array('ship_no' => $billquery_shipno, 'bill_no' => $billquery_billno));
        while ($row = $exec->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['BILL_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['C_PORT_NAM'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['C_PORT_NAM_A'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CUSTOM_ID'], 'utf-8', 'gbk') == '1' ? '已放行' : '未放行'; ?></td>
                <td><?php echo mb_convert_encoding($row['CARGO_PIECES'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CARGO_GROSS_WGT'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CARGO_VOLUME'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['RETIRE_ID'], 'utf-8', 'gbk') == '1' ? '已退关' : '未退关'; ?></td>
                <td><?php echo mb_convert_encoding($row['COMBINE_NO'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        $exec = null;
        $row = null;
        $queryStr = null;
    }
    ?>
    </tbody>
</table>
