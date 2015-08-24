<table class="table table-striped">
    <thead>
    <tr>
        <th>箱号</th>
        <th>箱尺寸</th>
        <th>箱型</th>
        <th>箱铅封号</th>
        <th>车号</th>
        <th>司机电话</th>
        <th>提箱时间</th>
        <th>返回时间</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($billquery_shipno) and !empty($billquery_billno) ) {
        $queryStr = " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,c.cntr_seal_no,t.truck_no,t.driver_phone,"
            . " to_char(c.pre_alloc_tim,'yyyy-mm-dd hh24:mi:ss') pre_alloc_tim,"
            . " to_char(c.alloc_tim,'yyyy-mm-dd hh24:mi:ss') alloc_tim "
            . " from contract_cntr c,truck_cntr_ex t"
            . " where c.cntr_no = t.cntr_no and c.cntr_sn = t.cntr_sn and t.work_dest = 'TIWDTX'"
            . " and c.bill_no = :bill_no and c.ship_no = :ship_no ";
        $exec = oci_parse($business_db,$queryStr);
        oci_bind_by_name($exec,":ship_no",$billquery_shipno);
        oci_bind_by_name($exec,":bill_no",$billquery_billno);
        oci_execute($exec);
        while ($row = oci_fetch_assoc($exec)) {
            //var_dump($row);
            ?>
            <tr>
                <td><?php echo mb_convert_encoding($row['CNTR'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_SIZ_COD'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_TYP_COD'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_SEAL_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['TRUCK_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['DRIVER_PHONE'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['PRE_ALLOC_TIM'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['ALLOC_TIM'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        oci_free_statement($exec);
        $row = null;
        $queryStr = null;
    }
    ?>
    </tbody>
</table>