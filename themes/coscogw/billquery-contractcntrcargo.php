<table class="table table-striped">
    <thead>
    <tr>
        <th>箱号</th>
        <th>提单号</th>
        <th>件数</th>
        <th>重量</th>
        <th>体积</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($billquery_shipno) and !empty($billquery_billno) ) {
        $queryStr = " select c.cntr,t.bill_no,t.cntr_crg_pieces,t.cntr_crg_wgt,t.cntr_crg_vol "
            . " from contract_cntr c,CONTRACT_CNTR_CARGO t "
            . " where c.cntr_sn = t.cntr_sn "
            . " and c.bill_no = :bill_no and c.ship_no =:ship_no order by c.cntr,t.bill_no ";
        $exec = $business_db->prepare($queryStr);
        $exec->execute(array('ship_no' => $billquery_shipno, 'bill_no' => $billquery_billno));
        while ($row = $exec->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($row);
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['CNTR'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['BILL_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_CRG_PIECES'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_CRG_WGT'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_CRG_VOL'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        $exec = null;
        $row = null;
        $queryStr = null;
    }
    ?>

    </tbody>
</table>
