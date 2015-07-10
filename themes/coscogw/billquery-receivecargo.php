<table class="table table-striped">
    <thead>
    <tr>
        <th>提单号</th>
        <th>送货时间</th>
        <th>车号</th>
        <th>司机</th>
        <th>件数</th>
        <th>重量</th>
        <th>体积</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($billquery_shipno != null and $billquery_billno != null) {
        $queryStr = "select b.combine_no from contract_bill where bill_no = :bill_no and ship_no = :ship_no";
        $exec = $business_db->prepare($queryStr);
        $exec->execute(array('ship_no' => $billquery_shipno, 'bill_no' => $billquery_billno));
        $row = $exec->fetch();
        if ($row['COMBINE_NO'] == null or $row['COMBINE_NO'] == $billquery_billno) {
            $queryStr = " select b.bill_no,to_char(d.delivery_tim,'yyyy-mm-dd hh24:mi:ss') delivery_tim,d.truck_no,d.driver,d.cargo_pieces,d.cargo_volume,"
                . "d.cargo_weight "
                . " from contract_bill b,contract_cargo_delivery d"
                . " where b.contract_no = d.contract_no"
                . " and b.ship_no = :ship_no and b.bill_no = :bill_no ";
        } else {
            $queryStr = " select b.bill_no,to_char(d.delivery_tim,'yyyy-mm-dd hh24:mi:ss') delivery_tim,d.truck_no,d.driver,d.cargo_pieces,d.cargo_volume,"
                . "d.cargo_weight"
                . " from contract_bill b,contract_cargo_delivery d"
                . " where b.contract_no = d.contract_no"
                . " and b.ship_no = :ship_no and b.combine_no = :bill_no ";
        }
        $exec = $business_db->prepare($queryStr);
        $exec->execute(array('ship_no' => $billquery_shipno, 'bill_no' => $billquery_billno));
        while ($row = $exec->fetch()) {
            //var_dump($row);
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['BILL_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['DELIVERY_TIM'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['TRUCK_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['DRIVER'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CARGO_PIECES'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CARGO_WEIGHT'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CARGO_VOLUME'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        $exec = null;
        $row = null;
        $queryStr = null;
    }
    ?>

    </tbody>
</table>